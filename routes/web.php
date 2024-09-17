<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inversionista;

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
    return view('index');
});

Route::post('/', [inversionista::class, 'index'])->name('index');

Route::post('/dashboard', [inversionista::class, 'login'])->name('login');

Route::get('/dash_board', [inversionista::class, 'dashboard'])->name('dashboard');

Route::get('/search', [inversionista::class, 'search'])->name('search');

Route::get('/users', [inversionista::class, 'users'])->name('users');



Route::put('/delete_users_{id}', [inversionista::class, 'delete_users'])->name('delete_users');

Route::get('/edit_users_{id}', [inversionista::class, 'edit_users'])->name('edit_users');

Route::put('/update_users_{id}', [inversionista::class, 'update_users'])->name('update_users');

Route::post('/users_register', [inversionista::class, 'users_register'])->name('users_register');


Route::get('/enterprises', [inversionista::class, 'enterprises'])->name('enterprises');


Route::get('/delegates', [inversionista::class, 'delegates'])->name('delegates');

Route::post('/delegates_register', [inversionista::class, 'delegates_register'])->name('delegates_register');

Route::get('/edit_delegates_{id}', [inversionista::class, 'edit_delegates'])->name('edit_delegates');

Route::post('/update_delegates_{id}', [inversionista::class, 'update_delegates'])->name('update_delegates');


Route::put('/delete_delegates_{id}', [inversionista::class, 'delete_delegates'])->name('delete_delegates');

Route::get('/add_socialweb_{id}', [inversionista::class, 'add_socialweb'])->name('add_socialweb');

Route::post('/web_register', [inversionista::class, 'web_register'])->name('web_register');

Route::get('/stadistics', [inversionista::class, 'stadistics'])->name('stadistics');


Route::get('/previews', [inversionista::class, 'previews'])->name('previews');


Route::get('/userpanel', [inversionista::class, 'userpanel'])->name('userpanel');


Route::get('/results', [inversionista::class, 'results'])->name('results');


Route::get('/configurations', [inversionista::class, 'configurations'])->name('configurations');

Route::get('/logout', [inversionista::class, 'logout'])->name('logout');