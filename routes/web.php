<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\SubProgramController;
use App\Http\Controllers\AuthTeacherController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/counter', Counter::class);

// Route group for admin (without middleware at the group level)
Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes (no middleware)
    Route::get('/', [AuthAdminController::class, 'index'])->name('index');
    Route::get('/reset-pass', [AuthAdminController::class, 'repass'])->name('repass');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login');
    Route::post('/register', [AuthAdminController::class, 'register'])->name('register');
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');

    // Protected routes (with middleware)
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AuthAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AuthAdminController::class, 'users'])->name('users.index');
        Route::prefix('master')->group(function () {
            Route::resource('brands', BrandController::class);
            Route::resource('programs', ProgramController::class);
            Route::post('programs/{program}/toggle-active', [ProgramController::class, 'toggleActive'])->name('admin.programs.toggleActive');
            Route::resource('subprograms', SubProgramController::class);
            Route::resource('levels', LevelController::class);
            Route::resource('tingkat', TingkatController::class);
            Route::resource('users', UserController::class);
            Route::post('users/{user}/toggle', [UserController::class, 'toggle']);
            Route::resource('teachers', TeacherController::class)->except(['create', 'store', 'show']);
            Route::resource('students', StudentController::class)->except(['create', 'store', 'show']);
            Route::resource('mapel', SubjectController::class);
            Route::patch('mapel/{subject}/toggle-active', [SubjectController::class, 'toggleActive'])->name('mapel.toggle-active');
            Route::resource('kelas', KelasController::class);
        });
    });
});

// Route group for teacher (without middleware at the group level)
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Public routes (no middleware)
    Route::get('/', [AuthTeacherController::class, 'index'])->name('index');
    Route::get('/reset-pass', [AuthTeacherController::class, 'passupt'])->name('passupt');

    // Protected routes (with middleware)
    Route::middleware(['auth'])->group(function () {
        Route::get('/classes', [AuthTeacherController::class, 'index'])->name('classes.index');
        Route::get('/profile', [AuthTeacherController::class, 'edit'])->name('profile.edit');
        Route::get('/biodata', [AuthTeacherController::class, 'biodata'])->name('biodata');
        // Example of another protected route
        Route::get('/bio', [AuthTeacherController::class, 'show'])->name('biodata.show');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['checkstudent'])->group(function () {
        Route::get('/dashboard', [AuthUserController::class, 'index'])->name('dashboard');
    });
    Route::get('/biodata', [AuthUserController::class, 'biostudent'])->name('student.bio');
    Route::post('/biodata', [StudentController::class, 'store'])->name('students.store');
});
