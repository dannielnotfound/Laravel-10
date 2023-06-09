<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Enums;
use App\Enums\SupportStatus;

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

// Route::get('/teste', function (){
//     dd(array_column(SupportStatus::cases(), 'value'));
// });



Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::put('supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::get('/supports/edit/{id}', [SupportController::class, 'edit'])->name('supports.edit');
Route::delete('/delete/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::get('/supports/delete/{id}', [SupportController::class, 'delete'])->name('supports.delete');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', [SiteController::class, 'contact']);
