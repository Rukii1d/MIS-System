<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RedahrmController;
use App\Http\Controllers\RedaauditmgtController;
use App\Http\Controllers\RedatourismdevController;
use App\Http\Controllers\RedaeconomydevController;
use App\Http\Controllers\RedaenterpricseController;
use App\Http\Controllers\RedahotelschoolController;
use App\Http\Controllers\RedaitcenterController;
use App\Http\Controllers\RedalanguagecenterController;
use App\Http\Controllers\RedamanpowernvqController;
use App\Http\Controllers\RedasecurityserviceController;
use App\Http\Controllers\RedacleaningserviceController;
use App\Http\Controllers\RedaskilledmanpowerController;
use App\Http\Controllers\RedasecurityservicemembersController;
use App\Http\Controllers\RedaaccountsController;
use App\Http\Controllers\RedaprocumentController;
use App\Http\Controllers\RedastoresandassetController;
use App\Http\Controllers\RedasalaryController;
use App\Http\Controllers\CenterAccessController;
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


//Admin Routes
Route::get("/admin", [Admincontroller::class,'index']);
Route::get("/adminProfile", [Admincontroller::class,'profile']);
Route::get("/misUsers", [Admincontroller::class,'users']);
Route::get("/changeUserStatus/{status}/{id}", [Admincontroller::class,'changeUserStatus']);


//user dash
Route::get('/reda', [UserDashboardController::class, 'reda'])->middleware('auth');
Route::get('/redaacademy', [UserDashboardController::class, 'redaacademy']);
Route::get('/redamanpower', [UserDashboardController::class, 'redamanpower']);
Route::get('/redaenterprise', [UserDashboardController::class, 'redaenterprise']);
Route::get('/redaestablishment', [UserDashboardController::class, 'redaestablishment']);
Route::get('/finance', [UserDashboardController::class, 'redafinance']);








//User Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



route::get('/', action: [TemplateController::class,'index']);
Route::get('/register', [ProfileController::class,'register']);
Route::get('/login', [ProfileController::class,'login']);
Route::get('/logout', [ProfileController::class,'logout']);
Route::post('/registerUser', [ProfileController::class,'registerUser']);
Route::post('/loginUser', [ProfileController::class,'loginUser']);
Route::get('/logout', [ProfileController::class,'logout']);
Route::get( '/profile', [ProfileController::class,'profile']);
Route::post('/updateUser', [ProfileController::class,'updateUser']);
Route::get( '/reda', [ProfileController::class,'reda']);
Route::get( '/mis', [ProfileController::class,'mis']);



//reda HRM
Route::get('/redahrm', [RedahrmController::class, 'index'])->name('redahrm.index');
Route::get('/redahrm/create', [RedahrmController::class, 'create'])->name('redahrm.create');
Route::post('/redahrm', [RedahrmController::class, 'store'])->name('redahrm.store');
Route::get('/redahrm/{id}/edit', [RedahrmController::class, 'edit'])->name('redahrm.edit');
Route::put('/redahrm/{id}', [RedahrmController::class, 'update'])->name('redahrm.update');
Route::delete('/redahrm/{id}', [RedahrmController::class, 'destroy'])->name('redahrm.destroy');

//reda AUDITMGT

Route::get('/auditmgt', [RedaauditmgtController::class, 'index'])->name('auditmgt.index');
Route::get('/auditmgt/create', [RedaauditmgtController::class, 'create'])->name('auditmgt.create');
Route::post('/auditmgt', [RedaauditmgtController::class, 'store'])->name('auditmgt.store');
Route::get('/auditmgt/{id}/edit', [RedaauditmgtController::class, 'edit'])->name('auditmgt.edit');
Route::put('/auditmgt/{id}', [RedaauditmgtController::class, 'update'])->name('auditmgt.update');
Route::delete('/auditmgt/{id}', [RedaauditmgtController::class, 'destroy'])->name('auditmgt.destroy');

//reda Tourism

Route::get('/tourismdev', [RedatourismdevController::class, 'index'])->name('tourismdev.index');
Route::get('/tourismdev/create', [RedatourismdevController::class, 'create'])->name('tourismdev.create');
Route::post('/tourismdev', [RedatourismdevController::class, 'store'])->name('tourismdev.store');
Route::get('/tourismdev/{id}/edit', [RedatourismdevController::class, 'edit'])->name('tourismdev.edit');
Route::put('/tourismdev/{id}', [RedatourismdevController::class, 'update'])->name('tourismdev.update');
Route::delete('/tourismdev/{id}', [RedatourismdevController::class, 'destroy'])->name('tourismdev.destroy');



//reda Economy

Route::get('/econdev', [RedaeconomydevController::class, 'index'])->name('econdev.index');
Route::get('/econdev/create', [RedaeconomydevController::class, 'create'])->name('econdev.create');
Route::post('/econdev', [RedaeconomydevController::class, 'store'])->name('econdev.store');
Route::get('/econdev/{id}/edit', [RedaeconomydevController::class, 'edit'])->name('econdev.edit');
Route::put('/econdev/{id}', [RedaeconomydevController::class, 'update'])->name('econdev.update');
Route::delete('/econdev/{id}', [RedaeconomydevController::class, 'destroy'])->name('econdev.destroy');



// REDA Enterprise Routes
Route::get('/enterprise', [RedaenterpricseController::class, 'index'])->name('enterprise.index');
Route::get('/enterprise/create', [RedaenterpricseController::class, 'create'])->name('enterprise.create');
Route::post('/enterprise', [RedaenterpricseController::class, 'store'])->name('enterprise.store');
Route::get('/enterprise/{id}/edit', [RedaenterpricseController::class, 'edit'])->name('enterprise.edit');
Route::put('/enterprise/{id}', [RedaenterpricseController::class, 'update'])->name('enterprise.update');
Route::delete('/enterprise/{id}', [RedaenterpricseController::class, 'destroy'])->name('enterprise.destroy');




// REDA Hotel School Routes
Route::get('/hotelschool', [RedahotelschoolController::class, 'index'])->name('redahotelschool.index');
Route::get('/hotelschool/create', [RedahotelschoolController::class, 'create'])->name('redahotelschool.create');
Route::post('/hotelschool', [RedahotelschoolController::class, 'store'])->name('redahotelschool.store');
Route::get('/hotelschool/{id}/edit', [RedahotelschoolController::class, 'edit'])->name('redahotelschool.edit');
Route::put('/hotelschool/{id}', [RedahotelschoolController::class, 'update'])->name('redahotelschool.update');
Route::delete('/hotelschool/{id}', [RedahotelschoolController::class, 'destroy'])->name('redahotelschool.destroy');

// REDA IT Center Routes
Route::get('/redaitcenter', [RedaitcenterController::class, 'index'])->name('redaitcenter.index');
Route::get('/redaitcenter/create', [RedaitcenterController::class, 'create'])->name('redaitcenter.create');
Route::post('/redaitcenter', [RedaitcenterController::class, 'store'])->name('redaitcenter.store');
Route::get('/redaitcenter/{id}/edit', [RedaitcenterController::class, 'edit'])->name('redaitcenter.edit');
Route::put('/redaitcenter/{id}', [RedaitcenterController::class, 'update'])->name('redaitcenter.update');
Route::delete('/redaitcenter/{id}', [RedaitcenterController::class, 'destroy'])->name('redaitcenter.destroy');


//REDA language center

Route::get('/redalanguagecenter', [RedalanguagecenterController::class, 'index'])->name('redalanguagecenter.index');
Route::get('/redalanguagecenter/create', [RedalanguagecenterController::class, 'create'])->name('redalanguagecenter.create');
Route::post('/redalanguagecenter', [RedalanguagecenterController::class, 'store'])->name('redalanguagecenter.store');
Route::get('/redalanguagecenter/{id}/edit', [RedalanguagecenterController::class, 'edit'])->name('redalanguagecenter.edit');
Route::put('/redalanguagecenter/{id}', [RedalanguagecenterController::class, 'update'])->name('redalanguagecenter.update');
Route::delete('/redalanguagecenter/{id}', [RedalanguagecenterController::class, 'destroy'])->name('redalanguagecenter.destroy');


//REDA manpower nvq

Route::get('/redamanpowernvq', [RedamanpowernvqController::class, 'index'])->name('redamanpowernvq.index');
Route::get('/redamanpowernvq/create', [RedamanpowernvqController::class, 'create'])->name('redamanpowernvq.create');
Route::post('/redamanpowernvq', [RedamanpowernvqController::class, 'store'])->name('redamanpowernvq.store');
Route::get('/redamanpowernvq/{id}/edit', [RedamanpowernvqController::class, 'edit'])->name('redamanpowernvq.edit');
Route::put('/redamanpowernvq/{id}', [RedamanpowernvqController::class, 'update'])->name('redamanpowernvq.update');
Route::delete('/redamanpowernvq/{id}', [RedamanpowernvqController::class, 'destroy'])->name('redamanpowernvq.destroy');
Route::resource('redamanpowernvq', RedamanpowernvqController::class);


//reda security service
Route::get('/redasecurityservice', [RedasecurityserviceController::class, 'index'])->name('redasecurityservice.index');
Route::get('/redasecurityservice/create', [RedasecurityserviceController::class, 'create'])->name('redasecurityservice.create');
Route::post('/redasecurityservice', [RedasecurityserviceController::class, 'store'])->name('redasecurityservice.store');
Route::get('/redasecurityservice/{id}/edit', [RedasecurityserviceController::class, 'edit'])->name('redasecurityservice.edit');
Route::put('/redasecurityservice/{id}', [RedasecurityserviceController::class, 'update'])->name('redasecurityservice.update');
Route::delete('/redasecurityservice/{id}', [RedasecurityserviceController::class, 'destroy'])->name('redasecurityservice.destroy');


//security members

Route::get('/redasecurityservicemembers', [RedasecurityservicemembersController::class, 'index'])->name('redasecurityservicemembers.index');
Route::get('/redasecurityservicemembers/create', [RedasecurityservicemembersController::class, 'create'])->name('redasecurityservicemembers.create');
Route::post('/redasecurityservicemembers', [RedasecurityservicemembersController::class, 'store'])->name('redasecurityservicemembers.store');
Route::get('/redasecurityservicemembers/{id}/edit', [RedasecurityservicemembersController::class, 'edit'])->name('redasecurityservicemembers.edit');
Route::put('/redasecurityservicemembers/{id}', [RedasecurityservicemembersController::class, 'update'])->name('redasecurityservicemembers.update');
Route::delete('/redasecurityservicemembers/{id}', [RedasecurityservicemembersController::class, 'destroy'])->name('redasecurityservicemembers.destroy');




//reda cleaning service

Route::get('/redacleaningservice', [RedacleaningserviceController::class, 'index'])->name('redacleaningservice.index');
Route::get('/redacleaningservice/create', [RedacleaningserviceController::class, 'create'])->name('redacleaningservice.create');
Route::post('/redacleaningservice', [RedacleaningserviceController::class, 'store'])->name('redacleaningservice.store');
Route::get('/redacleaningservice/{id}/edit', [RedacleaningserviceController::class, 'edit'])->name('redacleaningservice.edit');
Route::put('/redacleaningservice/{id}', [RedacleaningserviceController::class, 'update'])->name('redacleaningservice.update');
Route::delete('/redacleaningservice/{id}', [RedacleaningserviceController::class, 'destroy'])->name('redacleaningservice.destroy');


//reda skilled manpower

Route::get('/redaskilledmanpower', [RedaskilledmanpowerController::class, 'index'])->name('redaskilledmanpower.index');
Route::get('/redaskilledmanpower/create', [RedaskilledmanpowerController::class, 'create'])->name('redaskilledmanpower.create');
Route::post('/redaskilledmanpower', [RedaskilledmanpowerController::class, 'store'])->name('redaskilledmanpower.store');
Route::get('/redaskilledmanpower/{id}/edit', [RedaskilledmanpowerController::class, 'edit'])->name('redaskilledmanpower.edit');
Route::put('/redaskilledmanpower/{id}', [RedaskilledmanpowerController::class, 'update'])->name('redaskilledmanpower.update');
Route::delete('/redaskilledmanpower/{id}', [RedaskilledmanpowerController::class, 'destroy'])->name('redaskilledmanpower.destroy');


//reda accounts

Route::get('/redaaccounts', [RedaaccountsController::class, 'index'])->name('redaaccounts.index');
Route::get('/redaaccounts/create', [RedaaccountsController::class, 'create'])->name('redaaccounts.create');
Route::post('/redaaccounts', [RedaaccountsController::class, 'store'])->name('redaaccounts.store');
Route::get('/redaaccounts/{id}/edit', [RedaaccountsController::class, 'edit'])->name('redaaccounts.edit');
Route::put('/redaaccounts/{id}', [RedaaccountsController::class, 'update'])->name('redaaccounts.update');
Route::delete('/redaaccounts/{id}', [RedaaccountsController::class, 'destroy'])->name('redaaccounts.destroy');


// reda stores

Route::get('/redastoresandasset', [RedastoresandassetController::class, 'index'])->name('redastoresandasset.index');
Route::get('/redastoresandasset/create', [RedastoresandassetController::class, 'create'])->name('redastoresandasset.create');
Route::post('/redastoresandasset', [RedastoresandassetController::class, 'store'])->name('redastoresandasset.store');
Route::get('/redastoresandasset/{id}/edit', [RedastoresandassetController::class, 'edit'])->name('redastoresandasset.edit');
Route::put('/redastoresandasset/{id}', [RedastoresandassetController::class, 'update'])->name('redastoresandasset.update');
Route::delete('/redastoresandasset/{id}', [RedastoresandassetController::class, 'destroy'])->name('redastoresandasset.destroy');


//reda salary
Route::get('/redasalary', [RedasalaryController::class, 'index'])->name('redasalary.index');
Route::get('/redasalary/create', [RedasalaryController::class, 'create'])->name('redasalary.create');
Route::post('/redasalary', [RedasalaryController::class, 'store'])->name('redasalary.store');
Route::get('/redasalary/{id}/edit', [RedasalaryController::class, 'edit'])->name('redasalary.edit');
Route::put('/redasalary/{id}', [RedasalaryController::class, 'update'])->name('redasalary.update');
Route::delete('/redasalary/{id}', [RedasalaryController::class, 'destroy'])->name('redasalary.destroy');



// reda procuments
Route::get('/redaprocuments', [RedaprocumentController::class, 'index'])->name('redaprocuments.index');
Route::get('/redaprocuments/create', [RedaprocumentController::class, 'create'])->name('redaprocuments.create');
Route::post('/redaprocuments', [RedaprocumentController::class, 'store'])->name('redaprocuments.store');
Route::get('/redaprocuments/{id}/edit', [RedaprocumentController::class, 'edit'])->name('redaprocuments.edit');
Route::put('/redaprocuments/{id}', [RedaprocumentController::class, 'update'])->name('redaprocuments.update');
Route::delete('/redaprocuments/{id}', [RedaprocumentController::class, 'destroy'])->name('redaprocuments.destroy');


Route::prefix('admin')->name('admin.')->group(function () {

    // REDA HRM
    Route::get('/redahrm', [RedahrmController::class, 'index'])->name('redahrm.index');
    Route::get('/redahrm/create', [RedahrmController::class, 'create'])->name('redahrm.create');
    Route::post('/redahrm', [RedahrmController::class, 'store'])->name('redahrm.store');
    Route::get('/redahrm/{id}/edit', [RedahrmController::class, 'edit'])->name('redahrm.edit');
    Route::put('/redahrm/{id}', [RedahrmController::class, 'update'])->name('redahrm.update');
    Route::delete('/redahrm/{id}', [RedahrmController::class, 'destroy'])->name('redahrm.destroy');

    // REDA AUDITMGT
    Route::resource('auditmgt', RedaauditmgtController::class)->except(['show']);

    // REDA Tourism
    Route::resource('tourismdev', RedatourismdevController::class)->except(['show']);

    // REDA Economy
    Route::resource('econdev', RedaeconomydevController::class)->except(['show']);

    // REDA Enterprise
    Route::resource('enterprise', RedaenterpricseController::class)->except(['show']);

    // REDA Hotel School
    Route::resource('hotelschool', RedahotelschoolController::class)->except(['show']);

    // REDA IT Center
    Route::resource('redaitcenter', RedaitcenterController::class)->except(['show']);

    // REDA Language Center
    Route::resource('redalanguagecenter', RedalanguagecenterController::class)->except(['show']);

    // REDA Manpower NVQ
    Route::resource('redamanpowernvq', RedamanpowernvqController::class)->except(['show']);

    // REDA Security Service
    Route::resource('redasecurityservice', RedasecurityserviceController::class)->except(['show']);

    // REDA Security Members
    Route::resource('redasecurityservicemembers', RedasecurityservicemembersController::class)->except(['show']);

    // REDA Cleaning Service
    Route::resource('redacleaningservice', RedacleaningserviceController::class)->except(['show']);

    // REDA Skilled Manpower
    Route::resource('redaskilledmanpower', RedaskilledmanpowerController::class)->except(['show']);

    // REDA Accounts
    Route::resource('redaaccounts', RedaaccountsController::class)->except(['show']);

    // REDA Procurements
    Route::resource('redaprocuments', RedaprocumentController::class)->except(['show']);

    // REDA ASSETS
        Route::resource('redastoresandasset', RedastoresandassetController::class)->except(['show']);







// Academy page
Route::view('/redaacademy', 'redaacademy')->name('redaacademy');



Route::post('/center-access', [CenterAccessController::class, 'check'])->name('center.access');

        


});
