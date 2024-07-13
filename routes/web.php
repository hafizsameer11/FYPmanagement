<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperviserController;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    // Place your authenticated routes here
    //student routes
    Route::get('/all-student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/create-student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store-student', [StudentController::class, 'store'])->name('student.store');
    //project routes
    Route::get('/all-project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/delete-project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/create-project', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/store-project', [ProjectController::class, 'store'])->name('project.store');
    //routes for super visor
    Route::get('/all-supervisor', [SuperviserController::class, 'index'])->name('supervisor.index');
    Route::get('/delete-supervisor/{id}', [SuperviserController::class, 'destroy'])->name('supervisor.destroy');
    Route::get('/create-supervisor', [SuperviserController::class, 'create'])->name('supervisor.create');
    Route::post('/store-supervisor', [SuperviserController::class, 'store'])->name('supervisor.store');
    //routes for meeting
    Route::get('/all-meetings', [MeetingController::class, 'index'])->name('meeting.index');
    Route::get('/delete-meeting/{id}', [MeetingController::class, 'destroy'])->name('meeting.destroy');
    Route::get('/create-meeting', [MeetingController::class, 'create'])->name('meeting.create');
    Route::post('/store-meeting', [MeetingController::class, 'store'])->name('meeting.store');
    Route::get('/edit-meeting/{id}', [MeetingController::class, 'edit'])->name('meeting.edit');
    Route::post('/update-meeting/{id}', [MeetingController::class, 'update'])->name('meeting.update');
    // routes for documents
    Route::get('/all-documents', [DocumentController::class, 'index'])->name('document.index');
    Route::get('/delete-document/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');
    Route::get('/create-document', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/store-document', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/edit-document/{id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::post('/update-document/{id}', [DocumentController::class, 'update'])->name('document.update');

    Route::get('/approve-document/{id}', [DocumentController::class, 'approve'])->name('document.approve');
    Route::get('/unapprove-document/{id}', [DocumentController::class, 'unapprove'])->name('document.unapprove');




    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more routes as needed
});
