@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
      <div class="card">
        <div class="card-header">
            <h2>Lista de Colores
                <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm float-end">Agregar Colores</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Color</th>
                        <th>Codigo Color</th>
                        <th>Estatus</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->status ? 'Oculto':'Visible'}}</td>
                        <td>
                            <a href="{{url('admin/colors/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{url('admin/colors/'.$item->id.'/delete')}}" onclick="return confirm('Estas Seguro que deseas Borrar este Color?')" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>

    </div>
</div>
@endsection
