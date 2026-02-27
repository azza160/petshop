<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $query = Animal::with('category');

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
}
