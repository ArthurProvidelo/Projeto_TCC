<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Formas de Pagamento | Mobipet</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
    @include('partials.favicon')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/estilo.css" rel="stylesheet">


</head>

<body class="departments-page">

    @include('partials.preloader')


  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a
              href="mailto:contact@example.com">mobipet@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+19 98943-2384</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#!" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
          <a href="#!" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
          <a href="{{ route('index') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('assets/img/logo_oficial_mobipet.png') }}" alt="Mobipet" class="logo-marca" width="56" height="56">
          <span class="logo-wordmark"><span class="logo-wordmark__mobi">Mobi</span><span class="logo-wordmark__pet">Pet</span></span>
        </a>

          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="{{ route('index') }}" class="active">Início</a></li>
        <li><a href="{{ route('sobre') }}">Sobre nós</a></li>
        <li><a href="{{ route('services') }}">Serviços</a></li>
        <li><a href="{{ route('devs') }}">Desenvolvedores</a></li>
        <li><a href="{{ route('devs') }}">Meus Pets</a></li>
        <li>
            <a href="{{ route('pets.index') }}">
                Cadastro de Funcionário
            </a>
        </li>
                </li>
                <li class="dropdown">
                  
                    <a href="{{ route('perfil')}}">
                        <i class="fa-solid fa-user"></i> 
                      
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}">
                       Sair <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </li>

                @else

                <li>
                    <a href="{{ route('login') }}">
                        Entrar
                    </a>
                </li>

                @endif
              
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

        </div>

      </div>

    </header>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Formas de pagamento</h1>
              <p class="mb-0">
                <!-- Texto aqui -->
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Início</a></li>
            <li class="current">Pagamentos</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Sessão Página -->
    <section id="departments-tabs" class="departments-tabs section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="medical-specialties">
          <div class="row">
            <div class="col-12">
              <div class="specialty-navigation">
                <div class="nav nav-pills d-flex" id="specialty-tabs" role="tablist" data-aos="fade-up"
                  data-aos-delay="400">
                  <a class="nav-link department-tab active" id="neurology-tab" data-bs-toggle="pill"
                    href="#departments-tabs-neurology" role="tab" aria-controls="departments-tabs-neurology"
                    aria-selected="true" data-aos="fade-up" data-aos-delay="100">Pix</a>
                  <a class="nav-link department-tab" id="surgery-tab" data-bs-toggle="pill"
                    href="#departments-tabs-surgery" role="tab" aria-controls="departments-tabs-surgery"
                    aria-selected="false" data-aos="fade-up" data-aos-delay="150">Cartão de crédito/débito</a>
                  <a class="nav-link department-tab" id="dental-tab" data-bs-toggle="pill"
                    href="#departments-tabs-dental" role="tab" aria-controls="departments-tabs-dental"
                    aria-selected="false" data-aos="fade-up" data-aos-delay="200">Realizar pagamento na hora!</a>
                </div>
              </div>
            </div>


            <!-- Papagamentos aqui!! -->
       <div class="col-12">
  <div class="tab-content department-content" id="specialty-content">

    <!-- PIX -->
    <div class="tab-pane fade show active" id="departments-tabs-neurology">
      <div class="row">
        <div class="col-lg-8">
          <h2>Pagamento com Pix</h2>

          <!-- QR Code -->
          <div id="qrcode" style="margin: 20px 0;"></div>

          <p>Ou copie a chave PIX:</p>

          <div class="d-flex gap-2">
            <input type="text" id="pixKey" class="form-control"
              value="chave-pix-fake-1234@email.com" readonly>

            <button onclick="copiarPix()" class="btn btn-primary">
              Copiar
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- CARTÃO -->
    <div class="tab-pane fade" id="departments-tabs-surgery">
      <div class="row">
        <div class="col-lg-8">
          <h2>Pagamento com Cartão</h2>

          <form>
            <label>Número do Cartão</label>
            <input type="text" class="form-control" placeholder="0000 0000 0000 0000">

            <label class="mt-3">Nome no Cartão</label>
            <input type="text" class="form-control" placeholder="Nome completo">

            <div class="row mt-3">
              <div class="col-md-6">
                <label>Validade</label>
                <input type="text" class="form-control" placeholder="MM/AA">
              </div>

              <div class="col-md-6">
                <label>CVV</label>
                <input type="password" class="form-control" placeholder="123">
              </div>
            </div>

            <button class="btn btn-primary mt-4 w-100">
              Realizar pagamento
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- PRESENCIAL -->
    <div class="tab-pane fade" id="departments-tabs-dental">
      <div class="row">
        <div class="col-lg-8">
          <h2>Pagamento Presencial</h2>

          <p>
            Seu pagamento será realizado diretamente com a recepcionista no momento do atendimento.
          </p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Biblioteca QRCode -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
  const pixFake = "00020126360014BR.GOV.BCB.PIX0114fakepix@email.com5204000053039865802BR5920Teste Usuario6009SaoPaulo62070503***6304ABCD";

  new QRCode(document.getElementById("qrcode"), {
    text: pixFake,
    width: 200,
    height: 200
  });

  function copiarPix() {
    const input = document.getElementById("pixKey");
    input.select();
    input.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Chave PIX copiada!");
  }
</script>


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

  <!-- Scroll Top -->
  <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

    @include('partials.logout-confirm')

</body>

</html>