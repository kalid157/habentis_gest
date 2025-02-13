<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DeveloppeurController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeeController::class, 'dashboard'])->name('dashboard');
    Route::resource('dashboard', HomeeController::class);

    Route::resource('employees', EmployeeController::class);
    Route::resource('designs', DesignController::class);
    Route::resource('apprenants', ApprenantController::class);
    Route::resource('developpeurs', DeveloppeurController::class);
    Route::resource('depenses', DepenseController::class);
    Route::resource('recettes', RecetteController::class);

    Route::get('/developpeurs', [DeveloppeurController::class, 'index'])->name('developpeurs.index');
    Route::get('/developpeurs/{session}', [DeveloppeurController::class, 'show'])->name('developpeurs.show');
    Route::get('/finance', [FinanceController::class, 'index'])->name('finance.dashboard');
    Route::post('/finance/add-outgoing', [FinanceController::class, 'addOutgoing'])->name('finance.add-outgoing');
    Route::post('/finance/remove-outgoing', [FinanceController::class, 'removeOutgoing'])->name('finance.remove-outgoing');
    Route::post('/finance/set-total-sum', [FinanceController::class, 'setTotalSum'])->name('finance.set-total-sum');
    Route::post('/finance/set-student-count', [FinanceController::class, 'setStudentCount'])->name('finance.set-student-count');
    Route::get('/sessions/{session}', [SessionController::class, 'show'])->name('sessions.show');
});

// Route to display session details for a given apprenant (added)
