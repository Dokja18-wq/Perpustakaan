<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a>
    <br><br>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="judul">Judul Buku</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
            @error('judul')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penulis">Penulis</label><br>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penerbit">Penerbit</label><br>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="tahun_terbit">Tahun Terbit</label><br>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="isbn">ISBN (opsional)</label><br>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
            @error('isbn')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok" value="{{ old('stok') }}">
            @error('stok')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
