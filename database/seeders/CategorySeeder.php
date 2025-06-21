<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electrónicos',
                'descripcion' => 'Productos electrónicos y tecnológicos'
            ],
            [
                'name' => 'Ropa y Accesorios',
                'descripcion' => 'Vestimenta, calzado y complementos'
            ],
            [
                'name' => 'Hogar y Jardín',
                'descripcion' => 'Artículos para el hogar y jardinería'
            ],
            [
                'name' => 'Deportes y Fitness',
                'descripcion' => 'Equipos deportivos y de ejercicio'
            ],
            [
                'name' => 'Libros y Educación',
                'descripcion' => 'Material educativo y literatura'
            ],
            [
                'name' => 'Belleza y Cuidado Personal',
                'descripcion' => 'Productos de belleza y cuidado'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}