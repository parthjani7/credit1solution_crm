<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/step1', [SignupController::class, 'getRegister']);
Route::post('/step1', [SignupController::class, 'postRegisterStep1']);

Route::post('/step2', [SignupController::class, 'postSteptwo']);
Route::get('/step2', [SignupController::class, 'step2']);

Route::get('/step3', [SignupController::class, 'getRegisterStep3']);
Route::post('/step3', [SignupController::class, 'postRegisterStep3']);

Route::get("/final", [SignupController::class, 'getFinal']);
Route::get('/thank_you', [SignupController::class, 'thank_you']);

Auth::routes([
    'login'    => false,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::middleware(['auth:admin'])->as('admin.')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/profile', ProfileController::class)->name('profile');

    Route::get('/agreements', AgreementController::class)->name('agreements');

    Route::get('/options', [CrmController::class, 'options'])->name('options');
});

Route::post('signup/payment', array(
    'as' => 'payment',
    'uses' => [SignupController::class, 'postPayment'],
));

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => [SignupController::class, 'getPaymentStatus'],
));

Route::get("/clearsession", function () {
    if (session()->has('register_steps'))
        session()->pull('register_steps');
    if (session()->has("current_step"))
        session()->pull("current_step");
});
