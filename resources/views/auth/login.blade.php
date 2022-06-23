@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Log In</h3>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="inputDocumento" class="form-label">Documento</label>
                                <input type="text" class="form-control" id="inputDocumento" name="email" placeholder="Numero de Documento" required>
                            </div>

                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Clave</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Clave" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection