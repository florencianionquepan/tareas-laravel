<?php

namespace App\Http\Controllers;

use App\Models\tarea;
use Illuminate\Http\Request;

class tareasController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para g uardar una tarea
     * update para actualizar
     * destroy para eliminar
     * edit para mostrar el formulario de edicion
     */

     public function store(Request $request){
        
        $request->validate([
         'title'=>"required|min:3"
         ]);

        $tarea=new tarea;
        $tarea->title=$request->title;
        $tarea->save();

        return redirect()->route('tareas')->with('success','Tarea creada ok');
     }

     public function index(){
      $tareas=tarea::all();
      return view('tareas.index',['tareas'=>$tareas]);
     }

     public function show($id){
      $tarea=tarea::find($id);
      return view('tareas.show',['tarea'=>$tarea]);
     }

     public function update(Request $request,$id){
      $tarea=tarea::find($id);
      $tarea->title=$request->title;
      $tarea->save();
      //dd($tarea);
      return redirect()->route('tareas')->with('success','Tarea actualizada ok');
     }

     public function destroy($id){
      $tarea=tarea::find($id);
      $tarea->delete();
      return redirect()->route('tareas')->with('success','Tarea eliminada ok');
     }
}
