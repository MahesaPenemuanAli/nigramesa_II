<x-app-layout>
    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-black text-gray-900 tracking-tight mb-8">Keranjang Belanja</h1>

            @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl font-bold flex items-center gap-3">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl font-bold flex items-center gap-3">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('error') }}
            </div>
            @endif

            @if($keranjangs->isEmpty())
            <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[50vh]">
                <img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Keranjang+Kosong" class="w-64 h-auto mb-8 rounded-2xl grayscale opacity-50" alt="Empty Cart">
                <h2 class="text-2xl font-black text-gray-800 mb-2">Keranjang Anda Masih Kosong</h2>
                <p class="text-gray-500 font-medium mb-8">Wah, belum ada produk yang Anda minati. Temukan pasokan agrikultur terbaik sekarang!</p>
                <a href="{{ route('katalog') }}" class="px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-xl shadow-lg transition-all flex items-center justify-center gap-2 group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali Belanja
                </a>
            </div>
            @else
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- List Kiri -->
                <div class="w-full lg:w-[70%] space-y-6">
                    <!-- Checkbox Pilih Semua -->
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center gap-3">
                        <input type="checkbox" id="check-all" class="w-5 h-5 text-emerald-600 rounded border-gray-300 focus:ring-emerald-500 cursor-pointer" onclick="document.querySelectorAll('.item-checkbox').forEach(cb => { cb.checked = this.checked; }); window.updateSummary();">
                        <label for="check-all" class="font-bold text-gray-700 cursor-pointer select-none">Pilih Semua Produk</label>
                    </div>

                    @foreach($keranjangs as $item)
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4 sm:gap-6">
                        <!-- Checkbox Item -->
                        <div class="flex-shrink-0">
                            <input type="checkbox" name="selectedItems[]" value="{{ $item->id }}" class="cart-checkbox item-checkbox w-5 h-5 text-emerald-600 rounded border-gray-300 focus:ring-emerald-500 cursor-pointer" data-harga="{{ $item->produk->harga }}" onchange="window.updateSummary()">
                        </div>
                        <div class="w-20 h-20 sm:w-32 sm:h-32 bg-gray-100 rounded-2xl overflow-hidden shrink-0">
                            <img src="{{ gambar_url($item->produk->gambar, 'https://placehold.co/400x400/e2e8f0/475569?text='.urlencode($item->produk->nama_produk)) }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h3 class="text-lg font-black text-gray-900 mb-1 line-clamp-2">{{ $item->produk->nama_produk }}</h3>
                                <p class="text-emerald-600 font-bold tracking-tight mb-4">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <!-- Qty Update via AJAX dengan Alpine.js -->
                                <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg overflow-hidden h-10 shadow-sm" x-data="{
                                    jumlah: {{ $item->jumlah }},
                                    stok: {{ $item->produk->stok }},
                                    updateCart(newJumlah) {
                                        if(newJumlah < 1 || newJumlah > this.stok) return;
                                        this.jumlah = newJumlah;
                                        
                                        fetch('{{ route('keranjang.update', $item->id) }}', {
                                            method: 'PATCH',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                'Accept': 'application/json'
                                            },
                                            body: JSON.stringify({ jumlah: this.jumlah })
                                        })
                                        .then(res => res.json())
                                        .then(data => {
                                            if(data.success) {
                                                // Perbarui ringkasan di sebelah kanan
                                                window.updateSummary();
                                            } else {
                                                alert(data.message || 'Terjadi kesalahan saat memperbarui keranjang.');
                                                this.jumlah = {{ $item->jumlah }}; // revert jika gagal
                                            }
                                        })
                                        .catch(err => console.error('Error updating cart:', err));
                                    }
                                }">
                                    <button type="button" @click="updateCart(jumlah - 1)" class="w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 font-black border-r border-gray-200">-</button>
                                    <input type="number" x-model="jumlah" readonly class="item-qty w-12 h-full border-0 focus:ring-0 text-center font-bold text-sm bg-transparent pointer-events-none">
                                    <button type="button" @click="updateCart(jumlah + 1)" class="w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 font-black border-l border-gray-200">+</button>
                                </div>
                                <!-- Hapus -->
                                <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors border border-red-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Summary Kanan -->
                <div class="w-full lg:w-[30%]">
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 sticky top-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Ringkasan Belanja</h2>
                        
                        <div class="space-y-4 text-sm font-medium text-gray-600 border-b border-dashed border-gray-200 pb-6 mb-6">
                            <div class="flex justify-between items-center">
                                <span>Total Tagihan (<span id="total-qty-text">{{ collect($keranjangs)->sum('jumlah') }}</span> item)</span>
                                <span class="text-gray-900 font-bold" id="subtotal-text">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Pajak (11%)</span>
                                <span class="text-gray-900 font-bold" id="pajak-text">Rp {{ number_format($pajak, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-end mb-8">
                            <span class="text-gray-800 font-bold">Total Pembayaran</span>
                            <span class="text-2xl font-black text-emerald-600 tracking-tight" id="totalHarga-text">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                        </div>

                        <button onclick="submitCheckout()" class="w-full h-14 bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-black rounded-xl shadow-lg shadow-emerald-200 transition-all duration-300 flex items-center justify-center gap-2 group border-0 focus:outline-none">
                            Lanjut ke Pembayaran
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Script Checkout -->
    <script>
        function updateSummary() {
            let subtotal = 0;
            let totalQty = 0;

            document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
                let harga = parseFloat(cb.getAttribute('data-harga')) || 0;
                let container = cb.closest('.bg-white');
                let qtyInput = container.querySelector('.item-qty');
                let qty = qtyInput ? (parseInt(qtyInput.value) || 0) : 0;
                
                subtotal += harga * qty;
                totalQty += qty;
            });

            let pajak = subtotal * 0.11;
            let totalAkhir = subtotal + pajak;

            const formatRupiah = (angka) => 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);

            document.getElementById('subtotal-text').innerText = formatRupiah(subtotal);
            document.getElementById('pajak-text').innerText = formatRupiah(pajak);
            document.getElementById('totalHarga-text').innerText = formatRupiah(totalAkhir);
            document.getElementById('total-qty-text').innerText = totalQty;
        }

        // Panggil saat halaman pertama kali diload agar sync jika browser mengingat state checkbox
        document.addEventListener('DOMContentLoaded', function() {
            updateSummary();
        });

        function submitCheckout() {
            let selected = Array.from(document.querySelectorAll('.item-checkbox:checked')).map(cb => cb.value);
            if(selected.length === 0) {
                alert('Pilih minimal 1 produk barang yang mau di-checkout.');
                return;
            }
            
            // Buat form dinamis
            let form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route('checkout.index') }}';
            
            selected.forEach(id => {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_items[]';
                input.value = id;
                form.appendChild(input);
            });
            
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</x-app-layout>
