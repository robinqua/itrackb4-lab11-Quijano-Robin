<nav>
    <a href="{{ route('books.index') }}"
       class="btn btn-sm {{ (request()->is('books') || (request()->is('books/*') && !request()->is('books/featured'))) ? 'btn-light' : 'btn-outline-light' }}"
       @if (request()->is('books') || (request()->is('books/*') && !request()->is('books/featured'))) aria-current="page" @endif>
        All Books
    </a>
    <a href="{{ route('books.featured') }}"
       class="btn btn-sm {{ request()->is('books/featured') ? 'btn-light' : 'btn-outline-light' }}"
       @if (request()->is('books/featured')) aria-current="page" @endif>
        Featured Book
    </a>
</nav>