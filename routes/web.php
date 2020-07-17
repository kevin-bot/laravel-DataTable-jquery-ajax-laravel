<?php

use Illuminate\Support\Facades\Route;
use App\Estudiante;


Route::get('/', function () {
    return redirect()->route('estudiantes.mostrar');
});


Route::get('/dataTable', 'EstudianteController@dataTable')->name('estudiantes.dataTable');

Route::get('/estudiantes', 'EstudianteController@index')->name('estudiantes.mostrar');
Route::POST('/estudiantes', 'EstudianteController@store')->name('estudiantes.grabar');

Route::get('/estudiantes/{estudiante}', 'EstudianteController@edit')->name('estudiantes.editar');
Route::patch('/estudiantes/{estudiante}', 'EstudianteController@update')->name('estudiantes.actualizar');

Route::DELETE('/estudiantes/eliminar/{estudiante}', 'EstudianteController@destroy')->name('estudiantes.eliminar');

Route::get('/estudiantes2', 'EstudianteController@index2')->name('Estudiante.mostrar2');
Route::get('/editar/{estudiante}', 'EstudianteController@edit')->name('estudiantes.editar');