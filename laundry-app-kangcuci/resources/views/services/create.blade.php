<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Tambah Layanan Laundry</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Layanan / Kategori</label>
                    <input type="text" class="form-control" name="category" placeholder="Contoh: Baju Bayi, Bed Cover..." required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" name="price_per_kg" placeholder="Contoh: 9000" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Satuan</label>
                        <select class="form-select" name="unit" required>
                            <option value="KG">Per Kilogram (KG)</option>
                            <option value="PCS">Per Potong (PCS)</option>
                            <option value="MTR">Per Meter</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estimasi Durasi</label>
                        <input type="text" class="form-control" name="duration" placeholder="Contoh: 2 Hari, 6 Jam" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Keterangan Minimal Order</label>
                        <input type="text" class="form-control" name="min_order" placeholder="Contoh: Minimal 3 KG, Tanpa minimal order" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Jenis Parfum</label>
                    <select class="form-select" name="parfume_name">
                        <option value="" selected disabled>-- Pilih Parfum --</option>
                        <option value="allura">allura</option>
                        <option value="Baccarat">Baccarat</option>
                        <option value="downi black">downi black</option>
                        <option value="pilux">pilux</option>
                        <option value="sakura">sakura</option>
                        <option value="selgomz">selgomz</option>
                        <option value="Tanpa parfum">Tanpa parfum</option>
                    </select>
                </div>

                <hr>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Simpan Layanan</button>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
