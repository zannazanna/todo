<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/todos", [TodoController::class, "todos"]);

Route::get("/todos/{id}", [TodoController::class,"getTodos"]);

Route::post("todos", [TodoController::class, "postTodos"]);

Route::get("tick/{id}", [TodoController::class, "tick"]);

Route::put("todos/modifi/{id}", [TodoController::class, "modifi"]);

Route::delete("delete/{id}", [TodoController::class, "delete"]);