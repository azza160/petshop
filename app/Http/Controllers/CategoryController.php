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
}
