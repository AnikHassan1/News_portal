<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{CategoryController,subCategoryController};
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
//__category Crud__//
Route::get('/app/home',[CategoryController::class,'home'])->name('app.home');
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::delete('category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');


//___Sub Category Crud___//
Route::get('/subcategory/index',[subCategoryController::class,'index'])->name('subcategory.index');
Route::post('/subcategory/store',[subCategoryController::class,'store'])->name('subcategory.store');
Route::delete('/subcategory/{id}', [subCategoryController::class, 'delete'])->name('subcategory.delet');
Route::get('/subcategory/edit/{id}',[subCategoryController::class,'edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}',[subCategoryController::class,'update'])->name('subcategory.update');










Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
