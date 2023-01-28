<?php

use App\Http\Controllers\TheFormController;
use App\Models\theForm;
use Illuminate\Support\Facades\Route;

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

//The route for making the first create function using the get method
Route::get('/', [TheFormController::class, 'index']);

//The route for then saving the collected data into the database using the post method.
Route::post('/', [TheFormController::class, 'store']);

//The route for updating or mark a todo as done 
Route::patch('/{todo}', [TheFormController::class, 'update']);

//The route for deleting a Todo item 
Route::delete('/{todo}', [theFormController::class, 'delete']);

