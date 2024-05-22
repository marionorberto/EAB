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

    <title> EAB - doutor registro </title>
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

    <h1 class="text-center">Junte-se à nossa equipe de colaboradores 🧑‍⚕️</h1>
    <section class="login-section mt-5 pt-5 mb-5">
        <div id="s-l" class="login-section-1 bg-primary">
            <a class="navbar-brand align-self-center mb-3" href="http://localhost:8000/">
                <i class="icofont-medical-sign-alt fs-2 fw-medium text-dark"></i>
                <span class="fw-bolder fs-5 text-light"> EAB</span> <br> <span
                    class="fw-bold fs-6 fst-italic text-white lh-sm">Efortless
                    Appointment
                    Booking</span>
            </a>
            <h1 class="text-white fw-medium mt-5">Faça o seu <strong>Registro</strong></h1>
            <h1 class="text-white fw-medium">na plataforma</h1>
            <h1>Junte-se à nós!</h1>
            <img src="<?php echo e(URL::to('img/undraw_medicine_b-1-ol.svg')); ?>" alt="">
        </div>

        <div class="login-section-2">

            <form action="http://localhost:8000/doutor/register" enctype="multipart/form-data" method="post"
                class="d-flex flex-column gap-3">
                <?php echo csrf_field(); ?>
                <h3 class="text-start">Registro</h3>
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Primeiro Nome" name="firstname" value="<?php echo e(old('firstname')); ?>"
                        class="input-login">
                    <input type="text" placeholder="Último Nome" name="lastname" value="<?php echo e(old('lastname')); ?>"
                        class="input-login">
                </div>
                <?php if(null !== session('namesIncorret')): ?>
                <span class="text-start text-danger span-error2 fs-6">
                    Campo Primeiro Nome & Último Nome devem ter apenas um único
                    nome.
                </span>
                <br>
                <?php endif; ?>

                <?php if($errors->has('firstname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('firstname')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('lastname')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('lastname')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="text" placeholder="username" name="username" value="<?php echo e(old('username')); ?>"
                        class="input-login">
                </div>
                <?php if(null !== session('usernameIncorrect')): ?>
                <span class="text-start text-danger span-error2 fs-6">
                    Campo username não deve conter espaços.
                </span>
                <br>
                <?php endif; ?>
                <?php if($errors->has('username')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('username')); ?></span> <br>
                <?php endif; ?>
                <div class="gap-2">
                    <input type="email" placeholder="Email Address" name="email" value="<?php echo e(old('email')); ?>"
                        class="input-login">
                </div>
                <?php if($errors->has('email')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('email')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <input type="text" placeholder="Telefone" name="telefone" value="<?php echo e(old('telefone')); ?>"
                        class="input-login">
                    <select name="sexo" id="" class="w-50 input-login bg-white">
                        <option value="">selecione... (sexo)</option>
                        <option value="M" <?php if(old('sexo')=='M' ): ?> selected <?php endif; ?>>M - Masculino</option>
                        <option value="F" <?php if(old('sexo')=='F' ): ?> selected <?php endif; ?>>F - Femenino</option>
                    </select>
                </div>
                <?php if($errors->has('telefone')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('telefone')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('sexo')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('sexo')); ?></span> <br>
                <?php endif; ?>
                <div class="login-container-bi-nacionalidade g-3">
                    <input type="text" class="text-secondary w-50 text-start input-login"
                        placeholder="BI - Bilhete de identidade" name="bi" value="<?php echo e(old('bi')); ?>">

                    <select name="naturalidade" id="" class="w-50 text-start input-login bg-transparent">
                        <option value="">selecione... (nacionalidade) </option>
                        <option value="Angolana" <?php if(old('naturalidade')=='Angolana' ): ?> selected <?php endif; ?>>🇦🇴 Angolana
                            (nacionalidade) </option>
                        <option value="Brasileira" <?php if(old('naturalidade')=='Brasileira' ): ?> selected <?php endif; ?>>🇧🇷
                            Brasileira (nacionalidade)</option>
                        <option value="Portuguesa" <?php if(old('naturalidade')=='Portuguesa' ): ?> selected <?php endif; ?>>🇵🇹
                            Portuguesa (nacionalidade)</option>
                    </select>
                </div>
                <?php if($errors->has('naturalidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('naturalidade')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('bi')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('bi')); ?></span> <br>
                <?php endif; ?>
                <div class="w-full">


                    <label for="fotoFile" id="label-fotoFile"
                        class="text-secondary  cursor-pointer border-secondary text-secondary font-bold border-1 text-center"
                        style="border-style: dashed">Carregar Foto - (OPCIONAL) <i
                            class="icofont-cloud-upload p-0 fs-4"></i></label>
                    <input type="file" name="fotoFile" id="fotoFile" placeholder="Foto"
                        class="input-login w-50 bg-text-dark d-none" accept=".png,.jpg,.jpeg" title="Escolher">

                </div>
                <?php if(null !== session('fileFormatError')): ?>
                <span class="text-start text-danger span-error2 fs-6">
                    Formato da foto inválida.
                </span>
                <br>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <input type="text" class="text-secondary w-50 text-start input-login"
                        placeholder="carteira profissional" name="carteiraProfissional"
                        value="<?php echo e(old('carteiraProfissional')); ?>">

                    <select name="especialidade" id="especialidade" <?php echo e(old('especialidade')); ?>

                        class="text-secondary w-50 text-start input-login">
                        <option value="" class="text-opacity-50">selecione...(especialidade)</option>
                        <?php if(count($especialidades_data)>0): ?>
                        <?php $__currentLoopData = $especialidades_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($esp['idEspecialidade']); ?>"><?php echo e($esp['descricao']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <?php if($errors->has('carteiraProfissional')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('carteiraProfissional')); ?></span>
                <br>
                <?php endif; ?>
                <?php if($errors->has('especialidade')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('especialidade')); ?></span> <br>
                <?php endif; ?>
                <div class="d-flex flex-column gap-4">
                    <input type="password" placeholder="Password" name="password" class="input-login">
                    <input type="password" placeholder="Repeat password" name="repeat_password" class="input-login">
                </div>
                <?php if($errors->has('repeat_password')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('repeat_password')); ?></span> <br>
                <?php endif; ?>
                <?php if($errors->has('password')): ?>
                <span class="text-start text-danger span-error2 fs-6"> <?php echo e($errors->first('password')); ?></span> <br>
                <?php endif; ?>
                <?php if(isset($passwordError)): ?>
                <span class="text-start text-danger span-error2 fs-6 mb-4"><?php echo e($passwordError); ?></span>
                <?php endif; ?>
                <div>
                    <button type="submit" class="btn">Registrar</button>
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
    <script src="<?php echo e(URL::to('js/three.r134.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/vanta.net.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/vanta.halo.min.js')); ?>"></script>
    <script>
        const inputFoto = document.getElementById('fotoFile');
    const label = document.getElementById('label-fotoFile');

    inputFoto.addEventListener('change', (e) => {
            label.innerText = 'caminho ' + e.target.value;
    });

    </script>
</body>

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/doutor/register.blade.php ENDPATH**/ ?>