<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Proyecto;
use App\Models\ProyectoImagen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('categoria')->insert([['nombre' => 'VIS'],
                                        ['nombre' => 'SUPERIOR A VIS'],
                                        ['nombre' => 'GOLD']]);

        DB::table('departamento')->insert([
                                            ['nombre' => 'Amazonas'],
                                            ['nombre' => 'Antioquia'],
                                            ['nombre' => 'Arauca'],
                                            ['nombre' => 'Atlántico'],
                                            ['nombre' => 'Bogotá'],
                                        ]);

        DB::table('ciudad')->insert([
                                        ['nombre' => 'Leticia', 'departamento_id' => 1],
                                        ['nombre' => 'Medellín', 'departamento_id' => 2],
                                        ['nombre' => 'Arauca', 'departamento_id' => 3],
                                        ['nombre' => 'Barranquilla', 'departamento_id' => 4],
                                        ['nombre' => 'Bogotá', 'departamento_id' => 5],
                                    ]);

        DB::table('constructora')->insert([
            ['nombre' => 'Marval'],
            ['nombre' => 'Amarilo'],
            ['nombre' => 'Constructora Bolívar'],
        ]);

        Proyecto::factory()->count(10)->create();

        ProyectoImagen::factory()->count(10)->create();

    }
}
