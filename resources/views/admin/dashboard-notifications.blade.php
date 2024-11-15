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
            @if ( null !== session('pedidoAceite'))
            <div class="position-absolute bottom-0 end-0 mb-4 me-4 alert alert-success w-25 text-center">
                <span>
                    Pedido aceito com sucesso! <i class="icofont-info-circle"></i> <br>
                    <button type="button"
                        class="text-secondary text-decoration-underline text-bold border-0 bg-transparent"
                        data-bs-toggle="modal" data-bs-target="#aceites">
                        ver aceitos
                    </button>
                </span> <br>
                <span class="text-sm">O candidato recebeu um email de aceitação.</span>
            </div>
            @endif
            @if ( null !== session('pedidoRejeitado'))
            <div class="position-absolute bottom-0 end-0 mb-4 me-4 alert alert-success w-25 text-center">
                <span>
                    Pedido rejeitado com sucesso! <i class="icofont-info-circle"></i> <br>
                    <button type="button"
                        class="text-secondary text-bold border-0 text-decoration-underline bg-transparent"
                        data-bs-toggle="modal" data-bs-target="#rejeitados">
                        ver rejeitados
                    </button>
                </span> <br>
                <span class="text-sm">O candidato recebeu um email de rejeição.</span>
            </div>
            @endif

            <div class="sidebar-right-container">
                <div class="sidebar-right-top d-flex justify-content-between align-items-center">
                    <div><span class="text-secondary opacity-50 fs-4 fw-medium ms-4"><a
                                href="{{route('dashboard.index')}}">Dashboard</a> /<span
                                class="text-primary text-decoration-underline text-bold"> Notificações</span></span>
                    </div>
                    <span class="text-dark fs-4">Pedidos pendentes de vaga para Doutor</span>
                    <div class="me-4">
                        <a class="py-1 me-2" href="{{route('dashboard-mensagens')}}">
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
                <div class="sidebar-right-bottom text-dark p-4">

                    <!-- Modal Aceites -->
                    <div class="modal fade" id="aceites" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-lg modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title  align-self-center text-center fs-5" id="exampleModalLabel">
                                        Pedidos Aceites
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table id="" class="table table-hover small-fs-6 w-full">
                                        <thead class="tborder-0 border-bottom border-opacity-75 w-full">
                                            <tr class="text-medium small-fs-6 w-full">
                                                <th>COD</th>
                                                <th>NOME</th>
                                                <th>ESPECIALIDADE</th>
                                                <th>ANOS EXP.</th>
                                                <th>MOTIVO</th>
                                                <th>TELEFONE</th>
                                                <th>DOC</th>
                                                <th>DATA ENVIO</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-muted text-opacity-50 fs-6 w-full">
                                            @if(@count($notificationsAceites)<= 0) <tr>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                </tr>
                                                @else
                                                @foreach ($notificationsAceites as $notification)
                                                <tr class="md-fs-6">
                                                    <td>
                                                        {{$notification->idPedidoVagaDoutor}}
                                                    </td>
                                                    <td>
                                                        {{$notification->firstname}} {{$notification->lastname}}
                                                    </td>
                                                    <td>
                                                        {{
                                                        $notification->especialidade
                                                        }}
                                                    </td>
                                                    <td>
                                                        +{{$notification->anos_experiencia}}
                                                    </td>
                                                    <td>
                                                        @if (Str::length($notification->motivo) > 34)
                                                        {{
                                                        Str::substr($notification->motivo, 0, 34)
                                                        }}...
                                                        @else
                                                        {{
                                                        $notification->motivo
                                                        }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{$notification->telefone}}
                                                    </td>
                                                    <td>
                                                        <a target="blank" href="/storage/{{$notification->url_cv}}"
                                                            class="text-decoration-underline text-info">CV</a>
                                                    </td>
                                                    <td>
                                                        {{$notification->created_at}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="rejeitados" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-lg modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title  align-self-center text-center fs-5" id="exampleModalLabel">
                                        Pedidos
                                        Rejeitados
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table id="" class="table table-hover small-fs-6 w-full">
                                        <thead class="tborder-0 border-bottom border-opacity-75 w-full">
                                            <tr class="text-medium small-fs-6">
                                                <th>COD</th>
                                                <th>NOME</th>
                                                <th>ESPECIALIDADE</th>
                                                <th>ANOS EXP.</th>
                                                <th>MOTIVO</th>
                                                <th>TELEFONE</th>
                                                <th>DOC</th>
                                                <th>DATA ENVIO</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-muted text-opacity-50 fs-6 w-full">
                                            @if(@count($notificationsRejeitados)<= 0) <tr>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                                </tr>
                                                @else
                                                @foreach ($notificationsRejeitados as $notification)
                                                <tr class="md-fs-6">
                                                    <td>
                                                        {{$notification->idPedidoVagaDoutor}}
                                                    </td>
                                                    <td>
                                                        {{$notification->firstname}} {{$notification->lastname}}
                                                    </td>
                                                    <td>
                                                        {{
                                                        $notification->especialidade
                                                        }}
                                                    </td>
                                                    <td>
                                                        +{{$notification->anos_experiencia}}
                                                    </td>
                                                    <td>
                                                        @if (Str::length($notification->motivo) > 34)
                                                        {{
                                                        Str::substr($notification->motivo, 0, 34)
                                                        }}...
                                                        @else
                                                        {{
                                                        $notification->motivo
                                                        }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{$notification->telefone}}
                                                    </td>
                                                    <td>
                                                        <a target="blank" href="/storage/{{$notification->url_cv}}"
                                                            class="text-decoration-underline text-info">CV</a>
                                                    </td>
                                                    <td>
                                                        {{$notification->created_at}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start align-items-center gap-3">
                        <button type="button" class="text-success text-bold border-0 bg-transparent"
                            data-bs-toggle="modal" data-bs-target="#aceites">
                            ver aceites
                        </button>
                        <button type="button" class="text-danger text-bold border-0 bg-transparent"
                            data-bs-toggle="modal" data-bs-target="#rejeitados">
                            ver rejeitados
                        </button>
                    </div>
                    <table id="myTable" class="table table-hover small-fs-6">
                        @if(@count($notifications)<= 0) <div class="alert alert-warning opacity-75 text-center py-3">Sem
                            notificações no
                            momento.
                </div>
                @endif

                <thead class="tborder-0 border-bottom border-opacity-75">
                    <tr class="text-medium small-fs-6 w-full">
                        <th>COD</th>
                        <th>NOME</th>
                        <th>ESPECIALIDADE</th>
                        <th>ANOS EXP.</th>
                        <th>MOTIVO</th>
                        <th>TELEFONE</th>
                        <th>DOC</th>
                        <th>DATA ENVIO</th>
                        <th>ACÕES</th>
                    </tr>
                </thead>
                <tbody class="text-muted text-opacity-50 fs-6">
                    @if(@count($notifications)<= 0) <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </tr>
                        @else
                        @foreach ($notifications as $notification)
                        <tr class="md-fs-6">
                            <td>
                                {{$notification->idPedidoVagaDoutor}}
                            </td>
                            <td>
                                {{$notification->firstname}} {{$notification->lastname}}
                            </td>
                            <td>
                                {{
                                $notification->especialidade
                                }}
                            </td>
                            <td>
                                +{{$notification->anos_experiencia}}
                            </td>
                            <td>
                                @if (Str::length($notification->motivo) > 34)
                                {{
                                Str::substr($notification->motivo, 0, 34)
                                }}...
                                @else
                                {{
                                $notification->motivo
                                }}
                                @endif
                            </td>
                            <td>
                                {{$notification->telefone}}
                            </td>
                            <td>
                                <a target="blank" href="/storage/{{$notification->url_cv}}"
                                    class="text-decoration-underline text-info">CV</a>
                            </td>
                            <td>
                                {{$notification->created_at}}
                            </td>


                            <td class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{route('vaga-doutor-aceitar', $notification->idPedidoVagaDoutor)}}"
                                    class="text-white text-bold bg-success rounded-2 p-1 px-2">aceitar</a>
                                <a href="{{route('vaga-doutor-rejeitar', $notification->idPedidoVagaDoutor)}}"
                                    class="text-white text-bold bg-danger rounded-2 p-1 px-2">rejeitar</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
                </table>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{URL::to('js/dataTables.min.js')}}"></script>
<script src="{{URL::to('js/dataTables.dataTables.min.js')}}"></script>

<script>
    $('#myTable').DataTable({
            "ordering": true,
            "paging": true,
            "searching": true,
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado na tabela",
                "sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
                "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
</script>

</html>
