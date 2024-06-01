<?php

namespace App\Http\Controllers;

use App\Mail\welcome;
use App\Models\Doutores;
use App\Models\UserImages;
use App\Models\UsuarioDoutor;
use App\Models\UsuarioImagem;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stringable;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\stringContains;

class UsuariosController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:30|unique:Usuarios',
                'email' => 'required|unique:Usuarios|max:40|email',
                'password' => 'required|max:30|min:8',
                'sexo' => 'required|max:1|min:1',
                'naturalidade' => 'required',
                'telefone' => 'required|min:9|max:15',
                'bi' => 'required|min:15|max:15|unique:Usuarios',
            ],
            [
                'firstname.required' => 'Este campo é requerido.',
                'firstname.max' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'firstname.min' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'lastname.required' => 'Este campo é requerido.',
                'lastname.min' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'lastname.max' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'username.required' => 'Este campo é requerido.',
                'username.unique' => 'username já cadastrado.',
                'username.max' => 'username deve ter entre 3 à 30 caracteres.',
                'username.min' => 'username deve ter entre 3 à 30 caracteres.',
                'telefone.required' => 'Este campo é requerido.',
                'telefone.max' => 'telefone deve ter entre 9 à 15 caracteres.',
                'telefone.min' => 'telefone deve ter entre 9 à 15 caracteres.',
                'email.required' => 'Este campo é requerido.',
                'email.unique' => 'Email já cadastrado.',
                'email.max' => 'Email deve ter no máximo 40 caracteres .',
                'email' => 'Email inválido (exemplo@gmail.com)',
                'sexo.required' => 'Sexo é um campo requerido.',
                'sexo.max' => 'Apenas 1 carater permetido.',
                'sexo.min' => 'Apenas 1 carater permetido.',
                'password.required' => 'Password é um campo requerido.',
                'password.max' => 'Password deve ter entre 8 à 30 caracteres.',
                'password.min' => 'Password deve ter entre 8 à 30 caracteres.',
                'bi.min' => 'BI deve ter 15 carateres.',
                'bi.max' => 'BI deve ter 15 carateres.',
                'bi.required' => 'BI é requerido.',
                'bi.unique' => 'BI já cadastrado',
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
                    ["usernameIncorrect" => true]
                )
                ->withInput($request->all());
        }
        if (null !== $request->file('fotoFile')) {

            $formatImagesAvailable = ["jpg", "png", "jpeg"];
            $flag = false;

            for ($i = 0; $i < count($formatImagesAvailable); $i++) {
                if ($formatImagesAvailable[$i] == $request->file('fotoFile')->getClientOriginalExtension())
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
        }

        $usuario = new Usuarios();

        $isPasswordsEquals = $request->password == $request->repeat_password;

        if (!$isPasswordsEquals) return view('register', ['passwordError' => 'password não coincidem']);

        $usuario->firstname = $request->firstname;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->BI = $request->bi;
        $usuario->sexo = $request->sexo;
        $usuario->email = $request->email;
        $usuario->pass = Hash::make($request->password);
        $usuario->naturalidade = $request->naturalidade;
        $usuario->save();

        // store image in UserImages table:
        $userImages = new UsuarioImagem();

        $idUsuario = DB::connection()
            ->select("
            select Usuarios.idUsuario
            from Usuarios
            where Usuarios.BI = '$request->bi'
        ");

        if (null == $request->file('fotoFile')) {
            $userImages->extension = 'jpg';
            $userImages->idUsuario = $idUsuario[0]->idUsuario;
            $userImages->filename = 'avatar.png';
            $userImages->basename = 'avatar';
            $userImages->url = 'userPhotos/avatar.png';
            $userImages->save();
        }



        if (null !== $request->file('fotoFile')) {

            $userImages->extension = $request->file('fotoFile')
                ->getClientOriginalExtension();

            $originalNameImage = $request->file('fotoFile')->getClientOriginalName();

            if (str_ends_with(substr($originalNameImage, 0, -4), '.')) {
                $basenameImage = substr($originalNameImage, 0,  -5);
            } else {
                $basenameImage = substr($originalNameImage, 0, -4);
            }

            $userImages->idUsuario = $idUsuario[0]->idUsuario;
            $userImages->filename = $request->file('fotoFile')
                ->getClientOriginalName();

            $userImages->basename = $basenameImage;
            $userImages->url =
                $request->file('fotoFile')->store('userPhotos');

            $userImages->save();
        }
        // send an email to new user:
        $emailData = [
            "username" => $request->username
        ];

        Mail::to($request->email)->send(new welcome($emailData));

        return view('login', [
            'alert_success' => 'Usuário registrado com successo. '
        ]);
    }

    public function storeDoutores(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:30|unique:Usuarios',
                'email' => 'required|unique:Usuarios|max:40|email',
                'password' => 'required|max:30|min:8',
                'sexo' => 'required|max:1|min:1',
                'naturalidade' => 'required',
                'carteiraProfissional' => 'required|min:9|max:9|unique:Doutores',
                'especialidade' => 'required',
                'telefone' => 'required|min:9|max:15',
                'bi' => 'required|min:15|max:15|unique:Usuarios',
            ],
            [
                'firstname.required' => 'Este campo é requerido.',
                'firstname.max' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'firstname.min' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'lastname.required' => 'Este campo é requerido.',
                'lastname.min' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'lastname.max' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'username.required' => 'Este campo é requerido.',
                'username.unique' => 'username já cadastrado.',
                'username.max' => 'username deve ter entre 3 à 30 caracteres.',
                'username.min' => 'username deve ter entre 3 à 30 caracteres.',
                'telefone.required' => 'Este campo é requerido.',
                'telefone.max' => 'telefone deve ter entre 9 à 15 caracteres.',
                'telefone.min' => 'telefone deve ter entre 9 à 15 caracteres.',
                'email.required' => 'Este campo é requerido.',
                'email.unique' => 'Email já cadastrado.',
                'email.max' => 'Email deve ter no máximo 40 caracteres .',
                'email' => 'Email inválido (exemplo@gmail.com)',
                'sexo.required' => 'Sexo é um campo requerido.',
                'sexo.max' => 'Apenas 1 carater permetido.',
                'sexo.min' => 'Apenas 1 carater permetido.',
                'password.required' => 'Password é um campo requerido.',
                'password.max' => 'Password deve ter entre 8 à 30 caracteres.',
                'password.min' => 'Password deve ter entre 8 à 30 caracteres.',
                'bi.min' => 'BI deve ter 15 carateres.',
                'bi.max' => 'BI deve ter 15 carateres.',
                'bi.required' => 'BI é requerido.',
                'bi.unique' => 'BI já cadastrado',
                'carteiraProfissional.required' => 'dado é requerido',
                'carteiraProfissional.min' => 'carteira profissional deve ter no máximo 9 caracteres.',
                'carteiraProfissional.max' => 'carteira profissional deve ter no máximo 9 caracteres.',
                'carteiraProfissional.unique' => 'dado já cadastrado.',
                'especialidade.required' => 'especialidade é um campo requerido.',
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
                    ["usernameIncorrect" => true]
                )
                ->withInput($request->all());
        }
        if (null !== $request->file('fotoFile')) {

            $formatImagesAvailable = ["jpg", "png", "jpeg"];
            $flag = false;

            for ($i = 0; $i < count($formatImagesAvailable); $i++) {
                if ($formatImagesAvailable[$i] == $request->file('fotoFile')->getClientOriginalExtension())
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
        }

        $usuario = new Usuarios();

        $isPasswordsEquals = $request->password == $request->repeat_password;

        if (!$isPasswordsEquals) return view('register', ['passwordError' => 'password não coincidem']);

        $usuario->firstname = $request->firstname;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->BI = $request->bi;
        $usuario->sexo = $request->sexo;
        $usuario->email = $request->email;
        $usuario->tipo_usuario = 'doutor';
        $usuario->pass = Hash::make($request->password);
        $usuario->naturalidade = $request->naturalidade;
        $usuario->save();

        // store image in UserImages table:
        $userImages = new UsuarioImagem();

        $idUsuario = DB::connection()
            ->select("
            select Usuarios.idUsuario
            from Usuarios
            where Usuarios.BI = '$request->bi'
        ");

        if (null == $request->file('fotoFile')) {
            $userImages->extension = 'jpg';
            $userImages->idUsuario = $idUsuario[0]->idUsuario;
            $userImages->filename = 'avatar.png';
            $userImages->basename = 'avatar';
            $userImages->url = 'userPhotos/avatar.png';
            $userImages->save();
        }



        if (null !== $request->file('fotoFile')) {

            $userImages->extension = $request->file('fotoFile')
                ->getClientOriginalExtension();

            $originalNameImage = $request->file('fotoFile')->getClientOriginalName();

            if (str_ends_with(substr($originalNameImage, 0, -4), '.')) {
                $basenameImage = substr($originalNameImage, 0,  -5);
            } else {
                $basenameImage = substr($originalNameImage, 0, -4);
            }

            $userImages->idUsuario = $idUsuario[0]->idUsuario;
            $userImages->filename = $request->file('fotoFile')
                ->getClientOriginalName();

            $userImages->basename = $basenameImage;
            $userImages->url =
                $request->file('fotoFile')->store('userPhotos');

            $userImages->save();
        }

        // save dotor data

        $dotor = new Doutores();

        $dotor->firstname = $request->firstname;
        $dotor->lastname = $request->lastname;
        $dotor->carteiraProfissional = $request->carteiraProfissional;
        $dotor->BI = $request->bi;
        $dotor->idEspecialidade = $request->especialidade;
        $dotor->sex = $request->sexo;

        $dotor->save();

        $idDoutor = DB::connection()
            ->select("
            select max(idDoutor) AS idDoutor
            from Doutores;
        ");

        $usuariodoutor = new UsuarioDoutor();
        $usuariodoutor->idUsuario = $idUsuario[0]->idUsuario;
        $usuariodoutor->idDoutor = $idDoutor[0]->idDoutor;
        $usuariodoutor->save();

        // send an email to new user:
        $emailData = [
            "username" => $request->username
        ];

        Mail::to($request->email)->send(new welcome($emailData));

        return view('login', [
            'alert_success' => 'Usuário registrado com successo.  Faça o seu login!'
        ]);
    }

    public function show(Usuarios $usuarios)
    {
    }

    public function edit(Usuarios $usuarios)
    {
    }

    public function update(Request $request, Usuarios $usuarios)
    {
    }

    public function destroy(Usuarios $usuarios)
    {
    }

    public function updateFotoUser(Request $request)
    {
        $isFotoUserNull = null == $request->file('fotoUser');

        if ($isFotoUserNull) return redirect()->back();


        $extension = $request->file('fotoUser')
            ->getClientOriginalExtension();

        $originalNameImage = $request->file('fotoUser')->getClientOriginalName();

        if (str_ends_with(substr($originalNameImage, 0, -4), '.')) {
            $basenameImage = substr($originalNameImage, 0,  -5);
        } else {
            $basenameImage = substr($originalNameImage, 0, -4);
        }

        $email = @Session('loginSession')['email'];
        $idUsuario = DB::connection()->select("
        SELECT UsuarioImagens.idUsuario
        FROM UsuarioImagens
        INNER JOIN Usuarios
        on Usuarios.idUsuario = UsuarioImagens.idUsuario
        WHERE Usuarios.email = '$email'
        ");

        $idUsuario = $idUsuario[0]->idUsuario;
        $filename = $request->file('fotoUser')
            ->getClientOriginalName();

        $basename = $basenameImage;
        $url = $request->file('fotoUser')->store('userPhotos');

        $idUsuario = DB::connection()->select("
        UPDATE UsuarioImagens
        SET extension = '$extension',
        filename = '$filename',
        url = '$url',
        basename = '$basename'
        WHERE idUsuario = '$idUsuario'
        ");

        return redirect()->route('login');
    }
}
