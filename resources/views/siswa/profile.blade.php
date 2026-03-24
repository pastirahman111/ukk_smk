@extends('layouts.siswa.index')
@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-blue-600 h-32"></div>
            <div class="px-8 pb-8">
                <div class="relative flex justify-between items-end -mt-12 mb-6">
                    <div class="w-24 h-24 rounded-2xl bg-white p-1 shadow-sm">
                        <div
                            class="w-full h-full rounded-xl bg-blue-100 flex items-center justify-center text-3xl font-bold text-blue-600">
                            {{ strtoupper(substr($user->nama, 0, 1)) }}
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800">{{ $user->nama }}</h1>
                        <p class="text-gray-500">Student Account</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Account Information
                            </h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between py-2 border-b border-gray-50">
                                    <span class="text-gray-500">Username</span>
                                    <span class="font-medium text-slate-700">{{ $user->username }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-50">
                                    <span class="text-gray-500">Role</span>
                                    <span class="font-medium text-slate-700 capitalize">{{ $user->role }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Student Details</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between py-2 border-b border-gray-50">
                                    <span class="text-gray-500">Class</span>
                                    <span class="font-medium text-slate-700">{{ $siswa->kelas }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-50">
                                    <span class="text-gray-500">Phone</span>
                                    <span class="font-medium text-slate-700">{{ $siswa->no_hp }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-50">
                                    <span class="text-gray-500">Address</span>
                                    <span class="font-medium text-slate-700 text-right">{{ $siswa->alamat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Buku yang Dipinjam</h3>
                        <div class="space-y-4">
                            @if($transaksi->count() > 0)
                                @foreach($transaksi as $item)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-16 rounded shadow-sm overflow-hidden flex-shrink-0">
                                                <img src="{{ asset('storage/' . $item->buku->cover) }}" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800 text-sm">{{ $item->buku->judul }}</p>
                                                <p class="text-xs text-gray-500">Pinjam: {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            @if($item->status == 'menunggu')
                                                <span class="px-3 py-1 bg-yellow-100 text-yellow-600 text-xs font-bold rounded-full">Menunggu Admin</span>
                                            @elseif($item->status == 'dipinjam')
                                                <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full">Sedang Dipinjam</span>
                                            @else
                                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">Sudah Dikembalikan</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-6 text-gray-400 italic text-sm">
                                    Belum ada riwayat peminjaman buku.
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-6 py-2 bg-red-50 text-red-600 font-semibold rounded-full hover:bg-red-100 transition duration-200">
                                Logout Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
