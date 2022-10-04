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
