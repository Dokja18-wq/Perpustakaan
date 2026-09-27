<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // File: app/Http/Controllers/MemberController.php
private array $members = [
    ['id' => 1, 'nama' => 'Ryan Adi Pratama', 'nim' => '3125600097', 'email' => 'dokja@pens.ac.id', 'nomor_telepon' => '085780107552', 'status' => 'aktif'],
    ['id' => 2, 'nama' => 'Athiqa Fairuz Nur Khalisa', 'nim' => '3125600121', 'email' => 'soyoung@pens.ac.id', 'nomor_telepon' => '085157881252', 'status' => 'aktif'],
    ['id' => 3, 'nama' => 'M. Ezra Athallah', 'nim' => '31256000138', 'email' => 'junghyuk@pens.ac.id', 'nomor_telepon' => '085745332491', 'status' => 'nonaktif'],
];

public function index()
{
    $members = session('members', $this->members);

    return view('members.index', compact('members'));
}

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        $members = session('members', $this->members);
        $validated['id'] = count($members) + 1;
        $members[] = $validated;

        session(['members' => $members]);

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}
