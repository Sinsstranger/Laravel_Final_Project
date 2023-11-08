<?php


use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [HomeController::class, 'properties'])->name('properties');
Route::get('/properties/{property}', [HomeController::class, 'show'])->name('properties.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::resource('properties', PropertiesController::class);
    Route::resource('addresses', \App\Http\Controllers\AddressesController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('users',AdminUserController::class);
});

require __DIR__ . '/auth.php';
