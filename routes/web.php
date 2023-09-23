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
    # POST
    ROUTE::post('/competitions/store', [CompetitionController::class, 'store'])->name('competitions/store');    # 大会の登録
    Route::post('/competitions/{competition}/posts/store', [PostController::class, 'store_in_competition'])->name('competitions/posts/store');     # 大会内での投稿
    
    
    # GET
    Route::get('/competitions', [CompetitionController::class, 'index_competition'])->name('competitions'); 
    Route::get('/competitions/create', [CompetitionController::class, 'create'])->name('competitions/create');
    Route::get('/competitions/{competition}/posts', [CompetitionController::class, 'index_post'])->name('competitions/posts'); 
    Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions/show'); 
    Route::get('/competitions/{competition}/posts/create', [PostController::class, 'create_in_competition'])->name('competitions/posts/create');
    Route::get('/competitions/{competition}/leaderboard', [CompetitionController::class, 'leaderboard'])->name('competitions/leaderboard');

    
    // 投稿機能
    # POST
    Route::post('/catches/store', [PostController::class, 'store'])->name('store');
    
    
    # GET
    Route::get('/catches', [PostController::class, 'index'])->name('catches'); 
    
    Route::get('/catches/posts/create', [PostController::class, 'create'])->name('catches/create');
    
    Route::get('/catches/posts/{post}/edit', [PostController::class, 'edit']);
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
    Route::get('/catches/posts/{post}', [PostController::class, 'show'])->name('catches/show');
    
    # PUT
    Route::put('/catches/posts/{post}', [PostController::class, 'update'])->name('catches/update');

    # delete
    Route::delete('catches/posts/{post}', [PostController::class,'delete'])->name('catches/delete');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
