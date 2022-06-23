@extends('layouts.app')
@section('title', 'Generos - Registro')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-end">
                    <a href="{{ route('generos.index') }}" class="btn btn-primary mb-3">Volver</a>
                </div>
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="card-title mb-4">Formulario de Registro</h3>

                        <form action="{{ route('generos.store') }}" method="POST">
                            @method('post')
                            @csrf

                            <div class="mb-3">
                                <label for="inputGenero" class="form-label">Genero</label>
                                <input type="text" class="form-control" id="inputGenero" name="genero" placeholder="Genero" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection