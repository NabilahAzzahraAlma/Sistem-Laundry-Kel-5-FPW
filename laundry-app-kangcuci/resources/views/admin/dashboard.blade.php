@extends('layouts.admin')

@section('title', 'Dashboard - Admin Laundry')
@section('header_title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <div class="text-gray-500 text-sm font-medium uppercase">Total Orders</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_orders'] ?? 0 }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
            <div class="text-gray-500 text-sm font-medium uppercase">Orders Selesai</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['orders_selesai'] ?? 0 }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-500">
            <div class="text-gray-500 text-sm font-medium uppercase">User Terdaftar</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['user_terdaftar'] ?? 0 }}</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-bold text-gray-700">Orders Terbaru</h3>
            <a href="{{ route('orders.index') }}" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID Order</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status Progress</th>
                        <th class="px-6 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-blue-600">
                            #ORD-{{ str_pad($order->id_order, 4, '0', STR_PAD_LEFT) }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            {{ $order->user->name ?? 'User Dihapus' }}
                        </td>

                        <td class="px-6 py-4">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $statusClass = match($order->status_progress) {
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'process' => 'bg-blue-100 text-blue-700',
                                    'done'    => 'bg-green-100 text-green-700',
                                    default   => 'bg-gray-100 text-gray-600',
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $statusClass }}">
                                {{ $order->status_progress }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada data order.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
