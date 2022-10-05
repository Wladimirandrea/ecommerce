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
