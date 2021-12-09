<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\BasicSettingsController;

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
Route::get('/', [FrontendController::class,'index'])->name('home')->middleware('auth');
Route::get('/tree', [FrontendController::class,'tree']);
Route::get('/flipcard', [FrontendController::class,'flipcard']);
Route::get('/home/registration-history/{id}', [UserDashboardController::class,'Manage'])->name('registration-history')->middleware('auth');
Route::get('/home/sponsor_bonus_history/{id}', [UserDashboardController::class,'sponsor_bonus'])->name('sponsor-bonus-history')->middleware('auth');
Route::get('/home/daily_revenue_history/{id}', [UserDashboardController::class,'daily_bonus'])->name('daily-bonus-history')->middleware('auth');
Route::get('/home/royality_bonus_history/{id}', [UserDashboardController::class,'royality_bonus'])->name('royality_bonus_history')->middleware('auth');
Route::get('/home/level_bonus_history/{id}', [UserDashboardController::class,'level_bonus'])->name('level_bonus_history')->middleware('auth');
Route::get('/home/pair_bonus_history/{id}', [UserDashboardController::class,'pair_bonus'])->name('pair_bonus_history')->middleware('auth');
Route::get('/home/team_bonus_history/{id}', [UserDashboardController::class,'team_bonus'])->name('team_bonus_history')->middleware('auth');
Route::get('/home/club_bonus_history/{id}', [UserDashboardController::class,'club_bonus'])->name('club_bonus_history')->middleware('auth');
Route::get('/home/withdraw_history/{id}', [UserDashboardController::class,'withdraw_history'])->name('withdraw_history')->middleware('auth');
Route::get('/home/transfer_history/{id}', [UserDashboardController::class,'transfer_history'])->name('transfer_history')->middleware('auth');
Route::get('/home/dashboard/{id}', [UserDashboardController::class,'index'])->name('user-dashboard')->middleware('auth');
Route::get('/home/registration/{id}', [UserDashboardController::class,'registration'])->name('registration-page')->middleware('auth');


//user refferals routes
Route::get('/home/referrals/{id}', [ReferralController::class,'index'])->name('referrals')->middleware('auth');
Route::post('/home/referrals-user', [ReferralController::class,'userAdd'])->name('referrals-useradd')->middleware('auth');
Route::post('/home/check-position', [ReferralController::class,'checkPosition'])->name('referrals-checkposition');
Route::get('/home/my-team/{id}', [ReferralController::class,'MyTeam'])->name('my-team')->middleware('auth');
//Route::get('/home/my-team/{id}/', [ReferralController::class,'MyTeam'])->name('my-team')->middleware('auth');
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

//General Settings
Route::get('/admin/general-settings', [GeneralSettingsController::class,'index'])->name('manage-gsettings')->middleware('authadmin');
Route::post('/admin/general-settings/store', [GeneralSettingsController::class,'Store'])->name('general-settings-store')->middleware('authadmin');
Route::post('/admin/general-settings/update', [GeneralSettingsController::class,'Update'])->name('general-settings-update')->middleware('authadmin');
Route::get('/admin/general-settings/delete/{id}', [GeneralSettingsController::class,'Delete'])->middleware('authadmin');

//Basic settings
Route::get('/admin/basic-settings', [BasicSettingsController::class,'index'])->name('manage-bsettings')->middleware('authadmin');
Route::post('/admin/basic-settings/store', [BasicSettingsController::class,'Store'])->name('basic-settings-store')->middleware('authadmin');
Route::post('/admin/basic-settings/update', [BasicSettingsController::class,'Update'])->name('basic-settings-update')->middleware('authadmin');
Route::get('/admin/basic-settings/delete/{id}', [BasicSettingsController::class,'Delete'])->middleware('authadmin');


//admin show payment request routes
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('authadmin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('authadmin');
Route::get('/admin/add-money-delete/{id}', [AdminShowPaymentController::class,'destroy'])->middleware('authadmin');

//user list routes
Route::get('/admin/user_lists', [UserListController::class,'Manage'])->name('user-list')->middleware('authadmin');
//user Add Money Routes
Route::post('/user/dashboard/add-money', [AddMoneyController::class,'Store'])->name('money-store')->middleware('auth');
Route::post('/user/dashboard/transfer-money', [AddMoneyController::class,'moneyTransfer'])->name('money-transfer')->middleware('auth');
Route::post('/user/dashboard/wallet-transfer', [AddMoneyController::class,'walletTransfer'])->name('wallet-transfer')->middleware('auth');
Route::post('/user/dashboard/wallet-withdraw', [AddMoneyController::class,'walletWithdraw'])->name('wallet-withdraw')->middleware('auth');

//Payment method Routes
Route::get('/admin/payment-method', [PaymentMethodController::class,'index'])->name('payment-method')->middleware('authadmin');
Route::post('/admin/payment-method/store', [PaymentMethodController::class,'Store'])->name('payment-method-store')->middleware('authadmin');
Route::get('/admin/payment-method/delete/{id}', [PaymentMethodController::class,'Delete'])->middleware('authadmin');
Route::post('/admin/payment-method/update', [PaymentMethodController::class,'Update'])->name('payment-method-update')->middleware('authadmin');

//Report
Route::get('/user/income-report', [ReportController::class,'incomeReport'])->name('income-report')->middleware('auth');
Route::get('/user/transfer-report', [ReportController::class,'transferReport'])->name('transfer-report')->middleware('auth');
