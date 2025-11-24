@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>Detail Order #{{ $order->id }}</h4>
        </div>

        <div class="card-body">

            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total) }}</p>
            <p><strong>Status Pembayaran:</strong> {{ $order->status_payment }}</p>
            <p><strong>Status Proses:</strong> {{ $order->status_progress }}</p>
            <p><strong>Tanggal Order:</strong> {{ $order->order_date }}</p>

            <hr>

            @include('orders._details')

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Kembali</a>

        </div>

    </div>

</div>
@endsection
