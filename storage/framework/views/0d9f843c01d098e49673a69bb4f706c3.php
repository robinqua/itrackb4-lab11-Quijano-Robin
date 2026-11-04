

<?php $__env->startSection('title', $book['title']); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($book['title']); ?></h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> <?php echo e($book['id']); ?></li>
        <li class="list-group-item"><strong>ISBN:</strong> <?php echo e($book['isbn']); ?></li>
        <li class="list-group-item"><strong>Author:</strong> <?php echo e($book['author']); ?></li>
        <li class="list-group-item"><strong>Pages:</strong> <?php echo e($book['pages']); ?></li>
    </ul>

    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary mt-3">← Back to Book List</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\libsys-portal\resources\views/books/show.blade.php ENDPATH**/ ?>