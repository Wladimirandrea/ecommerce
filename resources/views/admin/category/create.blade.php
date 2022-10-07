@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2>Category
                <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-end">Regresar</a>
            </h2>
        </div>
        <div class="card-body">
            <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug:</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description:</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status:</label><br/>
                        <input type="checkbox" name="status" />
                    </div>
                    <div class="col-md-12">
                        <h4>SEO tag</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title:</label>
                        <input type="text" name="meta_title" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword:</label>
                        <input type="text" name="meta_keyword" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description:</label>
                        <input type="text" name="meta_description" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection
