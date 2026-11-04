

<?php $__env->startSection('title', 'Book Filter'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Book Filter</h1>
    <p><strong><?php echo e($message); ?></strong></p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($book['id']); ?></td>
                <td>
                    <a href="<?php echo e(route('books.show', $book['id'])); ?>">
                        <?php echo e($book['isbn']); ?>

                    </a>
                </td>
                <td><?php echo e($book['title']); ?></td>
                <td><?php echo e($book['author']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">← Back to Book List</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/books/filter.blade.php ENDPATH**/ ?>