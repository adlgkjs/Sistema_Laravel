<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //cambiamos la vista que se mostrara por defecto en nuestra aplicacion
    //para que se puestre el formulario de autenticacion en lugar de la de "welcome" 
    return view('auth.login');
});

//con esta ruta, cuando tipiemos la palabra 'articulos' en nuestro navegador
//buscara el "ArticuloControlador, que a su vez buscara la vista index"
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
