<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\BMIController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/bmi', function () {
    return view('bmi');
});
Route::post('/bmi_cal', [BMIController::class, 'bmiCalculate']);

// Route::redirect('/', '/about');
Route::get('/week02', function () {
    return view('week02');
});

// use Illuminate\Http\Request;
 
// Route::get('/about/{id}', function (Request $request, string $id) {
//     return 'User '.$id;
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

/*Route::get('/create', [UserController::class, 'userCreateForm']);*/
Route::get('/users/{id}', [UserController::class, 'getProfile']);
Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/user_create_form', [UserController::class, 'userCreateForm']);
Route::post('/user_create', [UserController::class, 'userCreate']);
Route::get('/user_test/{name?}', [UserController::class, 'userTest']);
Route::get('/change_passwd/{id}', [UserController::class, 'updatePassword']);

Route::get('/login', function(){
    return view('login');
});

Route::post('/user_login', [UserController::class, 'userLogin']);
Route::get('/user_logout', [UserController::class, 'userLogout']);
Route::post('/update_photo', [UserController::class, 'updatePhoto']);

Route::get('/product_create_form', [ProductController::class, 'productCreateForm']);
Route::post('/product_create', [ProductController::class, 'productCreate']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product_update_form/{id}', [ProductController::class, 'productUpdateForm']);
Route::post('/product_update', [ProductController::class, 'productUpdate']);
Route::get('/product_delete/{id}', [ProductController::class, 'productDelete']);
Route::get('/products/{id}', [ProductController::class, 'getProducts']);

// ChartJS
Route::get('/chart_products/{download?}', [ChartJSController::class, 'index']);
