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

# editamos y borramos marcas (9 video)

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

## agregamos los productos multiples imagenes (10 video)

## agremos los link en el sidebar
 <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Productos</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/products/create')}}">Agregar Productos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/products')}}">Ver Productos</a></li>
          </ul>
        </div>
      </li>

## creamos la tabla de productos
php artisan make:migration create_products_table

## creamos los campos para la tabla productos
     Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=tendencia, 0=no es tendencia');
            $table->itnyInteger('status')->default('0')->comment('1=oculto, 0=visible');

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();

        });
## creamos la tabla para las imagenes 
    php artisan make:migration create_product_images_table

## creamos los campos para la tabla de imagenes
    Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('image');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
## hacemos los modelos para productos
    php artisan make:model Product

## modificamos el modelo producto
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',

    ];

## hacemos los modelos para productosimage
    php artisan make:model ProductImage

## modificamos el modelo productoImage

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image'
    ];

## hacemos el controlador para productos
    php artisan make:controller Admin/ProductController

## creamos la ruta para productos
Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
    });

## hacemos la funcion en el controlador de productos
    public function index(){
        return view('admin.products.index');
    }

## creamos la vista view/admin/products/index.blade.php
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2>Category
                <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Agregar Productos</a>
            </h2>
        </div>
        <div class="card-body">

        </div>
      </div>

    </div>
</div>
@endsection

## creamos la ruta para crear productos
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
    });
## hacemos la funcion para crear productos
     public function create(){
        return view('admin.products.create');
    }

## hacemos la vista 
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Productos
                    <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm float-end">Regresar</a>
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
            <form action="{{url('admin/products/')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Seleccionar Marca</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Pequeña Descripcion</label>
                            <textarea name="small_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Descripcion</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    {{-- tabs SEO --}}
                    <div class="tab-pane fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Meta Descripcion</label>
                            <textarea name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    {{-- tabs detalles --}}
                    <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Precio Original</label>
                                    <input type="text" name="original_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Precio de venta</label>
                                    <input type="text" name="selling_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Cantidad</label>
                                    <input type="number" name="quantity" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Tendencia</label>
                                    <input type="checkbox" name="trending" style="width: 50px; height: 50px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Estatus</label>
                                    <input type="checkbox" name="status" style="width: 50px; height: 50px;">
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
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>

            </form>

        </div>
        </div>
    </div>
</div>

## hacemos la migracion 
php artisan migrate

## hacemos la funcion create products 

    use App\Models\Brand;
    use App\Models\Category;
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

## modificamos las rutas para productos
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');

    });

## creamos la function store en el controlador
 public function store(ProductFormRequest $request){
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1': '0',
            'status' => $request->status == true ? '1': '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i = 0;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect('/admin/products')->with('message', 'Producto añadido Correctamente');
        /* return $product; */
    }

## creamos el productformrequest
php artisan make:request ProductFormRequest

## modificamos el productFormRequest
    public function authorize()
    {
        return true;
    }
  public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
             'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'brand' => [
                'required',
                'string',
                'max:255'
            ],
            'small_description' => [
                'required',
                'string'
            ],
            'description' => [
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'string'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'trending' => [
                'required',
                'string'
            ],
            'status' => [
                'string'
            ],
            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'required',
                'string'

            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable'
                //'image|mimes:jpeg,png,jpg'
            ],

        ];
    }


## guardamos los datos
* git add -A
* git commit -m "video 10"
* git branch -M main
* git push -u origin main

# editamos actualizamos eliminamos los productos (11 video)

## creamos la tabla para listar los productos
    <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->status == '1' ? 'Hidden':'Visible'}}</td>
                        <td>
                            <a href="" class="btn btn-success">Editar</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No hay Productos Disponibles</td>
                    </tr>
                    @endforelse
                </tbody>

## modificamos la funcion index del controlador productos
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

## modificamos la relacion del modelo producto a category
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

## modificamos la vista index para productos
<td>
                            @if ($product->category)
                                {{$product->category->name}}
                            @else
                                Sin Categoria
                            @endif

                        </td>   

## creamos el boton para editar
<a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>

## creamos la ruta para editar

    Route::post('/products/{product}/edit', 'edit');

## hacemos la funcion
     public function edit(init $product_id){
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit');
    }
## creamos la vista para editar productos
    views/admin/products/edit.blade.php

## editamos  
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

## colocamos los modelos de categoria y marcas
  public function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

## creamos la ruta para editar los cambios
    Route::put('/products/{product}', 'update');

## creamos la funcion update
    public function update(ProductFormRequest $request, int $product_id){
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])->products()->where('id', $product_id)->first();
        if($product){
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1': '0',
                'status' => $request->status == true ? '1': '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);
            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                $i = 0;
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('/admin/products')->with('message', 'Producto Actualizado Correctamente');
        }
        else
        {
            return redirect('admin/products')->with('message', 'No hay producto encontrado con ese ID');
        }

    }

## creamos la ruta para borrar las imagenes individualmente
    Route::get('product-image/{product_image_id}/delete', 'destroyImage');

## creamos la funcion para destruir la imagen
     public function destroyImage(int $product_image_id){
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Imagen del producto Borrada');
    }

## hacemos el boton para eliminar el producto completamente
<a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Estas Seguro que deseas Eliminar?')" class="btn btn-sm btn-danger">Borrar</a>

## creamos la ruta para eliminar el producto
    Route::get('/products/{product_id}/delete', 'destroy');

## creamos la funcion destroy 
     public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        if($product->productImages()){
            foreach($product->productImages() as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Producto con sus Imagenes Borrada');
    }

## guardamos los datos
* git add -A
* git commit -m "video 11"
* git branch -M main
* git push -u origin main

# creamos crud de colores (12 video)

## hacemos el link de sidebar para colores
    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/colors')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Colores</span>
        </a>
    </li>
## creamos la tabla para colores
    php artisan make:migration create_colors_table

## creamos los campos para la tabla
    Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
## migramos las tablas
    php artisan migrate

## creamos el controlador para colors
    php artisan make:controller Admin/ColorController

## hacemos la funcion para listar los colores
     public function index(){
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

## creamos las rutas para colores
     Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');

    });

## creamos las vista para colores index create edit 
## copiamos el index de productos para pegarlo en la vista index 

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

## creamos el metodo crear 
public function create(){
        return view('admin.colors.create');
    }

## hacemos el formulario para create
    <form action="{{ url('admin/colors/create')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nombre</label> <br/>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Codigo Color</label> <br/>
                    <input type="text" name="code" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Status</label> <br/>
                    <input type="checkbox" name="status" /> Marcado=oculto, desmarcado= visible
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

## creamos el modelo
    php artisan make:model

## protegemos la tablas en el modelo
     protected $table = 'colors';
    protected $fillable = [
        'name',
        'code',
        'status'
    ];

## hacemos las funcion store para guardar
    public function store(ColorFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message', 'Color Guardado Correctamente');

    }

## creamos el request para las rules
    php artisan make:request ColorFormRequest

 public function rules()
    {
        return [
            'name' => ['required','string'],
            'code' => ['required','string'],
            'status' => ['nullable']



        ];

    }

## creamos la funcion para editar
public function edit(Color $color){
        return view('admin.colors.edit', compact('color'));
    }

## creamos el formulario para editar
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

## creamos la funcion para actualizar
     public function update(ColorFormRequest $request, $color_id){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::find($color_id)->update($validatedData);
        return redirect('admin/colors')->with('message', 'Color Actualizado Correctamente');
    }

## creamos la funcion para borrar
     public function destroy(int $color_id){
        $color = color::findOrFail($color_id);
        $color->delete();
        return redirect()->back()->with('message', 'Color borrado Correctamente');
    }

## guardamos los datos
* git add -A
* git commit -m "video 12"
* git branch -M main
* git push -u origin main
