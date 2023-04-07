<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\UserController;
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


Route::post('/login',               [AuthController::class,  'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout',              [AuthController::class, 'logout']);
    Route::get('list/users',            [UserController::class, 'listUsers']);
    
});

// companies
Route::get('list/companies',         [CompanyController::class, 'listCompanies']);


// Route::post('storeProduct',          [ProductController::class, 'storeProduct']);