<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'kelas' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        // simpan ke users
        $user = User::create([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'role'      => 'siswa'
        ]);

        // simpan ke siswa
        Siswa::create([
            'user_id'   => $user->id,
            'kelas'     => $request->kelas,
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat
        ]);

        return redirect('login')->with('success', 'Registrasi berhasil!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {

            // cek role
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/siswa/index');
            }
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
