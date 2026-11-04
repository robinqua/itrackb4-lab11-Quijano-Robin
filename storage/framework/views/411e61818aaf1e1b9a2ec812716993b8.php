 
<?php $__env->startSection('title', 'All Teachers'); ?>
 
<?php $__env->startSection('content'); ?>
    <h3>Teacher List</h3>
 
    <table class="table table-bordered table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Department</th>
        </tr>
 
        <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <a href="<?php echo e(route('teachers.show', $teacher['id'])); ?>">
                        <?php echo e($teacher['name']); ?>

                    </a>
                </td>
                <td><?php echo e($teacher['department']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="3">No teachers found.</td></tr>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/teachers/index.blade.php ENDPATH**/ ?>