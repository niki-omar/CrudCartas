<?php

namespace App\Http\Controllers;
use App\Models\coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    public function index(){
        return coleccion::all();
    }
    public function store(Request $request){
        coleccion::create($request->all());
        return ['Creado con exito'];
    }
    public function show($id){
        return coleccion::find($id);
    }
    public function update(Request $request, $id){
        $coleccion = coleccion::find($id);
        $coleccion->update($request->all());
        return ["Actualizado con exito"];
    }
    public function destroy ($id){
        $coleccion = coleccion::find($id);
        $coleccion->delete();
        return ['Borrado con exito'];
    }
}
