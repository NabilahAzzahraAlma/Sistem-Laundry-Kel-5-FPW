<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Laundry Admin')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background:#f4f6f9; }
    .sidebar {
        width:240px;
        position:fixed;
        height:100%;
        background:#0d6efd;
        color:#fff;
        padding:20px;
    }
    .sidebar a {
        text-decoration:none;
        font-size:16px;
        padding:8px 0;
    }
  </style>
</head>

<body>
<div class="d-flex">

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h4 class="mb-4">🧺 Laundry</h4>

    <a class="d-block text-white" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="d-block text-white" href="{{ route('orders.index') }}">Orders</a>
    <a class="d-block text-white" href="{{ route('services.index') }}">Services</a>

    {{-- Complaint dimatikan karena route belum ada --}}
    {{-- <a class="d-block text-white" href="{{ route('complaints.index') }}">Complaints</a> --}}
  </div>

  <!-- CONTENT -->
  <div class="flex-grow-1" style="margin-left:260px; padding:24px;">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
  </div>

</div>

</body>
</html>
