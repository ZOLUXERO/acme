<?php

Route::get('/', 'ControladorPagina@inicio');

Route::get('/Vehiculo', 'ControladorPagina@Vehiculo')->name('Vehiculo');

Route::post('/Vehiculo', 'ControladorPagina@crear')->name('vehiculo.crear');

Route::get('/Propietario', 'ControladorPagina@Propietario')->name('Propietario');

Route::post('/Propietario', 'ControladorPagina@crearPropietario')->name('Propietario.crearPropietario');

Route::get('/Conductor', 'ControladorPagina@Conductor')->name('Conductor');

Route::post('/Conductor', 'ControladorPagina@crearConductor')->name('conductor.crearConductor');

Route::get('/Informe', 'ControladorPagina@Informe')->name('Informe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
