@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Registrar Vehiculo</div>

                <div class="card-body">
                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('vehiculo.crear') }}">
                        @csrf

                        <input type="text" name="placa" class="form-control mb-2" placeholder="Placa" required>
                        <input type="text" name="color" class="form-control mb-2" placeholder="Color" required>
                        <input type="text" name="marca" class="form-control mb-2" placeholder="Marca" required>
                        <input type="text" name="tipo" class="form-control mb-2" placeholder="Tipo de vehiculo" required>
                        <select name="propietario" class="form-control mb-2" required="">
                            <option value="0" selected >-- Seleccione un propietario --</option>
                            @foreach($selectPropietario as $valor)
                                <option value="{{ $valor->cedula }}">{{$valor->primer_nombre}}</option>
                            @endforeach
                        </select>
                        <select name="conductor" class="form-control mb-2" required="">
                            <option value="0" selected >-- Seleccione un conductor --</option>
                            @foreach($selectConductor as $conductor)
                                <option value="{{ $conductor->cedula }}">{{$conductor->primer_nombre}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                   
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informe Vehiculos</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Color</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Propietario</th>
                            <th scope="col">Conductor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lista as $item)
                            <tr>
                                <th scope="row">{{$item->placa}}</th>
                                <td>{{$item->color}}</td>
                                <td>{{$item->marca}}</td>
                                <td>{{$item->tipo_vehiculo}}</td>
                                <td>{{$item->primer_nombre}}</td>                                
                                <td>{{$item->conductor_nombre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
