<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); border-radius: 10px; }
        .btn-primary { background-color: #0d6efd; border: none; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="mb-4">
                    <h4>Tambah Pesanan Baru</h4>
                    <p class="text-muted">Isi detail pesanan di bawah ini.</p>
                </div>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('services.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?> <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label fw-bold">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan nama pelanggan" value="<?php echo e(old('nama_pelanggan')); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fw-bold">Pilih Kategori</label>
                        <select class="form-select" name="category" id="category" required onchange="hitungTotal()">
                            <option value="" selected disabled>-- Pilih Layanan --</option>
                            <option value="Cuci Baju Bayi" data-harga="9000">Cuci Baju Bayi — Rp 9.000 /kg</option>
                            <option value="Cuci Bantal" data-harga="25000">Cuci Bantal — Rp 25.000 /kg</option>
                            <option value="Cuci Bantal Kecil" data-harga="20000">Cuci Bantal Kecil — Rp 20.000 /kg</option>
                            <option value="Cuci Bed Cover Besar" data-harga="35000">Cuci Bed Cover Besar - Rp 35.000 /kg</option>
                            <option value="Cuci Bed Cover Jumbo" data-harga="40000">Cuci Bed Cover Jumbo - Rp 40.000 /kg</option>
                            <option value="Cuci Bed Cover Kecil" data-harga="30000">Cuci Bed Cover Kecil - Rp 30.000 /kg</option>
                            <option value="Cuci Boneka Besar" data-harga="35000">Cuci Boneka Besar - Rp 35.000 /kg</option>
                            <option value="Cuci Boneka Jumbo" data-harga="80000">Cuci Boneka Jumbo - Rp 80.000 /kg</option>
                            <option value="Cuci Boneka Kecil" data-harga="10000">Cuci Boneka Kecil - Rp 10.000 /kg</option>
                            <option value="Cuci Boneka Mini" data-harga="5000">Cuci Boneka Mini - Rp 5.000 /kg</option>
                            <option value="Cuci Boneka Sedang" data-harga="20000">Cuci Boneka Sedang - Rp 20.000 /kg</option>
                            <option value="Cuci Celana" data-harga="15000">Cuci Celana - Rp 15.000 /kg</option>
                            <option value="Lipat double Express" data-harga="10000">Lipat double Express - Rp 10.000 /kg</option>
                            <option value="Lipat Express" data-harga="6000">Lipat Express - Rp 6.000 /kg</option>
                            <option value="Setrika double Express" data-harga="15000">Setrika double Express - Rp 15.000 /kg</option>
                            <option value="Setrika Express" data-harga="7000">Setrika Express - Rp 7.000 /kg</option>
                            <option value="Cuci Dress/Gamis" data-harga="35000">Cuci Dress/Gamis - Rp 35.000 /kg</option>
                            <option value="Cuci Gendongan Bayi" data-harga="15000">Cuci Gendongan Bayi - Rp 15.000 /kg</option>
                            <option value="Cuci Gorden Besar" data-harga="40000">Cuci Gorden Besar - Rp 40.000 /kg</option>
                            <option value="Cuci Gorden Kecil" data-harga="20000">Cuci Gorden Kecil - Rp 20.000 /kg</option>
                            <option value="Cuci Gorden Sedang" data-harga="30000">Cuci Gorden Sedang - Rp 30.000 /kg</option>
                            <option value="Cuci Guling" data-harga="50000">Cuci Guling - Rp 50.000 /kg</option>
                            <option value="Cuci Handuk Besar Tebal" data-harga="10000">Cuci Handuk Besar Tebal - Rp 10.000 /kg</option>
                            <option value="Cuci Jaket Express" data-harga="20000">Cuci Jaket Express - Rp 20.000 /kg</option>
                            <option value="Cuci Jas" data-harga="35000">Cuci Jas - Rp 35.000 /kg</option>
                            <option value="Jasa Setrika Double Express" data-harga="10000">Jasa Setrika Double Express - Rp 10.000 /kg</option>
                            <option value="Jasa Setrika Express" data-harga="6000">Jasa Setrika Express - Rp 6.000 /kg</option>
                            <option value="Cuci Karpet Biasa" data-harga="11000">Cuci Karpet Biasa - Rp 11.000 /kg</option>
                            <option value="Cuci Karpet Cendol/surpet/palembang" data-harga="50000">Cuci Karpet Cendol/surpet/palembang - Rp 50.000 /kg</option>
                            <option value="Cuci Karpet Lembut" data-harga="40000">Cuci Kapet Lembut - Rp 40.000 /kg</option>
                            <option value="Cuci Kasur Bayi" data-harga="50000">Cuci Kasur Bayi - Rp 50.000 /kg</option>
                            <option value="Cuci Kebaya" data-harga="35000">Cuci Kebaya - Rp 35.000 /kg</option>
                            <option value="Cuci Kemeja" data-harga="15000">Cuci Kemeja - Rp 15.000 /kg</option>
                            <option value="Cuci Keset" data-harga="12000">Cuci Keset - Rp 12.000 /kg</option>
                            <option value="Ngeringin" data-harga="5000">Ngeringin - Rp 5.000 /kg</option>
                            <option value="Parfum 1ltr" data-harga="45000">Parfum 1ltr - Rp 45.000 /kg</option>
                            <option value="Cuci Perlak" data-harga="20000">Cuci Perlak - Rp 20.000 /kg</option>
                            <option value="Cuci Sajadah Tebal" data-harga="25000">Cuci Sajadah Tebal - Rp 25.000 /kg</option>
                            <option value="Cuci Sarung sofa/mobil" data-harga="35000">Cuci Sarung sofa/mobil - Rp 35.000 /kg</option>
                            <option value="Cuci Selimut Kecil" data-harga="15000">Cuci Selimut Kecil - Rp 15.000 /kg</option>
                            <option value="Cuci Selimut Sedang" data-harga="20000">Cuci Selimut Sedang - Rp 20.000 /kg</option>
                            <option value="Cuci Selimut Tebal" data-harga="35000">Cuci Selimut Tebal - Rp 35.000 /kg</option>
                            <option value="Cuci Sepatu Anak" data-harga="20000">Cuci Sepatu Anak - Rp 20.000 /kg</option>
                            <option value="Cuci Sepatu Dewasa" data-harga="25000">Cuci Sepatu Dewasa - Rp 25.000 /kg</option>
                            <option value="Cuci Seprai Besar no 1/2 Express" data-harga="15000">Cuci Seprai Besar no 1/2 Express- Rp 15.000 /kg</option>
                            <option value="Cuci Seprai Kecil Express" data-harga="12000">Cuci Seprai Kecil Express- Rp 12.000 /kg</option>
                            <option value="Cuci Seprai Rumbai" data-harga="20000">Cuci Seprai Rumbai- Rp 20.000 /kg</option>
                            <option value="Cuci Seragam 1 stel" data-harga="20000">Cuci Seragam 1 stel - Rp 20.000 /kg</option>
                            <option value="Setrika Kemeja" data-harga="10000">Setrika Kemeja- Rp 10.000 /kg</option>
                            <option value="Setrika Seprai Besar" data-harga="10000">Setrika Seprai Besar - Rp 10.000 /kg</option>
                            <option value="Setrika Seprai Kecil" data-harga="7000">Setrika Seprai Kecil - Rp 7.000 /kg</option>
                            <option value="Stroler Besar" data-harga="70000">Stroler Besar - Rp 70.000 /kg</option>
                            <option value="Stroler Kecil" data-harga="55000">Stroler Kecil - Rp 55.000 /kg</option>
                            <option value="Surpet/cendol/palembang besar" data-harga="70000">Surpet/cendol/palembang besar - Rp 70.000 /kg</option>
                            <option value="Tas Besar" data-harga="30000">Tas Besar - Rp 30.000 /kg</option>
                            <option value="Tas Kecil" data-harga="17000">Tas Kecil - Rp 17.000 /kg</option>
                            <option value="Tas Sedang" data-harga="25000">Tas Sedang - Rp 25.000 /kg</option>
                            <option value="Tikar" data-harga="50000">Tikar - Rp 50.000 /kg</option>





                        </select>
                        <input type="hidden" name="price_per_kg" id="price_per_kg">
                    </div>

                    <div class="mb-3">
                        <label for="parfume" class="form-label fw-bold">Pilih Varian Parfum</label>
                        <select class="form-select" name="parfume" id="parfume" required>
                            <option value="Allura">Allura</option>
                            <option value="Baccarat">Baccarat</option>
                            <option value="Downy Black">Downy Black</option>
                            <option value="Pilux">Pilux</option>
                            <option value="Sakura">Sakura</option>
                            <option value="Selgomz">Selgomz</option>
                            <option value="Tanpa Parfum">Tanpa Parfum</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label fw-bold">Kuantitas (kg/pcs)</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1" required oninput="hitungTotal()">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="total_price_display" class="form-label fw-bold">Total Harga (Rp)</label>
                            <input type="text" class="form-control bg-light" id="total_price_display" readonly>
                            <input type="hidden" name="total_price" id="total_price_input">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="<?php echo e(route('services.index')); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungTotal() {
        // Ambil elemen
        var categorySelect = document.getElementById('category');
        var quantityInput = document.getElementById('quantity');
        var totalDisplay = document.getElementById('total_price_display');
        var totalInput = document.getElementById('total_price_input');
        var priceInput = document.getElementById('price_per_kg');

        // Ambil harga dari atribut 'data-harga' pada opsi yang dipilih
        var selectedOption = categorySelect.options[categorySelect.selectedIndex];
        var pricePerKg = selectedOption.getAttribute('data-harga') ? parseFloat(selectedOption.getAttribute('data-harga')) : 0;

        // Simpan harga satuan ke input hidden (opsional, buat jaga-jaga)
        priceInput.value = pricePerKg;

        // Ambil jumlah berat
        var quantity = quantityInput.value ? parseFloat(quantityInput.value) : 0;

        // Hitung total
        var total = pricePerKg * quantity;

        // Tampilkan ke input (totalInput untuk ke DB, totalDisplay untuk user lihat)
        totalInput.value = total;
        totalDisplay.value = total; // Bisa ditambah format currency jika mau
    }
</script>

</body>
</html>
<?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/services/create.blade.php ENDPATH**/ ?>