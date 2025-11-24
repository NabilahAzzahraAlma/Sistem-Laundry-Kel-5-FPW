<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Order Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Order Baru</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">Pilih Pelanggan</label>
                    <select class="form-select" name="id_user" required>
                        <option value="" selected disabled>-- Pilih Pelanggan --</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id_user); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Order</label>
                    <input type="date" class="form-control" name="order_date" value="<?php echo e(date('Y-m-d')); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="serviceSelect" class="form-label">Pilih Layanan</label>
                    <select class="form-select" id="serviceSelect" name="id_service" onchange="updateDetails()" required>
                        <option value="" selected disabled>-- Pilih Layanan --</option>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id_service); ?>"
                                    data-price="<?php echo e($service->price_per_kg); ?>"
                                    data-duration="<?php echo e($service->duration ?? '-'); ?>"
                                    data-min="<?php echo e($service->min_order ?? '-'); ?>"
                                    data-unit="<?php echo e($service->unit ?? 'KG'); ?>">
                                <?php echo e($service->category); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="row g-3 bg-light p-3 border rounded mb-3">
                    <div class="col-md-6">
                        <label class="form-label small text-muted">Harga Satuan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control bg-white" id="priceDisplay" placeholder="0" oninput="calculateTotal()">
                            <span class="input-group-text" id="unitDisplay">/ -</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-muted">Durasi</label>
                        <input type="text" class="form-control bg-white" id="durationDisplay" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label small text-muted">Minimal Order</label>
                        <input type="text" class="form-control bg-white" id="minOrderDisplay" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Berat (KG) / Satuan (PCS)</label>
                    <input type="number" class="form-control" name="weight" id="qtyInput" placeholder="Masukkan angka..." min="1" oninput="calculateTotal()" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Pembayaran Awal</label>
                    <select class="form-select" name="status_payment" required>
                        <option value="pending">Pending (Belum Bayar)</option>
                        <option value="paid">Paid (Lunas)</option>
                    </select>
                </div>

                <hr>

                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    <strong>Total Estimasi:</strong>
                    <h3 class="mb-0" id="totalPrice">Rp. 0</h3>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan Order</button>
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function updateDetails() {
        const select = document.getElementById('serviceSelect');
        if(select.selectedIndex <= 0) return;

        const selectedOption = select.options[select.selectedIndex];

        // Ambil data
        const price = selectedOption.getAttribute('data-price');
        const duration = selectedOption.getAttribute('data-duration');
        const minOrder = selectedOption.getAttribute('data-min');
        const unit = selectedOption.getAttribute('data-unit');

        // Isi ke input
        // Kita tidak pakai format Rupiah (titik) di input value agar bisa dihitung matematika
        document.getElementById('priceDisplay').value = price;

        document.getElementById('durationDisplay').value = duration;
        document.getElementById('minOrderDisplay').value = minOrder;
        document.getElementById('unitDisplay').innerText = "/ " + unit;

        calculateTotal();
    }

    function calculateTotal() {
        // Ambil harga dari input (bisa dari otomatis atau ketik manual)
        const price = document.getElementById('priceDisplay').value;
        const qty = document.getElementById('qtyInput').value;

        if (price && qty) {
            const total = price * qty;
            // Tampilkan Format Rupiah yang cantik hanya di Label Total
            document.getElementById('totalPrice').innerText = "Rp. " + new Intl.NumberFormat('id-ID').format(total);
        } else {
            document.getElementById('totalPrice').innerText = "Rp. 0";
        }
    }
</script>

</body>
</html>
<?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/orders/create.blade.php ENDPATH**/ ?>