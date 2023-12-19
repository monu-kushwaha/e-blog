<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

// Route::view('Routename', 'file');

// Route::get('/post/{id}', function (string $id) {
//     return "<h1> $id</h1>";
// })->whereNumber('id');
// Route::get('/post/{id}', function (string $id) {
//     return "<h1> $id</h1>";
// })->whereAlphaNumeric('id');
// Route::get('/post/{id}', function (string $id) {
//     return "<h1> $id</h1>";
// })->whereIn('id',['test', 'test1']);
// Route::get('/post/{id}', function (string $id) {
//     return "<h1> $id</h1>";
// })->where('id','[0-9]+');
// Route::get('/post/{id}', function (string $id) {
//     return "<h1> $id</h1>";
// })->where('id','[a-zA-Z]+');
Route::get('/post/{id}/commit/{commitId}', function (string $id, string $commitId) {
    return "<h1> $id And $commitId</h1>";
})->where('id','[0-9]+')->whereAlpha('commitId');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
