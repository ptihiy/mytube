<?php

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\TopicsController;
use App\Http\Controllers\Api\ChannelController;
use App\Http\Controllers\Api\VideoListController;
use App\Http\Controllers\Api\ChannelVideosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', [TestController::class, 'index']);
Route::get('/playlists', [TestController::class, 'playlists']);
Route::get('/test/video', [TestController::class, 'video']);


Route::get('/channel/{channelId}/videos/latest', [ChannelVideosController::class, 'latest']);

Route::get('/topics', [TopicsController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('channels', ChannelController::class);

Route::resource('videos', VideoController::class);

Route::resource('video-lists', VideoListController::class);

Route::resource('tags', TagController::class);

