<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/icofont.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/icofont.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/icofont.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/dark-style.css')); ?>">

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
                <img <?php if(null !==(@Session::get('loginSession')['urlImgUsuario'])): ?>
                    src="<?php echo e(env('APP_URL')); ?>:8000/storage/<?php echo e(@Session::get('loginSession')['urlImgUsuario']); ?>" <?php endif; ?>
                    alt=" profile-page-img" class="img-profile-page">
                <span class="text-secondary"><?php echo e(@Session::get('loginSession')['username']); ?></span>
            </div>
            <div class="">
                <li class=""><a href="<?php echo e(route('dashboard.index')); ?>"><i class="icofont-home text-secondary">
                        </i> Dashboard</a></li>
            </div>
            <div class="mt-2">
                <span class="text-secondary mt-2 dashboard-sl-span"> Páginas</span>
                <ul class="list-unstyled d-flex flex-column gap-2 mt-2 position-relative w-full">
                    <li class="dashboard-sl-li"><a href="<?php echo e(route('dashboard-paginas-usuarios')); ?>"><i
                                class="icofont-user text-secondary">
                            </i> Usuários</a></li>
                    <li class="dashboard-sl-li"><a href="<?php echo e(route('dashboard-paginas-colaboradores')); ?>"> <i
                                class="icofont-doctor text-secondary">
                            </i> Colaboradores</a></li>
                    <li class="dashboard-sl-li" s><a href="<?php echo e(route('dashboard-paginas-especialidades')); ?>"> <i
                                class="icofont-card text-secondary">
                            </i> Especialidades</a></li>
                </ul>
            </div>

            <div>

                <span class="text-secondary mt-2 dashboard-sl-span">Análises</span>
                <ul class="list-unstyled d-flex flex-column gap-2 mt-2 position-relative w-full">
                    <li class="dashboard-sl-li2"><a href="<?php echo e(route('dashboard-analises-consultas')); ?>"><i
                                class="icofont-crutch text-secondary">
                            </i> Consultas</a></li>
                    <li class="dashboard-sl-li2"><a href="<?php echo e(route('dashboard-analises-pacientes')); ?>"><i
                                class="icofont-operation-theater text-secondary">
                            </i> Pacientes</a></li>
                    <li class="dashboard-sl-li2"><a href="<?php echo e(route('dashboard-analises-financeiro')); ?>"><i
                                class="icofont-money text-secondary">
                            </i>Finaceiro</a></li>
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

            <div class="sidebar-right-container">
                <div class="sidebar-right-top d-flex justify-content-between align-items-center">
                    <div><span class="text-secondary opacity-50 fs-4 fw-medium ms-4"><a
                                href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a>/<span
                                class="text-primary text-decoration-underline text-bold"> Usuarios</span></span></div>
                    <div class="me-4">
                        <a class="py-1 me-2" href="<?php echo e(route('dashboard-mensagens')); ?>">
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
                                    <?php echo e($messageCount[0]->count); ?>

                                </span>
                            </i>
                        </a>

                        <a class="py-1 me-2" href="<?php echo e(route('dashboard-notificacoes')); ?>">
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
                                    <?php echo e($notificationCount[0]->count); ?>

                                </span>
                            </i>
                        </a>

                    </div>
                </div>
                <div class="sidebar-right-bottom text-dark p-3">
                    <table id="myTable" class="table table-hover small-fs-6">
                        <thead class="tborder-0 border-bottom border-opacity-75">
                            <tr class="text-medium small-fs-6">
                                <th>COD</th>
                                <th>NOME</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>BI</th>
                                <th>NACIONALIDADE</th>
                                <th>CARGO</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted text-opacity-50 fs-6">
                            <?php if(@count($usuarios)<= 0): ?> <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="md-fs-6">
                                    <td>
                                        <?php echo e($usuario->idUsuario); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->firstname); ?> <?php echo e($usuario->lastname); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->username); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->email); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->bi); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->naturalidade); ?>

                                    </td>
                                    <td>
                                        <?php echo e($usuario->tipo_usuario); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/jquery.mixitup.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/form-validator.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/contact-form-script.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/main.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo e(URL::to('js/dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/dataTables.dataTables.min.js')); ?>"></script>

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

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/admin/dashboard-paginas-usuarios.blade.php ENDPATH**/ ?>