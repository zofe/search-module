<?php


use Illuminate\Support\Facades\Route;


//frontend
Route::get('search/items', [\App\Modules\Search\Http\Controllers\SearchController::class, 'search'])
    ->middleware(['web'])
    ->name('search.items')

;

