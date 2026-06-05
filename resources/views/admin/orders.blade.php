@extends('admin.layout')

@section('page-title','Pesanan')

@section('content')
<div class="page-stack">
    <div class="toolbar">
        <div class="toolbar__title">
            <h3>Tabel Pesanan</h3>
            <p>Lihat detail pesanan dan perbarui status pengiriman pelanggan.</p>
        </div>
        <div class="toolbar__actions">
            <input type="search" placeholder="Cari nomor atau pelanggan..." class="field" />
            <select class="select-field">
                <option>Semua Status</option>
                <option>Menunggu</option>
                <option>Diproses</option>
                <option>Dikirim</option>
                <option>Selesai</option>
            </select>
        </div>
    </div>

    <x-admin.card>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status Pesanan</th>
                        <th>Update Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#NG-1001</td>
                        <td>Budi Santoso</td>
                        <td>Rp 150.000</td>
                        <td><x-admin.badge type="success">Dikirim</x-admin.badge></td>
                        <td>
                            <select class="select-field">
                                <option>Dikirim</option>
                                <option>Diproses</option>
                                <option>Selesai</option>
                            </select>
                        </td>
                        <td><a href="#" class="btn btn-soft">Detail Pesanan</a></td>
                    </tr>
                    <tr>
                        <td>#NG-1002</td>
                        <td>Sri Lestari</td>
                        <td>Rp 420.000</td>
                        <td><x-admin.badge type="info">Diproses</x-admin.badge></td>
                        <td>
                            <select class="select-field">
                                <option>Diproses</option>
                                <option>Dikirim</option>
                                <option>Selesai</option>
                            </select>
                        </td>
                        <td><a href="#" class="btn btn-soft">Detail Pesanan</a></td>
                    </tr>
                    <tr>
                        <td>#NG-1003</td>
                        <td>Raka Wijaya</td>
                        <td>Rp 95.000</td>
                        <td><x-admin.badge type="warning">Menunggu</x-admin.badge></td>
                        <td>
                            <select class="select-field">
                                <option>Menunggu</option>
                                <option>Diproses</option>
                                <option>Dibatalkan</option>
                            </select>
                        </td>
                        <td><a href="#" class="btn btn-soft">Detail Pesanan</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.card>
</div>
@endsection
