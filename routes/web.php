<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ClubController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\BookingsController;

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

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'auth'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
});


// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function(){
    Route::get('/all/movie', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All club routes
    Route::controller(ClubController::class)->group(function(){
        Route::get('/all/club', 'AllClub')->name('all.club');
        Route::get('/add/club', 'AddClub')->name('add.club');
        Route::post('/club/store', 'StoreClub')->name('club.store');
        Route::get('/edit/club/{id}', 'EditClub')->name('edit.club');
        Route::post('/club/update/{id}', 'UpdateClub')->name('club.update');
        Route::get('/club/delete/{id}', 'DeleteClub')->name('club.delete');
     });
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All Movie routes
    Route::controller(MovieController::class)->group(function(){
        Route::get('/all/movie', 'AllMovie')->name('all.movie');
        Route::get('/add/movie', 'AddMovie')->name('add.movie');
        Route::post('/movie/store', 'StoreMovie')->name('movie.store');
        Route::get('/edit/movie/{id}', 'EditMovie')->name('edit.movie');
        Route::post('/movie/update/{id}', 'UpdateMovie')->name('movie.update');
        Route::get('/movie/delete/{id}', 'DeleteMovie')->name('movie.delete');

     });
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All user routes
    Route::controller(UsersController::class)->group(function(){
        Route::get('/all/user/', 'AllUser')->name('all.user');
        Route::get('/add/user', 'AddUser')->name('add.user');
        Route::post('/user/store', 'StoreUser')->name('user.store');
        Route::get('/edit/update/{id}', 'EditUser')->name('edit.user');
        Route::post('/user/update/{id}', 'UpdateUser')->name('user.update');
        Route::get('/user/delete/{id}', 'DeleteUser')->name('user.delete');
     });
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All bookings routes
    Route::controller(BookingsController::class)->group(function(){
        Route::get('/all/booking/', 'AllBooking')->name('all.booking');
        Route::get('/booking/delete/{id}', 'DeleteBooking')->name('booking.delete');
     });
});

Route::get('/payment-gateway', [PaymentController::class, 'showGateway'])->name('payment.gateway');
// Route for the payment gateway page
Route::get('/payment-gateway', function () {
    return view('payment_gateway');
})->name('payment.gateway');

