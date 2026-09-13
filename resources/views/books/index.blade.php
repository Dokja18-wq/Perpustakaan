<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}">+ Tambah Buku</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>ISBN</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['penerbit'] }}</td>
                    <td>{{ $book['tahun_terbit'] }}</td>
                    <td>{{ $book['isbn'] }}</td>
                    <td>{{ $book['stok'] }}</td>
                    <td>{{ $book['kategori'] }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book['id']) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Tidak ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
