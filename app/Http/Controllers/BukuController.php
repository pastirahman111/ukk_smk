<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required',
            'cover'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis'       => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required',
            'stok'          => 'required',
            'kategori_id'   => 'required',
        ]);

        $cover = null;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('cover', 'public');
        }

        $buku = Buku::create([
            'judul'         => $request->judul,
            'cover'         => $cover,
            'penulis'       => $request->penulis,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'stok'          => $request->stok,
            'kategori_id'   => $request->kategori_id,
        ]);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'         => 'required',
            'cover'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis'       => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required',
            'stok'          => 'required',
            'kategori_id'   => 'required',
        ]);

        $cover = $buku->cover;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('cover', 'public');
        }

        $buku->update([
            'judul'         => $request->judul,
            'cover'         => $cover,
            'penulis'       => $request->penulis,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'stok'          => $request->stok,
            'kategori_id'   => $request->kategori_id,
        ]);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete('cover');
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
