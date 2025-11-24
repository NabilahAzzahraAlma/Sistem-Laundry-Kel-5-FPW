@extends('layouts.admin')

@section('title', 'Laporan Transaksi')
@section('header_title', 'Riwayat Transaksi')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl shadow-lg p-6 text-white">
        <div class="text-blue-100 text-sm font-medium mb-1">Total Pemasukan</div>
        <div class="text-3xl font-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
        <div class="text-xs text-blue-200 mt-2">Akumulasi semua transaksi</div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 rounded-t-xl flex justify-between items-center">
        <h3 class="font-bold text-gray-700">Log Pembayaran Masuk</h3>
        <button class="text-sm text-gray-500 hover:text-blue-600 flex items-center gap-1">
            <i data-lucide="download" class="w-4 h-4"></i> Export PDF
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                <tr>
                    <th class="px-6 py-3">ID Transaksi</th>
                    <th class="px-6 py-3">Order Ref</th>
                    <th class="px-6 py-3">Tanggal Bayar</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Metode</th>
                    <th class="px-6 py-3 text-right">Jumlah</th>
                    <th class="px-6 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                @forelse($transaksis as $trx)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-gray-500">
                        #TRX-{{ $trx->id_transaksi }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('orders.show', $trx->id_order) }}" class="text-blue-600 hover:underline font-medium">
                            #ORD-{{ str_pad($trx->id_order, 4, '0', STR_PAD_LEFT) }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($trx->transaksi_date)->format('d M Y H:i') }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-700">
                        {{ $trx->user->name ?? 'Guest' }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="uppercase text-xs font-bold text-gray-500 border border-gray-200 px-2 py-1 rounded">
                            {{ $trx->method_payment }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-green-600">
                        + Rp {{ number_format($trx->jumlah_transaksi, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">
                            {{ $trx->transaksi_status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                        Belum ada transaksi tercatat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4">
        {{ $transaksis->links() }}
    </div>
</div>
@endsection
