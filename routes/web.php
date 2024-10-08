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

Route::get('/result', [inversionista::class, 'result'])->name('result');

Route::get('/users', [inversionista::class, 'users'])->name('users');



Route::put('/delete_users_{id}', [inversionista::class, 'delete_users'])->name('delete_users');

Route::get('/edit_users_{id}', [inversionista::class, 'edit_users'])->name('edit_users');

Route::put('/update_users_{id}', [inversionista::class, 'update_users'])->name('update_users');

Route::put('/suspend_users_{id}', [inversionista::class, 'suspend_users'])->name('suspend_users');

Route::post('/users_register', [inversionista::class, 'users_register'])->name('users_register');


Route::get('/enterprises', [inversionista::class, 'enterprises'])->name('enterprises');

Route::post('/enterprises_register', [inversionista::class, 'enterprises_register'])->name('enterprises_register');

Route::get('/edit_enterprises_{id}', [inversionista::class, 'edit_enterprises'])->name('edit_enterprises');

Route::put('/update_enterprises_{id}', [inversionista::class, 'update_enterprises'])->name('update_enterprises');

Route::put('/suspend_enterprises_{id}', [inversionista::class, 'suspend_enterprises'])->name('suspend_enterprises');

Route::get('/add_web_{id}', [inversionista::class, 'add_web'])->name('add_web');

Route::put('/delete_enterprises_{id}', [inversionista::class, 'delete_enterprises'])->name('delete_enterprises');

Route::get('/edit_web_enterprise_{id}', [inversionista::class, 'edit_web_enterprise'])->name('edit_web_enterprise');

Route::post('/web_register_enterprise', [inversionista::class, 'web_register_enterprise'])->name('web_register_enterprise');

Route::put('/update_web_enterprise_inner_{id}', [inversionista::class, 'update_web_enterprise_inner'])->name('update_web_enterprise_inner');

Route::put('/delete_web_enterprise_register_{id}', [inversionista::class, 'delete_web_enterprise_register'])->name('delete_web_enterprise_register');


Route::get('/delegates', [inversionista::class, 'delegates'])->name('delegates');

Route::post('/delegates_register', [inversionista::class, 'delegates_register'])->name('delegates_register');

Route::get('/edit_delegates_{id}', [inversionista::class, 'edit_delegates'])->name('edit_delegates');

Route::put('/update_delegates_{id}', [inversionista::class, 'update_delegates'])->name('update_delegates');

Route::put('/suspend_delegates_{id}', [inversionista::class, 'suspend_delegates'])->name('suspend_delegates');




Route::put('/delete_delegates_{id}', [inversionista::class, 'delete_delegates'])->name('delete_delegates');

Route::get('/add_socialweb_{id}', [inversionista::class, 'add_socialweb'])->name('add_socialweb');

Route::post('/web_register', [inversionista::class, 'web_register'])->name('web_register');

Route::get('/edit_web_{id}', [inversionista::class, 'edit_web'])->name('edit_web');

Route::put('/update_web_inner_{id}', [inversionista::class, 'update_web_inner'])->name('update_web_inner');

Route::put('/delete_web_register_{id}', [inversionista::class, 'delete_web_register'])->name('delete_web_register');

Route::get('/stadistics', [inversionista::class, 'stadistics'])->name('stadistics');

Route::get('/previews_delegates_{id}', [inversionista::class, 'previews_delegates'])->name('previews_delegates');

Route::get('/prueba_delegates_pdf_{id}', [inversionista::class, 'prueba_delegates_pdf'])->name('prueba_delegates_pdf');

Route::get('/previews_{id}', [inversionista::class, 'previews'])->name('previews');

Route::get('/prueba_pdf_{id}', [inversionista::class, 'prueba_pdf'])->name('prueba_pdf');

Route::post('/elaborar', [inversionista::class, 'elaborar'])->name('elaborar');

Route::get('/elaborador_delegados_{id}', [inversionista::class, 'elaborador_delegados'])->name('elaborador_delegados');

Route::get('/elaborador_{id}', [inversionista::class, 'elaborador'])->name('elaborador');

Route::put('/revisar_delegados_{id}', [inversionista::class, 'revisar_delegados'])->name('revisar_delegados');

Route::put('/revisar_{id}', [inversionista::class, 'revisar'])->name('revisar');

Route::put('/certificar_{id}', [inversionista::class, 'certificar'])->name('certificar');

Route::post('/elaborar_delegates', [inversionista::class, 'elaborar_delegates'])->name('elaborar_delegates');

Route::get('/modificar_elaborador_empresas_{id}', [inversionista::class, 'modificar_elaborador_empresas'])->name('modificar_elaborador_empresas');


Route::get('/modificar_elaborador_delegados_{id}', [inversionista::class, 'modificar_elaborador_delegados'])->name('modificar_elaborador_delegados');


Route::put('/modificar_elaborar_empresas', [inversionista::class, 'modificar_elaborar_empresas'])->name('modificar_elaborar_empresas');


Route::put('/modificar_elaborar_delegados', [inversionista::class, 'modificar_elaborar_delegados'])->name('modificar_elaborar_delegados');




Route::get('/userpanel', [inversionista::class, 'userpanel'])->name('userpanel');


Route::get('/results', [inversionista::class, 'results'])->name('results');


Route::get('/configurations', [inversionista::class, 'configurations'])->name('configurations');

Route::get('/logout', [inversionista::class, 'logout'])->name('logout');