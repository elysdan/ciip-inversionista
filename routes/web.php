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

Route::get('/actividades', [inversionista::class, 'actividades'])->name('actividades');
Route::get('/usuarios', [inversionista::class, 'usuarios'])->name('usuarios');
Route::get('/empresas', [inversionista::class, 'empresas'])->name('empresas');
Route::get('/representantes', [inversionista::class, 'representantes'])->name('representantes');
Route::get('/generos', [inversionista::class, 'generos'])->name('generos');
Route::get('/sectores_d', [inversionista::class, 'sectores_d'])->name('sectores_d');
Route::get('/estados_civiles', [inversionista::class, 'estados_civiles'])->name('estados_civiles');
Route::get('/contenido_empresas', [inversionista::class, 'contenido_empresas'])->name('contenido_empresas');
Route::get('/contenido_representantes', [inversionista::class, 'contenido_representantes'])->name('contenido_representantes');
Route::get('/datos_embajadas', [inversionista::class, 'datos_embajadas'])->name('datos_embajadas');
Route::get('/redes_sociales', [inversionista::class, 'redes_sociales'])->name('redes_sociales');
Route::get('/redes_sociales_delegados', [inversionista::class, 'redes_sociales_delegados'])->name('redes_sociales_delegados');
Route::get('/redes_sociales_empresas', [inversionista::class, 'redes_sociales_empresas'])->name('redes_sociales_empresas');
Route::get('/sectores_empresas', [inversionista::class, 'sectores_empresas'])->name('sectores_empresas');
Route::get('/sectores_fases', [inversionista::class, 'sectores_fases'])->name('sectores_fases');
Route::get('/asociador_er', [inversionista::class, 'asociador_er'])->name('asociador_er');
Route::get('/paises', [inversionista::class, 'paises'])->name('paises');
Route::get('/nacionalidades', [inversionista::class, 'nacionalidades'])->name('nacionalidades');

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

Route::put('/suspender_pdf_delegados_{id}', [inversionista::class, 'suspender_pdf_delegados'])->name('suspender_pdf_delegados');

Route::put('/suspender_pdf_{id}', [inversionista::class, 'suspender_pdf'])->name('suspender_pdf');


Route::get('/asociador_modificar_{id}', [inversionista::class, 'asociador_modificar'])->name('asociador_modificar');


Route::get('/asociador_registrar_{id}', [inversionista::class, 'asociador_registrar'])->name('asociador_registrar');

Route::post('/asociador_registrado', [inversionista::class, 'asociador_registrado'])->name('asociador_registrado');



Route::put('/asociador_modificador_{id}', [inversionista::class, 'asociador_modificador'])->name('asociador_modificador');



Route::put('/asociador_eliminar_{id}', [inversionista::class, 'asociador_eliminar'])->name('asociador_eliminar');


Route::get('/asociador_{id}', [inversionista::class, 'asociador'])->name('asociador');


Route::put('/embajada_modificador_{id}', [inversionista::class, 'embajada_modificador'])->name('embajada_modificador');

Route::get('/embajada_modificar_{id}', [inversionista::class, 'embajada_modificar'])->name('embajada_modificar');

Route::get('/embajada_print_{id}', [inversionista::class, 'embajada_print'])->name('embajada_print');

Route::get('/sector_vizualizador_{id}_{revision}', [inversionista::class, 'sector_vizualizador'])->name('sector_vizualizador');

Route::put('/sector_modificador_{id}', [inversionista::class, 'sector_modificador'])->name('sector_modificador');

Route::get('/sector_modificar_{id}', [inversionista::class, 'sector_modificar'])->name('sector_modificar');

Route::get('/sector_imprenta_{id}', [inversionista::class, 'sector_imprenta'])->name('sector_imprenta');


Route::get('/embajada_register_{id}', [inversionista::class, 'embajada_register'])->name('embajada_register');

Route::get('/embajada_{id}', [inversionista::class, 'embajada'])->name('embajada');

Route::get('/fases_{id}_{revision}', [inversionista::class, 'fases'])->name('fases');

Route::PUT('/fases_registro_{id}', [inversionista::class, 'fases_registro'])->name('fases_registro');




Route::post('/embajada_registrador', [inversionista::class, 'embajada_registrador'])->name('embajada_registrador');

Route::put('/embajada_eliminador_{id}', [inversionista::class, 'embajada_eliminador'])->name('embajada_eliminador');


Route::get('/sectores', [inversionista::class, 'sectores'])->name('sectores');

Route::get('/sectores_empresa_registro_{id}', [inversionista::class, 'sectores_empresa_registro'])->name('sectores_empresa_registro');

Route::post('/sectores_empresa_registrar', [inversionista::class, 'sectores_empresa_registrar'])->name('sectores_empresa_registrar');

Route::get('/search/sectors', 'inversionista@search')->name('search.sectors');


Route::get('/userpanel', [inversionista::class, 'userpanel'])->name('userpanel');


Route::get('/results', [inversionista::class, 'results'])->name('results');


Route::get('/configurations', [inversionista::class, 'configurations'])->name('configurations');

Route::get('/logout', [inversionista::class, 'logout'])->name('logout');