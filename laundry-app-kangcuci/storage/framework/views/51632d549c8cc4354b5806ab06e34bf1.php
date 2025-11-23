<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Layanan</h4>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('services.update', $service->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="<?php echo e($service->nama_pelanggan); ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" name="category" value="<?php echo e($service->category); ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Parfume</label>
                    <input type="text" name="parfume" value="<?php echo e($service->parfume); ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga / Kg</label>
                    <input type="number" name="price_per_kg" value="<?php echo e($service->price_per_kg); ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="<?php echo e($service->quantity); ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Total Price</label>
                    <input type="number" name="total_price" value="<?php echo e($service->total_price); ?>" class="form-control">
                </div>

                <button class="btn btn-success">Update</button>
                <a href="<?php echo e(route('services.index')); ?>" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/services/edit.blade.php ENDPATH**/ ?>