<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\TarefaController;
use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/tarefa', TarefaController::class);
});

Route::get('/emails', function () {
    // return new MensagemTesteMail();
    Mail::to('jorge@mailinator.com')->send(new MensagemTesteMail());
    return "Atualizado!";
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
