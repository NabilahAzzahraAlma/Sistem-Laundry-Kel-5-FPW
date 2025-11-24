<?php $__env->startSection('title', 'Daftar Layanan Laundry'); ?>
<?php $__env->startSection('header_title', 'Manajemen Layanan'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex items-center gap-2" role="alert">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50 rounded-t-xl">
            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                <i data-lucide="tag" class="w-5 h-5 text-gray-500"></i> Daftar Paket Laundry
            </h3>

            <a href="<?php echo e(route('services.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Layanan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Kategori Layanan</th>
                        <th class="px-6 py-3 border-b">Aroma Parfum</th>
                        <th class="px-6 py-3 border-b">Harga / Kg</th>
                        <th class="px-6 py-3 border-b">Dibuat Oleh</th>
                        <th class="px-6 py-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-600 bg-white">
                    <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-400">
                            <?php echo e($services->firstItem() + $index); ?>

                        </td>

                        <td class="px-6 py-4 font-bold text-gray-700">
                            <?php echo e($service->category); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php if($service->parfume_name): ?>
                                <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold flex items-center gap-1 w-fit">
                                    <i data-lucide="flower-2" class="w-3 h-3"></i>
                                    <?php echo e($service->parfume_name); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400 italic">- Tidak ada -</span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4 font-medium text-green-600 text-base">
                            Rp <?php echo e(number_format($service->price_per_kg, 0, ',', '.')); ?>

                        </td>

                        <td class="px-6 py-4 text-xs text-gray-500">
                            <?php echo e($service->user->name ?? 'Admin Default'); ?>

                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="<?php echo e(route('services.edit', $service->id_service)); ?>" class="p-2 bg-yellow-50 rounded hover:bg-yellow-100 text-yellow-600 transition border border-yellow-200" title="Edit Layanan">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>

                                <form action="<?php echo e(route('services.destroy', $service->id_service)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan <?php echo e($service->category); ?>?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="p-2 bg-red-50 rounded hover:bg-red-100 text-red-600 transition border border-red-200" title="Hapus Layanan">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="package-open" class="w-12 h-12 mb-3 text-gray-300"></i>
                                <p class="text-base font-medium">Belum ada layanan laundry.</p>
                                <p class="text-sm">Silakan klik tombol tambah di atas.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100">
            <?php echo e($services->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/services/index.blade.php ENDPATH**/ ?>