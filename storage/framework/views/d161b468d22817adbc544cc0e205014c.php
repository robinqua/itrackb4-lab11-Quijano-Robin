<?php $__env->startSection('title', 'My Book List'); ?>

<?php $__env->startSection('content'); ?>
    <h1>My Book List</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Pages</th>
        </tr>

        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($book['id']); ?></td>
            <td>
                <a href="<?php echo e(route('books.show', $book['id'])); ?>">
                    <?php echo e($book['isbn']); ?>

                </a>
            </td>
            <td><?php echo e($book['title']); ?></td>
            <td>
                <?php if($book['pages'] >= 300): ?>
                    <strong><?php echo e($book['pages']); ?> (Long Read)</strong>
                <?php else: ?>
                    <?php echo e($book['pages']); ?>

                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5">No books have been added yet. Check back once some are added.</td>
        </tr>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/books/index.blade.php ENDPATH**/ ?>