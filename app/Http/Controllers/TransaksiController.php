<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaksi::with(['user', 'buku']);

        if ($request->has('tanggal_mulai') && $request->has('tanggal_akhir') && $request->tanggal_mulai != '' && $request->tanggal_akhir != '') {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $transaksi = $query->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function exportExcel(Request $request)
    {
        $query = Transaksi::with(['user', 'buku']);

        if ($request->has('tanggal_mulai') && $request->has('tanggal_akhir') && $request->tanggal_mulai != '' && $request->tanggal_akhir != '') {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $transaksi = $query->get();

        return Excel::download(new TransaksiExport($transaksi), 'laporan_transaksi.xlsx');
    }

    public function print(Request $request)
    {
        $query = Transaksi::with(['user', 'buku']);

        if ($request->has('tanggal_mulai') && $request->has('tanggal_akhir') && $request->tanggal_mulai != '' && $request->tanggal_akhir != '') {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $transaksi = $query->get();
        return view('admin.transaksi.print', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 'siswa')->get();
        $buku = Buku::all();
        return view('admin.transaksi.create', compact('user', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required',
            'buku_id'           => 'required',
            'tanggal_pinjam'    => 'required',
            'tanggal_kembali'   => 'nullable',
            'status'            => 'required'
        ]);

        $Transaksi = Transaksi::create([
            'user_id'          => $request->user_id,
            'buku_id'           => $request->buku_id,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'tanggal_kembali'   => $request->tanggal_kembali,
            'status'            => $request->status
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $user = User::where('role', 'siswa')->get();
        $buku = Buku::all();
        return view('admin.transaksi.edit', compact('transaksi', 'user', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'user_id'           => 'required',
            'buku_id'           => 'required',
            'tanggal_pinjam'    => 'required',
            'tanggal_kembali'   => 'nullable',
            'status'            => 'required'
        ]);

        $transaksi->update([
            'user_id'           => $request->user_id,
            'buku_id'           => $request->buku_id,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'tanggal_kembali'   => $request->tanggal_kembali,
            'status'            => $request->status
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete($transaksi->id);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
