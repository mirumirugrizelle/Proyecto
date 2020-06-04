<?php

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{

    public function run()
    {
        Tipo::insert([
            ['nombre' => 'Noticias'],
            ['nombre' => 'Calificaciones'],
            ['nombre' => 'Eventos'],
            ['nombre' => 'Personal'],
            ['nombre' => 'Plan de estudios'],
            ['nombre' => 'Reuniones']
        ]);
    }
}
