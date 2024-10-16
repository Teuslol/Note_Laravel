<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNoLogged;
use Illuminate\Support\Facades\Route;
use resources\views\layout;

//Auth Routes (se não estiver logado)
Route::middleware([CheckIsNoLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit',[AuthController::class, 'loginSubmit']);
});


//Quando estiver logado
    Route::middleware([CheckIsLogged::class])->group(function(){
    //MainController
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');

    // edit note
    Route::get('/editNote/{id}',[MainController::class, 'editNote'])->name('edit');
    Route::post('/editNoteSubmit',[MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');
    // Delete
    Route::get('/deleteNote/{id}',[MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteNoteConfirm/{id}',[MainController::class, 'deleteNoteConfirm'])->name('deleteConfirm');


    //Auth Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


