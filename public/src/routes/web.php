<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectiveController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocationEventController;
use App\Http\Controllers\OrganizedController;
use App\Http\Controllers\Participant\InvoiceController as ParticipantInvoiceController;
use App\Http\Controllers\Participant\RaceController as ParticipantRaceController;
use App\Http\Controllers\Participant\TeamController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilitiesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->group(function(){
        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('user', UserController::class);

            Route::resource('contact-me', ContactMeController::class)->except(['create', 'show']);
            Route::resource('location-event', LocationEventController::class)->except(['create', 'edit', 'show']);
            Route::resource('organized', OrganizedController::class)->except(['create', 'edit', 'show']);
            
            Route::resource('category', CategoryController::class);
            Route::resource('faq', FaqController::class)->except(['create', 'show']);
            Route::resource('directive', DirectiveController::class)->except(['create', 'show']);

            Route::resource('race', RaceController::class);
            Route::resource('race.participant', ParticipantController::class)->only(['index', 'create']);

            Route::resource('invoice', InvoiceController::class)->except(['edit', 'destroy']);
        });

        // participant
        Route::prefix('participant')->name('participant.')->group(function(){
            Route::get('race', [ParticipantRaceController::class, 'index'])->name('race.index');
            Route::post('race', [ParticipantRaceController::class, 'store'])->name('race.store');

            Route::get('invoice', [ParticipantInvoiceController::class, 'index'])->name('invoice.index');
            Route::get('invoice/{id}', [ParticipantInvoiceController::class, 'show'])->name('invoice.show');
            Route::post('invoice/{id}', [ParticipantInvoiceController::class, 'store'])->name('invoice.store');

            Route::resource('invoice.team', TeamController::class)->only(['index', 'store']);
        });
        // end participant
    });

    Route::post('/utilities/upload', [UtilitiesController::class, 'upload']);
    Route::delete('/utilities/reverse', [UtilitiesController::class, 'reverse']);
});

Route::get('/{slug}', [HomeController::class, 'show']);

