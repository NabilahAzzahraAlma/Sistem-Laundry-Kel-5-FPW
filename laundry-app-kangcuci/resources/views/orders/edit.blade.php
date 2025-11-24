@extends('layouts.admin')

@section('title', 'Edit Status Order')
@section('header_title', 'Update Pesanan #' . $order->id_order)

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6 flex justify-between items-center">
        <div>
            <div class="text-sm text-gray-500">Customer</div>
            <div class="font-bold text-gray-800">{{ $order->user->name }}</div>
        </div>
        <div>
            <div class="text-sm text-gray-500">Total Tagihan</div>
            <div class="font-bold text-blue-700 text-lg">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <h2 class="text-lg font-bold text-gray-700 mb-6 pb-4 border-b">Form Update Status</h2>

            <form action="{{ route('orders.update', $order->id_order) }}" method="POST">
                @csrf
                @method('PUT') <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Pengerjaan</label>
                        <select name="status_progress" class="w-full rounded-lg border-gray-300 shadow-sm p-3 border focus:ring-blue-500">
                            <option value="pending" {{ $order->status_progress == 'pending' ? 'selected' : '' }}>⏳ Pending (Menunggu)</option>
                            <option value="process" {{ $order->status_progress == 'process' ? 'selected' : '' }}>⚙️ Process (Sedang Dicuci)</option>
                            <option value="done"    {{ $order->status_progress == 'done' ? 'selected' : '' }}>✅ Done (Selesai/Siap Ambil)</option>
                            <option value="canceled" {{ $order->status_progress == 'canceled' ? 'selected' : '' }}>❌ Canceled (Dibatalkan)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Pembayaran</label>
                        <select name="status_payment" id="paymentStatus" class="w-full rounded-lg border-gray-300 shadow-sm p-3 border focus:ring-blue-500">
                            <option value="pending" {{ $order->status_payment == 'pending' ? 'selected' : '' }}>Belum Lunas</option>
                            <option value="paid"    {{ $order->status_payment == 'paid' ? 'selected' : '' }}>Lunas (Paid)</option>
                        </select>
                    </div>

                    <div id="methodSection" class="{{ $order->status_payment == 'paid' ? '' : 'hidden' }}">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                        <select name="method_payment" class="w-full rounded-lg border-gray-300 shadow-sm p-3 border focus:ring-blue-500 bg-gray-50">
                            <option value="CASH">Tunai (CASH)</option>
                            <option value="QRIS">QRIS / Transfer</option>
                            <option value="DEBIT">Kartu Debit</option>
                        </select>
                        <p class="text-xs text-gray-400 mt-1">Metode ini akan dicatat di laporan transaksi.</p>
                    </div>

                </div>

                <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-50">
                    <a href="{{ route('orders.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium shadow-md transition flex items-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Script sederhana untuk show/hide metode pembayaran
    const paymentStatus = document.getElementById('paymentStatus');
    const methodSection = document.getElementById('methodSection');

    paymentStatus.addEventListener('change', function() {
        if (this.value === 'paid') {
            methodSection.classList.remove('hidden');
        } else {
            methodSection.classList.add('hidden');
        }
    });
</script>

@endsection
