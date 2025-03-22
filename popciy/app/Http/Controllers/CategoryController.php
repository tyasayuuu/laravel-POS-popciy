<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'biaya_tambahan' => 'required|integer|min:0'
        ]);

        Category::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->validate([
            'name' => 'required|string|max:255',
            'biaya_tambahan' => 'required|integer|min:0'
        ]));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }



    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
