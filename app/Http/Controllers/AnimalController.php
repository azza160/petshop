<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori');
        $jenisKelamin = $request->input('jenis_kelamin');
        $asalHewan = $request->input('asal_hewan');

        // Get categories for select dropdown
        $categories = Category::where('tipe', 'hewan')->get();

        $query = Animal::with(['category', 'fotoHewan']);

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        if ($kategoriId && $kategoriId !== 'semua') {
            $query->where('category_id', $kategoriId);
        }

        if ($jenisKelamin && $jenisKelamin !== 'semua') {
            $query->where('jenis_kelamin', $jenisKelamin);
        }

        if ($asalHewan && $asalHewan !== 'semua') {
            $query->where('asal_hewan', $asalHewan);
        }

        // Sort descending by created at
        $query->orderBy('created_at', 'desc');

        $hewans = $query->paginate(10)->withQueryString();

        return view('Admin.hewan', compact('hewans', 'categories', 'search', 'kategoriId', 'jenisKelamin', 'asalHewan'));
    }

    public function show($id)
    {
        // Fail if not found, with eager loading for gallery and category
        $hewan = Animal::with(['category', 'fotoHewan'])->findOrFail($id);

        return view('Admin.detail-hewan', compact('hewan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'asal_hewan' => 'required|in:lokal,impor,hasil_breeding,rescue,titipan',
            'umur' => 'required|integer|min:0',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'sudah_steril' => 'required|boolean',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
            'foto_gallery_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::transaction(function () use (&$validated, $request) {
                // Upload main photo
                if ($request->hasFile('photo')) {
                    $path = $request->file('photo')->store('animals', 'public');
                    $validated['photo'] = '/storage/' . $path;
                }

                $animal = Animal::create($validated);

                // Handle gallery photos
                $galleries = ['foto_gallery_1', 'foto_gallery_2', 'foto_gallery_3'];
                foreach ($galleries as $galleryField) {
                    if ($request->hasFile($galleryField)) {
                        $pathGallery = $request->file($galleryField)->store('animals/gallery', 'public');
                        
                        $animal->fotoHewan()->create([
                            'path_foto' => '/storage/' . $pathGallery,
                        ]);
                    }
                }
            });

            return redirect()->route('admin.hewan')->with('success', 'Data hewan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.hewan')->with('error', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::with('fotoHewan')->findOrFail($id);

        // Required rule if the user removes the existing main photo without uploading a new one.
        // Actually, if they removed it (`remove_photo` == 1) they MUST upload a new photo.
        $photoRule = $request->input('remove_photo') == '1' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'asal_hewan' => 'required|in:lokal,impor,hasil_breeding,rescue,titipan',
            'umur' => 'required|integer|min:0',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'sudah_steril' => 'required|boolean',
            'photo' => $photoRule,
            'deskripsi' => 'required|string',
            'foto_gallery_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_gallery_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.hewan')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal mengubah data! Silahkan buka kembali tombol edit pada hewan "' . $animal->nama . '" untuk melihat pesan error pada form.');
        }

        $validated = $validator->validated();

        try {
            DB::transaction(function () use ($validated, $request, $animal) {
                // Main Photo Logic
                if ($request->hasFile('photo')) {
                    // New photo uploaded, delete old one
                    if ($animal->photo) {
                        $oldPath = str_replace('/storage/', '', $animal->photo);
                        Storage::disk('public')->delete($oldPath);
                    }
                    $path = $request->file('photo')->store('animals', 'public');
                    $validated['photo'] = '/storage/' . $path;
                } else {
                    // no new photo, keep existing (we validated they didn't try to delete it without replacement)
                    unset($validated['photo']);
                }

                $animal->update($validated);

                // Gallery Logic
                // Since an animal has multiple photos but we don't know the exact ID mapping natively,
                // we'll use hidden inputs for removed gallery slots 1, 2, 3
                // First get existing galleries ordered by creation or ID to map to "1,2,3".
                $existingGalleries = $animal->fotoHewan()->orderBy('id')->get();
                
                for ($i = 1; $i <= 3; $i++) {
                    $existingPhoto = $existingGalleries->skip($i - 1)->first(); // Note: 0-indexed skip
                    $fileInput = 'foto_gallery_' . $i;
                    $removeInput = 'remove_gallery_' . $i;
                    
                    // If user requested removal of this slot (or replaced it)
                    if ($request->input($removeInput) == '1' || $request->hasFile($fileInput)) {
                        if ($existingPhoto) {
                            $oldPath = str_replace('/storage/', '', $existingPhoto->path_foto);
                            Storage::disk('public')->delete($oldPath);
                            $existingPhoto->delete();
                        }
                    }

                    // If a brand new file is provided for this slot
                    if ($request->hasFile($fileInput)) {
                        $pathGallery = $request->file($fileInput)->store('animals/gallery', 'public');
                        $animal->fotoHewan()->create([
                            'path_foto' => '/storage/' . $pathGallery,
                        ]);
                    }
                }
            });

            return redirect()->route('admin.hewan')->with('success', 'Data hewan berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('admin.hewan')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage())->withInput();
        }
    }
}
