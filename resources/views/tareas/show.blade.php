@extends('app')

@section('content')
<div class="container w-25 border rounded border-primary my-5 p-2">
    <form action="{{ route('tareas-update',['id'=> $tarea->id]) }}" method="POST">
      @method('PATCH')
      @csrf

      @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
      @endif

      @error('title')
      <h6 class="alert alert-danger">{{$message}}</h6>
      @enderror

        <div class="mb-3">
          <label for="title class="form-label">Titulo de tarea</label>
          <input type="text" class="form-control" id="title" 
                name="title" value="{{$tarea->title}}">
        </div>
       <div class="mx-auto text-center">
        <button type="submit" class="btn btn-primary">Editar tarea</button>
       </div>
      </form>

</div>
@endsection