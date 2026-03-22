@extends('layouts.siswa.index')
@section('content')
    <!-- BEGIN: Mobile Search (Hidden on Desktop) -->
    <section>
        <div class="relative w-full">
            <input
                class="w-full pl-10 pr-4 py-3 bg-white border-gray-200 rounded-custom shadow-sm focus:ring-brand focus:border-brand"
                placeholder="Search books..." type="text" />
            <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2"></path>
            </svg>
        </div>
    </section>
    <!-- END: Mobile Search -->
    <div class="mt-2">
        <section data-purpose="categories-section">
            <div class="flex flex-wrap gap-6">

                <!-- Button kategori -->
                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    Fiction
                </button>

                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    Science
                </button>

                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    History
                </button>

                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    Technology
                </button>

                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    Children
                </button>

                <button
                    class="px-4 py-2 border border-blue-500 text-blue-500 text-sm font-semibold rounded-full hover:bg-blue-500 hover:text-white transition">
                    Fantasy
                </button>
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
            @foreach($buku as $book)
            <a href="detail" class="group cursor-pointer">
                <div
                    class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                    <img alt="Book Cover" class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCniJ4VYNshadJJYKcX4SGqgtkTLNCid_W-FxpIowUO0Mya0cczZpgDCApLnuqS_uR3TvK-Usj5dZDxPZc4gbcOUOJTp-z74JIfyHjfCkGETA4s_b7Bs2Ck0uO8AfTOeA1pNWHR20AOGqLwvIieERhhEe1yHvP92tJCd9lHm3iWnehcpw2vD7ID-qmw2Sn0ycb2KBGbpEhVWzvCul_xgKsRQMImkW157ZQgEUY_pEkorTfyZFB-hC-jyiEJ-LvtiiOC07D--TCCGg9r" />
                </div>
                <h4 class="font-bold text-slate-800 text-sm line-clamp-1">{{ $book->judul }}</h4>
                <p class="text-gray-500 text-xs mb-2">{{ $book->penulis }}</p>
                <div class="flex items-center justify-between">
                    <span
                        class="text-[10px] font-bold py-0.5 px-2 bg-green-100 text-green-700 rounded uppercase">Available</span>
                    <button class="text-brand hover:bg-brand-light p-1 rounded-full transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path d="M12 6v6m0 0v6m0-6h6m-6 0H6" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                        </svg>
                    </button>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <!-- END: New Arrivals Grid -->
@endsection
