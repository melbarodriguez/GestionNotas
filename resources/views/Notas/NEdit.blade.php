@extends('Plantilla')

@section('titulo', 'Crear Nota')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Crear Nota</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('nota.store') }}" class="needs-validation">
                            @csrf

                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría:</label>
                                <select id="categoria" name="categoria" class="form-select" required>
                                    @forelse($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @empty
                                        <option disabled>No hay categorías</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="etiqueta" class="form-label">Etiqueta:</label>
                                <select id="etiqueta" name="etiqueta" class="form-select" required>
                                    @forelse($etiquetas as $etiqueta)
                                        <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                                    @empty
                                        <option disabled>No hay etiquetas</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                    name="titulo" id="titulo" placeholder="Ingrese El Título" value="{{ old('titulo') }}" required>
                                @error('titulo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contenido" class="form-label">Contenido:</label>
                                <textarea class="form-control @error('contenido') is-invalid @enderror"
                                    placeholder="Ingrese el Contenido" id="contenido" name="contenido" rows="4"
                                    required>{{ old('contenido') }}</textarea>
                                @error('contenido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha:</label>
                                <input type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                                    id="fecha" placeholder="Ingrese la Fecha" value="{{ old('fecha') }}" required>
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <a href="{{ route('nota.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
