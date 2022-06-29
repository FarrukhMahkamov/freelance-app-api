<?php

use App\Http\Controllers\Api\Order\JobCategoryController;
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

Route::prefix('v1')->group(function() {

    Route::controller(JobCategoryController::class)
    ->group(function () {
        Route::get('job-categories', 'index');
        Route::post('job-categories', 'store');
        Route::put('job-categories/{id}', 'update');
        Route::delete('job-categories/{id}','destroy');
    }); 

});
