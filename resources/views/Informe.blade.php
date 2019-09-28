@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seguimiento</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Propietario</th>
                            <th scope="col">Conductor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informeView as $item)
                            <tr>
                                <th scope="row">{{$item->placa}}</th>
                                <td>{{$item->marca}}</td>
                                <td>{{$item->nombre_propietario}}</td>                                
                                <td>{{$item->nombre_conductor}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
