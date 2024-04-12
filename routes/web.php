<?php

use App\Http\Controllers\AgendamentoConsultasController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoConsultasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\NotificacoesController;
use App\Http\Controllers\PacienteConsultasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\TipoConsultasController;
use App\Http\Controllers\UsuarioControlador;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('usuarios', UsuariosController::class);
Route::resource('consultas', ConsultasController::class);
Route::resource('agendament_consultas', AgendamentoConsultasController::class);
Route::resource('endereco', EnderecoController::class);
Route::resource('estado_consultas', EstadoConsultasController::class);
Route::resource('horarios', HorariosController::class);
Route::resource('notificacoes', NotificacoesController::class);
Route::resource('pacientes', PacientesController::class);
Route::resource('pacientes_consultas', PacienteConsultasController::class);
Route::resource('telefone', TelefoneController::class);
Route::resource('tipo_consulta', TipoConsultasController::class);
