@extends('Plantilla')

@section('titulo', 'Detalle de Nota')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Detalle de Nota</h4>
                    </div>

                    <div class="card-body">

                        <h5 class="card-title font-weight-bold">Título de la Nota: {{ $nota->titulo }}</h5>

                        <p class="card-text"><strong>Categoría:</strong> {{ $nota->categoria }}</p>

                        <p class="card-text"><strong>Contenido:</strong><br> {{ $nota->contenido }}</p>

                        <p class="card-text"><strong>Fecha:</strong> {{ $nota->fecha }}</p>

                        <div class="mt-4">
                            <a href="{{ route('nota.index') }}" class="btn btn-primary">Volver</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
