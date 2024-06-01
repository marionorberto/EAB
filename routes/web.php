<?php

use App\Http\Controllers\AgendamentoConsultasController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\dashboardController;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('politicas-de-privacidade', 'privacy');
Route::view('termos-de-uso', 'terms-of-use');

Route::get('login', [loginControlador::class, 'index'])->name('login');
Route::post('login', [loginControlador::class, 'login']);
Route::get('logout', [loginControlador::class, 'logout']);
Route::get('recuperar-senha', [loginControlador::class, 'recuperarSenha']);
Route::post('recuperar-senha', [loginControlador::class, 'handleRecuperarSenha']);


Route::get('register', [UsuariosController::class, 'create'])
    ->name('register');

Route::resource('usuarios', UsuariosController::class);
Route::post('update-foto-user', [UsuariosController::class, 'updateFotoUser'])->name('update-photo-user');
Route::post('doutor/register', [UsuariosController::class, 'storeDoutores']);
Route::resource('consultas', ConsultasController::class)
    ->middleware('LoginAuth');
Route::resource('agendament_consultas', AgendamentoConsultasController::class);
Route::resource('endereco', EnderecoController::class);
Route::resource('notificacoes', NotificacoesController::class);
Route::resource('pacientes', PacientesController::class);
Route::resource('pacientes_consultas', PacienteConsultasController::class);
Route::resource('mensagem', MensagensController::class);
// Route::('mensagem', MensagensController::class);
Route::get('getData', [ConsultasController::class, 'getAllDoutores']);
Route::get('minhas-consultas', [ConsultasController::class, 'minhasConsultas'])
    ->name('minhas-consultas');

Route::resource('doutores', DoutoresController::class);
Route::get('/doutor/consulta/feita/{id}', [DoutoresController::class, 'feita'])->name('consulta-doutor-feita');
Route::get('/doutor/consulta/reagedada/{id}', [DoutoresController::class, 'reagendar'])->name('consulta-doutor-reagendar');
Route::get('doutor/create', [DoutoresController::class, 'registerNewDoutores']);

Route::resource('dashboard', dashboardController::class);
Route::prefix('dashboard')->group(function () {

    //dashboard Páginas
    Route::get('/paginas/usuarios', [dashboardController::class, 'getPaginasUsuarios'])
        ->name('dashboard-paginas-usuarios');
    Route::get('/paginas/especialidades', [dashboardController::class, 'getPaginasEspecialidades'])
        ->name('dashboard-paginas-especialidades');
    Route::get('/paginas/colaboradores', [dashboardController::class, 'getPaginasColaboradores'])
        ->name('dashboard-paginas-colaboradores');

    //dashboard Análises Route group
    Route::get('/analises/consultas', [dashboardController::class, 'getAnalisesConsultas'])
        ->name('dashboard-analises-consultas');
    Route::get('/analises/pacientes', [dashboardController::class, 'getAnalisesPacientes'])
        ->name('dashboard-analises-pacientes');
    Route::get('/analises/financeiro', [dashboardController::class, 'getAnalisesFinanceiro'])
        ->name('dashboard-analises-financeiro');

    //dashboard Usuario Route group
    Route::get('/usuario/settings', [dashboardController::class, 'getUsuarioSettings'])
        ->name('dashboard-usuario-settings');
    Route::get('/usuario/help', [dashboardController::class, 'getUsuarioHelp'])
        ->name('dashboard-usuario-help');

    //dashboard mensagens - notificacoes - noticias
    Route::get('/admin/mensagens', [dashboardController::class, 'getMensagens'])->name('dashboard-mensagens');
    Route::get('/admin/notificacoes', [dashboardController::class, 'getNotificacoes'])->name('dashboard-notificacoes');
    Route::get('/admin/notificacoes/aceitar/{id}', [dashboardController::class, 'aceitar'])->name('vaga-doutor-aceitar');
    Route::get('/admin/notificacoes/rejeitar/{id}', [dashboardController::class, 'rejeitar'])->name('vaga-doutor-rejeitar');
});



Route::get('hash', function () {
    $passHashed = Hash::make('12345678');

    dd($passHashed);
});
