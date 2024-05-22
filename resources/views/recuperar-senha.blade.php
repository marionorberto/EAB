<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/responsive.css')}}">

    <title> EAB - Recuperar senha </title>
</head>

<body class="pb-4">

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
    @if($errors->has('email'))
    <div class="mx-auto w-50 alert alert-danger text-center text-danger mt-4">
        {{$errors->first('email')}}
    </div>
    @else
    <h1 class="fs-6 text-center">OBS: Enviaremos uma mensagem com o código de confirmação no teu email 📧.</h1>
    @endif
    @if(null !== session('emailNotFound'))
    <div class="mx-auto w-50 alert alert-danger text-center text-danger mt-4">
        Email introduzido não encotrado na nossa aplicação. Reintroduza o seu E-mail!
    </div>
    @endif
    <section class="d-flex justify-content-center align-content-center mb-5 pb-5">
        <div class="pt-3 mt-5 div-conainter-recuperar-senha shadow-sm">
            <form action="recuperar-senha" method="post"
                class="d-flex flex-column align-items-center justify-content-center gap-3">
                @csrf
                <h1 class="text-center fs-4 text-decoration-underline">Recuperação de senha <i
                        class="icofont-ui-password"></i></h1>
                <input type="email" name="email" placeholder="E-mail" class="input-recover rounded-2 mt-4 d-block">
                <button type="submit" class="btn rounded-2 w-full">Submeter</button>
                <span class="align-self-start ms-5">Tem conta? <a href="http://localhost:8000/login"
                        class="ms-1">Login</a></span>
            </form>
        </div>
    </section>
    <div class="d-flex gap-3 align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5">
        <a href="http://localhost:8000/politicas-de-privacidade" class="text-primary">Políticas de privacidade</a> <span
            class="text-primary fw-bolder">|</span>
        <a href="http://localhost:8000/termos-de-uso" class="text-primary">Termos de uso</a></span>
    </div>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <script src="{{URL::to('js/jquery-ui.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::to('js/main.js')}}"></script>
</body>

</html>
