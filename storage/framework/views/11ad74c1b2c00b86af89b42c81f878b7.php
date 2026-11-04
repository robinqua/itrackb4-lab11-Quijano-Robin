

<?php $__env->startSection('title', $book['title']); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($book['title']); ?></h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> <?php echo e($book['id']); ?></li>
        <li class="list-group-item"><strong>ISBN:</strong> <?php echo e($book['isbn']); ?></li>
        <li class="list-group-item"><strong>Author:</strong> <?php echo e($book['author']); ?></li>
        <li class="list-group-item"><strong>Pages:</strong> <?php echo e($book['pages']); ?></li>
    </ul>

    <div class="mt-3 d-flex gap-2">
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">← Back to Book List</a>
        <a href="<?php echo e(route('books.edit', $book['id'])); ?>" class="btn btn-warning">Edit</a>
        <form action="<?php echo e(route('books.destroy', $book['id'])); ?>" method="POST" onsubmit="return confirm('Delete this record?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\itrackb4-la5-Quijano-Robin-main\resources\views/books/show.blade.php ENDPATH**/ ?>