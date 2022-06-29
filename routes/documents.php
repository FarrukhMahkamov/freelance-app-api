<?php

use App\Http\Controllers\Api\Other\FakerController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/faker')->group(function() {

    Route::controller(FakerController::class)
    ->group(function() {

        Route::get('job-categories/{count}', 'addJobCategory');
        Route::get('job-categories', 'deleteJobCategories');

    });

});
