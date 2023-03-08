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

            <div>
                @foreach ($categorias as $cat)
                    <div class="row py-3">
        
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a class="d-flex align-items-center gap-2" 
                                href="{{ route('categorias.show', ['categoria' => $cat->id]) }}">
                                    <span class="color-container" 
                                    style="background-color: {{ $cat->color }}"></span> {{ $cat->name }}
                                </a>
                            </div>
            
                            <div class="col-md-3 d-flex justify-content-end">
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                    data-bs-target="#modal{{$cat->id}}">Eliminar</button>
                                
                            </div>

                            <!-- MODAL -->
                        <div class="modal fade" id="modal{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                    Al eliminar la categoría <strong>{{ $cat->name }}</strong> se eliminan todas las tareas asignadas a la misma. 
                                    ¿Está seguro que desea eliminarla?
                                </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('categorias.destroy', ['categoria' => $cat->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
              </div>
    </div>
</div>

@endsection
