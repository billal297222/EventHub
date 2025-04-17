<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', [EventController::class, 'index']);
// Route::get('/event/{id}', [EventController::class, 'show']);
// Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
// // Route::post('/login', [AuthController::class, 'authenticate']);
// Route::get('/auth/register', [AuthController::class, 'register']);
// // Route::post('/register', [AuthController::class, 'store']);
// Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');



// Route::get('/', [EventController::class, 'index']);
// Route::get('/event/{id}', [EventController::class, 'show']);
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticate']);
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'store']);
// Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [EventController::class, 'index']);
Route::get('/event/{id}', [EventController::class, 'show']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
// Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('events.store');
// Show all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
//order
// This should be added to your existing routes in `web.php`
Route::get('/event/{id}/order', [EventController::class, 'order'])->name('events.order');
Route::post('/event/{id}/order', [EventController::class, 'storeOrder'])->name('events.storeOrder');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/event/{id}/payment-confirmation', [EventController::class, 'paymentConfirmation'])->name('events.paymentConfirmation');



// Show event creation form
//Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

// Store new event
Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('events.store');



// Admin Routes
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/events/{id}/approve', [AdminController::class, 'approve']);
    Route::post('/admin/events/{id}/reject', [AdminController::class, 'reject']);
    Route::delete('/admin/events/{id}', [AdminController::class, 'destroy']);
});



