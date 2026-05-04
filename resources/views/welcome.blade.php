<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nigramesa - Ekosistem Botani Modern</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .leaf-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2310b981' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-900 bg-white selection:bg-emerald-500 selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)" :class="{ 'bg-white/90 backdrop-blur-md shadow-sm py-4': scrolled, 'bg-transparent py-6': !scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                        <div class="bg-emerald-600 text-white p-2 rounded-lg shadow-emerald flex items-center justify-center transform group-hover:rotate-12 transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16c1.5-3 5-4 8-1 2.5-3 6.5-2 8 2 0 4-4 7-9 7-3.5 0-7-2-7-8z"></path>
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12"></path>
                            </svg>
                        </div>
                        <span class="font-extrabold text-2xl tracking-tight text-emerald-900 drop-shadow-sm transition-colors" :class="{ 'text-emerald-900': scrolled, 'text-white': !scrolled }">Nigramesa</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8 items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 transition relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-emerald-500 after:transition-all after:duration-300 bg-white px-5 py-2 rounded-full shadow-sm">
                                Beranda Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="font-medium transition hover:opacity-80" :class="{ 'text-gray-700': scrolled, 'text-white': !scrolled }">Masuk</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-emerald-600 text-white font-semibold px-6 py-2.5 rounded-full hover:bg-emerald-500 hover:shadow-lg shadow-emerald-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
                                    Mulai Bergabung
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-emerald-950">
        <!-- Background Video/Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://jambu.id/wp-content/uploads/2024/01/pasarmikro-slider-bg-pertanian-berkelanjutan-57-1920p-990p.jpg" class="w-full h-full object-cover opacity-60 mix-blend-overlay" alt="Hero Image">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-emerald-950/60 to-emerald-950"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-950 via-emerald-900/50 to-transparent"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-start translate-y-12">
            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" class="max-w-3xl">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold tracking-wide text-emerald-200 bg-emerald-800/50 border border-emerald-500/30 mb-6 backdrop-blur-sm opacity-0 translate-y-4 transition-all duration-700 ease-out" :class="show ? 'opacity-100 translate-y-0' : ''">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    Versi 1.0 Tersedia Sekarang
                </span>

                <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6 opacity-0 translate-y-8 transition-all duration-1000 delay-100 ease-out drop-shadow-lg" :class="show ? 'opacity-100 translate-y-0' : ''">
                    Masa Depan <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-green-500">Agrikultur Pintar</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-10 max-w-2xl leading-relaxed opacity-0 translate-y-8 transition-all duration-1000 delay-300 ease-out text-shadow-sm" :class="show ? 'opacity-100 translate-y-0' : ''">
                    Menggabungkan literasi botani mendalam, katalog pertanian premium, dan interaksi nyata untuk ekosistem hijau yang lebih baik.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 opacity-0 translate-y-8 transition-all duration-1000 delay-500 ease-out" :class="show ? 'opacity-100 translate-y-0' : ''">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-emerald-900 bg-white rounded-full shadow-lg shadow-white/10 hover:shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 transition-all duration-300 border border-transparent">
                            Akses Ruang Kerja
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-emerald-600 rounded-full shadow-lg shadow-emerald-500/30 hover:bg-emerald-500 hover:shadow-xl hover:shadow-emerald-500/40 transform hover:-translate-y-1 transition-all duration-300 border border-transparent">
                            Mulai Perjalanan Anda
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-emerald-100 bg-emerald-900/50 backdrop-blur-md rounded-full border border-emerald-500/30 hover:bg-emerald-800/60 transform hover:-translate-y-1 transition-all duration-300">
                            Punya Akun? Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Decorative curved separator at bottom -->
        <div class="absolute bottom-0 w-full leading-none z-10 text-white">
            <svg class="block w-full h-12 md:h-24 lg:h-32" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,120.21,189.6,108.97,233.15,100.56,275.52,79.8,321.39,56.44Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-white leaf-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-sm font-bold text-emerald-600 tracking-wider uppercase mb-2">Mengapa Nigramesa?</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Semua yang Anda butuhkan untuk berkembang
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kombinasi literasi mendalam dan alat praktis untuk merawat hobi dan bisnis botani Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="relative bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="absolute -top-6 left-8 bg-emerald-500 rounded-2xl p-4 shadow-lg text-white group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Literasi & Ensiklopedia</h3>
                        <p class="text-gray-600 leading-relaxed">Penyimpanan tak terbatas atas jurnal botani, cara merawat tanaman langka, hingga PDF edukasi gratis.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="relative bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="absolute -top-6 left-8 bg-emerald-500 rounded-2xl p-4 shadow-lg text-white group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Katalog Produk Premium</h3>
                        <p class="text-gray-600 leading-relaxed">Berbelanja bibit unggul, pupuk murni, dan alat tani dengan mudah melalui katalog canggih dengan filter real-time.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="relative bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="absolute -top-6 left-8 bg-emerald-500 rounded-2xl p-4 shadow-lg text-white group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Video Pembelajaran</h3>
                        <p class="text-gray-600 leading-relaxed">Tonton koleksi video edukasi agrikultur kapan saja dengan pengalaman belajar yang fleksibel dan modern.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-emerald-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><polygon fill="white" points="0,100 100,0 100,100"/></svg>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl mb-6">
                <span class="block">Siap Memulai?</span>
                <span class="block text-emerald-300">Bergabung dengan ekosisitem ini sekarang.</span>
            </h2>
            <p class="text-lg leading-6 text-emerald-100 mb-8 max-w-2xl mx-auto">
                Registrasi gratis dan dapatkan akses ke semua katalog produk, buku virtual, dan ensiklopedia tanaman canggih.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-bold rounded-full text-emerald-900 bg-white hover:bg-emerald-50 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                Daftar Gratis
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Nigramesa Framework. Dipersembahkan dengan standar emas.</p>
        </div>
    </footer>

</body>
</html>
