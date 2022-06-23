@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Home Page</h3>
                        <h6>Lista de modulos</h6>
                        <ul>
                            <li>Modulo de departamentos (CRUD)</li>
                            <li>Modulo de municipio (CRUD)</li>
                            <li>Modulo de tipo de documentos (CRUD)</li>
                            <li>Modulo de generos (CRUD)</li>
                            <li>Modulo de pacientes (CRUD)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection