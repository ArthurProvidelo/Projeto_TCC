<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agenda | Mobipet</title>

  @include('partials.favicon')

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@400;500;600;700;800&family=Lato:wght@400;700&display=swap"
    rel="stylesheet">

  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet">

  <style>
    /* ===========================================================
       AGENDA DOS FUNCIONÁRIOS — MOBIPET  ·  isolado (prefixo pt-/ag-)
       Mesmo sistema visual de "Meus Pets", agendamento e cadastro de
       serviço: título centralizado e card com faixa azul. Dentro do
       card: calendário do mês (esquerda) + atendimentos do dia (direita).
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

      /* cores de status (mesmas do painel de controle) */
      --st-pendente: #d97706;
      --st-pendente-bg: #fff7e6;
      --st-andamento: #2563eb;
      --st-andamento-bg: #eff6ff;
      --st-concluido: #059669;
      --st-concluido-bg: #ecfdf5;
      --st-cancelado: #dc2626;
      --st-cancelado-bg: #fef2f2;

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

    /* ---------- Hero ---------- */
    .pt-hero {
      padding: 170px 0 100px;
      background:
        radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
        radial-gradient(circle at bottom left, #e0f2fe 0%, transparent 30%),
        var(--pt-bg);
      min-height: 100vh;
    }

    .pt-wrap {
      width: min(1180px, 92%);
      margin-inline: auto;
    }

    .pt-hero-head {
      text-align: center;
      max-width: 660px;
      margin: 0 auto 36px;
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

    /* ---------- Botões ---------- */
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

    /* ---------- Resumo (hoje / 7 dias / pendentes) ---------- */
    .ag-resumo {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
      margin-bottom: 28px;
    }

    .ag-resumo-item {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 18px 20px;
      border: 0;
      border-radius: 20px;
      background: #fff;
      box-shadow: var(--pt-shadow-sm);
      text-align: left;
      cursor: pointer;
      transition: transform .2s ease, box-shadow .2s ease;
    }

    .ag-resumo-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 36px -18px rgba(23, 92, 221, .45);
    }

    .ag-resumo-icone {
      width: 46px;
      height: 46px;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 14px;
      font-size: 18px;
      color: #fff;
      background: linear-gradient(135deg, var(--pt-accent), #3b82f6);
    }

    .ag-resumo-item:nth-child(2) .ag-resumo-icone {
      background: linear-gradient(135deg, #10b981, #34d399);
    }

    .ag-resumo-item:nth-child(3) .ag-resumo-icone {
      background: linear-gradient(135deg, #f59e0b, #fbbf24);
    }

    .ag-resumo-valor {
      display: block;
      font-family: "Montserrat", sans-serif;
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--pt-ink);
      line-height: 1.1;
    }

    .ag-resumo-rotulo {
      font-size: .85rem;
      color: var(--pt-muted);
      font-weight: 500;
    }

    /* ---------- Card com faixa azul ---------- */
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
      padding: 26px clamp(20px, 4vw, 38px);
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

    /* Navegação de mês na faixa azul */
    .ag-mes-nav {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .ag-mes-nav button {
      width: 42px;
      height: 42px;
      border: 0;
      border-radius: 12px;
      background: rgba(255, 255, 255, .16);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color .2s ease;
    }

    .ag-mes-nav button:hover,
    .ag-mes-nav button:focus-visible {
      background: rgba(255, 255, 255, .3);
      outline: none;
    }

    .ag-mes-nome {
      min-width: 170px;
      text-align: center;
      padding: 9px 18px;
      border-radius: 999px;
      background: #fff;
      color: var(--pt-accent);
      font-family: "Montserrat", sans-serif;
      font-weight: 700;
      font-size: .95rem;
    }

    /* ---------- Filtros ---------- */
    .ag-filtros {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 14px;
      padding: 20px clamp(20px, 4vw, 38px);
      border-bottom: 1px solid var(--pt-line);
    }

    .ag-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .ag-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;
      border-radius: 999px;
      border: 1.5px solid var(--pt-line);
      background: #fff;
      color: var(--pt-body);
      font-family: "Montserrat", sans-serif;
      font-size: .82rem;
      font-weight: 600;
      transition: background-color .2s ease, border-color .2s ease, color .2s ease;
    }

    .ag-chip:hover {
      border-color: rgba(23, 92, 221, .35);
      color: var(--pt-accent);
    }

    .ag-chip.ativo {
      background: var(--pt-accent);
      border-color: var(--pt-accent);
      color: #fff;
    }

    .ag-chip .ag-ponto {
      width: 8px;
      height: 8px;
      border-radius: 50%;
    }

    .ag-campos {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .ag-campos select,
    .ag-campos input {
      height: 44px;
      border-radius: 12px;
      border: 1.5px solid var(--pt-line);
      background-color: var(--pt-bg);
      padding: 0 14px;
      font-size: .9rem;
      color: var(--pt-ink);
      transition: border-color .2s ease, box-shadow .2s ease;
    }

    .ag-campos select:focus,
    .ag-campos input:focus {
      outline: none;
      border-color: var(--pt-accent);
      box-shadow: 0 0 0 4px var(--pt-accent-soft);
    }

    .ag-busca {
      position: relative;
    }

    .ag-busca i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--pt-muted);
      font-size: .85rem;
    }

    .ag-busca input {
      padding-left: 38px;
      width: 230px;
    }

    /* ---------- Calendário + dia ---------- */
    .ag-corpo {
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
    }

    .ag-calendario {
      padding: clamp(18px, 3vw, 30px);
      border-right: 1px solid var(--pt-line);
    }

    .ag-semana,
    .ag-grade {
      display: grid;
      grid-template-columns: repeat(7, minmax(0, 1fr));
      gap: 6px;
    }

    .ag-semana span {
      text-align: center;
      padding-bottom: 8px;
      font-family: "Lato", sans-serif;
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--pt-muted);
    }

    .ag-dia {
      position: relative;
      aspect-ratio: 1 / 1;
      min-height: 54px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      border: 1.5px solid transparent;
      border-radius: 14px;
      background: var(--pt-bg);
      color: var(--pt-ink);
      font-family: "Montserrat", sans-serif;
      transition: background-color .15s ease, border-color .15s ease, transform .15s ease;
    }

    .ag-dia:hover {
      border-color: rgba(23, 92, 221, .35);
      transform: translateY(-1px);
    }

    .ag-dia:focus-visible {
      outline: 3px solid #bfdbfe;
      outline-offset: 2px;
    }

    .ag-dia-num {
      font-size: .95rem;
      font-weight: 600;
      line-height: 1;
    }

    .ag-dia.fora {
      background: transparent;
      color: #c3ccda;
    }

    .ag-dia.passado:not(.fora) .ag-dia-num {
      color: var(--pt-muted);
    }

    .ag-dia.com-agenda .ag-dia-num {
      font-weight: 800;
    }

    .ag-dia.hoje {
      border-color: var(--pt-accent);
    }

    .ag-dia.hoje .ag-dia-num {
      color: var(--pt-accent);
    }

    .ag-dia.selecionado {
      background: var(--pt-accent);
      border-color: var(--pt-accent);
      box-shadow: 0 12px 24px -12px rgba(23, 92, 221, .9);
    }

    .ag-dia.selecionado .ag-dia-num {
      color: #fff;
    }

    /* Pontinhos por status + total do dia */
    .ag-dia-pontos {
      display: flex;
      gap: 3px;
      height: 6px;
    }

    .ag-dia-pontos i {
      width: 6px;
      height: 6px;
      border-radius: 50%;
    }

    .ag-dia-total {
      position: absolute;
      top: 5px;
      right: 6px;
      min-width: 18px;
      height: 18px;
      padding: 0 5px;
      border-radius: 999px;
      background: var(--pt-accent-soft);
      color: var(--pt-accent);
      font-size: .66rem;
      font-weight: 800;
      line-height: 18px;
      text-align: center;
    }

    .ag-dia.selecionado .ag-dia-total {
      background: rgba(255, 255, 255, .25);
      color: #fff;
    }

    .ag-dia.selecionado .ag-dia-pontos i {
      box-shadow: 0 0 0 1.5px #fff;
    }

    .ag-legenda {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-top: 18px;
      font-size: .8rem;
      color: var(--pt-muted);
    }

    .ag-legenda span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .ag-legenda i {
      width: 8px;
      height: 8px;
      border-radius: 50%;
    }

    /* cores dos pontos/legenda por status */
    .st-pendente {
      background: var(--st-pendente);
    }

    .st-andamento {
      background: var(--st-andamento);
    }

    .st-concluido {
      background: var(--st-concluido);
    }

    .st-cancelado {
      background: var(--st-cancelado);
    }

    /* ---------- Painel do dia ---------- */
    .ag-painel {
      padding: clamp(18px, 3vw, 30px);
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    .ag-painel-topo {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 18px;
    }

    .ag-painel-topo h4 {
      font-size: 1.15rem;
      font-weight: 700;
      margin: 0 0 4px;
    }

    .ag-painel-topo p {
      margin: 0;
      font-size: .86rem;
      color: var(--pt-muted);
    }

    .ag-painel-badge {
      flex-shrink: 0;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--pt-accent-soft);
      color: var(--pt-accent);
      font-family: "Montserrat", sans-serif;
      font-size: .8rem;
      font-weight: 700;
    }

    .ag-lista {
      display: flex;
      flex-direction: column;
      gap: 12px;
      max-height: 620px;
      overflow-y: auto;
      padding-right: 4px;
    }

    .ag-item {
      display: flex;
      gap: 14px;
      padding: 14px 16px;
      border: 1px solid var(--pt-line);
      border-left: 4px solid var(--st-cor, var(--pt-accent));
      border-radius: 16px;
      background: #fff;
      animation: ag-entra .3s ease both;
      animation-delay: calc(var(--i, 0) * 45ms);
      transition: box-shadow .2s ease, transform .2s ease;
    }

    .ag-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 28px -18px rgba(15, 27, 52, .35);
    }

    @keyframes ag-entra {
      from {
        opacity: 0;
        transform: translateY(6px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    .ag-item-hora {
      flex-shrink: 0;
      width: 58px;
      text-align: center;
      font-family: "Montserrat", sans-serif;
    }

    .ag-item-hora strong {
      display: block;
      font-size: 1.05rem;
      font-weight: 800;
      color: var(--pt-ink);
    }

    .ag-item-hora span {
      font-size: .7rem;
      color: var(--pt-muted);
    }

    .ag-item-info {
      flex: 1;
      min-width: 0;
    }

    .ag-item-topo {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 6px 10px;
      margin-bottom: 6px;
    }

    .ag-item-pet {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: "Montserrat", sans-serif;
      font-size: .98rem;
      font-weight: 700;
      color: var(--pt-ink);
    }

    .ag-item-pet i {
      color: var(--pt-accent);
    }

    .ag-status {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 11px;
      border-radius: 999px;
      font-size: .76rem;
      font-weight: 700;
      color: var(--st-cor);
      background: var(--st-fundo);
      white-space: nowrap;
    }

    .ag-item-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 6px 14px;
      font-size: .82rem;
      color: var(--pt-muted);
    }

    .ag-item-meta span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .ag-servico {
      padding: 3px 10px;
      border-radius: 8px;
      background: var(--pt-accent-soft);
      color: var(--pt-accent);
      font-weight: 600;
    }

    .ag-item-obs {
      margin: 8px 0 0;
      padding: 8px 10px;
      border-radius: 10px;
      background: var(--pt-bg);
      font-size: .8rem;
      color: var(--pt-body);
      line-height: 1.45;
    }

    .ag-vazio {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-height: 240px;
      padding: 30px 16px;
      border: 2px dashed var(--pt-line);
      border-radius: 20px;
      text-align: center;
      color: var(--pt-muted);
      font-size: .9rem;
    }

    .ag-vazio i {
      font-size: 2rem;
      color: #c3ccda;
    }

    .ag-vazio button {
      border: 0;
      background: none;
      color: var(--pt-accent);
      font-weight: 700;
      text-decoration: underline;
      padding: 0;
    }

    /* ---------- Responsivo ---------- */
    @media (max-width: 991.98px) {
      .ag-corpo {
        grid-template-columns: minmax(0, 1fr);
      }

      .ag-calendario {
        border-right: 0;
        border-bottom: 1px solid var(--pt-line);
      }

      .ag-lista {
        max-height: none;
        overflow: visible;
      }
    }

    @media (max-width: 767.98px) {
      .pt-hero {
        padding-top: 140px;
      }

      .pt-card {
        border-radius: 20px;
      }

      /* Resumo: 3 cartões compactos lado a lado */
      .ag-resumo {
        gap: 8px;
      }

      .ag-resumo-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding: 12px;
        border-radius: 16px;
      }

      .ag-resumo-icone {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        font-size: 13px;
      }

      .ag-resumo-valor {
        font-size: 1.2rem;
      }

      .ag-resumo-rotulo {
        font-size: .72rem;
        line-height: 1.3;
        display: block;
      }

      .ag-mes-nav {
        width: 100%;
        justify-content: space-between;
      }

      .ag-campos,
      .ag-campos select,
      .ag-busca,
      .ag-busca input {
        width: 100%;
      }

      .ag-dia {
        min-height: 42px;
        border-radius: 10px;
      }

      .ag-dia-total {
        top: 2px;
        right: 2px;
        min-width: 15px;
        height: 15px;
        line-height: 15px;
        font-size: .58rem;
        padding: 0 3px;
      }

      .ag-dia-num {
        font-size: .85rem;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      .ag-item {
        animation: none;
      }
    }
  </style>

</head>

<body class="index-page">

  @include('partials.preloader')

  <div class="pt-progress" id="ptProgress"></div>

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

  <main class="main pt-page">
    <section class="pt-hero">
      <div class="pt-wrap">

        <div class="pt-hero-head" data-aos="fade-up">
          <h1 class="pt-h1">Agenda de atendimentos</h1>
          <p class="pt-lead">
            Veja o mês inteiro de relance, clique em um dia e confira cada atendimento: horário, pet, tutor,
            serviço, profissional e status.
          </p>
          <div class="pt-hero-actions">
            <button type="button" class="pt-btn pt-btn--primary" data-ir-hoje>
              <i class="fa-solid fa-calendar-day"></i> Ir para hoje
            </button>
            <a href="{{ route('painel-controle') }}" class="pt-btn pt-btn--outline">
              <i class="fa-solid fa-gauge-high"></i> Painel de controle
            </a>
          </div>
        </div>

        {{-- Resumo rápido (calculado no navegador a partir dos agendamentos) --}}
        <div class="ag-resumo" data-aos="fade-up">
          <button type="button" class="ag-resumo-item" data-ir-hoje>
            <span class="ag-resumo-icone"><i class="fa-solid fa-calendar-day"></i></span>
            <span>
              <span class="ag-resumo-valor" id="resumoHoje">0</span>
              <span class="ag-resumo-rotulo">atendimentos hoje</span>
            </span>
          </button>
          <button type="button" class="ag-resumo-item" data-proximo>
            <span class="ag-resumo-icone"><i class="fa-solid fa-calendar-week"></i></span>
            <span>
              <span class="ag-resumo-valor" id="resumoSemana">0</span>
              <span class="ag-resumo-rotulo">nos próximos 7 dias</span>
            </span>
          </button>
          <button type="button" class="ag-resumo-item" data-filtro-atalho="agendado">
            <span class="ag-resumo-icone"><i class="fa-solid fa-hourglass-half"></i></span>
            <span>
              <span class="ag-resumo-valor" id="resumoPendentes">0</span>
              <span class="ag-resumo-rotulo">pendentes a partir de hoje</span>
            </span>
          </button>
        </div>

        <div class="pt-card" data-aos="zoom-in" data-aos-delay="100">

          <div class="pt-card-head">
            <div class="d-flex align-items-center gap-3">
              <div class="pt-head-icon">
                <i class="fa-solid fa-calendar-days"></i>
              </div>
              <div>
                <h3>Agenda</h3>
                <p>Clique em um dia para ver os atendimentos.</p>
              </div>
            </div>

            <div class="ag-mes-nav">
              <button type="button" id="mesAnterior" aria-label="Mês anterior">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <span class="ag-mes-nome" id="mesNome" aria-live="polite">—</span>
              <button type="button" id="mesProximo" aria-label="Próximo mês">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
            </div>
          </div>

          <div class="ag-filtros">
            <div class="ag-chips" role="group" aria-label="Filtrar por status">
              <button type="button" class="ag-chip ativo" data-status="todos">Todos</button>
              <button type="button" class="ag-chip" data-status="agendado"><i class="ag-ponto st-pendente"></i> Pendente</button>
              <button type="button" class="ag-chip" data-status="andamento"><i class="ag-ponto st-andamento"></i> Em atendimento</button>
              <button type="button" class="ag-chip" data-status="concluido"><i class="ag-ponto st-concluido"></i> Concluído</button>
              <button type="button" class="ag-chip" data-status="cancelado"><i class="ag-ponto st-cancelado"></i> Cancelado</button>
            </div>

            <div class="ag-campos">
              <select id="filtroProfissional" aria-label="Filtrar por profissional">
                <option value="">Todos os profissionais</option>
                @if (session('id'))
                  <option value="{{ session('id') }}">Somente os meus</option>
                @endif
                @foreach ($funcionarios as $f)
                  <option value="{{ $f->id_funcionario }}">{{ $f->nome }}</option>
                @endforeach
              </select>
              <label class="ag-busca mb-0">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="filtroBusca" placeholder="Buscar pet, tutor ou serviço"
                  aria-label="Buscar pet, tutor ou serviço" autocomplete="off">
              </label>
            </div>
          </div>

          <div class="ag-corpo">

            <!-- Calendário do mês -->
            <div class="ag-calendario">
              <div class="ag-semana" aria-hidden="true">
                <span>Dom</span><span>Seg</span><span>Ter</span><span>Qua</span><span>Qui</span><span>Sex</span><span>Sáb</span>
              </div>
              <div class="ag-grade" id="grade" role="grid" aria-label="Dias do mês"></div>

              <div class="ag-legenda" aria-hidden="true">
                <span><i class="st-pendente"></i> Pendente</span>
                <span><i class="st-andamento"></i> Em atendimento</span>
                <span><i class="st-concluido"></i> Concluído</span>
                <span><i class="st-cancelado"></i> Cancelado</span>
              </div>
            </div>

            <!-- Atendimentos do dia selecionado -->
            <div class="ag-painel">
              <div class="ag-painel-topo">
                <div>
                  <h4 id="diaTitulo">—</h4>
                  <p id="diaSub"></p>
                </div>
                <span class="ag-painel-badge" id="diaTotal">0</span>
              </div>
              <div class="ag-lista" id="lista" aria-live="polite"></div>
            </div>

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

  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  {{-- Agendamentos (lista simples vinda do controller) --}}
  <script type="application/json" id="agendaDados">@json($eventos)</script>

  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 650, easing: 'ease-out-cubic', once: true, offset: 100 });
    }

    // Barra de progresso de rolagem
    (function () {
      const barra = document.getElementById('ptProgress');
      const atualizar = () => {
        const total = document.documentElement.scrollHeight - window.innerHeight;
        barra.style.width = total > 0 ? `${(window.scrollY / total) * 100}%` : '0';
      };
      window.addEventListener('scroll', atualizar, { passive: true });
      atualizar();
    })();

    /* =============================================================
       AGENDA: calendário do mês + atendimentos do dia selecionado.
       Filtros (status, profissional, busca) valem para os dois.
    ============================================================= */
    (function () {
      'use strict';

      const eventos = JSON.parse(document.getElementById('agendaDados').textContent || '[]');

      const STATUS = {
        agendado:  { rotulo: 'Pendente',       classe: 'st-pendente',  cor: 'var(--st-pendente)',  fundo: 'var(--st-pendente-bg)',  icone: 'fa-regular fa-clock' },
        andamento: { rotulo: 'Em atendimento', classe: 'st-andamento', cor: 'var(--st-andamento)', fundo: 'var(--st-andamento-bg)', icone: 'fa-solid fa-shower' },
        concluido: { rotulo: 'Concluído',      classe: 'st-concluido', cor: 'var(--st-concluido)', fundo: 'var(--st-concluido-bg)', icone: 'fa-solid fa-circle-check' },
        cancelado: { rotulo: 'Cancelado',      classe: 'st-cancelado', cor: 'var(--st-cancelado)', fundo: 'var(--st-cancelado-bg)', icone: 'fa-solid fa-circle-xmark' },
      };
      const ORDEM_STATUS = ['agendado', 'andamento', 'concluido', 'cancelado'];

      const $ = (id) => document.getElementById(id);
      const grade = $('grade');
      const lista = $('lista');

      const hoje = new Date();
      hoje.setHours(0, 0, 0, 0);

      const estado = {
        mes: new Date(hoje.getFullYear(), hoje.getMonth(), 1),
        selecionado: chave(hoje),
        status: 'todos',
        profissional: '',
        busca: '',
      };

      /* ---------- utilitários ---------- */
      function chave(data) {
        const m = String(data.getMonth() + 1).padStart(2, '0');
        const d = String(data.getDate()).padStart(2, '0');
        return `${data.getFullYear()}-${m}-${d}`;
      }

      function paraData(chaveData) {
        const [a, m, d] = chaveData.split('-').map(Number);
        return new Date(a, m - 1, d);
      }

      function esc(texto) {
        return String(texto ?? '').replace(/[&<>"']/g, (c) => ({
          '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
        }[c]));
      }

      function normalizar(texto) {
        return String(texto ?? '').toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
      }

      const fmtMes = new Intl.DateTimeFormat('pt-BR', { month: 'long', year: 'numeric' });
      const fmtDia = new Intl.DateTimeFormat('pt-BR', { weekday: 'long', day: 'numeric', month: 'long' });

      // "setembro de 2026" -> "Setembro de 2026" (só a primeira letra)
      function inicialMaiuscula(texto) {
        return texto.charAt(0).toUpperCase() + texto.slice(1);
      }

      /* ---------- filtros ---------- */
      function passaFiltros(ev) {
        if (estado.status !== 'todos' && ev.status !== estado.status) return false;
        if (estado.profissional && String(ev.id_funcionario) !== estado.profissional) return false;
        if (estado.busca) {
          const alvo = normalizar(`${ev.pet} ${ev.tutor} ${ev.servico} ${ev.funcionario}`);
          if (!alvo.includes(normalizar(estado.busca))) return false;
        }
        return true;
      }

      // Agrupa os eventos filtrados por dia (YYYY-MM-DD)
      function porDia() {
        const mapa = new Map();
        eventos.filter(passaFiltros).forEach((ev) => {
          if (!mapa.has(ev.data)) mapa.set(ev.data, []);
          mapa.get(ev.data).push(ev);
        });
        return mapa;
      }

      /* ---------- calendário ---------- */
      function desenharCalendario(mapa) {
        const ano = estado.mes.getFullYear();
        const mes = estado.mes.getMonth();
        $('mesNome').textContent = inicialMaiuscula(fmtMes.format(estado.mes));

        // Começa no domingo da semana do dia 1 e mostra 6 semanas
        const inicio = new Date(ano, mes, 1 - new Date(ano, mes, 1).getDay());
        const celulas = [];

        for (let i = 0; i < 42; i++) {
          const dia = new Date(inicio.getFullYear(), inicio.getMonth(), inicio.getDate() + i);
          const k = chave(dia);
          const doDia = mapa.get(k) || [];

          const classes = ['ag-dia'];
          if (dia.getMonth() !== mes) classes.push('fora');
          if (dia < hoje) classes.push('passado');
          if (k === chave(hoje)) classes.push('hoje');
          if (k === estado.selecionado) classes.push('selecionado');
          if (doDia.length) classes.push('com-agenda');

          const statusDoDia = ORDEM_STATUS.filter((s) => doDia.some((ev) => ev.status === s));
          const pontos = statusDoDia.map((s) => `<i class="${STATUS[s].classe}"></i>`).join('');

          const rotulo = `${fmtDia.format(dia)}: ${doDia.length ? doDia.length + (doDia.length === 1 ? ' atendimento' : ' atendimentos') : 'sem atendimentos'}`;

          celulas.push(`
            <button type="button" class="${classes.join(' ')}" data-dia="${k}" role="gridcell"
              aria-label="${esc(rotulo)}" ${k === estado.selecionado ? 'aria-selected="true"' : ''}>
              ${doDia.length ? `<span class="ag-dia-total">${doDia.length}</span>` : ''}
              <span class="ag-dia-num">${dia.getDate()}</span>
              <span class="ag-dia-pontos">${pontos}</span>
            </button>`);
        }

        grade.innerHTML = celulas.join('');
      }

      /* ---------- lista do dia ---------- */
      function desenharDia(mapa) {
        const data = paraData(estado.selecionado);
        const doDia = (mapa.get(estado.selecionado) || []).slice().sort((a, b) => a.horario.localeCompare(b.horario));

        $('diaTitulo').textContent = inicialMaiuscula(fmtDia.format(data));
        $('diaSub').textContent = estado.selecionado === chave(hoje)
          ? 'Hoje'
          : (data < hoje ? 'Dia que já passou' : 'Próximo dia de atendimento');
        $('diaTotal').textContent = `${doDia.length} ${doDia.length === 1 ? 'atendimento' : 'atendimentos'}`;

        if (!doDia.length) {
          const filtrando = estado.status !== 'todos' || estado.profissional || estado.busca;
          lista.innerHTML = `
            <div class="ag-vazio">
              <i class="fa-regular fa-calendar-xmark"></i>
              <span>Nenhum atendimento ${filtrando ? 'com esses filtros ' : ''}neste dia.</span>
              ${proximoDiaCom(mapa) ? '<button type="button" data-proximo>Ver o próximo dia com atendimento</button>' : ''}
            </div>`;
          return;
        }

        lista.innerHTML = doDia.map((ev, i) => {
          const st = STATUS[ev.status] || STATUS.agendado;
          const icone = normalizar(ev.especie) === 'gato' ? 'fa-cat' : 'fa-dog';
          const etapa = ev.status === 'andamento' && ev.etapa ? ` · ${esc(ev.etapa)}` : '';

          return `
            <article class="ag-item" style="--i:${i}; --st-cor:${st.cor}; --st-fundo:${st.fundo}">
              <div class="ag-item-hora">
                <strong>${esc(ev.horario)}</strong>
                <span>#${esc(ev.id)}</span>
              </div>
              <div class="ag-item-info">
                <div class="ag-item-topo">
                  <span class="ag-item-pet"><i class="fa-solid ${icone}"></i> ${esc(ev.pet)}</span>
                  <span class="ag-status"><i class="${st.icone}"></i> ${st.rotulo}${etapa}</span>
                </div>
                <div class="ag-item-meta">
                  <span class="ag-servico">${esc(ev.servico)}</span>
                  <span><i class="fa-solid fa-user"></i> ${esc(ev.tutor)}</span>
                  <span><i class="fa-solid fa-id-badge"></i> ${esc(ev.funcionario)}</span>
                </div>
                ${ev.observacao ? `<p class="ag-item-obs"><i class="fa-regular fa-note-sticky me-1"></i> ${esc(ev.observacao)}</p>` : ''}
              </div>
            </article>`;
        }).join('');
      }

      // Próximo dia (a partir do selecionado) que tem atendimento com os filtros atuais
      function proximoDiaCom(mapa) {
        return [...mapa.keys()].sort().find((k) => k > estado.selecionado) || null;
      }

      function atualizarResumo() {
        const k = chave(hoje);
        const em7 = chave(new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate() + 7));
        $('resumoHoje').textContent = eventos.filter((ev) => ev.data === k && ev.status !== 'cancelado').length;
        $('resumoSemana').textContent = eventos.filter((ev) => ev.data >= k && ev.data < em7 && ev.status !== 'cancelado').length;
        $('resumoPendentes').textContent = eventos.filter((ev) => ev.data >= k && ev.status === 'agendado').length;
      }

      function render() {
        const mapa = porDia();
        desenharCalendario(mapa);
        desenharDia(mapa);
      }

      function selecionar(chaveData) {
        estado.selecionado = chaveData;
        const d = paraData(chaveData);
        estado.mes = new Date(d.getFullYear(), d.getMonth(), 1);
        render();
      }

      /* ---------- eventos ---------- */
      grade.addEventListener('click', (e) => {
        const botao = e.target.closest('[data-dia]');
        if (botao) selecionar(botao.dataset.dia);
      });

      $('mesAnterior').addEventListener('click', () => {
        estado.mes = new Date(estado.mes.getFullYear(), estado.mes.getMonth() - 1, 1);
        render();
      });

      $('mesProximo').addEventListener('click', () => {
        estado.mes = new Date(estado.mes.getFullYear(), estado.mes.getMonth() + 1, 1);
        render();
      });

      document.addEventListener('click', (e) => {
        if (e.target.closest('[data-ir-hoje]')) {
          selecionar(chave(hoje));
          document.querySelector('.pt-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
          return;
        }

        if (e.target.closest('[data-proximo]')) {
          const alvo = proximoDiaCom(porDia());
          if (alvo) selecionar(alvo);
          return;
        }

        const atalho = e.target.closest('[data-filtro-atalho]');
        if (atalho) {
          definirStatus(atalho.dataset.filtroAtalho);
          document.querySelector('.pt-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
          return;
        }

        const chip = e.target.closest('.ag-chip');
        if (chip) definirStatus(chip.dataset.status);
      });

      function definirStatus(status) {
        estado.status = status;
        document.querySelectorAll('.ag-chip').forEach((c) => {
          const ativo = c.dataset.status === status;
          c.classList.toggle('ativo', ativo);
          c.setAttribute('aria-pressed', ativo ? 'true' : 'false');
        });
        render();
      }

      $('filtroProfissional').addEventListener('change', (e) => {
        estado.profissional = e.target.value;
        render();
      });

      $('filtroBusca').addEventListener('input', (e) => {
        estado.busca = e.target.value.trim();
        render();
      });

      // Setas do teclado navegam entre os dias do calendário
      grade.addEventListener('keydown', (e) => {
        const passos = { ArrowLeft: -1, ArrowRight: 1, ArrowUp: -7, ArrowDown: 7 };
        if (!(e.key in passos)) return;
        e.preventDefault();
        const d = paraData(estado.selecionado);
        d.setDate(d.getDate() + passos[e.key]);
        selecionar(chave(d));
        grade.querySelector(`[data-dia="${estado.selecionado}"]`)?.focus();
      });

      atualizarResumo();
      render();
    })();
  </script>

  @include('partials.logout-confirm')

</body>

</html>
