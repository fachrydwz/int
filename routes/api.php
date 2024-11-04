<?php

use App\Http\Controllers\Api\AuthController;
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

Route::middleware(['auth:sanctum', 'role:admin'])->get('/user', function (Request $request) {
    return response()->json(['message' => 'Welcome Admin!']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login'])->name('login');



//soal 1
Route::middleware(['auth:sanctum'])->put('/profile', [AuthController::class, 'updateProfile']);


//soal 2
Route::middleware(['auth:sanctum', 'role:admin'])->delete('/users/{id}', [AuthController::class, 'deleteUser']);

//soal 3
Route::middleware(['auth:sanctum', 'role:admin'])->get('/users', [AuthController::class, 'getAllUsers']);