<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\AdditionController;
use App\Http\Controllers\RevalidationController;
use App\Http\Controllers\AmendmentController;
use App\Http\Controllers\PctHeadingController;
use App\Http\Controllers\PctSubHeadingController;
use App\Http\Controllers\OEMProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ManufacturingDetailsController;
use App\Http\Controllers\SRO693Controller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\RegisterOEMController;



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

Route::get('/', function () {
    return redirect()->action([HomeController::class, 'index']);
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('sro693', SRO693Controller::class);
Route::post('/sro693/upload', [SRO693Controller::class, 'upload'])->name('sro693.upload');
Route::resource('pct_headings', PctHeadingController::class);
Route::post('/pct_headings/upload', [PctHeadingController::class, 'upload'])->name('pct_headings.upload');
Route::resource('pct_sub_headings', PctSubHeadingController::class);
Route::post('/pct_sub_headings/upload', [PctSubHeadingController::class, 'upload'])->name('pct_sub_headings.upload');
Route::resource('role', RoleController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:oem'])->group(function () {
Route::get('/oem/home', [HomeController::class, 'oemHome'])->name('oem.home');
Route::get('/issuances', [IssuanceController::class, 'application'])->name('issuance.application');
Route::get('/additions', [AdditionController::class, 'application'])->name('addition.application');
Route::get('/amendments', [AmendmentController::class, 'application'])->name('amendment.application');
Route::get('/revalidations', [RevalidationController::class, 'application'])->name('revalidation.application');
Route::post('/issuances', [IssuanceController::class, 'store'])->name('issuances.store');
Route::get('/download_one', [DownloadController::class,'format_one_download'])->name('download.format_one_download');
Route::get('/download_two', [DownloadController::class,'format_two_download'])->name('download.format_two_download');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:edb'])->group(function () {
Route::get('/edb/home', [HomeController::class, 'edbHome'])->name('edb.home');
Route::resource('issuance', IssuanceController::class);
Route::get('/addition', [AdditionController::class, 'index'])->name('addition.index');
Route::get('/amendment', [AmendmentController::class, 'index'])->name('amendment.index');
Route::get('/revalidation', [RevalidationController::class, 'index'])->name('revalidation.index');
});


Route::resource('users', UsersController::class);

//OEM Profile
Route::resource('oem_profile', OEMProfileController::class);

//Manufacturing Details
Route::resource('manufacturing_details', ManufacturingDetailsController::class);


//Manufacturing Details
Route::resource('manufacturer_registration', RegisterOEMController::class);
