@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
      <div class="card">
        <div class="card-header">
            <h2>Productos
                <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Agregar Productos</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Productos</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Estatus</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            @if ($product->category)
                                {{$product->category->name}}
                            @else
                                Sin Categoria
                            @endif
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            @if ($product->status == '1')
                                <i class="fa-solid fa-eye"></i>
                            @else
                                <i class="fa-solid fa-eye-slash"></i>
                            @endif
                        </td>
                        {{-- <td>{{$product->status == '1' ? 'Hidden':'Visible'}}</td> --}}
                        <td>
                            <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>
                            <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Estas Seguro que deseas Eliminar?')" class="btn btn-sm btn-danger">Borrar</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No hay Productos Disponibles</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>

    </div>
</div>
@endsection
