<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateResultController;
use App\Http\Controllers\QuestionController;
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
Route::get('/privacy',function(){
    return view('privacy');
});
Route::get('/login', [AuthController::class,'login'])->name('login');

Route::post('/login', [AuthController::class,'go_login'])->name('login');
Route::post('/logout', [AuthController::class,'go_logout'])->name('logout');

// Clear application cache:
Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	\Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	\Artisan::call('config:cache');
 	return 'Config cache has been cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    \Artisan::call('view:clear');
    return 'View cache has been cleared';
});


Route::group(['middleware' => ['usersession']], function () {

    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/info', function () {
        return phpinfo();
    });

    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('koperasi.dashboard');


    Route::get('/question', [QuestionController::class,'question'])->name('question');
    Route::get('/question/add', [QuestionController::class,'question_add'])->name('question.add');
    Route::get('/question/edit/{id}', [QuestionController::class,'question_edit'])->name('question.edit');
    Route::post('/question/edit/{id}', [QuestionController::class,'question_update'])->name('question.update');
    Route::post('/question', [QuestionController::class,'question_store'])->name('question.store');
    Route::get('/question/delete/{id}', [QuestionController::class,'question_delete'])->name('question.delete');

    Route::get('/generate_result', [GenerateResultController::class,'generate_result'])->name('generate_result');
    Route::get('/generate_result/add', [GenerateResultController::class,'generate_result_add'])->name('generate_result.add');
    Route::get('/generate_result/detail/{id}', [GenerateResultController::class,'generate_result_detail'])->name('generate_result.detail');
    Route::post('/generate_result/edit/{id}', [GenerateResultController::class,'generate_result_update'])->name('generate_result.update');
    Route::post('/generate_result', [GenerateResultController::class,'generate_result_store'])->name('generate_result.store');
    Route::get('/generate_result/delete/{id}', [GenerateResultController::class,'generate_result_delete'])->name('generate_result.delete');

});

