<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// эта граппа роутов доступна только авторизованным пользователям
Route::middleware(['api'])->group(function () {
    // работа с тегами
    Route::apiResource('tags', TagController::class);
    // работа с record
    Route::apiResource('records', RecordController::class);
});
