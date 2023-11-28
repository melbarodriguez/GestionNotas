<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Nota; 

/*          
    $table->string('titulo');
    $table->string('contenido');
    $table->enum('categoria',['Medicas', 'Personales', 'Generales']);
 */

 

 
class NotaFactory extends Factory
{
    
    public function definition(): array
    {
        $etiqueta = ['Normal', 'Urgente','Leve','Importante'];

        return [
            'titulo'=>fake()->name(),
            'contenido'=>fake()->text(), // TEXT ES TIPO TEXTO LARGO, WORD ES TEXTO CORTO 
            'categoria'=>fake()->firstname(),
            'etiqueta'=>$etiqueta[0],
            'fecha'=>fake()->date(),
        ];
    }
}
