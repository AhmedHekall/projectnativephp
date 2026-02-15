<?php

use Core\Route;
use App\Controllers\App;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Notes\CreateNote;
use App\Controllers\Notes\DeleteNotes;
use App\Controllers\Notes\Edit;
use App\Controllers\Notes\Index;
use App\Controllers\Notes\Show;

Route::get("/",[App::class,'index']);
Route::get("/contact",[App::class,'contact']);
Route::get("/about",[App::class,'about']);

Route::get('/note/create',[CreateNote::class,'create']);
Route::post('/note/create',[CreateNote::class,'create']);
Route::get('/update/note',[Edit::class,'update']);
Route::get('/notes',[Index::class,'index'])->only('Auth');
Route::get('/note/{id}',[Show::class,'show']);
Route::delete('/note/delete/{id}',[DeleteNotes::class,'destroy']);
Route::get('/edit/note/{id}',[Edit::class,'edit']);
Route::post('/update/note',[Edit::class,'update']);
Route::get('/register',[RegisterController::class,'newRegister'])->only('Guest');
Route::post('/register',[RegisterController::class,'register']);
Route::get('/login',[LoginController::class,'newlogin']);
Route::post('/login',[LoginController::class,'login'])->only('CSsrf');
Route::get('/logout',[LoginController::class,'logout']);




