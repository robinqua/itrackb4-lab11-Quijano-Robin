<?php

namespace Tests\Feature;

use Tests\TestCase;

class BooksTest extends TestCase
{
    private string $originalBooks;

    protected function setUp(): void
    {
        parent::setUp();
        $this->originalBooks = file_get_contents(storage_path('books.json'));
    }

    protected function tearDown(): void
    {
        file_put_contents(storage_path('books.json'), $this->originalBooks, LOCK_EX);
        parent::tearDown();
    }

    public function test_book_pages_still_load_from_json(): void
    {
        $this->get(route('books.index'))
            ->assertOk()
            ->assertSee('Clean Code');

        $this->get(route('books.show', 1))
            ->assertOk()
            ->assertSee('Robert C. Martin');

        $this->get(route('books.index', ['author' => 'Robert C. Martin', 'pages' => 464]))
            ->assertOk()
            ->assertSee('Clean Code')
            ->assertDontSee('Refactoring');
    }

    public function test_invalid_book_is_not_saved_and_valid_book_uses_post_redirect_get(): void
    {
        $original = json_decode($this->originalBooks, true);

        $this->from(route('books.create'))
            ->post(route('books.store'), [])
            ->assertRedirect(route('books.create'))
            ->assertSessionHasErrors(['id', 'isbn', 'title', 'author', 'pages']);

        $this->assertSame($original, json_decode(file_get_contents(storage_path('books.json')), true));

        $this->post(route('books.store'), [
            'id' => 7,
            'isbn' => '978-1-23456-789-0',
            'title' => 'Test Book',
            'author' => 'Martin Fowler',
            'pages' => 123,
        ])
            ->assertRedirect(route('books.index'))
            ->assertSessionHas('success', 'Book added successfully.');

        $this->get(route('books.index'))
            ->assertOk()
            ->assertSee('Test Book')
            ->assertSessionMissing('success');

        $this->get(route('books.show', 7))
            ->assertOk()
            ->assertSee('978-1-23456-789-0');

        $savedBooks = json_decode(file_get_contents(storage_path('books.json')), true);
        $this->assertCount(count($original) + 1, $savedBooks);
    }
}
