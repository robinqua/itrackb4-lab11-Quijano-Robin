<?php $__env->startSection('title', 'My Book List'); ?>

<?php $__env->startSection('content'); ?>
    <h1>My Book List</h1>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <a href="<?php echo e(route('books.create')); ?>" class="btn btn-success mb-3">Add a Book</a>

    <section class="mb-4">
        <h2 class="h5">Filter by author</h2>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <?php $__currentLoopData = $authorOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $authorOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('books.index', array_filter(['author' => $authorOption, 'pages' => $pages]))); ?>"
                   class="btn btn-sm <?php echo e($author === $authorOption ? 'btn-primary' : 'btn-outline-primary'); ?>">
                    <?php echo e($authorOption); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <h2 class="h5">Filter by page count</h2>
        <div class="d-flex flex-wrap gap-2">
            <?php $__currentLoopData = $pageOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('books.index', array_filter(['author' => $author, 'pages' => $pageOption]))); ?>"
                   class="btn btn-sm <?php echo e((string) $pages === (string) $pageOption ? 'btn-primary' : 'btn-outline-primary'); ?>">
                    <?php echo e($pageOption); ?> pages
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <p class="mt-3 mb-2">
            <strong>Active filters:</strong>
            <?php if($author !== null || $pages !== null): ?>
                <?php if($author !== null): ?> Author: <?php echo e($author); ?><?php endif; ?>
                <?php if($author !== null && $pages !== null): ?> · <?php endif; ?>
                <?php if($pages !== null): ?> <?php echo e($pages); ?> pages <?php endif; ?>
            <?php else: ?>
                None — showing all books
            <?php endif; ?>
        </p>
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary btn-sm">Clear both filters</a>
    </section>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>Actions</th>
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
            <td><?php echo e($book['author']); ?></td>
            <td>
                <?php if($book['pages'] >= 300): ?>
                    <strong><?php echo e($book['pages']); ?> (Long Read)</strong>
                <?php else: ?>
                    <?php echo e($book['pages']); ?>

                <?php endif; ?>
            </td>
            <td>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('books.edit', $book['id'])); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('books.destroy', $book['id'])); ?>" method="POST" onsubmit="return confirm('Delete this record?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7">No books match these filters.</td>
        </tr>
        <?php endif; ?>
    </table>

    <p class="mt-3 mb-0">Queries: <?php echo e($queryCount); ?></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\itrackb4-la5-Quijano-Robin-main\resources\views/books/index.blade.php ENDPATH**/ ?>