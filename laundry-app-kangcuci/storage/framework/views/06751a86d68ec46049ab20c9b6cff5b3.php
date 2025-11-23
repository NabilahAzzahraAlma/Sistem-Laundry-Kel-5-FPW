<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { height: 100vh; width: 250px; background: #0d6efd; color: white; position: fixed; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 12px 20px; transition: 0.2s; }
        .sidebar a:hover, .sidebar .active { background: rgba(255,255,255,0.15); }
        .content { margin-left: 260px; padding: 20px; }
        .card-hover:hover { transform: translateY(-5px); transition: 0.3s; box-shadow: 0px 10px 20px rgba(0,0,0,.1); }
    </style>
</head>
<body>

    <div class="sidebar p-3">
        <h3 class="mb-4 fw-bold">🧺 Laundry Admin</h3>
        <a href="<?php echo e(route('dashboard')); ?>" class="active">📊 Dashboard</a>
        <a href="/orders">📝 Orders</a>
        <a href="/services">🧴 Services</a>
        <a href="/complaints">📢 Complaints</a>
        <a href="/users">👥 Users</a>
        <hr class="border-light">
        <form action="/logout" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-link text-white text-decoration-none p-0 ps-3">🚪 Logout</button>
        </form>
    </div>

    <div class="content">

        <h2 class="fw-bold mb-4">Dashboard</h2>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card card-hover shadow-sm p-3">
                    <h5>Total Orders</h5>
                    <h2 class="fw-bold text-primary"><?php echo e($totalOrders); ?></h2>
                    <p class="text-muted">Semua pesanan masuk</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hover shadow-sm p-3">
                    <h5>Orders Selesai</h5>
                    <h2 class="fw-bold text-success"><?php echo e($finishedOrders); ?></h2>
                    <p class="text-muted">Pesanan berstatus selesai</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hover shadow-sm p-3">
                    <h5>User Terdaftar</h5>
                    <h2 class="fw-bold text-warning"><?php echo e($totalUsers); ?></h2>
                    <p class="text-muted">Total Akun</p>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="fw-bold">📝 5 Order Terbaru</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>#<?php echo e($order->id); ?></td>
                            <td><?php echo e($order->user->name ?? 'Guest'); ?></td>
                            <td>Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></td>
                            <td>
                                <?php if($order->status_progress == 'selesai'): ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php elseif($order->status_progress == 'proses'): ?>
                                    <span class="badge bg-info">Proses</span>
                                <?php elseif($order->status_progress == 'diambil'): ?>
                                    <span class="badge bg-secondary">Diambil</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada pesanan terbaru.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/dashboard/index.blade.php ENDPATH**/ ?>