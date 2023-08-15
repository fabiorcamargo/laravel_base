<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CodePremiumController;
use App\Http\Controllers\ResumeController;
use Illuminate\Foundation\Application;
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

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('home');



    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
        Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
        Route::get('/resume/{resume}', [ResumeController::class, 'show'])->name('resume.show');
        
        Route::post('/resume/{resume}', [ResumeController::class, 'update'])->name('resume.update');
        Route::get('/resume/{resume}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
        
        Route::get('/code', function(){
            return view('user.code');
        })->name('resume.edit');
        
        
        
        

    });

    Route::get('/premium', function(){
        return view('auth.premium');
    })->name('premium');
    Route::post('/code/verify',[CodePremiumController::class, 'verify'])->name('resume.edit');
});
