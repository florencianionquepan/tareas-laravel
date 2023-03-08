@extends('app')

@section('content')
<div class="container w-25 border rounded border-primary my-5 p-2">
    <form action="{{route('lista')}}" method="POST">
      @csrf
        <div class="mb-3">
          <label for="title class="form-label">Titulo de tarea</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
       <div class="mx-auto text-center">
        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
       </div>
      </form>
</div>
@endsection