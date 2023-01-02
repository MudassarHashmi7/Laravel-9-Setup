<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','isAdmin'])->name('dashboard');

//Route::get('/test', function () {
//    //
//    return ('hello');
//})->middleware(['isAdmin'])->name('test');


Route::get('roles',[RoleController::class,'index'])->name('roles.index');
Route::get('roles/create',[RoleController::class,'create'])->name('roles.create');
ROute::post('roles',[RoleController::class,'store'])->name('roles.store');
Route::get('roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
Route::put('roles/{role}',[RoleController::class,'update'])->name('roles.update');
Route::delete('roles/{role}',[RoleController::class,'destroy'])->name('roles.destroy');

Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::post('users/store',[UserController::class,'store'])->name('users.strore');
Route::delete('users/delete/{id}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('/change-password', [RoleController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [RoleController::class, 'updatePassword'])->name('update-password');

Route::get('new',[GuestController::class,'index'])->name('new.index');
Route::get('guest/show',[GuestController::class,'show'])->name('guest.show');
Route::get('guest/edit',[GuestController::class,'edit'])->name('guest.edit');
Route::post('guests/{id}',[GuestController::class,'update'])->name('guests.update');



Route::get('/permission',[PermissionController::class,'index'])->name('permission.index');
Route::post('/permission',[PermissionController::class,'create'])->name('permission.create');
Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
Route::PUT('/permission/edit/{id}',[PermissionController::class,'update'])->name('permission.update');
Route::GET('/permission/delete/{id}',[PermissionController::class,'destroy'])->name('permission.delete');



Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/{categories}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::delete('category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::put('category/{categories}',[CategoryController::class,'update'])->name('category.update');


Route::get('subcategory/{id}',[SubCategoryController::class,'index'])->name('subcategory.index');
Route::post('subcategory/{id}/store',[SubCategoryController::class,'store'])->name('subcategory.store');
Route::get('subcategory/{subcategories}/edit',[SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::delete('subcategory/{id}',[SubCategoryController::class,'destroy'])->name('subcategory.destroy');
Route::post('subcategory/{subcategories}',[SubCategoryController::class,'update'])->name('subcategory.update');


Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::post('products/store',[ProductController::class,'store'])->name('products.store');
Route::get('products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::post('products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('products/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('products/test',[ProductController::class,'test'])->name('products.test');



//Route::put('test',[SubCategoryController::class,'test'])->name('test');


//Route::get('/logout', [AuthenticatedSessionController::class, 'destory'])->name('logout');

//Route::get('/logout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@destory');

require __DIR__.'/auth.php';


