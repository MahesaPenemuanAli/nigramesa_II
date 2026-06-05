<x-app-layout>
    <div class="checkout-page">
        <div class="checkout-container">
            <div class="checkout-title">
                <h1>Checkout Pesanan</h1>
                <p>Lengkapi alamat, pilih pengiriman, dan tentukan metode pembayaran Anda.</p>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                @foreach($keranjangs as $item)
                    <input type="hidden" name="selected_items[]" value="{{ $item->id }}">
                @endforeach

                <div class="checkout-layout">
                    <div class="checkout-stack">
                        @if(session('error'))
                            <div class="checkout-alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <section class="checkout-card">
                            <h2><span class="section-icon"></span>Alamat Pengiriman</h2>
                            <div class="checkout-field">
                                <label class="checkout-label">Alamat Lengkap Tujuan</label>
                                <textarea name="alamat_pengiriman" rows="4" class="checkout-input" placeholder="Tuliskan jalan, nomor rumah, RT/RW, dan patokan agar kurir mudah menemukan alamat Anda." required>{{ old('alamat_pengiriman', auth()->user()->alamat_lengkap) }}</textarea>
                                @error('alamat_pengiriman')
                                    <span class="checkout-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="checkout-field">
                                <label class="checkout-label">Titik Lokasi Pengiriman</label>
                                <div id="map" class="checkout-map"></div>
                                <p class="checkout-help">Klik peta atau geser pin untuk menentukan koordinat lokasi pengiriman.</p>
                                <input type="hidden" name="latitude" id="lat" value="{{ old('latitude', '-6.2088') }}">
                                <input type="hidden" name="longitude" id="lng" value="{{ old('longitude', '106.8456') }}">
                            </div>

                            <div class="checkout-field">
                                <label class="checkout-label">Pilihan Metode Pengiriman</label>
                                <select name="jasa_pengiriman" class="checkout-input" required>
                                    <option value="" disabled selected>Pilih jasa pengiriman...</option>
                                    <option value="JNE Reguler">JNE - Reguler</option>
                                    <option value="JNE Ekspres">JNE - Ekspres</option>
                                    <option value="J&T Reguler">J&T - Reguler</option>
                                    <option value="J&T Ekspres">J&T - Ekspres</option>
                                    <option value="SiCepat Reguler">SiCepat - Reguler</option>
                                    <option value="SiCepat Best">SiCepat - Best</option>
                                </select>
                            </div>
                        </section>

                        <section class="checkout-card">
                            <h2><span class="section-icon"></span>Pilihan Metode Pembayaran</h2>
                            <div class="payment-grid">
                                <label class="payment-option">
                                    <input type="radio" name="metode_pembayaran" value="Transfer Bank" required>
                                    <span class="payment-option__box">
                                        <strong>Transfer</strong>
                                        <span>BCA, BNI, Mandiri, dan BRI.</span>
                                    </span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="metode_pembayaran" value="QRIS" required>
                                    <span class="payment-option__box">
                                        <strong>QRIS</strong>
                                        <span>Scan kode QR dari aplikasi pembayaran.</span>
                                    </span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="metode_pembayaran" value="E-Wallet" required>
                                    <span class="payment-option__box">
                                        <strong>E-Wallet</strong>
                                        <span>Gopay, OVO, Dana, dan ShopeePay.</span>
                                    </span>
                                </label>
                            </div>
                            @error('metode_pembayaran')
                                <span class="checkout-error">{{ $message }}</span>
                            @enderror

                            <div class="payment-instruction">
                                <div>
                                    <strong>Instruksi pembayaran</strong>
                                    <p>Setelah klik Bayar Sekarang, detail transfer atau QRIS akan ditampilkan pada halaman konfirmasi.</p>
                                </div>
                                <div class="qris-box" aria-label="Ilustrasi QRIS"></div>
                            </div>
                        </section>
                    </div>

                    <aside class="checkout-card order-summary">
                        <h2>Ringkasan Pesanan</h2>
                        <div class="summary-list">
                            @foreach($keranjangs as $item)
                                <div class="summary-item">
                                    <img src="{{ gambar_url($item->produk->gambar, 'https://placehold.co/600x400/e2e8f0/475569?text=' . urlencode($item->produk->nama_produk)) }}" alt="{{ $item->produk->nama_produk }}">
                                    <div>
                                        <strong>{{ $item->produk->nama_produk }}</strong>
                                        <span>Qty {{ $item->jumlah }}</span>
                                        <b>Rp {{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</b>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="summary-total">
                            <div class="summary-row">
                                <span>Subtotal ({{ collect($keranjangs)->sum('jumlah') }} item)</span>
                                <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                            </div>
                            <div class="summary-row">
                                <span>Pajak Transaksi (11%)</span>
                                <strong>Rp {{ number_format($pajak, 0, ',', '.') }}</strong>
                            </div>
                            <div class="summary-row">
                                <span>Biaya Pengiriman</span>
                                <strong>Gratis Ongkir</strong>
                            </div>
                            <div class="summary-row final">
                                <span>Total Akhir</span>
                                <strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <button type="submit" class="checkout-pay-button">Bayar Sekarang</button>
                        <p class="checkout-help text-center">Pesanan akan diproses setelah pembayaran terverifikasi.</p>
                    </aside>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var latInput = document.getElementById('lat');
            var lngInput = document.getElementById('lng');
            var initialLat = latInput.value;
            var initialLng = lngInput.value;

            var map = L.map('map').setView([initialLat, initialLng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'OpenStreetMap'
            }).addTo(map);

            var marker = L.marker([initialLat, initialLng], {draggable: true}).addTo(map);

            marker.on('dragend', function() {
                var position = marker.getLatLng();
                latInput.value = position.lat;
                lngInput.value = position.lng;
            });

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                latInput.value = e.latlng.lat;
                lngInput.value = e.latlng.lng;
            });
        });
    </script>
</x-app-layout>
