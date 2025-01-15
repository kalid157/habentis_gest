<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\DeveloppeurController;

Route::get('/', function () {
    return view('home');
});
//Route::resource('apprenants', ApprenantController::class);
//Route::resource('data_analyst', ApprenantController::class);
//Route::get('apprenants/{id}/edit', [ApprenantController::class, 'edit'])->name('apprenants.edit');
//Route::post('apprenants/store', [ApprenantController::class, 'store'])->name('apprenants.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function(){
    return view('admin');
});

Route::resource('employees', EmployeeController::class);

Route::resource('designs', DesignController::class);
Route::resource('apprenants', ApprenantController::class);
Route::get('/developpeurs', [DeveloppeurController::class, 'index'])->name('developpeurs.index');
Route::get('/developpeurs/{session}', [DeveloppeurController::class, 'show'])->name('developpeurs.show');

Route::get('/finance', [FinanceController::class, 'index'])->name('finance.dashboard');

Route::post('/finance/add-outgoing', [FinanceController::class, 'addOutgoing'])->name('finance.add-outgoing');
Route::post('/finance/remove-outgoing', [FinanceController::class, 'removeOutgoing'])->name('finance.remove-outgoing');
Route::post('/finance/set-total-sum', [FinanceController::class, 'setTotalSum'])->name('finance.set-total-sum');
Route::post('/finance/set-student-count', [FinanceController::class, 'setStudentCount'])->name('finance.set-student-count');


//Route::get('/', function () {return view('dashboard');})->name('dashboard');
//Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('dashboard', HomeController::class);

Route::resource('depenses', DepenseController::class);
Route::resource('recettes', RecetteController::class);





// Route to display session details for a given apprenant (added)
