<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('home', function(){
    return redirect()->route('katalog.index');
})->name('home');

Auth::routes();

// Untuk user
Route::middleware(['auth'])->group(function () {
    Route::prefix('katalog')->name('katalog.')->group(function(){
        Route::get('/', [CatalogueController::class, 'index'])->name('index');
        Route::post('/add/{id}', [CatalogueController::class, 'add'])->name('add');
    });

    Route::prefix('cart')->name('cart.')->group(function(){
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::get('/confirmation', [CartController::class, 'confirmation'])->name('confirmation');
        Route::get('/history', [CartController::class, 'history'])->name('history');
        Route::get('/history/{id}', [CartController::class, 'historyDetail'])->name('historyDetail');
        Route::post('/upload/{id}', [CartController::class, 'upload'])->name('upload');
    });
});

