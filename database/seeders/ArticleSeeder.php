<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'iPhone 15 Pro Max',
                'content' => 'El nuevo iPhone 15 Pro Max viene con chip A17 Pro, sistema de cámaras avanzado y diseño de titanio. Perfecto para profesionales y entusiastas de la tecnología.',
                'author' => 'TechReviews',
                'category_id' => 1 // Electrónicos
            ],
            [
                'title' => 'Nike Air Max 2024',
                'content' => 'Las nuevas Nike Air Max 2024 combinan comodidad y estilo. Diseñadas para corredores que buscan rendimiento y durabilidad en cada paso.',
                'author' => 'SportsGear',
                'category_id' => 4 // Deportes y Fitness
            ],
            [
                'title' => 'Set de Cocina Premium',
                'content' => 'Conjunto completo de utensilios de cocina de acero inoxidable. Incluye ollas, sartenes y accesorios para crear las mejores recetas en casa.',
                'author' => 'HomeProducts',
                'category_id' => 3 // Hogar y Jardín
            ],
            [
                'title' => 'Curso de Programación Web',
                'content' => 'Aprende desarrollo web desde cero con HTML, CSS, JavaScript y frameworks modernos. Incluye proyectos prácticos y certificación.',
                'author' => 'EduTech',
                'category_id' => 5 // Libros y Educación
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}