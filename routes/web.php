<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HeadCoachController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\MemberApplicationController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Tables;
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

Route::get('/', function () {
    return view('authentication.login');
});




Route::get('/login', [AuthController::class, 'showLoginForm'] )->name('login');

Route::post('/login', [AuthController::class, 'processLogin'] )->name('submit');

Route::get('/logout', [AuthController::class, 'logout'] )->name('logout');



Route::get('/register', [AuthController::class, 'ShowRegistration'] )->name('auth.register');

Route::post('/register', [AuthController::class, 'processRegistration'] )->name('registerUser');

 
Route::resource('/admin-dashboard', AdminController::class);


Route::get('/showUser', [UserReportController::class, 'showUsers'] )->name('showUsers');
Route::get('/showStudent', [StudentProfileController::class, 'showStudents'] )->name('showStudents');

Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard.index');

Route::resource('clubs', ClubController::class);

Route::resource('head-coaches', HeadCoachController::class);

Route::resource('documents', DocumentController::class)->except(['show', 'edit', 'update']);
Route::get('documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

Route::resource('announcements', AnnouncementController::class);

Route::resource('member-applications', MemberApplicationController::class)->except(['show', 'edit']);

Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('tables', Tables::class, 'index')->name('Club-directory');