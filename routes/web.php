<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\SiteController as UserSiteController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\SliderController as UserSliderController;
use App\Http\Controllers\User\PatientController as UserPatientController;
use App\Http\Controllers\User\ServiceController as UserServiceController;
use App\Http\Controllers\User\SettingController as UserSettingController;
use App\Http\Controllers\User\AppointmentController as UserAppointmentController;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/get-cities', [LocationController::class, 'getCitiesByCountry'])->name('get.cities');


//admin routes
Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],function () {

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::put('category-status/{id}', [CategoryController::class,'changeStatus'])->name('category.status');
    Route::resource('country', CountryController::class);
    Route::put('country-status/{id}', [CountryController::class,'changeStatus'])->name('country.status');
    Route::resource('city', CityController::class);
    Route::put('city-status/{id}', [CityController::class,'changeStatus'])->name('city.status');
    Route::resource('center', CenterController::class);
    Route::put('center-status/{id}', [CenterController::class,'changeStatus'])->name('center.status');
    Route::get('/message',[MessageController::class,'index'])->name('message.index');
    Route::delete('/message/{id}',[MessageController::class,'destroy'])->name('message.destroy');

});


//user routes
Route::group(['as'=> 'user.', 'middleware' => ['auth', 'role:user']],function () {

    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');

    Route::get('general-setting',[UserSettingController::class,'index'])->name('general-setting');
    Route::put('update-general-setting',[UserSettingController::class,'updateGeneralSetting'])->name('update-general-setting');

    Route::get('site-setting',[UserSiteController::class,'index'])->name('site-setting');
    Route::put('update-site-setting',[UserSiteController::class,'updateSiteSetting'])->name('update-site-setting');

     // patient
     Route::resource('patient', UserPatientController::class);

     // service
    Route::resource('service', UserServiceController::class);
    Route::put('service-status/{id}', [UserServiceController::class,'changeStatus'])->name('service.status');

    // slider
    Route::resource('slider', UserSliderController::class);

    // Order
    Route::resource('order', UserOrderController::class,['only' => ['index', 'edit', 'update']]);

    Route::resource('appointment', UserAppointmentController::class);
    Route::get('calendar',[UserAppointmentController::class,'calendar'])->name('calendar');
    Route::get('calendar-appointments',[UserAppointmentController::class,'calendar_appointments'])->name('calendar-appointments');

});

Route::get('/', [FrontController::class, 'home'])->name('site.show');
Route::get('/centers', [FrontController::class, 'centers'])->name('site.centers');
Route::get('/center/{ID}', [FrontController::class, 'center'])->name('site.center');
Route::post('/order', [FrontController::class, 'order'])->name('site.order');
Route::post('/contact', [FrontController::class, 'storem'])->name('contact.store');
Route::get('/get-cities/{countryId}', [FrontController::class, 'getCities']);
