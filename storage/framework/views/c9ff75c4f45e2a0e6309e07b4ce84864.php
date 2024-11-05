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
                    <li class="dashboard-sl-li" s><a href="#"> <i class="icofont-card text-secondary">
                            </i> Estatísticas</a></li>
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

            <div class="sidebar-right-container">
                <div class="sidebar-right-top d-flex justify-content-between align-items-center">
                    <div><span class="text-secondary opacity-50 fs-4 fw-medium ms-4"><a
                                href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a> /<span
                                class="text-primary text-decoration-underline text-bold"> Estatísticas</span></span>
                    </div>
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
                <div
                    class="sidebar-right-bottom text-dark p-3  d-flex justify-content-center align-content-center pt-4">
                    <div style=" height: 500px; width: 500px;">
                        <canvas id="grafico1" style=""></canvas>
                    </div>
                    
                    <div style=" height: 500px; width: 500px;">
                        <canvas id="grafico2" style=""></canvas>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx1 = document.getElementById('grafico1');
        const ctx2 = document.getElementById('grafico2');

      new Chart(ctx1, {
        type: 'line',
        data: {
          labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
          datasets: [{
            label: 'Adesão de novos usuários no EAB',
            data: [0, 0, <?php echo e($total[0]); ?>, 0, <?php echo e($total[1]); ?>, 0],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      new Chart(ctx2, {
            type: 'bar',
            data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
            datasets: [{
            label: 'Números de consultas marcadas',
            data: [0, 0, 0, 0, <?php echo e($totalPaciente[0]); ?>, 0],
            borderWidth: 1
            }]
            },
            options: {
            scales: {
            y: {
            beginAtZero: true
            }
            }
            }
            });
    </script>
</body>

</html>
<?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/admin/dashboard-financeiro.blade.php ENDPATH**/ ?>