<?php

use App\Http\Controllers\AdminSpotifyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\FirstUserMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\RatingComponent;
use Inertia\Inertia;

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

// Route::get("/", function () {
//     return view("welcome");
// });
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/admin', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware(['guest', FirstUserMiddleware::class])
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware(['guest', FirstUserMiddleware::class]);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::resource('admin/spotify', AdminSpotifyController::class)->names('admin.spotify');
    });
});

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/podcast-episode/{spotifyId}", RatingComponent::class);
