<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/fontawesome.min')); ?>">
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
    <link rel="stylesheet" href="<?php echo e(URL::to('css/dataTables.dataTables.min.css')); ?>">

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
        <?php if(@count($consultaData)<= 0): ?> <div class="alert alert-danger opacity-75 mb-md-5 text-center me-auto ms-auto">
            <strong>Nenhuma consulta marcada.</strong> <br> Marque uma consulta para poder ver os seus dados.
            <a href="<?php echo e(route('consultas.index')); ?>"><strong class="text-decoration-underline">Marca agora!</strong></a>
            </div>
            <?php endif; ?>
            <section class="d-flex justify-content-between align-content-center mb-5">
                <div>
                    <?php if(@count($consultaData)<= 0): ?> <h4 class="text-muted fs-6"><?php echo e($usuarioData[0]->email); ?></h4>
                        <h2 class="text-dark fw-medium mt-2 mb-2">
                            <?php echo e($usuarioData[0]->firstname); ?>

                            <?php echo e($usuarioData[0]->lastname); ?>

                        </h2>

                        <?php else: ?>
                        <h2 class="text-muted fs-6"><i class="icofont-ui-email"></i> <?php echo e($usuarioData[0]->email); ?></h2>
                        <h2 class="text-dark fw-medium mt-2 mb-2">
                            <?php echo e($usuarioData[0]->firstname); ?>

                            <?php echo e($usuarioData[0]->lastname); ?>

                        </h2>
                        <h2 class="text-muted fs-6"><i class="icofont-badminton-birdie"></i> Criado desde
                            <?php echo e(Str::substr($usuarioData[0]->created_at, 0, 10)); ?>

                        </h2>
                        <?php endif; ?>
                </div>
                <div>
                    <h2 class="fw-bold fst-italic fs-1 "><i class="icofont-table"></i> CONSULTAS</h2>
                </div>
            </section>
            <table id="myTable" class="table table-hover">
                <thead class="tborder-0 border-bottom border-opacity-75">
                    <tr class="text-medium">
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>MOTIVO</th>
                        <th>ESPECIALIDADE</th>
                        <th>DOUTOR</th>
                        <th>DATA DE MARCAÇÃO</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody class="text-muted text-opacity-50">
                    <?php if(@count($consultaData)<= 0): ?> <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </tr>
                        <?php else: ?>
                        <?php $__currentLoopData = $consultaData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($loop->iteration); ?>

                            </td>
                            <td><?php echo e($consulta->firstname_doutor); ?> <?php echo e($consulta->lastname_doutor); ?></td>
                            <td class="text-truncate">
                                <?php if(Str::length($consulta->motivo) > 34): ?>
                                <?php echo e(Str::substr($consulta->motivo, 0, 34)); ?>...
                                <?php else: ?>
                                <?php echo e($consulta->motivo); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($consulta->nome_especialidade); ?>

                            </td>

                            <td><?php echo e($consulta->firstname_paciente); ?> <?php echo e($consulta->lastname_paciente); ?></td>
                            </td>
                            <td>
                                <?php echo e($consulta->horario); ?>

                            </td>
                            <td class="
                                    <?php if($consulta->status == 'pendente'): ?>
                                        <?php echo e('text-warning opacity-50'); ?>

                                    <?php endif; ?>
                                    <?php if($consulta->status == 'cancelada'): ?>
                                    <?php echo e('text-danger opacity-50'); ?>

                                <?php endif; ?>
                                <?php if($consulta->status == 'feita'): ?>
                                <?php echo e('text-success opacity-50'); ?>

                            <?php endif; ?>
                                ">
                                <?php echo e($consulta->status); ?> <i class="icofont-loop"></i>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
                    <div class="mb-3">
                        <h1 class="fs-4">Informação <i class="icofont-info-circle"></i></h1>
                        <p class="w-25 text-justify">
                            Uma vez marcada sua consulta deve conferir no
                            seu conferir no seu email a resposta da nossa equipe
                            do Effortless appointment booking de forma a estar a
                            passo de todas informações referente a consulta marcada.
                        </p>
                    </div>
                    <div>
                        <h1 class="fs-4">Atenção <i class="icofont-info-circle"></i></h1>
                        <p class="w-25 text-justify">
                            Caso aja alguma inrregularidade com a ocorrência da consulta, por motivo de
                            indisponibilidade da consulta já marcada a nossa equipe informará o adiamento e o
                            reagendamento da consulta.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <p class="mb-2">Pendentes: <?php echo e($consultaPendenteContagem[0]->count); ?></p>
                        <p class="mb-2">Canceladas: <?php echo e($consultaCanceladaContagem[0]->count); ?></p>
                        <p class="mb-2">Feitas: <?php echo e($consultaFeitaContagem[0]->count); ?></p>
                    </div>
                    <div>
                        <button class="text-white bg-primary px-5 nowrap border-0 fw-bold align-content-center">
                            TOTAL <?php echo e($consultaPendenteContagem[0]->count + $consultaCanceladaContagem[0]->count +
                            $consultaFeitaContagem[0]->count); ?></button>
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

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/consulta/minhas-consultas.blade.php ENDPATH**/ ?>