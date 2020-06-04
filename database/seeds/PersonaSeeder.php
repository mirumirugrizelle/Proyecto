<?php

use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Persona::insert([
            'CURP' => 'MIGJ781523MSIFL06',
            'nombre' => 'admin',
            'apellido_paterno' => 'admin',
            'apellido_materno' => 'admin',
            'sexo' => 'a',
            'fecha_nacimiento' => '20200604',
            'direccion' => 'direccion',
            'telefono_tutor' => '9999999999',
            'email' => 'admin@admin.com'

        ]);

        \App\Models\Administrador::insert([
            'idAdministrador' => 'MIGJ781523MSIFL06',
            'contrasena' => bcrypt('123456789')
        ]);
    }
}
