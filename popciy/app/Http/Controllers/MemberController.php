<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create() {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        Member::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        $member->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Member $member) {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus.');
    }
}
