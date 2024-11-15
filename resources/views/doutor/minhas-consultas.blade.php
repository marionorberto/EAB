<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/fontawesome.min')}}">
    <link rel="stylesheet" href="{{URL::to('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/dark-style.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/dataTables.dataTables.min.css')}}">

    <title> EAB - Medical Healthcare & Doctors Clinic </title>
</head>

<body class="pb-4 body-login">
    <div class="container-logo-minhas-consultas">
        <a class="d-flex justify-content-center align-items-center gap-0 flex-column" href="http://localhost:8000/">
            <i class="icofont-medical-sign-alt fs-2 fw-medium text-primary mb-0"></i>
            <span class="fw-bolder fs-5 text-center text-dark eab-minhas-consultas"> EAB</span>
            <span class="fw-medium fs-5 fst-italic text-secondary">Efortless Appointment Booking</span>
        </a>
    </div>

    <section class="table-container">
        @if (null !== session('pedidoAceite'))
        <div class="alert alert-success opacity-75 mb-md-5 text-center me-auto ms-auto">
            consulta marcada como feita 👌
        </div>
        @endif
        @if (null !== session('pedidoReagendado'))
        <div class="alert alert-success opacity-75 mb-md-5 text-center me-auto ms-auto">
            consulta reagendada 👌
        </div>
        @endif
        @if (null !== session('bookingCheckFail'))
        <div class="alert alert-danger opacity-75 mb-md-5 text-center me-auto ms-auto">
            consulta não pode ser marcada como feita, devido a data
        </div>
        @endif

        @if (null !== session('dataInvalida'))
        <div class="alert alert-success opacity-75 mb-md-5 text-center me-auto ms-auto">
            Data inválida
        </div>
        @endif

        @if (null !== session('dataOccupedError'))
        <div class="alert alert-danger opacity-75 mb-md-5 text-center me-auto ms-auto">
            já tem uma consulta agendada para essa data!
        </div>
        @endif
        @if(@count($consultaData)<= 0) <div class="alert alert-warning opacity-75 mb-md-5 text-center me-auto ms-auto">
            <h2 class="fs-6">
                Nenhuma consulta agendada para sr/sra doutor
                <span class="text-bold fs-5 text-dark">
                    {{
                    $usuarioData[0]->firstname
                    }}

                    {{
                    $usuarioData[0]->lastname
                    }}
                </span>
                até ao momento.
            </h2>
            </div>
            @endif
            <section class="d-flex justify-content-between align-content-center mb-5">
                <div>
                    @if (@count($consultaData)<= 0) <h4 class="text-muted fs-6">{{$usuarioData[0]->email}}</h4>
                        <h2 class="text-dark fw-medium mt-2 mb-2">
                            {{
                            $usuarioData[0]->firstname
                            }}
                            {{
                            $usuarioData[0]->lastname
                            }}
                        </h2>

                        @else
                        <h2 class="text-muted fs-6"><i class="icofont-ui-email"></i> {{$usuarioData[0]->email}}</h2>
                        <h2 class="text-dark fw-medium mt-2 mb-2">
                            {{
                            $usuarioData[0]->firstname
                            }}
                            {{
                            $usuarioData[0]->lastname
                            }} 🧑‍⚕️
                        </h2>
                        <h2 class="text-muted fs-6"><i class="icofont-badminton-birdie"></i> Criado desde
                            {{ Str::substr($usuarioData[0]->created_at, 0, 10)}}
                        </h2>
                        @endif
                </div>
                <div>
                    <h2 class="fw-bold fst-italic fs-1 "><i class="icofont-table"></i> CONSULTAS</h2>
                </div>
            </section>
            <table id="myTable" class="table table-hover">
                <thead class="tborder-0 border-bottom border-opacity-75">
                    <tr class="text-medium">
                        <th>ID</th>
                        <th>PACIENTE</th>
                        <th>IDADE</th>
                        <th>MOTIVO</th>
                        <th>DATA DE MARCAÇÃO</th>
                        <th>STATUS</th>
                        <th>ACÔES</th>
                    </tr>
                </thead>
                <tbody class="text-muted text-opacity-50">
                    @if(@count($consultaData)<= 0) <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </tr>
                        @else
                        @foreach ($consultaData as $consulta)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>{{$consulta->firstname_paciente}} {{$consulta->lastname_paciente}}</td>
                            <td>{{$consulta->idade}}</td>
                            <td class="text-truncate">
                                @if (Str::length($consulta->motivo) > 34)
                                {{
                                Str::substr($consulta->motivo, 0, 34)
                                }}...
                                @else
                                {{
                                $consulta->motivo
                                }}
                                @endif
                            </td>

                            <td>
                                {{$consulta->horario}}
                            </td>
                            <td class="
                                    @if ($consulta->status == 'pendente')
                                        {{ 'text-warning opacity-50'}}
                                    @endif
                                    @if ($consulta->status == 'cancelada')
                                    {{ 'text-danger opacity-50'}}
                                @endif
                                @if ($consulta->status == 'feita')
                                {{ 'text-success opacity-50'}}
                            @endif
                                ">
                                {{$consulta->status}} <i class="icofont-loop"></i>
                            </td>
                            <td>@if ($consulta->status == 'feita' | $consulta->status == 'cancelada')
                                ###############
                                @else

                                <a href="{{route('consulta-doutor-feita', $consulta->idConsulta)}}"
                                    class="text-white text-bold bg-success rounded-2 px-2">Feita</a>
                                <button type="button" class="text-white bg-warning border-0 rounded-2"
                                    data-bs-toggle="modal" data-bs-target="#reagendar">
                                    Reagendar
                                </button>

                                {{-- //start modal --}}
                                <div class="modal fade" id="reagendar" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title  align-self-center text-center fs-5"
                                                    id="exampleModalLabel">
                                                    Introduza um novo horário conveniente!
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body w-full">
                                                <form
                                                    action="{{route('consulta-doutor-reagendar', $consulta->idConsulta)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <h1 class="fs-5 text-center my-3">Reagendamento de consulta</h1>
                                                        <label for="" class="text-primary fw-light d-block">
                                                            Nova data para Consulta
                                                        </label>
                                                        <input type="hidden" name="paciente"
                                                            value="{{$consulta->firstname_paciente}} {{$consulta->lastname_paciente}}">
                                                        <input type="hidden" name="horario"
                                                            value="{{$consulta->horario}}">
                                                        <input type="hidden" name="dotor"
                                                            value="{{$usuarioData[0]->firstname}} {{$usuarioData[0]->lastname}}">
                                                        <input type="date" required min="{{$dateNow}}"
                                                            value="{{old('data')}}" max="2024-12-31" name="data" id=""
                                                            class="p-2 bg-light text-primary border-0 input-consulta-data">
                                                        <select name="hora" required id="hora"
                                                            pattern="[0-9]{2}:[0-9]{2}"
                                                            class="text-primary input-consulta">
                                                            <option value="06:00" class="text-secondary">06:00 AM
                                                            </option>
                                                            <option value="06:30" class="text-secondary">06:30 AM
                                                            </option>
                                                            <option value="07:00" class="text-secondary">07:00 AM
                                                            </option>
                                                            <option value="07:30" class="text-secondary">07:30 AM
                                                            </option>
                                                            <option value="08:00" class="text-secondary">08:00 AM
                                                            </option>
                                                            <option value="08:30" class="text-secondary">08:30 AM
                                                            </option>
                                                            <option value="09:00" class="text-secondary">09:00 AM
                                                            </option>
                                                            <option value="09:30" class="text-secondary">09:30 AM
                                                            </option>
                                                            <option value="10:00" class="text-secondary">10:00 AM
                                                            </option>
                                                            <option value="10:30" class="text-secondary">10:30 AM
                                                            </option>
                                                            <option value="11:00" class="text-secondary">11:00 AM
                                                            </option>
                                                            <option value="11:30" class="text-secondary">11:30 AM
                                                            </option>
                                                            <option value="12:00" class="text-secondary">12:00 AM
                                                            </option>
                                                        </select>

                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <span class="fs-6 text-danger text-start me-5">CAMPOS
                                                    <strong>DATA</strong> E
                                                    <STRONg>HORA</STRONg> SÃO
                                                    OBRIGATÓRIOS!</span>
                                                <button type="submit" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Submeter
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- //end modal --}}
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endif
                </tbody>
            </table>
            <section class="d-flex justify-content-between align-items-baseline mt-5">
                <div>
                    <div class="d-flex flex-column gap-1 mb-3">
                        <h1 class="fs-5 text-secondary fw-medium ">Endereço <i class="icofont-location-pin"></i></h1>
                        <span class="fs-6 text-secondary fw-lighter ">Avenida
                            Comandante Gika 233', 30 <br> Luanda, Angola.</span>
                    </div>
                    <div class="d-flex flex-column gap-1 mb-3">
                        <h1 class="fs-5 text-secondary fw-medium ">Telefones <i class="icofont-phone"></i></h1>

                        <span class="fs-6 text-secondary fw-lighter "><i class="icofont-location"></i> +244 921 538 /
                            952 353 781</span>

                    </div>
                    <div class="d-flex flex-column gap-1 mb-3">
                        <h1 class="fs-5 text-secondary fw-medium ">email <i class="icofont-email"></i> </h1>
                        <span class="fs-6 text-secondary fw-lighter "><i
                                class="icofont-location"></i>eabhealth@gmail.com</span>
                    </div>

                </div>
                <div class="d-flex flex-column">
                    <div>
                        <p class="mb-2">Pendentes: {{$consultaPendenteContagem[0]->count}}</p>
                        <p class="mb-2">Canceladas: {{$consultaCanceladaContagem[0]->count}}</p>
                        <p class="mb-2">Feitas: {{$consultaFeitaContagem[0]->count}}</p>
                    </div>
                    <div>
                        <button class="text-white bg-primary px-5 nowrap border-0 fw-bold align-content-center">
                            TOTAL {{
                            $consultaPendenteContagem[0]->count + $consultaCanceladaContagem[0]->count +
                            $consultaFeitaContagem[0]->count
                            }}</button>
                    </div>
                </div>

            </section>
            </tbody>
    </section>
    <footer>
        <ul class="d-flex gap-3 justify-content-center align-content-center list-unstyled">
            <li><a href="#"><i class="icofont-facebook text-decoration-none"></i></a></li>
            <li><a href="#"><i class="icofont-twitter text-decoration-none"></i></a></li>
            <li><a href="#"><i class="icofont-linkedin text-decoration-none "></i></a></li>
            <li><a href="#"><i class="icofont-instagram text-decoration-none"></i></a></li>
            <span>|</span>
            <li><a href="http://localhost:8000/termos-de-uso">Termos & Condicões</a> </li>
            <span class=" fw-bolder">.</span>
            <li><a href="http://localhost:8000/politicas-de-privacidade">Políticas de privacidade</a></li>
        </ul>
    </footer>

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

</body>

</html>
