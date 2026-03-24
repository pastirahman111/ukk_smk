    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold tracking-tight text-slate-800">Peminjaman Buku Digital</span>
            </div>
            <a href="{{ route('profile.siswa') }}" class="flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-full bg-brand-light border-2 border-brand flex items-center justify-center overflow-hidden">
                    <span class="text-xs font-bold text-brand">{{ strtoupper(substr(Auth::user()->nama, 0, 1))}}</span>
                </div>
            </a>
        </nav>
    </header>