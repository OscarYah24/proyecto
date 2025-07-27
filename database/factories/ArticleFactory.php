<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a la factory
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Definir el estado por defecto del modelo
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'content' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name(),
            'category_id' => Category::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicar que el artículo tiene una categoría específica
     */
    public function withCategory(Category $category): static
    {
        return $this->state(fn (array $attributes) => [
            'category_id' => $category->id,
        ]);
    }

    /**
     * Indicar que el artículo es reciente
     */
    public function recent(): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => now()->subHours(rand(1, 24)),
            'updated_at' => now(),
        ]);
    }

    /**
     * Indicar que el artículo es antiguo
     */
    public function old(): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'updated_at' => $this->faker->dateTimeBetween($attributes['created_at'], 'now'),
        ]);
    }

    /**
     * Artículo con autor específico
     */
    public function byAuthor(string $author): static
    {
        return $this->state(fn (array $attributes) => [
            'author' => $author,
        ]);
    }
}