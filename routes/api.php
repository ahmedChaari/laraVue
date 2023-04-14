<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\RoleController;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login',         [AuthController::class,  'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout',     [AuthController::class, 'logout']);
    //users
    Route::get('list/users',         [UserController::class, 'listUsers']);
    Route::put('update/user/{user}', [UserController::class, 'updateUser']);
    Route::put('confirm/user/{user}',[UserController::class, 'confirmWithUser']);
    Route::post('add/user',          [UserController::class, 'storeUser']);
    Route::delete('delete/user/{id}',[UserController::class, 'deleteUser']);
    Route::post('cancel/user/{id}',  [UserController::class, 'cancelValidUser']);
    // companies
    Route::put('update/company/{company}',[CompanyController::class, 'updateCompany']);
    Route::post('add/company',            [CompanyController::class, 'storeCompany']);
    Route::delete('delete/company/{id}',  [CompanyController::class, 'deleteCompany']);

    // roles
    Route::get('list/roles', [RoleController::class, 'listRoles']);
    Route::get('list/companies',          [CompanyController::class, 'listCompanies']);
});


