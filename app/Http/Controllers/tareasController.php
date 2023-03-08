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
        
        $request->validate(['title'=>"required|min:3"]);

        $tarea=new tarea;
        $tarea->title=$request->title;
        $tarea->save();
     }
}