@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
      <div class="card">
        <div class="card-header">
            <h2>Crear Colores
                <a href="{{url('admin/colors')}}" class="btn btn-primary btn-sm float-end">Regresar</a>
            </h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{ url('admin/colors/'.$color->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nombre</label> <br/>
                    <input type="text" name="name" value="{{$color->name}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Codigo Color</label> <br/>
                    <input type="text" name="code" value="{{$color->code}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Status</label> <br/>
                    <input type="checkbox" name="status" {{$color->status ? 'checked':''}} style="width: 50px; height: 50px;">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </form>

        </div>
      </div>

    </div>
</div>
@endsection
