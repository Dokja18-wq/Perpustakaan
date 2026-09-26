<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book; // Memanggil Model Book
use App\Models\Category; // Memanggil Model Category untuk dropdown relasi
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil data buku dengan pagination 10 data per halaman
        $books = Book::paginate(10);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Mengambil semua data kategori untuk dimunculkan di dropdown pilihan
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        // Menyimpan data buku baru ke database
        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['judul']}\" berhasil ditambahkan.");
    }

    public function show(string $id)
    {
        // Mencari detail buku
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        // Mencari data buku yang mau diedit
        $book = Book::findOrFail($id);

        // Memanggil daftar kategori untuk merender ulang opsi dropdown
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        // Validasi inputan form update
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'penulis' => 'required|string|max:100',
            'penerbit' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'nullable|string|max:20',
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id', // Memastikan ID kategori benar-benar ada di tabel categories
        ]);

        // Menyimpan perubahan ke database
        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['judul']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        // Menghapus data buku
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
