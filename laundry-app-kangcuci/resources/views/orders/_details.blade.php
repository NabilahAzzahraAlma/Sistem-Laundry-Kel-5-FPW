<h5>Detail Item</h5>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Layanan</th>
            <th>Berat (kg)</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($order->details as $d)
        <tr>
            <td>{{ $d->service->category }} - {{ $d->service->parfume_name }}</td>
            <td>{{ $d->weight }}</td>
            <td>Rp {{ number_format($d->subtotal) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
