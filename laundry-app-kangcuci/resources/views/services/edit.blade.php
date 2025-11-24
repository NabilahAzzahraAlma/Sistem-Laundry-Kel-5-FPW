@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Layanan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="{{ $service->nama_pelanggan }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" name="category" value="{{ $service->category }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Parfume</label>
                    <input type="text" name="parfume" value="{{ $service->parfume }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga / Kg</label>
                    <input type="number" name="price_per_kg" value="{{ $service->price_per_kg }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{ $service->quantity }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Total Price</label>
                    <input type="number" name="total_price" value="{{ $service->total_price }}" class="form-control">
                </div>

                <button class="btn btn-success">Update</button>
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

</div>
@endsection
