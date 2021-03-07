<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \App\Mail\infoMail;

Route::get('/','userController@index');
Route::post('/','userController@store');
