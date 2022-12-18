<?php

use App\Mail\SpeedControlEmail;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Home\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Livewire\Home\DeviceManagement\DeviceData;
use App\Http\Livewire\Home\DeviceManagement\UserDevice;
use App\Http\Livewire\Home\AccountManagement\UserManagement;
use App\Http\Livewire\Home\AccountManagement\AdminManagement;
use App\Http\Livewire\Home\DeviceManagement\DeviceManagement;
use App\Http\Livewire\Home\AccountManagement\OperatorManagement;

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


Route::middleware(['checkstatus'])->group(function () {
    Route::get('/', function (){ return redirect()->route('home'); });
    Route::get('/dashboard', Dashboard::class)->name("home");
    Route::get('/account/admin-management', AdminManagement::class);
    Route::get('/account/operator-management', OperatorManagement::class);
    Route::get('/account/user-management', UserManagement::class);
    Route::get('/device/device-management', DeviceManagement::class);
    Route::get('/device/data-management', DeviceData::class);
    Route::get('/device/usedev-management', UserDevice::class);

});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name("login");
    Route::get('/register', Register::class)->name("register");
});

Route::get('/account/validate/{token}', [EmailController::class, 'index']);
