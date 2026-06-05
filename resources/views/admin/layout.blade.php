<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Nigramesa</title>
    @vite(['resources/css/admin.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="admin-root">
    @include('admin.components.sidebar')
    <div class="admin-shell">
        @include('admin.components.header')
        <main class="admin-main">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
