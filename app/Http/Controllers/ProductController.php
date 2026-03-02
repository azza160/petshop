<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $produk = Product::with(['category', 'galeri'])->findOrFail($id);

        return view('Admin.detail-product', compact('produk'));
    }
}
