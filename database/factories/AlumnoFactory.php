<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno; 

/*     $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('nombre-usuario')->unique();
            $table->integer('telefono'); // INTEGER ES COMO DECIR INT (SOLO NUMEROS) 
 */

class AlumnoFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstname(),
            'apellido'=>fake()->lastname(),
            'correo'=>fake()->email(),
            'nombre_usuario'=>fake()->email(),
            // 'telefono'=>fake()->phonenumber(), 
            'telefono'=>fake()->numerify('########'), 

        ];
    }
}
