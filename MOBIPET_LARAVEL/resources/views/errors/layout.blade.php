{{-- =====================================================================
     MOBIPET — LAYOUT DAS PÁGINAS DE ERRO
     Arquivo: resources/views/errors/layout.blade.php

     O Laravel renderiza automaticamente resources/views/errors/{código}.blade.php
     quando acontece um erro HTTP (404, 403, 419, 429, 500, 503...).

     Cada página estende este layout e preenche:
         @section('code')     → código exibido (ex.: 404)
         @section('title')    → título da aba
         @section('eyebrow')  → rótulo acima do título
         @section('heading')  → título principal
         @section('message')  → texto explicativo
         @section('actions')  → botões (opcional; padrão: início + voltar)

     Parâmetro opcional: ['showNav' => true] exibe o menu e o footer completos
     (usado quando a sessão está disponível, ex.: 404 e 403).
     Estilos isolados com prefixo er-.
     ===================================================================== --}}
@php($showNav = $showNav ?? false)
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="noindex">
    <meta name="theme-color" content="#175cdd">
    <title>@yield('title') | Mobipet</title>

    <!-- Favicons -->
    @include('partials.favicon')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@500;600;700;800&family=Lato:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        /* ===========================================================
           PÁGINAS DE ERRO — MOBIPET  ·  estilos isolados (prefixo er-)
           =========================================================== */
        .er-page {
            --er-accent: #175cdd;
            --er-accent-dark: #0f47b3;
            --er-accent-soft: #eaf1fe;
            --er-soft: #dce8fb;
            --er-ink: #0f1b34;
            --er-body: #4a5568;
            --er-muted: #8794a7;
            --er-amber: #f59e0b;
            --er-green: #16a34a;
            --er-line: #e6ecf5;
            --er-bg: #f7f9ff;
            --er-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--er-body);
            background:
                radial-gradient(48% 40% at 82% 8%, var(--er-accent-soft) 0%, transparent 62%),
                radial-gradient(40% 34% at 6% 92%, #e7f8ee 0%, transparent 60%),
                var(--er-bg);
            overflow: hidden;
            position: relative;
        }

        .er-hero {
            min-height: calc(100dvh - 80px);
            display: flex;
            align-items: center;
            padding: clamp(7rem, 12vw, 9rem) 0 clamp(4rem, 8vw, 6rem);
            position: relative;
        }

        .er-wrap {
            width: min(760px, 90%);
            margin-inline: auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        /* ---- Código gigante com a pata no lugar do "0" ---- */
        .er-code {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: clamp(6px, 1.4vw, 14px);
            font-family: "Montserrat", sans-serif;
            font-weight: 800;
            font-size: clamp(5.5rem, 17vw, 10rem);
            line-height: 1;
            letter-spacing: -0.04em;
            color: var(--er-ink);
            margin-bottom: 28px;
            user-select: none;
        }

        .er-code .er-digit {
            background: linear-gradient(160deg, var(--er-ink) 0%, var(--er-accent) 120%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .er-mark {
            width: .9em;
            height: .9em;
            border-radius: 50%;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 24px 60px -24px rgba(23, 92, 221, .55),
                inset 0 0 0 4px var(--er-soft);
            animation: erFloat 4.5s ease-in-out infinite;
        }

        .er-mark svg {
            width: 46%;
            height: 46%;
            overflow: visible;
        }

        .er-mark .er-pad,
        .er-mark .er-toe {
            fill: var(--er-accent);
        }

        .er-mark .er-toe {
            transform-box: fill-box;
            transform-origin: 50% 45%;
            animation: erToe 2.6s cubic-bezier(.45, 0, .3, 1) infinite;
            animation-delay: calc(var(--i) * .32s);
        }

        /* ---- Texto ---- */
        .er-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--er-accent);
        }

        .er-eyebrow::before,
        .er-eyebrow::after {
            content: "";
            width: 30px;
            height: 2px;
            background: currentColor;
        }

        .er-page h1.er-title {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            color: var(--er-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
            font-size: clamp(1.8rem, 4.4vw, 2.8rem);
            margin: 18px 0 16px;
        }

        .er-lead {
            font-size: clamp(1rem, 2vw, 1.15rem);
            line-height: 1.78;
            max-width: 580px;
            margin: 0 auto;
        }

        .er-mark-text {
            color: var(--er-ink);
            font-weight: 600;
            background: linear-gradient(transparent 62%, color-mix(in srgb, var(--er-amber) 45%, transparent) 62%);
        }

        /* ---- Botões (mesmo padrão .sb-btn) ---- */
        .er-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 14px;
            margin-top: 36px;
        }

        .er-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .97rem;
            padding: 14px 26px;
            border-radius: 999px;
            border: 1.5px solid transparent;
            background: none;
            cursor: pointer;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .er-btn--primary {
            background: var(--er-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .er-btn--primary:hover {
            background: var(--er-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .er-btn--ghost {
            color: var(--er-ink);
            border-color: var(--er-line);
            background: #fff;
        }

        .er-btn--ghost:hover {
            border-color: var(--er-accent);
            color: var(--er-accent);
            transform: translateY(-3px);
        }

        /* ---- Atalhos (cards) ---- */
        .er-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 14px;
            margin-top: 48px;
            text-align: left;
        }

        .er-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 18px;
            border-radius: 14px;
            background: #fff;
            border: 1px solid var(--er-line);
            color: var(--er-ink);
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .92rem;
            box-shadow: var(--er-shadow-sm);
            transition: transform .2s ease, border-color .2s ease, color .2s ease;
        }

        .er-link i {
            width: 36px;
            height: 36px;
            flex: none;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: var(--er-accent-soft);
            color: var(--er-accent);
            font-size: 1.05rem;
        }

        .er-link:hover {
            color: var(--er-accent);
            border-color: var(--er-accent);
            transform: translateY(-3px);
        }

        /* ---- Trilha de patinhas atravessando o fundo ---- */
        .er-trail {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .er-trail span {
            position: absolute;
            left: calc(var(--x) * 1%);
            top: calc(var(--y) * 1%);
            color: var(--er-accent);
            font-size: 1.2rem;
            opacity: 0;
            transform: rotate(var(--r));
            animation: erStep 7s ease-in-out infinite;
            animation-delay: calc(var(--d) * 1s);
        }

        /* ---- Topo simples (quando o menu não é exibido) ---- */
        .er-topbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 18px 0;
        }

        .er-topbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .er-topbar .sitename {
            font-family: "Montserrat", sans-serif;
            font-size: 30px;
            font-weight: 600;
            margin: 0;
            color: #112344;
        }

        .er-detail {
            margin-top: 22px;
            font-size: .85rem;
            color: var(--er-muted);
        }

        @keyframes erFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-10px); }
        }

        @keyframes erToe {
            0%   { transform: rotate(var(--r, 0deg)) translateY(0) scale(1); }
            9%   { transform: rotate(var(--r, 0deg)) translateY(4px) scale(1.08, .72); }
            24%  { transform: rotate(var(--r, 0deg)) translateY(0) scale(1); }
            100% { transform: rotate(var(--r, 0deg)) translateY(0) scale(1); }
        }

        @keyframes erStep {
            0%, 100% { opacity: 0; }
            15%, 55% { opacity: .1; }
        }

        @media (max-width: 575px) {
            .er-actions .er-btn { width: 100%; justify-content: center; }
            .er-trail { display: none; }
        }

        @media (prefers-reduced-motion: reduce) {
            .er-mark,
            .er-mark .er-toe,
            .er-trail span { animation: none !important; }
            .er-trail span { opacity: .08; }
        }
    </style>
</head>

<body class="error-page">

    @include('partials.preloader')

    @if ($showNav)
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
    @endif

    <main class="main er-page">

        @unless ($showNav)
            <div class="er-topbar">
                <div class="container">
                    <a href="{{ url('/') }}" class="logo"><span class="sitename">Mobipet</span></a>
                </div>
            </div>
        @endunless

        {{-- Trilha de patinhas decorativa --}}
        <div class="er-trail" aria-hidden="true">
            <span style="--x:8;--y:22;--r:70deg;--d:0"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:12;--y:34;--r:100deg;--d:.6"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:7;--y:47;--r:80deg;--d:1.2"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:11;--y:60;--r:110deg;--d:1.8"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:88;--y:30;--r:-70deg;--d:3"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:92;--y:43;--r:-100deg;--d:3.6"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:87;--y:56;--r:-80deg;--d:4.2"><i class="fa-solid fa-paw"></i></span>
            <span style="--x:91;--y:69;--r:-110deg;--d:4.8"><i class="fa-solid fa-paw"></i></span>
        </div>

        <section class="er-hero">
            <div class="er-wrap">

                @php($code = trim($__env->yieldContent('code')))
                <div class="er-code" aria-label="Erro {{ $code }}">
                    @foreach (str_split($code) as $i => $char)
                        @if ($char === '0' && $i === 1)
                            <span class="er-mark" aria-hidden="true">
                                <svg viewBox="0 0 72 72">
                                    <path class="er-pad"
                                        d="M36 30c-10.6 0-19 7.9-19 17.4 0 6.7 4.6 10.6 11.4 10.6 3.8 0 6-1.6 7.6-1.6s3.8 1.6 7.6 1.6c6.8 0 11.4-3.9 11.4-10.6C55 37.9 46.6 30 36 30z" />
                                    <ellipse class="er-toe" style="--i:0; --r:-24deg" cx="16" cy="30" rx="6.6" ry="8.8" />
                                    <ellipse class="er-toe" style="--i:1; --r:-8deg" cx="29" cy="19" rx="6.6" ry="9" />
                                    <ellipse class="er-toe" style="--i:2; --r:8deg" cx="43" cy="19" rx="6.6" ry="9" />
                                    <ellipse class="er-toe" style="--i:3; --r:24deg" cx="56" cy="30" rx="6.6" ry="8.8" />
                                </svg>
                            </span>
                        @else
                            <span class="er-digit" aria-hidden="true">{{ $char }}</span>
                        @endif
                    @endforeach
                </div>

                <div>
                </div>

                <h1 class="er-title">@yield('heading')</h1>

                <p class="er-lead">@yield('message')</p>

                <div class="er-actions">
                    @hasSection('actions')
                        @yield('actions')
                    @else
                        <a href="{{ url('/') }}" class="er-btn er-btn--primary">
                            <i class="bi bi-house-door"></i> Voltar ao início
                        </a>
                        <button type="button" class="er-btn er-btn--ghost" data-er-back>
                            <i class="bi bi-arrow-left"></i> Página anterior
                        </button>
                    @endif
                </div>

                @yield('extra')

            </div>
        </section>

    </main>

    @if ($showNav)
        @include('partials.footer')
    @endif

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @if ($showNav)
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    @endif

    <script>
        // "Página anterior": volta no histórico ou, se não houver, vai para o início.
        document.querySelectorAll('[data-er-back]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if (window.history.length > 1 && document.referrer.indexOf(location.origin) === 0) {
                    window.history.back();
                } else {
                    window.location.href = @json(url('/'));
                }
            });
        });
    </script>

    @if ($showNav)
        @include('partials.logout-confirm')
    @endif

</body>

</html>
