<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController ;


Route::get('/', function () {
    return view('welcome');
});

// creation d'une Routes pour afichage

Route::get("/SHow/companing/{id}" , [UserController::class , 'index_SHiping'])->name("show_dataUser");

Route::get("/show/{id}" , function  ($id){

    echo $id ;
});
