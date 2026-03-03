<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\GaleriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search    = $request->input('search');
        $kategoriId = $request->input('kategori');
        $sort      = $request->input('sort', 'terbaru');

        // Get categories for select dropdown (tipe produk)
        $categories = Category::where('tipe', 'produk')->get();

        $query = Product::with(['category', 'galeri']);

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        if ($kategoriId && $kategoriId !== 'semua') {
            $query->where('kategori_id', $kategoriId);
        }

        // Sort berdasarkan terbaru/terlama
        $direction = ($sort === 'terlama') ? 'asc' : 'desc';
        $query->orderBy('created_at', $direction);

        $produks = $query->paginate(10)->withQueryString();

        return view('Admin.product', compact('produks', 'categories', 'search', 'kategoriId', 'sort'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'category_id'        => 'required|exists:categories,id',
            'merek'              => 'nullable|string|max:255',
            'tanggal_kadaluarsa' => 'nullable|date',
            'berat'              => 'nullable|numeric|min:0',
            'harga'              => 'required|numeric|min:0',
            'stok'               => 'required|integer|min:0',
            'photo'              => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'          => 'required|string',
            'foto_gallery_1'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_2'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_3'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::transaction(function () use (&$validated, $request) {
                // Upload foto utama
                if ($request->hasFile('photo')) {
                    $path = $request->file('photo')->store('products', 'public');
                    $validated['foto_utama'] = '/storage/' . $path;
                }

                // Map category_id ke kolom kategori_id di tabel products
                $validated['kategori_id'] = $validated['category_id'];
                unset($validated['category_id']);

                $produk = Product::create($validated);

                // Handle foto gallery
                $galleries = ['foto_gallery_1', 'foto_gallery_2', 'foto_gallery_3'];
                foreach ($galleries as $galleryField) {
                    if ($request->hasFile($galleryField)) {
                        $pathGallery = $request->file($galleryField)->store('products/gallery', 'public');
                        $produk->galeri()->create([
                            'path_foto' => '/storage/' . $pathGallery,
                        ]);
                    }
                }
            });

            return redirect()->route('admin.product')->with('success', 'Data produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product')->with('error', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $produk = Product::with(['category', 'galeri'])->findOrFail($id);

        return view('Admin.detail-product', compact('produk'));
    }

    public function update(Request $request, Product $product)
    {
        // Jika user menghapus foto utama (remove_photo=1) tanpa upload yang baru,
        // maka photo wajib diisi — mencegah foto terhapus tanpa pengganti
        $photoRule = $request->input('remove_photo') == '1'
            ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';

        $validator = Validator::make($request->all(), [
            'nama'               => 'required|string|max:255',
            'kategori_id'        => 'required|exists:categories,id',
            'merek'              => 'nullable|string|max:255',
            'tanggal_kadaluarsa' => 'nullable|date',
            'berat'              => 'nullable|numeric|min:0',
            'harga'              => 'required|numeric|min:0',
            'stok'               => 'required|integer|min:0',
            'is_favorit'         => 'required|boolean',
            'photo'              => $photoRule,
            'deskripsi'          => 'required|string',
            'foto_gallery_1'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_2'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_3'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.required' => 'Foto utama wajib diisi. Jika foto lama dihapus, harap upload foto baru.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.product')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal mengubah data! Silahkan buka kembali tombol edit pada produk "' . $product->nama . '" untuk melihat pesan error pada form.');
        }

        $validated = $validator->validated();

        try {
            DB::transaction(function () use ($validated, $request, $product) {
                // Main Photo Logic
                if ($request->hasFile('photo')) {
                    // Ada file baru → hapus yang lama, simpan yang baru
                    if ($product->foto_utama) {
                        $oldPath = str_replace('/storage/', '', $product->foto_utama);
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $request->file('photo')->store('products', 'public');
                    $product->foto_utama = '/storage/' . $path;
                }
                // Jika tidak ada file baru & remove_photo=0 → biarkan foto lama (tidak diubah)
                // Jika remove_photo=1 tapi tidak ada file baru → sudah ditangkap validator di atas

                // Gallery Logic — ikuti pola AnimalController
                $existingGalleries = $product->galeri()->orderBy('id')->get();

                for ($i = 1; $i <= 3; $i++) {
                    $existingPhoto = $existingGalleries->skip($i - 1)->first();
                    $fileInput     = 'foto_gallery_' . $i;
                    $removeInput   = 'remove_gallery_' . $i;

                    // Hapus slot ini jika user klik X atau upload foto baru (replace)
                    if ($request->input($removeInput) == '1' || $request->hasFile($fileInput)) {
                        if ($existingPhoto) {
                            $oldPath = str_replace('/storage/', '', $existingPhoto->path_foto);
                            Storage::disk('public')->delete($oldPath);
                            $existingPhoto->delete();
                        }
                    }

                    // Upload file baru untuk slot ini
                    if ($request->hasFile($fileInput)) {
                        $pathGallery = $request->file($fileInput)->store('products/gallery', 'public');
                        $product->galeri()->create([
                            'path_foto' => '/storage/' . $pathGallery,
                        ]);
                    }
                }

                // Update field lainnya (tanpa foto_utama, karena sudah di-handle manual di atas)
                $product->nama               = $validated['nama'];
                $product->kategori_id        = $validated['kategori_id'];
                $product->merek              = $validated['merek'] ?? null;
                $product->tanggal_kadaluarsa = $validated['tanggal_kadaluarsa'] ?? null;
                $product->berat              = $validated['berat'] ?? null;
                $product->harga              = $validated['harga'];
                $product->stok               = $validated['stok'];
                $product->is_favorit         = $validated['is_favorit'];
                $product->deskripsi          = $validated['deskripsi'];
                $product->save();
            });

            return redirect()->route('admin.product')->with('success', 'Data produk berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product')
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                // Hapus foto gallery
                foreach ($product->galeri as $gallery) {
                    $oldPath = str_replace('/storage/', '', $gallery->path_foto);
                    Storage::disk('public')->delete($oldPath);
                    $gallery->delete();
                }

                // Hapus foto utama
                if ($product->foto_utama) {
                    $oldPath = str_replace('/storage/', '', $product->foto_utama);
                    Storage::disk('public')->delete($oldPath);
                }

                $product->delete();
            });

            return redirect()->route('admin.product')->with('success', 'Data produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
