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

////////////////////////////////////////////////VISTAS//////////////////////////////////////////////////

Route::get('/', function () {
    return view('index');
});


/////////////////////////////////////////////////LOGIN//////////////////////////////////////////////////////

Route::post('/', [inversionista::class, 'index'])->name('index');

Route::post('/dashboard', [inversionista::class, 'login'])->name('login');

Route::get('/dash_board', [inversionista::class, 'dashboard'])->name('dashboard');

Route::get('/logout', [inversionista::class, 'logout'])->name('logout');

/////////////////////////////////////////////////LOGIN//////////////////////////////////////////////////////

////////////////////////////////////////////////MODULO BUSQUEDAS///////////////////////////////////////////////

Route::get('busqueda.search', [inversionista::class, 'search'])->name('search');

Route::get('busqueda.result', [inversionista::class, 'result'])->name('result');

Route::get('busqueda.results', [inversionista::class, 'results'])->name('results');

////////////////////////////////////////////////MODULO BUSQUEDAS///////////////////////////////////////////////


////////////////////////////////////////////////MODULO USUARIOS///////////////////////////////////////////////

Route::get('usuarios.users', [inversionista::class, 'users'])->name('users');

Route::put('usuarios.delete_users_{id}', [inversionista::class, 'delete_users'])->name('delete_users');

Route::get('usuarios.edit_users_{id}', [inversionista::class, 'edit_users'])->name('edit_users');

Route::put('usuarios.update_users_{id}', [inversionista::class, 'update_users'])->name('update_users');

Route::put('usuarios.suspend_users_{id}', [inversionista::class, 'suspend_users'])->name('suspend_users');

Route::post('usuarios.users_register', [inversionista::class, 'users_register'])->name('users_register');

////////////////////////////////////////////////MODULO USUARIOS///////////////////////////////////////////////


////////////////////////////////////////////////MODULO EMPRESAS///////////////////////////////////////////////

Route::get('empresas.enterprises', [inversionista::class, 'enterprises'])->name('enterprises');

Route::post('empresas.enterprises_register', [inversionista::class, 'enterprises_register'])->name('enterprises_register');

Route::get('empresas.edit_enterprises_{id}', [inversionista::class, 'edit_enterprises'])->name('edit_enterprises');

Route::put('empresas.update_enterprises_{id}', [inversionista::class, 'update_enterprises'])->name('update_enterprises');

Route::put('empresas.suspend_enterprises_{id}', [inversionista::class, 'suspend_enterprises'])->name('suspend_enterprises');

Route::put('empresas.delete_enterprises_{id}', [inversionista::class, 'delete_enterprises'])->name('delete_enterprises');

////////////////////////////////////////////////MODULO REDES EMPRESAS///////////////////////////////////////////////

Route::get('empresas.rrss.add_web_{id}', [inversionista::class, 'add_web'])->name('add_web');

Route::get('empresas.rrss.edit_web_enterprise_{id}', [inversionista::class, 'edit_web_enterprise'])->name('edit_web_enterprise');

Route::post('empresas.rrss.web_register_enterprise', [inversionista::class, 'web_register_enterprise'])->name('web_register_enterprise');

Route::put('empresas.rrss.update_web_enterprise_inner_{id}', [inversionista::class, 'update_web_enterprise_inner'])->name('update_web_enterprise_inner');

Route::put('empresas.rrss.delete_web_enterprise_register_{id}', [inversionista::class, 'delete_web_enterprise_register'])->name('delete_web_enterprise_register');

////////////////////////////////////////////////MODULO REDES EMPRESAS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO DOCUMENTO EMPRESAS///////////////////////////////////////////////

Route::get('empresas.documentos.previews_{id}', [inversionista::class, 'previews'])->name('previews');

Route::get('empresas.documentos.prueba_pdf_{id}', [inversionista::class, 'prueba_pdf'])->name('prueba_pdf');

Route::post('empresas.documentos.elaborar', [inversionista::class, 'elaborar'])->name('elaborar');

Route::get('empresas.documentos.elaborador_{id}', [inversionista::class, 'elaborador'])->name('elaborador');

Route::put('empresas.documentos.revisar_{id}', [inversionista::class, 'revisar'])->name('revisar');

Route::put('empresas.documentos.certificar_{id}', [inversionista::class, 'certificar'])->name('certificar');

Route::get('empresas.documentos.modificar_elaborador_empresas_{id}', [inversionista::class, 'modificar_elaborador_empresas'])->name('modificar_elaborador_empresas');

Route::put('empresas.documentos.modificar_elaborar_empresas', [inversionista::class, 'modificar_elaborar_empresas'])->name('modificar_elaborar_empresas');

Route::put('empresas.documentos.suspender_pdf_{id}', [inversionista::class, 'suspender_pdf'])->name('suspender_pdf');

////////////////////////////////////////////////MODULO DOCUMENTO EMPRESAS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO ASOCIADOR EMPRESAS///////////////////////////////////////////////

Route::get('empresas.asociador.asociador_modificar_{id}', [inversionista::class, 'asociador_modificar'])->name('asociador_modificar');

Route::get('empresas.asociador.asociador_registrar_{id}', [inversionista::class, 'asociador_registrar'])->name('asociador_registrar');

Route::post('empresas.asociador.asociador_registrado', [inversionista::class, 'asociador_registrado'])->name('asociador_registrado');

Route::put('empresas.asociador.asociador_modificador_{id}', [inversionista::class, 'asociador_modificador'])->name('asociador_modificador');

Route::put('empresas.asociador.asociador_eliminar_{id}', [inversionista::class, 'asociador_eliminar'])->name('asociador_eliminar');

Route::get('empresas.asociador.asociador_{id}', [inversionista::class, 'asociador'])->name('asociador');

////////////////////////////////////////////////MODULO ASOCIADOR EMPRESAS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO EMBAJADA EMPRESAS///////////////////////////////////////////////

Route::put('empresas.embajada.embajada_modificador_{id}', [inversionista::class, 'embajada_modificador'])->name('embajada_modificador');

Route::get('empresas.embajada.embajada_modificar_{id}', [inversionista::class, 'embajada_modificar'])->name('embajada_modificar');

Route::get('empresas.embajada.embajada_print_{id}', [inversionista::class, 'embajada_print'])->name('embajada_print');

Route::get('empresas.embajada.embajada_register_{id}', [inversionista::class, 'embajada_register'])->name('embajada_register');

Route::get('empresas.embajada.embajada_{id}', [inversionista::class, 'embajada'])->name('embajada');

Route::post('empresas.embajada.embajada_registrador', [inversionista::class, 'embajada_registrador'])->name('embajada_registrador');

Route::put('empresas.embajada.embajada_eliminador_{id}', [inversionista::class, 'embajada_eliminador'])->name('embajada_eliminador');

////////////////////////////////////////////////MODULO EMBAJADA EMPRESAS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO EMPRESAS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO DELEGADOS///////////////////////////////////////////////

Route::get('delegados.delegates', [inversionista::class, 'delegates'])->name('delegates');

Route::post('delegados.delegates_register', [inversionista::class, 'delegates_register'])->name('delegates_register');

Route::get('delegados.edit_delegates_{id}', [inversionista::class, 'edit_delegates'])->name('edit_delegates');

Route::put('delegados.update_delegates_{id}', [inversionista::class, 'update_delegates'])->name('update_delegates');

Route::put('delegados.suspend_delegates_{id}', [inversionista::class, 'suspend_delegates'])->name('suspend_delegates');

Route::put('delegados.delete_delegates_{id}', [inversionista::class, 'delete_delegates'])->name('delete_delegates');

////////////////////////////////////////////////MODULO REDES DELEGADOS///////////////////////////////////////////////

Route::get('delegados.rrss.add_socialweb_{id}', [inversionista::class, 'add_socialweb'])->name('add_socialweb');

Route::post('delegados.rrss.web_register', [inversionista::class, 'web_register'])->name('web_register');

Route::get('delegados.rrss.edit_web_{id}', [inversionista::class, 'edit_web'])->name('edit_web');

Route::put('delegados.rrss.update_web_inner_{id}', [inversionista::class, 'update_web_inner'])->name('update_web_inner');

Route::put('delegados.rrss.delete_web_register_{id}', [inversionista::class, 'delete_web_register'])->name('delete_web_register');

////////////////////////////////////////////////MODULO REDES DELEGADOS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO DOCUMENTO DELEGADOS///////////////////////////////////////////////

Route::get('delegados.documentos.previews_delegates_{id}', [inversionista::class, 'previews_delegates'])->name('previews_delegates');

Route::get('delegados.documentos.prueba_delegates_pdf_{id}', [inversionista::class, 'prueba_delegates_pdf'])->name('prueba_delegates_pdf');

Route::get('delegados.documentos.elaborador_delegados_{id}', [inversionista::class, 'elaborador_delegados'])->name('elaborador_delegados');

Route::put('delegados.documentos.revisar_delegados_{id}', [inversionista::class, 'revisar_delegados'])->name('revisar_delegados');

Route::post('delegados.documentos.elaborar_delegates', [inversionista::class, 'elaborar_delegates'])->name('elaborar_delegates');

Route::get('delegados.documentos.modificar_elaborador_delegados_{id}', [inversionista::class, 'modificar_elaborador_delegados'])->name('modificar_elaborador_delegados');

Route::put('delegados.documentos.modificar_elaborar_delegados', [inversionista::class, 'modificar_elaborar_delegados'])->name('modificar_elaborar_delegados');

Route::put('delegados.documentos.suspender_pdf_delegados_{id}', [inversionista::class, 'suspender_pdf_delegados'])->name('suspender_pdf_delegados');

////////////////////////////////////////////////MODULO DOCUMENTO DELEGADOS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO DELEGADOS///////////////////////////////////////////////

////////////////////////////////////////////////MODULO SECTORES///////////////////////////////////////////////

Route::get('sectores.sector_vizualizador_{id}_{revision}', [inversionista::class, 'sector_vizualizador'])->name('sector_vizualizador');

Route::put('sectores.sector_modificador_{id}', [inversionista::class, 'sector_modificador'])->name('sector_modificador');

Route::get('sectores.sector_modificar_{id}', [inversionista::class, 'sector_modificar'])->name('sector_modificar');

Route::get('sectores.sector_imprenta_{id}', [inversionista::class, 'sector_imprenta'])->name('sector_imprenta');

Route::get('sectores.fases_{id}_{revision}', [inversionista::class, 'fases'])->name('fases');

Route::PUT('sectores.fases_registro_{id}', [inversionista::class, 'fases_registro'])->name('fases_registro');

Route::get('sectores.sectores', [inversionista::class, 'sectores'])->name('sectores');

Route::get('sectores.sectores_empresa_registro_{id}', [inversionista::class, 'sectores_empresa_registro'])->name('sectores_empresa_registro');

Route::post('sectores.sectores_empresa_registrar', [inversionista::class, 'sectores_empresa_registrar'])->name('sectores_empresa_registrar');

Route::get('sectores.search/sectors', 'inversionista@search')->name('search.sectors');

////////////////////////////////////////////////MODULO SECTORES///////////////////////////////////////////////

////////////////////////////////////////////////MODULO ACTIVIDADES///////////////////////////////////////////////

Route::get('actividades.actividades', [inversionista::class, 'actividades'])->name('actividades');
Route::get('actividades.usuarios', [inversionista::class, 'usuarios'])->name('usuarios');
Route::get('actividades.empresas', [inversionista::class, 'empresas'])->name('empresas');
Route::get('actividades.representantes', [inversionista::class, 'representantes'])->name('representantes');
Route::get('actividades.generos', [inversionista::class, 'generos'])->name('generos');
Route::get('actividades.sectores_d', [inversionista::class, 'sectores_d'])->name('sectores_d');
Route::get('actividades.estados_civiles', [inversionista::class, 'estados_civiles'])->name('estados_civiles');
Route::get('actividades.contenido_empresas', [inversionista::class, 'contenido_empresas'])->name('contenido_empresas');
Route::get('actividades.contenido_representantes', [inversionista::class, 'contenido_representantes'])->name('contenido_representantes');
Route::get('actividades.datos_embajadas', [inversionista::class, 'datos_embajadas'])->name('datos_embajadas');
Route::get('actividades.redes_sociales', [inversionista::class, 'redes_sociales'])->name('redes_sociales');
Route::get('actividades.redes_sociales_delegados', [inversionista::class, 'redes_sociales_delegados'])->name('redes_sociales_delegados');
Route::get('actividades.redes_sociales_empresas', [inversionista::class, 'redes_sociales_empresas'])->name('redes_sociales_empresas');
Route::get('actividades.sectores_empresas', [inversionista::class, 'sectores_empresas'])->name('sectores_empresas');
Route::get('actividades.sectores_fases', [inversionista::class, 'sectores_fases'])->name('sectores_fases');
Route::get('actividades.asociador_er', [inversionista::class, 'asociador_er'])->name('asociador_er');
Route::get('actividades.paises', [inversionista::class, 'paises'])->name('paises');
Route::get('actividades.nacionalidades', [inversionista::class, 'nacionalidades'])->name('nacionalidades');


Route::get('actividades.logss', [inversionista::class, 'logss'])->name('logss');

////////////////////////////////////////////////MODULO ACTIVIDADES///////////////////////////////////////////////


////////////////////////////////////////////////MODULO PANEL DE USUARIOS/////////////////////////////////////////////// SIN TERMINAR

Route::get('panel_nombre.userpanel', [inversionista::class, 'userpanel'])->name('userpanel');

////////////////////////////////////////////////MODULO PANEL DE USUARIOS/////////////////////////////////////////////// SIN TERMINAR


////////////////////////////////////////////////MODULO CONFIGURACIONES/////////////////////////////////////////////// SIN TERMINAR

Route::get('configuraciones.configurations', [inversionista::class, 'configurations'])->name('configurations');

////////////////////////////////////////////////MODULO CONFIGURACIONES/////////////////////////////////////////////// SIN TERMINAR



////////////////////////////////////////////////VISTAS////////////////////////////////////////////////// 

