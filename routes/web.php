<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\variationController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Route::middleware(AdminMiddleware::class)->group(
    function () {
Route::get('/listAccount', [LoginController::class, 'listAccount'])->name('account.list');
Route::put('/listAccount/{user}', [LoginController::class, 'setAble'])->name('account.setAble');

Route::get('/dashboard',[LoginController::class, 'dashboard'])->name('account.dashboard');

Route::get('/listBook', [BookController::class, 'index'])->name('book.index');
Route::get('/listVariation', [variationController::class, 'listVariation'])->name('book.listVariation');

Route::get('/create',[BookController::class,'create'])->name('book.create');
Route::post('/create',[BookController::class,'store'])->name('book.store');

Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/edit/{id}', [BookController::class, 'update'])->name('book.update');

Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');


Route::get('/listCategory', [CategoryController::class, 'index'])->name('category.index');

Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('category.create');
Route::post('/createCategory', [CategoryController::class, 'storeCategory'])->name('category.store');

Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
Route::put('/editCategory/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');

Route::delete('/deleteCategory/{id}', [CategoryController::class, 'destroyCategory'])->name('category.destroy');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/detail', [LoginController::class, 'detail'])->name('user.detail');
    Route::get('/user/edit/{user}', [LoginController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{user}', [LoginController::class, 'update'])->name('user.update');
    Route::get('/user/changePass/{user}', [LoginController::class, 'toChange'])->name('user.changePass');
    Route::put('/user/changePass/{user}', [LoginController::class, 'changePass'])->name('user.changePass');

    Route::get('/home', [BookController::class, 'getEightHighestAnd8LowestPrice'])->name('book.home');

    Route::post('/addToCart', [BookController::class, 'addToCart'])->name('book.addToCart');
    

    // Route::get('/List-Books-Follow-Categories/0', [BookController::class, 'getBookFollowCategoryToView'])->name('book.listFollowCateToView');
    Route::get('/List-Books-Follow-Categories/{id}', [BookController::class, 'getBookFollowCategoryToShow'])->name('book.listFollowCateToShow');

    Route::get('/detail-book/{id}', [BookController::class, 'detailBook'])->name('book.detailBook');
    Route::get('/search', [BookController::class, 'search'])->name('book.search');

});

//Login and register
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::Post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');