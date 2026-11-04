

<?php $__env->startSection('title', 'Featured Book'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Featured Book</h1>

    <div class="card" style="max-width: 24rem;">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($featured['title']); ?></h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><strong>ID:</strong> <?php echo e($featured['id']); ?></li>
                <li class="list-group-item"><strong>ISBN:</strong> <?php echo e($featured['isbn']); ?></li>
                <li class="list-group-item"><strong>Author:</strong> <?php echo e($featured['author']); ?></li>
                <li class="list-group-item"><strong>Pages:</strong> <?php echo e($featured['pages']); ?></li>
            </ul>
            <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">← Back to Book List</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\itrackb4-la5-Quijano-Robin-main\resources\views/books/featured.blade.php ENDPATH**/ ?>