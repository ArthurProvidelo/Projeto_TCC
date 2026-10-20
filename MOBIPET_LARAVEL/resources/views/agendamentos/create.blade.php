<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agendamento | Mobipet</title>
  <meta name="description" content="Agende banho, tosa e outros atendimentos para o seu pet na Mobipet.">
  <meta name="keywords" content="agendamento mobipet, agendar atendimento pet, banho e tosa">

  <!-- Favicons -->
    @include('partials.favicon')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet">

  <style>
    /* ===========================================================
       AGENDAMENTO — MOBIPET  ·  isolado (prefixo pt-)
       mesmo sistema tipográfico/visual de devs.blade.php, das telas
       de recuperação de senha (rs-/rd-) e do cadastro/edição de pet.
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
      width: min(880px, 92%);
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
      overflow: hidden;
    }

    /* Faixa azul no topo do card (mesmo padrão de "Meus Pets") */
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

    .pt-required-note {
      font-family: "Lato", sans-serif;
      font-size: .85rem;
      color: var(--pt-muted);
      margin-bottom: 28px;
    }

    .pt-required-mark {
      color: #dc2626;
      font-weight: 700;
    }

    .pt-section-title {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 24px;
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--pt-ink);
    }

    .pt-section-title:not(:first-of-type) {
      margin-top: 44px;
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

    /* "Passo 1 de 3" à direita do título de cada seção */
    .pt-section-title .pt-passo {
      margin-left: auto;
      padding: 5px 12px;
      border-radius: 999px;
      background: var(--pt-accent-soft);
      color: var(--pt-accent);
      font-family: "Lato", sans-serif;
      font-size: .74rem;
      font-weight: 700;
      letter-spacing: .02em;
      white-space: nowrap;
    }

    /* Cliente sem pet: aviso + botão lado a lado */
    .pt-sem-pet {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 14px;
      padding: 16px 18px;
      border-radius: var(--pt-radius-sm);
      background: #fff8e6;
      border: 1px solid #fde68a;
      color: #92400e;
      font-size: .92rem;
      font-weight: 600;
    }

    .pt-sem-pet .pt-btn {
      padding: 11px 20px;
      font-size: .88rem;
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
    }

    .pt-page .form-control:focus,
    .pt-page .form-select:focus {
      border-color: var(--pt-accent);
      background-color: #fff;
      box-shadow: 0 0 0 4px var(--pt-accent-soft) !important;
    }

    .pt-page .invalid-feedback {
      font-family: "Lato", sans-serif;
      font-weight: 600;
      font-size: .82rem;
      text-transform: none;
      letter-spacing: 0;
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

    .pt-btn--block {
      width: 100%;
      margin-top: 14px;
    }

    .pt-divider {
      border: none;
      border-top: 1px solid var(--pt-line);
      margin: 38px 0 30px;
    }

    /* =========================================================
       GRADE DE HORÁRIOS
       ========================================================= */
    .pt-slots {
      margin-top: 6px;
      border: 1px solid var(--pt-line);
      border-radius: var(--pt-radius-sm);
      background: var(--pt-bg);
      padding: 16px;
      min-height: 92px;
    }

    .pt-slots__hint,
    .pt-slots__empty,
    .pt-slots__loading {
      margin: 0;
      font-family: "Lato", sans-serif;
      font-size: .9rem;
      color: var(--pt-muted);
      text-align: center;
      padding: 14px 8px;
    }

    .pt-slots__grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(78px, 1fr));
      gap: 10px;
    }

    .pt-slot {
      appearance: none;
      -webkit-appearance: none;
      border: 1.5px solid var(--pt-line);
      background: #fff;
      color: var(--pt-ink);
      font-family: "Montserrat", sans-serif;
      font-weight: 600;
      font-size: .92rem;
      padding: 12px 0;
      border-radius: 12px;
      cursor: pointer;
      transition: border-color .15s ease, background .15s ease, color .15s ease, transform .15s ease;
    }

    .pt-slot:hover:not(:disabled) {
      border-color: var(--pt-accent);
      color: var(--pt-accent);
      transform: translateY(-2px);
    }

    .pt-slot:focus-visible {
      outline: 3px solid var(--pt-accent-soft);
      outline-offset: 2px;
    }

    .pt-slot.is-selected {
      background: var(--pt-accent);
      border-color: var(--pt-accent);
      color: #fff;
    }

    .pt-slot:disabled {
      cursor: not-allowed;
      background: repeating-linear-gradient(-45deg, #f1f4f9, #f1f4f9 6px, #e9edf5 6px, #e9edf5 12px);
      color: var(--pt-muted);
      text-decoration: line-through;
    }

    .pt-slots__legend {
      display: flex;
      gap: 18px;
      margin-top: 14px;
      font-family: "Lato", sans-serif;
      font-size: .78rem;
      color: var(--pt-muted);
    }

    .pt-slots__legend span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .pt-slots__legend i {
      width: 12px;
      height: 12px;
      border-radius: 4px;
      background: #fff;
      border: 1.5px solid var(--pt-line);
    }

    .pt-slots__legend i.busy {
      background: repeating-linear-gradient(-45deg, #f1f4f9, #f1f4f9 3px, #e9edf5 3px, #e9edf5 6px);
    }

    .pt-slots-erro {
      margin-top: 8px;
      font-family: "Lato", sans-serif;
      font-weight: 600;
      font-size: .82rem;
      color: #dc2626;
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

    /* Mobipet: animações sempre ativas (bloqueio de reduce desligado de propósito). */
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
  MAIN
  ========================================================= -->

  <main class="main pt-page">

    <section class="pt-hero">
      <div class="pt-wrap">

        <div class="pt-hero-head" data-aos="fade-up">
          <h1 class="pt-h1">Agende o atendimento do seu pet</h1>
          <p class="pt-lead">
            Mais praticidade, segurança e monitoramento completo para acompanhar cada etapa do atendimento.
          </p>
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

          <div class="pt-card-head">
            <div class="d-flex align-items-center gap-3">
              <div class="pt-head-icon">
                <i class="fa-solid fa-calendar-plus"></i>
              </div>
              <div>
                <h3>Novo agendamento</h3>
                <p>Escolha o pet, o serviço e o melhor horário.</p>
              </div>
            </div>
            <span class="pt-head-chip">
              <i class="fa-regular fa-clock"></i> Das 07:00 às 18:00
            </span>
          </div>

          <div class="pt-card-body">

          <form action="{{ route('agendamento.store') }}" method="POST">
            @csrf

            <p class="pt-required-note">
              <span class="pt-required-mark">*</span> Todos os campos são obrigatórios
            </p>

            {{-- ---------- 1. PET E SERVIÇO: o que vai ser feito ---------- --}}
            <div class="pt-section-title">
              <i class="fa-solid fa-paw"></i>
              <span>Pet e serviço</span>
              <small class="pt-passo">Passo 1 de 3</small>
            </div>

            <div class="row g-4">
              <div class="{{ $pets->count() > 0 ? 'col-md-6' : 'col-12' }}">
                <label for="agPet">Pet <span class="pt-required-mark">*</span></label>
                @if($pets->count() > 0)
                  <select name="fk_id_pet" id="agPet" class="form-select @error('fk_id_pet') is-invalid @enderror" required>
                    <option value="">Selecione um pet</option>
                    @foreach($pets as $pet)
                      <option value="{{ $pet->id_pet }}" @selected(old('fk_id_pet', request('pet')) == $pet->id_pet)>{{ $pet->nome }}</option>
                    @endforeach
                  </select>
                  @error('fk_id_pet')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                @else
                  <div class="pt-sem-pet">
                    <span><i class="fa-solid fa-circle-info"></i> Você ainda não possui pets cadastrados.</span>
                    <a href="{{ route('pets.create') }}" class="pt-btn pt-btn--primary">
                      <i class="fa-solid fa-paw"></i> Cadastrar pet
                    </a>
                  </div>
                @endif
              </div>

              <div class="col-md-6">
                <label for="agServico">Serviço <span class="pt-required-mark">*</span></label>
                <select name="fk_id_servico" id="agServico" class="form-select @error('fk_id_servico') is-invalid @enderror" required>
                  <option value="">Selecione um serviço</option>
                  @foreach($servicos as $servico)
                    <option value="{{ $servico->id_servico }}" @selected(old('fk_id_servico') == $servico->id_servico)>{{ $servico->nome }}</option>
                  @endforeach
                </select>
                @error('fk_id_servico')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
            </div>

            {{-- ---------- 2. QUANDO: profissional + data definem os horários livres ---------- --}}
            <div class="pt-section-title">
              <i class="fa-solid fa-calendar-days"></i>
              <span>Quando</span>
              <small class="pt-passo">Passo 2 de 3</small>
            </div>

            <div class="row g-4">
              <div class="col-md-6">
                <label for="agProfissional">Profissional <span class="pt-required-mark">*</span></label>
                <select name="fk_id_funcionario" id="agProfissional" class="form-select @error('fk_id_funcionario') is-invalid @enderror" required>
                  <option value="">Selecione o profissional</option>
                  @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id_funcionario }}" @selected(old('fk_id_funcionario') == $funcionario->id_funcionario)>{{ $funcionario->nome }}</option>
                  @endforeach
                </select>
                @error('fk_id_funcionario')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="agData">Data <span class="pt-required-mark">*</span></label>
                <input type="date" name="data_agendamento" id="agData"
                       value="{{ old('data_agendamento') }}"
                       min="{{ date('Y-m-d') }}"
                       class="form-control @error('data_agendamento') is-invalid @enderror" required>
                @error('data_agendamento')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label>Horário <span class="pt-required-mark">*</span></label>

                <input type="hidden" name="horario" id="horarioInput" value="{{ old('horario') }}">

                <div id="gradeHorarios" class="pt-slots"
                     data-url="{{ route('agendamento.horarios') }}"
                     data-old="{{ old('horario') }}">
                  <p class="pt-slots__hint">Escolha o profissional e a data para ver os horários livres.</p>
                </div>

                <small class="d-block mt-2" style="color: var(--pt-muted);">
                  Os horários riscados já foram ocupados ou já passaram.<br>
                  Atendimentos das 07:00 às 18:00, de 30 em 30 minutos.
                </small>

                <div id="horarioErro" class="pt-slots-erro" hidden>Selecione um horário.</div>
                @error('horario')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
            </div>

            {{-- ---------- 3. OBSERVAÇÕES ---------- --}}
            <div class="pt-section-title">
              <i class="fa-solid fa-note-sticky"></i>
              <span>Observações</span>
              <small class="pt-passo">Passo 3 de 3</small>
            </div>

            <div>
              <label for="agObservacoes">Algo que a equipe precisa saber? <span class="pt-required-mark">*</span></label>
              <textarea name="observacoes" id="agObservacoes" class="form-control @error('observacoes') is-invalid @enderror" rows="4"
                        placeholder="Ex.: alergias, comportamento com estranhos, cuidados especiais..." required>{{ old('observacoes') }}</textarea>
              @error('observacoes')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <hr class="pt-divider">

            <button type="submit" class="pt-btn pt-btn--primary pt-btn--block">
              <i class="fa-solid fa-calendar-check"></i> Confirmar agendamento
            </button>

          </form>

          </div>

        </div>

      </div>
    </section>
  </main>

  @include('partials.footer')

  <div id="preloader"></div>

  <!-- =========================================================
  JS
  ========================================================= -->

  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (typeof AOS === 'undefined') return;
      AOS.init({ duration: 650, easing: 'ease-out-cubic', once: true, offset: 100 });
    });
  </script>

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Agendamento confirmado',
        text: @json(session('success'))
      });
    </script>
  @endif

  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Não foi possível agendar',
        html: @json(implode('<br>', $errors->all()))
      });
    </script>
  @endif

  <!-- Grade de horários dinâmica -->
  <script>
    (function () {
      var grade = document.getElementById('gradeHorarios');
      var input = document.getElementById('horarioInput');
      var erro  = document.getElementById('horarioErro');
      if (!grade || !input) return;

      var prof    = document.querySelector('[name="fk_id_funcionario"]');
      var data    = document.querySelector('[name="data_agendamento"]');
      var form    = input.closest('form');
      var url     = grade.dataset.url;
      var oldHora = grade.dataset.old || '';
      var token   = 0;

      function hint(texto, cls) {
        grade.innerHTML = '<p class="' + (cls || 'pt-slots__hint') + '"></p>';
        grade.firstChild.textContent = texto;
      }

      function selecionar(botao) {
        grade.querySelectorAll('.pt-slot').forEach(function (b) { b.classList.remove('is-selected'); });
        botao.classList.add('is-selected');
        input.value = botao.dataset.hora;
        if (erro) erro.hidden = true;
      }

      function render(horarios) {
        if (!horarios.length) {
          hint('Nenhum horário disponível nesta data.', 'pt-slots__empty');
          return;
        }

        var temLivre = horarios.some(function (h) { return h.disponivel; });
        if (!temLivre) {
          hint('Todos os horários deste dia já estão ocupados. Tente outra data.', 'pt-slots__empty');
          return;
        }

        var grid = document.createElement('div');
        grid.className = 'pt-slots__grid';

        horarios.forEach(function (h) {
          var b = document.createElement('button');
          b.type = 'button';
          b.className = 'pt-slot';
          b.textContent = h.hora;
          b.dataset.hora = h.hora;

          if (h.disponivel) {
            b.addEventListener('click', function () { selecionar(b); });
          } else {
            b.disabled = true;
            b.title = h.motivo === 'ocupado' ? 'Horário já reservado' : 'Horário já passou';
          }

          grid.appendChild(b);
        });

        grade.innerHTML = '';
        grade.appendChild(grid);

        var legenda = document.createElement('div');
        legenda.className = 'pt-slots__legend';
        legenda.innerHTML = '<span><i></i> Livre</span><span><i class="busy"></i> Ocupado</span>';
        grade.appendChild(legenda);

        // Re-seleciona o horário que o usuário havia escolhido antes de um erro de validação.
        if (oldHora) {
          var alvo = grid.querySelector('.pt-slot[data-hora="' + oldHora + '"]:not(:disabled)');
          if (alvo) selecionar(alvo);
          oldHora = '';
        }
      }

      function carregar() {
        input.value = '';

        if (!prof || !data || !prof.value || !data.value) {
          hint('Escolha o profissional e a data para ver os horários livres.');
          return;
        }

        var meu = ++token;
        hint('Carregando horários...', 'pt-slots__loading');

        fetch(url + '?funcionario=' + encodeURIComponent(prof.value) + '&data=' + encodeURIComponent(data.value), {
          headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        })
          .then(function (r) { return r.ok ? r.json() : Promise.reject(r); })
          .then(function (json) { if (meu === token) render(json.horarios || []); })
          .catch(function () {
            if (meu === token) hint('Não foi possível carregar os horários. Tente novamente.', 'pt-slots__empty');
          });
      }

      if (prof) prof.addEventListener('change', carregar);
      if (data) data.addEventListener('change', carregar);

      if (form) {
        form.addEventListener('submit', function (e) {
          if (!input.value) {
            e.preventDefault();
            if (erro) erro.hidden = false;
            grade.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        });
      }

      // Página recarregada após erro de validação já com profissional + data preenchidos.
      if (prof && data && prof.value && data.value) carregar();
    })();
  </script>

  @include('partials.logout-confirm')

</body>

</html>
