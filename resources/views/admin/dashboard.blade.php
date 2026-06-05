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
                    <div class="metric-value">1.254</div>
                    <div class="metric-note">+12% bulan ini</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">PL</div>
                <div>
                    <div class="metric-label">Total Pelanggan</div>
                    <div class="metric-value">8.420</div>
                    <div class="metric-note">284 pelanggan baru</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">RP</div>
                <div>
                    <div class="metric-label">Total Pendapatan</div>
                    <div class="metric-value">Rp124,5 jt</div>
                    <div class="metric-note">Margin stabil</div>
                </div>
            </div>
        </x-admin.card>
        <x-admin.card>
            <div class="metric-card">
                <div class="metric-icon">PR</div>
                <div>
                    <div class="metric-label">Total Produk</div>
                    <div class="metric-value">320</div>
                    <div class="metric-note">18 stok menipis</div>
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
                            <tr>
                                <td>#NG-1001</td>
                                <td>Budi Santoso</td>
                                <td>Rp 150.000</td>
                                <td><x-admin.badge type="success">Dikirim</x-admin.badge></td>
                                <td>1 Jun 2026</td>
                            </tr>
                            <tr>
                                <td>#NG-1002</td>
                                <td>Sri Lestari</td>
                                <td>Rp 420.000</td>
                                <td><x-admin.badge type="info">Diproses</x-admin.badge></td>
                                <td>2 Jun 2026</td>
                            </tr>
                            <tr>
                                <td>#NG-1003</td>
                                <td>Raka Wijaya</td>
                                <td>Rp 95.000</td>
                                <td><x-admin.badge type="warning">Menunggu</x-admin.badge></td>
                                <td>3 Jun 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-admin.card>
        </div>

        <div class="page-stack">
            <x-admin.card title="Produk Terlaris">
                <ul class="simple-list">
                    <li>
                        <div class="flex items-center gap-3">
                            <div class="product-thumb"></div>
                            <div>
                                <strong>Pupuk Organik Premium</strong>
                                <div class="text-sm text-muted">Terjual 1.200</div>
                            </div>
                        </div>
                        <strong>Rp 35.000</strong>
                    </li>
                    <li>
                        <div class="flex items-center gap-3">
                            <div class="product-thumb"></div>
                            <div>
                                <strong>Benih Cabai Hibrida</strong>
                                <div class="text-sm text-muted">Terjual 870</div>
                            </div>
                        </div>
                        <strong>Rp 18.500</strong>
                    </li>
                    <li>
                        <div class="flex items-center gap-3">
                            <div class="product-thumb"></div>
                            <div>
                                <strong>Media Tanam Subur</strong>
                                <div class="text-sm text-muted">Terjual 640</div>
                            </div>
                        </div>
                        <strong>Rp 22.000</strong>
                    </li>
                </ul>
            </x-admin.card>

            <x-admin.card title="Peringatan Stok Menipis">
                <ul class="simple-list">
                    <li><span>Pupuk NPK 5kg</span><x-admin.badge type="warning">Stok 3</x-admin.badge></li>
                    <li><span>Semprotan Manual</span><x-admin.badge type="warning">Stok 5</x-admin.badge></li>
                    <li><span>Benih Kangkung</span><x-admin.badge type="danger">Stok 1</x-admin.badge></li>
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
                labels: ['1 Jun', '5 Jun', '10 Jun', '15 Jun', '20 Jun', '25 Jun', '30 Jun'],
                datasets: [{
                    label: 'Penjualan',
                    data: [120, 150, 138, 185, 176, 220, 248],
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
                    data: [48, 27, 18, 7],
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
