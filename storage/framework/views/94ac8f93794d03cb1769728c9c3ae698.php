 
<?php $__env->startSection('title', $teacher['name']); ?>
 
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?php echo e($teacher['name']); ?></h3>
            <p>Department: <?php echo e($teacher['department']); ?></p>
            <p>Subject: <?php echo e($teacher['subject']); ?></p>
 
            <a class="btn btn-primary"
               href="<?php echo e(route('teachers.index')); ?>">Back to the list</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/teachers/show.blade.php ENDPATH**/ ?>