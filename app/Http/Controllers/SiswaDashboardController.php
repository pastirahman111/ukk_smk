<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
{
    $buku = Buku::all();
    return view('siswa.index', compact('buku'));
}
}
