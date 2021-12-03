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

Route::get("/signout", function(){
    Session::flush();
    return redirect('/');
});

Route::get("/", [App\Http\Controllers\HomeController::class, "index"]);
Route::post("/signup_session", [App\Http\Controllers\SignupController::class, "signupSession"]);
Route::post("/signup_picture", [App\Http\Controllers\SignupController::class, "signupPicture"]);
Route::post("/signup_skip_picture", [App\Http\Controllers\SignupController::class, "signupSkipPicture"]);
Route::post("/signup_picture_url", [App\Http\Controllers\SignupController::class, "signupPictureURL"]);
Route::post("/signin", [App\Http\Controllers\SigninController::class, "signin"]);
Route::post("/post", [App\Http\Controllers\PostController::class, "post"]);
Route::post("/message/send/{id}", [App\Http\Controllers\ChatController::class, "chat"]);






