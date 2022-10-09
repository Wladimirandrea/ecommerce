<div>
   <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModal">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>¿Estas Seguro que desear Borrar la Categoria?</h6>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Si. Borrar</button>
                </div>
            </form>

          </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success">{{session('message')}} {{ Auth::user()->name }}</h4>
            @endif
          <div class="card">
            <div class="card-header">
                <h2>Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Agregar Categoria</a>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-sm btn-success"><i class="mdi mdi-table-edit"></i></a>

                                <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>

                            </td>


                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$categories->links()}}
                </div>
            </div>
          </div>

        </div>
    </div>
</div>


@push('script')
<script>
    window.addEventListener('close-modal', event=>{
        $('#deleteModal').modal('hide');
    });
</script>
@endpush
