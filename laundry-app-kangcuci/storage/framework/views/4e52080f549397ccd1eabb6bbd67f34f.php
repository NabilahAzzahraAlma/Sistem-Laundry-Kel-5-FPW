<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Buat Order Baru</h4>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label class="form-label">User</label>
                    <select name="id_user" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Service</label>
                    <select name="id_service" class="form-select" required>
                        <option value="">-- Pilih Service --</option>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($s->id); ?>">
                                <?php echo e($s->category); ?> - Rp<?php echo e(number_format($s->price_per_kg, 0)); ?>/kg
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Berat (KG)</label>
                    <input type="number" name="weight" class="form-control" min="1" required>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/orders/create.blade.php ENDPATH**/ ?>