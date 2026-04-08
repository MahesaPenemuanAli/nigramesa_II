<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Breadcrumb Navigation -->
            <nav class="flex mb-8 text-sm font-semibold text-gray-500 border-b border-gray-200 pb-4">
                <a href="{{ route('katalog') }}" class="hover:text-emerald-600 transition-colors">Katalog</a>
                <span class="mx-3 text-gray-300">/</span>
                <span class="text-emerald-700">{{ $produk->nama_produk }}</span>
            </nav>

            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-4 shadow-sm relative overflow-hidden">
                    <div class="absolute inset-y-0 left-0 w-2 bg-emerald-500"></div>
                    <svg class="w-7 h-7 text-emerald-600 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold text-lg">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-[2rem] shadow-sm overflow-hidden mb-12 border border-gray-100">
                <div class="flex flex-col lg:flex-row">
                    
                    <!-- Left: Img -->
                    <div class="w-full lg:w-1/2 bg-gray-100 relative group">
                        <img src="{{ $produk->gambar ?: 'https://placehold.co/600x400/e2e8f0/475569?text=' . urlencode($produk->nama_produk) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Right: Info -->
                    <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col">
                        <div class="mb-6 flex items-center justify-between">
                            <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 text-sm font-black rounded-xl tracking-wide uppercase">
                                {{ $produk->kategori }}
                            </span>
                            <span class="{{ $produk->stok > 0 ? 'text-emerald-600 bg-emerald-50' : 'text-red-500 bg-red-50' }} font-bold text-sm px-4 py-1.5 rounded-xl">
                                Stok: {{ $produk->stok }}
                            </span>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-gray-900 mb-4 leading-tight">{{ $produk->nama_produk }}</h1>
                        
                        <!-- Rating Preview -->
                        <div class="flex items-center mb-6 text-sm text-gray-500 gap-2">
                            @php
                                $avgRating = $produk->ulasans->avg('rating') ?: 0;
                            @endphp
                            <div class="flex items-center text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= round($avgRating) ? 'fill-current' : 'text-gray-200 fill-current' }}" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <span class="font-bold text-gray-700 text-base ms-1">{{ number_format($avgRating, 1) }}</span>
                            <span class="text-gray-400">({{ $produk->ulasans->count() }} Ulasan)</span>
                        </div>

                        <div class="text-4xl md:text-5xl font-black text-emerald-600 mb-8 tracking-tight">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </div>

                        <div class="prose prose-emerald max-w-none mb-10 text-gray-600 leading-relaxed text-lg">
                            {!! nl2br(e($produk->deskripsi)) !!}
                        </div>

                        <!-- Form Add to Cart / Checkout -->
                        <div class="mt-auto bg-gray-50 border border-gray-100 rounded-3xl p-6 shadow-inner">
                            <form action="{{ route('katalog.checkout', $produk->id) }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                                @csrf
                                <div class="w-full sm:w-1/3">
                                    <label class="block text-sm font-bold text-gray-600 mb-2">Jumlah</label>
                                    <div class="relative flex items-center bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden h-14">
                                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="w-12 h-full hover:bg-gray-50 flex items-center justify-center text-gray-600 transition-colors border-r border-gray-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path></svg>
                                        </button>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $produk->stok }}" class="w-full h-full text-center border-0 focus:ring-0 font-black text-gray-800 text-lg">
                                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="w-12 h-full hover:bg-gray-50 flex items-center justify-center text-gray-600 transition-colors border-l border-gray-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/3 flex items-end">
                                    <button type="{{ $produk->stok > 0 ? 'submit' : 'button' }}" class="w-full h-14 bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-black rounded-xl shadow-lg shadow-emerald-200 transition-all duration-300 flex items-center justify-center gap-3 {{ $produk->stok == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $produk->stok == 0 ? 'disabled' : '' }}>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                        {{ $produk->stok > 0 ? 'Checkout Sekarang' : 'Stok Habis' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-8 border-b border-gray-200 pb-4">
                    <svg class="w-8 h-8 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <h2 class="text-2xl font-black text-gray-900">Ulasan Pembeli ({{ $produk->ulasans->count() }})</h2>
                </div>

                @if($produk->ulasans->isEmpty())
                    <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-gray-100 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Ulasan</h3>
                        <p class="text-gray-500">Jadilah yang pertama untuk memberikan ulasan pada produk ini!</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($produk->ulasans as $ulasan)
                            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 flex flex-col group relative">
                                <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path></svg>
                                </div>
                                <div class="flex items-center gap-4 mb-6 z-10">
                                    <img src="{{ $ulasan->user->foto_profil ?: 'https://ui-avatars.com/api/?name='.urlencode($ulasan->user->name).'&background=10b981&color=fff' }}" alt="{{ $ulasan->user->name }}" class="w-14 h-14 rounded-full object-cover shadow-sm ring-4 ring-emerald-50">
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg">{{ $ulasan->user->name }}</h4>
                                        <div class="text-xs font-semibold text-gray-400 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            {{ $ulasan->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1 text-amber-400 mb-4 z-10">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $ulasan->rating ? 'fill-current' : 'text-gray-200 fill-current' }}" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-gray-600 leading-relaxed font-medium z-10 break-words flex-1">"{{ $ulasan->komentar }}"</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
