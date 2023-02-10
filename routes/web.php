<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Livewire\Chat\Creatchat ;
use App\Http\Livewire\Chat\Main;

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

 //livewire
 Route::get('users',Creatchat::class)->name('users');
 Route::get('/chat{key?}',Main::class)->name('chat');



Route::get('/',[CustomAuthController::class,'login'])->name('logIn');
Route::get('/registration',[CustomAuthController::class ,'registration'])->name('Registration');
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/Dashboard',[CustomAuthController::class,'dashboard'])->name('Dashboard')->middleware('isLogGetIn');
Route::get('/logout',[CustomAuthController::class,'logOut'])->name('logout');