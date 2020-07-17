<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
class EstudianteController extends Controller
{
    
   
    public function dataTable()
    {
        $estudiantes=Estudiante::all();
        return view('dataTable',compact("estudiantes"));
    }


    public function index()
    {
        return view('principal');
    }

    public function index2()
    {
        $estudiantes = DB::table('estudiantes')->orderBy('id')->get();
        return view('principal',compact("estudiantes"));
    }


    public function store(Request $request)
    {
        if($request->ajax()){
           Estudiante::create($request->all());
        }
        else{           
        $estudiante = new Estudiante;
        $estudiante->codigo     =   $request->codigo;
        $estudiante->nombres    =   $request->nombres;
        $estudiante->apellidos  =   $request->apellidos;
        $estudiante->save();
        return redirect()->route('estudiantes.mostrar');
        //$estudiantes=Estudiante::all();
        //return view('principal',compact("estudiantes"));
        }
    }

   
    public function show(Estudiante $estudiante)
    {
        //
    }

   
    public function edit(Estudiante $estudiante)
    {
        //return $estudiante;
        return view('editar',compact("estudiante"));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        //
        $estudiante->update([
            'codigo'=>request('codigo'),
            'nombres'=>request('nombres'),
            'apellidos'=>request('apellidos'),
        ]);
        //return redirect()->route('estudiantes.mostrar');
        //return $request;

    }

    
    public function destroy(Request $request)
    {
      
        if($request->ajax()){
             $estudiante = Estudiante::find($request->id);
             $estudiante->delete();
            //ss return Response::json($estudiante);
        }

    }

}
