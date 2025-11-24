<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $__env->yieldContent('title','Laundry Admin'); ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background:#f4f6f9; }
    .sidebar {
        width:240px;
        position:fixed;
        height:100%;
        background:#0d6efd;
        color:#fff;
        padding:20px;
    }
    .sidebar a {
        text-decoration:none;
        font-size:16px;
        padding:8px 0;
    }
  </style>
</head>

<body>
<div class="d-flex">

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h4 class="mb-4">🧺 Laundry</h4>

    <a class="d-block text-white" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
    <a class="d-block text-white" href="<?php echo e(route('orders.index')); ?>">Orders</a>
    <a class="d-block text-white" href="<?php echo e(route('services.index')); ?>">Services</a>

    
    
  </div>

  <!-- CONTENT -->
  <div class="flex-grow-1" style="margin-left:260px; padding:24px;">
    <?php if(session('success')): ?>
      <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
  </div>

</div>

</body>
</html>
<?php /**PATH C:\laragon\Raffi\www\Sistem-Laundry-Kel-5-FPW\laundry-app-kangcuci\resources\views/layouts/app.blade.php ENDPATH**/ ?>