<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = Author::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        if (!$author || !$category) {
            throw new \Exception('Seeding failed: Make sure authors and categories data exist before seeding books.');
        }

        return [
            'title' => $this->faker->sentence(3),
            'author_id' => $author->id,
            'category_id' => $category->id,
        ];
    }
}
