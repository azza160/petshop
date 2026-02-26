<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tipe   = $request->input('tipe');
        $sort   = $request->input('sort', 'terbaru');

        $query = Category::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        if ($tipe && $tipe !== 'semua') {
            $query->where('tipe', $tipe);
        }

        $order = $sort === 'terlama' ? 'asc' : 'desc';
        $query->orderBy('created_at', $order);

        $categories = $query->paginate(10)->withQueryString();

        return view('Admin.category', compact('categories', 'search', 'tipe', 'sort'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:categories,nama',
            'tipe' => 'required|in:hewan,produk',
        ], [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.unique'   => 'Nama kategori sudah ada.',
            'nama.max'      => 'Nama kategori maksimal 100 karakter.',
            'tipe.required' => 'Tipe kategori wajib dipilih.',
            'tipe.in'       => 'Tipe harus hewan atau produk.',
        ]);

        Category::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:categories,nama,' . $category->id,
            'tipe' => 'required|in:hewan,produk',
        ], [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.unique'   => 'Nama kategori sudah ada.',
            'nama.max'      => 'Nama kategori maksimal 100 karakter.',
            'tipe.required' => 'Tipe kategori wajib dipilih.',
            'tipe.in'       => 'Tipe harus hewan atau produk.',
        ]);

        $category->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus.');
    }
}
