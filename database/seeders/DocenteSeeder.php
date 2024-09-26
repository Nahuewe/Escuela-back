<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('docente')->insert([
            [
                "nombre" => "Nahuel Soria Parodi",
                "dni" => "43.532.773",
                "fecha_nacimiento" => "2001-07-22",
                "domicilio" => "Intendente Gimenez 544",
                "fecha_docencia" => "2024-09-24",
                "fecha_cargo" => "2024-09-25",
                "situacion" => 1,
                "formacion" => "Programación",
                "telefono" => "3834523702"
            ]
        ]);
    }
}
