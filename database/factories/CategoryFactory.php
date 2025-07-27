<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a la factory
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Definir el estado por defecto del modelo
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Tecnología' => 'Artículos relacionados con tecnología y innovación',
            'Deportes' => 'Noticias y artículos deportivos',
            'Salud' => 'Información sobre salud y bienestar',
            'Educación' => 'Contenido educativo y académico',
            'Entretenimiento' => 'Artículos de entretenimiento y cultura',
            'Negocios' => 'Información sobre negocios y emprendimiento',
            'Ciencia' => 'Artículos científicos y de investigación',
            'Viajes' => 'Guías y experiencias de viaje'
        ];

        $categoryName = $this->faker->randomElement(array_keys($categories));

        return [
            'name' => $categoryName,
            'description' => $categories[$categoryName],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }

    /**
     * Categoría de tecnología específica
     */
    public function technology(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Tecnología',
            'description' => 'Artículos sobre tecnología, programación y desarrollo',
        ]);
    }

    /**
     * Categoría de deportes específica
     */
    public function sports(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Deportes',
            'description' => 'Noticias deportivas y eventos',
        ]);
    }
}