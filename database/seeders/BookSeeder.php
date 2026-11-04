<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'id' => 1,
            'isbn' => '9789712736000',
            'title' => 'Noli Me Tangere',
            'author' => 'Jose Rizal',
            'pages' => 400,
        ]);

        Book::create([
            'id' => 2,
            'isbn' => '9789712736017',
            'title' => 'El Filibusterismo',
            'author' => 'Jose Rizal',
            'pages' => 350,
        ]);

        Book::create([
            'id' => 3,
            'isbn' => '9789715080416',
            'title' => 'Florante at Laura',
            'author' => 'Francisco Balagtas',
            'pages' => 120,
        ]);

        Book::create([
            'id' => 4,
            'isbn' => '9780156012195',
            'title' => 'The Little Prince',
            'author' => 'Antoine de Saint-Exupery',
            'pages' => 96,
        ]);

        Book::create([
            'id' => 5,
            'isbn' => '9789715081468',
            'title' => 'Ibong Adarna',
            'author' => 'Jose de la Cruz',
            'pages' => 150,
        ]);
    }
}