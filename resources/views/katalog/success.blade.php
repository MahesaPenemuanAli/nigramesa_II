<x-app-layout>
    <div class="checkout-page">
        <div class="checkout-container checkout-success-container">
            <div class="checkout-card success-card">
                <div class="success-icon">&check;</div>
                <h1>Pesanan Berhasil!</h1>
                <p>Pesanan Anda sudah tercatat. Ikuti instruksi pembayaran di bawah agar tim Nigramesa dapat segera memproses pengiriman.</p>

                <div class="success-slip">
                    <div>
                        <span>Nomor Transaksi</span>
                        <strong>#ORD-{{ str_pad($pesanan->id, 8, '0', STR_PAD_LEFT) }}</strong>
                    </div>
                    <div>
                        <span>Total Tagihan</span>
                        <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                    </div>
                    <div>
                        <span>Metode Pembayaran</span>
                        <strong>{{ $pesanan->metode_pembayaran }}</strong>
                    </div>
                    <div>
                        <span>Status Pesanan</span>
                        <b>{{ $pesanan->status_pesanan }}</b>
                    </div>
                </div>

                <div class="payment-instruction success-payment">
                    <div>
                        <strong>Detail Pembayaran</strong>
                        @if($pesanan->metode_pembayaran == 'Transfer Bank')
                            <p>Transfer sebesar <b>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</b> ke rekening BCA 1234 5678 90 a.n Nigramesa. Verifikasi dilakukan maksimal 1x24 jam.</p>
                        @elseif($pesanan->metode_pembayaran == 'QRIS')
                            <p>Scan QRIS di samping dan bayar sebesar <b>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</b> melalui aplikasi pembayaran Anda.</p>
                        @elseif($pesanan->metode_pembayaran == 'E-Wallet')
                            <p>Selesaikan pembayaran e-wallet sebesar <b>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</b> melalui provider pilihan Anda.</p>
                        @else
                            <p>Siapkan pembayaran sebesar <b>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</b> sesuai metode yang dipilih.</p>
                        @endif
                    </div>
                    <div class="qris-box" aria-label="Ilustrasi QRIS"></div>
                </div>

                <div class="success-actions">
                    <a href="{{ route('katalog') }}" class="checkout-pay-button">Belanja Katalog Lagi</a>
                    <a href="{{ route('riwayat.index') }}" class="checkout-secondary-button">Lihat Riwayat</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
