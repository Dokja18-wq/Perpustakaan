@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="container">
    <h1>Tambah Anggota Baru</h1>
    <a href="{{ route('members.index') }}">← Kembali ke daftar</a>
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

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
        <br>
        <div>
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}">
        </div>
        <br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <br>
        <div>
            <label for="nomor_telepon">Nomor Telepon:</label><br>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
        </div>
        <br>
        <div>
            <label for="alamat">Alamat:</label><br>
            <textarea id="alamat" name="alamat">{{ old('alamat') }}</textarea>
        </div>
        <br>
        <div>
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
</div>
@endsection
