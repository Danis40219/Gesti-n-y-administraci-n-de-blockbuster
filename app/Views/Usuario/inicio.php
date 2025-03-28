<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= esc($nombre_pagina ?? 'Login') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/font-awesome.min.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/elegant-icons.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/plyr.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/nice-select.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/slicknav.min.css">
    <link rel="stylesheet" href="<?= RECURSOS_USUARIO_CSS ?>/style.css">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS . '/toastr/toastr.min.css') ?>">
</head>

<body>
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?= base_url('/') ?>">
                            <img src="<?= RECURSOS_USUARIO_IMG ?>/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">Homepage</a></li>
                            <li><a href="#">Categories</a>
                                <ul class="dropdown">
                                    <li><a href="#">Categories</a></li>
                                    <li><a href="#">Anime Details</a></li>
                                    <li><a href="#">Anime Watching</a></li>
                                    <li><a href="#">Blog Details</a></li>
                                    <li><a href="<?= base_url('registro') ?>">Sign Up</a></li>
                                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="<?= base_url('login') ?>"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <section class="normal-breadcrumb set-bg" data-setbg="<?= RECURSOS_USUARIO_IMG ?>/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2><?= esc($titulo_pagina ?? 'Login') ?></h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <!-- Login Form -->
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <?= form_open('iniciar_sesion', ['id' => 'form-login']) ?>

                        <div class="input__item">
                            <?= form_input([
                                'type' => 'email',
                                'name' => 'correo_electronico',
                                'placeholder' => 'Email address',
                                'class' => 'form-control',
                                'required' => true
                            ]) ?>
                            <span class="icon_mail"></span>
                        </div>

                        <div class="input__item">
                            <?= form_input([
                                'type' => 'password',
                                'name' => 'pass',
                                'placeholder' => 'Password',
                                'class' => 'form-control',
                                'required' => true
                            ]) ?>
                            <span class="icon_lock"></span>
                        </div>

                        <?= form_submit('btn-submit', 'Login Now', ['class' => 'site-btn']) ?>

                        <?= form_close() ?>

                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>

                <!-- Register Prompt -->
                <div class="col-lg-6">
                    <div class="login__register text-center">
                        <h3>Don’t Have An Account?</h3>
                        <a href="<?= base_url('registro') ?>" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="<?= base_url('/') ?>"><img src="<?= RECURSOS_USUARIO_IMG ?>/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">Homepage</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        &copy; <?= date('Y') ?> All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Search Modal -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="<?= RECURSOS_USUARIO_JS ?>/jquery-3.3.1.min.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/bootstrap.min.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/player.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/jquery.nice-select.min.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/mixitup.min.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/jquery.slicknav.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/owl.carousel.min.js"></script>
    <script src="<?= RECURSOS_USUARIO_JS ?>/main.js"></script>
    <script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS . '/toastr/toastr.min.js') ?>"></script>
    <script><?= show_message() ?></script>
</body>
</html>
