@extends('layouts.app')
@section('title', 'Pacientes - Editar')

@section('content')
    <div class="my-3">
        <div class="row gy-2">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-end">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary mb-3">Volver</a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7">
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="card-title mb-4">Formulario de Registro</h3>

                        <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
                            @method('put')
                            @csrf

                            <input type="hidden" id="ciudad_seleccionada" value="{{ $paciente->municipio_id }}">

                            <div class="mb-3">
                                <label for="inputTipoDocumento" class="form-label">Tipo de Documentos</label>
                                <select class="form-select" id="inputTipoDocumento" name="tipo_documento_id" required>
                                    <option value="">--Seleccione un tipo de documento--</option>
                                    @foreach($tipoDocumentos as $tipoDocumento)
                                        <option value="{{ $tipoDocumento->id }}" {{ ($paciente->tipo_documento_id == $tipoDocumento->id) ? 'selected' : '' }}>{{ $tipoDocumento->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputGenero" class="form-label">Genero</label>
                                <select class="form-select" id="inputGenero" name="genero_id" required>
                                    <option value="">--Seleccione un genero--</option>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ ($paciente->genero_id == $genero->id) ? 'selected' : '' }}>{{ $genero->genero }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputDepartamento" class="form-label">Departamento</label>
                                <select class="form-select" id="inputDepartamento" name="departamento_id" required>
                                    <option value="">--Seleccione un departamento--</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ ($paciente->departamento_id == $departamento->id) ? 'selected' : '' }}>{{ $departamento->departamento }}</option>
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
                                <input type="text" class="form-control" id="inputNumeroDocumento" name="numero_documento" value="{{ old('numero_documento', $paciente->numero_documento) }}" placeholder="Numero de documento" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputPrimerNombre" class="form-label">Primer Nombre</label>
                                <input type="text" class="form-control" id="inputPrimerNombre" name="primer_nombre" value="{{ old('primer_nombre', $paciente->primer_nombre) }}" placeholder="Primer Nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputSegundoNombre" class="form-label">Segundo Nombre</label>
                                <input type="text" class="form-control" id="inputSegundoNombre" name="segundo_nombre" value="{{ old('segundo_nombre', $paciente->segundo_nombre) }}" placeholder="Segundo Nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputPrimerApellido" class="form-label">Primer Apellido</label>
                                <input type="text" class="form-control" id="inputPrimerApellido" name="primer_apellido" value="{{ old('primer_apellido', $paciente->primer_apellido) }}" placeholder="Primer Apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputSegundoApellido" class="form-label">Segundo Apellido</label>
                                <input type="text" class="form-control" id="inputSegundoApellido" name="segundo_apellido" value="{{ old('segundo_apellido', $paciente->segundo_apellido) }}" placeholder="Segundo Apellido" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pacientes.changePhoto', $paciente) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <img src="{{ ($paciente->foto) ? asset('storage/'.$paciente->foto) : asset('images/no-photo.png') }}" alt="{{ $paciente->primer_nombre }}" class="img-fluid rounded-3">
                            <div class="mb-3">
                                <label for="inputFoto" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="inputFoto" name="foto">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Cambiar</button>
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

        $(function() {
            $("#inputMunicipio").html("");
            obtenerListaMunicipios($("#inputDepartamento").val());
        });

        $("#inputDepartamento").on('change', (e) => {
            $("#inputMunicipio").html("");
            if (e.target.value) {
                obtenerListaMunicipios(e.target.value);
            }
        });

        function obtenerListaMunicipios (id) {
            $.ajax({
                type: 'GET',
                url: `/lista-de-municipios/${ id }`,
                success: (response) => { mostrarMunicipios(response) },
                error: (error) => {}
            });
        } 

        function mostrarMunicipios (municipios) {
            $("<option/>", {
                value: '',
                text: '--Seleccione un municipio--'
            }).appendTo($("#inputMunicipio"));
            if (municipios.length > 0) {
                let ciudad_seleccionada = $("#ciudad_seleccionada").val();
                $.each(municipios, function (index, value) {
                    if (ciudad_seleccionada == value.id) {
                        $("<option/>", {
                            value: value.id,
                            text: value.municipio,
                            selected: true
                        }).appendTo($("#inputMunicipio"));
                    } else {
                        $("<option/>", {
                            value: value.id,
                            text: value.municipio,
                        }).appendTo($("#inputMunicipio"));
                    }
                })
            }
        }

    </script>
@endpush