<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario de prueba solo si no existe
        User::firstOrCreate(
            ['email' => 'test@example.com'], // Buscar por email
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Crear usuarios adicionales solo si hay menos de 5 usuarios
        $currentUsersCount = User::count();
        if ($currentUsersCount < 5) {
            $usersToCreate = 5 - $currentUsersCount;
            User::factory($usersToCreate)->create();
        }

        // Ejecutar seeders en orden
        $this->call([
            CategorySeeder::class,
            ArticleSeeder::class,
            PostSeeder::class,
        ]);
    }
}