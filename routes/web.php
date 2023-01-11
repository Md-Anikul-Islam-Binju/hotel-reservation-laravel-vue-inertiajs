<?php

use App\Http\Controllers\admin\AmenitiesController;
use App\Http\Controllers\admin\BookedCustomerListController;
use App\Http\Controllers\admin\HotelAdminController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HotelHomeController;
use App\Http\Controllers\NotificationSendController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
Route::get('/',[HotelHomeController::class,'index']);

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[HotelHomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;

//Admin Route
Route::middleware('auth')->group(function () {

   //Dashboard
    Route::get('/hotel-admin-dashboard',[HotelAdminController::class,'adminDashboard'])->name('admin.hotel.dashboard');

    //Amenities
    Route::get('admin-amenities',[AmenitiesController::class,'index'])->name('admin.amenities');
    Route::post('admin-amenities-store',[AmenitiesController::class,'store'])->name('store.amenities');

    //Room
    Route::get('admin-room',[RoomController::class,'index'])->name('admin.room');
    Route::post('admin-room-store',[RoomController::class,'store'])->name('store.room');
    Route::get('admin-room-edit/{id}',[RoomController::class,'edit'])->name('edit.room');
    Route::post('admin-room-update/{id}',[RoomController::class,'update'])->name('update.room');
    Route::delete('admin-room-delete/{id}',[RoomController::class,'destroy'])->name('delete.room');

    //Booked Customer List
    Route::get('admin-booked-customer-list',[BookedCustomerListController::class,'index'])->name('admin.booked.customer.lst');
    Route::post('admin-booked-conform/{id}',[BookedCustomerListController::class,'bookedConform'])->name('booked.conform');
    Route::post('admin-booked-declined/{id}',[BookedCustomerListController::class,'bookedDeclined'])->name('booked.declined');
    //Admin Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //Use fo notification
    Route::get('/notification', [NotificationSendController::class, 'notification']);
    Route::post('/store-token', [NotificationSendController::class, 'storeFcmToken'])->name('store.token');
    Route::post('/send-notification', [NotificationSendController::class, 'sendNotification'])->name('send.notification');
});
require __DIR__.'/auth.php';

//Auth Customer
Route::middleware('auth')->group(function () {
    Route::get('/hotel-single/{id}',[HotelHomeController::class,'singleHotel'])->name('hotel.single.page');
    Route::post('/hotel-single-booked',[HotelHomeController::class,'storeBooking'])->name('hotel.single.booked');
});

