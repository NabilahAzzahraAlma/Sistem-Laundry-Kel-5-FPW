<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Data Layanan Laundry</h2>
        <a href="<?php echo e(route('services.create')); ?>" class="btn btn-primary">+ Tambah Layanan</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Category</th>
                        <th>Parfume</th>
                        <th>Harga / Kg</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($s->id); ?></td>
                        <td><?php echo e($s->nama_pelanggan); ?></td>
                        <td><?php echo e($s->category); ?></td>
                        <td><?php echo e($s->parfume); ?></td>
                        <td>Rp <?php echo e(number_format($s->price_per_kg, 0, ',', '.')); ?></td>
                        <td>
                            <a href="<?php echo e(route('services.edit', $s->id)); ?>" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/services/index.blade.php ENDPATH**/ ?>