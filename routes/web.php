<?php

use App\Http\Controllers\Webcontroller;
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
    return redirect()->to("/admin");
});

Route::get('/report-detials/{from_date}/{to_date}/{report_type}', [Webcontroller::class, 'pdfreport']);
Route::get('/report-download/{from_date}/{to_date}/{report_type}', [Webcontroller::class, 'pdfdownload']);
