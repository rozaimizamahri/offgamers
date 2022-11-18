<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExchangeController;
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

// Login
    Route::get('/login',       [AuthController::class, 'getlogin']);
    Route::post('/login/post', [AuthController::class, 'login']);

    Route::get('/register',       [AuthController::class, 'getRegister']);
    Route::post('/register/post', [AuthController::class, 'register']);
// Login


// Sessions Exists
Route::group(['middleware' => 'sessions'], function () { 

        Route::post('logout/post',                                                  [AuthController::class,'logout']); 

        Route::get('/',                                                             [HomeController::class,'index']);
        Route::get('/home',                                                         [HomeController::class,'index']); 
 
        Route::get('/orders', [HomeController::class,'index']);  
        Route::get('/orders/fetch', [HomeController::class,'fetch']);  
        Route::get('/orders/fetchReward', [HomeController::class,'fetchReward']);  
        Route::get('/orders/fetchEditDelete', [HomeController::class,'fetchEditDelete']);  
        Route::post('/orders/create', [HomeController::class,'create']);  
        Route::post('/orders/update', [HomeController::class,'update']);  
        Route::post('/orders/delete', [HomeController::class,'delete']);  
        Route::post('/orders/checkout', [HomeController::class,'checkout']);  

        Route::get('/rewards', [RewardController::class,'index']);    
        Route::get('/rewards/fetchEditDelete', [RewardController::class,'fetchEditDelete']);    
        Route::post('/rewards/update', [RewardController::class,'update']);    
        Route::get('/rewards/findExpired', [RewardController::class,'findExpired']);    

        Route::get('/payments', [PaymentController::class,'index']);   

        Route::get('/customers', [CustomerController::class,'index']);  
        Route::get('/customers/fetch', [CustomerController::class,'fetch']);  
        Route::get('/customers/fetchEditDelete', [CustomerController::class,'fetchEditDelete']);  
        Route::post('/customers/create', [CustomerController::class,'create']);  
        Route::post('/customers/update', [CustomerController::class,'update']);  
        Route::post('/customers/delete', [CustomerController::class,'delete']);

        Route::get('/exchanges', [ExchangeController::class,'index']);  
        Route::get('/exchanges/fetch', [ExchangeController::class,'fetch']);  
        Route::get('/exchanges/fetchEditDelete', [ExchangeController::class,'fetchEditDelete']);  
        Route::post('/exchanges/create', [ExchangeController::class,'create']);  
        Route::post('/exchanges/update', [ExchangeController::class,'update']);  
        Route::post('/exchanges/delete', [ExchangeController::class,'delete']);

    
});
// Sessions Exists