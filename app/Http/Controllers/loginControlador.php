<?php

namespace App\Http\Controllers;

use App\Mail\RecoverPassword;
use App\Mail\welcome;
use App\Models\Usuarios;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class loginControlador extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $usuarios = new Usuarios();

        $usuario = $usuarios::where('email', $request->email)->get()->toArray();

        if (Count($usuario) <= 0) {

            return redirect()
                ->back()
                ->with(["emailError" => "Email inválido"])
                ->withInput($request->all());
        }

        $isPasswordRight = password_verify($request->password, $usuario[0]['pass']);

        if (!$isPasswordRight) {
            return redirect()
                ->back()
                ->with(["passwordError" => "Password inválida"])
                ->withInput($request->all());
        }

        $auxUsuario = $usuario[0]['idUsuario'];
        $urlUsuario = DB::connection()->select("
            select url
            from UsuarioImagens
            where idUsuario= '$auxUsuario'
        ");

        session()->put(
            'loginSession',
            [
                'username' =>  $usuario[0]['username'],
                'email' =>  $usuario[0]['email'],
                'tipoUsuario' =>  $usuario[0]['tipo_usuario'],
                'urlImgUsuario' =>  $urlUsuario[0]->url,
            ]
        );

        if ($usuario[0]['tipo_usuario'] == 'admin') {
            return redirect()->route('dashboard.index');
        } else if ($usuario[0]['tipo_usuario'] == 'doutor') {
            return redirect()->route('doutores.index');
        } else {

            return redirect()
                ->route('consultas.index');
        }
    }

    public function logout()
    {
        session()->flush('loginSession');

        return redirect()->route('login');
    }

    public function recuperarSenha()
    {
        // verificar se o email existe na base de dados:

        //*gerar a cod de 6 digitos e guardar na sessão:
        //enviar um email com o código de 6 digitos no email do usuarios

        //verificar se o código do email é o mesmo que foi gerado

        // mostrar a página para ele introduzir a nova senha

        // *apagar o cod de 6 dígitos da sessão
        // reecaminhar para a página de login para o

        return view('recuperar-senha');

        // dd($this->generateRandomNumbers());
        // session()->flush('loginSession');
        // return redirect()->route('login');
    }

    public function handleRecuperarSenha(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email|min:11|max:35"
            ],
            [
                "email.required" => "Email é um campo obrigatório.",
                "email.email" => "Email formato de email inváalido, reintroduza o seu email.",
                "email.min" => "Email deve ter entre 11 à 35 caracteres.",
                "email.max" => "Email deve ter entre 11 à 35 caracteres.",
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // verify with email exists in BD

        $user = DB::connection()->select("
        SELECT *
        FROM Usuarios
        WHERE email = '$request->email'
        ");

        $doesEmailExists = count($user[0]->email) > 0;

        if ($doesEmailExists == false) {
            return redirect()->back()->with(["emailNotFound" => true]);
        }

        $userName = $user[0]->firstname . ' ' . $user[0]->lastname;
        $codGenerated = $this->generateRandomNumbers();
        // Mail::to($request->email)->send(new RecoverPassword($userName, $codGenerated));
    }

    public function generateRandomNumbers()
    {
        $randNums = [];

        array_push($randNums, random_int(0, 9));
        array_push($randNums, random_int(0, 9));
        array_push($randNums, random_int(0, 9));
        array_push($randNums, random_int(0, 9));
        array_push($randNums, random_int(0, 9));
        array_push($randNums, random_int(0, 9));

        return implode($randNums);
    }
}
