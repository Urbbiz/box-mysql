<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\PostCalculatorController;
use App\Http\Controllers\BoxController;

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

Route::get('/', function () {
     
});

Route::get('kelias-i-lara', function () {
    return 'Labas Lara';
});
Route::get('kelias-i-lara/2', function () {
    return 'Vel Lara';
});

Route::get('gates/{vaisius}/{id}', [GardenController::class, 'index']);

Route::get('calc', [PostCalculatorController::class, 'show'])->name('show-calc');
Route::post('calc', [PostCalculatorController::class, 'calc'])->name('do-math');


Route::group(['prefix' => 'box'], function() {
    Route::get('', [BoxController::class, 'index'])->name('box.index');
    Route::get('create', [BoxController::class, 'create'])->name('box.create'); // Rodo tuscia nauja forma
    Route::post('store', [BoxController::class, 'store'])->name('box.store'); // Uzsaugo nauja boxa
    Route::get('edit/{box}', [BoxController::class, 'edit'])->name('box.edit'); // Rodo uzpildyta forma
    
    Route::get('add/{box}', [BoxController::class, 'add'])->name('box.add'); // Rodo pridejimo laukeli
    Route::post('add-to-box/{box}', [BoxController::class, 'addToBox'])->name('box.add_to_box'); // prideda ir uzsaugo
    
    
    Route::post('update/{box}', [BoxController::class, 'update'])->name('box.update');// Uzsaugo konkretu redaguota boksa
    Route::post('delete/{box}', [BoxController::class, 'destroy'])->name('box.destroy');
    Route::get('show/{box}', [BoxController::class, 'show'])->name('box.show');
});
