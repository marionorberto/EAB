<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link of CSS files -->
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

    <title> EAB - Medical Healthcare & Doctors Clinic </title>
</head>

<body class="pb-4 body-login">


    <!-- Start Navbar Area -->
    <nav class="bg-light mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2 col-md-3">
                    <a class="navbar-brand pt-3 pb-2" href="http://localhost:8000/">
                        <i class="icofont-medical-sign-alt fs-2 fw-medium text-primary"></i>
                        <span class="fw-bolder fs-5"> EAB</span> <br> <span
                            class="fw-light fs-6 fst-italic text-muted lh-sm">Efortless
                            Appointment
                            Booking</span>
                    </a>
                </div>

                <div class="col-12 col-lg-8 col-md-6">
                    <div class="navbar-toggle-btn">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                            <li class="nav-item"><a class="nav-link" href="#department">Departmentos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#service">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link" href="#gallery">Galeria</a></li>
                            <li class="nav-item"><a class="nav-link" href="#price">Preços</a></li>
                            <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contactos</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost:8000/login">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <?php if(isset($alert_success)): ?>
    <div class="d-flex ">
        <section class="align-self-center text-sm-center alert alert-success w-75 opacity-75 ms-auto me-auto">
            <?php echo e($alert_success); ?>. <span><strong>verifique o seu email!</strong></span>
        </section>
    </div>
    <?php endif; ?>
    
    
    <div class="consulta-container pt-5">
        <section class="consulta-section-container">
            <div class="consulta-section-left d-flex">
                <a class="navbar-brand align-self-top ps-5 pt-5 mt-5" href="http://localhost:8000/">
                    <i class="icofont-medical-sign-alt fs-2 fw-medium text-dark"></i>
                    <span class="fw-bolder fs-5 text-light fs-2"> EAB</span> <br> <span
                        class="fw-light fs-6 fst-italic text-dark lh-sm">Efortless
                        Appointment
                        Booking</span>
                </a>
            </div>
            <form action="<?php echo e(route('consultas.store')); ?>" method="post"
                class="consulta-section-right d-flex flex-column gap-3">
                <?php echo csrf_field(); ?>
                <h1 class="text-decoration-underline fs-1 text-primary text-center pb-4">
                    Consulta Online no EAB
                </h1>
                <div class="d-flex gap-5 w-100 mt-4">
                    <div class="">
                        <label for="" class="text-primary fw-light d-block">Primeiro Nome</label>
                        <input type="text" required class="text-primary input-consulta" name="firstname">
                    </div>
                    <div>
                        <label for="" class="text-primary fw-light d-block">Último Nome</label>
                        <input type="text" required class="text-primary input-consulta" name="lastname">
                    </div>
                </div>
                <?php if($errors->has('firstname')): ?>
                <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('firstname')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('lastname')): ?>
                <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('lastname')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-5 w-100 mt-4">
                    <div>
                        <label for="" class="text-primary fw-light d-block">Email</label>
                        <input type="email" class="text-primary input-consulta" name="email">
                    </div>
                    <div>
                        <label for="" class="text-primary fw-light d-block">Telefone</label>
                        <input type="tel" required class="text-primary input-consulta" name="telefone">
                    </div>
                </div>
                <?php if($errors->has('email')): ?>
                <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('email')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('telefone')): ?>
                <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('telefone')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-5 w-100 mt-4">
                    <div>
                        <label for="" class="text-primary fw-light d-block">Idade</label>
                        <input type="number" required name="idade" id="" min="0" max="90" value="0"
                            class="bg-light text-primary input-consulta">
                    </div>
                    <div class="">
                        <label for="" class="text-primary fw-light d-block">Peso <sub>(Kg)</sub></label>
                        <input type="number" required class="text-primary input-consulta" max="300" min="2" step=".1"
                            name="peso">
                    </div>
                    <div>
                        <label for="" class="text-primary fw-light d-block">Altura <sub>(m)</sub></label>
                        <input type="number" required name="altura" id="" min="0.60" max="3" step=".01"
                            class="bg-light text-primary input-consulta">
                    </div>
                </div>
                <?php if($errors->has('idade')): ?>
                <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('idade')); ?></span> <br>
                <?php endif; ?>
                
                <div class="d-flex gap-5 w-100 mt-4">
                    <div>
                        <label for="" class="text-primary fw-light d-block">Data de Consulta</label>
                        <input type="datetime-local" required name="horario" id=""
                            class="p-2 bg-light text-primary border-0 input-consulta-data">
                    </div>
                    <div class="">
                        <label for="" class="text-primary fw-light d-block">Tipo de consulta</label>
                        <select name="especialidade" required
                            class="text-primary p-2 bg-light border-0 input-consulta-data">
                            <option value="" class="text-opacity-50">selecione...</option>
                            <?php if(isset($especialidades_data)): ?>
                            <?php $__currentLoopData = $especialidades_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($esp['idEspecialidade']); ?>"><?php echo e($esp['descricao']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="text-primary fw-light d-block">Dotor</label>
                        <select name="doutor" required class="text-primary p-2 bg-light border-0 input-consulta-data">
                            <option value="" class="text-opacity-50">selecione...</option>
                            <?php if(isset($doutores_data)): ?>
                            <?php $__currentLoopData = $doutores_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dout['idDoutor']); ?>"><?php echo e($dout['firstname']); ?> <?php echo e($dout['lastname']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3">
                    <span class="text-primary">Motivo da consulta</span>
                    <textarea name="motivo" id="" required cols="30" rows="10" class="consulta-textarea p-3"
                        placeholder="Mensagem"></textarea>
                    <?php if($errors->has('motivo')): ?>
                    <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('motivo')); ?></span> <br>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn rounded-0">Marcar consulta </button>
            </form>

        </section>
        <div class="d-flex gap-3 align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5">
            <a href="http://localhost:8000/politicas-de-privacidade" class="text-primary">Políticas de privacidade</a>
            <span class="text-primary fw-bolder">|</span>
            <a href="http://localhost:8000/termos-de-uso" class="text-primary">Termos de Uso</a></span>
        </div>
    </div>

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
</body>

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/consulta/index.blade.php ENDPATH**/ ?>