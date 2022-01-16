<?php

use App\Http\Controllers\Administrador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/', function () {

    $user=Auth::user();
    
    if($user->esAdmin()){
        echo "Eres usuario administrador";
    }else{
        echo "Eres consultor";
    }

    return view('welcome');
});*/
Route::get('/', function () {
    return view('auth/index');
});

//Route::get('/usuarios','UserController@index');

Route::get('/user',[UserController::class, 'index']);
Route::get('/login',[UserController::class, 'login']);
Route::get('/admin',[Administrador::class, 'admin']);
Route::get('/eliminar',[Administrador::class, 'eliminar']);
Route::get('/editar',[Administrador::class, 'editar']);

