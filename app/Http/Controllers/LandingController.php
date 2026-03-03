<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Product;

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
}
