<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Database\Factories\BookFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory($numReviews)->count($numReviews)->good()->for($book)->create();
    });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory($numReviews)->count($numReviews)->average()->for($book)->create();
    });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory($numReviews)->count($numReviews)->bad()->for($book)->create();
    });
    }
}
