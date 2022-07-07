<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\TestQuestionsController;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('main');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/tests', function() {return Inertia::render('Tests');})->name('tests');

Route::get('/getquiz', function() {return Inertia::render('TestQuestions');})->name('getquiz');

Route::post('/createtest', [TestsController::class, 'addTest'])
    ->name('createtest');

Route::post('/createquiz', [TestsController::class, 'addQuiz'])
    ->name('createquiz');

Route::get('/gettests', [TestsController::class, 'getTests'])
    ->name('gettests');

 Route::get('/test/{id}', [TestsController::class, 'index']
        )->name('test');

 Route::post('/test/{id}', [TestsController::class, 'setResult']
        )->name('setTestResult');

Route::get('/newtest', function() {return Inertia::render('CreateTest');})->name('newtest');
Route::get('/newquiz', function() {return Inertia::render('CreateQuiz');})->name('newquiz');