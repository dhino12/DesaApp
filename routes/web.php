<?php

use App\Http\Controllers\IndikatorPengelolaanDesaController;
use Illuminate\Support\Facades\Route;

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
    return "go to /dashboard/form-indikator-desa";
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::resource("/dashboard/form-indikator-desa", IndikatorPengelolaanDesaController::class);