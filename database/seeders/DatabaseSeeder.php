<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Prestamo::factory(50)->create();
        \App\Models\Cliente::factory(50)->create();
        \App\Models\Sucursal::factory(10)->create();
        \App\Models\JCC::factory(5)->create();
        \App\Models\Asesor::factory(5)->create();
        \App\Models\Analista::factory(5)->create();

        $this->call(RoleSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
