<aside class="admin-sidebar">
    <div class="admin-brand">
        <div class="admin-brand__mark">N</div>
        <div>
            <h1>Nigramesa</h1>
            <p>Admin Panel</p>
        </div>
    </div>
    <nav class="admin-nav">
        @php
            $items = [
                ['route' => url('/admin-demo/dashboard'), 'label'=>'Dashboard', 'icon'=>'grid'],
                ['route' => url('/admin-demo/products'), 'label'=>'Produk', 'icon'=>'box'],
                ['route' => '#', 'label'=>'Kategori', 'icon'=>'tag'],
                ['route' => url('/admin-demo/orders'), 'label'=>'Pesanan', 'icon'=>'cart'],
                ['route' => url('/admin-demo/payments'), 'label'=>'Pembayaran', 'icon'=>'card'],
                ['route' => '#', 'label'=>'Pelanggan', 'icon'=>'users'],
                ['route' => '#', 'label'=>'Pengiriman', 'icon'=>'truck'],
                ['route' => '#', 'label'=>'Laporan', 'icon'=>'chart'],
                ['route' => '#', 'label'=>'Pengaturan', 'icon'=>'settings'],
                ['route' => '#', 'label'=>'Logout', 'icon'=>'logout'],
            ];
        @endphp
        @foreach($items as $item)
            <a href="{{ $item['route'] }}" class="admin-nav__link {{ request()->fullUrl() === $item['route'] ? 'is-active' : '' }}">
                <span class="admin-nav__icon" data-icon="{{ $item['icon'] }}"></span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>
</aside>
