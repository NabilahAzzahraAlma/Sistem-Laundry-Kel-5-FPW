@extends('layouts.app')

@section('content')
<h3>Add Transaction</h3>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Order</label>
        <select name="order_id" class="form-control" required>
            @foreach($orders as $o)
                <option value="{{ $o->id }}">
                    Order #{{ $o->id }} - {{ $o->user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Total Amount (Rp)</label>
        <input type="number" class="form-control" name="total_amount" required min="0">
    </div>

    <div class="mb-3">
        <label>Payment Method</label>
        <select name="payment_method" class="form-control" required>
            <option value="cash">Cash</option>
            <option value="transfer">Transfer Bank</option>
            <option value="ewallet">E-Wallet</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Payment Status</label>
        <select name="payment_status" class="form-control" required>
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Payment Date</label>
        <input type="date" class="form-control" name="payment_date">
    </div>

    <button class="btn btn-primary">Save</button>

</form>
@endsection
