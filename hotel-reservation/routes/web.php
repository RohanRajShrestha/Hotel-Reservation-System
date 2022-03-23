<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;





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

Route::get('/',[RoomTypeController::class, 'room']);

/* Customerroutes*/ 
Route::get('/login',[CustomerController::class, 'login'])->name('user.login');
Route::post('/check', [CustomerController::class, 'checklogin'])->name('user.check');
Route::post('/store', [CustomerController::class, 'userstore'])->name('user.store');
Route::get('/register', [CustomerController::class, 'register'])->name('user.register');
Route::get('/home',[RoomTypeController::class, 'room'])->name('frontend.home');
Route::get('/home/result',[BookingController::class, 'result']);
Route::get('/booking',[CustomerController::class, 'booking']);
Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});

Route::middleware(['customer'])->group(function () {
        
    Route::get('/home/results/{id}/book', [CustomerController::class, 'roombook']);
    /**---------------User Route related to profile */
    Route::get('/profile/{id}/',[CustomerController::class, 'show'])->name('user.profile');  
    Route::get('/logout', [CustomerController::class, 'perform']);
    Route::get('/profile/{id}/edit',[CustomerController::class, 'editprofile'])->name('user.profileedit'); 
    Route::put('/profile/{id}/store', [CustomerController::class, 'update'])->name('user.updateprofile');
    Route::get('/profile/{id}/changepassword', [CustomerController::class, 'changepassword'])->name('customer.changepassword');
    Route::put('/profile/{id}/change', [CustomerController::class, 'change'])->name('customer.change');
    /**--------------End user routes */
    /**--------------Booking routes related to booking room */
    Route::get('/book/{id}',[CustomerController::class, 'roombook'])->name('user.roombook'); 
    Route::get('/book/availablerooms/{checkin_date}/{id}',[BookingController::class, 'availablerooms'])->name('user.availablerooms'); 
    //Route::put('/profile/{id}/store', [CustomerController::class, 'update'])->name('user.updateprofile');
    Route::post('/book', [CustomerController::class, 'bookstore'])->name('book.store');
    Route::get('/pay/{id}', [CustomerController::class, 'pay'])->name('pay.index');
    Route::get('/checkin/{id}', [CustomerController::class, 'checkin'])->name('user.checkin');
    Route::get('/checkout/{id}', [CustomerController::class, 'checkout'])->name('user.checkout');
    Route::get('/cancel/{id}', [CustomerController::class, 'cancel'])->name('user.cancel');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    /**--------------End of booking room */
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Customer routes end*/

/*Admin routes*/ 
Route::prefix('annapurnahotel/admin')->group(function(){
    Route::get('/login',[AdminController::class, 'login'])->name('admin.login');
    Route::post('/check', [AdminController::class, 'check'])->name('admin.check');
});

Route::group(['prefix' => 'annapurnahotel/admin','middleware' => 'admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile/{id}', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/changepassword/{id}/change', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::put('/profile/changepassword/{id}', [AdminController::class, 'change'])->name('admin.change');
    Route::resource('/admins',AdminController::class);
    Route::resource('/customer',CustomerController::class);
    Route::resource('/roomtype',RoomTypeController::class);
    Route::resource('/room',RoomController::class);
    Route::resource('/booking',BookingController::class);
    Route::resource('/payment',PaymentController::class);
    Route::get('/logout', [AdminController::class, 'perform'])->name('logout.perform');
    Route::get('/book/arooms/{checkin_date}',[BookingController::class, 'arooms'])->name('booking.arooms'); 

});
