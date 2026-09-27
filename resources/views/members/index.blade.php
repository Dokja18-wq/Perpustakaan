@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="container">
    <h1>Daftar Anggota Perpustakaan</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('members.create') }}">Tambah Anggota Baru</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
