<?php

use App\Http\Controllers\ProductController;
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

Route::controller(ProductController::class)->prefix('/product')->group(function () {
    Route::post('/test', 'test');
    Route::get('/list', 'test');
    Route::put('/{id}', 'test');
    Route::delete('/{id}', 'test');
});

//camelCase
//PascalCase
//snake_case
//kebab-case

//return $request->**

//all() - retorna todas as informações da request, independente do tipo

//input('') - retorna apenas os campos que vieram de input (preenchimento), passando o parâmetro com o nome, será acessado o valor

//file() - retorna os dados do tipo arquivo