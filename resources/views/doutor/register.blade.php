<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link of CSS files -->
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/fontawesome.min')}}">
    <link rel="stylesheet" href="{{URL::to('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/dark-style.css')}}">

    <title> EAB - doutor registro </title>
</head>

<body class="pb-4 body-login">

    <nav class="bg-light p-2 mb-5">
        <div class="row ms-4">
            <div class="col-12 p-2">
                <a class="navbar-brand " href="http://localhost:8000/">
                    <i class="icofont-medical-sign-alt fs-2 fw-medium text-primary"></i>
                    <span class="fw-bolder fs-5"> EAB</span> <br> <span
                        class="fw-light fs-6 fst-italic text-muted lh-sm">Efortless
                        Appointment
                        Booking</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar Area -->

    <h1 class="text-center">Junte-se à nossa equipe de colaboradores 🧑‍⚕️</h1>
    <section class="login-section mt-5 pt-5 mb-5">
        <div id="s-l" class="login-section-1 bg-primary">
            <a class="navbar-brand align-self-center mb-3" href="http://localhost:8000/">
                <i class="icofont-medical-sign-alt fs-2 fw-medium text-dark"></i>
                <span class="fw-bolder fs-5 text-light"> EAB</span> <br> <span
                    class="fw-bold fs-6 fst-italic text-white lh-sm">Efortless
                    Appointment
                    Booking</span>
            </a>
            <h1 class="text-white fw-medium mt-5">Faça o seu <strong>Registro</strong></h1>
            <h1 class="text-white fw-medium">na plataforma</h1>
            <h1>Junte-se à nós!</h1>
            <img src="{{URL::to('img/undraw_medicine_b-1-ol.svg')}}" alt="">
        </div>

        <div class="login-section-2">

            <form action="http://localhost:8000/doutor/register" enctype="multipart/form-data" method="post"
                class="d-flex flex-column gap-3">
                @csrf
                <h3 class="text-start">Registro</h3>
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Primeiro Nome" name="firstname" value="{{old('firstname')}}"
                        class="input-login">
                    <input type="text" placeholder="Último Nome" name="lastname" value="{{old('lastname')}}"
                        class="input-login">
                </div>
                @if (null !== session('namesIncorret'))
                <span class="text-start text-danger span-error2 fs-6">
                    Campo Primeiro Nome & Último Nome devem ter apenas um único
                    nome.
                </span>
                <br>
                @endif

                @if($errors->has('firstname'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('firstname')}}</span> <br>
                @endif
                @if($errors->has('lastname'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('lastname')}}</span> <br>
                @endif
                <div class="gap-2">
                    <input type="text" placeholder="username" name="username" value="{{old('username')}}"
                        class="input-login">
                </div>
                @if (null !== session('usernameIncorrect'))
                <span class="text-start text-danger span-error2 fs-6">
                    Campo username não deve conter espaços.
                </span>
                <br>
                @endif
                @if($errors->has('username'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('username')}}</span> <br>
                @endif
                <div class="gap-2">
                    <input type="email" placeholder="Email Address" name="email" value="{{old('email')}}"
                        class="input-login">
                </div>
                @if($errors->has('email'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('email')}}</span> <br>
                @endif
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Telefone" name="telefone" value="{{old('telefone')}}"
                        class="input-login">
                    <select name="sexo" id="" class="w-50 input-login bg-white">
                        <option value="">selecione... (sexo)</option>
                        <option value="M" @if (old('sexo')=='M' ) selected @endif>M - Masculino</option>
                        <option value="F" @if (old('sexo')=='F' ) selected @endif>F - Femenino</option>
                    </select>
                </div>
                @if($errors->has('telefone'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('telefone')}}</span> <br>
                @endif
                @if($errors->has('sexo'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('sexo')}}</span> <br>
                @endif
                <div class="login-container-bi-nacionalidade g-3">
                    <input type="text" class="text-secondary w-50 text-start input-login"
                        placeholder="BI - Bilhete de identidade" name="bi" value="{{old('bi')}}">

                    <select name="naturalidade" id="" class="w-50 text-start input-login bg-transparent">
                        <option value="">selecione... (nacionalidade) </option>
                        <option value="Angolana" @if (old('naturalidade')=='Angolana' ) selected @endif>🇦🇴 Angolana
                            (nacionalidade) </option>
                        <option value="Brasileira" @if (old('naturalidade')=='Brasileira' ) selected @endif>🇧🇷
                            Brasileira (nacionalidade)</option>
                        <option value="Portuguesa" @if (old('naturalidade')=='Portuguesa' ) selected @endif>🇵🇹
                            Portuguesa (nacionalidade)</option>
                    </select>
                </div>
                @if($errors->has('naturalidade'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('naturalidade')}}</span> <br>
                @endif
                @if($errors->has('bi'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('bi')}}</span> <br>
                @endif
                <div class="w-full">


                    <label for="fotoFile" id="label-fotoFile"
                        class="text-secondary  cursor-pointer border-secondary text-secondary font-bold border-1 text-center"
                        style="border-style: dashed">Carregar Foto - (OPCIONAL) <i
                            class="icofont-cloud-upload p-0 fs-4"></i></label>
                    <input type="file" name="fotoFile" id="fotoFile" placeholder="Foto"
                        class="input-login w-50 bg-text-dark d-none" accept=".png,.jpg,.jpeg" title="Escolher">

                </div>
                @if (null !== session('fileFormatError'))
                <span class="text-start text-danger span-error2 fs-6">
                    Formato da foto inválida.
                </span>
                <br>
                @endif
                <div class="d-flex gap-2">
                    <input type="text" class="text-secondary w-50 text-start input-login"
                        placeholder="carteira profissional" name="carteiraProfissional"
                        value="{{old('carteiraProfissional')}}">

                    <select name="especialidade" id="especialidade" {{old('especialidade')}}
                        class="text-secondary w-50 text-start input-login">
                        <option value="" class="text-opacity-50">selecione...(especialidade)</option>
                        @if (count($especialidades_data)>0)
                        @foreach ($especialidades_data as $esp)
                        <option value="{{$esp['idEspecialidade']}}">{{$esp['descricao']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                @if($errors->has('carteiraProfissional'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('carteiraProfissional')}}</span>
                <br>
                @endif
                @if($errors->has('especialidade'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('especialidade')}}</span> <br>
                @endif
                <div class="d-flex flex-column gap-4">
                    <input type="password" placeholder="Password" name="password" class="input-login">
                    <input type="password" placeholder="Repeat password" name="repeat_password" class="input-login">
                </div>
                @if($errors->has('repeat_password'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('repeat_password')}}</span> <br>
                @endif
                @if($errors->has('password'))
                <span class="text-start text-danger span-error2 fs-6"> {{$errors->first('password')}}</span> <br>
                @endif
                @if(isset($passwordError))
                <span class="text-start text-danger span-error2 fs-6 mb-4">{{$passwordError}}</span>
                @endif
                <div>
                    <button type="submit" class="btn">Registrar</button>
                </div>

            </form>

        </div>

    </section>

    <div class="d-flex flex-column gap-3 align-items-center justify-content-center mt-3 mb-5">
        <div class="d-flex gap-3 align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5">
            <a href="http://localhost:8000/politicas-de-privacidade" class="text-primary">Políticas de privacidade</a>
            <span class="text-primary fw-bolder">|</span>
            <a href="http://localhost:8000/termos-de-uso" class="text-primary">Termos de uso</a></span>
        </div>
    </div>




    <!-- Link of JS files -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <script src="{{URL::to('js/jquery-ui.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::to('js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::to('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::to('js/jquery.mixitup.min.js')}}"></script>
    <script src="{{URL::to('js/form-validator.min.js')}}"></script>
    <script src="{{URL::to('js/contact-form-script.js')}}"></script>
    <script src="{{URL::to('js/main.js')}}"></script>
    <script src="{{URL::to('js/three.r134.min.js')}}"></script>
    <script src="{{URL::to('js/vanta.net.min.js')}}"></script>
    <script src="{{URL::to('js/vanta.halo.min.js')}}"></script>
    <script>
        const inputFoto = document.getElementById('fotoFile');
    const label = document.getElementById('label-fotoFile');

    inputFoto.addEventListener('change', (e) => {
            label.innerText = 'caminho ' + e.target.value;
    });

    </script>
</body>

</html>