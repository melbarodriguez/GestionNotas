<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etiqueta; 

class EtiquetasSeeder extends Seeder
{
    
    public function run(): void
    {
        Etiqueta::factory()->count(4)->create();
    }
}
