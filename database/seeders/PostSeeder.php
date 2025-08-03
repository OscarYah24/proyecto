<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Ejecutar el seeder para la tabla posts.
     *
     * @return void
     */
    public function run(): void
    {
        // Asegurar que existan usuarios en la base de datos
        if (User::count() === 0) {
            // Si no hay usuarios, crear algunos
            User::factory(5)->create();
        }

        // Obtener usuarios existentes
        $users = User::all();

        // Crear 10 posts, distribuyéndolos entre los usuarios existentes
        Post::factory(10)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id; // Asignar usuario aleatorio existente
            }
        ]);

        // Alternativa: Crear posts específicos con contenido variado
        $specificPosts = [
            [
                'title' => 'Mi primer post en Laravel',
                'content' => 'Este es un post de ejemplo creado con Factory y Seeder en Laravel.',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Guía completa de Eloquent',
                'content' => 'En este post exploraremos las funcionalidades avanzadas de Eloquent ORM.',
                'user_id' => $users->random()->id,
            ]
        ];

        // Crear posts específicos
        foreach ($specificPosts as $postData) {
            Post::factory()->create($postData);
        }

        // Mensaje de confirmación
        $this->command->info('✅ Se han creado ' . Post::count() . ' posts exitosamente.');
    }
}