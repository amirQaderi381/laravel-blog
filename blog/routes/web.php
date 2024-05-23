<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function (){
    Route::get('/' , [\App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('admin.home');

    Route::prefix('slider')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\SliderController::class , 'index'])->name('admin.slider.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\SliderController::class , 'create'])->name('admin.slider.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\SliderController::class , 'store'])->name('admin.slider.store');
        Route::get('/edit/{slider}' , [\App\Http\Controllers\Admin\SliderController::class , 'edit'])->name('admin.slider.edit');
        Route::put('/update/{slider}' , [\App\Http\Controllers\Admin\SliderController::class , 'update'])->name('admin.slider.update');
        Route::delete('/destroy/{slider}' , [\App\Http\Controllers\Admin\SliderController::class , 'destroy'])->name('admin.slider.destroy');
        Route::get('/status/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'status'])->name('admin.slider.status');
    });

    Route::prefix('service')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\ServiceController::class , 'index'])->name('admin.service.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\ServiceController::class , 'create'])->name('admin.service.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\ServiceController::class , 'store'])->name('admin.service.store');
        Route::get('/edit/{service}' , [\App\Http\Controllers\Admin\ServiceController::class , 'edit'])->name('admin.service.edit');
        Route::put('/update/{service}' , [\App\Http\Controllers\Admin\ServiceController::class , 'update'])->name('admin.service.update');
        Route::delete('/destroy/{service}' , [\App\Http\Controllers\Admin\ServiceController::class , 'destroy'])->name('admin.service.destroy');
        Route::get('/status/{service}', [\App\Http\Controllers\Admin\ServiceController::class, 'status'])->name('admin.service.status');
    });

    Route::prefix('collaborator')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'index'])->name('admin.collaborator.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'create'])->name('admin.collaborator.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'store'])->name('admin.collaborator.store');
        Route::get('/edit/{collaborator}' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'edit'])->name('admin.collaborator.edit');
        Route::put('/update/{collaborator}' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'update'])->name('admin.collaborator.update');
        Route::delete('/destroy/{collaborator}' , [\App\Http\Controllers\Admin\CollaboratorController::class , 'destroy'])->name('admin.collaborator.destroy');
        Route::get('/status/{collaborator}', [\App\Http\Controllers\Admin\CollaboratorController::class, 'status'])->name('admin.collaborator.status');
    });

    Route::prefix('certificate')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\CertificateController::class , 'index'])->name('admin.certificate.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\CertificateController::class , 'create'])->name('admin.certificate.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\CertificateController::class , 'store'])->name('admin.certificate.store');
        Route::get('/edit/{certificate}' , [\App\Http\Controllers\Admin\CertificateController::class , 'edit'])->name('admin.certificate.edit');
        Route::put('/update/{certificate}' , [\App\Http\Controllers\Admin\CertificateController::class , 'update'])->name('admin.certificate.update');
        Route::delete('/destroy/{certificate}' , [\App\Http\Controllers\Admin\CertificateController::class , 'destroy'])->name('admin.certificate.destroy');
        Route::get('/status/{certificate}', [\App\Http\Controllers\Admin\CertificateController::class, 'status'])->name('admin.certificate.status');
    });

    Route::prefix('user')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\UserController::class , 'index'])->name('admin.user.admin-user.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\UserController::class , 'create'])->name('admin.user.admin-user.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\UserController::class , 'store'])->name('admin.user.admin-user.store');
        Route::get('/edit/{user}' , [\App\Http\Controllers\Admin\UserController::class , 'edit'])->name('admin.user.admin-user.edit');
        Route::put('/update/{user}' , [\App\Http\Controllers\Admin\UserController::class , 'update'])->name('admin.user.admin-user.update');
        Route::delete('/destroy/{user}' , [\App\Http\Controllers\Admin\UserController::class , 'destroy'])->name('admin.user.admin-user.destroy');
        Route::get('/status/{user}', [\App\Http\Controllers\Admin\UserController::class, 'status'])->name('admin.user.admin-user.status');
    });

    Route::prefix('address')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\AddressController::class , 'index'])->name('admin.address.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\AddressController::class , 'create'])->name('admin.address.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\AddressController::class , 'store'])->name('admin.address.store');
        Route::get('/edit/{address}' , [\App\Http\Controllers\Admin\AddressController::class , 'edit'])->name('admin.address.edit');
        Route::put('/update/{address}' , [\App\Http\Controllers\Admin\AddressController::class , 'update'])->name('admin.address.update');
        Route::delete('/destroy/{address}' , [\App\Http\Controllers\Admin\AddressController::class , 'destroy'])->name('admin.address.destroy');
        Route::get('/status/{address}', [\App\Http\Controllers\Admin\AddressController::class, 'status'])->name('admin.address.status');
    });

    Route::prefix('quick-links')->group(function(){
        Route::get('/' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'index'])->name('admin.quickLink.index');
        Route::get('/create' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'create'])->name('admin.quickLink.create');
        Route::post('/store' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'store'])->name('admin.quickLink.store');
        Route::get('/edit/{quickLink}' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'edit'])->name('admin.quickLink.edit');
        Route::put('/update/{quickLink}' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'update'])->name('admin.quickLink.update');
        Route::delete('/destroy/{quickLink}' , [\App\Http\Controllers\Admin\QuickLinkController::class , 'destroy'])->name('admin.quickLink.destroy');
        Route::get('/status/{quickLink}', [\App\Http\Controllers\Admin\QuickLinkController::class, 'status'])->name('admin.quickLink.status');
    });

});

Route::get('/' , [\App\Http\Controllers\HomeController::class , 'index']);

Route::prefix('contact')->group(function(){
    Route::get('/' , [\App\Http\Controllers\ContactController::class , 'index'])->name('contact.index');
    Route::post('/store' , [\App\Http\Controllers\ContactController::class , 'store'])->name('contact.store');
});

require __DIR__.'/auth.php';
