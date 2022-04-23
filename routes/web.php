<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinhasController;
use App\Http\Controllers\HorariosController;

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

Route::get('/', function () {
    return view('home');
});

 Route::get('/paradas', [LinhasController::class, 'index']);
 Route::get('/getLinha', [LinhasController::class, 'getLinha']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/horarios', [App\Http\Controllers\HorariosController::class, 'index'])->name('horarios');

Route::group(['prefix' => 'linhas', 'middleware' => 'auth'], function(){

    Route::get('/',[LinhasController::class, 'show']);
    Route::get('/add', function(){
        return view('/linhas/add');
    });
    Route::get('edit/{id}',[LinhasController::class, 'edit']);
    Route::get('delete/{id}',[LinhasController::class, 'delete']);

    Route::post('update', [LinhasController::class, 'update'])->name('update');
    Route::post('create', [LinhasController::class, 'create'])->name('createNew');

});

Route::group(['prefix' => 'horarios'], function(){
    Route::get('/{id}', [HorariosController::class, 'show']);
});
