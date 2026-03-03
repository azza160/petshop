<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\GaleriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'kategori_id'        => 'required|exists:categories,id',
            'merek'              => 'nullable|string|max:255',
            'tanggal_kadaluarsa' => 'nullable|date',
            'berat'              => 'nullable|numeric|min:0',
            'harga'              => 'required|numeric|min:0',
            'stok'               => 'required|integer|min:0',
            'photo'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'          => 'required|string',
            'foto_gallery_1'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_2'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_3'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::transaction(function () use (&$validated, $request, $product) {
                // Handle hapus / ganti foto utama
                if ($request->input('remove_photo') == '1') {
                    if ($product->foto_utama) {
                        $oldPath = str_replace('/storage/', '', $product->foto_utama);
                        Storage::disk('public')->delete($oldPath);
                    }
                    $validated['foto_utama'] = null;
                }

                if ($request->hasFile('photo')) {
                    if ($product->foto_utama) {
                        $oldPath = str_replace('/storage/', '', $product->foto_utama);
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $request->file('photo')->store('products', 'public');
                    $validated['foto_utama'] = '/storage/' . $path;
                }

                // Gallery handling
                $galleries = ['foto_gallery_1', 'foto_gallery_2', 'foto_gallery_3'];
                $existingGalleries = $product->galeri->values();

                foreach ($galleries as $index => $galleryField) {
                    $removeKey = 'remove_gallery_' . ($index + 1);
                    $existingGallery = $existingGalleries[$index] ?? null;

                    if ($request->input($removeKey) == '1' && $existingGallery) {
                        $oldPath = str_replace('/storage/', '', $existingGallery->path_foto);
                        Storage::disk('public')->delete($oldPath);
                        $existingGallery->delete();
                    }

                    if ($request->hasFile($galleryField)) {
                        if ($existingGallery) {
                            $oldPath = str_replace('/storage/', '', $existingGallery->path_foto);
                            Storage::disk('public')->delete($oldPath);
                            $newPath = $request->file($galleryField)->store('products/gallery', 'public');
                            $existingGallery->update(['path_foto' => '/storage/' . $newPath]);
                        } else {
                            $newPath = $request->file($galleryField)->store('products/gallery', 'public');
                            $product->galeri()->create(['path_foto' => '/storage/' . $newPath]);
                        }
                    }
                }

                $product->update($validated);
            });

            return redirect()->route('admin.product')->with('success', 'Data produk berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product')->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())->withInput();
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
