<?php

use App\Http\Controllers\AgendamentoConsultasController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DoutoresController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoConsultasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\loginControlador;
use App\Http\Controllers\MensagensController;
use App\Http\Controllers\NotificacoesController;
use App\Http\Controllers\PacienteConsultasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\TipoConsultasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('termos-de-uso', function () {
    return view('terms-of-use');
});

Route::get('politicas-de-privacidade', function () {
    return view('privacy');
});

Route::get('login', [loginControlador::class, 'index'])->name('login');
Route::post('login', [loginControlador::class, 'login']);
Route::get('logout', [loginControlador::class, 'logout']);


Route::get('register', [UsuariosController::class, 'create'])
    ->name('register');

Route::resource('usuarios', UsuariosController::class);
Route::resource('consultas', ConsultasController::class)
    ->middleware('LoginAuth');
Route::resource('agendament_consultas', AgendamentoConsultasController::class);
Route::resource('endereco', EnderecoController::class);
Route::resource('estado_consultas', EstadoConsultasController::class);
Route::resource('horarios', HorariosController::class);
Route::resource('notificacoes', NotificacoesController::class);
Route::resource('pacientes', PacientesController::class);
Route::resource('pacientes_consultas', PacienteConsultasController::class);
Route::resource('telefone', TelefoneController::class);
Route::resource('tipo_consulta', TipoConsultasController::class);
Route::resource('mensagem', MensagensController::class);
Route::get('getData', [ConsultasController::class, 'getAllDoutores']);
Route::get('minhas-consultas', [ConsultasController::class, 'minhasConsultas'])
    ->name('minhas-consultas');

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('doutores', DoutoresController::class);
