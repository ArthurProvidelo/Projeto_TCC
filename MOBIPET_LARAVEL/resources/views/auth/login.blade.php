<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Entrar | Mobipet</title>
    <meta name="description"
        content="Acesse sua conta Mobipet para agendar serviços, acompanhar o atendimento do seu pet em tempo real e gerenciar seus cadastros.">
    <meta name="keywords" content="login mobipet, entrar, acesso cliente, cadastro tutor, agendamento pet">

    <!-- Favicons -->
    @include('partials.favicon')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        /* ===========================================================
           PÁGINA LOGIN / CADASTRO — MOBIPET  ·  isolado (prefixo lg-)
           =========================================================== */
        .lg-page {
            --lg-accent: #175cdd;
            --lg-accent-dark: #0f47b3;
            --lg-accent-soft: #eaf1fe;
            --lg-ink: #0f1b34;
            --lg-body: #4a5568;
            --lg-muted: #8794a7;
            --lg-line: #e6ecf5;
            --lg-bg: #f7f9ff;
            --lg-radius: 26px;
            --lg-radius-sm: 14px;
            --lg-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --lg-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--lg-body);
        }

        .lg-page h1,
        .lg-page h2,
        .lg-page h3,
        .lg-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--lg-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        /* Barra de progresso de rolagem (padrão do site) */
        .lg-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--lg-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* Rótulo de seção */
        .lg-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .74rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--lg-accent);
            margin-bottom: 14px;
        }

        .lg-eyebrow::before {
            content: "";
            width: 26px;
            height: 2px;
            background: currentColor;
        }

        .lg-eyebrow .lg-idx {
            color: var(--lg-muted);
            font-variant-numeric: tabular-nums;
        }

        /* =========================================================
           FUNDO DA PÁGINA — a foto de sempre, com um véu claro e
           "bolhas" azuis desfocadas à deriva por cima, num looping
           lento (modo claro — o sistema é branco e azul).
           ========================================================= */
        body.inner-page {
            background-image: url('{{ asset('assets/img/fundo_login.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        .lg-bubbles {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            background: rgba(247, 249, 255, .42);
        }

        .lg-bubble {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: .65;
            will-change: transform;
        }

        .lg-bubble--1 {
            width: 48vw;
            height: 48vw;
            top: -14%;
            left: -10%;
            background: radial-gradient(circle at 30% 30%, #5b93fb, transparent 70%);
            animation: lgFloat1 24s ease-in-out infinite;
        }

        .lg-bubble--2 {
            width: 40vw;
            height: 40vw;
            bottom: -16%;
            right: -8%;
            background: radial-gradient(circle at 60% 40%, #175cdd, transparent 70%);
            animation: lgFloat2 28s ease-in-out infinite;
        }

        .lg-bubble--3 {
            width: 32vw;
            height: 32vw;
            top: 38%;
            left: 58%;
            background: radial-gradient(circle at 50% 50%, #8fb8ff, transparent 72%);
            animation: lgFloat3 20s ease-in-out infinite;
        }

        @keyframes lgFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(6%, 8%) scale(1.08); }
        }

        @keyframes lgFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-7%, -6%) scale(1.06); }
        }

        @keyframes lgFloat3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-6%, 6%) scale(1.12); }
        }

        /* =========================================================
           BOTÕES (sistema consistente — padrão devs)
           ========================================================= */
        .lg-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .97rem;
            padding: 11px 26px;
            border-radius: 999px;
            border: 1.5px solid transparent;
            text-decoration: none;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .lg-btn--primary {
            width: 100%;
            background: var(--lg-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .lg-btn--primary:hover {
            background: var(--lg-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .lg-btn--ghost {
            min-width: 150px;
            background: transparent;
            color: #fff;
            border-color: rgba(255, 255, 255, .7);
        }

        .lg-btn--ghost:hover {
            background: #fff;
            color: var(--lg-accent);
            transform: translateY(-3px);
        }

        /* =========================================================
           CARD — login de um lado, convite pra criar conta do outro
           (layout estático, igual ao das outras telas de auth; a
           conta é criada na própria página /cadastro, já existente).
           ========================================================= */
        .lg-wrapper {
            display: flex;
            justify-content: center;
            padding: 1rem 1rem 1.5rem;
        }

        .lg-card {
            position: relative;
            width: 100%;
            max-width: 900px;
            min-height: 480px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .6);
            border-radius: var(--lg-radius);
            overflow: hidden;
            box-shadow: var(--lg-shadow);
            -webkit-backdrop-filter: blur(22px) saturate(140%);
            backdrop-filter: blur(22px) saturate(140%);
            font-family: "Roboto", sans-serif;
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            transition: opacity .28s ease, transform .28s cubic-bezier(.4, 0, .2, 1), filter .28s ease;
        }

        /* Transição de saída ao trocar pra Cadastro/Funcionário — o card
           encolhe e desfoca levemente antes da navegação de verdade
           acontecer, em vez do corte seco padrão do navegador. */
        .lg-card.is-leaving {
            opacity: 0;
            transform: scale(.96) translateY(10px);
            filter: blur(2px);
        }

        @media (prefers-reduced-motion: reduce) {
            .lg-card {
                transition: none;
            }
        }

        .lg-panel {
            padding: 32px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: transparent;
        }

        /* =========================================================
           TROCA CLIENTE / FUNCIONÁRIO — deixa óbvio, direto no card,
           que existem as duas portas de entrada (sem depender só do
           menu do cabeçalho).
           ========================================================= */
        .lg-role-switch {
            display: inline-flex;
            align-self: flex-start;
            padding: 4px;
            gap: 2px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .55);
            border: 1px solid var(--lg-line);
            margin-bottom: 14px;
        }

        .lg-role-switch a,
        .lg-role-switch span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 999px;
            font-family: "Lato", sans-serif;
            font-size: .78rem;
            font-weight: 700;
            text-decoration: none;
            color: var(--lg-muted);
            transition: background-color .2s ease, color .2s ease, box-shadow .2s ease;
        }

        .lg-role-switch .is-active {
            background: var(--lg-accent);
            color: #fff;
            box-shadow: 0 6px 14px -6px rgba(23, 92, 221, .6);
        }

        .lg-role-switch a:not(.is-active):hover {
            background: #fff;
            color: var(--lg-ink);
        }

        .lg-panel h2 {
            font-weight: 800;
            font-size: clamp(1.4rem, 3vw, 1.8rem);
            margin: 0 0 4px;
            color: var(--lg-ink);
        }

        .lg-panel .lg-sub {
            font-size: .92rem;
            color: var(--lg-muted);
            margin-bottom: 16px;
        }

        /* Formulário de login — ritmo vertical uniforme entre os campos,
           em vez dos espaçamentos avulsos (mb-2/mb-3/mb-4) de antes. */
        .lg-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .lg-field {
            display: flex;
            flex-direction: column;
        }

        /* Campos */
        .lg-panel .form-label {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .7rem;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--lg-muted);
            margin-bottom: 6px;
        }

        .lg-panel .input-group-text {
            background: rgba(255, 255, 255, .6);
            border: 1px solid var(--lg-line);
            color: var(--lg-muted);
        }

        .lg-panel .form-control {
            height: 46px;
            background: rgba(255, 255, 255, .55);
            border: 1px solid var(--lg-line);
            color: var(--lg-ink);
            box-shadow: none;
            transition: border-color .25s ease, box-shadow .25s ease, background-color .25s ease;
        }

        .lg-panel .form-control::placeholder {
            color: var(--lg-muted);
        }

        .lg-panel .form-control:focus {
            background: #fff;
            border-color: var(--lg-accent);
            box-shadow: 0 0 0 4px var(--lg-accent-soft);
            color: var(--lg-ink);
        }

        /* =========================================================
           RECUPERAR SENHA
           ========================================================= */
        .lg-forgot-password {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: var(--lg-accent);
            font-family: "Lato", sans-serif;
            font-size: .85rem;
            font-weight: 700;
            text-decoration: none;
            transition: color .2s ease, transform .2s ease;
        }

        .lg-forgot-password:hover {
            color: var(--lg-accent-dark);
            text-decoration: underline;
        }

        /* =========================================================
           DIVISOR "OU CONTINUE COM" + BOTÃO GOOGLE
           ========================================================= */
        .lg-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 14px 0 12px;
        }

        .lg-divider::before,
        .lg-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--lg-line);
        }

        .lg-divider span {
            font-family: "Lato", sans-serif;
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--lg-muted);
            white-space: nowrap;
        }

        .lg-btn--google {
            width: 100%;
            background: #fff;
            color: #1f2937;
            border-color: var(--lg-line);
        }

        .lg-btn--google:hover {
            background: #fff;
            color: #1f2937;
            transform: translateY(-3px);
            box-shadow: 0 14px 26px -12px rgba(15, 27, 52, .18);
        }

        /* Seta do botão principal: desliza levemente no hover */
        .lg-btn--primary .lg-btn-arrow {
            transition: transform .25s ease;
        }

        .lg-btn--primary:hover .lg-btn-arrow {
            transform: translateX(4px);
        }

        /* =========================================================
           ALERTAS DE ERRO — vidro líquido em tom vermelho, no mesmo
           idioma visual do resto do site (glass + blur), em vez do
           alerta genérico do Bootstrap. Entra com uma leve "sacudida"
           (chama atenção sem ser agressivo) e pode ser fechado.
           ========================================================= */
        .lg-alert {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 44px 16px 18px;
            margin-bottom: 14px;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(254, 226, 226, .6), rgba(255, 255, 255, .4));
            border: 1px solid rgba(220, 38, 38, .25);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            backdrop-filter: blur(18px) saturate(180%);
            box-shadow: 0 18px 40px -20px rgba(220, 38, 38, .38), inset 0 1px 0 rgba(255, 255, 255, .5);
            animation: lg-alert-in .5s cubic-bezier(.34, 1.56, .64, 1);
        }

        @keyframes lg-alert-in {
            0%   { opacity: 0; transform: translateY(-10px) scale(.95); }
            50%  { opacity: 1; transform: translateX(-4px); }
            70%  { transform: translateX(3px); }
            85%  { transform: translateX(-1px); }
            100% { opacity: 1; transform: translateX(0) scale(1); }
        }

        .lg-alert-icon {
            flex: none;
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(220, 38, 38, .14);
            color: #dc2626;
            font-size: 1.05rem;
        }

        .lg-alert-body {
            flex: 1;
            padding-top: 3px;
            font-size: .92rem;
            line-height: 1.5;
            color: #7f1d1d;
        }

        .lg-alert-body strong {
            display: block;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: .86rem;
            color: #991b1b;
            margin-bottom: 2px;
        }

        .lg-alert-body ul {
            margin: 0;
            padding-left: 18px;
        }

        .lg-alert-body li {
            margin-bottom: 2px;
        }

        .lg-alert-body li:last-child {
            margin-bottom: 0;
        }

        .lg-alert-close {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 26px;
            height: 26px;
            display: grid;
            place-items: center;
            border: none;
            background: transparent;
            color: #991b1b;
            opacity: .55;
            cursor: pointer;
            border-radius: 50%;
            font-size: .85rem;
            transition: opacity .2s ease, background-color .2s ease;
        }

        .lg-alert-close:hover {
            opacity: 1;
            background: rgba(220, 38, 38, .14);
        }

        @media (prefers-reduced-motion: reduce) {
            .lg-alert {
                animation: none;
            }
        }

        /* =========================================================
           PAINEL DE CONVITE (estático) — "ainda não tem conta?"
           ========================================================= */
        .lg-promo {
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--lg-accent), var(--lg-accent-dark));
        }

        .lg-promo h2 {
            color: #fff;
            font-family: "Montserrat", sans-serif;
            font-size: clamp(1.5rem, 3.4vw, 2.1rem);
            font-weight: 800;
            margin-bottom: 14px;
        }

        .lg-promo p {
            max-width: 320px;
            margin-bottom: 28px;
            font-size: .95rem;
            line-height: 1.65;
            color: rgba(255, 255, 255, .85);
        }

        /* =========================================================
           RESPONSIVO
           ========================================================= */
        @media (max-width: 900px) {
            .lg-card {
                max-width: 700px;
            }

            .lg-panel {
                padding: 40px 35px;
            }
        }

        @media (max-width: 700px) {
            .lg-card {
                grid-template-columns: 1fr;
                max-width: 520px;
            }

            .lg-promo {
                order: -1;
                padding: 30px 25px;
            }

            .lg-promo p {
                font-size: .85rem;
            }

            .lg-panel {
                padding: 35px 25px;
            }
        }

        @media (max-width: 480px) {
            .lg-card {
                border-radius: 20px;
            }

            .lg-panel {
                padding: 30px 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {

            .lg-page *,
            .lg-page *::before,
            .lg-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="inner-page">

    <div class="lg-bubbles" aria-hidden="true">
        <div class="lg-bubble lg-bubble--1"></div>
        <div class="lg-bubble lg-bubble--2"></div>
        <div class="lg-bubble lg-bubble--3"></div>
    </div>

    @include('partials.preloader')

    <div class="lg-progress" id="lgProgress"></div>

    <header id="header" class="header fixed-top">

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

    <main class="main lg-page" style="margin-top: 100px;">

        <!-- ================= ALERTAS GLOBAIS ================= -->
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10" style="max-width:900px;">
                    @if (session('erro'))
                        <div class="lg-alert" role="alert">
                            <span class="lg-alert-icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            <div class="lg-alert-body">
                                <strong>Ops, não foi dessa vez</strong>
                                {{ session('erro') }}
                            </div>
                            <button type="button" class="lg-alert-close" aria-label="Fechar">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="lg-alert" role="alert">
                            <span class="lg-alert-icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            <div class="lg-alert-body">
                                <strong>Confira os dados abaixo</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- ================= CARD LOGIN ================= -->
        <div class="lg-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="lg-card">

                <!-- ---------- LOGIN ---------- -->
                <div class="lg-panel">

                    <div class="lg-role-switch">
                        <span class="is-active"><i class="bi bi-person"></i> Cliente</span>
                        <a href="{{ route('login.funcionario') }}" class="lg-switch-link" data-no-loader><i class="bi bi-briefcase"></i> Funcionário</a>
                    </div>

                    <h2>Entrar</h2>
                    <p class="lg-sub">É um prazer ter você de volta conosco!</p>

                    <form method="POST" action="{{ route('login.autenticar') }}" class="lg-form">
                        @csrf

                        <div class="lg-field">
                            <label class="form-label">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email"
                                    class="form-control rounded-end-3"
                                    placeholder="seuemail@exemplo.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="lg-field">
                            <label class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="senha" id="loginSenha"
                                    class="form-control"
                                    placeholder="Sua senha" required>
                                <span class="input-group-text toggle-senha rounded-end-3" data-target="loginSenha"
                                    role="button" tabindex="0" aria-label="Mostrar senha">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <!-- RECUPERAR SENHA -->
                        <div class="text-end">
                            <a href="{{ route('senha.recuperar') }}" class="lg-forgot-password">
                                <i class="bi bi-key me-1"></i>
                                Esqueci minha senha
                            </a>
                        </div>

                        <button type="submit" class="lg-btn lg-btn--primary">
                            Entrar
                            <i class="bi bi-arrow-right lg-btn-arrow"></i>
                        </button>

                    </form>

                    <div class="lg-divider"><span>ou continue com</span></div>

                    <a href="{{ route('google.login') }}" class="lg-btn lg-btn--google">
                        <svg width="18" height="18" viewBox="0 0 48 48" aria-hidden="true">
                            <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                            <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/>
                            <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
                            <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                        </svg>
                        Entrar com o Google
                    </a>

                </div>

                <!-- ---------- CONVITE PARA CRIAR CONTA (página própria) ---------- -->
                <div class="lg-promo">
                    <h2>Olá, amigo!</h2>
                    <p>Ainda não possui uma conta? Cadastre-se para aproveitar todos os recursos do Mobipet.</p>
                    <a href="{{ route('cadastro') }}" class="lg-btn lg-btn--ghost lg-switch-link" data-no-loader>
                        Cadastrar
                    </a>
                </div>

            </div>
        </div>

    </main>

    <a href="#" id="scroll-top"
        class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow"
        style="width: 50px; height: 50px; position: fixed; bottom: 20px; right: 20px; z-index: 999; font-size: 24px;">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Barra de progresso de rolagem -->
    <script>
        (function () {
            var bar = document.getElementById('lgProgress');
            if (!bar) return;
            function update() {
                var h = document.documentElement;
                var max = h.scrollHeight - h.clientHeight;
                var pct = max > 0 ? (h.scrollTop || document.body.scrollTop) / max * 100 : 0;
                bar.style.width = pct + '%';
            }
            document.addEventListener('scroll', update, { passive: true });
            window.addEventListener('resize', update);
            update();
        })();
    </script>

    <!-- Transição suave ao trocar para Cadastro / Funcionário -->
    <script>
        (function () {
            var card = document.querySelector('.lg-card');
            if (!card) return;

            document.querySelectorAll('.lg-switch-link').forEach(function (link) {
                link.addEventListener('click', function (e) {
                    if (e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                    e.preventDefault();
                    var href = link.href;
                    card.classList.add('is-leaving');
                    setTimeout(function () { window.location.href = href; }, 260);
                });
            });
        })();
    </script>

    <!-- Fechar os alertas de erro -->
    <script>
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.lg-alert-close');
            if (!btn) return;
            var alert = btn.closest('.lg-alert');
            if (alert) alert.remove();
        });
    </script>

    @include('partials.logout-confirm')

</body>

</html>
