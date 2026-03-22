<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LendRead - Your Book Lending Community</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- BEGIN: Tailwind Configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
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
    @include('layouts.siswa.navbar')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-12">
        @yield('content')
    </main>
    @include('layouts.siswa.footer')
</body>

</html>
