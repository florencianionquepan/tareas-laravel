@extends('app')

@section('content')

<div class="container w-25 border rounded border-primary my-5 p-2">
    <div class="row mx-auto">
        <form action="{{route('categorias.store')}}" method="POST">
            @csrf
      
            @if (session('success'))
              <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
      
            @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
              <div class="mb-3">
                <label for="name" class="form-label">Nombre de categoria</label>
                <input type="text" class="form-control" name="name">
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color">
              </div>
             <div class="mx-auto text-center">
              <button type="submit" class="btn btn-primary">Nueva categoria</button>
             </div>
            </form>
    </div>
</div>

@endsection
