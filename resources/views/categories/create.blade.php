@extends('layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="container">
    <a href="{{ route('categories.index') }}">← Kembali ke daftar</a>
    <br><br>

    <h1>Tambah Kategori Baru</h1>

    {{-- Alert error validasi ringkasan (jika ada) --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama_kategori">Nama Kategori:</label><br>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Simpan Kategori</button>
    </form>
</div>
@endsection
