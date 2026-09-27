@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container">
    <h1>Tambah Buku Baru</h1>
    <a href="{{ route('books.index') }}">← Kembali ke daftar</a>
    <br><br>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul">Judul Buku:</label><br>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
            @error('judul')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="penulis">Penulis:</label><br>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="penerbit">Penerbit:</label><br>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="tahun_terbit">Tahun Terbit:</label><br>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Simpan Buku</button>
    </form>
</div>
@endsection
