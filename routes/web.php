<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ProjectRequestController;
use App\Http\Controllers\Admin\ProjectFeedbackController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PublishController;


use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\StepController;


use App\Http\Controllers\Frontend\WelcomeController;


use App\Http\Controllers\Frontend\CompanyController as FrontendCompanyController;
use App\Http\Controllers\Frontend\ProjectRequestController as FrontendProjectRequestController;
use App\Http\Controllers\Frontend\ProjectFeedbackController as FrontendProjectFeedbackController;
use App\Http\Controllers\Frontend\EmployeeController as FrontendEmployeeController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;

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

Route::get('/', [WelcomeController::class, 'index']);


Route::get('/projects/create', [FrontendProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/create', [FrontendProjectController::class, 'storecreate'])->name('projects.store.create');

Route::get('/projects', [FrontendProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [FrontendProjectController::class, 'show'])->name('projects.show');

Route::get('/companies', [FrontendCompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [FrontendCompanyController::class, 'show'])->name('companies.show');





Route::get('/employees', [FrontendEmployeeController::class, 'index'])->name('employees.index');
Route::get('/projectrequests', [FrontendProjectRequestController::class, 'index'])->name('projectrequests');
Route::get('/projectfeedbacks', [FrontendProjectFeedbackController::class, 'index'])->name('projectfeedbacks');




Route::get('/ThankYou', [WelcomeController::class, 'ThankYou'])->name('ThankYou');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () { 
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/companies', CompanyController::class);
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/projectrequests', ProjectRequestController::class);
    Route::resource('/projectfeedbacks', ProjectFeedbackController::class);
    
    Route::resource('/projects', ProjectController::class);
    Route::resource('/steps', StepController::class);
    Route::resource('/publishes', PublishController::class);

});

require __DIR__.'/auth.php';
