@extends('admin.layout')

@section('page-title','Dashboard')

@section('content')
<div class="page-stack">
    <x-admin.card>
        <div class="toolbar">
            <div class="toolbar__title">
                <h3>Selamat datang, Admin!</h3>
                <p>Pantau performa toko pertanian Nigramesa dalam satu layar.</p>
            </div>
            <form class="admin-search">
                <span class="admin-search__icon"></span>
                <input type="search" placeholder="Cari pesanan, produk, pelanggan..." />
            </form>
        </div>
    </x-admin.card>

    <div class="metric-grid">
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">OP</div>
                <div>
                    <div class="metric-label">Total Pesanan</div>
                    <div class="metric-value">{{ number_format($totalPesanan ?? 0, 0, ',', '.') }}</div>
                    <div class="metric-note">Pesanan tercatat</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">PL</div>
                <div>
                    <div class="metric-label">Total Pelanggan</div>
                    <div class="metric-value">{{ number_format($totalPelanggan ?? 0, 0, ',', '.') }}</div>
                    <div class="metric-note">Akun terdaftar</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">RP</div>
                <div>
                    <div class="metric-label">Total Pendapatan</div>
                    <div class="metric-value">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</div>
                    <div class="metric-note">Dari pesanan valid</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">PR</div>
                <div>
                    <div class="metric-label">Total Produk</div>
                    <div class="metric-value">{{ number_format($totalProduk ?? 0, 0, ',', '.') }}</div>
                    <div class="metric-note">Dalam katalog</div>
                </div>
            </div>
        </x-admin.card>
    </div>

    <div class="dashboard-grid">
        <div class="page-stack">
            <x-admin.card title="Grafik Penjualan">
                <div class="chart-box">
                    <canvas id="salesChart"></canvas>
                </div>
            </x-admin.card>

            <x-admin.card title="Tabel Pesanan Terbaru">
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>No Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesananTerbaru ?? [] as $pesanan)
                            <tr>
                                <td>#NG-{{ $pesanan->id }}</td>
                                <td>{{ $pesanan->user->name ?? 'Tamu' }}</td>
                                <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $type = match($pesanan->status_pesanan) {
                                            'dikirim' => 'success',
                                            'diproses' => 'info',
                                            'pending' => 'warning',
                                            'dibatalkan' => 'danger',
                                            default => 'default'
                                        };
                                    @endphp
                                    <x-admin.badge type="{{ $type }}">{{ ucfirst($pesanan->status_pesanan) }}</x-admin.badge>
                                </td>
                                <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada pesanan terbaru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-admin.card>
        </div>

        <div class="page-stack">
            <x-admin.card title="Produk Terlaris">
                <ul class="simple-list">
                    @forelse($produkTerlaris ?? [] as $item)
                    <li>
                        <div class="flex items-center gap-3">
                            <div class="product-thumb"></div>
                            <div>
                                <strong>{{ $item->produk->nama_produk ?? 'Produk Dihapus' }}</strong>
                                <div class="text-sm text-muted">Terjual {{ $item->total_terjual }}</div>
                            </div>
                        </div>
                        <strong>Rp {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}</strong>
                    </li>
                    @empty
                    <li><span class="text-muted">Belum ada data penjualan.</span></li>
                    @endforelse
                </ul>
            </x-admin.card>

            <x-admin.card title="Peringatan Stok Menipis">
                <ul class="simple-list">
                    @forelse($stokMenipis ?? [] as $produk)
                    <li>
                        <span>{{ $produk->nama_produk }}</span>
                        <x-admin.badge type="{{ $produk->stok == 0 ? 'danger' : 'warning' }}">Stok {{ $produk->stok }}</x-admin.badge>
                    </li>
                    @empty
                    <li><span class="text-muted">Stok produk aman.</span></li>
                    @endforelse
                </ul>
            </x-admin.card>

            <x-admin.card title="Diagram Status Pesanan">
                <div class="status-chart-box">
                    <canvas id="statusChart"></canvas>
                </div>
            </x-admin.card>
        </div>
    </div>
</div>

<script>
    const salesChart = document.getElementById('salesChart');
    if (salesChart) {
        new Chart(salesChart, {
            type: 'line',
            data: {
                labels: {!! json_encode($salesLabels ?? ['1 Jun', '5 Jun', '10 Jun', '15 Jun', '20 Jun', '25 Jun', '30 Jun']) !!},
                datasets: [{
                    label: 'Penjualan',
                    data: {!! json_encode($salesData ?? [120, 150, 138, 185, 176, 220, 248]) !!},
                    borderColor: '#198754',
                    backgroundColor: 'rgba(46, 204, 113, 0.16)',
                    fill: true,
                    tension: 0.42,
                    pointRadius: 4,
                    pointBackgroundColor: '#0F5132'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: '#E5E7EB' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    const statusChart = document.getElementById('statusChart');
    if (statusChart) {
        new Chart(statusChart, {
            type: 'doughnut',
            data: {
                labels: ['Dikirim', 'Diproses', 'Menunggu', 'Dibatalkan'],
                datasets: [{
                    data: {!! json_encode($chartData ?? [48, 27, 18, 7]) !!},
                    backgroundColor: ['#0F5132', '#198754', '#F59E0B', '#DC2626'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } },
                cutout: '68%'
            }
        });
    }
</script>
@endsection
