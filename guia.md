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

## creamos la base de datos

## modificamos la coneccion de la base de datos .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce
    DB_USERNAME=root
    DB_PASSWORD=123456
## guardamos los datos

* git init
* git add -A
* git commit -m "video 1"
* git branch -M main
* git remote add origin https://github.com/Wladimirandrea/ecommerce.git
* git push -u origin main
