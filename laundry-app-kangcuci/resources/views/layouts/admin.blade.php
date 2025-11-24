<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Laundry')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 h-screen overflow-hidden flex">

    <aside class="w-64 bg-[#0f172a] text-white flex flex-col shadow-xl flex-shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-700 font-bold text-lg tracking-wide">
            <i data-lucide="washing-machine" class="w-6 h-6 mr-3 text-blue-400"></i>
            Laundry Admin
        </div>

        <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
            </a>

            <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('orders*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i> Orders
            </a>

            <a href="{{ route('services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('services*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="tag" class="w-5 h-5"></i> Services
            </a>

            <a href="{{ route('transaksis.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('transaksis*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="receipt" class="w-5 h-5"></i> Transaksi
            </a>

            <a href="{{ route('complaints.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('complaints*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="message-square-warning" class="w-5 h-5"></i> Complaints
            </a>

            <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('users*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i data-lucide="users" class="w-5 h-5"></i> Users
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <a href="#" class="flex items-center gap-3 px-4 py-2 text-red-400 hover:text-red-300 hover:bg-gray-800 rounded-lg transition">
                <i data-lucide="log-out" class="w-5 h-5"></i> Logout
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col relative overflow-hidden">
        <header class="bg-white h-16 shadow-sm flex items-center justify-between px-8 z-10">
            <h2 class="text-xl font-bold text-gray-800">@yield('header_title')</h2>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 bg-[#f1f5f9]">
            @yield('content')
        </div>
    </main>

    <script>lucide.createIcons();</script>
</body>
</html>
