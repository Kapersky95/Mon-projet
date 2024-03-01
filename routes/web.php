<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\{
    FonctionController,
    AssignationController,
};

// use App\Http\Controllers\User\{
//     AgentController,
// };

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    //Methodes CRUD
    Route::resource('fonctions', FonctionController::class);
    Route::resource('assignations', AssignationController::class);
});

// Route::middleware(['auth'])->prefix('user')->group(function () {
    
//     Route::resource('agents', [AgentController::class]);
// });

require __DIR__.'/auth.php';