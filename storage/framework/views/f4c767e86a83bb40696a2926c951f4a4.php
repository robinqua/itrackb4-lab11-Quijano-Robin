<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'My Site'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="bg-dark text-white p-3 mb-4">
        <div class="container">
            <h1>My Awesome Site</h1>
            <?php echo $__env->make('partials._nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </header>

    <main class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="container text-center text-muted mt-5 mb-3">
        <p>Robin Quijano</p>
    </footer>

</body>
</html><?php /**PATH C:\itrackb4-la5-Quijano-Robin-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>