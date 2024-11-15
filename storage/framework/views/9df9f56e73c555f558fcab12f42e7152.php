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

    <title> EAB - Medical Healthcare & Doctors Clinic </title>
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
    <?php if(isset($alert_success)): ?>
    <div class="d-flex ">
        <section
            class="align-self-center text-sm-center alert alert-success w-75 text-opacity-50 bg-opacity-25 ms-auto me-auto">
            <?php echo e($alert_success); ?> <span><strong>Faça o seu login!</strong></span>
        </section>
    </div>
    <?php endif; ?>
    <section class="login-section mt-5 pt-5 mb-5 pb-5">
        <div class="bg-primary login-section-1 mt-5 ps-4 pt-5 pb-5" style="max-height: 35rem">
            <a class="navbar-brand align-self-center mb-3" href="http://localhost:8000/">
                <i class="icofont-medical-sign-alt fs-2 fw-medium text-dark"></i>
                <span class="fw-bolder fs-5 text-light"> EAB</span> <br> <span
                    class="fw-bold fs-6 fst-italic text-white lh-sm">Efortless
                    Appointment
                    Booking</span>
            </a>
            <h1 class="text-white fw-medium mt-5">Faça o seu <strong>Login</strong></h1>
            <h1 class="text-white fw-medium mb-5">na plataforma</h1>
            <img src="<?php echo e(URL::to('img/login.svg')); ?>" alt="login-image"
                style="width: 60%; height: 50%; padding-bottom:10px; ">
        </div>
        <div class="login-section-2 pt-5 mt-5">
            <span class="d-flex gap-1 justify-content-end ms-auto pe-2">Não tem conta?<a
                    href="http://localhost:8000/register" class="">Registar</a></span>
            <form action="http://localhost:8000/login" method="post" class="d-flex flex-column gap-3">
                <?php echo csrf_field(); ?>
                <h3 class="text-start">Sign In</h3>
                <div>
                    <input type="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address" required
                        class="input-login" name="email">
                </div>
                <?php if(null !== (session('emailError'))): ?>
                <span class="text-danger fs-6 span-error"><?php echo e(session('emailError')); ?></span>
                <?php endif; ?>
                <div>
                    <input type="password" placeholder="Password" class="input-login" required name="password"
                        value="<?php echo e(old('password')); ?>">
                </div>
                <?php if(null !== session('passwordError')): ?>
                <span class="text-danger fs-6 span-error"><?php echo e(session('passwordError')); ?></span>
                <?php endif; ?>
                <div>
                    <button type="submit" class="btn">Entrar</button>
                </div>
                <a href="http://localhost:8000/recuperar-senha" class="text-decoration-underline">Esqueci a senha?</a>

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

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/login.blade.php ENDPATH**/ ?>