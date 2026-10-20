<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastrar Serviço | Mobipet</title>
    <meta name="description"
        content="Adicione novos serviços, preços e durações oferecidas pelo seu petshop na plataforma Mobipet.">
    <meta name="keywords" content="petshop, monitoramento pet, banho e tosa, laravel, mobipet, cadastrar servico">

    <!-- Favicons -->
    @include('partials.favicon')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@400;500;600;700;800&family=Lato:wght@400;700&display=swap"
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
           CADASTRAR SERVIÇO — MOBIPET  ·  isolado (prefixo pt-)
           Mesmo sistema visual de "Meus Pets" e do agendamento:
           título centralizado, botões abaixo e card com faixa azul.
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

        /* =========================================================
           FUNDO / HERO
           ========================================================= */
        .pt-hero {
            padding: 170px 0 100px;
            background:
                radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
                radial-gradient(circle at bottom left, #e0f2fe 0%, transparent 30%),
                var(--pt-bg);
            min-height: 100vh;
        }

        .pt-wrap {
            width: min(960px, 92%);
            margin-inline: auto;
        }

        .pt-hero-head {
            text-align: center;
            max-width: 660px;
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
            margin: 0 0 26px;
        }

        .pt-hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }

        /* =========================================================
           BOTÕES (padrão devs / rs / rd / pets)
           ========================================================= */
        .pt-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .96rem;
            padding: 14px 26px;
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

        .pt-btn--outline {
            background: #fff;
            color: var(--pt-accent);
            border-color: rgba(23, 92, 221, .25);
        }

        .pt-btn--outline:hover {
            background: var(--pt-accent-soft);
            color: var(--pt-accent);
            transform: translateY(-3px);
        }

        /* =========================================================
           ALERTA DE ERRO
           ========================================================= */
        .pt-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            border-radius: var(--pt-radius-sm);
            background: #fff5f5;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 15px 18px;
            font-size: .92rem;
            margin-bottom: 24px;
        }

        .pt-alert i {
            font-size: 1.15rem;
            margin-top: 1px;
        }

        /* =========================================================
           CARD COM FAIXA AZUL
           ========================================================= */
        .pt-card {
            background: #fff;
            border-radius: var(--pt-radius);
            box-shadow: var(--pt-shadow);
            overflow: hidden;
        }

        .pt-card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            padding: 28px clamp(20px, 4vw, 38px);
            background: linear-gradient(135deg, var(--pt-accent), var(--pt-accent-dark));
            color: #fff;
        }

        .pt-card-head h3 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0 0 3px;
        }

        .pt-card-head p {
            margin: 0;
            font-size: .86rem;
            color: rgba(255, 255, 255, .82);
        }

        .pt-head-icon {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            border-radius: 16px;
            background: rgba(255, 255, 255, .16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .pt-head-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            color: var(--pt-accent);
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: .85rem;
            padding: 8px 16px;
            border-radius: 999px;
        }

        .pt-card-body {
            padding: clamp(28px, 5vw, 54px);
        }

        .pt-required-mark {
            color: #dc2626;
            font-weight: 700;
        }

        /* Títulos de seção do formulário */
        .pt-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            font-family: "Montserrat", sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--pt-ink);
        }

        .pt-section-title:not(:first-of-type) {
            margin-top: 38px;
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

        /* =========================================================
           CAMPOS
           ========================================================= */
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
            min-height: 56px;
            border-radius: 16px;
            border: 1px solid var(--pt-line);
            background-color: var(--pt-bg);
            padding: 14px 18px;
            font-size: .96rem;
            color: var(--pt-ink);
            transition: border-color .25s ease, box-shadow .25s ease, background-color .25s ease;
            box-shadow: none !important;
        }

        .pt-page textarea.form-control {
            min-height: auto;
            resize: vertical;
        }

        .pt-page .form-control:focus,
        .pt-page .form-select:focus {
            border-color: var(--pt-accent);
            background-color: #fff;
            box-shadow: 0 0 0 4px var(--pt-accent-soft) !important;
        }

        .pt-page .form-control::placeholder {
            color: #a3aec0;
        }

        .pt-page .form-control.is-invalid,
        .pt-page .form-select.is-invalid {
            border-color: #dc2626;
        }

        .pt-page .invalid-feedback {
            font-family: "Lato", sans-serif;
            font-weight: 600;
            font-size: .82rem;
        }

        .pt-hint {
            display: block;
            margin-top: 6px;
            font-size: .8rem;
            color: var(--pt-muted);
        }

        /* Preço com prefixo "R$" dentro do campo */
        .pt-prefixo {
            position: relative;
        }

        .pt-prefixo span {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: var(--pt-muted);
            pointer-events: none;
        }

        .pt-prefixo .form-control {
            padding-left: 50px;
        }

        /* =========================================================
           ETAPAS DA ESTEIRA (chips selecionáveis)
           ========================================================= */
        .pt-etapas {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pt-etapa {
            position: relative;
            margin: 0;
        }

        .pt-etapa input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .pt-page .pt-etapa span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 999px;
            border: 1.5px solid var(--pt-line);
            background: #fff;
            color: var(--pt-body);
            font-family: "Montserrat", sans-serif;
            font-size: .88rem;
            font-weight: 600;
            text-transform: none;
            letter-spacing: 0;
            cursor: pointer;
            user-select: none;
            transition: background-color .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
        }

        .pt-etapa span:hover {
            border-color: rgba(23, 92, 221, .35);
            color: var(--pt-accent);
        }

        .pt-etapa span .pt-check {
            display: none;
        }

        .pt-etapa input:checked+span {
            background: var(--pt-accent);
            border-color: var(--pt-accent);
            color: #fff;
            box-shadow: 0 10px 22px -12px rgba(23, 92, 221, .8);
        }

        .pt-etapa input:checked+span .pt-check {
            display: inline;
        }

        .pt-etapa input:checked+span .pt-icone {
            display: none;
        }

        .pt-etapa input:focus-visible+span {
            outline: 3px solid #bfdbfe;
            outline-offset: 2px;
        }

        .pt-etapas-nota {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 16px;
            padding: 12px 16px;
            border-radius: var(--pt-radius-sm);
            background: var(--pt-accent-soft);
            color: #1e3a8a;
            font-size: .84rem;
            line-height: 1.55;
        }

        .pt-etapas-nota i {
            color: var(--pt-accent);
            margin-top: 3px;
        }

        /* Separador pontilhado + ações */
        .pt-dots {
            height: 16px;
            margin: 38px 0 28px;
            color: #b8c4d6;
            background-image: radial-gradient(circle, currentColor .9px, transparent .9px);
            background-size: 7px 100%;
            background-repeat: repeat-x;
            background-position: center;
            -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
            mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
        }

        .pt-acoes {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (max-width: 768px) {
            .pt-hero {
                padding-top: 140px;
            }

            .pt-card {
                border-radius: 20px;
            }

            .pt-acoes .pt-btn {
                flex: 1 1 100%;
            }

            /* No celular o botão de salvar vem primeiro */
            .pt-acoes .pt-btn--primary {
                order: -1;
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

        <!-- Scroll Top Button -->
        <a href="#" id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow"
            style="width: 50px; height: 50px; position: fixed; bottom: 20px; right: 20px; z-index: 999; font-size: 24px;">
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

    <!-- =========================================================
    CONTEÚDO PRINCIPAL
    ========================================================= -->
    <main class="main pt-page">
        <section class="pt-hero">
            <div class="pt-wrap">

                <div class="pt-hero-head" data-aos="fade-up">
                    <h1 class="pt-h1">Cadastrar serviço</h1>
                    <p class="pt-lead">
                        Adicione novos procedimentos ao catálogo, defina preço, duração e as etapas que o pet
                        percorre durante o atendimento.
                    </p>
                    <div class="pt-hero-actions">
                        <a href="{{ route('services') }}" class="pt-btn pt-btn--primary">
                            <i class="fa-solid fa-list-ul"></i> Ver serviços
                        </a>
                        <a href="{{ route('painel-controle') }}" class="pt-btn pt-btn--outline">
                            <i class="fa-solid fa-gauge-high"></i> Painel de controle
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="pt-alert" role="alert" data-aos="fade-up">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="pt-card" data-aos="zoom-in" data-aos-delay="100">

                    <div class="pt-card-head">
                        <div class="d-flex align-items-center gap-3">
                            <div class="pt-head-icon">
                                <i class="fa-solid fa-scissors"></i>
                            </div>
                            <div>
                                <h3>Novo serviço</h3>
                                <p>Preencha os dados abaixo para incluir o serviço no catálogo.</p>
                            </div>
                        </div>
                        <span class="pt-head-chip">
                            <span class="pt-required-mark">*</span> Campos obrigatórios
                        </span>
                    </div>

                    <div class="pt-card-body">

                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf

                            <!-- ---------- DADOS DO SERVIÇO ---------- -->
                            <div class="pt-section-title">
                                <i class="fa-solid fa-tag"></i>
                                <span>Dados do serviço</span>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="nome">Nome do serviço <span class="pt-required-mark">*</span></label>
                                    <input type="text" id="nome" name="nome"
                                        class="form-control @error('nome') is-invalid @enderror"
                                        placeholder="Ex: Banho Premium, Tosa Higiênica..." required
                                        value="{{ old('nome') }}">
                                    @error('nome')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="categoria">Categoria <span class="pt-required-mark">*</span></label>
                                    <select id="categoria" name="categoria"
                                        class="form-select @error('categoria') is-invalid @enderror" required>
                                        <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>
                                            Selecione uma opção...</option>
                                        <option value="banho" @selected(old('categoria') == 'banho')>Banho</option>
                                        <option value="tosa" @selected(old('categoria') == 'tosa')>Tosa</option>
                                        <option value="consulta" @selected(old('categoria') == 'consulta')>Consulta
                                            Veterinária</option>
                                        <option value="outros" @selected(old('categoria') == 'outros')>Outros Serviços
                                        </option>
                                    </select>
                                    @error('categoria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ---------- PREÇO E DURAÇÃO ---------- -->
                            <div class="pt-section-title">
                                <i class="fa-solid fa-coins"></i>
                                <span>Preço e duração</span>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="preco">Preço cobrado <span class="pt-required-mark">*</span></label>
                                    <div class="pt-prefixo">
                                        <span>R$</span>
                                        <input type="number" step="0.01" min="0" id="preco" name="preco"
                                            inputmode="decimal"
                                            class="form-control @error('preco') is-invalid @enderror"
                                            placeholder="0,00" required value="{{ old('preco') }}">
                                    </div>
                                    @error('preco')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="tempoEstimado">Tempo estimado <span
                                            class="pt-required-mark">*</span></label>
                                    <input type="text" id="tempoEstimado" name="tempoEstimado"
                                        class="form-control @error('tempoEstimado') is-invalid @enderror"
                                        placeholder="Ex: 45 min, 1h 30min" required
                                        value="{{ old('tempoEstimado') }}">
                                    <small class="pt-hint">Aceita "45 min", "1h 30min" ou "01:30".</small>
                                    @error('tempoEstimado')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ---------- ETAPAS DA ESTEIRA ---------- -->
                            <div class="pt-section-title">
                                <i class="fa-solid fa-shoe-prints"></i>
                                <span>Etapas do atendimento</span>
                            </div>

                            <div class="pt-etapas" role="group" aria-label="Etapas da esteira de atendimento">
                                @foreach (\App\Models\ServicoEtapa::CONFIGURAVEIS as $etapa)
                                    <label class="pt-etapa" for="etapa-{{ $etapa }}">
                                        <input type="checkbox" name="etapas[]" id="etapa-{{ $etapa }}"
                                            value="{{ $etapa }}"
                                            {{ collect(old('etapas', []))->contains($etapa) ? 'checked' : '' }}>
                                        <span>
                                            <i class="pt-icone {{ \App\Models\ServicoEtapa::ICONS[$etapa] }}"></i>
                                            <i class="pt-check fa-solid fa-check"></i>
                                            {{ \App\Models\ServicoEtapa::LABELS[$etapa] }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            <p class="pt-etapas-nota">
                                <i class="fa-solid fa-circle-info"></i>
                                <span>
                                    Marque as etapas que este serviço percorre, na ordem da esteira. Check-in e
                                    Finalizado entram automaticamente. Sem nenhuma etapa marcada, o atendimento vai do
                                    check-in direto para finalizado.
                                </span>
                            </p>

                            <!-- ---------- DESCRIÇÃO ---------- -->
                            <div class="pt-section-title">
                                <i class="fa-solid fa-align-left"></i>
                                <span>Descrição</span>
                            </div>

                            <label for="descricao">Descrição detalhada do serviço</label>
                            <textarea id="descricao" name="descricao" rows="4"
                                class="form-control @error('descricao') is-invalid @enderror"
                                placeholder="Descreva os procedimentos inclusos, produtos utilizados ou restrições especiais deste serviço...">{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="pt-dots" role="separator" aria-hidden="true"></div>

                            <div class="pt-acoes">
                                <a href="{{ route('services') }}" class="pt-btn pt-btn--outline">
                                    Cancelar
                                </a>
                                <button type="submit" class="pt-btn pt-btn--primary">
                                    <i class="fa-solid fa-cloud-arrow-up"></i> Salvar serviço
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </section>
    </main>

    <!-- =========================================================
    FOOTER
    ========================================================= -->
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

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Barra de progresso de rolagem -->
    <script>
        (function() {
            const barra = document.getElementById('ptProgress');
            if (!barra) return;

            const atualizar = () => {
                const total = document.documentElement.scrollHeight - window.innerHeight;
                barra.style.width = total > 0 ? `${(window.scrollY / total) * 100}%` : '0';
            };

            window.addEventListener('scroll', atualizar, {
                passive: true
            });
            atualizar();
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Confirmação de cadastro (mesmo padrão de "Meus Pets") --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Serviço cadastrado!',
                text: @json(session('success')),
                timer: 3000,
                timerProgressBar: true,
                confirmButtonColor: '#175cdd'
            });
        </script>
    @endif

    @include('partials.logout-confirm')

</body>

</html>
