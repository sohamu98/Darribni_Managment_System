<?php

use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BranchesControler;
use App\Http\Controllers\CoachesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TrainingBatchController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\TraineePaymentController;

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


Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('user/changePassword', [UserController::class, 'updatePassword']);
Route::middleware('auth:sanctum')->post('logout', [Authcontroller::class, 'logout']);
// Route::post('register', [AuthController::class, 'register']);
// user CRUD Resource
Route::middleware('auth:sanctum')->resource('/user', UserController::class);



  Route::resource('/course', CoursesController::class);
  Route::resource('/specialization',SpecializationController::class);
  Route::resource('/branch',BranchesControler::class);
  Route::resource('/coach',CoachesController::class);
  //Route::resource('/trainee',TraineeController::class);
  Route::resource('/employee',EmployeesController::class);
 // Route::resource('/trainingbatch',TrainingBatchController::class);
  Route::resource('/traineepayment',TraineePaymentController::class);

  
    ////Image routes
    Route::post('imageApi', [ImageController::class, 'imageApi']);

    ////
    Route::resource('/TrainingBatch', TrainingBatchController::class);
    Route::resource('/course', CoursesController::class);
    Route::resource('/trainee', TraineeController::class);

    Route::get('/trianee_statistics/count', [TraineeController::class,'traineesCount']);