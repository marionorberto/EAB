<?php

namespace App\Http\Controllers;

use App\Mail\ConsultaMail;
use App\Mail\Contact;
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
use Illuminate\Contracts\Mail\Mailable;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultaMarcada;
use App\Models\PacienteConsultas;
use App\Models\User;
use App\Notifications\consultaMarcada as NotificationsConsultaMarcada;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ConsultasController extends Controller
{

    public function __construct(private $especialidades = new Especialidades())
    {
        $this->especialidades = $especialidades::all()->toArray();
    }

    public function index()
    {
        if (@Session('loginSession')['tipoUsuario'] == 'admin') {
            return redirect()->back();
        }

        return view('consulta.index', [
            'especialidades_data' => $this->especialidades,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'telefone' => 'required|min:9|max:15',
                'idade' => 'required|min:0|max:90',
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
                'idade.required' => 'Idade é um campo requerido.',
                'idade.min' => 'idade deve estar entre 0 à 90 anos.',
                'idade.max' => 'idade deve estar entre 0 à 90 anos.',
                'motivo.required' => 'Motivo da consulta é campo requerido.',
                'motivo.min' => 'Motivo da consulta deve ter no mínimo 10 caracteres.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $isStringFirstnameIncorrect = count(explode(" ", $request->firstname)) > 1;
        $isStringLastnameIncorrect = count(explode(" ", $request->lastname)) > 1;

        if ($isStringFirstnameIncorrect || $isStringLastnameIncorrect) {
            return redirect()
                ->back()
                ->with(
                    ["namesIncorret" => true]
                )
                ->withInput($request->all());
        }

        $paciente = new Pacientes();
        $telefone = new Telefone();
        $consulta = new Consultas();
        $pacienteConsulta = new PacienteConsultas();

        $arrayDoutorName = explode(" ", $request->doutor);

        $resultado = DB::connection('mysql')->select("
        select idDoutor
        from Doutores
        where Doutores.firstname='$arrayDoutorName[0]'
        and Doutores.lastname='$arrayDoutorName[1]'
        ");

        if (!empty($resultado)) {
            $primeiroResultado = $resultado[0];
            $idDoutor = $primeiroResultado->idDoutor;
        }

        $occupedDate = DB::connection()
            ->select("
            select idDoutor, horario
            from consulta_marcada
            where idDoutor='$idDoutor' and horario='$request->data $request->hora'
        ");

        if (count($occupedDate) > 0) {
            return redirect()
                ->back()
                ->with(
                    ["dataOccupedError" => true]
                )
                ->withInput($request->all());
        }

        $paciente->firstname = $request->firstname;
        $paciente->lastname = $request->lastname;
        $paciente->email =  @Session('loginSession')['email'];
        $paciente->idade = $request->idade;
        $paciente->save();

        $idPaciente = DB::connection()->select("
            select max(idPaciente) idPaciente from Pacientes
        ");

        $telefone->telefone = $request->telefone;
        $telefone->idPaciente = $idPaciente[0]->idPaciente;
        $telefone->save();

        $consulta->motivo = $request->motivo;
        $consulta->idPaciente = $idPaciente[0]->idPaciente;
        $consulta->horario = $request->data . 'T' . $request->hora;
        $consulta->idEspecialidade = $request->especialidade;

        $emailUsuario = Session('loginSession')['email'];
        $idUsuario = DB::connection()
            ->select("
            select idUsuario
            from Usuarios
            where email = '$emailUsuario'
        ");

        $consulta->idUsuario = $idUsuario[0]->idUsuario;
        $consulta->idDoutor = $idDoutor;
        $consulta->save();

        // store in PacienteConsulta table (see how to get id after saving):
        $lastConsultaRegister =  DB::connection()->select("
            select max(idConsulta) lastRegister from consulta_marcada
        ");

        $lastPacientesRegister =  DB::connection()->select("
            select max(idPaciente) lastRegister from Pacientes
        ");

        $pacienteConsulta->idPaciente = $lastPacientesRegister[0]->lastRegister;
        $pacienteConsulta->idConsulta = $lastConsultaRegister[0]->lastRegister;
        $pacienteConsulta->save();

        $emailBody = [
            "subject" => 'Marcação de consulta online',
            "username" => @Session('loginSession')['username'],
            "dotor" => "$arrayDoutorName[0] $arrayDoutorName[1]",
            "horario" => $consulta->horario,
        ];

        Mail::to(@Session('loginSession')['email'])
            ->send(new ConsultaMarcada($emailBody));

        return view('consulta.index', [
            'alert_success' => 'Consulta marcada com sucesso',
            'especialidades_data' => $this->especialidades
        ]);
    }

    public function show(Consultas $consultas)
    {
    }

    public function edit(Consultas $consultas)
    {
    }

    public function update(Request $request, Consultas $consultas)
    {
    }

    public function destroy(Consultas $consultas)
    {
    }

    public function getAllDoutores(Request $request)
    {

        $doutores = DB::connection('mysql')->select("
          select Doutores.firstname, Doutores.lastname
            from Doutores
            inner join Especialidade
            on Doutores.idEspecialidade = Especialidade.idEspecialidade
            where Especialidade.idEspecialidade='$request->data'
        ");

        return response()->json($doutores);
    }

    public function minhasConsultas()
    {

        $consultas = new Consultas();
        $consultas = Consultas::all();

        $usuarioEmail = @Session('loginSession')['email'];

        $usuarioData = DB::connection()->select("
            select * from Usuarios where email = '$usuarioEmail'
        ");

        $idUsuario = $usuarioData[0]->idUsuario;


        $consultaData = DB::connection()->select("
        SELECT
            Doutores.firstname AS firstname_doutor,
            Doutores.lastname AS lastname_doutor,
            Pacientes.firstname AS firstname_paciente,
            Pacientes.lastname AS lastname_paciente,
            Especialidade.descricao AS nome_especialidade,
            consulta_marcada.motivo AS motivo,
            consulta_marcada.status AS status,
            consulta_marcada.horario AS horario
        FROM
            consulta_marcada
        JOIN
            Doutores ON consulta_marcada.idDoutor = Doutores.idDoutor
        JOIN
            Pacientes ON consulta_marcada.idPaciente = Pacientes.idPaciente
        JOIN
            Especialidade ON consulta_marcada.idEspecialidade = Especialidade.idEspecialidade
        WHERE
            consulta_marcada.idUsuario = '$idUsuario';
        ");

        $consultaPendenteContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'pendente' and consulta_marcada.idUsuario = '$idUsuario';
        ");

        $consultaCanceladaContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'cancelada' and consulta_marcada.idUsuario = '$idUsuario';
        ");

        $consultaFeitaContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'feita' and consulta_marcada.idUsuario = '$idUsuario';
        ");

        return view('consulta.minhas-consultas', compact(
            'consultaData',
            'usuarioData',
            'consultaPendenteContagem',
            'consultaCanceladaContagem',
            'consultaFeitaContagem'
        ));
    }
}
