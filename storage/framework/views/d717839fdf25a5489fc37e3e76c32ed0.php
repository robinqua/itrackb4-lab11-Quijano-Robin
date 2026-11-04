<?php $__env->startSection('title', 'My Subjects List'); ?>

<?php $__env->startSection('content'); ?>
    <h1>My Subjects List</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
        </tr>

        <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($subj['id']); ?></td>
            <td>
                <a href="<?php echo e(route('subjects.show', $subj['id'])); ?>">
                    <?php echo e($subj['code']); ?>

                </a>
            </td>
            <td><?php echo e($subj['title']); ?></td>
            <td>
                <?php if($subj['units'] >= 3): ?>
                    <strong><?php echo e($subj['units']); ?> (Heavy Load)</strong>
                <?php else: ?>
                    <?php echo e($subj['units']); ?>

                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5">No subjects have been added yet. Check back once some are added.</td>
        </tr>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/subjects/index.blade.php ENDPATH**/ ?>