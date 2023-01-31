<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\RecordTagsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// эта граппа роутов доступна только авторизованным пользователям
Route::middleware(['api'])->group(function () {
    // работа с тегами
    Route::apiResource('tags', TagController::class);
    // работа с record
    Route::apiResource('records', RecordController::class);
    // работа с record+tags
    Route::delete('recordTags/{recordId}/{tagId}', [ RecordTagsController::class , 'destroy' ] );    
    Route::apiResource('recordTags', RecordTagsController::class);
});
