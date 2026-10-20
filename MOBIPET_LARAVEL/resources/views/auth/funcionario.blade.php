<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastro de Funcionário | Mobipet</title>
    <meta name="description"
        content="Registre um novo colaborador da equipe Mobipet: dados pessoais, cargo, admissão e credenciais de acesso ao painel.">
    <meta name="keywords" content="cadastro funcionário mobipet, novo colaborador, equipe petshop, admissão">

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
           CADASTRO DE FUNCIONÁRIO — MOBIPET  ·  isolado (prefixo lg-)
           Mesmo sistema de design das telas de login/cadastro.
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
            --lg-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--lg-body);
        }

        .lg-page h1,
        .lg-page h2,
        .lg-page h3 {
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

        /* Fundo da página — foto + véu claro + "bolhas" azuis desfocadas
           à deriva (modo claro, o sistema é branco e azul). */
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
           BOTÕES (sistema consistente)
           ========================================================= */
        .lg-btn {
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
           CARD DIVIDIDO (marca + formulário)
           ========================================================= */
        .lg-wrapper {
            display: flex;
            justify-content: center;
            padding: 2rem 1rem 4rem;
        }

        .lg-card {
            position: relative;
            width: 100%;
            max-width: 980px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .6);
            border-radius: var(--lg-radius);
            overflow: hidden;
            box-shadow: var(--lg-shadow);
            -webkit-backdrop-filter: blur(22px) saturate(140%);
            backdrop-filter: blur(22px) saturate(140%);
            display: grid;
            grid-template-columns: .82fr 1.18fr;
        }

        /* =========================================================
           ALERTAS DE ERRO — vidro líquido em tom vermelho
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

        /* Painel de marca (lado esquerdo) */
        .lg-media {
            padding: 54px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--lg-accent), var(--lg-accent-dark));
        }

        .lg-media .lg-eyebrow {
            color: rgba(255, 255, 255, .78);
        }

        .lg-media .lg-eyebrow::before {
            background: rgba(255, 255, 255, .6);
        }

        .lg-media-icon {
            width: 60px;
            height: 60px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: rgba(255, 255, 255, .14);
            border: 1px solid rgba(255, 255, 255, .22);
            font-size: 1.55rem;
            margin-bottom: 24px;
        }

        .lg-media h2 {
            color: #fff;
            font-size: clamp(1.55rem, 3vw, 2.05rem);
            font-weight: 800;
            margin: 0 0 12px;
        }

        .lg-media > p {
            color: rgba(255, 255, 255, .85);
            font-size: .95rem;
            line-height: 1.65;
            max-width: 320px;
            margin: 0;
        }

        .lg-media ul {
            list-style: none;
            margin: 26px 0 0;
            padding: 0;
        }

        .lg-media li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
            font-size: .89rem;
            color: rgba(255, 255, 255, .9);
        }

        .lg-media li i {
            margin-top: 2px;
            color: #4ade80;
        }

        /* Painel do formulário (lado direito) */
        .lg-panel {
            padding: 50px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: transparent;
        }

        .lg-panel h2 {
            font-weight: 800;
            font-size: clamp(1.55rem, 3vw, 1.95rem);
            margin: 0 0 6px;
        }

        .lg-panel .lg-sub {
            font-size: .92rem;
            color: var(--lg-muted);
            margin-bottom: 24px;
        }

        .lg-panel .form-label {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .68rem;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--lg-muted);
            margin-bottom: 5px;
        }

        .lg-panel .input-group-text {
            background: var(--lg-bg);
            border: 1px solid var(--lg-line);
            color: var(--lg-muted);
        }

        .lg-panel .form-control {
            height: 46px;
            border: 1px solid var(--lg-line);
            box-shadow: none;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        .lg-panel .form-control:focus {
            border-color: var(--lg-accent);
            box-shadow: 0 0 0 4px var(--lg-accent-soft);
        }

        .lg-foot {
            margin-top: 20px;
            text-align: center;
            font-size: .9rem;
            color: var(--lg-muted);
        }

        .lg-foot a {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            color: var(--lg-accent);
            text-decoration: none;
        }

        .lg-foot a:hover {
            text-decoration: underline;
        }

        /* =========================================================
           RESPONSIVO
           ========================================================= */
        @media (max-width: 900px) {
            .lg-card {
                grid-template-columns: 1fr;
                max-width: 580px;
            }

            .lg-media {
                padding: 40px 36px;
            }

            .lg-media ul {
                display: none;
            }

            .lg-panel {
                padding: 40px 34px;
            }
        }

        @media (max-width: 480px) {
            .lg-card {
                border-radius: 20px;
            }

            .lg-media,
            .lg-panel {
                padding: 32px 24px;
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

    <main class="main lg-page" style="margin-top: 120px;">

        <!-- ================= ALERTAS GLOBAIS ================= -->
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10" style="max-width:980px;">
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

        <!-- ================= CARD DE CADASTRO DE FUNCIONÁRIO ================= -->
        <div class="lg-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="lg-card">

                <!-- ---------- PAINEL DE MARCA ---------- -->
                <div class="lg-media">
                    <div class="lg-media-icon"><i class="fa-solid fa-user-tie"></i></div>
                    <h2>Registre um novo colaborador</h2>
                    <p>Preencha os dados do funcionário para liberar o acesso ao painel de atendimento.</p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> Dados pessoais e de contato</li>
                        <li><i class="bi bi-check-circle-fill"></i> Cargo, salário e admissão</li>
                        <li><i class="bi bi-check-circle-fill"></i> Credenciais de acesso ao sistema</li>
                    </ul>
                </div>

                <!-- ---------- FORMULÁRIO ---------- -->
                <div class="lg-panel">

                    <h2>Cadastro de funcionário</h2>
                    <p class="lg-sub">Todos os campos são obrigatórios.</p>

                    <form method="POST" action="{{ route('funcionario.salvar') }}">
                        @csrf

                        <!-- NOME -->
                        <div class="mb-2">
                            <label class="form-label">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user small"></i></span>
                                <input type="text" name="nome" class="form-control"
                                    placeholder="Nome completo do funcionário" value="{{ old('nome') }}" required>
                            </div>
                        </div>

                        <!-- CARGO + SALÁRIO -->
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label">Cargo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-briefcase small"></i></span>
                                    <input type="text" name="cargo" class="form-control" placeholder="Ex: Tosador"
                                        value="{{ old('cargo') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Salário</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                                    <input type="text" id="salario" name="salario" class="form-control"
                                        placeholder="R$ 0,00" value="{{ old('salario') }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- CPF + TELEFONE -->
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label">CPF</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-id-card small"></i></span>
                                    <input type="text" id="cpf" name="cpf" maxlength="14" inputmode="numeric"
                                        autocomplete="off" class="form-control" placeholder="000.000.000-00"
                                        value="{{ old('cpf') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Telefone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="text" id="telefone" name="telefone" maxlength="15" inputmode="numeric"
                                        autocomplete="off" class="form-control" placeholder="(19) 99999-8888"
                                        value="{{ old('telefone') }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- DATA DE ADMISSÃO -->
                        <div class="mb-2">
                            <label class="form-label">Data de Admissão</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" name="data_admissao" class="form-control"
                                    value="{{ old('data_admissao') }}" max="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <!-- CEP + ENDEREÇO -->
                        <div class="row g-2 mb-2">
                            <div class="col-12 col-sm-5">
                                <label class="form-label">CEP</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                                    <input type="text" name="cep" id="funcCep" maxlength="9" inputmode="numeric"
                                        autocomplete="postal-code" class="form-control" placeholder="00000-000"
                                        value="{{ old('cep') }}" data-cep data-endereco-alvo="funcEndereco"
                                        data-cep-status="funcCepStatus">
                                </div>
                            </div>
                            <div class="col-12 col-sm-7">
                                <label class="form-label">Endereço</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <input type="text" name="endereco" id="funcEndereco" class="form-control"
                                        placeholder="Rua, Número, Bairro" value="{{ old('endereco') }}" required>
                                </div>
                            </div>
                            <small class="cep-status" id="funcCepStatus" aria-live="polite"></small>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-2">
                            <label class="form-label">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control"
                                    placeholder="email@mobipet.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <!-- SENHA -->
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="senha" id="funcSenha" class="form-control"
                                    placeholder="Digite uma senha" required>
                                <span class="input-group-text toggle-senha" data-target="funcSenha" role="button"
                                    tabindex="0" aria-label="Mostrar senha">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="lg-btn lg-btn--primary">
                            <i class="fa-solid fa-user-check"></i>
                            Cadastrar Funcionário
                        </button>

                    </form>

                    <div class="lg-foot">
                        Já é da equipe?
                        <a href="{{ route('login.funcionario') }}">Entrar</a>
                    </div>

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

    <!-- Máscaras de CPF, telefone e salário -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const cpf = document.getElementById('cpf');
            const telefone = document.getElementById('telefone');
            const salario = document.getElementById('salario');

            // CPF: 000.000.000-00
            if (cpf) {
                cpf.addEventListener('input', function (e) {
                    let v = e.target.value.replace(/\D/g, '');
                    v = v.replace(/^(\d{3})(\d)/, '$1.$2');
                    v = v.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
                    v = v.replace(/\.(\d{3})(\d)/, '.$1-$2');
                    e.target.value = v.substring(0, 14);
                });
            }

            // Telefone: (00) 00000-0000
            if (telefone) {
                telefone.addEventListener('input', function (e) {
                    let v = e.target.value.replace(/\D/g, '');
                    v = v.replace(/^(\d{2})(\d)/, '($1) $2');
                    v = v.replace(/(\d{5})(\d)/, '$1-$2');
                    e.target.value = v.substring(0, 15);
                });
            }

            // Salário: 1.234,56
            if (salario) {
                salario.addEventListener('input', function (e) {
                    let v = e.target.value.replace(/\D/g, '');
                    v = (Number(v) / 100).toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    e.target.value = v;
                });
            }

        });
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
