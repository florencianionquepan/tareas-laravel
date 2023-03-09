@extends('app')

@section('content')

<div class="container w-25 border rounded border-primary my-5 p-2">
    <div class="row mx-auto">
        <div>
            @if($categoria->tareas->count()>0)
                <div class="row py-2">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tareas-show', ['id' => $tarea->id] ) }}">{{$tarea->title}}</a>
                      </div>
        
                    <div class="col-md-3 d-flex justify-content-end">
                      <form action="{{ route('tareas-destroy',[$tarea->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
                    </div>
                </div>
            @else
                No hay tareas para la categoria
            @endif
        </div>
    </div>
</div>

@endsection
