<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('user')->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $user = User::where('role','siswa')
                    ->whereNotIn('id', Siswa::pluck('user_id'))
                    ->get();
        return view('admin.siswa.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        $user = User::where('role','siswa')->get();
        return view('admin.siswa.edit', compact('siswa', 'user'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'user_id' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete($siswa->id);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }

    public function detail($id)
    {
        $buku = Buku::findOrFail($id);
        return view('siswa.detail', compact('buku'));
    }
}
