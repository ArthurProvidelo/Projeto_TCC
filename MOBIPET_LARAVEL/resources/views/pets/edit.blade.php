<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Editar Pet | Mobipet</title>
    <meta name="description" content="Atualize os dados do seu pet cadastrado na Mobipet.">
    <meta name="keywords" content="editar pet mobipet, atualizar pet, dados do animal">

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
           EDITAR PET — MOBIPET  ·  isolado (prefixo pt-)
           mesmo sistema tipográfico/visual de devs.blade.php e das
           telas de recuperação de senha (rs-/rd-) — igual ao cadastro
           de pet, para manter as duas telas padronizadas entre si.
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
            padding: 170px 0 100px;
            background:
                radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
                radial-gradient(circle at bottom left, #dcfce7 0%, transparent 30%),
                var(--pt-bg);
            min-height: 100vh;
        }

        .pt-wrap {
            width: min(820px, 92%);
            margin-inline: auto;
        }

        .pt-hero-head {
            text-align: center;
            max-width: 620px;
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
            padding: clamp(28px, 5vw, 54px);
        }

        .pt-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
            font-size: 1.15rem;
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

        .pt-page label .pt-optional {
            text-transform: none;
            letter-spacing: 0;
            font-weight: 500;
            color: var(--pt-muted);
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

        /* Escolha de espécie (cartões com radio escondido) */
        .pt-choice {
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
            margin: 40px 0 34px;
        }

        /* =========================================================
           RESPONSIVO
           ========================================================= */
        @media (max-width: 768px) {
            .pt-hero {
                padding-top: 140px;
            }

            .pt-card {
                border-radius: 20px;
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
                    <h1 class="pt-h1">Editar dados de {{ $pet->nome }}</h1>
                    <p class="pt-lead">Altere os campos necessários abaixo e salve para manter o cadastro do seu pet em dia.</p>
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

                <div class="pt-card" data-aos="zoom-in" data-aos-delay="100">
                    <form action="{{ route('pets.update', $pet->id_pet) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="pt-section-title">
                            <i class="fa-solid fa-signature"></i>
                            <span>Identificação do pet</span>
                        </div>

                        <div class="mb-4">
                            <label>Qual é o nome dele(a)?</label>
                            <input type="text" name="nome" class="form-control"
                                value="{{ old('nome', $pet->nome) }}" placeholder="Ex: Thor, Mel, Pipoca..." required>
                        </div>

                        <div class="mb-4">
                            <label class="d-block">Espécie</label>
                            <div class="row g-3">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="especie" id="especie_cao"
                                        value="Cão"
                                        {{ old('especie', $pet->especie) == 'Cão' || old('especie', $pet->especie) == 'Cachorro' ? 'checked' : '' }}
                                        required>
                                    <label class="btn pt-choice w-100 py-3 rounded-4 d-flex flex-column align-items-center gap-2"
                                        for="especie_cao">
                                        <i class="fa-solid fa-dog fa-2x"></i>
                                        <span class="fw-bold small">Cão</span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="especie" id="especie_gato"
                                        value="Gato" {{ old('especie', $pet->especie) == 'Gato' ? 'checked' : '' }}
                                        required>
                                    <label class="btn pt-choice w-100 py-3 rounded-4 d-flex flex-column align-items-center gap-2"
                                        for="especie_gato">
                                        <i class="fa-solid fa-cat fa-2x"></i>
                                        <span class="fw-bold small">Gato</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label>Qual a raça?</label>
                                <input type="text" name="raca" class="form-control"
                                    value="{{ old('raca', $pet->raca) }}" placeholder="Ex: Poodle, Vira-lata..."
                                    required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label>Data de nascimento <span class="pt-optional">(opcional)</span></label>
                                <input type="date" name="data_nascimento" class="form-control"
                                    max="{{ date('Y-m-d') }}"
                                    value="{{ old('data_nascimento', $pet->data_nascimento) }}">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="d-block">Qual o porte dele(a)?</label>
                            <div class="pt-segmented p-1 rounded-4 d-flex" role="group">
                                <input type="radio" class="btn-check" name="porte" id="porte_p" value="Pequeno"
                                    {{ old('porte', $pet->porte) == 'Pequeno' ? 'checked' : '' }} required>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_p">Pequeno</label>

                                <input type="radio" class="btn-check" name="porte" id="porte_m" value="Médio"
                                    {{ old('porte', $pet->porte) == 'Médio' ? 'checked' : '' }}>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_m">Médio</label>

                                <input type="radio" class="btn-check" name="porte" id="porte_g" value="Grande"
                                    {{ old('porte', $pet->porte) == 'Grande' ? 'checked' : '' }}>
                                <label class="btn pt-segment-item w-100 py-3 rounded-3 small" for="porte_g">Grande</label>
                            </div>
                        </div>

                        <hr class="pt-divider">

                        <div class="pt-actions">
                            <a href="{{ route('pets.index') }}" class="pt-btn pt-btn--ghost">
                                <i class="bi bi-arrow-left"></i> Cancelar e voltar
                            </a>
                            <button type="submit" class="pt-btn pt-btn--primary">
                                <i class="fa-solid fa-floppy-disk"></i> Salvar alterações
                            </button>
                        </div>

                    </form>
                </div>

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

    @include('partials.logout-confirm')

</body>

</html>
