<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastrar Serviço | Mobipet</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('partials.favicon')

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('partials.preloader')


    <header id="header" class="header fixed-top">

        <!-- Top Bar -->
        <div class="topbar d-flex align-items-center dark-background">
            <div class="container d-flex justify-content-center justify-content-md-between">

                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center">
                        <a href="mailto:mobipet@gmail.com">
                            mobipet@gmail.com
                        </a>
                    </i>

                    <i class="bi bi-phone d-flex align-items-center ms-4">
                        <span>(19) 98943-2384</span>
                    </i>
                </div>

                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#!" class="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="#!" class="instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>

            </div>
        </div>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow"
            style="width: 50px;
              height: 50px;
              position: fixed;
              bottom: 20px;
              right: 20px;
              z-index: 999;
              font-size: 24px;">

            <i class="bi bi-arrow-up-short"></i>

        </a>

        <!-- Branding -->
        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">

                <a href="{{ route('index') }}" class="logo d-flex align-items-center">

                    <img src="{{ asset('assets/img/logo_oficial_mobipet.png') }}" alt="Mobipet" class="logo-marca" width="56" height="56">
                    <span class="logo-wordmark"><span class="logo-wordmark__mobi">Mobi</span><span class="logo-wordmark__pet">Pet</span></span>
                </a>

                <nav id="navmenu" class="navmenu">

                    <ul>

                        
                        @include('partials.nav-user')
                    </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        <section class="py-5 bg-light" style="margin-top: 100px;">
            <div class="container" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="fw-bold display-5">Cadastrar Novo Serviço</h2>
                    <p class="text-secondary">Gerencie o catálogo oferecendo novas opções de cuidados para os pets.</p>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="feature-card">

                            @if ($errors->any())
                                <div class="alert alert-danger mb-4 style-alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('services.store') }}" method="POST">
                                @csrf

                                <div class="row g-4">

                                    <!-- Nome do Serviço -->
                                    <div class="col-md-12">
                                        <label for="nome" class="form-label fw-bold text-dark">
                                            Nome do Serviço *
                                        </label>

                                        <input type="text"
                                            class="form-control form-control-lg rounded-pill border-2" id="nome"
                                            name="nome" placeholder="Ex: Banho Premium + Tosa Higiênica" required
                                            value="{{ old('nome') }}">
                                    </div>

                                    <!-- Categoria -->
                                    <div class="col-md-6">
                                        <label for="categoria" class="form-label fw-bold text-dark">
                                            Categoria *
                                        </label>

                                        <select class="form-select form-control-lg rounded-pill border-2"
                                            id="categoria" name="categoria" required>

                                            <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>
                                                Selecione uma categoria...
                                            </option>

                                            <option value="banho"
                                                {{ old('categoria') == 'banho' ? 'selected' : '' }}>
                                                Banho
                                            </option>

                                            <option value="tosa" {{ old('categoria') == 'tosa' ? 'selected' : '' }}>
                                                Tosa
                                            </option>

                                            <option value="consulta"
                                                {{ old('categoria') == 'consulta' ? 'selected' : '' }}>
                                                Consulta Veterinária
                                            </option>

                                            <option value="outros"
                                                {{ old('categoria') == 'outros' ? 'selected' : '' }}>
                                                Outros Serviços
                                            </option>

                                        </select>
                                    </div>

                                    <!-- Preço -->
                                    <div class="col-md-6">
                                        <label for="preco" class="form-label fw-bold text-dark">
                                            Preço (R$) *
                                        </label>

                                        <input type="text"
                                            class="form-control form-control-lg rounded-pill border-2" id="preco"
                                            name="preco" placeholder="0,00" required value="{{ old('preco') }}">
                                    </div>

                                    <!-- Duração -->
                                    <div class="col-md-6">
                                        <label for="duracao" class="form-label fw-bold text-dark">
                                            Tempo Estimado *
                                        </label>

                                        <input type="text"
                                            class="form-control form-control-lg rounded-pill border-2" id="duracao"
                                            name="duracao" placeholder="00:00" required
                                            value="{{ old('duracao') }}">
                                    </div>

                                    <!-- Descrição -->
                                    <div class="col-md-6">
                                        <label for="descricao" class="form-label fw-bold text-dark">
                                            Descrição do Serviço
                                        </label>

                                        <textarea class="form-control border-2" id="descricao" name="descricao" rows="4" style="border-radius:20px;"
                                            placeholder="Descreva os procedimentos, produtos utilizados ou observações...">{{ old('descricao') }}</textarea>
                                    </div>

                                    <!-- Botões -->
                                    <div class="col-12 text-center mt-4">

                                        <button type="submit"
                                            class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow me-3">

                                            <i class="fa-solid fa-save me-2"></i>
                                            Salvar Serviço

                                        </button>

                                        <a href="{{ route('services') }}"
                                            class="btn btn-outline-secondary btn-lg rounded-pill px-5 py-3">

                                            Cancelar

                                        </a>

                                    </div>

                                </div>
                            </form>

                            <!-- jQuery -->
                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

                            <!-- jQuery Mask -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                            <script>
                                $(function() {

                                    // Máscara do preço
                                    $('#preco').mask('#.##0,00', {
                                        reverse: true
                                    });

                                    // Máscara da duração (HH:MM)
                                    $('#duracao').mask('00:00');

                                    // Ao selecionar "Outros Serviços", leva para a descrição
                                    $('#categoria').on('change', function() {

                                        if ($(this).val() === 'outros') {

                                            $('html, body').animate({
                                                scrollTop: $('#descricao').offset().top - 150
                                            }, 500);

                                            setTimeout(function() {
                                                $('#descricao').focus();
                                            }, 550);

                                        }

                                    });

                                });
                            </script>

                            <!-- jQuery -->
                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

                            <!-- jQuery Mask -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                            <script>
                                $(document).ready(function() {

                                    // Máscara do preço
                                    $('#preco').mask('#.##0,00', {
                                        reverse: true
                                    });

                                    // Máscara da duração (HH:MM)
                                    $('#duracao').mask('00:00');

                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <style>
        body {
            background: #f7f9fc;
        }

        .feature-card {
            background: white;
            border-radius: 35px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb !important;
            box-shadow: 0 0 0 0.25px rgba(37, 99, 235, 0.25) !important;
        }

        .style-alert {
            border-radius: 20px;
            font-size: 15px;
        }
    </style>

    <style>
        /* ---------- Footer criativo ---------- */
        .footer-16 {
            position: relative;
            overflow: visible;
            padding-bottom: 90px;
        }

        .footer-16 .footer-main {
            margin-bottom: 0;
        }

        .footer-16::before {
            content: "";
            position: absolute;
            top: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent-color), #22c55e, var(--accent-color), transparent);
            background-size: 200% 100%;
            animation: footerGradientMove 6s linear infinite;
        }

        @keyframes footerGradientMove {
            0% { background-position: 0% 0; }
            100% { background-position: 200% 0; }
        }

        .footer-badge {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color), #1d4ed8);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(23, 92, 221, 0.35);
            z-index: 2;
            transition: transform 0.4s ease;
        }

        .footer-badge i {
            color: #fff;
            font-size: 26px;
        }

        .footer-badge:hover {
            transform: translate(-50%, -50%) rotate(-15deg) scale(1.1);
        }

        .footer-16 .brand-section {
            max-width: 380px;
        }

        .footer-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #16a34a;
            background: rgba(34, 197, 94, 0.12);
            padding: 6px 14px;
            border-radius: 999px;
            margin-bottom: 22px;
        }

        .footer-status .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            animation: statusPulse 2s infinite;
        }

        @keyframes statusPulse {
            0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5); }
            70% { box-shadow: 0 0 0 8px rgba(34, 197, 94, 0); }
            100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }

        .footer-16 .contact-info {
            margin-top: 24px;
        }

        .footer-16 .footer-social .social-link.whatsapp i {
            color: #25d366;
        }

        .footer-16 .footer-social .social-link.instagram i {
            background: linear-gradient(45deg, #f9ce34, #ee2a7b, #6228d7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .footer-16 .footer-bottom .legal-links .credits i {
            color: #ef4444;
            margin: 0 2px;
        }

        .footer-16 .footer-bottom .copyright p {
            color: rgba(255, 255, 255, 0.85);
        }

        .footer-16 .footer-bottom .copyright p .sitename {
            color: #fff;
        }

        .footer-16 .footer-bottom .legal-links a {
            color: rgba(255, 255, 255, 0.85);
        }

        .footer-16 .footer-bottom .legal-links a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .footer-16 .footer-bottom .legal-links .credits {
            color: rgba(255, 255, 255, 0.7);
            border-left-color: rgba(255, 255, 255, 0.3);
        }

        .footer-16 .footer-bottom .legal-links .credits a {
            color: #fff;
            font-weight: 600;
        }
    </style>

    @include('partials.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>


    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/inputmask.min.js"></script>
    <script>
        function exibeSweetAlert(icone, titulo, texto) {
            Swal.fire({
                title: titulo,
                text: texto,
                icon: icone
            });
        }
    </script>

    @if (session('success'))
        <script>
            exibeSweetAlert("success", "Sucesso", '{{ session('success') }}')
        </script>
    @endif

    @if ($errors->any())
        <script>
            exibeSweetAlert('error', 'Erro!', '{{ implode('|', $errors->all()) }}')
        </script>
    @endif

    @include('partials.logout-confirm')
</body>

</html>
