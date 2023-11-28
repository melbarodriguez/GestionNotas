<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno; 
use App\Models\Nota; 
use App\Models\Etiqueta; 

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
       
        $this->call(AlumnosSeeder::class); //SE PONE EL NOMBRE DEL SEEDER 

        $this->call(NotasSeeder::class);

        $this->call(EtiquetasSeeder::class);

    }
}
