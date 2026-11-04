

<?php $__env->startSection('title', 'Featured Subject'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Featured Subject</h1>

    <div class="card" style="max-width: 24rem;">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($featured['title']); ?></h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><strong>ID:</strong> <?php echo e($featured['id']); ?></li>
                <li class="list-group-item"><strong>Code:</strong> <?php echo e($featured['code']); ?></li>
                <li class="list-group-item"><strong>Units:</strong> <?php echo e($featured['units']); ?></li>
            </ul>
            <a href="<?php echo e(route('subjects.index')); ?>" class="btn btn-primary">← Back to Subject List</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/subjects/featured.blade.php ENDPATH**/ ?>