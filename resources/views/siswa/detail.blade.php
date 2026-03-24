@extends('layouts.siswa.index')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/3">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="" width="300">
            </div>
            <div class="md:w-2/3">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                <h1 class="text-2xl font-bold mb-4">{{ $buku->judul }}</h1>
                <table class="text-sm text-gray-500 mb-6">
                    <tr>
                        <td class="pr-4 py-1 font-semibold text-gray-700">Penulis</td>
                        <td class="pr-2 py-1">:</td>
                        <td class="py-1">{{ $buku->penulis }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 py-1 font-semibold text-gray-700">Penerbit</td>
                        <td class="pr-2 py-1">:</td>
                        <td class="py-1">{{ $buku->penerbit }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 py-1 font-semibold text-gray-700">Tahun Terbit</td>
                        <td class="pr-2 py-1">:</td>
                        <td class="py-1">{{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 py-1 font-semibold text-gray-700">Stok</td>
                        <td class="pr-2 py-1">:</td>
                        <td class="py-1">{{ $buku->stok }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4 py-1 font-semibold text-gray-700">Kategori</td>
                        <td class="pr-2 py-1">:</td>
                        <td class="py-1">{{ $buku->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                </table>

                @if ($buku->stok > 0)
                    <form action="{{ route('siswa.pinjam', $buku->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-200">
                            Pinjam Buku
                        </button>
                    </form>
                @else
                    <button class="px-8 py-3 bg-gray-300 text-white font-bold rounded-full cursor-not-allowed" disabled>
                        Stok Habis
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection