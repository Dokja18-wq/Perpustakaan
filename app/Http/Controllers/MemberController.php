<?php

namespace App\Http\Controllers;

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
    $members = $this->members;

    return view('members.index', compact('members'));
}

    public function create()
    {
        return 'MemberController@create';
    }

    public function store(Request $request)
    {
        return 'MemberController@store';
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
