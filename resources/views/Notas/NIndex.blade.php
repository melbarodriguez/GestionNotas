@extends('Plantilla')

@section('titulo', 'Notas')

@section('contenido')

<style>
    .card {
        margin-bottom: 20px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .importante {
        background-color: #FF6666;
        color: #fff;
    }

    .urgente {
        background-color: #FFD700;
    }

    .leve {
        background-color: #98FB98;
    }

    .normal {
        background-color: #FFFFFF;
    }

    .etiqueta-esquina {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        margin-bottom: 10px;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-subtitle {
        color: #6c757d;
    }

    .btn-group {
        margin-top: 10px;
    }

    .container {
        max-width: 800px;
    }

    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
    }

    .card:hover {
        transform: scale(1.02);
    }
</style>

@if (session('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-4">
    @forelse($notas as $nota)
    <div class="card {{ strtolower($nota->etiqueta) }}">
        <div class="etiqueta-esquina">{{ $nota->etiqueta }}</div>
        <div class="card-body">
            <h4 class="card-title">{{ $nota->titulo }}</h4>
            <p class="card-subtitle">{{ $nota->categoria }}</p>
            <p class="card-text">{{ $nota->contenido }}</p>
            <p class="card-text"><small class="text-muted">{{ $nota->fecha }}</small></p>
            <div class="btn-group">
                <a href="{{ route('nota.show', ['id' => $nota->id]) }}" class="btn btn-success">Ver</a>
                <a href="{{ route('nota.editar', ['id' => $nota->id]) }}" class="btn btn-warning">Editar</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $nota->id }}">Eliminar</button>
            </div>
        </div>
    </div>
    @empty
    <p>No hay notas disponibles.</p>
    @endforelse
</div>

<div class="container mt-3">
    {{ $notas->render('pagination::bootstrap-4') }}
</div>

@endsection
