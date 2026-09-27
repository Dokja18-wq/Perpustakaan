@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<div class="container">
    <a href="{{ route('members.index') }}">← Kembali ke daftar</a>
    <br><br>

    <h1>Detail Anggota</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('members.edit', $member->id) }}">Edit Data Ini</a>
</div>
@endsection
