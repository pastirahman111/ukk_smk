<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalkategori  = Kategori::count();
        $totalbuku  = Buku::count();
        $totalsiswa  = Siswa::count();

        return view('admin.dashboard', compact('totalkategori','totalbuku','totalsiswa'));
    }
}
