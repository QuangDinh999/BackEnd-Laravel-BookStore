<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});




//Route::prefix('/admin')->group(function (){
//    Route::group(['middleware' => ['auth:api', 'role:admin']], function (){
//        Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
//        Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
//    });
//});
Route::prefix('/auth')->group(function (){
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
});

Route::prefix('/user')->group(function (){
    Route::get('', [\App\Http\Controllers\AuthController::class, 'getUser']);
});

// http://localhost/PHP_Book_Laravel-main/public/api/...
Route::prefix('categories')->group(function (){
    Route::get('', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.read');
    Route::post('/add', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.add');
    Route::get('/edit/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::prefix('publisher')->group(function (){
    Route::get('', [\App\Http\Controllers\PublisherController::class, 'index'])->name('publisher.read');
    Route::post('/add', [\App\Http\Controllers\PublisherController::class, 'store'])->name('publisher.add');
    Route::put('/update/{publisher}', [\App\Http\Controllers\PublisherController::class, 'update'])->name('publisher.update');
    Route::get('/edit/{publisher}', [\App\Http\Controllers\PublisherController::class, 'edit'])->name('publisher.edit');
    Route::delete('/delete/{publisher}', [\App\Http\Controllers\PublisherController::class, 'destroy'])->name('publisher.destroy');
});

Route::prefix('payment')->group(function (){
    Route::get('', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.read');
    Route::post('/add', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.add');
    Route::get('/edit/{payment}', [\App\Http\Controllers\PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/update/{payment}', [\App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/delete/{payment}', [\App\Http\Controllers\PaymentController::class, 'destroy'])->name('payment.destroy');
});

Route::prefix('book')->group(function (){
    Route::get('', [\App\Http\Controllers\BookController::class, 'index'])->name('book.read');
    Route::post('/add', [\App\Http\Controllers\BookController::class, 'store'])->name('book.add');
    Route::get('/edit/{book}', [\App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
    Route::put('/update/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name('book.update');
    Route::delete('/delete/{book}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('book.destroy');
});

Route::prefix('home')->group(function (){
    Route::get('/category/{id}', [\App\Http\Controllers\BookController::class, 'BookByCategory']);
    Route::get('/publisher/{id}', [\App\Http\Controllers\BookController::class, 'BookByPublisher']);
    Route::get('/book_detail/{id}', [\App\Http\Controllers\BookController::class, 'BookDetail']);
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index']);
    Route::get('/cartitems', [\App\Http\Controllers\CartitemsController::class, 'index']);
    Route::post('/cartitems/add', [\App\Http\Controllers\CartitemsController::class, 'store']);
    Route::post('/vnpay/{price}', [\App\Http\Controllers\PaymentController::class, 'vnPay']);
});
