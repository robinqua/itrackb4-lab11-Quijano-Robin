

<?php $__env->startSection('title', 'Subject Filter'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Subject Filter</h1>
    <p><strong><?php echo e($message); ?></strong></p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Title</th>
                <th>Units</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($subj['id']); ?></td>
                <td>
                    <a href="<?php echo e(route('subjects.show', $subj['id'])); ?>">
                        <?php echo e($subj['code']); ?>

                    </a>
                </td>
                <td><?php echo e($subj['title']); ?></td>
                <td><?php echo e($subj['units']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('subjects.index')); ?>" class="btn btn-secondary">← Back to Subject List</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/subjects/filter.blade.php ENDPATH**/ ?>