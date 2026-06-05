@extends('admin.layout')

@section('page-title','Pembayaran')

@section('content')
<div class="page-stack">
    <div class="toolbar">
        <div class="toolbar__title">
            <h3>Tabel Pembayaran</h3>
            <p>Pantau transfer, QRIS, dan e-wallet dari pesanan pelanggan.</p>
        </div>
        <div class="toolbar__actions">
            <input type="search" placeholder="Cari pembayaran..." class="field" />
            <select class="select-field">
                <option>Semua Metode</option>
                <option>Transfer</option>
                <option>QRIS</option>
                <option>E-Wallet</option>
            </select>
        </div>
    </div>

    <x-admin.card>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Pelanggan</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#NG-1001</td>
                        <td>Budi Santoso</td>
                        <td>Transfer Bank</td>
                        <td>Rp 150.000</td>
                        <td><x-admin.badge type="pending">Menunggu</x-admin.badge></td>
                        <td><a href="#" class="btn btn-soft">Lihat Bukti</a></td>
                    </tr>
                    <tr>
                        <td>#NG-1002</td>
                        <td>Sri Lestari</td>
                        <td>QRIS</td>
                        <td>Rp 420.000</td>
                        <td><x-admin.badge type="success">Berhasil</x-admin.badge></td>
                        <td><a href="#" class="btn btn-soft">Lihat Bukti</a></td>
                    </tr>
                    <tr>
                        <td>#NG-1003</td>
                        <td>Raka Wijaya</td>
                        <td>E-Wallet</td>
                        <td>Rp 95.000</td>
                        <td><x-admin.badge type="danger">Gagal</x-admin.badge></td>
                        <td><a href="#" class="btn btn-soft">Lihat Bukti</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.card>
</div>
@endsection
