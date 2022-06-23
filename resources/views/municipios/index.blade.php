@extends('layouts.app')
@section('title', 'Municipios')

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
                    <a href="{{ route('municipios.create') }}" class="btn btn-primary mb-3">Agregar +</a>
                </div>
                <div class="table-responsive">
                    @if(count($municipios) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($municipios as $key => $municipio)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $municipio->departamento->departamento }}</td>
                                        <td>{{ $municipio->municipio }}</td>
                                        <td><a href="{{ route('municipios.edit', $municipio) }}" class="btn btn-primary">Editar</a></td>
                                        <td>
                                            <form action="{{ route('municipios.destroy', $municipio) }}" method="post">
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
                        <h3 class="text-center">No hay municipios</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection