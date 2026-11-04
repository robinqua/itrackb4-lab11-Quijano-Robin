<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create([
            'title' => 'The Example Movie',
            'release_year' => 2024,
            'is_available' => true,
            'description' => 'A sample movie record.',
        ]);
    }
}