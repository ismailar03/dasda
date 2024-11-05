<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::all(); // Mengambil semua kategori dari database
        return view('categories.index', compact('categories')); // Menampilkan ke view
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('categories.create'); // Menampilkan form pembuatan kategori
    }

    // Menyimpan kategori ke dalam database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100', // Validasi nama kategori
        ]);

        Category::create([
            'name' => $validated['name'],
            'user_id' => auth()->id(), // Menyimpan user_id yang sedang login
        ]);

        return redirect()->route('categories.index'); // Redirect ke halaman kategori
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Mengupdate kategori
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $category->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('categories.index');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
