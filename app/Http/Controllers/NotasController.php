<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota; // LA DIRECCION DE MODELO SE PONE SIEMPRE PORQUE SI NO, NO DA
use App\Models\Categoria; // LA DIRECCION DE MODELO SE PONE SIEMPRE PORQUE SI NO, NO DA
use App\Models\Etiqueta; // LA DIRECCION DE MODELO SE PONE SIEMPRE PORQUE SI NO, NO DA

class NotasController extends Controller
{
 
    public function index() // EL INDEX ES UNA TABLA DONDE SE MUESTRAN TODOS LOS DATOS
    {
        //      MODELO::NUMERO DE DATOS QUE QUIERO QUE SALGAN
        $nota = Nota::paginate(10); // este es el numero de datos que va a reflejar
        return view('Notas.NIndex')->with('notas',$nota);
                  //NOMBRE DE LA CARPETA. NOMBRE DEL ARCHIVO (VISTA)
    }

    public function create() 
    {
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();

        return view('Notas.NCreate', compact('categorias','etiquetas'));

    }

    public function store(Request $request) 
    //ESTE ES EL METODO IMPORTANTE ESTE ES EL METOCO QUE CREA Y GRADRDA DATOS NUEVOS 
    {
        $request->validate([ 
        'titulo'=>'required|regex:/[A-Z][a-z]+/i', //cualquier valor
        'contenido'=>'required|regex:/[A-Z][a-z]+/i',
        'categoria'=>'required',  
        'etiqueta'=>'required',  
        'fecha'=>'required|date', // fecha

        //'required|alpa' letras 
        //'required|numeric' numeros
        //required|numeric|min:0|max:100' valor minimo y maximo
        //required|email para correos
        ]);

            //      MODELO
        $nota = new Nota(); // ESTA ES LA PARTE FUNDAMENTAL 
        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
    
        // Obtener la categoría directamente del formulario
        $categoria = Categoria::find($request->input('categoria'));

        if (!$categoria) {
            return redirect()->route('nota.crear')->with('error', 'La categoría no existe');
        }

         // Obtener la categoría directamente del formulario
         $etiqueta = Etiqueta::find($request->input('etiqueta'));

         if (!$etiqueta) {
             return redirect()->route('nota.crear')->with('error', 'La etiqueta no existe');
         }

        $nota->etiqueta = $etiqueta->nombre;
        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se creó exitosamente"; 
        } else {
            $mensaje = "La Nota no se creó exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }


    public function show(string $id)
    {
        //      MODELO::NUMERO DE DATOS QUE QUIERO QUE SALGAN
        $nota = Nota::findOrfail($id);
        return view('Notas.NShow' , compact('nota'));
        
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();

        return view('Notas.NEdit', compact('categorias','etiquetas'))->with('notas',$nota);
    }

    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);
        
        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'contenido'=>'required|regex:/[A-Z][a-z]+/i',
            'categoria'=>'required',
            'fecha'=>'required|date',
        ]);

        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
    
        // Obtener la categoría directamente del formulario
        $categoria = Categoria::find($request->input('categoria'));

        if (!$categoria) {
            return redirect()->route('nota.editar')->with('error', 'La categoría no existe');
        }

        $etiqueta = Etiqueta::find($request->input('etiqueta'));

        if (!$etiqueta) {
            return redirect()->route('nota.crear')->with('error', 'La etiqueta no existe');
        }

       $nota->etiqueta = $etiqueta->nombre;

        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se edito exitosamente"; 
        } else {
            $mensaje = "La Nota no se edito exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }

    public function destroy(string $id)
    {
        $borrados = Nota::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "La Nota se elimino exitosamente"; 
           }
           
           else{
             $mensaje = "La Nota no se elimino exitosamente"; 
           }
   
           return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }
}
