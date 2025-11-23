<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Orders</h2>
        <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-primary">
            + Tambah Order
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status Payment</th>
                        <th>Status Progress</th>
                        <th>Tanggal Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($o->id); ?></td>
                        <td><?php echo e($o->user->name); ?></td>
                        <td>Rp <?php echo e(number_format($o->total)); ?></td>
                        <td>
                            <span class="badge
                                <?php echo e($o->status_payment == 'paid' ? 'bg-success' : 'bg-warning'); ?>">
                                <?php echo e($o->status_payment); ?>

                            </span>
                        </td>

                        <td>
                            <span class="badge bg-info"><?php echo e($o->status_progress); ?></span>
                        </td>

                        <td><?php echo e($o->order_date); ?></td>

                        <td>
                            <a href="<?php echo e(route('orders.show', $o->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                            <a href="<?php echo e(route('orders.edit', $o->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                            <form action="<?php echo e(route('orders.destroy', $o->id)); ?>" method="POST"
                                  class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus Order?')">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/orders/index.blade.php ENDPATH**/ ?>