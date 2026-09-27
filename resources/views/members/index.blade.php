@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="container">
    <h1>Daftar Anggota Perpustakaan</h1>

    {{-- Alert Flash Message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
        <a href="{{ route('members.create') }}">Tambah Anggota Baru</a>

        {{-- Form Pencarian --}}
        <form action="{{ route('members.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}">
            <button type="submit">Cari</button>
            @if(request('search'))
                <a href="{{ route('members.index') }}">Reset</a>
            @endif
        </form>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $index => $member)
                <tr>
                    <td>{{ $members->firstItem() + $index }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; border: none; background: none; cursor: pointer; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Tidak ada data anggota ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{-- Pagination Links --}}
    <div>
        {{ $members->appends(request()->query())->links() }}
    </div>
</div>
@endsection
