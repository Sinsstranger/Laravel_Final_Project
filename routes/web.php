<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DealStatusController as AdminDealStatusController;
use App\Http\Controllers\Admin\AddressController as AdminAddressController;
use App\Http\Controllers\Admin\DealController as AdminDealController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\FeedbackController;

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


Route::controller(ChatController::class)->middleware('auth')->group(function () {
    Route::get('/getChat{message}', 'getChat')->name('getChat');
    Route::get('/messages', 'messages');
    Route::get('/chat/create{user}', 'create')->name('chat.create');
    Route::post('/send', 'send');
    Route::delete('/chat/destroy{message}', 'destroy')->name('chat.destroy');

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [HomeController::class, 'properties'])->name('properties');
Route::get('/properties/{property}', [HomeController::class, 'show'])->name('properties.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::post('/favourites/{property}/{action}', [FavouritesController::class, 'store'])->name('favourites');


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
    Route::resource('deals', DealsController::class,);
    Route::resource('favourites', FavouritesController::class, (array)'index');
});

//Админка
Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('users',AdminUserController::class);
    Route::resource('properties',AdminPropertyController::class);
    Route::resource('categories',AdminCategoryController::class);
    Route::resource('dealStatuses',AdminDealStatusController::class);
    Route::resource('addresses', AdminAddressController::class);
    Route::resource('deals', AdminDealController::class);
    Route::resource('feedbacks', FeedbackController::class);
});

// Отзывы
Route::prefix('review')->name('review.')->group(function() {
    Route::post('/', [ReviewController::class, 'create'])->name('create');
    Route::post('store', [ReviewController::class, 'store'])->name('store');
});

//Feedback сайта
Route::prefix('feedback')->name('feedback.')->group(function() {
    Route::post('store', [FeedbackController::class, 'store'])->name('store');
});

Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment');

require __DIR__ . '/auth.php';
