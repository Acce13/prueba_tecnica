@extends('layouts.app')
@section('title', 'Municipios - Registro')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-end">
                    <a href="{{ route('municipios.index') }}" class="btn btn-primary mb-3">Volver</a>
                </div>
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="card-title mb-4">Formulario de Registro</h3>

                        <form action="{{ route('municipios.store') }}" method="POST">
                            @method('post')
                            @csrf

                            <div class="mb-3">
                                <label for="inputDepartamento" class="form-label">Departamento</label>
                                <select class="form-select" id="inputDepartamento" name="departamento_id" required>
                                    <option value="">--Seleccione un departamento--</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputMunicipio" class="form-label">Municipio</label>
                                <input type="text" class="form-control" id="inputMunicipio" name="municipio" placeholder="Municipio" required>
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