<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|This routes used for Frontend
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|This routes used for Frontend
*/



Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('client', ClientController::class);
    Route::get('task/client/{client:username}', [ClientController::class, 'searchTaskByClient'])->name('searchTaskByClient');
    Route::resource('task', TaskController::class);
    Route::put('task/{task}/complete', [TaskController::class, 'markAsComplete'])->name('markAsComplete');

    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::put('invoice/{invoice}/update', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::delete('invoice/{invoice}/delete', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::get('invoice/search', [InvoiceController::class, 'search'])->name('invoice.search');
    Route::get('invoice/preview', [InvoiceController::class, 'preview'])->name('preview.invoice');
});



require __DIR__.'/auth.php';
