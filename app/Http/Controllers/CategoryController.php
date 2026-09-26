<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category; // Wajib ditambahkan untuk memanggil Model Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil data dari database, dibatasi 10 data per halaman (pagination)
        $categories = Category::paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        // Menyimpan data beneran ke dalam database
        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', "Kategori \"{$validated['nama_kategori']}\" berhasil ditambahkan.");
    }

    public function edit(string $id)
    {
        // Mencari kategori berdasarkan ID, jika tidak ada akan muncul error 404
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        // Validasi inputan update
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        // Memperbarui data di database
        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', "Kategori \"{$validated['nama_kategori']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Menghapus data dari database
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
