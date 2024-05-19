<?php

namespace App\Http\Controllers;

use App\Mail\PedidoVagaDoutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class dashboardController extends Controller
{

    public function index()
    {
        if (null !== Session('loginSession')) {

            $adminData = DB::connection()->select("
            SELECT *
            FROM
            Usuarios
            WHERE tipo_usuario = 'admin';
            ");


            if (Session('loginSession')['tipoUsuario'] === 'admin') {

                $notificationCount = DB::connection()->select("
                 select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
                ");

                $messageCount = DB::connection()->select("
                select count(idMensagem) AS count from Mensagens where status = 'pendente'
                ");

                return view(
                    'admin.dashboard',
                    compact(
                        'adminData',
                        'notificationCount',
                        'messageCount'
                    )
                );
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "firstname" => "required|min:3|max:30",
                "lastname" => "required|min:3|max:30",
                "username" => "required|min:3|max:30",
            ],
            [
                "firstname.required" => "Primeiro nome é um campo obrigatório.",
                "firstname.min" => "Primeiro nome deve ter entre 3 à 30 caracteres,",
                "firstname.max" => "Primeiro nome deve ter entre 3 à 30 caracteres.",
                "lastname.required" => "Último nome é um campo obrigatório.",
                "lastname.min" => "último nome deve ter entre 3 à 30 caracteres.",
                "lastname.max" => "Último nome deve ter entre 3 à 30 caracteres.",
                "username.required" => "username é um campo obrigatório.",
                "username.max" => "username deve ter entre 3 à 30 caracteres.",
                "username.min" => "username deve ter entre 3 à 30 caracteres.",
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()->withErrors($validator);
        }

        $isStringFirstnameIncorrect = count(explode(" ", $request->firstname)) > 1;
        $isStringLastnameIncorrect = count(explode(" ", $request->lastname)) > 1;
        $isStringUsernameIncorrect = count(explode(" ", $request->username)) > 1;

        if ($isStringFirstnameIncorrect || $isStringLastnameIncorrect) {
            return redirect()
                ->back()
                ->with(
                    ["namesIncorret" => true]
                )
                ->withInput($request->all());
        }

        if ($isStringUsernameIncorrect) {
            return redirect()
                ->back()
                ->with(
                    ["usernameIncorret" => true]
                )
                ->withInput($request->all());
        }


        if (!isset($request->password) & isset($request->email)) {


            $emailExists = DB::connection()->select("
            SELECT * from Usuarios
            WHERE email = '$request->email'
            ");

            if (count($emailExists) > 0) {
                return redirect()->back()->with(["emailError" => true]);
            }

            DB::connection()->select("
            UPDATE Usuarios
            set firstname = '$request->firstname',
            lastname = '$request->lastname',
            username = '$request->username',
            email = '$request->email'
            WHERE idUsuario = '$id'
            ");

            session()->flush('loginSession');

            return redirect()->route('login');
        }


        if (isset($request->password) & !isset($request->email)) {
            if (strlen($request->password) < 8) {
                return redirect()->back()
                    ->with([
                        "errorsMessage" => ["passwordLenght" =>
                        "password deve ter no minimo 8 caracteres"]
                    ]);
            }

            $passHashed = Hash::make($request->password);

            DB::connection()->select("
            UPDATE Usuarios
            set firstname = '$request->firstname',
            lastname = '$request->lastname',
            username = '$request->username',
            pass = '$passHashed'
            WHERE idUsuario = '$id'
            ");

            session()->flush('loginSession');

            return redirect()->route('login');
        }


        if (!isset($request->password) & !isset($request->email)) {

            DB::connection()->select("
            UPDATE Usuarios
            set firstname = '$request->firstname',
            lastname = '$request->lastname',
            username = '$request->username'
            WHERE idUsuario = '$id'
            ");

            session()->flush('loginSession');

            return redirect()->route('login');
        }


        if (strlen($request->password) < 8) {
            return redirect()->back()
                ->with([
                    "errorsMessage" => ["passwordLenght" =>
                    "password deve ter no minimo 8 caracteres"]
                ]);
        }

        $passwordHashed = Hash::make($request->password);
        DB::connection()->select("
            UPDATE Usuarios
            set firstname = '$request->firstname',
            lastname = '$request->lastname',
            username = '$request->username',
            pass = '$passwordHashed',
            email = '$request->email'
            WHERE idUsuario = '$id'
            ");

        session()->flush('loginSession');

        return redirect()->route('login');
        Session()->flush('loginSession');

        return route('login');
    }

    public function destroy(string $id)
    {
        //
    }


    public function getPaginasUsuarios()
    {
        $usuarios = DB::connection()->select("
            select * from Usuarios;
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-paginas-usuarios', compact('usuarios', 'notificationCount', 'messageCount'));
    }

    public function getPaginasEspecialidades()
    {
        $especialidades = DB::connection()->select("
            select * from Especialidade;
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-paginas-especialidades', compact('especialidades', 'notificationCount', 'messageCount'));
    }

    public function getPaginasColaboradores()
    {
        $doutores = DB::connection()->select("

            select Doutores.idDoutor,Doutores.firstname, Doutores.lastname, Doutores.carteiraProfissional,
            Doutores.BI, Doutores.sex, Especialidade.descricao
            from Doutores
            join Especialidade
            on Doutores.idEspecialidade = Especialidade.idEspecialidade;
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-paginas-colaboradores', compact('doutores', 'notificationCount', 'messageCount'));
    }
    public function getAnalisesConsultas()
    {
        $consultas = DB::connection()->select("
        SELECT
            Doutores.firstname AS firstname_doutor,
            Doutores.lastname AS lastname_doutor,
            Pacientes.firstname AS firstname_paciente,
            Usuarios.username AS username,
            Pacientes.lastname AS lastname_paciente,
            Especialidade.descricao AS nome_especialidade,
            consulta_marcada.motivo AS motivo,
            consulta_marcada.idConsulta AS cod,
            consulta_marcada.status AS status,
            consulta_marcada.horario AS horario
        FROM
            consulta_marcada
        JOIN
            Doutores ON consulta_marcada.idDoutor = Doutores.idDoutor
        JOIN
            Usuarios ON consulta_marcada.idUsuario = Usuarios.idUsuario
        JOIN
            Pacientes ON consulta_marcada.idPaciente = Pacientes.idPaciente
        JOIN
            Especialidade ON consulta_marcada.idEspecialidade = Especialidade.idEspecialidade
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-analises-consultas', compact('consultas', 'notificationCount', 'messageCount'));
    }

    public function getAnalisesPacientes()
    {
        $pacientes = DB::connection()->select("
            select * from Pacientes;
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-analises-pacientes', compact('pacientes', 'notificationCount', 'messageCount'));
    }

    public function getAnalisesFinanceiro()
    {
        dd('getAnalisesFinanceiro');
    }

    public function getUsuarioHelp()
    {
        dd('getUsuarioHelp');
    }

    public function getMensagens()
    {
        $mensagens = DB::connection()->select("
            select *
            from Mensagens
            where status = 'pendente'
            order by idMensagem desc
            ;
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        return view('admin.dashboard-messages', compact('mensagens', 'notificationCount', 'messageCount'));
    }

    public function getNotificacoes()
    {
        $notifications = DB::connection()->select("
            select * from PedidoVagaDoutor where status = 'pendente'
        ");

        $notificationsAceites = DB::connection()->select("
            select * from PedidoVagaDoutor where status = 'aceite'
        ");

        $notificationsRejeitados = DB::connection()->select("
            select * from PedidoVagaDoutor where status = 'rejeitado'
        ");

        $notificationCount = DB::connection()->select("
            select count(idPedidoVagaDoutor) AS count from PedidoVagaDoutor where status = 'pendente'
        ");

        $messageCount = DB::connection()->select("
            select count(idMensagem) AS count from Mensagens where status = 'pendente'
        ");

        // Manda um email para o canditado: para apartir do deu email:

        return view('admin.dashboard-notifications', compact(
            'notifications',
            'notificationCount',
            'messageCount',
            'notificationsAceites',
            'notificationsRejeitados'
        ));
    }

    public function aceitar(string $id)
    {
        DB::connection()->select("
            update PedidoVagaDoutor
            set status = 'aceite'
            where idPedidoVagaDoutor = '$id'
        ");

        // Manda um email para o canditado: para apartir do deu email:
        $emailDoutor = DB::connection()->select("
            select email, firstname, lastname from PedidoVagaDoutor
            where idPedidoVagaDoutor = '$id'
        ");

        $status = 'aceite';
        Mail::to($emailDoutor[0]->email)->send(new PedidoVagaDoutor(
            $emailDoutor[0]->firstname,
            $emailDoutor[0]->lastname,
            $status
        ));

        return redirect()->back()->with(['pedidoAceite' => true]);
    }
    public function rejeitar(string $id)
    {
        DB::connection()->select("
            update PedidoVagaDoutor
            set status = 'rejeitado'
            where idPedidoVagaDoutor = '$id'
        ");

        // Manda um email para o canditado: para apartir do deu email:
        $emailDoutor = DB::connection()->select("
            select email, firstname, lastname from PedidoVagaDoutor
            where idPedidoVagaDoutor = '$id'
        ");

        $status = 'rejeitado';
        Mail::to($emailDoutor[0]->email)->send(new PedidoVagaDoutor(
            $emailDoutor[0]->firstname,
            $emailDoutor[0]->lastname,
            $status
        ));

        return redirect()->back()->with(['pedidoRejeitado' => true]);
    }
}
