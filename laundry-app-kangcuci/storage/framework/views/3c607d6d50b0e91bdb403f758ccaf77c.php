<?php $__env->startSection('title', 'Manajemen Users'); ?>
<?php $__env->startSection('header_title', 'Data Pengguna'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
        <h3 class="font-bold text-gray-700">Daftar Pengguna</h3>
        <a href="<?php echo e(route('users.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center gap-2 text-sm font-medium">
            <i data-lucide="user-plus" class="w-4 h-4"></i> Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Email / Kontak</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 font-semibold text-gray-700"><?php echo e($user->name); ?></td>
                    <td class="px-6 py-4">
                        <?php if($user->role == 'admin'): ?>
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">ADMIN</span>
                        <?php elseif($user->role == 'staff'): ?>
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">STAFF</span>
                        <?php else: ?>
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">CUSTOMER</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span><?php echo e($user->email); ?></span>
                            <span class="text-xs text-gray-400"><?php echo e($user->phone ?? '-'); ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 truncate max-w-xs"><?php echo e($user->address ?? '-'); ?></td>
                    <td class="px-6 py-4 text-center">
                        <form action="<?php echo e(route('users.destroy', $user->id_user)); ?>" method="POST" onsubmit="return confirm('Hapus user ini?');">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-red-500 hover:bg-red-50 p-2 rounded"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/users/index.blade.php ENDPATH**/ ?>