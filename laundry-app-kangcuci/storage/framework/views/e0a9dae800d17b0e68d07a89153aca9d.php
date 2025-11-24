<?php $__env->startSection('title', 'Dashboard - Admin Laundry'); ?>
<?php $__env->startSection('header_title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <div class="text-gray-500 text-sm font-medium uppercase">Total Orders</div>
            <div class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['total_orders'] ?? 0); ?></div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
            <div class="text-gray-500 text-sm font-medium uppercase">Orders Selesai</div>
            <div class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['orders_selesai'] ?? 0); ?></div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-500">
            <div class="text-gray-500 text-sm font-medium uppercase">User Terdaftar</div>
            <div class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($stats['user_terdaftar'] ?? 0); ?></div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-bold text-gray-700">Orders Terbaru</h3>
            <a href="<?php echo e(route('orders.index')); ?>" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID Order</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status Progress</th>
                        <th class="px-6 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                    <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-blue-600">
                            #ORD-<?php echo e(str_pad($order->id_order, 4, '0', STR_PAD_LEFT)); ?>

                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            <?php echo e($order->user->name ?? 'User Dihapus'); ?>

                        </td>

                        <td class="px-6 py-4">
                            Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php
                                $statusClass = match($order->status_progress) {
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'process' => 'bg-blue-100 text-blue-700',
                                    'done'    => 'bg-green-100 text-green-700',
                                    default   => 'bg-gray-100 text-gray-600',
                                };
                            ?>
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase <?php echo e($statusClass); ?>">
                                <?php echo e($order->status_progress); ?>

                            </span>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <?php echo e(\Carbon\Carbon::parse($order->order_date)->format('d M Y')); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada data order.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/dashboard.blade.php ENDPATH**/ ?>