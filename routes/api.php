<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\DesafioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/inverter-string', [DesafioController::class, 'inverterString']);
Route::post('/dobrar-numeros', [DesafioController::class, 'dobrarNumeros']);
Route::post('/contar-linhas', [DesafioController::class, 'contarLinhasArquivo']);

Route::post('/apresentar', [DesafioController::class, 'apresentarUsuario']);
Route::get('/array-associativa', [DesafioController::class, 'buscarUsuarios']);