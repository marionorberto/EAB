<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title> EAB - Medical Healthcare</title>
</head>

<body>

    <section class="d-flex gap-0 w-full w-100 text-white list-unstyled fw-medium">
        <div
            class="dashboard-sidebar-left d-flex flex-column gap-2 justify-content-start align-items-start align-content-center ps-5">
            <div class="me-auto  pt-3 pb-1">
                <a class=" d-flex gap-2  justify-content-center align-items-center p-1" href="http://localhost:8000/">
                    <i class="icofont-medical-sign-alt fs-3 text-primary fw-medium text-primary mb-0"></i>
                    <span class="fw-bold fs-6 text-center text-dark  eab-minhas-consultas"> EAB</span>
                </a>
            </div>
            <div class="mt-3 align-self-start ms-2 text-secondary mb-3">
                <img @if(null !==(@Session::get('loginSession')['urlImgUsuario']))
                    src="{{env('APP_URL')}}:8000/storage/{{@Session::get('loginSession')['urlImgUsuario']}}" @endif
                    alt=" profile-page-img" class="img-profile-page">
                <span class="text-secondary">{{@Session::get('loginSession')['username']}}</span>
            </div>
            <div class="">
                <li class=""><a href="{{route('dashboard.index')}}"><i class="icofont-home text-secondary">
                        </i> Dashboard</a></li>
            </div>
            <div class="mt-2">
                <span class="text-secondary mt-2 dashboard-sl-span"> Páginas</span>
                <ul class="list-unstyled d-flex flex-column gap-2 mt-2 position-relative w-full">
                    <li class="dashboard-sl-li"><a href="{{route('dashboard-paginas-usuarios')}}"><i
                                class="icofont-user text-secondary">
                            </i> Usuários</a></li>
                    <li class="dashboard-sl-li"><a href="{{route('dashboard-paginas-colaboradores')}}"> <i
                                class="icofont-doctor text-secondary">
                            </i> Colaboradores</a></li>
                    <li class="dashboard-sl-li" s><a href="{{route('dashboard-paginas-especialidades')}}"> <i
                                class="icofont-card text-secondary">
                            </i> Especialidades</a></li>
                </ul>
            </div>

            <div>

                <span class="text-secondary mt-2 dashboard-sl-span">Análises</span>
                <ul class="list-unstyled d-flex flex-column gap-2 mt-2 position-relative w-full">
                    <li class="dashboard-sl-li2"><a href="{{route('dashboard-analises-consultas')}}"><i
                                class="icofont-crutch text-secondary">
                            </i> Consultas</a></li>
                    <li class="dashboard-sl-li2"><a href="{{route('dashboard-analises-pacientes')}}"><i
                                class="icofont-operation-theater text-secondary">
                            </i> Pacientes</a></li>
                    <li class="dashboard-sl-li2"><a href="{{route('dashboard-analises-financeiro')}}"><i
                                class="icofont-money text-secondary">
                            </i>Estatísticas</a></li>
                </ul>
            </div>
            <div>
                <span class="text-secondary mt-2 dashboard-sl-span ">Usuário</span>
                <ul class="list-unstyled d-flex flex-column gap-2 mt-2 position-relative w-full">


                    <li class="dashboard-sl-li3"><a href="http://localhost:8000/logout"><i
                                class="icofont-logout text-secondary">
                            </i> Sair</a></li>
                </ul>
            </div>
        </div>
        <div class=" dashboard-sidebar-right position-relative">
            @if ( null !== session('errorsMessage'))
            <div class="position-absolute bottom-0 end-0 mb-4 me-4 alert alert-danger w-25 text-center">
                @foreach (session('errorsMessage') as $value)
                {{
                $value
                }}

                <i class="icofont-info-circle"></i>
                @endforeach
            </div>
            @endif

            <div class="sidebar-right-container">
                <div class="sidebar-right-top d-flex justify-content-between align-items-center">
                    <div><span class="text-secondary opacity-50 fs-4 fw-medium ms-4"><a
                                href="{{route('dashboard.index')}}">Dashboard</a> /<span
                                class="text-primary text-decoration-underline text-bold"> Admin</span></span></div>
                    <div class="me-4">
                        <<a class="py-1 me-2" href="{{route('dashboard-mensagens')}}">
                            <i class="position-relative icofont-ui-messaging fw-light text-black fs-5 w-8">
                                <span class="
                                        fs-6
                                        text-bolder
                                        fs-4
                                        text-info
                                        position-absolute" style="
                                    margin-top: -15px;
                                    right: -7px;
                                ">
                                    {{
                                    $messageCount[0]->count
                                    }}
                                </span>
                            </i>
                            </a>

                            <a class="py-1 me-2" href="{{route('dashboard-notificacoes')}}">
                                <i class="position-relative icofont-notification fw-light text-black p-0 fs-5 w-8">
                                    <span class="
                                        fs-6
                                        text-bolder
                                        fs-4
                                        text-info
                                        position-absolute" style="
                                    margin-top: -11px;
                                    right: -2px;
                                    ">
                                        {{
                                        $notificationCount[0]->count
                                        }}
                                    </span>
                                </i>
                            </a>

                    </div>
                </div>
                <div class="sidebar-right-bottom text-dark">
                    @if (request()->routeIs('dashboard.index'))
                    <div class="d-flex w-full">

                        <div class="w-25 rounded-2 m-3 dashboard-img-container-admin-img">
                            <img @if(null !==(@Session::get('loginSession')['urlImgUsuario']))
                                src="{{env('APP_URL')}}:8000/storage/{{@Session::get('loginSession')['urlImgUsuario']}}"
                                @endif alt=" profile-page-img" class="dashboard-right-admin-img rounded-1">
                        </div>
                        <div class="w-75 pe-4 pt-5">
                            <form action="{{route('dashboard.update', $adminData[0]->idUsuario)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="d-flex flex-column mb-2">
                                    <label for="" class="text-secondary">Primeiro Nome</label>
                                    <input type="text" name="firstname" value="{{$adminData[0]->firstname}}"
                                        class="w-full border-0 border-bottom btn-outline-secondary opacity-75">
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <label for="" class="text-secondary">Último Nome</label>
                                    <input type="text" name="lastname" value="{{$adminData[0]->lastname}}"
                                        class="w-full border-0 border-bottom btn-outline-secondary opacity-75">
                                </div>
                                @if (null !== session('namesIncorret'))
                                <span class="text-start text-danger span-error2 fs-6">
                                    Campo Primeiro & Último Nome não devem conter espaços.
                                </span>
                                <br>
                                @endif
                                <div class="d-flex flex-column mb-2">
                                    <label for="" class="text-secondary">username</label>
                                    <input type="text" name="username" value="{{$adminData[0]->username}}"
                                        class="w-full border-0 border-bottom btn-outline-secondary opacity-75">
                                </div>
                                @if (null !== session('usernameIncorret'))
                                <span class="text-start text-danger span-error2 fs-6">
                                    Campo username não deve conter espaços.
                                </span>
                                <br>
                                @endif
                                <div class="d-flex flex-column mb-2">
                                    <label for="" class="text-secondary">email</label>
                                    <input type="text" name="email"
                                        class="w-full border-0 border-bottom btn-outline-secondary opacity-75">
                                </div>
                                @if (null !== session('emailError'))
                                <span class="text-start text-danger span-error2 fs-6">
                                    email já cadastrado, escolha outro email.
                                </span>
                                <br>
                                @endif
                                <div class="d-flex flex-column mb-2">
                                    <label for="" class="text-secondary">password</label>
                                    <input type="text" name="password"
                                        class="w-full border-0 border-bottom btn-outline-secondary opacity-75">
                                </div>
                                <button type="submit" class="mt-3 text-bg-dark w-100 border-0 p-2">Atualizar<i
                                        class="icofont-loop"></i></button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

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
</body>

</html>
