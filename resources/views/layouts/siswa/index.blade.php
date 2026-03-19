<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LendRead - Your Book Lending Community</title>
    <!-- BEGIN: External Resources -->
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS v3 with Plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- BEGIN: Tailwind Configuration -->
    <script data-purpose="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#309ce8',
                            dark: '#257ab8',
                            light: '#ebf5fd',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    borderRadius: {
                        'custom': '8px',
                    }
                }
            }
        }

    </script>
    <!-- END: Tailwind Configuration -->
    <style data-purpose="custom-layout">
        /* Custom scrollbar for horizontal carousel */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .book-card-shadow {
            box-shadow: 0 4px 20px -2px rgba(48, 156, 232, 0.15);
        }

        .category-card:hover {
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }

    </style>
</head>

<body class="bg-gray-50 font-sans text-slate-900 antialiased">
    <!-- BEGIN: Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-brand rounded-custom flex items-center justify-center text-white font-bold">L
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-800">LendRead</span>
            </div>
            <!-- Primary Search Bar -->
            <div class="hidden md:flex flex-1 max-w-md mx-8">
                <div class="relative w-full">
                    <input
                        class="w-full pl-10 pr-4 py-2 bg-gray-100 border-none rounded-custom focus:ring-2 focus:ring-brand transition-all text-sm"
                        placeholder="Search by title, author, or ISBN..." type="text" />
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                        viewbox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-gray-500 hover:text-brand transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </button>
                <div
                    class="w-10 h-10 rounded-full bg-brand-light border-2 border-brand flex items-center justify-center overflow-hidden">
                    <span class="text-xs font-bold text-brand">JD</span>
                </div>
            </div>
        </nav>
    </header>
    <!-- END: Navigation Header -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-12">
        <!-- BEGIN: Mobile Search (Hidden on Desktop) -->
        <section class="md:hidden">
            <div class="relative w-full">
                <input
                    class="w-full pl-10 pr-4 py-3 bg-white border-gray-200 rounded-custom shadow-sm focus:ring-brand focus:border-brand"
                    placeholder="Search books..." type="text" />
                <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                    viewbox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                </svg>
            </div>
        </section>
        <!-- END: Mobile Search -->
        <!-- BEGIN: Featured Carousel -->
        <section data-purpose="featured-books">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-slate-800">Featured Readings</h2>
                <a class="text-brand font-semibold text-sm hover:underline" href="#">View All</a>
            </div>
            <div class="flex gap-6 overflow-x-auto pb-4 hide-scrollbar snap-x">
                <!-- Featured Card 1 -->
                <div class="flex-none w-[300px] sm:w-[400px] snap-start">
                    <div class="relative h-56 rounded-custom overflow-hidden group">
                        <img alt="Featured Book"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAizk4B8md7hlbghZgMmf5dXYD2A48vyyv2Fm_s7akpIqUrkai_xMMqlPm2SKBslKyOvP21KLDddxOe6kQCRRrCqGpMKxWfcDrWOyABeS3IRR7tYJ3HXHytprJRf7Pzfi_9wqYWQd-RqOzCSlqdVnSCNXPuta5wiKx8YbqtVNVOxHL7Dg71RKVZab0b_L6Em0Sl_sU8BaH-feOv4Ui_ltiDVxQNJu3YG4q79N-as8u4gXzDVD0hSnJaY7v5LNlbUpRqLTCzNHNMvlke" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <span
                                class="bg-brand text-white text-[10px] font-bold px-2 py-1 rounded-full w-fit mb-2 uppercase tracking-wider">Book
                                of the Week</span>
                            <h3 class="text-white text-xl font-bold">The Art of Extreme Focus</h3>
                            <p class="text-gray-200 text-sm">By Marcus Thorne</p>
                        </div>
                    </div>
                </div>
                <!-- Featured Card 2 -->
                <div class="flex-none w-[300px] sm:w-[400px] snap-start">
                    <div class="relative h-56 rounded-custom overflow-hidden group">
                        <img alt="Featured Book"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCbqCnW-Gj2oyD5JWNfYbXap8NMlJZhh13gSavSMNMKw1XbYEEu55NOPkjcM97aUhElPI5p9WLsgTIp8grOXu1F0SgOXukae4GB7kqXLWt_VCx2aID1UBQI8WR6HT9yk0Vth2dm9JPGS8-2Oi74KLiJYARzbqYMUS6XE_WCjI45YSHwI2mTFnulAluRchrQdaSUl7v4y3f8achz0JD8Miaxz-Q0kPvFEtbsMvGhXxguh9p1N_UkRaYggXDEQPa6wVnSf7uIY835b-pM" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <span
                                class="bg-white/20 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full w-fit mb-2 uppercase tracking-wider">Curated</span>
                            <h3 class="text-white text-xl font-bold">Modern European History</h3>
                            <p class="text-gray-200 text-sm">By Elena Petrov</p>
                        </div>
                    </div>
                </div>
                <!-- Featured Card 3 -->
                <div class="flex-none w-[300px] sm:w-[400px] snap-start">
                    <div class="relative h-56 rounded-custom overflow-hidden group">
                        <img alt="Featured Book"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxAwU6JKjUZ4gXjJYVx3aZZyLGlG6zwf3iXubSZgMfqlwXlbl8lyzThJAz_OMcBxieiRaLbMZ6SL4yHJQINpNyUxkCaWMuilveuQaVMwC8AN-vI61NvRoNOVPZVF_ALYAhAjR2TXkXygMfdQ5MJoR-chkrHmb_hf8us3FbalLCIcT5Qti4NHaVfvxitqVqdyKqCXB_gH-BDiVZw03IUqHA8D2oqS6pGIathDKw2N0bJnZA-965dinBK0QsS0L36zKgzimrfEdNGMlJ" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <span
                                class="bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-full w-fit mb-2 uppercase tracking-wider">Trending</span>
                            <h3 class="text-white text-xl font-bold">Quantum Mechanics Simplified</h3>
                            <p class="text-gray-200 text-sm">By Dr. David Chen</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Featured Carousel -->
        <!-- BEGIN: Categories -->
        <section data-purpose="categories-section">
            <h2 class="text-xl font-bold text-slate-800 mb-6">Explore Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">Fiction</span>
                </a>
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.642.321a6 6 0 01-3.86.517l-2.388-.477a2 2 0 00-1.022.547l-1.168 1.168a2 2 0 002.828 2.828l1.168-1.168a2 2 0 012.828 0l1.168 1.168a2 2 0 002.828-2.828l-1.168-1.168a2 2 0 010-2.828l1.168-1.168a2 2 0 00-2.828-2.828l-1.168 1.168a2 2 0 01-2.828 0l-1.168-1.168a2 2 0 00-2.828 2.828l1.168 1.168z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">Science</span>
                </a>
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">History</span>
                </a>
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">Technology</span>
                </a>
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">Children</span>
                </a>
                <a class="category-card flex flex-col items-center p-4 bg-white rounded-custom border border-gray-100 shadow-sm text-center group"
                    href="#">
                    <div
                        class="w-12 h-12 mb-3 bg-brand-light text-brand rounded-full flex items-center justify-center group-hover:bg-brand group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold text-sm">Fantasy</span>
                </a>
            </div>
        </section>
        <!-- END: Categories -->
        <!-- BEGIN: New Arrivals Grid -->
        <section data-purpose="new-arrivals">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-slate-800">New Arrivals</h2>
                <div class="flex items-center gap-2">
                    <button class="p-2 bg-white rounded-custom border border-gray-200 text-gray-400 hover:text-brand">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </button>
                    <span class="text-sm font-medium text-gray-500">Latest First</span>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <!-- Book Card 1 -->
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img alt="Book Cover" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCniJ4VYNshadJJYKcX4SGqgtkTLNCid_W-FxpIowUO0Mya0cczZpgDCApLnuqS_uR3TvK-Usj5dZDxPZc4gbcOUOJTp-z74JIfyHjfCkGETA4s_b7Bs2Ck0uO8AfTOeA1pNWHR20AOGqLwvIieERhhEe1yHvP92tJCd9lHm3iWnehcpw2vD7ID-qmw2Sn0ycb2KBGbpEhVWzvCul_xgKsRQMImkW157ZQgEUY_pEkorTfyZFB-hC-jyiEJ-LvtiiOC07D--TCCGg9r" />
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">The Great Gatsby</h4>
                    <p class="text-gray-500 text-xs mb-2">F. Scott Fitzgerald</p>
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
                </div>
                <!-- Book Card 2 -->
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img alt="Book Cover" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDL_Vg2QUMhLVV5t3q8ueftdvZirYlN-kDprAW5kmlefcdxF_3bfwhD5vJfMWJXD49o6uMNANXiHlM__fsya-5zNEfIT1yGnovYQqtfrN2jkPqNNVRgfIPax7g0S_6Y0cgE2l7J9lFj8QEZhDsAOgjTFd2_l7b49YZLiMpl4cPtLfogwmNCtMHE9o4LDcOQQY-cX7xoNeakelR3CmD48Rd3ci3yhtRwh1SKo0rbJOpA27aIvWXppVb8szOQc2IMtMc6x_16xhleanLj" />
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">Sapiens: A Brief History</h4>
                    <p class="text-gray-500 text-xs mb-2">Yuval Noah Harari</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold py-0.5 px-2 bg-amber-100 text-amber-700 rounded uppercase">On
                            Loan</span>
                        <button class="text-brand hover:bg-brand-light p-1 rounded-full transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                <path d="M12 6v6m0 0v6m0-6h6m-6 0H6" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Book Card 3 -->
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img alt="Book Cover" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWGSuOVWDZ556i4n_q-t5gjLeBwQEKitvoyKjbzqxsq7Giu3yPQ0ywhpUR9_1zMJoLxh58pjSW0lKPKKwefYYw43P-9ceElz85hjCSWx8Rm4oCDGPmkvtxWrZaA-865-k2gTQc7sXleA0jYBL4rpJPwkrW1Ee9Zat3ABwBzHt3R1Z1QhinZEA9xaBXA0ZZMzL7FS7MtlFstfIJJopU1wt-KRksM9phwLF4AJSaJa0BfEUwStI2McE8Ph6kWVeJ9iAy5rzyw5VWWOih" />
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">1984</h4>
                    <p class="text-gray-500 text-xs mb-2">George Orwell</p>
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
                </div>
                <!-- Book Card 4 -->
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img alt="Book Cover" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0DJIG8oaEGBX78rOVt9MatRp9c4kMvi6tDUBYpGR07rZ0SGG9nIMF8mZmfGP2_oJ8mqm85rIXc4uoZs8K3J-H7xf32Z9M4Yo7wT0POLZ3KLUdYFlerwPkKpupaDFK0juuhIE6A3Sak5AR35x5trT8-t6EHwc_1P3hITBM9kdtYM_EY06hZ8czCWEM12BV29VpS8UXn1iieAIEoHw-IVZtv3fXzmtWHS3pdJIt9vEB-dC4Zi-qm5WZ_zd6s2JYgxlGm5gjCNGdQBQJ" />
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">The Hobbit</h4>
                    <p class="text-gray-500 text-xs mb-2">J.R.R. Tolkien</p>
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
                </div>
                <!-- Book Card 5 -->
                <div class="group cursor-pointer">
                    <div
                        class="aspect-[3/4] rounded-custom overflow-hidden mb-3 book-card-shadow transition-transform group-hover:-translate-y-1">
                        <img alt="Book Cover" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8kE4EhWe9iOAz2O2P1Qn2Czj1NcmHyjq3e3nr1O_61-YFe01jozFEVD0I8wcZ8xuvRJFGl5NdmRS1ilEpIvoyTwZ9YUqlB4kNeFxWGPg4gi_xZT_ghY6xDcse-tHaJQOC2KvN1tc_DWdieCYyXnglrH5ufM2yyy8lQVGGFBx7KWEk8ObzqKTyawnLjB73CYpY4iZ3cmoIECXv9ajGj3xBq4PLrHCPYtzoYQKCZtzHr5bTKa6UanUYMfbgBoKFrHIM7jsg0l933I4L" />
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">Dune</h4>
                    <p class="text-gray-500 text-xs mb-2">Frank Herbert</p>
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
                </div>
            </div>
        </section>
        <!-- END: New Arrivals Grid -->
    </main>
    <!-- BEGIN: Bottom Nav (Mobile) -->
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-100 md:hidden px-6 py-3 flex justify-between items-center z-50">
        <button class="flex flex-col items-center gap-1 text-brand">
            <svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
            </svg>
            <span class="text-[10px] font-bold">Home</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
            <span class="text-[10px] font-bold">Library</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
            <span class="text-[10px] font-bold">Community</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"></path>
            </svg>
            <span class="text-[10px] font-bold">Profile</span>
        </button>
    </div>
    <!-- END: Bottom Nav (Mobile) -->
</body>

</html>
