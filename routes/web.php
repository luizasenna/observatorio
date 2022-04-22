<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinhasController;

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
    return view('welcome');
});
/*Route::get('/paradas', function () {
    return view('paradas');
});*/
 Route::get('/paradas', [LinhasController::class, 'index']);
 Route::get('/getLinha', [LinhasController::class, 'getLinha']);
