<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil 5 hewan favorit (field: isFavorite)
        $topAnimals = Animal::with('category')
            ->where('isFavorite', true)
            ->latest()
            ->take(5)
            ->get();

        // Ambil 5 produk favorit (field: is_favorit)
        $topProducts = Product::with('category')
            ->where('is_favorit', true)
            ->latest()
            ->take(5)
            ->get();

        return view('Landing.landing', compact('topAnimals', 'topProducts'));
    }

    public function listHewan(Request $request)
    {
        $search      = $request->input('search');
        $kategoriId  = $request->input('kategori', 'semua');
        $jenisKelamin = $request->input('jenis_kelamin', 'semua');
        $asalHewan   = $request->input('asal_hewan', 'semua');

        // Categories for the filter dropdown
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

        $query->orderBy('created_at', 'desc');

        $animals = $query->paginate(8)->withQueryString();

        return view('Landing.list-hewan', compact(
            'animals', 'categories', 'search',
            'kategoriId', 'jenisKelamin', 'asalHewan'
        ));
    }

    public function detailHewan($id)
    {
        $hewan = Animal::with(['category', 'fotoHewan'])->findOrFail($id);
        
        return view('Landing.detail-hewan', compact('hewan'));
    }

    public function listProduct(Request $request)
    {
        $search     = $request->input('search');
        $kategoriId = $request->input('kategori', 'semua');
        $urutan     = $request->input('urutan', 'terbaru'); 

        // Categories for the filter dropdown
        $categories = Category::where('tipe', 'produk')->get();

        $query = Product::with('category');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        if ($kategoriId && $kategoriId !== 'semua') {
            $query->where('kategori_id', $kategoriId);
        }

        if ($urutan === 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(2)->withQueryString();

        return view('Landing.list-product', compact(
            'products', 'categories', 'search',
            'kategoriId', 'urutan'
        ));
    }

    public function detailProduct($id)
    {
        $produk = Product::with(['category', 'galeri'])->findOrFail($id);
        
        return view('Landing.detail-product', compact('produk'));
    }

    public function login()
    {
        return view('Landing.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
