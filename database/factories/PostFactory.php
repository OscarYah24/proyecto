<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * El modelo asociado con esta factory.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true), // Título de 6 palabras
            'content' => $this->faker->paragraphs(4, true), // 4 párrafos de contenido
            'user_id' => User::factory(), // Crea un usuario o usa uno existente
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => now(),
        ];
    }

    /**
     * Estado para posts con contenido largo.
     */
    public function longContent(): static
    {
        return $this->state(fn (array $attributes) => [
            'content' => $this->faker->paragraphs(8, true),
        ]);
    }

    /**
     * Estado para posts con títulos específicos.
     */
    public function withTitle(string $title): static
    {
        return $this->state(fn (array $attributes) => [
            'title' => $title,
        ]);
    }

    /**
     * Estado para asignar a un usuario específico.
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }
}