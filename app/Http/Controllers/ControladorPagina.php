<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ControladorPagina extends Controller
{
    public function inicio(){

    	return view('welcome');
    
    }

    public function Vehiculo(){

		$lista = DB::table('vehiculos')
				->leftjoin('propietarios', 'propietarios.cedula', '=', 'vehiculos.propietario_id')
				->leftjoin('conductors', 'conductors.cedula', '=', 'vehiculos.conductor_id')
				->select(DB::raw("CONCAT(propietarios.primer_nombre, ' ', propietarios.segundo_nombre, ' ', propietarios.apellido) as primer_nombre"), 'vehiculos.placa', 'vehiculos.color', 'vehiculos.marca', 'vehiculos.tipo_vehiculo', 'propietarios.cedula', DB::raw("CONCAT(conductors.primer_nombre, ' ', conductors.segundo_nombre, ' ', conductors.apellido) as conductor_nombre"))
				->get();

		$selectPropietario = DB::table('propietarios')
				->select(DB::raw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', apellido) as primer_nombre"), 'cedula')
				->get();

		$selectConductor = DB::table('conductors')
				->select(DB::raw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', apellido) as primer_nombre"), 'cedula')
				->get();

		return view('Vehiculo', compact('lista','selectPropietario','selectConductor'));

    }

    public function crear(Request $request){

    	//return $request->all();
    	$request->validate([
    		'placa' => 'required',
    		'color' => 'required',
    		'marca' => 'required',
    		'tipo' => 'required',
    		'propietario' => 'required',
    	]);

    	$nuevoVehiculo = New App\Vehiculo;
    	$nuevoVehiculo->placa = $request->placa;
    	$nuevoVehiculo->color = $request->color;
    	$nuevoVehiculo->marca = $request->marca;
    	$nuevoVehiculo->tipo_vehiculo = $request->tipo;
    	$nuevoVehiculo->propietario_id = $request->propietario;
    	$nuevoVehiculo->conductor_id = $request->propietario;

    	$nuevoVehiculo->save();

    	return back()->with('mensaje', 'Se agrego correctamente');

    }

    public function Propietario(){

		$listaPropietario = DB::table('propietarios')
				->select(DB::raw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', apellido) as nombre"), 'cedula', 'direccion', 'telefono', 'ciudad')
				->get();
		
		return view('Propietario', compact('listaPropietario'));

    }

    public function crearPropietario(Request $request){

    	//return $request->all();
    	$request->validate([
    		'cedula' => 'required',
    		'primer_nombre' => 'required',
    		'segundo_nombre' => 'required',
    		'apellido' => 'required',
    		'direccion' => 'required',
    		'telefono' => 'required',
    		'ciudad' => 'required'
    	]);

    	$nuevoPropietario = New App\Propietario;
    	$nuevoPropietario->cedula = $request->cedula;
    	$nuevoPropietario->primer_nombre = $request->primer_nombre;
    	$nuevoPropietario->segundo_nombre = $request->segundo_nombre;
    	$nuevoPropietario->apellido = $request->apellido;
    	$nuevoPropietario->direccion = $request->direccion;
    	$nuevoPropietario->telefono = $request->telefono;
    	$nuevoPropietario->ciudad = $request->ciudad;

    	$nuevoPropietario->save();

    	return back()->with('mensaje', 'Se agrego correctamente');

    }

    public function Conductor(){

        $listaConductor = DB::table('conductors')
                ->select(DB::raw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', apellido) as nombre"), 'cedula', 'direccion', 'telefono', 'ciudad')
                ->get();
        
        return view('conductor', compact('listaConductor'));

    }

    public function crearConductor(Request $request){

        //return $request->all();
        $request->validate([
            'cedula' => 'required',
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required'
        ]);

        $nuevoConductor = New App\Conductor;
        $nuevoConductor->cedula = $request->cedula;
        $nuevoConductor->primer_nombre = $request->primer_nombre;
        $nuevoConductor->segundo_nombre = $request->segundo_nombre;
        $nuevoConductor->apellido = $request->apellido;
        $nuevoConductor->direccion = $request->direccion;
        $nuevoConductor->telefono = $request->telefono;
        $nuevoConductor->ciudad = $request->ciudad;

        $nuevoConductor->save();

        return back()->with('mensaje', 'Se agrego correctamente');

    }

    public function Informe(){

        $informeView = DB::table('vehiculos')
                ->leftjoin('propietarios', 'propietarios.cedula', '=', 'vehiculos.propietario_id')
                ->leftjoin('conductors', 'conductors.cedula', '=', 'vehiculos.conductor_id')
                ->select('placa', 'marca', DB::raw("CONCAT(propietarios.primer_nombre, ' ', propietarios.segundo_nombre, ' ', propietarios.apellido) as nombre_propietario"), DB::raw("CONCAT(conductors.primer_nombre, ' ', conductors.segundo_nombre, ' ', conductors.apellido) as nombre_conductor"))
                ->get();

        return view('Informe', compact('informeView'));
    }
}
