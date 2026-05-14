# crear proyecto
composer create-project laravel/laravel my-store
# ir la carpeta 
cd my-store
# comprobar que funciona
php artisan --version
# ejecutar el proyecto 
php artisan serve
# Generar el modelo Producto
php artisan make:model Producto -m
# Ejecutar las migraciones
php artisan migrate
# Crear el cotroller de Marca (--resource genera automáticamente el crud )
php artisan make:controller MarcaController --resource

# verificar las routes
php artisan route:list