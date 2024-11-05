<?php

namespace App\Http\Controllers;

use App\Mail\ReagendamentoConsulta;
use App\Models\Consultas;
use App\Models\Doutores;
use App\Models\Especialidades;
use App\Models\PedidoVagaDoutor;
use App\Models\PedidoVagaDoutorCurriculum;
use App\Models\UsuarioDoutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use DateTime;

class DoutoresController extends Controller
{

    public function index()
    {
        $consultas = new Consultas();
        $consultas = Consultas::all();

        $dateNow = new Datetime('now');
        $dateNowYear = $dateNow->format('Y');
        $dateNowMonth = $dateNow->format('m');
        $dateNowDay = $dateNow->format('d');
        $dateNow = $dateNowYear . '-' . $dateNowMonth . '-' . $dateNowDay + 1;

        $usuarioEmail = @Session('loginSession')['email'];

        $usuarioData = DB::connection()->select("
            select * from Usuarios where email = '$usuarioEmail'
        ");

        $idUsuario = $usuarioData[0]->idUsuario;

        $result = DB::connection()->select("
            select idDoutor from UsuariosDoutores where idUsuario = '$idUsuario'
        ");


        $idDoutor = $result[0]->idDoutor;

        $consultaData = DB::connection()->select("
        SELECT
            consulta_marcada.idConsulta AS idConsulta,
            Pacientes.firstname AS firstname_paciente,
            Pacientes.lastname AS lastname_paciente,
            Pacientes.idade AS idade,
            consulta_marcada.motivo AS motivo,
            consulta_marcada.status AS status,
            consulta_marcada.horario AS horario
        FROM
            consulta_marcada
        JOIN
            Doutores ON consulta_marcada.idDoutor = Doutores.idDoutor
        JOIN
            Pacientes ON consulta_marcada.idPaciente = Pacientes.idPaciente
        WHERE
            consulta_marcada.idDoutor = '$idDoutor';
        ");

        $consultaPendenteContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'pendente' and consulta_marcada.idDoutor = '$idDoutor';
        ");

        $consultaCanceladaContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'cancelada' and consulta_marcada.idDoutor = '$idDoutor';
        ");

        $consultaFeitaContagem = DB::connection()
            ->select("
        SELECT
            count(status) as count
        FROM
            consulta_marcada
        WHERE
            status = 'feita' and consulta_marcada.idDoutor = '$idDoutor';
        ");

        return view('doutor.minhas-consultas', compact(
            'consultaData',
            'usuarioData',
            'consultaPendenteContagem',
            'consultaCanceladaContagem',
            'dateNow',
            'consultaFeitaContagem'
        ));
    }

    public function create()
    {
        $especialidade = new Especialidades();
        $especialidades_data = $especialidade::all();

        if (@Session('loginSession')['tipoUsuario'] == 'admin') {
            return redirect()->back();
        }

        return view('doutor.store', compact('especialidades_data'));
    }

    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'carteiraProfissional' => 'required|max:9',
                'telefone' => 'required|min:9|max:15',
                'nacionalidade' => 'required|min:8|max:11',
                'sexo' => 'required|max:1',
                'email' => 'required|min:10|max:30',
                'especialidade' => 'required',
                'experiencia' => 'required|max:2',
                'endereco' => 'required|min:10|max:35',
                'cv' => 'required',
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
                'nacionalidade.required' => 'nacionalidade é um campo requerido.',
                'carteiraProfissional.max' => 'Carteira Profissional deve ter 9 caracteres',
                'carteiraProfissional.min' => 'Carteira Profissional deve ter 9 caracteres',
                'nacionalidade.min' => 'nacionalidade mal preenchido.',
                'nacionalidade.max' => 'nacionalidade mal preenchido.',
                'motivo.required' => 'Motivo da consulta é campo requerido.',
                'motivo.min' => 'Motivo da consulta deve ter no mínimo 10 caracteres.',
                'cv.required' => 'Documento não carregado. clique em cima para carregar.',
                'endereco.required' => 'Endereco é um campo obrigatório. Seguindo o formato Ex: Angola - Luanda  - Cazenga',
                'endereco.max' => 'Endereco deve ter entre 10 à 35 caracteres. Seguindo o formato Ex: Angola - Luanda - Cazenga',
                'endereco.min' => 'Endereco deve ter entre 10 à 35 caracteres. Seguindo o formato Ex: Angola - Luanda - Cazenga',
                'experiencia.required' => 'Experiencia é um campo obrigatório.',
                'experiencia.max' => 'Experiencia não preenchido devidamente.',
                'especialidade.required' => 'Especialidade é um campo obrigatório.',
                'email.required' => 'Email é um campo obrigatório.',
                'email.max' => 'Email deve ter entre 10 à 30 caracteres.',
                'email.min' => 'Email deve ter entre 10 à 30 caracteres.',
                'sexo.required' => 'Sexo é obrigatório',
                'sexo.min' => 'Sexo não preenchido devidamente.',
                'sexo.max' => 'Sexo não preenchido devidamente.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->all());
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

        $formatDocsAvailable = ["pdf"];
        $flag = false;

        for ($i = 0; $i < count($formatDocsAvailable); $i++) {
            if ($formatDocsAvailable[$i] == $request->file('cv')->getClientOriginalExtension())
                $flag  = true;
        }

        if ($flag == false) {
            return redirect()
                ->back()
                ->with(
                    ["fileFormatError" => true]
                )
                ->withInput($request->all());
        }

        $pedidoVagaDoutor = new PedidoVagaDoutor();

        $pedidoVagaDoutor->firstname = $request->firstname;
        $pedidoVagaDoutor->lastname = $request->lastname;
        $pedidoVagaDoutor->carteira_profissional = $request->carteiraProfissional;
        $pedidoVagaDoutor->telefone = $request->telefone;
        $pedidoVagaDoutor->nacionalidade = $request->nacionalidade;
        $pedidoVagaDoutor->email = $request->email;
        $pedidoVagaDoutor->especialidade = $request->especialidade;
        $pedidoVagaDoutor->anos_experiencia = $request->experiencia;
        $pedidoVagaDoutor->endereco = $request->endereco;
        $pedidoVagaDoutor->motivo = $request->motivo;
        $pedidoVagaDoutor->sexo = $request->sexo;


        $pedidoVagaDoutor->url_cv = $request->file('cv')->store('userPhotos');
        $pedidoVagaDoutor->save();

        return redirect()->back()->with(["requestSucess" => true]);
    }

    public function show(Doutores $doutores)
    {
        //
    }

    public function edit(Doutores $doutores)
    {
        //
    }

    public function update(Request $request, Doutores $doutores)
    {
        //
    }

    public function destroy(Doutores $doutores)
    {
        //
    }
    public function registerNewDoutores()
    {
        $especialidade = new  Especialidades();

        $especialidades_data = $especialidade::all();
        // dd($especialidade_data);
        return view('doutor.register', compact('especialidades_data'));
    }
    public function feita(string $id)
    {


        $datetime = new DateTime('now');
        $currentDate = $datetime->format('Y-m-d H:m:s');


        $bookingDate = DB::connection()->select("
        SELECT horario
        FROM consulta_marcada where idConsulta = '$id'
        ");

        $isAllowedSwitchDone = $currentDate >= $bookingDate[0]->horario;

        if (!$isAllowedSwitchDone) return redirect()->back()->with(['bookingCheckFail' => true]);

        DB::connection()->select("
            update consulta_marcada
            set status = 'feita'
            where idConsulta = '$id'
        ");

        return redirect()->back()->with(['pedidoAceite' => true]);
    }

    public function reagendar(string $id, Request $request)
    {
        $dateNow = new DateTime('now');

        if ($request->date == $dateNow->format('Y-m-d')) {
            return redirect()->back()->with(
                ["dataInvalida" => true]
            )
                ->withInput($request->all());
        }

        $emailDoutor = Session('loginSession')['email'];

        $res = DB::connection()->select("
            SELECT UsuariosDoutores.idDoutor AS dotor from UsuariosDoutores
            INNER JOIN Usuarios
            on UsuariosDoutores.idUsuario = Usuarios.idUsuario
            where Usuarios.email = '$emailDoutor'
        ");

        $idDoutor = $res[0]->dotor;

        $occupedDate = DB::connection()
            ->select("
            select idDoutor, horario
            from consulta_marcada
            where idDoutor = '$idDoutor' and horario = '$request->data $request->hora'
        ");

        if (count($occupedDate) > 0) {
            return redirect()
                ->back()
                ->with(
                    ["dataOccupedError" => true]
                )
                ->withInput($request->all());
        }


        DB::connection()->select("
            update consulta_marcada
            set status = 'cancelada'
            where idConsulta = '$id'
        ");

        $consultaData = DB::connection()->select("
             select *  from consulta_marcada
            where idConsulta = '$id'
        ");

        $dataNovaConsulta = $request->data . ' ' . $request->hora;

        $formatedConsultaData = $consultaData[0];

        $consultaData = DB::connection()->select("
             INSERT INTO consulta_marcada(motivo, status, horario, idEspecialidade, idPaciente, idDoutor, idUsuario, created_at, updated_at)
                VALUES(
                    '$formatedConsultaData->motivo', 'pendente', '$dataNovaConsulta', '$formatedConsultaData->idEspecialidade',
                    '$formatedConsultaData->idPaciente', '$formatedConsultaData->idDoutor', '$formatedConsultaData->idUsuario', now(), now()
                );
        ");

        $emailPaciente = DB::connection()->select("
            select email
            from Usuarios
            where idUsuario = '$formatedConsultaData->idUsuario'
        ");

        Mail::to($emailPaciente[0]->email)->send(new ReagendamentoConsulta(
            $request->dotor,
            $request->horario,
            $dataNovaConsulta,
            $request->paciente,
        ));

        return redirect()->back()->with(['pedidoReagendado' => true]);
    }

    private function remiderBooking()
    {
        $rawBoooking = DB::connection()->select("
        SELECT horario
        FROM consulta_marcada
        where h


        ");
    }
}
