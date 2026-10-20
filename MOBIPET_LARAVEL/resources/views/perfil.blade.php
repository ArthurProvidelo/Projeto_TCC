<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Meu Perfil | Mobipet</title>

    @include('partials.favicon')

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet">
</head>

<body class="index-page">

    @include('partials.preloader')


  <header id="header" class="header fixed-top">

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow" style="width: 50px; height: 50px; position: fixed; bottom: 20px; right: 20px; z-index: 999; font-size: 24px;">
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

  <main class="main">
    <section class="agendamento-section">
      <div class="container">

        <div class="hero-agendamento text-center" data-aos="fade-up">
          <h1 class="hero-title">Gerencie seu Perfil</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card agendamento-card" data-aos="zoom-in" data-aos-delay="200">

              <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                  <div class="header-icon">
                    <i class="fa-solid fa-user-gear"></i>
                  </div>
                  <div>
                    <h3 class="text-white">Meu Perfil</h3>
                    <p class="mb-0 text-metod">Altere as informações abaixo e clique em salvar.</p>
                  </div>
                </div>
              </div>

              <div class="card-body">

                @if(session('success'))
                  <div class="alert alert-success mb-4">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                  </div>
                @endif

                <?php
                  if(session('nivel_acesso') == 'USUARIO'){
                ?>
                  <form action="{{ route('perfil.update') }}" method="POST">                
                    @csrf
                    @method('PUT')

                    <div class="section-title mt-3">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Dados do Tutor</span>
                  </div>
                <?php 
                  }
                ?>

                <?php
                  if((session('nivel_acesso') === 'FUNCIONARIO' || session('nivel_acesso') === 'ADMIN')){
                ?>
                  <form action="{{ route('funcionario.update', ['id' => session('id')]) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="section-title mt-3">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Dados do Funcionário</span>
                  </div>
                <?php 
                  }
                ?>




                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <label>Nome Completo</label>
                      <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                    </div>

                    <div class="col-md-6 mb-4">
                      <label>E-mail</label>
                      <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-4">
                      <label>Telefone</label>
                      <input type="text" id="telefone" name="telefone" class="form-control" value="{{ $cliente->telefone }}" placeholder="(00) 00000-0000" required>
                    </div>

                    <div class="col-md-4 mb-4">
                      <label>CPF</label>
                      <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $cliente->cpf ?? '' }}" placeholder="000.000.000-00" required>
                    </div>

                    @php
                      // CEP salvo só com números: aplica a máscara 00000-000 para exibir
                      $cepSalvo = preg_replace('/\D/', '', (string) ($cliente->cep ?? ''));
                      $cepExibicao = strlen($cepSalvo) === 8 ? substr($cepSalvo, 0, 5) . '-' . substr($cepSalvo, 5) : $cepSalvo;
                    @endphp
                    <div class="col-md-4 mb-4">
                      <label for="cep">CEP</label>
                      <input type="text" id="cep" name="cep" class="form-control @error('cep') is-invalid @enderror"
                        maxlength="9" inputmode="numeric" autocomplete="postal-code" placeholder="00000-000"
                        value="{{ old('cep', $cepExibicao) }}"
                        data-cep data-endereco-alvo="endereco" data-cep-status="cepStatus">
                      @error('cep')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                      @enderror
                      <small class="cep-status" id="cepStatus" aria-live="polite"></small>
                    </div>

                    <div class="col-12 mb-4">
                      <label>Endereço</label>
                      <input type="text" id="endereco" name="endereco" class="form-control" value="{{ $cliente->endereco }}" required>
                    </div>
                  </div>

                  <div class="text-center mt-2 mb-5">
                    <button type="submit" class="btn btn-primary btn-agendar w-100">
                      <i class="fa-solid fa-floppy-disk me-2"></i>Salvar Alterações
                    </button>
                  </div>
                </form>

                <?php
                  if(session('nivel_acesso') == 'USUARIO'){
                ?>
                <div class="section-title mt-5">
                  <i class="fa-solid fa-paw"></i>
                  <span>Meus Pets</span>
                </div>

                <div class="table-responsive mt-3 mb-4">
                  <table class="table table-hover align-middle custom-table">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Porte</th>
                        <th>Data Nascimento</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($pets as $pet)
                        <tr>
                          <td class="fw-bold text-dark">{{ $pet->nome }}</td>
                          <td><span class="badge bg-light text-dark border">{{ $pet->especie }}</span></td>
                          <td>{{ $pet->raca }}</td>
                          <td>{{ $pet->porte }}</td>
                          <td>{{ \Carbon\Carbon::parse($pet->data_nascimento)->format('d/m/Y') }}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5" class="text-center text-muted py-4">
                            <i class="fa-solid fa-circle-info me-2"></i>Nenhum pet cadastrado até o momento.
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>

                <div class="text-center mt-4">
                  <a href="{{ route('pets.create') }}" class="btn btn-outline-primary btn-add-pet w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="fa-solid fa-plus"></i> Cadastrar Novo Pet
                  </a>
                </div>

              </div>

              <?php } ?>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>

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

  <style>
    body {
      background: #f7f9fc;
      font-family: 'Montserrat', sans-serif;
    }

    .agendamento-section {
      padding: 180px 0 100px;
      background:
      radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
      radial-gradient(circle at bottom left, #dcfce7 0%, transparent 30%);
      min-height: 100vh;
    }

    .hero-agendamento {
      margin-bottom: 60px;
    }

    .hero-title {
      font-size: 52px;
      font-weight: 800;
      color: #111827;
      margin-bottom: 20px;
    }

    .hero-subtitle {
      font-size: 18px;
      color: #6b7280;
      max-width: 700px;
      margin: auto;
    }

    .agendamento-card {
      border: none;
      border-radius: 35px;
      overflow: hidden;
      background: white;
      box-shadow: 0 15px 50px rgba(0,0,0,0.08);
    }

    .agendamento-card .card-header {
      background: linear-gradient(135deg,#2563eb,#1d4ed8);
      padding: 35px;
      border: none;
      color: white;
    }

    .header-icon {
      width: 70px;
      height: 70px;
      background: rgba(255,255,255,0.15);
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .header-icon i {
      font-size: 28px;
      color: white;
    }

    .card-header h3 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .card-body {
      padding: 50px;
    }

    .section-title {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 25px;
      font-size: 22px;
      font-weight: 700;
      color: #111827;
    }

    .section-title i {
      width: 45px;
      height: 45px;
      background: linear-gradient(135deg,#2563eb,#3b82f6);
      color: white;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }

    label {
      font-weight: 600;
      margin-bottom: 10px;
      color: #374151;
    }

    .form-control {
      height: 58px;
      border-radius: 18px;
      border: 1px solid #d1d5db;
      padding: 15px 20px;
      font-size: 15px;
      transition: 0.3s;
      box-shadow: none !important;
    }

    .form-control:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 5px rgba(37,99,235,0.12) !important;
    }

    .btn-agendar {
      height: 65px;
      border-radius: 20px;
      border: none;
      font-size: 18px;
      font-weight: 700;
      background: linear-gradient(135deg,#2563eb,#1d4ed8);
      transition: 0.4s;
      margin-top: 10px;
    }

    .btn-agendar:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 30px rgba(37,99,235,0.25);
    }

    .btn-add-pet {
      height: 58px;
      border-radius: 18px;
      font-size: 16px;
      font-weight: 700;
      border: 2px dashed #2563eb;
      color: #2563eb;
      background: transparent;
      transition: 0.3s;
    }

    .btn-add-pet:hover {
      background: rgba(37,99,235,0.05);
      color: #1d4ed8;
      border-color: #1d4ed8;
      transform: translateY(-2px);
    }

    .custom-table th {
      background-color: #f8fafc;
      color: #475569;
      font-weight: 700;
      padding: 16px;
      border-bottom: 2px solid #e2e8f0;
    }

    .custom-table td {
      padding: 16px;
      color: #64748b;
    }

    .alert-success {
      border-radius: 18px;
      border: none;
      background: #dcfce7;
      color: #166534;
      padding: 18px;
      font-weight: 600;
    }

    @media(max-width: 992px){
      .hero-title{ font-size: 38px; }
      .card-body{ padding: 35px; }
    }

    @media(max-width: 768px){
      .agendamento-section{ padding-top: 150px; }
      .hero-title{ font-size: 32px; }
      .hero-subtitle{ font-size: 16px; }
      .card-body{ padding: 25px; }
    }
  </style>

  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 650, easing: 'ease-out-cubic', once: true, offset: 100 });
    }

    // MÁSCARAS EM JAVASCRIPT PURO (VANILLA JS)
    
    // Função para aplicar máscara no CPF (000.000.000-00)
    const inputCpf = document.getElementById('cpf');
    if(inputCpf) {
      inputCpf.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo o que não é dígito
        if (value.length > 11) value = value.slice(0, 11); // Limita em 11 caracteres
        
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        
        e.target.value = value;
      });
    }

    // Função para aplicar máscara no Telefone ((00) 00000-0000)
    const inputTelefone = document.getElementById('telefone');
    if(inputTelefone) {
      inputTelefone.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo o que não é dígito
        if (value.length > 11) value = value.slice(0, 11); // Limita em 11 caracteres
        
        value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
        
        e.target.value = value;
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sucesso',
        text: '{{ session('success') }}'
      });
    </script>
  @endif

    @include('partials.logout-confirm')

</body>
</html>