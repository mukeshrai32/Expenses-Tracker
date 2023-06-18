<?php

use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.list');
    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/expense/list_json', [ExpenseController::class, 'listJson'])->name('expense.list_json');

    Route::get('/expense_category', [ExpenseCategoryController::class, 'index'])->name('expense_category.list');
    Route::get('/expense_category/create', [ExpenseCategoryController::class, 'create'])->name('expense_category.create');
    Route::post('/expense_category/store', [ExpenseCategoryController::class, 'store'])->name('expense_category.store');
    Route::get('/expense_category/list_json', [ExpenseCategoryController::class, 'listJson'])->name('expense_category.list_json');

    Route::get('/charts', [ChartJsController::class, 'index'])->name('charts.list');

});

require __DIR__ . '/auth.php';
