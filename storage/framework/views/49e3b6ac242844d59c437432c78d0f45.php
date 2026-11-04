<nav>
    <a href="<?php echo e(route('books.index')); ?>"
       class="btn btn-sm <?php echo e((request()->is('books') || (request()->is('books/*') && !request()->is('books/featured'))) ? 'btn-light' : 'btn-outline-light'); ?>"
       <?php if(request()->is('books') || (request()->is('books/*') && !request()->is('books/featured'))): ?> aria-current="page" <?php endif; ?>>
        All Books
    </a>
    <a href="<?php echo e(route('books.featured')); ?>"
       class="btn btn-sm <?php echo e(request()->is('books/featured') ? 'btn-light' : 'btn-outline-light'); ?>"
       <?php if(request()->is('books/featured')): ?> aria-current="page" <?php endif; ?>>
        Featured Book
    </a>
</nav><?php /**PATH C:\itrackb4-la5-Quijano-Robin-main\resources\views/partials/_nav.blade.php ENDPATH**/ ?>