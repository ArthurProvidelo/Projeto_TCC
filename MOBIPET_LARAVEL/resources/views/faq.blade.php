<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Perguntas Frequentes | Mobipet</title>
    <meta name="description"
        content="Tire suas dúvidas sobre cadastro, agendamento, acompanhamento em tempo real e pagamento dos serviços no Mobipet.">
    <meta name="keywords" content="faq mobipet, duvidas petshop, agendamento pet, acompanhamento pet, mobipet">

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
           PÁGINA FAQ — MOBIPET  ·  estilos isolados (prefixo fq-)
           =========================================================== */
        .fq-page {
            --fq-accent: #175cdd;
            --fq-accent-dark: #0f47b3;
            --fq-accent-soft: #eaf1fe;
            --fq-ink: #0f1b34;
            --fq-body: #4a5568;
            --fq-muted: #8794a7;
            --fq-green: #16a34a;
            --fq-line: #e6ecf5;
            --fq-bg: #f7f9ff;
            --fq-radius: 24px;
            --fq-radius-sm: 14px;
            --fq-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --fq-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--fq-body);
            background: var(--fq-bg);
            overflow-x: clip;
        }

        .fq-page h1,
        .fq-page h2,
        .fq-page h3,
        .fq-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--fq-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        .fq-page p {
            line-height: 1.78;
        }

        .fq-wrap {
            width: min(1000px, 90%);
            margin-inline: auto;
        }

        .fq-page section {
            padding: clamp(3.4rem, 8vw, 6.5rem) 0;
            position: relative;
        }

        /* ---- Barra de progresso de rolagem ---- */
        .fq-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--fq-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* ---- Rótulo de seção ---- */
        .fq-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--fq-accent);
        }

        .fq-eyebrow::before {
            content: "";
            width: 30px;
            height: 2px;
            background: currentColor;
        }

        .fq-h2 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            margin: 22px 0 0;
        }

        .fq-lead {
            font-size: clamp(1.02rem, 2vw, 1.15rem);
            color: var(--fq-body);
        }

        /* ---- Botões ---- */
        .fq-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .97rem;
            padding: 14px 26px;
            border-radius: 999px;
            border: 1.5px solid transparent;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .fq-btn--primary {
            background: var(--fq-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .fq-btn--primary:hover {
            background: var(--fq-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .fq-btn--ghost {
            background: transparent;
            color: var(--fq-ink);
            border-color: var(--fq-line);
        }

        .fq-btn--ghost:hover {
            border-color: var(--fq-accent);
            color: var(--fq-accent);
            transform: translateY(-3px);
        }

        .fq-btn--light {
            background: #fff;
            color: var(--fq-accent);
        }

        .fq-btn--light:hover {
            color: var(--fq-accent-dark);
            transform: translateY(-3px);
        }

        /* ===================== HERO ===================== */
        .fq-hero {
            text-align: center;
            padding-bottom: clamp(2.4rem, 6vw, 4rem) !important;
            background:
                radial-gradient(50% 60% at 50% 0%, var(--fq-accent-soft) 0%, transparent 68%),
                var(--fq-bg);
            overflow: hidden;
        }

        .fq-hero h1 {
            font-size: clamp(2.1rem, 5vw, 3.2rem);
            font-weight: 800;
            margin: 22px auto 18px;
            max-width: 720px;
        }

        .fq-hero h1 .fq-grad {
            background: linear-gradient(120deg, var(--fq-accent), #3b82f6 55%, #4ade80);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .fq-hero p {
            font-size: clamp(1.02rem, 2vw, 1.15rem);
            max-width: 560px;
            margin: 0 auto 32px;
        }

        /* ---- busca ---- */
        .fq-search {
            position: relative;
            max-width: 560px;
            margin: 0 auto;
        }

        .fq-search i {
            position: absolute;
            left: 22px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--fq-muted);
            font-size: 1.05rem;
        }

        .fq-search input {
            width: 100%;
            padding: 16px 22px 16px 52px;
            border-radius: 999px;
            border: 1.5px solid var(--fq-line);
            background: #fff;
            font-size: .98rem;
            color: var(--fq-ink);
            box-shadow: var(--fq-shadow-sm);
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        .fq-search input:focus {
            outline: none;
            border-color: var(--fq-accent);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--fq-accent) 16%, transparent);
        }

        .fq-search input::placeholder {
            color: var(--fq-muted);
        }

        .fq-hero-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 26px;
        }

        .fq-chip {
            font-size: .82rem;
            font-weight: 600;
            color: var(--fq-ink);
            background: #fff;
            border: 1px solid var(--fq-line);
            padding: 7px 14px;
            border-radius: 999px;
        }

        .fq-chip i {
            color: var(--fq-accent);
            margin-right: 6px;
        }

        /* ===================== FILTROS DE CATEGORIA ===================== */
        .fq-filters {
            background: #fff;
            border-top: 1px solid var(--fq-line);
            border-bottom: 1px solid var(--fq-line);
            padding: 22px 0 !important;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .fq-filters-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .fq-tab {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .88rem;
            color: var(--fq-body);
            background: var(--fq-bg);
            border: 1.5px solid var(--fq-line);
            border-radius: 999px;
            padding: 9px 18px;
            cursor: pointer;
            transition: all .22s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .fq-tab i {
            font-size: .95rem;
        }

        .fq-tab:hover {
            border-color: var(--fq-accent);
            color: var(--fq-accent);
        }

        .fq-tab.is-active {
            background: var(--fq-accent);
            border-color: var(--fq-accent);
            color: #fff;
        }

        /* ===================== LISTA DE PERGUNTAS ===================== */
        .fq-list {
            background: #fff;
        }

        .fq-list-inner {
            max-width: 820px;
            margin: 0 auto;
        }

        .fq-item {
            border: 1px solid var(--fq-line);
            border-radius: var(--fq-radius-sm);
            margin-bottom: 14px;
            overflow: hidden;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        .fq-item[open] {
            border-color: color-mix(in srgb, var(--fq-accent) 35%, transparent);
            box-shadow: var(--fq-shadow-sm);
        }

        .fq-item summary {
            list-style: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px 24px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: 1.02rem;
            color: var(--fq-ink);
        }

        .fq-item summary::-webkit-details-marker {
            display: none;
        }

        .fq-item .fq-num {
            flex: none;
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--fq-accent-soft);
            color: var(--fq-accent);
            font-size: .85rem;
            font-weight: 700;
        }

        .fq-item summary .fq-q {
            flex: 1;
        }

        .fq-item .fq-cat-badge {
            flex: none;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: var(--fq-accent);
            background: var(--fq-accent-soft);
            padding: 4px 10px;
            border-radius: 999px;
            display: none;
        }

        @media (min-width: 576px) {
            .fq-item .fq-cat-badge {
                display: inline-block;
            }
        }

        .fq-item summary .fq-toggle {
            flex: none;
            color: var(--fq-accent);
            transition: transform .3s ease;
        }

        .fq-item[open] summary .fq-toggle {
            transform: rotate(45deg);
        }

        .fq-item .fq-content {
            padding: 0 24px 22px 76px;
            margin: 0;
            color: var(--fq-body);
        }

        .fq-empty {
            display: none;
            text-align: center;
            padding: 50px 20px;
            color: var(--fq-muted);
        }

        .fq-empty i {
            font-size: 2rem;
            color: var(--fq-line);
            display: block;
            margin-bottom: 14px;
        }

        .fq-empty.is-visible {
            display: block;
        }

        /* ===================== CTA ===================== */
        .fq-cta {
            background: var(--fq-bg);
        }

        .fq-cta-card {
            border-radius: clamp(24px, 4vw, 42px);
            padding: clamp(2.6rem, 7vw, 4.5rem) clamp(1.5rem, 5vw, 4rem);
            text-align: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--fq-accent), var(--fq-accent-dark));
        }

        .fq-cta-card h2 {
            color: #fff;
            font-size: clamp(1.6rem, 4vw, 2.3rem);
            margin-bottom: 14px;
        }

        .fq-cta-card p {
            color: rgba(255, 255, 255, .85);
            font-size: 1.05rem;
            max-width: 520px;
            margin: 0 auto 30px;
        }

        .fq-cta-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            justify-content: center;
        }

        /* ===================== RESPONSIVO ===================== */
        @media (max-width: 575px) {
            .fq-item summary {
                padding: 18px;
                gap: 12px;
            }

            .fq-item .fq-content {
                padding: 0 18px 20px 62px;
            }

            .fq-filters {
                position: static;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {

            .fq-page *,
            .fq-page *::before,
            .fq-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="faq-page">

    @include('partials.preloader')

    <div class="fq-progress" id="fqProgress"></div>

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

    <main class="main fq-page">

        <!-- ================= HERO ================= -->
        <section class="fq-hero">
            <div class="fq-wrap">
                <h1 data-aos="fade-up">
                    Perguntas frequentes sobre o <span class="fq-grad">Mobipet</span>
                </h1>
                <p data-aos="fade-up" data-aos-delay="80">
                    Tire suas dúvidas sobre cadastro, agendamento, acompanhamento em tempo real
                    e pagamento. Se não encontrar o que procura, é só chamar a gente.
                </p>

                <div class="fq-search" data-aos="fade-up" data-aos-delay="140">
                    <i class="bi bi-search"></i>
                    <input type="text" id="fqSearchInput" placeholder="Busque por uma palavra-chave, ex: agendamento">
                </div>

                <div class="fq-hero-chips" data-aos="fade-up" data-aos-delay="180">
                    <span class="fq-chip"><i class="bi bi-question-circle"></i> 12 perguntas</span>
                    <span class="fq-chip"><i class="bi bi-grid"></i> 4 categorias</span>
                    <span class="fq-chip"><i class="bi bi-whatsapp"></i> Suporte pelo WhatsApp</span>
                </div>
            </div>
        </section>

        <!-- ================= FILTROS ================= -->
        <section class="fq-filters">
            <div class="fq-wrap">
                <div class="fq-filters-row" id="fqFilters">
                    <button type="button" class="fq-tab is-active" data-cat="todas">
                        <i class="bi bi-collection"></i> Todas
                    </button>
                    <button type="button" class="fq-tab" data-cat="conta">
                        <i class="bi bi-person-circle"></i> Conta e cadastro
                    </button>
                    <button type="button" class="fq-tab" data-cat="agendamento">
                        <i class="bi bi-calendar-check"></i> Agendamento
                    </button>
                    <button type="button" class="fq-tab" data-cat="acompanhamento">
                        <i class="bi bi-broadcast"></i> Acompanhamento
                    </button>
                    <button type="button" class="fq-tab" data-cat="servicos">
                        <i class="bi bi-droplet-half"></i> Serviços e pagamento
                    </button>
                </div>
            </div>
        </section>

        <!-- ================= LISTA DE PERGUNTAS ================= -->
        <section class="fq-list">
            <div class="fq-wrap">
                <div class="fq-list-inner" id="fqList">

                    <details class="fq-item" data-cat="conta" open>
                        <summary>
                            <span class="fq-num">01</span>
                            <span class="fq-q">Preciso criar uma conta para usar o Mobipet?</span>
                            <span class="fq-cat-badge">Conta</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Sim. Com a conta, o Mobipet vincula o agendamento ao seu pet, guarda o
                            histórico dos serviços e envia as notificações de acompanhamento para você.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="conta">
                        <summary>
                            <span class="fq-num">02</span>
                            <span class="fq-q">Como cadastro o meu pet na plataforma?</span>
                            <span class="fq-cat-badge">Conta</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Depois de criar sua conta, acesse "Cadastrar Pet" no menu e informe os
                            dados do seu bichinho. É possível cadastrar mais de um pet na mesma conta.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="conta">
                        <summary>
                            <span class="fq-num">03</span>
                            <span class="fq-q">Esqueci minha senha, como faço para recuperar?</span>
                            <span class="fq-cat-badge">Conta</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Na tela de login, use a opção "Esqueci minha senha" e confirme o e-mail
                            e o CPF cadastrados para criar uma nova senha.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="agendamento">
                        <summary>
                            <span class="fq-num">04</span>
                            <span class="fq-q">Como faço para agendar um serviço?</span>
                            <span class="fq-cat-badge">Agendamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Acesse "Agendamento" no menu, escolha o serviço, o profissional, a data
                            e o horário disponível. A confirmação aparece na hora, sem precisar ligar.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="agendamento">
                        <summary>
                            <span class="fq-num">05</span>
                            <span class="fq-q">Posso agendar mais de um serviço para o mesmo pet?</span>
                            <span class="fq-cat-badge">Agendamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Pode. Banho, tosa, hidratação e os demais serviços podem ser combinados
                            no mesmo agendamento e aparecem juntos na linha do tempo do atendimento.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="agendamento">
                        <summary>
                            <span class="fq-num">06</span>
                            <span class="fq-q">Como remarco ou cancelo um agendamento?</span>
                            <span class="fq-cat-badge">Agendamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            É só acessar a área de agendamento pela sua conta e escolher um novo
                            horário disponível ou cancelar o horário já marcado.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="acompanhamento">
                        <summary>
                            <span class="fq-num">07</span>
                            <span class="fq-q">Como funciona o acompanhamento em tempo real?</span>
                            <span class="fq-cat-badge">Acompanhamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            A cada etapa concluída, a equipe do petshop atualiza o atendimento no
                            sistema. Essa mudança aparece na hora para você, junto com uma
                            notificação automática.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="acompanhamento">
                        <summary>
                            <span class="fq-num">08</span>
                            <span class="fq-q">Vou ser avisado quando o meu pet estiver pronto?</span>
                            <span class="fq-cat-badge">Acompanhamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Sim, você recebe uma notificação assim que o atendimento é concluído e
                            o pet está pronto para retirada.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="acompanhamento">
                        <summary>
                            <span class="fq-num">09</span>
                            <span class="fq-q">Consigo ver o histórico de atendimentos do meu pet?</span>
                            <span class="fq-cat-badge">Acompanhamento</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Sim, todo o histórico de serviços realizados fica salvo na sua conta e
                            disponível para consulta a qualquer momento.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="servicos">
                        <summary>
                            <span class="fq-num">10</span>
                            <span class="fq-q">Quais serviços estão disponíveis pelo Mobipet?</span>
                            <span class="fq-cat-badge">Serviços</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Banho, tosa, hidratação, escovação e secagem, corte de unhas e limpeza
                            de ouvidos, entre outros cuidados oferecidos pelos petshops parceiros.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="servicos">
                        <summary>
                            <span class="fq-num">11</span>
                            <span class="fq-q">Como funciona o pagamento dos serviços?</span>
                            <span class="fq-cat-badge">Serviços</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            O pagamento é feito diretamente no petshop, no momento do atendimento.
                            O Mobipet cuida do agendamento e do acompanhamento de cada etapa.
                        </p>
                    </details>

                    <details class="fq-item" data-cat="servicos">
                        <summary>
                            <span class="fq-num">12</span>
                            <span class="fq-q">Meu petshop pode se cadastrar na plataforma?</span>
                            <span class="fq-cat-badge">Serviços</span>
                            <i class="bi bi-plus-lg fq-toggle"></i>
                        </summary>
                        <p class="fq-content">
                            Pode sim! Fale com a nossa equipe pelo WhatsApp para saber como o seu
                            petshop pode passar a usar o Mobipet.
                        </p>
                    </details>

                    <div class="fq-empty" id="fqEmpty">
                        <i class="bi bi-search"></i>
                        Nenhuma pergunta encontrada para essa busca.
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= CTA ================= -->
        <section class="fq-cta">
            <div class="fq-wrap">
                <div class="fq-cta-card" data-aos="zoom-in">
                    <h2>Ainda com dúvidas?</h2>
                    <p>Fale com a nossa equipe pelo WhatsApp ou agende agora mesmo o próximo cuidado do seu pet.</p>
                    <div class="fq-cta-actions">
                        <a href="https://wa.me/5519989432384" class="fq-btn fq-btn--light" target="_blank" rel="noopener">
                            <i class="bi bi-whatsapp"></i> Falar no WhatsApp
                        </a>
                        <a href="{{ route('agendamento') }}" class="fq-btn fq-btn--ghost"
                            style="color:#fff;border-color:rgba(255,255,255,.4);">
                            Agendar um serviço <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('partials.footer')

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
            var bar = document.getElementById('fqProgress');
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

    <!-- Busca e filtro de categorias do FAQ -->
    <script>
        (function () {
            var searchInput = document.getElementById('fqSearchInput');
            var filterButtons = document.querySelectorAll('#fqFilters .fq-tab');
            var items = document.querySelectorAll('#fqList .fq-item');
            var empty = document.getElementById('fqEmpty');
            var activeCat = 'todas';

            function normalize(text) {
                return text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
            }

            function applyFilters() {
                var term = normalize(searchInput ? searchInput.value.trim() : '');
                var visibleCount = 0;

                items.forEach(function (item) {
                    var matchesCat = activeCat === 'todas' || item.dataset.cat === activeCat;
                    var text = normalize(item.textContent);
                    var matchesTerm = term === '' || text.indexOf(term) !== -1;
                    var isVisible = matchesCat && matchesTerm;

                    item.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });

                if (empty) {
                    empty.classList.toggle('is-visible', visibleCount === 0);
                }
            }

            filterButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    filterButtons.forEach(function (b) { b.classList.remove('is-active'); });
                    btn.classList.add('is-active');
                    activeCat = btn.dataset.cat;
                    applyFilters();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', applyFilters);
            }
        })();
    </script>

    @include('partials.logout-confirm')

</body>

</html>
