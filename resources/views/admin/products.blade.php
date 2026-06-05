@extends('admin.layout')

@section('page-title','Produk')

@section('content')
<div class="page-stack">
    <div class="toolbar">
        <div class="toolbar__title">
            <h3>Daftar Produk</h3>
            <p>Kelola katalog produk pertanian yang tampil untuk pelanggan.</p>
        </div>
        <div class="toolbar__actions">
            <input type="search" placeholder="Search produk..." class="field" />
            <select class="select-field">
                <option>Semua Kategori</option>
                <option>Pupuk</option>
                <option>Benih</option>
                <option>Peralatan</option>
                <option>Media Tanam</option>
            </select>
            <a href="#" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>

    <x-admin.card>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="product-thumb"></div></td>
                        <td><strong>Pupuk Organik Premium</strong></td>
                        <td>Pupuk</td>
                        <td>Rp 35.000</td>
                        <td>12</td>
                        <td><x-admin.badge type="success">Aktif</x-admin.badge></td>
                        <td>
                            <div class="flex gap-2">
                                <a href="#" class="btn btn-soft">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="product-thumb"></div></td>
                        <td><strong>Benih Cabai Hibrida</strong></td>
                        <td>Benih</td>
                        <td>Rp 18.500</td>
                        <td>5</td>
                        <td><x-admin.badge type="warning">Stok Menipis</x-admin.badge></td>
                        <td>
                            <div class="flex gap-2">
                                <a href="#" class="btn btn-soft">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="product-thumb"></div></td>
                        <td><strong>Sprayer Manual 2L</strong></td>
                        <td>Peralatan</td>
                        <td>Rp 72.000</td>
                        <td>0</td>
                        <td><x-admin.badge type="danger">Habis</x-admin.badge></td>
                        <td>
                            <div class="flex gap-2">
                                <a href="#" class="btn btn-soft">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.card>
</div>
@endsection
