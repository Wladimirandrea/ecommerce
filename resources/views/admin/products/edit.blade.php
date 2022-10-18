@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2>Editar Productos
                <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm float-end">Regresar</a>
            </h2>
        </div>
        <div class="card-body">
            @if (session('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
            @endif

            @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>

            @endif
            <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Home
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotag-tab" data-bs-toggle="pill" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">
                            SEO TAGS
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="pill" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
                            Detalles
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="pill" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">
                            Imagenes
                        </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    {{-- tabs inicio --}}
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" value="{{$product->slug}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Seleccionar Marca</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>
                                        {{$brand->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Pequeña Descripcion</label>
                            <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Descripcion</label>
                            <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                        </div>
                    </div>
                    {{-- tabs SEO --}}
                    <div class="tab-pane fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Meta Descripcion</label>
                            <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                        </div>
                    </div>
                    {{-- tabs detalles --}}
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Precio Original</label>
                                    <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Precio de venta</label>
                                    <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Cantidad</label>
                                    <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Tendencia</label>
                                    <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked':''}}  style="width: 50px; height: 50px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Estatus</label>
                                    <input type="checkbox" name="status" {{$product->status == '1' ? 'checked':''}} style="width: 50px; height: 50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- tabs imagenes --}}
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="image-tab">
                        <div class="mb-3">
                            <label>Subir Imagenes de Productos</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>
                        <div>
                            @if ($product->productImages)
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                    <div class="col-md-2 text-center">
                                        <img src="{{asset($image->image)}}" style="width: 80px;height:80px;" class="me-4 border-3" alt="img" />
                                        <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                    </div>
                                @endforeach
                            </div>

                            @else
                            <h5>No hay imagen registrada</h5>
                            @endif

                        </div>
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>

            </form>

        </div>
      </div>

    </div>
</div>
@endsection
