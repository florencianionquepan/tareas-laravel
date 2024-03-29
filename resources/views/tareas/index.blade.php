@extends('app')

@section('content')
<div class="container w-25 border rounded border-secondary my-5 p-2">
    <form action="{{route('tareas')}}" method="POST">
      @csrf

      @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
      @endif

      @error('title')
      <h6 class="alert alert-danger">{{$message}}</h6>
      @enderror
        <div class="mb-3">
          <label for="title class="form-label">Titulo de tarea</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select name="categoria_id" class="form-select">
            @if(isset($categorias))
            @foreach ($categorias as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            @endif
          </select>
        </div>

       <div class="mx-auto text-center">
        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
       </div>

      </form>

      <div>
        @if(isset($categorias))
        @foreach ($tareas as $tarea)
            <div class="row py-1">

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
        @endif
      </div>
</div>
@endsection