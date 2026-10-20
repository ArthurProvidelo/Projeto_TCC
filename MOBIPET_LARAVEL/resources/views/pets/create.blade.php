<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastrar Pet | Mobipet</title>
    <meta name="description" content="Cadastre um novo pet na sua conta Mobipet e acompanhe cada atendimento dele pela plataforma.">
    <meta name="keywords" content="cadastrar pet mobipet, novo pet, cadastro de animal">

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

    <!-- Main CSS Files -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        /* ===========================================================
           CADASTRAR PET — MOBIPET  ·  isolado (prefixo pt-)
           mesmo sistema tipográfico/visual de pets/index e pets/edit.
           Front-end reconfigurado: layout em duas colunas com prévia
           ao vivo do cadastro + barra de ações fixa no celular.
           =========================================================== */
        .pt-page {
            --pt-accent: #175cdd;
            --pt-accent-dark: #0f47b3;
            --pt-accent-soft: #eaf1fe;
            --pt-ink: #0f1b34;
            --pt-body: #4a5568;
            --pt-muted: #8794a7;
            --pt-line: #e6ecf5;
            --pt-bg: #f7f9ff;
            --pt-radius: 26px;
            --pt-radius-sm: 14px;
            --pt-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --pt-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--pt-body);
        }

        .pt-page h1,
        .pt-page h2,
        .pt-page h3,
        .pt-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--pt-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        /* Barra de progresso de rolagem (padrão do site) */
        .pt-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--pt-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* Rótulo de seção */
        .pt-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--pt-accent);
            margin-bottom: 14px;
        }

        .pt-eyebrow::before {
            content: "";
            width: 26px;
            height: 2px;
            background: currentColor;
        }

        .pt-eyebrow .pt-idx {
            color: var(--pt-muted);
        }

        /* =========================================================
           FUNDO / HERO
           ========================================================= */
        .pt-hero {
            padding: 160px 0 100px;
            background:
                radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
                radial-gradient(circle at bottom left, #dcfce7 0%, transparent 30%),
                var(--pt-bg);
            min-height: 100vh;
        }

        .pt-wrap {
            width: min(1080px, 92%);
            margin-inline: auto;
        }

        .pt-hero-head {
            text-align: center;
            max-width: 640px;
            margin: 0 auto 44px;
        }

        .pt-h1 {
            font-size: clamp(2rem, 4.4vw, 2.9rem);
            font-weight: 800;
            margin: 0 0 14px;
        }

        .pt-lead {
            font-size: 1.02rem;
            color: var(--pt-muted);
            line-height: 1.65;
            margin: 0;
        }

        /* =========================================================
           LAYOUT EM DUAS COLUNAS
           ========================================================= */
        .pt-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 28px;
            align-items: start;
        }

        /* =========================================================
           ALERTAS
           ========================================================= */
        .pt-alert {
            border-radius: var(--pt-radius-sm);
            border: none;
            padding: 16px 18px;
            font-size: .92rem;
            margin-bottom: 22px;
        }

        /* =========================================================
           CARD / FORMULÁRIO
           ========================================================= */
        .pt-card {
            background: #fff;
            border-radius: var(--pt-radius);
            box-shadow: var(--pt-shadow);
            padding: clamp(26px, 4.5vw, 48px);
        }

        .pt-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            font-size: 1.12rem;
            font-weight: 700;
            color: var(--pt-ink);
        }

        .pt-section-title:not(:first-child) {
            margin-top: 8px;
        }

        .pt-section-title i {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--pt-accent), #3b82f6);
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .pt-page label {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .72rem;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--pt-muted);
            margin-bottom: 8px;
            display: inline-block;
        }

        .pt-page .form-control,
        .pt-page .form-select {
            height: 56px;
            border-radius: 16px;
            border: 1px solid var(--pt-line);
            background-color: var(--pt-bg);
            padding: 14px 18px;
            font-size: .96rem;
            color: var(--pt-ink);
            transition: border-color .25s ease, box-shadow .25s ease, background-color .25s ease;
            box-shadow: none !important;
        }

        .pt-page .form-control:focus,
        .pt-page .form-select:focus {
            border-color: var(--pt-accent);
            background-color: #fff;
            box-shadow: 0 0 0 4px var(--pt-accent-soft) !important;
        }

        .pt-hint {
            display: block;
            margin-top: 6px;
            font-size: .78rem;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            letter-spacing: 0;
            text-transform: none;
            color: var(--pt-muted);
        }

        /* Escolha de espécie (cartões com radio escondido) */
        .pt-choice {
            position: relative;
            border: 2px solid var(--pt-line);
            background-color: var(--pt-bg);
            color: var(--pt-muted);
            cursor: pointer;
            transition: all .22s ease;
        }

        .pt-choice:hover {
            border-color: #93c5fd;
            background-color: var(--pt-accent-soft);
            color: var(--pt-accent);
            transform: translateY(-2px);
        }

        .btn-check:checked+.pt-choice {
            border-color: var(--pt-accent);
            background-color: var(--pt-accent-soft);
            color: var(--pt-accent);
            box-shadow: 0 8px 20px rgba(23, 92, 221, .18);
            transform: translateY(-2px);
        }

        .pt-choice .pt-choice-check {
            position: absolute;
            top: 10px;
            right: 12px;
            font-size: 15px;
            opacity: 0;
            transform: scale(.6);
            transition: opacity .2s ease, transform .2s ease;
        }

        .btn-check:checked+.pt-choice .pt-choice-check {
            opacity: 1;
            transform: scale(1);
        }

        /* Controle segmentado (porte) */
        .pt-segmented {
            background: var(--pt-bg);
            border: 1px solid var(--pt-line);
        }

        .pt-segment-item {
            border: none !important;
            color: var(--pt-muted);
            background: transparent;
            font-family: "Montserrat", sans-serif;
            transition: .25s;
        }

        .pt-segment-item:hover {
            color: var(--pt-ink);
        }

        .btn-check:checked+.pt-segment-item {
            background-color: #fff !important;
            color: var(--pt-accent) !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(15, 27, 52, .08) !important;
        }

        /* =========================================================
           PRÉVIA AO VIVO
           ========================================================= */
        .pt-preview {
            position: sticky;
            top: 110px;
            background: #fff;
            border-radius: var(--pt-radius);
            box-shadow: var(--pt-shadow-sm);
            overflow: hidden;
        }

        .pt-preview__top {
            padding: 30px 26px 24px;
            text-align: center;
            background:
                radial-gradient(120% 120% at 50% 0%, rgba(255, 255, 255, .18), transparent 60%),
                linear-gradient(135deg, var(--pt-accent), var(--pt-accent-dark));
            color: #fff;
        }

        .pt-preview__avatar {
            width: 84px;
            height: 84px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .28);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .pt-preview__name {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 800;
            margin: 0;
            word-break: break-word;
        }

        .pt-preview__sub {
            margin: 4px 0 0;
            font-size: .82rem;
            color: rgba(255, 255, 255, .82);
        }

        .pt-preview__body {
            padding: 20px 24px 26px;
        }

        .pt-preview__row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 11px 0;
            border-bottom: 1px solid var(--pt-line);
            font-size: .9rem;
        }

        .pt-preview__row:last-child {
            border-bottom: none;
        }

        .pt-preview__row span:first-child {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            font-size: .72rem;
            color: var(--pt-muted);
        }

        .pt-preview__row span:last-child {
            font-weight: 600;
            color: var(--pt-ink);
            text-align: right;
        }

        .pt-preview__row span.is-empty {
            color: var(--pt-muted);
            font-weight: 400;
            font-style: italic;
        }

        /* =========================================================
           BOTÕES (sistema consistente — padrão devs / rs / rd)
           ========================================================= */
        .pt-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .96rem;
            padding: 15px 28px;
            border-radius: 999px;
            border: 1.5px solid transparent;
            text-decoration: none;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .pt-btn--primary {
            background: var(--pt-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .pt-btn--primary:hover {
            background: var(--pt-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .pt-btn--ghost {
            background: transparent;
            color: var(--pt-ink);
            border-color: var(--pt-line);
        }

        .pt-btn--ghost:hover {
            border-color: var(--pt-accent);
            color: var(--pt-accent);
            transform: translateY(-3px);
        }

        .pt-actions {
            display: flex;
            flex-wrap: wrap-reverse;
            gap: 16px;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .pt-actions .pt-btn--primary {
            flex: 1 1 260px;
        }

        .pt-actions .pt-btn--ghost {
            flex: 0 0 auto;
        }

        .pt-divider {
            border: none;
            border-top: 1px solid var(--pt-line);
            margin: 36px 0 30px;
        }

        /* =========================================================
           RESPONSIVO
           ========================================================= */
        @media (max-width: 992px) {
            .pt-grid {
                grid-template-columns: 1fr;
            }

            /* No mobile a prévia aparece antes do formulário */
            .pt-grid .pt-preview {
                order: -1;
                position: static;
            }
        }

        @media (max-width: 768px) {
            .pt-hero {
                padding-top: 132px;
                padding-bottom: 120px;
            }

            .pt-card {
                border-radius: 20px;
            }

            /* Barra de ações fixa no rodapé */
            .pt-actions {
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1030;
                margin: 0;
                padding: 12px 16px calc(12px + env(safe-area-inset-bottom));
                background: rgba(255, 255, 255, .96);
                backdrop-filter: blur(8px);
                border-top: 1px solid var(--pt-line);
                box-shadow: 0 -10px 30px -18px rgba(15, 27, 52, .3);
                flex-wrap: nowrap;
            }

            .pt-actions .pt-btn {
                padding-top: 13px;
                padding-bottom: 13px;
            }

            .pt-actions .pt-btn--ghost span {
                display: none;
            }
        }

        @media (max-width: 420px) {
            .pt-preview__body {
                padding-left: 18px;
                padding-right: 18px;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {

            .pt-page *,
            .pt-page *::before,
            .pt-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="index-page">

    @include('partials.preloader')

    <div class="pt-progress" id="ptProgress"></div>

    <!-- =========================================================
    HEADER
    ========================================================= -->
    <header id="header" class="header fixed-top">

        <a href="#" id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow"
            style="width: 50px; height: 50px; position: fixed; bottom: 20px; right: 20px; z-index: 999; font-size: 24px;">
            <i class="bi bi-arrow-up-short"></i>
        </a>

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

    <!-- =========================================================
    MAIN CONTENT
    ========================================================= -->
    <main class="main pt-page">
        <section class="pt-hero">
            <div class="pt-wrap">

                <div class="pt-hero-head" data-aos="fade-up">
                    <h1 class="pt-h1">Adicionar companheiro</h1>
                    <p class="pt-lead">Preencha os campos abaixo para concluir o registro do seu pet e liberar o agendamento de atendimentos.</p>
                </div>

                @if ($errors->any())
                    <div class="pt-alert alert alert-danger shadow-sm" data-aos="fade-up">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pets.store') }}" method="POST" id="petForm" class="pt-grid" data-aos="fade-up"
                    data-aos-delay="100">

                    <!-- ---------- FORMULÁRIO ---------- -->
                    <div class="pt-card">
                        @csrf

                        <div class="pt-section-title">
                            <i class="fa-solid fa-file-signature"></i>
                            <span>Informações básicas</span>
                        </div>

                        <div class="mb-4">
                            <label for="petNome">Nome do pet</label>
                            <input type="text" name="nome" id="petNome" class="form-control"
                                placeholder="Ex: Thor, Mel, Max..." value="{{ old('nome') }}" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="d-block">Espécie</label>
                            <div class="row g-3">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="especie" id="especie_cao"
                                        value="Cão" {{ old('especie') == 'Cão' ? 'checked' : '' }} required>
                                    <label class="btn pt-choice w-100 py-3 rounded-4 d-flex flex-column align-items-center gap-2"
                                        for="especie_cao">
                                        <i class="fa-solid fa-circle-check pt-choice-check"></i>
                                        <i class="fa-solid fa-dog fa-2x"></i>
                                        <span class="fw-bold small">Cão</span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="especie" id="especie_gato"
                                        value="Gato" {{ old('especie') == 'Gato' ? 'checked' : '' }} required>
                                    <label class="btn pt-choice w-100 py-3 rounded-4 d-flex flex-column align-items-center gap-2"
                                        for="especie_gato">
                                        <i class="fa-solid fa-circle-check pt-choice-check"></i>
                                        <i class="fa-solid fa-cat fa-2x"></i>
                                        <span class="fw-bold small">Gato</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="pt-divider">

                        <div class="pt-section-title">
                            <i class="fa-solid fa-paw"></i>
                            <span>Detalhes do pet</span>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="petRaca">Raça</label>
                                <input type="text" name="raca" id="petRaca" class="form-control"
                                    placeholder="Ex: Poodle, Vira-lata, Persa..." value="{{ old('raca') }}" required>
                                <span class="pt-hint">Não sabe a raça? Escreva "SRD" (sem raça definida).</span>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="petNascimento">Data de nascimento</label>
                                <input type="date" name="data_nascimento" id="petNascimento" class="form-control"
                                    max="{{ date('Y-m-d') }}" value="{{ old('data_nascimento') }}" required>
                                <span class="pt-hint" id="petIdadeHint">Usada para calcular a idade do pet.</span>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="d-block">Porte</label>
                            <div class="pt-segmented p-1 rounded-4 d-flex" role="group">
                                <input type="radio" class="btn-check" name="porte" id="porte_p" value="Pequeno"
                                    {{ old('porte') == 'Pequeno' ? 'checked' : '' }} required>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_p">Pequeno</label>

                                <input type="radio" class="btn-check" name="porte" id="porte_m" value="Médio"
                                    {{ old('porte') == 'Médio' ? 'checked' : '' }}>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_m">Médio</label>

                                <input type="radio" class="btn-check" name="porte" id="porte_g" value="Grande"
                                    {{ old('porte') == 'Grande' ? 'checked' : '' }}>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_g">Grande</label>
                            </div>
                        </div>

                        <hr class="pt-divider">

                        <div class="pt-actions">
                            <a href="{{ route('pets.index') }}" class="pt-btn pt-btn--ghost">
                                <i class="bi bi-arrow-left"></i> <span>Voltar</span>
                            </a>
                            <button type="submit" class="pt-btn pt-btn--primary">
                                <i class="fa-solid fa-circle-check"></i> Concluir cadastro
                            </button>
                        </div>

                    </div>

                    <!-- ---------- PRÉVIA AO VIVO ---------- -->
                    <aside class="pt-preview" aria-label="Prévia do cadastro">
                        <div class="pt-preview__top">
                            <div class="pt-preview__avatar">
                                <i class="fa-solid fa-paw" id="pvAvatarIcon"></i>
                            </div>
                            <p class="pt-preview__name" id="pvNome">Seu novo pet</p>
                            <p class="pt-preview__sub">Prévia do cadastro</p>
                        </div>
                        <div class="pt-preview__body">
                            <div class="pt-preview__row">
                                <span>Espécie</span>
                                <span class="is-empty" id="pvEspecie">A definir</span>
                            </div>
                            <div class="pt-preview__row">
                                <span>Raça</span>
                                <span class="is-empty" id="pvRaca">A definir</span>
                            </div>
                            <div class="pt-preview__row">
                                <span>Porte</span>
                                <span class="is-empty" id="pvPorte">A definir</span>
                            </div>
                            <div class="pt-preview__row">
                                <span>Idade</span>
                                <span class="is-empty" id="pvIdade">A definir</span>
                            </div>
                        </div>
                    </aside>

                </form>

            </div>
        </section>
    </main>

    @include('partials.footer')

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Barra de progresso de rolagem -->
    <script>
        (function () {
            var bar = document.getElementById('ptProgress');
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

    <!-- Prévia ao vivo do cadastro -->
    <script>
        (function () {
            var form = document.getElementById('petForm');
            if (!form) return;

            var nome = document.getElementById('petNome');
            var raca = document.getElementById('petRaca');
            var nascimento = document.getElementById('petNascimento');

            var pvNome = document.getElementById('pvNome');
            var pvEspecie = document.getElementById('pvEspecie');
            var pvRaca = document.getElementById('pvRaca');
            var pvPorte = document.getElementById('pvPorte');
            var pvIdade = document.getElementById('pvIdade');
            var pvAvatarIcon = document.getElementById('pvAvatarIcon');
            var idadeHint = document.getElementById('petIdadeHint');

            function set(el, valor) {
                if (!el) return;
                if (valor) {
                    el.textContent = valor;
                    el.classList.remove('is-empty');
                } else {
                    el.textContent = 'A definir';
                    el.classList.add('is-empty');
                }
            }

            function calcularIdade(iso) {
                if (!iso) return '';
                var nasc = new Date(iso + 'T00:00:00');
                if (isNaN(nasc)) return '';
                var hoje = new Date();
                if (nasc > hoje) return '';

                var meses = (hoje.getFullYear() - nasc.getFullYear()) * 12 + (hoje.getMonth() - nasc.getMonth());
                if (hoje.getDate() < nasc.getDate()) meses--;
                if (meses < 0) meses = 0;

                var anos = Math.floor(meses / 12);
                var rest = meses % 12;

                if (anos === 0) return rest <= 1 ? (rest + ' mês').replace('0 mês', 'Recém-nascido') : rest + ' meses';
                var txt = anos + (anos === 1 ? ' ano' : ' anos');
                if (rest > 0) txt += ' e ' + rest + (rest === 1 ? ' mês' : ' meses');
                return txt;
            }

            function sync() {
                set(pvNome, nome.value.trim() || null);
                if (!nome.value.trim()) pvNome.textContent = 'Seu novo pet';

                var especie = form.querySelector('input[name="especie"]:checked');
                set(pvEspecie, especie ? especie.value : null);
                if (pvAvatarIcon) {
                    pvAvatarIcon.className = 'fa-solid ' +
                        (!especie ? 'fa-paw' : especie.value === 'Gato' ? 'fa-cat' : 'fa-dog');
                }

                set(pvRaca, raca.value.trim() || null);

                var porte = form.querySelector('input[name="porte"]:checked');
                set(pvPorte, porte ? porte.value : null);

                var idade = calcularIdade(nascimento.value);
                set(pvIdade, idade || null);
                if (idadeHint) {
                    idadeHint.textContent = idade
                        ? 'Idade estimada: ' + idade + '.'
                        : 'Usada para calcular a idade do pet.';
                }
            }

            form.addEventListener('input', sync);
            form.addEventListener('change', sync);
            sync();
        })();
    </script>

    @include('partials.logout-confirm')

</body>

</html>
