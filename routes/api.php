<?php

use App\Http\Controllers\TagController;
use App\Http\Resources\TagsCollection;
use App\Http\Resources\TagsResource;
use App\Models\Tag;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// теги добавить показать удалить
Route::apiResource( 'tags', TagController::class );

// Route::get('/tags/{id}', function ($id) {
//     return new TagsResource(Tag::findOrFail($id));
// });
// Route::get('/tags', function () {
//     return new TagsCollection(Tag::paginate(5));
// });