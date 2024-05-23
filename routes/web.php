<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\UsersController;


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

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');


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

    Route::get('/task/{task}/book/{date}/{showtime}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/task/{task}/book/{date}/{showtime}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
});


// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function(){
    Route::get('/all/task', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All Service routes
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/all/service', 'AllService')->name('all.service');
        Route::get('/add/service', 'AddService')->name('add.service');
        Route::post('/service/store', 'StoreService')->name('service.store');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
        Route::post('/service/update/{id}', 'UpdateService')->name('service.update');
        Route::get('/service/delete/{id}', 'DeleteService')->name('service.delete');
     });
});

Route::middleware(['auth', 'roles:admin'])->group(function(){
    // All task routes
    Route::controller(TaskController::class)->group(function(){
        Route::get('/all/task', 'AllTask')->name('all.task');
        Route::get('/add/task', 'AddTask')->name('add.task');
        Route::post('/task/store', 'StoreTask')->name('task.store');
        Route::get('/edit/task/{id}', 'EditTask')->name('edit.task');
        Route::post('/task/update/{id}', 'UpdateTask')->name('task.update');
        Route::get('/task/delete/{id}', 'DeleteTask')->name('task.delete');
        Route::get('/get-user/{id}', [UserController::class, 'getUserById']);


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

Route::get('/get-user/{id}', [UserController::class, 'getUserById']);

