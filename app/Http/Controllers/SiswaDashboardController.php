<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $kategori_id = $request->query('kategori_id');
        $search = $request->query('search');

        $buku = Buku::when($kategori_id, function ($query, $kategori_id) {
            $query->where('kategori_id', $kategori_id);
        })->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%$search%")
                  ->orWhere('penulis', 'like', "%$search%");
            });
        })->get();

        return view('siswa.index', compact('buku', 'kategori', 'kategori_id', 'search'));
    }

    public function profile()
    {
        $user = auth()->user();
        $siswa = Siswa::where('user_id', $user->id)->firstOrFail();
        $transaksi = Transaksi::where('user_id', $user->id)->with('buku')->latest()->get();
        return view('siswa.profile', compact('user', 'siswa', 'transaksi'));
    }

    public function pinjam(Buku $buku)
    {
        // Check if student already has a pending or borrowed copy of this book
        $exists = Transaksi::where('user_id', auth()->id())
            ->where('buku_id', $buku->id)
            ->whereIn('status', ['menunggu', 'dipinjam'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Anda sudah meminjam atau sedang menunggu persetujuan untuk buku ini.');
        }

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        Transaksi::create([
            'user_id' => auth()->id(),
            'buku_id' => $buku->id,
            'tanggal_pinjam' => now(),
            'status' => 'menunggu',
        ]);

        return back()->with('success', 'Berhasil melakukan permintaan peminjaman. Silahkan tunggu persetujuan admin.');
    }
}
