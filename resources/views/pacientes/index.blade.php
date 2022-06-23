@extends('layouts.app')
@section('title', 'Pacientes')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12">

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-flex flex-row justify-content-end">
                    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Agregar +</a>
                </div>
                <div class="table-responsive">
                    @if(count($pacientes) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Primer Nombre</th>
                                    <th>Segundo Nombre</th>
                                    <th>Tipo de documento</th>
                                    <th>Genero</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pacientes as $key => $paciente)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $paciente->primer_nombre }}</td>
                                        <td>{{ $paciente->segundo_nombre }}</td>
                                        <td>{{ $paciente->tipoDocumento->nombre }}</td>
                                        <td>{{ $paciente->genero->genero }}</td>
                                        <td>{{ $paciente->departamento->departamento }}</td>
                                        <td>{{ $paciente->municipio->municipio }}</td>
                                        <td><a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-primary">Editar</a></td>
                                        <td>
                                            <form action="{{ route('pacientes.destroy', $paciente) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No hay pacientes</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection