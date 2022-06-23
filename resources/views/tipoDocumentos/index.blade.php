@extends('layouts.app')
@section('title', 'Tipos de Documentos')

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
                    <a href="{{ route('tipos-de-documentos.create') }}" class="btn btn-primary mb-3">Agregar +</a>
                </div>
                <div class="table-responsive">
                    @if(count($tipoDocumentos) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipoDocumentos as $key => $tipoDocumento)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tipoDocumento->nombre }}</td>
                                        <td><a href="{{ route('tipos-de-documentos.edit', $tipoDocumento) }}" class="btn btn-primary">Editar</a></td>
                                        <td>
                                            <form action="{{ route('tipos-de-documentos.destroy', $tipoDocumento) }}" method="post">
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
                        <h3 class="text-center">No hay Tipos de documentos</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection