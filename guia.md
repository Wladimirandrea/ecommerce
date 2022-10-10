# Creamos el proyecto (1 video)
https://www.youtube.com/watch?v=ThcDACW4DkU&list=PLRheCL1cXHruG6bV4tAIF4AhkUMaABf3F&index=1

* composer create-project laravel/laravel citas-medicas

# subimos el proyecto a github
* git init
* git add -A
* git commit -m "inicio proyecto"
* git branch -M main
* git remote add origin https://github.com/Wladimirandrea/ecommerce.git
* git push -u origin main

# instalamos livewire
    composer require livewire/livewire

## agregamos la directiva de estilos de livewire
    resource/views/welcome.blade
    @livewireStyles
    @livewireScripts

## creamos la base de datos

## modificamos la coneccion de la base de datos .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce
    DB_USERNAME=root
    DB_PASSWORD=123456

## guardamos los datos
* git add -A
* git commit -m "video 1"
* git branch -M main
* git push -u origin main

# Hacemos el login y registracion (2 video)
    composer require laravel/ui
    php artisan ui:auth
    npm install && npm run dev
## creamos una carpeta y un archivo para darle estilos bootstrap
    public/assets/css/bootstrap.min.css
## creamos una carpeta y un archivo para agrega jquery a bootstrap
    public/assets/js/bootstrap.min.js
     public/assets/js/jquery.min.js

## referenciamos los archivos creados en la app
    resources/views/layouts/app.blade.php
<!-- Style -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>

## agregamos la directiva de estilos de livewire
    resource/views/app.blade
    @livewireStyles
    @livewireScripts

## hacemos la migracion 
    php artisan migrate

## guardamos los datos
* git add -A
* git commit -m "video 2"
* git branch -M main
* git push -u origin main

# Hacemos el panel de admin (3 video)

## creamos un archivo para admin
    resource/view/admin.blade.php

## copiamos el contenido de app.blade
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


        <!-- plugins:js -->
    <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>

    <!-- Custom js for this page-->
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/data-table.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>

    @livewireScripts
</body>
</html>

## copiamos las carpetas css fonts images js scss y vendor de la plantilla
    creamos una carpeta admin en public/admin
    pegamos ahi para todos los estilos

## referenciamos en la direccion de los estilos
    href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">

## creamos unos nuevos archivos para desglozar la barra de navegacion y el sidebar
    resources/view/inc/admin/navbar.blade.php
    resources/view/inc/admin/sidebar.blade.php

## copiamos la navbar de la plantilla

## copiamos el sidebar de la plantilla

## creamos una nueva ruta routes/web.php
    Route::prefix('/admin')->group(function(){
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    });
## creamos el controlador
    php artisan make:controller Admin/DashboardController

## creamos la funcion en el controlador app/http/controller/admin/DashboardController
     public function index(){
        return view('admin.dashboard');
    }
## creamos la vista resources/view/admin/dashboard.blade.php
    @extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome back,</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div>
      </div>
    </div>
  </div>
@endsection

## guardamos los datos
* git add -A
* git commit -m "video 3"
* git branch -M main
* git push -u origin main

# Hacemos el midleware de admin (4 video)

## agregamos una nueva columna para agregar detalles a usuario
    php artisan make:migration add_details_to_users_table

## modificamos la tabla
    Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role_as')->default('0')->comment('0=user,1=admin');
        });
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');
        });
    }
## hacemos la migracion
    php artisan migrate

## creamos el midleware
    php artisan make:middleware AdminMiddleware

## hacemos la condicion en el middleware app/http/middleware
   public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->role_as == '1'){
            return redirect('/home')->with('status', 'Acceso denegado. Solo Administradores');
        }
        return $next($request);
    }
## modificamos en la auth app/http/Controllers/auth/logincontroller
    use Illuminate\Support\Facades\Auth;
    /* protected $redirectTo = RouteServiceProvider::HOME; */
    protected function authenticated(){
         if(Auth::user()->role_as == '1'){
            return redirect('admin/dashboard')->with('message', 'Bienvenido al Panel Administrativo');
        }else{
            return redirect('/home')->with('status', 'logged in Successfully');
        }
    }

## referenciamos el middleware en el kernel
    app/http/kernel.php
     protected $routeMiddleware = [
        'isAdmin' =>  \App\Http\Middleware\AdminMiddleware::class,
    ];

## modificamo la ruta 
Route::prefix('/admin')->middleare(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});

## agregamos la notificacion en la vista dashboard
    @if (session('message'))
        <h2>{{session('message')}}</h2>
    @endif

## guardamos los datos
* git add -A
* git commit -m "video 4"
* git branch -M main
* git push -u origin main

# Hacemos el logout en admin (5 video)

## colocamos el boton logout en el navbar view/layouts/inc/admin/navbar.blade.php
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="mdi mdi-logout text-primary"></i>
            Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

## colocamos un mensaje de session de bienvenida en la vista dashboard
    @section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <h2 class="alert alert-success">{{session('message')}} {{ Auth::user()->name }}</h2>
        @endif
      <div class="d-flex justify-content-between flex-wrap"

## guardamos los datos
* git add -A
* git commit -m "video 5"
* git branch -M main
* git push -u origin main

# Hacemos la categoria (6 video)

## creamos la tabla categoria
    php artisan make:migration create_categories_table

## creamos los campos para la tabla categoria
    Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');
            $table->timestamps();
        });
## hacemos la migracion
    php artisan migrate

## creamos el modelo categoria
    php artisan make:model Category

## protegemos los campos en el modelo
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

## creamos el controlador para categorias
    php artisan make:controller Admin/CategoryController

## hacemos la funcion en el controlador CategoryController
    public function index(){
        return view('admin.category.index');
    }
## creamos la ruta para categoria
    //Ruta Categoria
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

## creamos la vista view/admin/category/index.blade.php
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2>Category
                <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Agregar Categoria</a>
            </h2>
        </div>
        <div class="card-body">
            a
        </div>
      </div>

    </div>
  </div>
@endsection

## creamos la ruta crear categoria
Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);

## creamos la funcion de crear categoria
    public function create(){
        return view('admin.category.create');
    }

## creamos la vista view/admin/category/create.blade.php
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
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug:</label>
                        <input type="text" name="slug" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description:</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image:</label>
                        <input type="file" name="image" id="" class="form-control">
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
                        <button type="submit" class="btn btn-primary float-end">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection

## creamos la ruta para guardar categoria 
Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

## creamos el request de form request
    php artisan make:request CategoryFormRequest

## creamos la funcion store en el controlador category
   
    use App\Models\Category;
    use Illuminate\Support\Str;
    use App\Http\Requests\CategoryFormRequest;

    public function store(CategoryFormRequest $request){
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }



        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->save();
        return redirect('admin/category')->with('message', 'Categoria Agregada Correctamente');
    }
    

## modificamos la function autorize y rules app/http/request/CategoryFormRequest
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
        ];
    }

## guardamos los datos
* git add -A
* git commit -m "video 6"
* git branch -M main
* git push -u origin main

# Listamos, editamos, eliminamos categorias (7 video)

## colocamos la notificacionen el index categoria
 @if (session('message'))
    <h2 class="alert alert-success">{{session('message')}} {{ Auth::user()->name }}</h2>
@endif

## hacemos el livewire
    php artisan make:livewire Admin/Category/Index
## cortamos el contenido de la vista view/admin/category/index.blade
    pegamos en la vista livewire view/livewire/admin/category/index.blade.php

## hacemos referencia al componente livewire
<div>
    <livewire:admin.category.index/>
</div>

## hacemos la funcion en el controlador livewire
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

## creamos la tabla en la vista livewire/admin/category/index.blade.php
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
                    <a href="" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{$categories->links()}}
</div>

## hacemos la ruta para editar agrupando todas las categorias

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
    });
## creamos la funcion para editar
public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

## copiamos la vista crear para utilkizarla en editar
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2>Editar Categoria
                <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-end">Regresar</a>
            </h2>
        </div>
        <div class="card-body">
            <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre:</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control">
                        @error('name')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug:</label>
                        <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                        @error('slug')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description:</label>
                        <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                        @error('description')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image:</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{asset('/uploads/category/'.$category->image)}}" width="60px" height="60px" alt="">
                        @error('image')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status:</label><br/>
                        <input type="checkbox" name="status" value="{{$category->status}}" />
                        @error('status')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <h4>SEO tag</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title:</label>
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                        @error('meta_title')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword:</label>
                        <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control">
                        @error('meta_keyword')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description:</label>
                        <input type="text" name="meta_description" value="{{$category->meta_description}}" class="form-control">
                        @error('meta_description')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection

## creamos la ruta para actualizar
  Route::put('/category/{category}', 'update');  
## creamos la function para actualizar
     public function update(CategoryFormRequest $request, $category){
        $validatedData = $request->validated();
        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->update();
        return redirect('admin/category')->with('message', 'Categoria Agregada Correctamente');
    }

## creamos el boton de borrar con modal en view/livewire/admin/category/index
    <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>

## copiamos el modal
ojo metemos el modal y el contenido da la tabla con un div

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

## creamos la funcion en el livewire para borrar la categoria
    public $category_id;
    public function deleteCategory($category_id){
        $this->category_id = $category_id;
    }

## creamos la funcion para eliminar las fot de la categoria
    public function destroyCategory(){
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Categoria Borrada');
        $this->dispatchBrowserEvent('close-modal');
    }

## agregamos el script al final view/live

@push('script')
<script>
    window.addEventListener('close-modal', event=>{
        $('#deleteModal').modal('hide');
    });
</script>
@endpush

## referenciamos el stack en el view/layout/admin.blade.php
    @livewireScripts
  @stack('script')

## guardamos los datos
* git add -A
* git commit -m "video 7"
* git branch -M main
* git push -u origin main

# Creamos las marcas (8 video)

## creamos la ruta para las marcas
     Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class, 'index');

## creamos la tabla de las marcas
php artisan make:migration create_brands_table

## creamos los campos para la tabla
Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('status')->default('0');

            $table->timestamps();
        });
## hacemos la migracion
php artisan migrate

## creamos el modelo
php artisan make:model Brand

## protegemos la tabla en el modelo
 protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

## creamos el componente livewire
php artisan make:livewire Admin/Brand/Index

## extendemos la vista en el componente livewire app/http/livewire/admin/brand/index.php
public function render()
    {
        return view('livewire.admin.brand.index')->extends('layouts.admin')->section('content');
    }

## creamos la vista para las componentes marcas view/livewire/admin/brand/index
<div>
    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Lista de Marcas
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm float-end">Agregar Marcas</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stiped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

## creamos un nuevo archivo para el modal
    view/livewire/admin/brand/modal-form.blade
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModal">Agregar Marca</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nombre de la marca</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Nombre Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Estatus</label><br/>
                    <input type="checkbox" wire:model.defer="status" />Checked=Hidden, sin-Checked = Visible
                    @error('status') <small class="text-danger">{{$message}}</small> @enderror
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Si. Borrar</button>
            </div>
        </form>

      </div>
    </div>
</div>

## hacemos la funcion en el componente app/http/livewire/admin/brand
use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
public $name,$slug,$status;
    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
    public function storeBrand(){
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',

        ]);
        session()->flash('message', 'Marca Añadida Correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

## colocamos el script para cerrar el modal

@push('script')
<script>
    window.addEventListener('close-modal', event=>{
        $('#addBrandModal').modal('hide');
    });
</script>
@endpush

## creamos la funcion para limpiar los input 
public $name,$slug,$status;
    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }

    public function storeBrand(){
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',

        ]);
        session()->flash('message', 'Marca Añadida Correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

## hacemos la funcion para listar todas las marcas 
public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('layouts.admin')->section('content');
    }

## listamos en la vista
@forelse ($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status == '1' ? 'oculto':'visible'}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Hay Marcas Encontradas</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    <div>
                        {{$brands->links()}}

## guardamos los datos
* git add -A
* git commit -m "video 8"
* git branch -M main
* git push -u origin main

## editamos y borramos marcas (9 video)

## copiamos el modal de agregar marcas

<!-- Modal update -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModal">Editar Marca</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>Cargando...
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre de la marca</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Nombre Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Estatus</label><br/>
                        <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;" />Checked=Oculto, sin-Checked = Visible
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>

## modificamos los link de editar en la vista view/livewire/admin/brand/index.blade
<a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Edit</a>

## hacemos la funcion para editar los campos
    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

## hacemos tambien las funciones para abrir y cerrar modal
public function closeModal(){
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }

## hacemos la funcion para actualizar los datos
    public function updateBrand(){
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',

        ]);
        session()->flash('message', 'Marca Actualizada Correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

## creamos el modal para borrar

<!-- Modal Eliminar -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModal">Eliminar Marca</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>Cargando...
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                    <h4>¿Esta Seguro que deseas Eliminar esta Marca?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Si. Borrar</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>

## agremos la funcion para eliminar
 public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Marca Eliminada Correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

## agregamos el link para eliminar
<a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Eliminar</a>

## agregamos los script 

@push('script')
<script>
    window.addEventListener('close-modal', event=>{
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
</script>
@endpush

## guardamos los datos
* git add -A
* git commit -m "video 9"
* git branch -M main
* git push -u origin main
