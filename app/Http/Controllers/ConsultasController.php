<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use App\Models\Doutores;
use App\Models\Especialidades;
use App\Models\Pacientes;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;
use function Psy\debug;

class ConsultasController extends Controller
{

    public function __construct(private $doutores = new Doutores(), private $especialidades = new Especialidades())
    {
        $this->doutores = $doutores::all()->toArray();
        $this->especialidades = $especialidades::all()->toArray();
    }

    public function index()
    {
        return view('consulta.index', [
            'doutores_data' => $this->doutores,
            'especialidades_data' => $this->especialidades,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $status = ['Pendente', 'Feita'];
        $this->validate(
            $request,
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'email' => 'required|max:40|email',
                'telefone' => 'required|min:9|max:15',
                'idade' => 'required|min:0|max:90',
                // 'peso' => 'required|min:2|max:300',
                // 'altura' => 'required|min:0|max:3',
                'motivo' => 'required|min:10'
            ],
            [
                'firstname.required' => 'Primeiro Nome é um campo requerido.',
                'firstname.max' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'firstname.min' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'lastname.required' => 'Último Nome é um campo requerido.',
                'lastname.min' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'lastname.max' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'telefone.required' => 'Telefone é um campo requerido.',
                'telefone.max' => 'telefone deve ter entre 9 à 15 caracteres.',
                'telefone.min' => 'telefone deve ter entre 9 à 15 caracteres.',
                'email.required' => 'Email é um campo  requerido.',
                'email.max' => 'Email deve ter no máximo 40 caracteres .',
                'email' => 'Email inválido (exemplo@gmail.com)',
                'idade.required' => 'Idade é um campo requerido.',
                'idade.min' => 'idade deve estar entre 0 à 90 anos.',
                'idade.max' => 'idade deve estar entre 0 à 90 anos.',
                // 'peso.required' => 'Peso é um campo requerido.',
                // 'peso.min' => 'peso deve estar entre 2 à 300 kg.',
                // 'peso.max' => 'peso deve estar entre 2 à 300 kg.',
                // 'altura.required' => 'Altura é um campo requerido.',
                // 'altura.min' => 'altura deve estar entre 0.60 à 3 metros.',
                // 'altura.max' => 'altura deve estar entre 0.60 à 3 metros.',
                'motivo.required' => 'Motivo da consulta é campo requerido.',
                'motivo.min' => 'Motivo da consulta deve ter no mínimo 10 caracteres.',
            ]
        );

        $paciente = new Pacientes();
        $telefone = new Telefone();
        $consulta = new Consultas();
        $paciente->firstname = $request->firstname;
        $paciente->lastname = $request->lastname;
        $paciente->email = $request->email;
        $paciente->idade = $request->idade;
        $paciente->peso = $request->peso;
        $paciente->altura = $request->altura;
        $paciente->save();

        $idPaciente = $paciente::where('lastname', $request->lastname)
            ->get()->last()->toArray()['idPaciente'];

        $telefone->telefone = $request->telefone;
        $telefone->idPaciente = $idPaciente;
        $telefone->save();

        $consulta->status = $status[0];
        $consulta->motivoDaConsulta = $request->motivo;
        $consulta->Horario = $request->horario;
        $consulta->idEspecialidade = $request->especialidade;
        $consulta->idDoutor = $request->doutor;

        $consulta->save();

        // if(error())

        Log::debug('marquei');
        return view('consulta.index', [
            'alert_success' => 'Consulta marcada com sucesso',
            // 'alert_danger' => 'Erro ao registrar a consulta.',
            'doutores_data' => $this->doutores,
            'especialidades_data' => $this->especialidades
        ]);
    }

    public function show(Consultas $consultas)
    {
        //
    }

    public function edit(Consultas $consultas)
    {
        //
    }

    public function update(Request $request, Consultas $consultas)
    {
        //
    }

    public function destroy(Consultas $consultas)
    {
        //
    }
}
