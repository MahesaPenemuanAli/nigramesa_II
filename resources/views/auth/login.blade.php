<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masuk - Nigramesa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50 h-screen w-full flex overflow-hidden">

    <!-- Left Side: Visual / Branding (Desktop Only) -->
    <div class="hidden lg:flex w-1/2 relative flex-col justify-center items-center overflow-hidden">
        <div class="absolute inset-0">
            <!-- Tampilan Background Latar -->
            <img src="https://jambu.id/wp-content/uploads/2024/01/pasarmikro-slider-bg-pertanian-berkelanjutan-57-1920p-990p.jpg"
                 class="object-cover w-full h-full" alt="Botani Background" />
            <!-- Overlay warna zamrud semi-transparan (emerald) -->
            <div class="absolute inset-0 bg-emerald-900/60 mix-blend-multiply"></div>
            <!-- Elemen dramatis gradasi -->
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/40 to-transparent"></div>
        </div>

        <!-- Teks Tampilan Utama dengan Efek Muncul AlpineJS -->
        <div class="relative z-10 px-12 text-center text-white" x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)">
            <h1 class="text-5xl font-extrabold tracking-tight mb-6 opacity-0 translate-y-8 transition-all duration-1000 ease-out"
                :class="show ? 'opacity-100 translate-y-0' : ''">
                Selamat Datang di Nigramesa
            </h1>
            <p class="text-lg text-emerald-100 opacity-0 translate-y-8 transition-all duration-1000 delay-300 ease-out max-w-lg mx-auto leading-relaxed"
               :class="show ? 'opacity-100 translate-y-0' : ''">
                Menyatu dengan elemen alam, menyongsong harmoni ranah botani dan merajut masa depan platform edukasi serta e-commerce agrikultur modern dalam satu ekosistem interaktif.
            </p>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-24 relative overflow-y-auto">
        <!-- Mobile Background (Faded) -->
        <div class="absolute inset-0 lg:hidden pointer-events-none">
            <img src="https://images.unsplash.com/photo-1466692476877-361ad35330e1?q=80&w=400&auto=format&fit=crop"
                 class="object-cover w-full h-full opacity-20" alt="" />
            <div class="absolute inset-0 bg-white/80 backdrop-blur-md"></div>
        </div>

        <div class="w-full max-w-md relative z-10 bg-white/80 lg:bg-transparent backdrop-blur-xl lg:backdrop-blur-none p-10 lg:p-0 rounded-3xl shadow-2xl lg:shadow-none border border-white/40 lg:border-none">

            <!-- Logo Icon Daun Kecil -->
            <div class="flex justify-center mb-6">
                <div class="bg-emerald-100 text-emerald-600 p-3 rounded-2xl shadow-sm flex items-center justify-center transform -rotate-12 transition hover:rotate-0 duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16c1.5-3 5-4 8-1 2.5-3 6.5-2 8 2 0 4-4 7-9 7-3.5 0-7-2-7-8z"></path>
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12"></path>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight mb-2">Masuk ke Akun Anda</h2>
                <p class="text-gray-500 text-sm">Masuk untuk mengakses ensiklopedia, katalog, dan edukasi video botani.</p>
            </div>

            <!-- Session Status Alert -->
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input Form -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 outline-none shadow-sm hover:border-emerald-300" placeholder="nama@contoh.com">
                    @if ($errors->has('email'))
                        <p class="mt-2 text-sm text-red-500 break-words flex items-center">
                            <svg class="w-4 h-4 mr-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <!-- Password Input Form -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password <span class="text-red-500">*</span></label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-500 transition-colors duration-200">
                                Lupa Password?
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 outline-none shadow-sm hover:border-emerald-300" placeholder="••••••••">
                    @if ($errors->has('password'))
                        <p class="mt-2 text-sm text-red-500 break-words flex items-center">
                            <svg class="w-4 h-4 mr-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500 transition-all duration-200 ease-in-out cursor-pointer">
                        <span class="ml-2 text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors select-none">Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 rounded-xl shadow-md text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-emerald-400 hover:from-emerald-500 hover:to-emerald-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-300">
                    Masuk Sekarang
                    <svg class="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>

            </form>

            <!-- Register Link Text -->
            <p class="mt-8 text-center text-sm font-medium text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:text-emerald-500 hover:underline transition-all duration-200">
                    Daftar di sini
                </a>
            </p>
        </div>
    </div>

</body>
</html>
