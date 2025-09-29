<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat - Desa Karangduren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #212529; /* dark */
            color: #fff;
        }
        .sidebar h5 {
            padding: 20px;
            margin: 0;
            font-size: 1.1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 6px;
            margin: 4px 8px;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #495057;
            color: #fff;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h5>📌 Menu</h5>
        <ul class="list-unstyled">
            <li><a href="{{ route('arsip.index') }}" class="{{ request()->routeIs('arsip.*') ? 'active' : '' }}"><i>📂</i> Arsip</a></li>
            <li><a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}"><i>📑</i> Kategori Surat</a></li>
            <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}"><i>ℹ️</i> About</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
