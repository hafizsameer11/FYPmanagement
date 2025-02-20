<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaintsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DynamicTableController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NoticeboardController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScopeFinalizationController;
use App\Http\Controllers\ScopeofProject;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperviserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
Route::geT('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    // Place your authenticated routes here
    //student routes
    Route::get('/all-student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/create-student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');

    //students to  a supervisor
    Route::get('/supervisor-student', [StudentController::class, 'supervisorstudent'])->name('student.supervisor');    //project routes
    Route::get('/all-project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/delete-project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/create-project', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/store-project', [ProjectController::class, 'store'])->name('project.store');
    //routes for super visor
    Route::get('/all-supervisor', [SuperviserController::class, 'index'])->name('supervisor.index');
    Route::get('/delete-supervisor/{id}', [SuperviserController::class, 'destroy'])->name('supervisor.destroy');
    Route::get('/create-supervisor', [SuperviserController::class, 'create'])->name('supervisor.create');
    Route::post('/store-supervisor', [SuperviserController::class, 'store'])->name('supervisor.store');
    Route::get('/searc-supervisor', [SuperviserController::class, 'search'])->name('supervisor.search');
    //routes for meeting
    Route::get('/all-meetings', [MeetingController::class, 'index'])->name('meeting.index');
    Route::get('/delete-meeting/{id}', [MeetingController::class, 'destroy'])->name('meeting.destroy');
    Route::get('/create-meeting', [MeetingController::class, 'create'])->name('meeting.create');
    Route::post('/store-meeting', [MeetingController::class, 'store'])->name('meeting.store');
    Route::get('/edit-meeting/{id}', [MeetingController::class, 'edit'])->name('meeting.edit');
    Route::post('/update-meeting/{id}', [MeetingController::class, 'update'])->name('meeting.update');

    Route::get('/student-meetings',[MeetingController::class,'studentmeetings'])->name('meeting.student');
    // routes for documents
    Route::get('/all-documents', [DocumentController::class, 'index'])->name('document.index');
    Route::get('/search-documents', [DocumentController::class, 'search'])->name('document.search');
    Route::get('/delete-document/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');
    Route::get('/create-document', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/store-document', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/edit-document/{id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::post('/update-document/{id}', [DocumentController::class, 'update'])->name('document.update');
    Route::get('/approve-document/{id}', [DocumentController::class, 'approve'])->name('document.approve');
    Route::get('/unapprove-document/{id}', [DocumentController::class, 'unapprove'])->name('document.unapprove');
    //  routes for noticeboard
    Route::get('/notices', [NoticeboardController::class, 'index'])->name('noticeboard.index');
    Route::get('/notices/create', [NoticeboardController::class, 'create'])->name('noticeboard.create');
    Route::post('/notices/store', [NoticeboardController::class, 'store'])->name('noticeboard.store');
    Route::get('/notices/edit/{id}', [NoticeboardController::class, 'edit'])->name('noticeboard.edit');
    Route::post('/notices/update/{id}', [NoticeboardController::class, 'update'])->name('noticeboard.update');
    Route::get('/notices/delete/{id}', [NoticeboardController::class, 'destroy'])->name('noticeboard.destroy');
    Route::get('/get-item-description/{id}', [NoticeboardController::class, 'getItemDescription']);
    //routes for complaint management
    Route::prefix('complaints')->group(function () {
        Route::get('/', [CompaintsController::class, 'index'])->name('complaint.index');
        Route::get('/create', [CompaintsController::class, 'create'])->name('complaint.create');
        Route::post('/store', [CompaintsController::class, 'store'])->name('complaint.store');
        Route::get('/edit/{id}', [CompaintsController::class, 'edit'])->name('complaint.edit');
        Route::post('/update/{id}', [CompaintsController::class, 'update'])->name('complaint.update');
        Route::get('/destroy/{id}', [CompaintsController::class, 'destroy'])->name('complaint.destroy');
        Route::get('/resolve/{id}', [CompaintsController::class, 'resolve'])->name('complaint.resolve');
        Route::get('/get-description/{id}', [CompaintsController::class, 'getItemDescription']);
        Route::get('/submit',[CompaintsController::class,'submit'])->name('complaint.submit');
        Route::post('/submit-store',[CompaintsController::class,'submitstore'])->name('complaint.submit.store');
    });
    Route::post('/complaints/update-comment/{id}', [CompaintsController::class, 'updateComment'])->name('complaint.updateComment');

    //routes for task management
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/tasks/update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::get('/update-status/{id}/{status}', [TaskController::class, 'updatestatus'])->name('update_task_status');
    Route::get('/fetch-student-details/{id}', [TaskController::class, 'studentdetails'])->name('task.studentdetails');
    //student task showing
    Route::get('/student-tasks',[TaskController::class,'studenttask'])->name('task.student');

    // scope of project routes

    //routes for results
    Route::get('/results', [ResultController::class, 'index'])->name('result.index');
    Route::get('/create-result',[ResultController::class,'create'])->name('result.create');
    Route::post('/store-result',[ResultController::class,'store'])->name('result.store');
    Route::get('/edit-result/{id}',[ResultController::class,'edit'])->name('result.edit');
    Route::post('/update-result{id}',[ResultController::class,'update'])->name('result.update');
    Route::get('/delete-result/{id}',[ResultController::class,'destroy'])->name('result.destroy');
    Route::get('/change-status-result/{id}',[ResultController::class,'publish'])->name('result.publish');


    Route::get('/set-session',[ScopeofProject::class,'sessioncreate'])->name('session.create');
    Route::get('/store-session',[ScopeofProject::class,'sessionstore'])->name('session.store');
    // routes of project

    Route::get('/crete-progress',[ProgressController::class,'create'])->name('progress.create');
    Route::post('/store-progress',[ProgressController::class,'store'])->name('progress.store');
    Route::get('/show-progress',[ProgressController::class,'showprog'])->name('progress.show');
    Route::post('/show-progress',[ProgressController::class,'show'])->name('progress.show.single');

    //scope finalization routes
    Route::get('/scope-finalization-form',[ScopeFinalizationController::class,'index'])->name('scope.index');
    Route::get('/scope-finalization-student',[ScopeFinalizationController::class,'studentview'])->name('scope.student');
    Route::post('/scope/store', [ScopeFinalizationController::class, 'store'])->name('scope.store');
    Route::get('/appoval-form',[ScopeFinalizationController::class,'approvalform'])->name('scope.form');
    Route::post('/appoval-form-submit',[ScopeFinalizationController::class,'submitform'])->name('scope.form.submit');
    Route::post('/appoval-form-store',[ScopeFinalizationController::class,'storeform'])->name('scope.form.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('dynamic-tables', DynamicTableController::class);
    Route::post('/dynamic-tables/{id}/records', [DynamicTableController::class, 'updateRecord']);
    Route::get('/dynamic-publish/{id}', [DynamicTableController::class, 'publish']);

    Route::get('/dynamic-table-exam', [DynamicTableController::class, 'showform'])->name('showform');
    Route::get('/dynamic-table-exam-st', [DynamicTableController::class, 'stshowform'])->name('stshowform');


    //user routes

    Route::get('/all-users',[UserController::class,'index'])->name('user.index');
    Route::get('/create-users',[UserController::class,'create'])->name('user.create');
    Route::post('/store-users',[UserController::class,'store'])->name('user.store');
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('/update-user{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/delete-user/{id}',[UserController::class,'destroy'])->name('user.destroy');
    // Add more routes as needed
});
