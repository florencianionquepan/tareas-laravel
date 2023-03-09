@extends('app')

@section('content')

<div class="container w-25 border rounded border-primary my-5 p-2">
    <div class="row mx-auto">
        <form action="{{route('categorias.update',['categoria'=>$categoria->id])}}" method="POST">
            @method('PATCH')
            @csrf
      
            @if (session('success'))
              <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
      
            @error('name')
                <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror

              <div class="mb-3">
                <label for="name" class="form-label">Nombre de categoria</label>
                <input type="text" class="form-control" name="name" value="{{$categoria->name}}">
              </div>

              <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color" value="{{$categoria->color}}">
              </div>

             <div class="mx-auto text-center">
              <button type="submit" class="btn btn-primary">Editar Categoria</button>
             </div>

        </form>

        <div>
            @if($categoria->tareas->count()>0)
            @foreach ($categoria->tareas as $tarea)
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
            @endforeach
                
            @else
                No hay tareas para la categoria
            @endif
        </div>

    </div>
</div>

@endsection
