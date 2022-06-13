<?php

use App\Http\Controllers\Api\PatientController;
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


;
//Public Routes
Route::apiResource('/patients', PatientController::class)->only(['index','show']);


//Protected Routes
Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::apiResource('/patients', PatientController::class)->only(['store','update','destroy',]);

});




