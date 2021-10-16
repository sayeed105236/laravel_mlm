<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;

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
//    return view('welcome');
//});
Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('/home/dashboard/{id}', [UserDashboardController::class,'index'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard/', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.pages.index');
})->name('admin.pages.dashboard');

//Admin add package Routes
Route::get('/admin/package', [PackageController::class,'index'])->name('package-manage')->middleware('authadmin');
Route::post('/admin/package/store', [PackageController::class,'StorePackage'])->name('package-store')->middleware('authadmin');
Route::post('/admin/package/update', [PackageController::class,'UpdatePackage'])->name('package-update')->middleware('authadmin');
Route::get('/admin/package/delete/{id}', [PackageController::class,'Delete'])->middleware('authadmin');

//admin show payment request routes
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('authadmin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('authadmin');
Route::get('/admin/add-money-delete/{id}', [AdminShowPaymentController::class,'destroy'])->middleware('authadmin');

//user Add Money Routes
Route::post('/user/dashboard/add-money', [AddMoneyController::class,'Store'])->name('money-store')->middleware('auth');
