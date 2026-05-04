<nav x-data="{ open: false }" class="bg-emerald-800 border-b border-emerald-700 sticky top-0 z-50 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('images/logo.png') }}" alt="Nigramesa Logo" class="h-12 w-auto object-contain transform group-hover:scale-105 transition duration-300 drop-shadow-[0_2px_10px_rgba(16,185,129,0.3)]">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex h-full">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Beranda') }}
                    </a>
                    <a href="{{ route('perawatan') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('perawatan') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Perawatan') }}
                    </a>
                    <a href="{{ route('katalog') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('katalog') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Katalog') }}
                    </a>
                    <a href="{{ route('perpustakaan') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('perpustakaan') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Perpustakaan') }}
                    </a>
                    <a href="{{ route('edukasi.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('edukasi.*') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Edukasi') }}
                    </a>
                    <a href="{{ route('tentang') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('tentang') ? 'border-emerald-400 text-white' : 'border-transparent text-emerald-200 hover:text-white hover:border-emerald-400' }}">
                        {{ __('Tentang') }}
                    </a>
                </div>
            </div>

            <!-- Setting, Cart, Notif -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <!-- Cart Icon -->
                <a href="{{ route('keranjang.index') }}" class="relative inline-flex items-center p-2 rounded-2xl text-emerald-100 hover:text-emerald-50 hover:bg-emerald-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    @if(auth()->check() && auth()->user()->keranjangs()->count() > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold text-emerald-900 transform translate-x-1/4 -translate-y-1/4 bg-emerald-400 rounded-full ring-2 ring-emerald-800">{{ auth()->user()->keranjangs()->sum('jumlah') }}</span>
                    @endif
                </a>

                <!-- Notifications Dropdown (Custom Alpine) -->
                <div class="relative" x-data="{ notifOpen: false }" @click.outside="notifOpen = false" @close.stop="notifOpen = false">
                    <button @click="notifOpen = !notifOpen" class="relative inline-flex items-center p-2 rounded-2xl text-emerald-100 hover:text-emerald-50 hover:bg-emerald-700 transition focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
                            <span class="absolute top-1 right-1 inline-flex items-center justify-center w-2.5 h-2.5 transform translate-x-1/2 -translate-y-1/2 bg-rose-500 rounded-full animate-pulse ring-2 ring-emerald-800"></span>
                        @endif
                    </button>

                    <div x-show="notifOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 z-50 w-80 mt-3 origin-top-right bg-white rounded-3xl shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden"
                         style="display: none;">

                        <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80 backdrop-blur-sm">
                            <span class="text-sm font-bold text-gray-800">Notifikasi</span>
                            @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
                                <form action="{{ route('notifikasi.read') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-emerald-600 font-semibold hover:text-emerald-700 transition">Tandai dibaca</button>
                                </form>
                            @endif
                        </div>
                        <div class="max-h-[22rem] overflow-y-auto w-full p-2 space-y-1">
                            @if(auth()->check())
                                @forelse(auth()->user()->notifications as $notification)
                                    <a href="{{ $notification->data['url'] ?? '#' }}" class="block p-4 rounded-2xl transition hover:bg-gray-50 {{ $notification->read_at ? 'opacity-60' : 'bg-emerald-50/50' }}">
                                        <p class="text-sm font-medium text-gray-800 leading-snug">{{ $notification->data['pesan'] ?? 'Notifikasi baru' }}</p>
                                        <p class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                    </a>
                                @empty
                                    <div class="px-5 py-8 text-center text-sm text-gray-500 flex flex-col items-center">
                                        <svg class="w-10 h-10 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                        Belum ada notifikasi
                                    </div>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Settings Dropdown (Custom Alpine) -->
                @if(auth()->check())
                <div class="relative" x-data="{ profileOpen: false }" @click.outside="profileOpen = false" @close.stop="profileOpen = false">
                    <button @click="profileOpen = !profileOpen" class="inline-flex items-center gap-3 px-4 py-2.5 border border-emerald-600 rounded-3xl text-sm font-semibold text-emerald-50 bg-emerald-800 hover:bg-emerald-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="w-6 h-6 rounded-full bg-emerald-600 flex items-center justify-center text-xs shadow-inner">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="fill-current h-4 w-4 opacity-70 transform transition-transform duration-200" :class="{'rotate-180': profileOpen}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="profileOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 z-50 w-56 mt-3 origin-top-right bg-white rounded-3xl shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none flex flex-col p-2"
                         style="display: none;">

                        <div class="px-4 py-3 mb-1 border-b border-gray-100">
                            <p class="text-sm text-gray-500">Masuk sebagai</p>
                            <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 rounded-2xl hover:bg-emerald-50 hover:text-emerald-700 transition">
                            Profil Saya
                        </a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2.5 text-sm font-medium text-rose-600 rounded-2xl hover:bg-rose-50 transition mt-1">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Jika belum login (prevent error) -->
                <div>
                   <a href="{{ route('login') }}" class="text-emerald-100 hover:text-white">Log in</a>
                </div>
                @endif
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-2xl text-emerald-200 hover:text-white hover:bg-emerald-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="sm:hidden bg-emerald-900 absolute top-20 inset-x-4 z-50 shadow-2xl rounded-3xl pb-2 overflow-hidden" style="display: none;">

        <div class="pt-4 pb-4 space-y-1 px-3">
            <a href="{{ route('dashboard') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Beranda') }}
            </a>
            <a href="{{ route('perawatan') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('perawatan') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Perawatan') }}
            </a>
            <a href="{{ route('katalog') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('katalog') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Katalog') }}
            </a>
            <a href="{{ route('perpustakaan') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('perpustakaan') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Perpustakaan') }}
            </a>
            <a href="{{ route('edukasi.index') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('edukasi.*') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Edukasi') }}
            </a>
            <a href="{{ route('tentang') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('tentang') ? 'bg-emerald-800 text-white' : 'text-emerald-100 hover:text-white hover:bg-emerald-800' }}">
                {{ __('Tentang') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 border-t border-emerald-800/50 bg-emerald-950/20">
            @if(auth()->check())
            <div class="px-5 flex items-center justify-between">
                <div>
                    <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-emerald-300">{{ Auth::user()->email }}</div>
                </div>
                <!-- Mobile Cart Icon -->
                <a href="{{ route('keranjang.index') }}" class="relative p-2 rounded-2xl bg-emerald-800 text-white shadow-sm ring-1 ring-emerald-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    @if(auth()->user()->keranjangs()->count() > 0)
                        <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold text-emerald-900 bg-emerald-400 rounded-full border-2 border-emerald-800">{{ auth()->user()->keranjangs()->sum('jumlah') }}</span>
                    @endif
                </a>
            </div>

            <div class="mt-4 px-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-3 rounded-2xl text-base font-medium text-emerald-100 hover:bg-emerald-800 hover:text-white transition">
                    {{ __('Profil Saya') }}
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block w-full px-4 py-3 rounded-2xl text-base font-medium text-rose-300 hover:bg-rose-900/40 hover:text-rose-200 transition">
                        {{ __('Keluar Akun') }}
                    </a>
                </form>
            </div>
            @endif
        </div>
    </div>
</nav>
