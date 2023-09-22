<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CompetitionController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['middleware' => ['auth']], function(){
    
    // 大会機能
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions'); 
    Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions/show'); 
    
    
    // 投稿機能
    # POST
    Route::post('/catches/posts', [PostController::class, 'store'])->name('store');
    
    
    # GET
    Route::get('/catches', [PostController::class, 'index'])->name('catches'); 
    
    Route::get('/catches/posts/create', [PostController::class, 'create'])->name('create');
    
    Route::get('/catches/posts/{post}/edit', [PostController::class, 'edit']);
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
    Route::get('/catches/posts/{post}', [PostController::class, 'show'])->name('catches/show');
    
    # PUT
    Route::put('/catches/posts/{post}', [PostController::class, 'update'])->name('catches/update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
