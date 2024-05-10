<!doctype html>
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

<body data-bs-spy="scroll" data-bs-offset="70">

    <!-- Start Preloader Area -->
    <div class="preloader-area">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Dark Version Btn -->
    <div class="dark-version-btn">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>

    <!-- Start Navbar Area -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row g-2">
                <div class="col-12 col-lg-2 col-md-2">
                    <a class="navbar-brand " href="http://localhost:8000/">
                        <i class="icofont-medical-sign-alt fs-2 fw-medium text-primary"></i>
                        <span class="fw-bolder fs-5"> EAB</span> <br> <span
                            class="fw-light fs-6 fst-italic text-muted lh-sm">Efortless
                            Appointment
                            Booking</span>
                    </a>
                </div>

                <div class="col-12 col-lg-8 col-md-8">
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
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('doutores.create')); ?>">Ser
                                    colaborador</a></li>
                            <li class="nav-item"><a class="nav-link" href="#department">Departamentos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#service">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contactos</a></li>

                            <?php if(!Session::has('loginSession')): ?>
                            <li class="nav-item"><a
                                    class="nav-link text-secondary <?php echo e(request()->routeIs('login') ? 'ative' : ''); ?>"
                                    href="http://localhost:8000/login">Login</a></li>
                            <li class="nav-item d-flex gap-1 align-items-center">
                                <a class="nav-link text-dark border-bottom-3"
                                    href="http://localhost:8000/register">Registrar-se</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-2 col-md-2 text-right">
                    <div class="d-flex gap-2">
                        <?php if(Session::has('loginSession')): ?>
                        <a href="<?php echo e(route('consultas.index')); ?>" class="appointment-btn d-none">Marcar Consulta </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('consultas.index')); ?>" class="appointment-btn">Marcar Consulta </a>
                        <?php endif; ?>
                        <?php if(Session::has('loginSession')): ?>
                        <div class="dropdown rounded-1">
                            <button class=" dropdown-toggle dropdown-profile-user div-profile-img nav-link"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img <?php if(null !==(@Session::get('loginSession')['urlImgUsuario'])): ?>
                                    src="<?php echo e(env('APP_URL')); ?>:8000/storage/<?php echo e(@Session::get('loginSession')['urlImgUsuario']); ?>"
                                    <?php endif; ?> alt=" profile-page-img" class="img-profile-page">
                                <?php echo e(@Session::get('loginSession')['username']); ?>

                            </button>
                            <ul class="dropdown-menu">

                                <?php if(null !==(@Session::get('loginSession')['tipoUsuario']) &&
                                (@Session::get('loginSession')['tipoUsuario']) == 'normal'): ?>
                                <li>
                                    <a href="<?php echo e(route('minhas-consultas')); ?>"
                                        class="dropdown-item li-profile fw-ligh fs-6">Minhas Consultas</a>
                                </li>
                                <?php endif; ?>

                                <?php if(null !==(@Session::get('loginSession')['tipoUsuario']) &&
                                (@Session::get('loginSession')['tipoUsuario']) == 'admin'): ?>
                                <li>
                                    <a href="<?php echo e(route('dashboard.index')); ?>"
                                        class="dropdown-item li-profile fw-ligh fs-6">Dashboard</a>
                                </li>
                                <?php endif; ?>

                                <li class="dropdown-item li-profile fw-light fs-6">
                                    <?php echo e(@Session::get('loginSession')['username']); ?>

                                </li>
                                <li class="dropdown-item li-profile fw-medium fs-6">
                                    <?php echo e(@Session::get('loginSession')['email']); ?>

                                </li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item fw-bold li-profile fw-light fs-6"
                                        href="http://localhost:8000/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </nav>
    <!-- End Navbar Area -->

    <!-- Start Main Banner Area -->
    <div id="home" class="main-banner">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="hero-slides owl-carousel owl-theme">
                                <div class="hero-content">
                                    <h1 class="fs-2">Proporcionando saúde de qualidade. <br> A tua saúde e bem estar é o
                                        nosso maior
                                        <span>Compromisso</span>
                                    </h1>
                                    <p>
                                        Estamos comprometidos em proporcionar saúde de qualidade aos nossos pacientes.
                                        Acreditamos que o bem-estar é fundamental
                                        para uma vida plena, e por isso dedicamos nossos esforços para oferecer serviços
                                        de excelência em todas as áreas da
                                        saúde.
                                    </p>
                                    <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Consulta Agora</a>
                                </div>

                                <div class="hero-content">
                                    <h1 class="fs-2">Marca uma consulta nunca foi tão fácil. <br> Tudo a distância de um
                                        <span>Clique</span>
                                    </h1>
                                    <p>
                                        Nosso sistema online permite que você escolha a data e hora que melhor se
                                        adequam à sua agenda, sem complicações.
                                        Dedicamos nosso esforço em tornar a experiência de agendamento simples e
                                        acessível para todos os nossos pacientes.
                                        Experimente agora mesmo a facilidade de cuidar da sua saúde com apenas um
                                        clique!"
                                    </p>
                                    <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Consulta Agora</a>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Boxes Area -->
    <section class="boxes-area ptb-100 mt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-box">
                        <i class="icofont-doctor"></i>
                        <h3>Doctores Qualificados</h3>
                        <p>
                            Especialidades em diversas áreas da médicina
                            Mais de 10 anos de experiência em atendimento médico
                            Certificações em suas respectivas áreas de atuação
                            Abordagem de atendimento humanizado e personalizado para cada paciente
                            Equipe composta por 5 médicos especialistas
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-box">
                        <i class="icofont-ambulance-cross"></i>
                        <h3>Serviço Digital</h3>
                        <p>
                            Consultas virtuais com nossos médicos qualificados
                            Pagamentos online seguros e fáceis de realizar
                            Plataforma intuitiva e amigável para uma experiência digital sem complicações
                            Suporte técnico dedicado para auxiliar em qualquer dúvida ou problema relacionado aos
                            serviços digitais"
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-box">
                        <i class="icofont-operation-theater"></i>
                        <h3>Burocracia Zero</h3>
                        <p>
                            "Nossa abordagem sem burocracia simplifica o processo de agendamento e atendimento médico.
                            Eliminamos formulários
                            extensos e tempo de espera, garantindo uma experiência ágil e eficiente para nossos
                            pacientes. Concentre-se no que
                            realmente importa: sua saúde."
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-box">
                        <i class="icofont-stretcher"></i>
                        <h3>24h</h3>
                        <p>
                            Estamos disponíveis 24 horas por dia, 7 dias por semana, para atender suas necessidades de
                            saúde. Nosso sistema de
                            agendamento online permite que você marque consultas a qualquer momento, garantindo
                            flexibilidade e conveniência para
                            sua agenda ocupada. Cuide da sua saúde quando for mais conveniente para você.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Boxes Area -->

    <!-- Start Why Choose Us Area -->
    <section id="about" class="why-choose-us ptb-100 bg-f9faff">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="row about-image">
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="image">
                                <img src="<?php echo e(URL::to('img/about-img1.jpg')); ?>" alt="about">
                            </div>
                        </div>

                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="image">
                                <img src="<?php echo e(URL::to('img/about-img2.jpg')); ?>" alt="about">
                            </div>
                        </div>

                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="image mt-30">
                                <img src="<?php echo e(URL::to('img/about-img3.jpg')); ?>" alt="about">
                            </div>
                        </div>

                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="image mt-30">
                                <img src="<?php echo e(URL::to('img/about-img4.jpg')); ?>" alt="about">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="section-title">
                        <h3>Porque Escolher a EAB?</h3>
                        <span>Leia Sobre nós</span>
                    </div>

                    <div class="why-choose-us-text">
                        <p>
                            Oferecemos uma ampla gama de serviços médicos, odontológicos e de saúde da mulher a preços
                            acessíveis. Acreditamos que a
                            saúde não deve ser um luxo, mas sim um direito de todos. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.



                            Na EAB, sua saúde está em boas mãos. Marque sua consulta hoje mesmo
                            e experimente o melhor em
                            cuidados de saúde para você e sua família.
                        </p>
                        <p>
                            Nossa equipe qualificada e dedicada está aqui para cuidar de você. Com anos de experiência e
                            um compromisso inabalável
                            com a excelência, proporcionamos um ambiente acolhedor e profissional para todos os nossos
                            pacientes. Quis ipsum
                            suspendisse ultrices gravida.
                        </p>

                        <ul>
                            <li>Nós fornecemos serviços online</li>
                            <li>Cuidados médicos das mais varidades áreas da medicina convencional</li>
                            <li>Serviços que se ajustam a tua rotina diária</li>
                            <li>Serviços disponível 24/24</li>
                        </ul>

                        <a href="<?php echo e(route('doutores.create')); ?>" class="btn"> Ser colaborador</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose Us Area -->

    <!-- Start Who We Are Area -->
    <section class="who-we-are ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="section-title">
                        <h3>Quem sómos</h3>
                        <span>Encontre o melhor doctor para si</span>
                    </div>

                    <div class="who-we-are-text">
                        <p>
                            Nossos médicos passam por rigorosos processos de seleção e têm anos de experiência no
                            tratamento de diversas condições
                            médicas. Seja para uma consulta de rotina, um diagnóstico preciso ou um tratamento
                            especializado, estamos aqui para
                            ajudá-lo a encontrar o melhor médico para você.
                        </p>
                        <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Agora</a>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <ul class="team-members">
                        <li class="clearfix">
                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img1.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Narivaldo Nunes</h3>
                                        <p>Especialista em Cardiologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img2.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Domingos Afonso</h3>
                                        <p>Especialista em Oftalmologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img3.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Rosa Cristovão</h3>
                                        <p>Especialista em Ortironaringologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img4.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. João Miguel</h3>
                                        <p>Medicina Infantil</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img5.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Daniel João</h3>
                                        <p>Especialista em Fisioterapia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img6.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Mara Mendonça</h3>
                                        <p>Especialista em Ginecologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img7.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Maria Norberto</h3>
                                        <p>Especialista em Sexologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img8.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Manuel Vimbi</h3>
                                        <p>Especialista em Odontologia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="member-details">
                                <div>
                                    <img src="<?php echo e(URL::to('img/doctor-img9.png')); ?>" alt="doctor">
                                    <div class="member-info">
                                        <h3>DR. Maria Fátima</h3>
                                        <p>Especialista em Ortopedia</p>
                                        <ul>
                                            <li><a href="#" class="icofont-facebook"></a></li>
                                            <li><a href="#" class="icofont-twitter"></a></li>
                                            <li><a href="#" class="icofont-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Who We Are Area -->

    <!-- Start Departments Area -->
    <section id="department" class="departments-area ptb-100 bg-f9faff">
        <div class="container">
            <div class="section-title">
                <h3>Nossos Departmentos</h3>
                <span>Quais serviços temos</span>
                <p>Explore nossos departamentos especializados, cada um dedicado a fornecer cuidados de alta qualidade
                    em diferentes áreas
                    da saúde. Na EAB, temos equipes especializadas em diversas especialidades
                    médicas,
                    odontológicas e de saúde da mulher.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab">
                        <ul class="tabs">
                            <li><a href="#">
                                    <i class="icofont-heart-beat"></i>
                                    <br>
                                    Cardiologia
                                </a></li>

                            <li><a href="#">
                                    <i class="icofont-brain"></i>
                                    <br>
                                    Neurologia
                                </a></li>

                            <li><a href="#">
                                    <i class="icofont-crutch"></i>
                                    <br>
                                    Ortopedia
                                </a></li>

                            <li><a href="#">
                                    <i class="icofont-xray"></i>
                                    <br>
                                    Radiologia
                                </a></li>

                            <li><a href="#">
                                    <i class="icofont-surgeon"></i>
                                    <br>
                                    Cirurgia
                                </a></li>

                            <li><a href="#">
                                    <i class="icofont-laboratory"></i>
                                    <br>
                                    Urologia
                                </a></li>
                        </ul>

                        <div class="tab_content">
                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/cardiologia.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departamento de Cardiologia</h3>
                                            <p>
                                                O departamento de cardiologia é uma parte vital da medicina
                                                especializada em cuidar do coração e do sistema
                                                cardiovascular. Aqui estão algumas descrições do que geralmente é feito
                                                e providenciado por esse departamento:
                                            </p>
                                            <ul>
                                                <li>Avaliação de Risco Cardiovascular</li>
                                                <li>Electrocardiograma (ECG)</li>
                                                <li>Cirurgias Cardíacas</li>
                                                <li>Reabilitação Cardíaca</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Consulta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/neurologia.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departmento de Neurologia</h3>
                                            <p>O departamento de neurologia é especializado no diagnóstico e tratamento
                                                de distúrbios neurológicos que afetam o sistema
                                                nervoso.</p>
                                            <ul>
                                                <li>Diagnóstico e Tratamento de Doenças Neurológicas</li>
                                                <li>Avaliação Neurológica</li>
                                                <li>Tratamento de Emergências Neurológicas</li>
                                                <li>Gestão de Doenças Crônicas</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Consulta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/ortopedia.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departamento de Ortopedia</h3>
                                            <p>O departamento de ortopedia é especializado no diagnóstico e tratamento
                                                de distúrbios musculoesqueléticos, como lesões
                                                ósseas, articulares, ligamentares e musculares.</p>
                                            <ul>
                                                <li>Consulta Ortopédica</li>
                                                <li>Exames Diagnósticos</li>
                                                <li>Tratamento Conservador:</li>
                                                <li>Cirurgias Ortopédicas</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Agora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/radiologia.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departmento de Radiologia</h3>
                                            <p>
                                                O departamento de radiologia é responsável pela realização de exames de
                                                imagem que auxiliam no diagnóstico e
                                                acompanhamento de uma ampla variedade de condições médicas.
                                            </p>
                                            <ul>
                                                <li>
                                                    Agendamento de Exames de Imagem:
                                                </li>
                                                <li>
                                                    Exames Especializados:
                                                </li>
                                                <li>Relatórios e Laudos</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Agora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/fun-facts-bg.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departmento de Cirurgia</h3>
                                            <p>Agendamento de consultas online com urologistas para avaliação e
                                                tratamento de problemas
                                                relacionados ao sistema urinário masculino e feminino, como infecções
                                                urinárias, cálculos renais, incontinência
                                                urinária, disfunção erétil, entre outros.</p>
                                            <ul>
                                                <li>Consulta Cirúrgica</li>
                                                <li>Cirurgias Eletivas</li>
                                                <li>Cirurgias de Urgência</li>
                                                <li>Cirurgias Especializadas</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Agora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_img">
                                            <img src="<?php echo e(URL::to('img/department-img1.jpg')); ?>" alt="department">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="tabs_item_content">
                                            <h3>Departmento de Urologia</h3>
                                            <p>
                                                Agendamento de consultas online com urologistas para avaliação e
                                                tratamento de problemas relacionados ao sistema
                                                urinário masculino e feminino, como infecções urinárias, cálculos
                                                renais, incontinência urinária, disfunção erétil,
                                                entre outros.
                                            </p>
                                            <ul>
                                                <li>Consulta Urológica</li>
                                                <li>
                                                    Exames Urológicos
                                                </li>
                                                <li>
                                                    Tratamento Urológico
                                                </li>
                                                <li>Acompanhamento e Orientação</li>
                                            </ul>
                                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marcar Agora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Departments Area -->

    <!-- Start Make an Appointment Area -->
    <section id="appointment" class=" ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title">
                        <h3>Marca uma consulta</h3>
                        <span>Visitemos!</span>
                    </div>

                    <div class="faq">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)">Oque é a acne? <i
                                        class="icofont-plus"></i></a>
                                <p class="accordion-content show">A acne é uma condição comum da pele que ocorre devido
                                    ao excesso de oleosidade e obstrução dos poros, levando ao
                                    desenvolvimento de espinhas, cravos e lesões inflamadas. O cuidado para acne envolve
                                    tratamentos tópicos, medicamentos
                                    orais, limpeza adequada da pele e orientações sobre hábitos saudáveis para manter a
                                    pele limpa e equilibrada.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">Oque é o cuidado dental? <i
                                        class="icofont-plus"></i></a>
                                <p class="accordion-content">O cuidado dental abrange práticas preventivas e tratamentos
                                    para garantir a saúde bucal, incluindo limpezas regulares,
                                    exames dentários, tratamentos de cáries e cuidados com a gengiva.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">Oque é a saúde sexual? <i
                                        class="icofont-plus"></i></a>
                                <p class="accordion-content">A saúde sexual engloba ações e cuidados que visam o
                                    bem-estar físico, emocional e social relacionados à sexualidade,
                                    incluindo prevenção de doenças sexualmente transmissíveis, planejamento familiar,
                                    orientação sobre saúde reprodutiva e
                                    apoio psicológico em questões sexuais.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 bg-primary p-5">
                    <h4 class="text-white fw-light"><strong>Porque marcar uma consulta connosco?</strong></h4>
                    <ul class="text-white fw-light">

                        <li class="fw-lighter fs-6">
                            <strong class="fw-bold">Facilidade de Agendamento:</strong>
                            Nosso sistema simplificado de
                            agendamento permite que você marque sua consulta de forma
                            rápida e sem complicações, economizando tempo e esforço.
                        </li>
                        <li class="fw-lighter fs-6">
                            <strong class="fw-bold">
                                Acompanhamento Personalizado:
                            </strong>
                            Oferecemos um sistema de lembretes de consulta e acompanhamento,
                            mantendo você informado
                            sobre suas consultas marcadas, garantindo que você nunca perca um compromisso importante.
                        </li>

                    </ul>
                    <h4 class="text-white fw-light"><strong>Qual é o nosso grande diferencial competitivo?</strong></h4>
                    <ul class="text-white fw-light">
                        <li class="fw-lighter fs-6">
                            <strong class="fw-bold">Facilidade e Eficiência:</strong>
                            Oferecemos um sistema de agendamento simplificado e eficiente,
                            permitindo que os usuários
                            marquem consultas de forma rápida e conveniente, economizando tempo e esforço.
                        </li>
                        <li class="fw-lighter fs-6">
                            <strong class="fw-bold">
                                Variedade de Especialidades:
                            </strong>
                            Trabalhamos com uma ampla gama de profissionais de saúde e
                            especialidades médicas,
                            garantindo que os usuários encontrem o especialista adequado às suas necessidades
                            específicas de
                            saúde.
                        </li>
                        <li class="fw-lighter fs-6">
                            <strong class="fw-bold">
                                Transparência e Confiança:
                            </strong>
                            Priorizamos a transparência e a confiança em nossos serviços,
                            fornecendo informações claras
                            sobre os profissionais de saúde, avaliações de pacientes e um ambiente seguro para cuidar da
                            saúde dos nossos usuários.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Make an Appointment Area -->

    <!-- Start Services Area -->
    <section id="service" class="services-area ptb-100 bg-f9faff">
        <div class="container">
            <div class="section-title">
                <h3>Nossos Serviços</h3>
                <span>Quais serviços nós prestamos</span>
                <p>Descubra a variedade de serviços que oferecemos para atender às suas necessidades de saúde e
                    bem-estar. Na EAB, estamos comprometidos em fornecer cuidados abrangentes e de alta qualidade para
                    toda a família.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-services">
                        <i class="icofont-surgeon"></i>
                        <h3>Cirurgia na próstata</h3>
                        <p>Oferecemos cirurgia na próstata com o compromisso de proporcionar tratamentos eficazes e
                            seguros. Nossos médicos possuem
                            vasta experiência e especialização nesse procedimento, garantindo resultados de alta
                            qualidade para os nossos pacientes.</p>
                        <a href="#" class="icofont-paper-plane"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-services">
                        <i class="icofont-nurse"></i>
                        <h3>Extração Dentária</h3>
                        <p>Oferecemos serviços de extração dentária com o compromisso de proporcionar procedimentos
                            seguros e eficazes para
                            melhorar sua saúde bucal. Nossos dentistas são especialistas experientes em extrações
                            dentárias, garantindo cuidados de
                            qualidade e conforto para todos os pacientes.</p>
                        <a href="#" class="icofont-paper-plane"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-services">
                        <i class="icofont-herbal"></i>
                        <h3>Nutriticão & Dieta</h3>
                        <p>Oferecemos serviços de nutrição e dieta personalizados para ajudá-lo a alcançar seus
                            objetivos de saúde e bem-estar.
                            Nossos nutricionistas são especialistas em criar planos alimentares adaptados às suas
                            necessidades individuais, levando
                            em consideração sua saúde, preferências alimentares e estilo de vida.</p>
                        <a href="#" class="icofont-paper-plane"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-services">
                        <i class="icofont-icu"></i>
                        <h3>Fisioterapia Intensiva</h3>
                        <p>
                            Oferecemos serviços de fisioterapia intensiva para proporcionar tratamentos especializados e
                            eficazes para a recuperação
                            e reabilitação de nossos pacientes. Nossa equipe de fisioterapeutas altamente qualificados e
                            experientes utiliza
                            técnicas avançadas para ajudar na melhoria da mobilidade, alívio da dor e recuperação
                            funciona
                        </p>
                        <a href="#" class="icofont-paper-plane"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Fun Facts Area -->
    <section class="fun-facts-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="fun-fact">
                        <i class="icofont-wink-smile"></i>
                        <h3 class="count">25000</h3>
                        <span>Pacientes satisfeitos</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fun-fact">
                        <i class="icofont-doctor-alt"></i>
                        <h3 class="count">180</h3>
                        <span>Dotores experientes</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fun-fact">
                        <i class="icofont-patient-bed"></i>
                        <h3 class="count">1200</h3>
                        <span>Operações bem sucedidas</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fun-fact">
                        <i class="icofont-bed"></i>
                        <h3 class="count">2800</h3>
                        <span>Números de camas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fun Facts Area -->

    <!-- Start Gallery Area -->
    <section id="gallery" class="gallery-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>Galeria</h3>
                <span>Quais serviços nós oferecemos</span>
                <p>Explore nossa galeria para uma visão visual de nossas instalações, equipe, eventos e muito mais.
                    Nossas imagens capturam
                    momentos especiais que refletem nossa dedicação ao cuidado de saúde e ao bem-estar dos nossos
                    pacientes.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="shorting-menu">
                        <button class="filter" data-filter="all">Todos</button>
                        <button class="filter" data-filter=".cardiology">Cardiologia</button>
                        <button class="filter" data-filter=".neurology">Neurologia</button>
                        <button class="filter" data-filter=".sergury">Cirurgia</button>
                        <button class="filter" data-filter=".orthopaedics">Ortopedia</button>
                        <button class="filter" data-filter=".urology">Urologia</button>
                    </div>
                </div>
            </div>

            <div class="shorting">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mix cardiology">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img1.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Electrocardiograma</h3>
                                <span>Cardiologia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img1.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mix neurology">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img2.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Exame Neurológico</h3>
                                <span>Neurologia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img2.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mix sergury">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img3.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Operações de risco</h3>
                                <span>Cirurgia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img3.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mix orthopaedics">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img4.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Exames ortotpédicos</h3>
                                <span>Ortopedia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img4.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mix urology">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img5.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Exames Urológicos</h3>
                                <span>Urologia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img5.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mix orthopaedics cardiology">
                        <div class="single-photo">
                            <img src="<?php echo e(URL::to('img/gallery-img6.jpg')); ?>" alt="gallery">
                            <div class="gallery-content">
                                <h3>Exames Urológicos</h3>
                                <span>Urologia</span>
                                <a href="<?php echo e(route('consultas.index')); ?>" class="link-btn"><i class="icofont-link"></i></a>
                                <a href="<?php echo e(URL::to('img/gallery-img6.jpg')); ?>" class="popup-btn"><i
                                        class="icofont-expand"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery Area -->

    <!-- Start Pricing Area -->
    <section id="price" class="pricing-area ptb-100 bg-f9faff">
        <div class="container">
            <div class="section-title">
                <h3>Nossos Preços</h3>
                <span>Melhore Preços</span>
                <p>Conheça nossos planos e valores para os diversos serviços que oferecemos. Na EAB, buscamos
                    tornar o acesso à saúde mais acessível e transparente. Nesta seção, você encontrará informações
                    detalhadas sobre nossos
                    preços, garantindo que você possa planejar seu cuidado de saúde de forma consciente e informada.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>Teste Sanguíneo</h3>
                        </div>

                        <div class="price">
                            <span><sup>kz</sup>22145</span>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Hemograma Completo</li>
                                <li>Glicemia</li>
                                <li>Colesterol Total e Frações (HDL, LDL)</li>
                                <li>Triglicerídeos</li>
                                <li>Função Renal (Creatinina, Ureia)</li>
                                <li>Função Hepática (AST, ALT, Bilirrubina)</li>
                                <li>Marcadores Tumorais</li>
                            </ul>
                        </div>

                        <div class="pricing-footer">
                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marque Agora</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>check up</h3>
                        </div>

                        <div class="price">
                            <span><sup>kz</sup>111350</span>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Avaliação da Saúde Cardiovascular</li>
                                <li>Avaliação da Saúde Metabólica</li>
                                <li>Exames de Imagem(Radiologia toráx)</li>
                                <li>Avaliação da Saúde Óssea</li>
                                <li>Avaliação da Saúde Ocular e Auditiva</li>
                                <li>Avaliação da Saúde Mental</li>
                                <li>etc..</li>
                            </ul>
                        </div>

                        <div class="pricing-footer">
                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marque Agora</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="pricing-table">
                        <div class="pricing-header">
                            <h3>Teste de urina</h3>
                        </div>

                        <div class="price">
                            <span><sup>kz</sup>15000</span>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Exame Físico da Urina</li>
                                <li>Exame Químico da Urina</li>
                                <li>Exame Microscópico da Urina</li>
                                <li>Testes Específicos</li>
                                <li>Testes de gravidez através da urina</li>
                                <li>Teste de droga através da urina</li>
                                <li>Etc...</li>
                            </ul>
                        </div>

                        <div class="pricing-footer">
                            <a href="<?php echo e(route('consultas.index')); ?>" class="btn">Marque Agora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Area -->

    <!-- Start Testimonials Area -->
    <section class="testimonials-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h3>Testemunhas</h3>
                <span>Feedback dos nossos pacientes</span>
                <p>Descubra o que nossos pacientes têm a dizer sobre sua experiência conosco. Nossos testemunhos
                    refletem o compromisso da
                    nossa equipe em fornecer cuidados de saúde excepcionais e personalizados. Leia abaixo alguns relatos
                    reais de pacientes
                    que confiaram em nós para cuidar da sua saúde e bem-estar.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar1.jpg')); ?>" class="img-reduced" alt="client')">
                            </div>
                            <h4>Milton Cunha</h4>
                            <span>Estudante Universitário</span>
                        </div>

                        <p>"Uma plataforma perfeira para quem realmente precisa de um serviço celere"</p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar3.jpg')); ?>" alt="client')">
                            </div>
                            <h4>Milagre Silva</h4>
                            <span>Cuzinheira</span>
                        </div>

                        <p>"Todas as minhas consultas eu marco em casa com o meu smartphone e sempre fui bem sucedida"
                        </p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar7.jpg')); ?>" alt="client">
                            </div>
                            <h4>Paulo Correia</h4>
                            <span>Advogado</span>
                        </div>

                        <p>"Eu uso a plataforma devido ao plano familiar que proporciona à minha família e realmente é
                            muito bom!"</p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar5.jpg')); ?>" alt="client" class="img-reduced">
                            </div>
                            <h4>Elisângela Filomena</h4>
                            <span>Vendedora</span>
                        </div>

                        <p>"Marco todas as consultas da minha filha por meio da plataforma porque eu não gosto de
                            burocracia"</p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar4.jpg')); ?>" alt="client" class="img-reduced">
                            </div>
                            <h4>Messias Aleixo</h4>
                            <span>Técnico de Informática</span>
                        </div>

                        <p>"Realmente é uma plataforma feito para resolver problemas comuns aqui no nosso país que é o
                            excesso de burocracia já é um problema antigo"</p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-feedback">
                        <div class="client-info">
                            <div class="img">
                                <img src="<?php echo e(URL::to('img/client-avatar6.jpg')); ?>" alt="client">
                            </div>
                            <h4>Ana Bela</h4>
                            <span>Estundate</span>
                        </div>

                        <p>"Conheci a plataforma por meio do meu pai ele a utiliza para marcar as suas consultas
                            online."</p>

                        <i class="icofont-quote-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials Area -->

    <!-- Start News Area -->
    <section id="blog" class="news-area ptb-100 bg-f9faff">
        <div class="container">
            <div class="section-title">
                <h3>Últimas notícias</h3>
                <span>Nossas novidades & Dicas</span>
                <p>Fique por dentro das informações mais recentes e relevantes sobre saúde, bem-estar e novidades da
                    nossa clínica.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <a href="single-blog.html" class="blog-img"><img src="<?php echo e(URL::to('img/blog-img1.jpg')); ?>"
                                alt="blog"></a>

                        <div class="post-content">
                            <h4><a href="single-blog.html">Desconto exclusivo para 4 membros da família</a></h4>
                            <p>
                                Aproveite nosso desconto exclusivo para famílias, onde 4 membros podem receber
                                benefícios especiais em consultas e
                                tratamentos. É a oportunidade perfeita para garantir o bem-estar de todos os seus entes
                                queridos de forma acessível e
                                conveniente.

                                Detalhes da Oferta:

                                Desconto: Benefícios especiais em consultas e tratamentos para 4 membros da família
                                Como Solicitar: Entre em contacto por email
                            </p>
                            <a href="#" class="btn"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <a href="single-blog.html" class="blog-img"><img src="<?php echo e(URL::to('img/blog-img2.jpg')); ?>"
                                alt="blog"></a>

                        <div class="post-content">
                            <h4><a href="single-blog.html">Agora desconto de 8% para consultas pre-natais</a></h4>
                            <p>
                                Aproveite nosso desconto especial de 8% para consultas pré-natais durante este período.
                                Garanta o melhor cuidado para
                                você e seu bebê com nossos profissionais qualificados e dedicados.

                                Detalhes da Oferta:

                                Desconto: 8% em consultas pré-natais
                                Período da Promoção: 3 meses
                                Agende sua Consulta já
                            </p>
                            <a href="#" class="btn"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="single-blog-post">
                        <a href="single-blog.html" class="blog-img"><img src="<?php echo e(URL::to('img/blog-img3.jpg')); ?>"
                                alt="blog"></a>

                        <div class="post-content">
                            <h4><a href="single-blog.html">Evento solidário dia 11 dezembro</a></h4>
                            <p>Venha participar do nosso evento solidário no dia 11, onde estaremos arrecadando fundos
                                para apoiar EAB. Será uma oportunidade única de contribuir para uma causa nobre enquanto
                                desfruta de um ambiente acolhedor
                                e cheio de boas energias.</p>
                            <a href="#" class="btn"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Area -->

    <!-- Start Contact Area -->
    <section id="contact" class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box">
                        <h3><i class="icofont-google-map"></i> Endereços</h3>
                        <p><a href="https://www.google.com/maps/place/Exercisplan+4,+111+49+Stockholm,+Sweden/data=!4m2!3m1!1s0x465f9d5641a77669:0xe02744b36aab9f53?ved=2ahUKEwi38ZaU0rXfAhVWeH0KHY5CBWYQ8gEwAHoECAAQAQ"
                                target="_blank">Avenida comandante Gika 233, 30 <br> Luanda, Angola</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-box">
                        <h3><i class="icofont-envelope"></i> Email</h3>
                        <p><a href="#"><span class="__cf_email__"
                                    data-cfemail="e48d8a828ba4808b87908b96ca878b89">eabhealth@hotmail.com</span></a>
                        </p>
                        <p><a href="#"><span class="__cf_email__"
                                    data-cfemail="e48d8a828ba4808b87908b96ca878b89">eabemployee@gmail.com</span></a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-box">
                        <h3><i class="icofont-phone"></i> Telefones</h3>
                        <p><a href="#">+244 911 111 111</a></p>
                        <p><a href="#">+244 922 222 222</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-box">
                        <h3><i class="icofont-clock-time"></i> Horário</h3>
                        <ul>
                            <li>Segunda - Sexta <span>6H - 21H</span></li>
                            <li>Sábado<span>6H - 17H</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="get-in-touch">
                        <h3>Entrar em contacto</h3>
                        <p>
                            Estamos sempre disponíveis para atender às suas dúvidas, agendar consultas ou ouvir suas
                            sugestões. Não hesite em entrar
                            em contato conosco por telefone, e-mail ou preenchendo o formulário abaixo. Nossa equipe
                            está pronta para ajudá-lo e
                            fornecer o melhor atendimento possível.
                        </p>
                        <ul>
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <form id="" method="POST" action="<?php echo e(route('mensagem.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nome" id="name" required
                                        placeholder="Nome">
                                    
                                </div>
                            </div>
                            <?php if($errors->has('nome')): ?>
                            <span class="text-danger"><?php echo e($errors->first('conteudo')); ?></span>
                            <?php endif; ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" required
                                        placeholder="Email">
                                    
                                </div>
                            </div>
                            <?php if($errors->has('email')): ?>
                            <span class="text-danger"><?php echo e($errors->first('conteudo')); ?></span>
                            <?php endif; ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="conteudo" class="form-control" id="message" cols="30" rows="4"
                                        placeholder="Messagem"></textarea>
                                    
                                </div>
                            </div>
                            <?php if($errors->has('conteudo')): ?>
                            <span class="text-danger"><?php echo e($errors->first('conteudo')); ?></span>
                            <?php endif; ?>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn">Envie uma mensagem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

    <!-- Start Footer Area -->
    <footer class="footer-area bg-f9faff">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <p>© EAB - Efortless Appointment Booking é patrocinado por <a href="#" target="_blank">xTech</a></p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <ul>
                        <li><a href="http://localhost:8000/termos-de-uso">Termos & Condicões</a></li>
                        <li><a href="http://localhost:8000/politicas-de-privacidade">Políticas de privacidade</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <div class="go-top"><i class="icofont-stylish-up"></i></div>

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

</html><?php /**PATH /home/kenny/Desktop/WWW/EAB/resources/views/home.blade.php ENDPATH**/ ?>