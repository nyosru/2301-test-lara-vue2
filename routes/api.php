<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// теги добавить показать удалить
Route::apiResource( 'tags', TagController::class );

// record добавить показать удалить
Route::apiResource( 'records', RecordController::class );
