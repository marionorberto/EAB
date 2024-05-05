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

    <section class="login-section mt-5 pt-5 mb-5">

        <div class="bg-primary login-section-1 mt-5 ps-4 pt-5">
            <a class="navbar-brand align-self-center mb-3" href="http://localhost:8000/">
                <i class="icofont-medical-sign-alt fs-2 fw-medium text-dark"></i>
                <span class="fw-bolder fs-5 text-light"> EAB</span> <br> <span
                    class="fw-bold fs-6 fst-italic text-white lh-sm">Efortless
                    Appointment
                    Booking</span>
            </a>
            <h1 class="text-white fw-medium mt-5">Torna-se em um</h1>
            <h1 class="text-white fw-medium"><strong>Colaborador</strong></h1>
            <p class="text-white fs-3">Vagas limitadas.</p>
        </div>

        <div class="login-section-2">
            <span class="d-flex gap-1 justify-content-end ms-auto pe-2">Já sou um colaborador? <a
                    href="http://localhost:8000/login" class="">Login</a></span>
            <form action="<?php echo e(route('usuarios.store')); ?>" enctype="multipart/form-data" method="post"
                class="d-flex flex-column gap-3">
                <?php echo csrf_field(); ?>
                <h3 class="text-start">Pretendo ser um coloborador da EAB</h3>
                <div class="d-flex gap-2">
                    <input type="text" required placeholder="Primeiro Nome" name="firstname"
                        value="<?php echo e(old('firstname')); ?>" class="input-login">
                    <input type="text" required placeholder="Último Nome" name="lastname" value="<?php echo e(old('lastname')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('firstname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('firstname')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('lastname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('lastname')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <input type="text" required placeholder="Carteira Profissional" name="carteiraProfissional"
                        value="<?php echo e(old('carteiraProfissional')); ?>" class="input-login">
                    <input type="text" required placeholder="Telefone" name="telefone" value="<?php echo e(old('telefone')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('carteiraProfissional')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('carteiraProfissional')); ?></span>
                <br>
                <?php endif; ?>
                <?php if($errors->has('telefone')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('telefone')); ?></span> <br>
                <?php endif; ?>
                <div class="login-container-bi-nacionalidade g-3">
                    <input type="text" required class="text-secondary w-50 text-start input-login"
                        placeholder="BI - Bilhete de identidade" name="bi" value="<?php echo e(old('bi')); ?>">
                    <select name="naturalidade" required id="" class="w-50 text-start input-login bg-transparent">
                        <option value="Angolana">🇦🇴 Angolana</option>
                        <option value="Brasileira">🇧🇷 Brasileira</option>
                        <option value="Portuguesa">🇵🇹 Portuguesa</option>
                    </select>
                </div>
                <?php if($errors->has('naturalidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('naturalidade')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('bi')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('bi')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="email" required placeholder="Email Address" name="email" value="<?php echo e(old('email')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('email')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('email')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <select name="especialidade" required id="especialidade"
                        class="w-50 text-start input-login bg-transparent">
                        <option value="">Oftalmologia</option>
                        <option value="">Cardiologia</option>
                        <option value="">Pedriatria</option>
                        <option value="">Cirurgia</option>
                        <option value="">Ortopedia</option>
                        <option value="">Radiologia</option>
                    </select>
                    <select name="experiencia" required id="experiencia"
                        class="w-50 text-start input-login bg-transparent">
                        <option value="">+2 Anos</option>
                        <option value="">+5 Anos</option>
                        <option value="">+10 Anos</option>
                        <option value="">Candidato à estágio</option>
                    </select>
                </div>
                <?php if($errors->has('especialidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('especialidade')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('experiencia')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('experiencia')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="endereco" required placeholder="Endereço" name="endereco" value="<?php echo e(old('endereco')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('endereco')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('endereco')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2 w-50">
                    <input type="file" required placeholder="Curriculum Vitae" name="cv" value="<?php echo e(old('cv')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('cv')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('cv')); ?></span> <br>
                <?php endif; ?>
                <span style="margin-bottom: -10px" class="text-primary text-start fs-5">Porque deseja juntar-se a
                    nós?</span>
                <div class="d-flex flex-column gap-0 align-items-start">
                    <textarea name="motivo" id="motivo" required cols="30" rows="10" class="consulta-textarea p-3"
                        placeholder="Mensagem"><?php echo e(old('motivo')); ?></textarea>
                    <?php if($errors->has('motivo')): ?>
                    <span class="text-start text-danger span-error2 fs-6 mt-2"> <?php echo e($errors->first('motivo')); ?></span> <br>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="submit" class="btn">Envia solicitação</button>
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

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/doutor/store.blade.php ENDPATH**/ ?>