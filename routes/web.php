<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ClienteController;
use App\http\Controllers\EspecieController;

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

Route::resources([
	"cliente" => ClienteController::class,
	"especie" => EspecieController::class
]);

Route::get('/', function () {
    return view('home.welcome');
});
