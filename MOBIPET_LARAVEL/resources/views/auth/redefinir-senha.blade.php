<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Redefinir Senha | Mobipet</title>
    <meta name="description"
        content="Crie uma nova senha para sua conta Mobipet e volte a acessar todos os recursos da plataforma.">
    <meta name="keywords" content="redefinir senha mobipet, nova senha, recuperar acesso">

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
           PÁGINA REDEFINIR SENHA — MOBIPET  ·  isolado (prefixo rd-)
           =========================================================== */
        .rd-page {
            --rd-accent: #175cdd;
            --rd-accent-dark: #0f47b3;
            --rd-accent-soft: #eaf1fe;
            --rd-ink: #0f1b34;
            --rd-body: #4a5568;
            --rd-muted: #8794a7;
            --rd-line: #e6ecf5;
            --rd-bg: #f7f9ff;
            --rd-radius: 26px;
            --rd-radius-sm: 14px;
            --rd-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --rd-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--rd-body);
        }

        .rd-page h1,
        .rd-page h2,
        .rd-page h3,
        .rd-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--rd-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        /* Barra de progresso de rolagem (padrão do site) */
        .rd-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--rd-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* Rótulo de seção */
        .rd-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .74rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--rd-accent);
            margin-bottom: 14px;
        }

        .rd-eyebrow::before {
            content: "";
            width: 26px;
            height: 2px;
            background: currentColor;
        }

        .rd-eyebrow .rd-idx {
            color: var(--rd-muted);
            font-variant-numeric: tabular-nums;
        }

        /* =========================================================
           FUNDO DA PÁGINA — foto + véu claro + "bolhas" azuis
           desfocadas à deriva (modo claro, sistema branco e azul).
           ========================================================= */
        body.inner-page {
            background-image: url('{{ asset('assets/img/fundo_login.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        .rd-bubbles {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            background: rgba(247, 249, 255, .42);
        }

        .rd-bubble {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: .65;
            will-change: transform;
        }

        .rd-bubble--1 {
            width: 48vw;
            height: 48vw;
            top: -14%;
            left: -10%;
            background: radial-gradient(circle at 30% 30%, #5b93fb, transparent 70%);
            animation: rdFloat1 24s ease-in-out infinite;
        }

        .rd-bubble--2 {
            width: 40vw;
            height: 40vw;
            bottom: -16%;
            right: -8%;
            background: radial-gradient(circle at 60% 40%, #175cdd, transparent 70%);
            animation: rdFloat2 28s ease-in-out infinite;
        }

        .rd-bubble--3 {
            width: 32vw;
            height: 32vw;
            top: 38%;
            left: 58%;
            background: radial-gradient(circle at 50% 50%, #8fb8ff, transparent 72%);
            animation: rdFloat3 20s ease-in-out infinite;
        }

        @keyframes rdFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(6%, 8%) scale(1.08); }
        }

        @keyframes rdFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-7%, -6%) scale(1.06); }
        }

        @keyframes rdFloat3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-6%, 6%) scale(1.12); }
        }

        /* =========================================================
           BOTÕES (sistema consistente — padrão devs)
           ========================================================= */
        .rd-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .97rem;
            padding: 14px 26px;
            border-radius: 999px;
            border: 1.5px solid transparent;
            text-decoration: none;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .rd-btn--primary {
            width: 100%;
            background: var(--rd-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .rd-btn--primary:hover {
            background: var(--rd-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .rd-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: "Lato", sans-serif;
            font-weight: 600;
            font-size: .85rem;
            color: var(--rd-muted);
            text-decoration: none;
            margin-top: 18px;
            transition: color .2s ease, gap .2s ease;
        }

        .rd-back-link:hover {
            color: var(--rd-accent);
            gap: 10px;
        }

        /* =========================================================
           CARD (redefinição — layout estático de 2 colunas)
           ========================================================= */
        .rd-wrapper {
            display: flex;
            justify-content: center;
            padding: 2rem 1rem 4rem;
        }

        .rd-card {
            position: relative;
            width: 100%;
            max-width: 900px;
            min-height: 480px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .6);
            border-radius: var(--rd-radius);
            overflow: hidden;
            box-shadow: var(--rd-shadow);
            -webkit-backdrop-filter: blur(22px) saturate(140%);
            backdrop-filter: blur(22px) saturate(140%);
            font-family: "Roboto", sans-serif;
            display: flex;
        }

        /* =========================================================
           ALERTAS DE ERRO — vidro líquido em tom vermelho
           ========================================================= */
        .rd-alert {
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
            animation: rd-alert-in .5s cubic-bezier(.34, 1.56, .64, 1);
        }

        @keyframes rd-alert-in {
            0%   { opacity: 0; transform: translateY(-10px) scale(.95); }
            50%  { opacity: 1; transform: translateX(-4px); }
            70%  { transform: translateX(3px); }
            85%  { transform: translateX(-1px); }
            100% { opacity: 1; transform: translateX(0) scale(1); }
        }

        .rd-alert-icon {
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

        .rd-alert-body {
            flex: 1;
            padding-top: 3px;
            font-size: .92rem;
            line-height: 1.5;
            color: #7f1d1d;
        }

        .rd-alert-body strong {
            display: block;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: .86rem;
            color: #991b1b;
            margin-bottom: 2px;
        }

        .rd-alert-body ul {
            margin: 0;
            padding-left: 18px;
        }

        .rd-alert-body li {
            margin-bottom: 2px;
        }

        .rd-alert-body li:last-child {
            margin-bottom: 0;
        }

        .rd-alert-close {
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

        .rd-alert-close:hover {
            opacity: 1;
            background: rgba(220, 38, 38, .14);
        }

        @media (prefers-reduced-motion: reduce) {
            .rd-alert {
                animation: none;
            }
        }

        /* =========================================================
           FORMULÁRIO
           ========================================================= */
        .rd-panel {
            width: 50%;
            padding: 55px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .rd-panel h2 {
            font-weight: 800;
            font-size: clamp(1.6rem, 3vw, 2rem);
            margin: 0 0 6px;
        }

        .rd-panel .rd-sub {
            font-size: .92rem;
            color: var(--rd-muted);
            margin-bottom: 26px;
        }

        /* Campos */
        .rd-panel .form-label {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .7rem;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--rd-muted);
            margin-bottom: 6px;
        }

        .rd-panel .input-group-text {
            background: var(--rd-bg);
            border: 1px solid var(--rd-line);
            color: var(--rd-muted);
            cursor: pointer;
        }

        .rd-panel .form-control {
            height: 50px;
            border: 1px solid var(--rd-line);
            box-shadow: none;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        .rd-panel .form-control:focus {
            border-color: var(--rd-accent);
            box-shadow: 0 0 0 4px var(--rd-accent-soft);
        }

        /* Indicador de força da senha */
        .rd-strength {
            display: flex;
            gap: 6px;
            margin-top: 10px;
        }

        .rd-strength span {
            height: 4px;
            flex: 1;
            border-radius: 999px;
            background: var(--rd-line);
            transition: background .25s ease;
        }

        .rd-strength-label {
            font-size: .74rem;
            color: var(--rd-muted);
            margin-top: 6px;
        }

        /* =========================================================
           PAINEL AZUL LATERAL (estático)
           ========================================================= */
        .rd-side {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--rd-accent), var(--rd-accent-dark));
        }

        .rd-side i.bi {
            font-size: 3.2rem;
            margin-bottom: 18px;
            opacity: .95;
        }

        .rd-side h2 {
            color: #fff;
            font-family: "Montserrat", sans-serif;
            font-size: clamp(1.5rem, 3.4vw, 2.1rem);
            font-weight: 800;
            margin-bottom: 14px;
        }

        .rd-side p {
            max-width: 320px;
            margin-bottom: 4px;
            font-size: .95rem;
            line-height: 1.65;
            color: rgba(255, 255, 255, .85);
        }

        /* =========================================================
           RESPONSIVO
           ========================================================= */
        @media (max-width: 900px) {
            .rd-card {
                max-width: 700px;
            }

            .rd-panel,
            .rd-side {
                padding: 40px 35px;
            }
        }

        @media (max-width: 700px) {
            .rd-card {
                flex-direction: column;
                max-width: 520px;
            }

            .rd-panel,
            .rd-side {
                width: 100%;
            }

            .rd-side {
                order: -1;
                padding: 30px 25px;
            }

            .rd-side p {
                font-size: .85rem;
            }

            .rd-panel {
                padding: 35px 25px;
            }
        }

        @media (max-width: 480px) {
            .rd-card {
                border-radius: 20px;
            }

            .rd-side i.bi {
                font-size: 2.6rem;
                margin-bottom: 12px;
            }

            .rd-panel {
                padding: 30px 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {

            .rd-page *,
            .rd-page *::before,
            .rd-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="inner-page">

    <div class="rd-bubbles" aria-hidden="true">
        <div class="rd-bubble rd-bubble--1"></div>
        <div class="rd-bubble rd-bubble--2"></div>
        <div class="rd-bubble rd-bubble--3"></div>
    </div>

    @include('partials.preloader')

    <div class="rd-progress" id="rdProgress"></div>

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

    <main class="main rd-page" style="margin-top: 120px;">

        <!-- ================= ALERTAS GLOBAIS ================= -->
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10" style="max-width:900px;">
                    @if (session('erro'))
                        <div class="rd-alert" role="alert">
                            <span class="rd-alert-icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            <div class="rd-alert-body">
                                <strong>Ops, não foi dessa vez</strong>
                                {{ session('erro') }}
                            </div>
                            <button type="button" class="rd-alert-close" aria-label="Fechar">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="rd-alert" role="alert">
                            <span class="rd-alert-icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            <div class="rd-alert-body">
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

        <!-- ================= CARD REDEFINIR SENHA ================= -->
        <div class="rd-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="rd-card">

                <!-- ---------- FORMULÁRIO ---------- -->
                <div class="rd-panel">


                    <h2>Criar nova senha</h2>
                    <p class="rd-sub">Escolha uma senha forte e diferente das anteriores para proteger sua conta.</p>

                    <form method="POST" action="{{ route('senha.atualizar') }}" id="redefinirForm">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">Nova senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="senha" id="novaSenha"
                                    class="form-control rounded-0"
                                    placeholder="Crie uma senha segura" required>
                                <span class="input-group-text toggle-senha" data-target="novaSenha">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                            <div class="rd-strength">
                                <span></span><span></span><span></span><span></span>
                            </div>
                            <div class="rd-strength-label" id="strengthLabel">Mínimo de 6 caracteres</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirmar nova senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="senha_confirmation" id="confirmarSenha"
                                    class="form-control rounded-0"
                                    placeholder="Repita a nova senha" required>
                                <span class="input-group-text toggle-senha" data-target="confirmarSenha">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="rd-btn rd-btn--primary">
                            <i class="bi bi-check-circle"></i>
                            Redefinir senha
                        </button>

                    </form>

                    <a href="{{ route('login') }}" class="rd-back-link">
                        <i class="bi bi-arrow-left"></i>
                        Voltar para o login
                    </a>

                </div>

                <!-- ---------- PAINEL AZUL LATERAL ---------- -->
                <div class="rd-side">
                    <i class="bi bi-key"></i>
                    <h2>Quase lá!</h2>
                    <p>Defina uma nova senha para continuar acompanhando o atendimento do seu pet com toda segurança.</p>
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
            var bar = document.getElementById('rdProgress');
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

    <!-- Mostrar/ocultar senha + indicador de força -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Alternar visibilidade da senha
            document.querySelectorAll('.toggle-senha').forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    const targetId = toggle.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = toggle.querySelector('i');
                    if (!input) return;

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('bi-eye', 'bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('bi-eye-slash', 'bi-eye');
                    }
                });
            });

            // Indicador simples de força da senha
            const novaSenha = document.getElementById('novaSenha');
            const bars = document.querySelectorAll('.rd-strength span');
            const label = document.getElementById('strengthLabel');

            if (novaSenha) {
                novaSenha.addEventListener('input', function () {
                    const valor = novaSenha.value;
                    let score = 0;

                    if (valor.length >= 8) score++;
                    if (/[A-Z]/.test(valor)) score++;
                    if (/[0-9]/.test(valor)) score++;
                    if (/[^A-Za-z0-9]/.test(valor)) score++;

                    const cores = ['#e6ecf5', '#f87171', '#fbbf24', '#4ade80', '#175cdd'];
                    const textos = ['Mínimo de 6 caracteres', 'Fraca', 'Razoável', 'Boa', 'Forte'];

                    bars.forEach(function (bar, i) {
                        bar.style.background = i < score ? cores[score] : '#e6ecf5';
                    });

                    label.textContent = valor.length === 0
                        ? 'Mínimo de 6 caracteres'
                        : textos[score];
                });
            }

            // Validação simples de confirmação de senha antes do envio
            const form = document.getElementById('redefinirForm');
            const confirmar = document.getElementById('confirmarSenha');

            if (form) {
                form.addEventListener('submit', function (e) {
                    if (novaSenha && confirmar && novaSenha.value !== confirmar.value) {
                        e.preventDefault();
                        confirmar.classList.add('is-invalid');
                        confirmar.focus();
                    } else if (confirmar) {
                        confirmar.classList.remove('is-invalid');
                    }
                });
            }

        });
    </script>

    <!-- Fechar os alertas de erro -->
    <script>
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.rd-alert-close');
            if (!btn) return;
            var alert = btn.closest('.rd-alert');
            if (alert) alert.remove();
        });
    </script>

    @include('partials.logout-confirm')

</body>

</html>