@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Registrar Propietario</div>

                <div class="card-body">
                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('Propietario.crearPropietario') }}">
                        @csrf
                        <input type="text" name="cedula" class="form-control mb-2" placeholder="Cedula" required>
                        <input type="text" name="primer_nombre" class="form-control mb-2" placeholder="Primer Nombre" required>
                        <input type="text" name="segundo_nombre" class="form-control mb-2" placeholder="Segundo Nombre" required>
                        <input type="text" name="apellido" class="form-control mb-2" placeholder="Apellido" required>
                        <input type="text" name="direccion" class="form-control mb-2" placeholder="Direccion" required>
                        <input type="text" name="telefono" class="form-control mb-2" placeholder="Telefono" required>
                        <input type="text" name="ciudad" class="form-control mb-2" placeholder="Ciudad" required>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                   
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informe Propietarios</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Ciudad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listaPropietario as $propietario)
                            <tr>
                                <th scope="row">{{$propietario->cedula}}</th>
                                <td>{{$propietario->nombre}}</td>
                                <td>{{$propietario->direccion}}</td>
                                <td>{{$propietario->telefono}}</td>
                                <td>{{$propietario->ciudad}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
