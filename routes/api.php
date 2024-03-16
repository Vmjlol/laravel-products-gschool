<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/product', [ProductController::class, 'store']);
Route::get('/product', [ProductController::class, 'index']);

//camelCase
//PascalCase
//snake_case
//kebab-case

//return $request->**

//all() - retorna todas as informações da request, independente do tipo

//input('') - retorna apenas os campos que vieram de input (preenchimento), passando o parâmetro com o nome, será acessado o valor

//file() - retorna os dados do tipo arquivo