@extends('layouts.app')
@section('title', 'Pacientes - Registro')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-end">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary mb-3">Volver</a>
                </div>
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="card-title mb-4">Formulario de Registro</h3>

                        <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
                            @method('post')
                            @csrf

                            <div class="mb-3">
                                <label for="inputTipoDocumento" class="form-label">Tipo de Documentos</label>
                                <select class="form-select" id="inputTipoDocumento" name="tipo_documento_id" required>
                                    <option value="">--Seleccione un tipo de documento--</option>
                                    @foreach($tipoDocumentos as $tipoDocumento)
                                        <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputGenero" class="form-label">Genero</label>
                                <select class="form-select" id="inputGenero" name="genero_id" required>
                                    <option value="">--Seleccione un genero--</option>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                                    @endforeach
                                </select>
                            </div>

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
                                <select class="form-select" id="inputMunicipio" name="municipio_id" required>
                                    <option value="">--Seleccione un municipio--</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputNumeroDocumento" class="form-label">Numero de Documento</label>
                                <input type="text" class="form-control" id="inputNumeroDocumento" name="numero_documento" placeholder="Numero de documento" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputPrimerNombre" class="form-label">Primer Nombre</label>
                                <input type="text" class="form-control" id="inputPrimerNombre" name="primer_nombre" placeholder="Primer Nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputSegundoNombre" class="form-label">Segundo Nombre</label>
                                <input type="text" class="form-control" id="inputSegundoNombre" name="segundo_nombre" placeholder="Segundo Nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputPrimerApellido" class="form-label">Primer Apellido</label>
                                <input type="text" class="form-control" id="inputPrimerApellido" name="primer_apellido" placeholder="Primer Apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputSegundoApellido" class="form-label">Segundo Apellido</label>
                                <input type="text" class="form-control" id="inputSegundoApellido" name="segundo_apellido" placeholder="Segundo Apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputFoto" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="inputFoto" name="foto">
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

@push('scripts')
    <script>

        $("#inputDepartamento").on('change', (e) => {
            $("#inputMunicipio").html("");
            if (e.target.value) {
                $.ajax({
                    type: 'GET',
                    url: `/lista-de-municipios/${ e.target.value }`,
                    success: (response) => { mostrarMunicipios(response) },
                    error: (error) => {}
                });
            }
        });

        function mostrarMunicipios (municipios) {
            $("<option/>", {
                value: '',
                text: '--Seleccione un municipio--'
            }).appendTo($("#inputMunicipio"));
            if (municipios.length > 0) {
                $.each(municipios, function (index, value) {
                    $("<option/>", {
                        value: value.id,
                        text: value.municipio
                    }).appendTo($("#inputMunicipio"));
                })
            }
        }

    </script>
@endpush