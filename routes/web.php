<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\processorController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\pdfresumedhController;
use App\Http\Controllers\accountController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => CheckUserRole::class . ':1'], function () {
    Route::GET('/all', [HomeController::class, 'allapp']);

    /*
|--------------------------------------------------------------------------
| Applicants
|--------------------------------------------------------------------------
*/

    Route::GET('/applicants', [HomeController::class, 'applicants']);

    Route::GET('/fetchall', [HomeController::class, 'fetchallapp']);

    Route::POST('/applicants', [processorController::class, 'applicants']);

    // CREATE RESUME
    Route::GET('/applicants/create', [
        processorController::class,
        'createResume',
    ]);
    Route::GET('/applicants/build', [
        processorController::class,
        'resumebuilder',
    ]);
    Route::GET('/applicants/fdh', [processorController::class, 'fdh']);

    /*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/
    Route::get('/clients', [clientController::class, 'index'])->name(
        'client.index'
    );
    Route::POST('/addtolineup', [clientController::class, 'addtolineup'])->name(
        'client.addtolineup'
    );

    /*
|--------------------------------------------------------------------------
| Client's List
|--------------------------------------------------------------------------
*/
    Route::get('/clients/list/{company}', [
        clientController::class,
        'list',
    ])->name('client.list');

    Route::post('/selected-route/{id}', [clientController::class, 'selected']);
    Route::post('/rejected-route/{id}', [clientController::class, 'rejected']);
    Route::post('/backup-route/{id}', [clientController::class, 'backup']);
    Route::post('/backout-route/{id}', [clientController::class, 'backout']);
    Route::post('/delete-route/{id}', [clientController::class, 'delete']);

    /*
|--------------------------------------------------------------------------
| RESUME VIEW DH
|--------------------------------------------------------------------------
*/

    Route::GET('/view-resume-dh', [
        pdfresumedhController::class,
        'generatePDF',
    ]);

    /*
|--------------------------------------------------------------------------
| ADMIN MENUS
|--------------------------------------------------------------------------
*/
    Route::GET('/admin/accounts', [accountController::class, 'index']);
});

Route::group(['middleware' => CheckUserRole::class . ':0'], function () {
    Route::get('/activation', function () {
        return view('admin.foractivation');
    });
});
