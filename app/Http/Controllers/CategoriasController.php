<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias=Categoria::all();
        return view('categorias.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categorias|max:255',
            'color'=>'required|max:7'
        ]);

        $categoria=new Categoria();
        $categoria->name=$request->name;
        $categoria->color=$request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success','Nueva categoria ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria=Categoria::find($id);
        return view('categorias.show',['categoria'=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria=Categoria::find($id);
        $categoria->name=$request->name;
        $categoria->color=$request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success','Categoria actualizada ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $categoria=Categoria::find($id);
        $categoria->tareas()->each(function($tar){
            $tar->delete();
        });
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success','Categoria eliminada');
    }
}
