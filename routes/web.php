<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    event(new \App\Events\ChatEvent('Say Hello'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/topics', [\App\Http\Controllers\TopicController::class, 'index']);
    Route::get('/topics/{topic}', [\App\Http\Controllers\TopicController::class, 'show']);
    Route::post('/topics/{topic_id}/discussions', [\App\Http\Controllers\DiscussionController::class, 'store']);
});
