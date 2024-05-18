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
    <?php if(null !== session('requestSucess')): ?>
    <div class="alert alert-success mx-auto w-75 text-center"><strong>A sua solicitação foi enviada com
            successo <i class="icofont-info-circle"></i></strong> <br> Por favor aguarde no seu email ou telefone pela
        nossa
        resposta. Obrigado!</div>
    <?php endif; ?>
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
            <h1 class="text-white fw-medium"><strong>Colaborador da <br> nossa clínica.</strong></h1>
            <p class="text-white fs-3">Vagas limitadas.</p>
            <img src="<?php echo e(URL::to('img/undraw_medicine_b-1-ol.svg')); ?>" alt="">
        </div>
        <div class="login-section-2">
            <span class="d-flex gap-1 justify-content-end ms-auto pe-2">Já sou um colaborador? <a
                    href="http://localhost:8000/login" class="">Login</a></span>
            <form action="<?php echo e(route('doutores.store')); ?>" enctype="multipart/form-data" method="post"
                class="d-flex flex-column gap-3">
                <?php echo csrf_field(); ?>
                <h3 class="text-start">Faça a tua candidatura no EAB</h3>
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Primeiro Nome" name="firstname" value="<?php echo e(old('firstname')); ?>"
                        class="input-login">
                    <input type="text" placeholder="Último Nome" name="lastname" value="<?php echo e(old('lastname')); ?>"
                        class="input-login">
                </div>
                <?php if(null !== session('namesIncorret')): ?>
                <span class="text-start text-danger span-error2 fs-6">
                    Campo Primeiro & Último Nome não devem conter espaços.
                </span>
                <br>
                <?php endif; ?>
                <?php if($errors->has('firstname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('firstname')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('lastname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('lastname')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Carteira Profissional" name="carteiraProfissional"
                        value="<?php echo e(old('carteiraProfissional')); ?>" class="input-login">
                    <input type="text" placeholder="Telefone" name="telefone" value="<?php echo e(old('telefone')); ?>"
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
                    <select name="nacionalidade" id="" class="w-50 text-start input-login bg-transparent">
                        <option value="">selecione... (nacionalidade)</option>
                        <option value="Angolana" <?php if(old('nacionalidade')=='Angolana' ): ?> selected <?php endif; ?>>🇦🇴
                            Angolana (nacionalidade)</option>
                        <option value="Brasileira" <?php if(old('nacionalidade')=='Brasileira' ): ?> selected <?php endif; ?>>🇧🇷
                            Brasileira (nacionalidade)</option>
                        <option value="Portuguesa" <?php if(old('nacionalidade')=='Portuguesa' ): ?> selected <?php endif; ?>>🇵🇹
                            Portuguesa (nacionalidade)</option>
                    </select>
                    <select name="sexo" id="" class="w-50 text-start input-login bg-transparent">
                        <option value="">selecione... (sexo)</option>
                        <option value="M" <?php if(old('sexo')=='M' ): ?> selected <?php endif; ?>>M (sexo)</option>
                        <option value="F" <?php if(old('sexo')=='F' ): ?> selected <?php endif; ?>>F (sexo)</option>
                    </select>
                </div>
                <?php if($errors->has('nacionalidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('nacionalidade')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('sexo')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('sexo')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="email" placeholder="Email Address" name="email" value="<?php echo e(old('email')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('email')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('email')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <select name="especialidade" id="especialidade" class=" w-50
                        text-start input-login bg-transparent">
                        <option value="">especialidade (especialidade)</option>
                        <option value="Oftalmologia" <?php if(old('especialidade')=='Oftalmologia' ): ?> selected <?php endif; ?>>
                            Oftalmologia (especialidade)</option>
                        <option value="Cardiologia" <?php if(old('especialidade')=='Cardiologia' ): ?> selected <?php endif; ?>>
                            Cardiologia (especialidade)</option>
                        <option value="Pedriatria" <?php if(old('especialidade')=='Pedriatria' ): ?> selected <?php endif; ?>>Pedriatria
                            (especialidade)</option>
                        <option value="Cirurgia" <?php if(old('especialidade')=='Cirurgia' ): ?> selected <?php endif; ?>>Cirurgia
                            (especialidade)</option>
                        <option value="Ortopedia" <?php if(old('especialidade')=='Ortopedia' ): ?> selected <?php endif; ?>>Ortopedia
                            (especialidade)</option>
                        <option value="Radiologia" <?php if(old('especialidade')=='Radiologia' ): ?> selected <?php endif; ?>>Radiologia
                            (especialidade)</option>
                    </select>
                    <select name="experiencia" id="experiencia" class="w-50 text-start input-login bg-transparent">
                        <option value="">selecione... (experiência)</option>
                        <option value="2" <?php if(old('experiencia')=='2' ): ?> selected <?php endif; ?>>+2 Anos
                            (experiência)</option>
                        <option value="5" <?php if(old('experiencia')=='5' ): ?> selected <?php endif; ?>>+5 Anos
                            (experiência)</option>
                        <option value="10" <?php if(old('experiencia')=='10' ): ?> selected <?php endif; ?>>+10 Anos
                            (experiência)</option>
                        <option value="0" <?php if(old('experiencia')=='0' ): ?> selected <?php endif; ?>>Candidato à estágio
                            (experiência)</option>
                    </select>
                </div>
                <?php if($errors->has('especialidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('especialidade')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('experiencia')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('experiencia')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="text" placeholder="Endereço(ex: Angola - Luanda - Ingombota)" name="endereco"
                        value="<?php echo e(old('endereco')); ?>" class="input-login">
                </div>
                <?php if($errors->has('endereco')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('endereco')); ?></span> <br>
                <?php endif; ?>
                <div class="">
                    <label for="cv"
                        class="text-secondary cursor-pointer border-secondary text-secondary font-bold border-1 text-center"
                        style="border-style: dashed">Carregar Curriculum<i
                            class="icofont-cloud-upload p-0 fs-4"></i></label>
                    <input type="file" id="cv" placeholder="Curriculum Vitae" name="cv" value="<?php echo e(old('cv')); ?>"
                        class="input-login w-50 bg-text-dark d-none" accept=".pdf" title="Escolher">
                </div>
                <?php if($errors->has('cv')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('cv')); ?></span> <br>
                <?php endif; ?>
                <?php if(null !== session('fileFormatError')): ?>
                <span class="text-start text-danger span-error2 fs-6">
                    Formato do documento inválido. clique em cima para carregar outro formato de documento(.pdf)
                </span>
                <br>
                <?php endif; ?>
                <span style="margin-bottom: -10px" class="text-primary text-start fs-5">Porque deseja juntar-se a
                    nós?</span>
                <div class="d-flex flex-column gap-0 align-items-start">
                    <textarea name="motivo" id="motivo" cols="30" rows="10" class="consulta-textarea p-3"
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

</html>
<?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/doutor/store.blade.php ENDPATH**/ ?>