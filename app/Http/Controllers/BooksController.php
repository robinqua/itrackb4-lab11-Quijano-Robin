<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BooksController extends Controller
{
    private function getBooks()
    {
        $path = storage_path('books.json');

        if (!is_file($path)) {
            return [];
        }

        $books = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

        return is_array($books) ? $books : [];
    }

    private function saveBooks(array $books): void
    {
        $json = json_encode($books, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);

        if (file_put_contents(storage_path('books.json'), $json, LOCK_EX) === false) {
            throw new \RuntimeException('Unable to save books to storage/books.json.');
        }
    }

    public function index(Request $request)
    {
        $allBooks = $this->getBooks();
        $pages = $request->query('pages');
        $author = $request->query('author');

        $books = array_values(array_filter($allBooks, function ($book) use ($pages, $author) {
            return ($pages === null || (string) $book['pages'] === (string) $pages)
                && ($author === null || $book['author'] === $author);
        }));

        return view('books.index', [
            'books' => $books,
            'pages' => $pages,
            'author' => $author,
            'pageOptions' => array_values(array_unique(array_column($allBooks, 'pages'))),
            'authorOptions' => array_values(array_unique(array_column($allBooks, 'author'))),
            'queryCount' => 2,
        ]);
    }

    public function create()
    {
        $books = $this->getBooks();
        $authors = array_values(array_unique(array_column($books, 'author')));
        $nextId = empty($books) ? 1 : max(array_map('intval', array_keys($books))) + 1;

        return view('books.create', [
            'authors' => $authors,
            'nextId' => $nextId,
        ]);
    }

    public function store(Request $request)
    {
        $books = $this->getBooks();
        $authors = array_values(array_unique(array_column($books, 'author')));

        $validated = $request->validate([
            'id' => ['required', 'integer', 'min:1', Rule::notIn(array_map('strval', array_keys($books)))],
            'isbn' => ['required', 'string', 'max:32', Rule::notIn(array_column($books, 'isbn'))],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', Rule::in($authors)],
            'pages' => ['required', 'integer', 'min:1'],
        ]);

        $validated['id'] = (int) $validated['id'];
        $validated['pages'] = (int) $validated['pages'];
        $books[$validated['id']] = $validated;
        $this->saveBooks($books);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show($book)
    {
        $books = $this->getBooks();
        if (!isset($books[$book])) {
            abort(404);
        }
        return view('books.show', ['book' => $books[$book]]);
    }

    public function edit($book)
    {
        $books = $this->getBooks();

        if (!isset($books[$book])) {
            abort(404);
        }

        return view('books.edit', [
            'book' => $books[$book],
            'authors' => array_values(array_unique(array_column($books, 'author'))),
        ]);
    }

    public function update(Request $request, $book)
    {
        $books = $this->getBooks();

        if (!isset($books[$book])) {
            abort(404);
        }

        $authors = array_values(array_unique(array_column($books, 'author')));

        $validated = $request->validate([
            'isbn' => ['required', 'string', 'max:32', function ($attribute, $value, $fail) use ($books, $book) {
                foreach ($books as $bookId => $storedBook) {
                    if ((string) $bookId !== (string) $book && (string) $storedBook['isbn'] === (string) $value) {
                        $fail('The ISBN has already been taken.');
                        return;
                    }
                }
            }],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', Rule::in($authors)],
            'pages' => ['required', 'integer', 'min:1'],
        ]);

        $books[$book] = array_merge($books[$book], $validated);
        $this->saveBooks($books);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($book)
    {
        $books = $this->getBooks();

        if (!isset($books[$book])) {
            abort(404);
        }

        unset($books[$book]);
        $this->saveBooks($books);

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function featured()
    {
        $books = $this->getBooks();
        return view('books.featured', ['featured' => $books[1]]);
    }

}
