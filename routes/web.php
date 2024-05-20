<?php

use App\Http\Controllers\ConfigurationCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\ConfigurationCode;
use App\Models\Role;
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

//php artisan make:controller AdminController --api

Route::resource('/configuration/users', UserController::class)->names([
    'index' => 'configuration.users.index', //list 
    'create' => 'configuration.users.create', //pergi ke page create
    'store' => 'configuration.users.store', //store data
    'edit' => 'configuration.users.edit',  // pergi ke page edit
    'update' => 'configuration.users.update', // update data
    'show' => 'configuration.users.show',
    'destroy' => 'configuration.users.delete',
]);

Route::resource('/configuration/admins', RoleController::class)->names([
    'index' => 'configuration.admins.index', //list
    'create' => 'configuration.admins.create', //pergi ke page create
    'store' => 'configuration.admins.store', //store data
    'edit' => 'configuration.admins.edit', //pergi ke page edit
    'update' => 'configuration.admins.update', 
    'show' => 'configuration.admins.show', //update data
    'destroy' => 'configuration.admins.delete', 
]);

Route::resource('configuration/categories', CategoryController::class)->names([
    'index' => 'configuration.categories.index', //list
    'create' => 'configuration.categories.create', //pergi ke page create
    'store' => 'configuration.categories.store', //store data
    'update' => 'configuration,categories.edit', //pergi ke page edit
    'show' => 'configuration.categories.show', //update data
    'destroy' => 'configuration.categories.delete',
]);

Route::get('categories/{category}/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('categories/{category}/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');




