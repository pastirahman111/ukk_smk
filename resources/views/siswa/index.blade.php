@extends('layouts.siswa.index')
@section('content')
    <!-- BEGIN: Mobile Search (Hidden on Desktop) -->
    <section>
        <form action="{{ route('siswa.index') }}" method="GET">
            <div class="relative w-full">
                <input 
                    type="text" 
                    name="search"
                    class="w-full pl-10 pr-4 py-3 bg-white border-gray-200 rounded-custom shadow-sm focus:ring-brand focus:border-brand"
                    placeholder="Cari Buku..." 
                    value="{{ request('search') }}" />

                <svg 
                    class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" 
                    fill="none" 
                    stroke="currentColor"
                    viewbox="0 0 24 24">
                    <path 
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"
                        stroke-width="2">
                    </path>
                </svg>
            </div>
        </form>
    </section>
    <!-- END: Mobile Search -->
    <div class="mt-2">
        <section data-purpose="categories-section">
            <div class="flex flex-wrap gap-6">

                <!-- Button kategori -->
                <a href="{{ route('siswa.index') }}"
                    class="px-4 py-2 border border-blue-500 text-sm font-semibold rounded-full transition
                    {{ !$kategori_id ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-500 hover:text-white' }}">
                    Semua
                </a>
                @foreach ($kategori as $kat)
                    <a href="{{ route('siswa.index', ['kategori_id' => $kat->id]) }}"
                        class="px-4 py-2 border border-blue-500 text-sm font-semibold rounded-full transition
                    {{ $kategori_id == $kat->id ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-blue-500 hover:text-white' }}">
                        {{ $kat->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </section>
    </div>
    <!-- BEGIN: New Arrivals Grid -->
    <section data-purpose="new-arrivals">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-800">Buku All</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <!-- Book Card 1 -->
            @foreach ($buku as $book)
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="" width="300">
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">{{ $book->judul }}</h4>
                    <p class="text-gray-500 text-xs mb-2">{{ $book->penulis }}</p>
                    <p class="text-gray-500 text-xs mb-2">{{ $book->stok }}</p>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('siswa.detail', $book->id) }}"
                            class="text-[10px] font-bold py-0.5 px-2 bg-green-100 text-green-700 rounded uppercase">
                            Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- END: New Arrivals Grid -->
@endsection
