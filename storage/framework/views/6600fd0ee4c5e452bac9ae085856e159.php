

<?php $__env->startSection('title', $subject['title']); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($subject['title']); ?></h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> <?php echo e($subject['id']); ?></li>
        <li class="list-group-item"><strong>Code:</strong> <?php echo e($subject['code']); ?></li>
        <li class="list-group-item"><strong>Units:</strong> <?php echo e($subject['units']); ?></li>
    </ul>

    <a href="<?php echo e(route('subjects.index')); ?>" class="btn btn-secondary mt-3">← Back to Subject List</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/subjects/show.blade.php ENDPATH**/ ?>