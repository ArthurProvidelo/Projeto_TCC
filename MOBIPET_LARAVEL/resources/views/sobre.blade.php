<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sobre Nós | Mobipet</title>
    <meta name="description"
        content="Conheça o Mobipet: a plataforma que conecta tutores e petshops com agendamento digital e acompanhamento do banho e da tosa em tempo real.">
    <meta name="keywords" content="petshop, monitoramento pet, banho e tosa, agendamento pet, mobipet">

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
           PÁGINA SOBRE — MOBIPET  ·  estilos isolados (prefixo sb-)
           =========================================================== */
        .sb-page {
            --sb-accent: #175cdd;
            --sb-accent-dark: #0f47b3;
            --sb-accent-soft: #eaf1fe;
            --sb-ink: #0f1b34;
            --sb-body: #4a5568;
            --sb-muted: #8794a7;
            --sb-amber: #f59e0b;
            --sb-green: #16a34a;
            --sb-line: #e6ecf5;
            --sb-bg: #f7f9ff;
            --sb-radius: 24px;
            --sb-radius-sm: 14px;
            --sb-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --sb-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--sb-body);
            background: var(--sb-bg);
            overflow-x: clip;
        }

        .sb-page h1,
        .sb-page h2,
        .sb-page h3,
        .sb-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--sb-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        .sb-page p {
            line-height: 1.78;
        }

        .sb-wrap {
            width: min(1140px, 90%);
            margin-inline: auto;
        }

        .sb-narrow {
            width: min(720px, 90%);
            margin-inline: auto;
        }

        .sb-page section {
            padding: clamp(4rem, 9vw, 8rem) 0;
            position: relative;
        }

        /* ---- Barra de progresso de rolagem ---- */
        .sb-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--sb-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* ---- Rótulos de seção (eyebrow editorial) ---- */
        .sb-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--sb-accent);
        }

        .sb-eyebrow::before {
            content: "";
            width: 30px;
            height: 2px;
            background: currentColor;
        }

        .sb-eyebrow .sb-idx {
            color: var(--sb-muted);
            font-variant-numeric: tabular-nums;
        }

        .sb-h2 {
            font-size: clamp(1.9rem, 4.2vw, 3rem);
            margin: 22px 0 0;
        }

        .sb-lead {
            font-size: clamp(1.05rem, 2vw, 1.2rem);
            color: var(--sb-body);
        }

        .sb-mark {
            color: var(--sb-ink);
            font-weight: 600;
            background: linear-gradient(transparent 62%, color-mix(in srgb, var(--sb-amber) 45%, transparent) 62%);
        }

        /* ---- Botões ---- */
        .sb-btn {
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

        .sb-btn--primary {
            background: var(--sb-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .sb-btn--primary:hover {
            background: var(--sb-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .sb-btn--ghost {
            background: transparent;
            color: var(--sb-ink);
            border-color: var(--sb-line);
        }

        .sb-btn--ghost:hover {
            border-color: var(--sb-accent);
            color: var(--sb-accent);
            transform: translateY(-3px);
        }

        .sb-btn--light {
            background: #fff;
            color: var(--sb-accent);
        }

        .sb-btn--light:hover {
            color: var(--sb-accent-dark);
            transform: translateY(-3px);
        }

        /* ===================== HERO ===================== */
        .sb-hero {
            padding-bottom: clamp(3rem, 8vw, 6rem) !important;
            background:
                radial-gradient(48% 40% at 82% 8%, var(--sb-accent-soft) 0%, transparent 62%),
                radial-gradient(40% 34% at 6% 92%, #e7f8ee 0%, transparent 60%),
                var(--sb-bg);
            overflow: hidden;
        }

        .sb-hero-grid {
            display: grid;
            grid-template-columns: 1.12fr .88fr;
            gap: clamp(2rem, 5vw, 4rem);
            align-items: center;
        }

        .sb-hero h1 {
            font-size: clamp(2.4rem, 6vw, 4.1rem);
            font-weight: 800;
            margin: 26px 0 22px;
        }

        .sb-hero h1 .sb-grad {
            background: linear-gradient(120deg, var(--sb-accent), #3b82f6 55%, #4ade80);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .sb-hero p {
            font-size: clamp(1.05rem, 2vw, 1.22rem);
            max-width: 520px;
            margin-bottom: 30px;
        }

        .sb-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .sb-scrollcue {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 42px;
            font-size: .82rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--sb-muted);
            font-family: "Lato", sans-serif;
            font-weight: 700;
        }

        .sb-scrollcue i {
            animation: sb-bob 1.8s ease-in-out infinite;
        }

        @keyframes sb-bob {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(6px); }
        }

        /* Painel "ao vivo" do hero */
        .sb-live-card {
            position: relative;
            background: #fff;
            border: 1px solid var(--sb-line);
            border-radius: var(--sb-radius);
            box-shadow: var(--sb-shadow);
            padding: 26px;
        }

        .sb-live-card::after {
            content: "";
            position: absolute;
            inset: -40px -40px auto auto;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(74, 222, 128, .35), transparent 70%);
            filter: blur(10px);
            z-index: -1;
            animation: sb-glow 6s ease-in-out infinite alternate;
        }

        @keyframes sb-glow {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(-14px, 18px) scale(1.15); }
        }

        .sb-lc-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .sb-lc-head b {
            font-family: "Montserrat", sans-serif;
            font-size: .98rem;
            color: var(--sb-ink);
        }

        .sb-badge-live {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .06em;
            color: var(--sb-green);
            background: #e7f8ee;
            padding: 5px 11px;
            border-radius: 999px;
        }

        .sb-badge-live .sb-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--sb-green);
            animation: sb-pulse 2s infinite;
        }

        @keyframes sb-pulse {
            0% { box-shadow: 0 0 0 0 rgba(22, 163, 74, .5); }
            70% { box-shadow: 0 0 0 10px rgba(22, 163, 74, 0); }
            100% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0); }
        }

        .sb-steps {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sb-steps li {
            position: relative;
            padding: 0 0 20px 30px;
            font-size: .93rem;
            color: var(--sb-muted);
        }

        .sb-steps li:last-child {
            padding-bottom: 0;
        }

        .sb-steps li::before {
            content: "";
            position: absolute;
            left: 8px;
            top: 20px;
            bottom: -2px;
            width: 2px;
            background: var(--sb-line);
        }

        .sb-steps li:last-child::before {
            display: none;
        }

        .sb-steps li::after {
            content: "";
            position: absolute;
            left: 2px;
            top: 3px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid var(--sb-line);
        }

        .sb-steps li.is-done {
            color: var(--sb-body);
        }

        .sb-steps li.is-done::after {
            background: var(--sb-green);
            border-color: var(--sb-green);
        }

        .sb-steps li.is-now {
            color: var(--sb-accent);
            font-weight: 600;
        }

        .sb-steps li.is-now::after {
            background: var(--sb-accent);
            border-color: #fff;
            box-shadow: 0 0 0 4px rgba(23, 92, 221, .25);
            animation: sb-pulse 2s infinite;
        }

        /* ===================== MANIFESTO ===================== */
        .sb-manifesto {
            background:
                radial-gradient(40% 55% at 100% 50%, var(--sb-accent-soft), transparent 70%),
                #fff;
            border-top: 1px solid var(--sb-line);
        }

        .sb-mf {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: clamp(2.5rem, 6vw, 5rem);
            align-items: center;
        }

        .sb-mf-title {
            font-size: clamp(1.9rem, 4.2vw, 2.9rem);
            line-height: 1.18;
            margin: 0 0 18px;
        }

        /* Palavras-chave em azul, com marca-texto suave */
        .sb-mf-word {
            color: var(--sb-accent);
            background: linear-gradient(transparent 64%, var(--sb-accent-soft) 64%);
            border-radius: 4px;
            transition: background .35s ease, color .35s ease;
        }

        .sb-mf-text .sb-lead {
            max-width: 460px;
            margin: 0;
        }

        /* Mini visual: tutor e petshop sincronizados */
        .sb-sync {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 34px;
            max-width: 420px;
        }

        .sb-sync-node {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            background: var(--sb-accent-soft);
            color: var(--sb-accent);
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: .9rem;
            white-space: nowrap;
        }

        .sb-sync-node--shop {
            background: var(--sb-ink);
            color: #fff;
        }

        .sb-sync-line {
            flex: 1;
            height: 2px;
            position: relative;
            background: repeating-linear-gradient(90deg, color-mix(in srgb, var(--sb-accent) 25%, transparent) 0 6px, transparent 6px 12px);
        }

        .sb-sync-line span {
            position: absolute;
            top: 50%;
            left: 0;
            width: 8px;
            height: 8px;
            margin-top: -4px;
            border-radius: 50%;
            background: var(--sb-accent);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--sb-accent) 18%, transparent);
            animation: sb-sync 2.4s linear infinite;
        }

        .sb-sync-line span:nth-child(2) {
            animation-delay: .8s;
            animation-direction: reverse;
            background: var(--sb-ink);
            box-shadow: 0 0 0 4px rgba(15, 27, 52, .12);
        }

        .sb-sync-line span:nth-child(3) {
            animation-delay: 1.6s;
        }

        @keyframes sb-sync {
            0% {
                left: 0;
                opacity: 0;
            }

            15%,
            85% {
                opacity: 1;
            }

            100% {
                left: calc(100% - 8px);
                opacity: 0;
            }
        }

        /* Cards dos três pilares */
        .sb-mf-cards {
            display: grid;
            gap: 14px;
        }

        .sb-mf-card {
            position: relative;
            display: grid;
            grid-template-columns: 52px 1fr auto;
            gap: 18px;
            align-items: center;
            padding: 22px 24px;
            background: #fff;
            border: 1px solid var(--sb-line);
            border-radius: var(--sb-radius-sm);
            overflow: hidden;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s ease, border-color .3s ease;
        }

        /* Faixa azul que cresce na lateral ao passar o mouse */
        .sb-mf-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--sb-accent);
            transform: scaleY(0);
            transform-origin: center;
            transition: transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .sb-mf-card::after {
            content: attr(data-k);
            font-family: "Montserrat", sans-serif;
            font-weight: 800;
            font-size: 1.9rem;
            line-height: 1;
            color: var(--sb-accent-soft);
            transition: color .3s ease;
        }

        .sb-mf-cards .sb-mf-card[data-k].aos-animate:hover,
        .sb-mf-cards .sb-mf-card[data-k]:hover {
            transform: translateX(-6px);
            border-color: color-mix(in srgb, var(--sb-accent) 30%, transparent);
            box-shadow: 0 18px 40px -22px rgba(23, 92, 221, .55);
        }

        .sb-mf-card:hover::before {
            transform: scaleY(1);
        }

        .sb-mf-card:hover::after {
            color: color-mix(in srgb, var(--sb-accent) 30%, #fff);
        }

        .sb-mf-ico {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: var(--sb-accent-soft);
            color: var(--sb-accent);
            font-size: 1.45rem;
            transition: background .3s ease, color .3s ease, transform .35s cubic-bezier(.34, 1.56, .64, 1);
        }

        .sb-mf-card:hover .sb-mf-ico {
            background: var(--sb-accent);
            color: #fff;
            transform: rotate(-8deg) scale(1.05);
        }

        .sb-mf-card h3 {
            font-size: 1.08rem;
            margin: 0 0 4px;
        }

        .sb-mf-card p {
            margin: 0;
            font-size: .93rem;
            line-height: 1.55;
            color: var(--sb-body);
        }

        /* Passar o mouse no card destaca a palavra correspondente no título */
        .sb-mf:has(.sb-mf-card[data-k="1"]:hover) .sb-mf-word[data-k="1"],
        .sb-mf:has(.sb-mf-card[data-k="2"]:hover) .sb-mf-word[data-k="2"],
        .sb-mf:has(.sb-mf-card[data-k="3"]:hover) .sb-mf-word[data-k="3"] {
            color: #fff;
            background: linear-gradient(var(--sb-accent), var(--sb-accent));
            box-shadow: 0 0 0 4px var(--sb-accent);
        }

        @media (prefers-reduced-motion: reduce) {
            .sb-sync-line span {
                animation: none;
                left: calc(50% - 4px);
            }

            .sb-sync-line span:nth-child(n+2) {
                display: none;
            }
        }

        /* ===================== O PROBLEMA (seção escura) ===================== */
        .sb-problem {
            background-color: #0f1b34;
            background-image:
                radial-gradient(60% 50% at 100% 0%, rgba(23, 92, 221, .28), transparent 60%),
                linear-gradient(180deg, #0f1b34 0%, #101d3a 100%);
            color: rgba(255, 255, 255, .72);
        }

        .sb-problem h2,
        .sb-problem .sb-big {
            color: #fff;
        }

        .sb-problem .sb-eyebrow {
            color: #7db0ff;
        }

        .sb-problem .sb-eyebrow .sb-idx {
            color: rgba(255, 255, 255, .4);
        }

        .sb-problem-lead {
            font-size: clamp(1.05rem, 2vw, 1.2rem);
            color: rgba(255, 255, 255, .72);
            max-width: 620px;
            margin-top: 20px;
        }

        .sb-pain-list {
            margin-top: 56px;
            display: grid;
            gap: 0;
        }

        .sb-pain {
            display: grid;
            grid-template-columns: 90px 1fr;
            gap: 24px;
            padding: 34px 0;
            border-top: 1px solid rgba(255, 255, 255, .12);
            align-items: start;
        }

        .sb-pain:last-child {
            border-bottom: 1px solid rgba(255, 255, 255, .12);
        }

        .sb-pain .sb-pnum {
            font-family: "Montserrat", sans-serif;
            font-weight: 800;
            font-size: 2.4rem;
            color: rgba(255, 255, 255, .18);
            line-height: 1;
        }

        .sb-pain h3 {
            color: #fff;
            font-size: 1.3rem;
            margin: 0 0 8px;
        }

        .sb-pain p {
            margin: 0;
            color: rgba(255, 255, 255, .66);
            max-width: 560px;
        }

        .sb-pain:hover .sb-pnum {
            color: #4ade80;
            transition: color .3s ease;
        }

        /* ===================== A VIRADA (antes / depois) ===================== */
        .sb-turn {
            background: #fff;
        }

        .sb-compare {
            display: grid;
            grid-template-columns: 1fr 64px 1fr;
            gap: 0;
            margin-top: 56px;
            align-items: stretch;
        }

        .sb-col {
            border: 1px solid var(--sb-line);
            border-radius: var(--sb-radius);
            padding: 34px;
        }

        .sb-col--before {
            background: #f4f5f7;
        }

        .sb-col--after {
            background: linear-gradient(180deg, var(--sb-accent-soft), #fff);
            border-color: color-mix(in srgb, var(--sb-accent) 30%, transparent);
            box-shadow: var(--sb-shadow-sm);
        }

        .sb-col h3 {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin: 0 0 22px;
        }

        .sb-col--before h3 {
            color: var(--sb-muted);
        }

        .sb-col--after h3 {
            color: var(--sb-accent);
        }

        .sb-col ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sb-col li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: .98rem;
        }

        .sb-col--before li {
            color: #7a828e;
        }

        .sb-col--after li {
            color: var(--sb-ink);
            font-weight: 500;
        }

        .sb-col li i {
            flex: none;
            margin-top: 2px;
            font-size: 1.05rem;
        }

        .sb-col--before li i {
            color: #b6bcc5;
        }

        .sb-col--after li i {
            color: var(--sb-green);
        }

        .sb-arrow {
            display: grid;
            place-items: center;
            font-size: 1.4rem;
            color: var(--sb-accent);
        }

        .sb-arrow i {
            animation: sb-slide 1.8s ease-in-out infinite;
        }

        @keyframes sb-slide {
            0%, 100% { transform: translateX(-4px); }
            50% { transform: translateX(4px); }
        }

        /* ===================== COMO FUNCIONA ===================== */
        .sb-how {
            background: var(--sb-bg);
        }

        .sb-flow {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-top: 58px;
            position: relative;
        }

        .sb-flow::before {
            content: "";
            position: absolute;
            top: 27px;
            left: 11%;
            right: 11%;
            height: 2px;
            background: repeating-linear-gradient(90deg, var(--sb-line) 0 8px, transparent 8px 16px);
        }

        .sb-node {
            position: relative;
            text-align: center;
        }

        .sb-node .sb-nring {
            width: 56px;
            height: 56px;
            margin: 0 auto 20px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #fff;
            border: 2px solid var(--sb-line);
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            color: var(--sb-accent);
            transition: .25s ease;
        }

        .sb-node:hover .sb-nring {
            background: var(--sb-accent);
            border-color: var(--sb-accent);
            color: #fff;
            transform: translateY(-5px);
        }

        .sb-node h3 {
            font-size: 1.05rem;
            margin-bottom: 6px;
        }

        .sb-node p {
            font-size: .92rem;
            margin: 0;
        }

        /* ===================== VALORES (sticky) ===================== */
        .sb-values {
            background: #fff;
        }

        .sb-values-grid {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: clamp(2rem, 6vw, 5rem);
            align-items: start;
        }

        .sb-values-aside {
            position: sticky;
            top: 120px;
        }

        .sb-value {
            display: grid;
            grid-template-columns: 56px 1fr;
            gap: 22px;
            padding: 34px 0;
            border-top: 1px solid var(--sb-line);
        }

        .sb-value:first-child {
            padding-top: 0;
            border-top: 0;
        }

        .sb-value .sb-vico {
            width: 56px;
            height: 56px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: var(--sb-accent-soft);
            color: var(--sb-accent);
            font-size: 1.5rem;
        }

        .sb-value h3 {
            font-size: 1.22rem;
            margin: 4px 0 8px;
        }

        .sb-value p {
            margin: 0;
            max-width: 520px;
        }

        /* ===================== PÚBLICO ===================== */
        .sb-aud {
            background: var(--sb-bg);
        }

        .sb-aud-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 26px;
            margin-top: 54px;
        }

        .sb-audcard {
            border-radius: var(--sb-radius);
            padding: 38px;
            border: 1px solid var(--sb-line);
            background: #fff;
        }

        .sb-audcard--dark {
            background: var(--sb-ink);
            border-color: var(--sb-ink);
        }

        .sb-audcard-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .sb-audcard-top .sb-af {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: var(--sb-accent-soft);
            color: var(--sb-accent);
            font-size: 1.4rem;
        }

        .sb-audcard--dark .sb-af {
            background: rgba(255, 255, 255, .1);
            color: #7db0ff;
        }

        .sb-audcard h3 {
            margin: 0;
            font-size: 1.28rem;
        }

        .sb-audcard--dark h3 {
            color: #fff;
        }

        .sb-audcard ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .sb-audcard li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: .97rem;
            color: var(--sb-body);
        }

        .sb-audcard--dark li {
            color: rgba(255, 255, 255, .8);
        }

        .sb-audcard li i {
            flex: none;
            margin-top: 3px;
            color: var(--sb-green);
        }

        .sb-audcard--dark li i {
            color: #4ade80;
        }

        /* ===================== TIME / QUEM CONSTRÓI ===================== */
        .sb-team {
            background: #fff;
            text-align: center;
        }

        .sb-team .sb-h2 {
            margin-top: 18px;
        }

        .sb-team p {
            max-width: 560px;
            margin: 16px auto 30px;
        }

        /* ===================== CTA FINAL ===================== */
        .sb-cta {
            background: var(--sb-bg);
        }

        .sb-cta-card {
            border-radius: clamp(24px, 4vw, 42px);
            padding: clamp(3rem, 8vw, 5.5rem) clamp(1.5rem, 5vw, 4rem);
            text-align: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--sb-accent), var(--sb-accent-dark));
        }

        .sb-cta-card h2 {
            color: #fff;
            font-size: clamp(1.8rem, 4.4vw, 2.8rem);
            margin-bottom: 14px;
        }

        .sb-cta-card p {
            color: rgba(255, 255, 255, .85);
            font-size: 1.1rem;
            max-width: 540px;
            margin: 0 auto 32px;
        }

        .sb-cta-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            justify-content: center;
        }

        /* ===================== RESPONSIVO ===================== */
        @media (max-width: 991px) {

            .sb-hero-grid,
            .sb-values-grid,
            .sb-aud-grid,
            .sb-mf {
                grid-template-columns: 1fr;
            }

            .sb-values-aside {
                position: static;
            }

            .sb-flow {
                grid-template-columns: repeat(2, 1fr);
            }

            .sb-flow::before {
                display: none;
            }

            .sb-compare {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .sb-arrow {
                transform: rotate(90deg);
            }
        }

        @media (max-width: 575px) {
            .sb-flow {
                grid-template-columns: 1fr;
            }

            .sb-pain {
                grid-template-columns: 60px 1fr;
                gap: 16px;
            }

            .sb-audcard,
            .sb-col {
                padding: 26px;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {
            .sb-page *,
            .sb-page *::before,
            .sb-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }

        /* ---- Footer criativo (reaproveitado do padrão do site) ---- */
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

        .footer-16 .contact-info {
            margin-top: 24px;
        }
    </style>
</head>

<body class="about-page">

    @include('partials.preloader')


    <div class="sb-progress" id="sbProgress"></div>

    <header id="header" class="header fixed-top">

        <!-- Scroll Top -->
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

    <main class="main sb-page">

        <!-- ================= HERO ================= -->
        <section class="sb-hero">
            <div class="sb-wrap">
                <div class="sb-hero-grid">

                    <div data-aos="fade-right">
                        <h1>
                            Seu pet bem cuidado e
                            <span class="sb-grad">você tranquilo do início ao fim.</span>
                        </h1>
                        <p>
                            Acompanhe cada etapa do atendimento em tempo real e saiba que seu pet está
                            bem sem ligações, sem espera e sem incerteza.
                        </p>

                        <div class="sb-hero-actions">
                            <a href="{{ route('services') }}" class="sb-btn sb-btn--primary">
                                Ver os serviços <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="{{ route('agendamento') }}" class="sb-btn sb-btn--ghost">
                                <i class="bi bi-calendar-check"></i> Agendar agora
                            </a>
                        </div>
                    </div>

                    <div class="sb-live-card" data-aos="fade-left" data-aos-delay="150">
                        <div class="sb-lc-head">
                            <b>Thor &middot; Banho &amp; Tosa</b>
                            <span class="sb-badge-live"><span class="sb-dot"></span> AO VIVO</span>
                        </div>
                        <ul class="sb-steps">
                            <li class="is-done">Agendamento confirmado</li>
                            <li class="is-done">Pet recebido no petshop</li>
                            <li class="is-now">Banho em andamento</li>
                            <li>Tosa e finalização</li>
                            <li>Pronto para retirada</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= MANIFESTO ================= -->
        <section class="sb-manifesto">
            <div class="sb-wrap sb-mf">

                <div class="sb-mf-text" data-aos="fade-right">
                    <h2 class="sb-mf-title">
                        Banho e tosa
                        <span class="sb-mf-word" data-k="1">mais rápido</span>,
                        <span class="sb-mf-word" data-k="2">organizado</span> e
                        <span class="sb-mf-word" data-k="3">transparente</span>.
                    </h2>
                    <p class="sb-lead">
                        Tutor e petshop veem a mesma informação, ao mesmo tempo. Sem ligações e sem
                        &ldquo;já está pronto?&rdquo;.
                    </p>

                    <div class="sb-sync" aria-hidden="true">
                        <div class="sb-sync-node">
                            <i class="bi bi-person-heart"></i>
                            <span>Tutor</span>
                        </div>
                        <div class="sb-sync-line">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="sb-sync-node sb-sync-node--shop">
                            <i class="bi bi-shop"></i>
                            <span>Petshop</span>
                        </div>
                    </div>
                </div>

                <div class="sb-mf-cards">
                    <div class="sb-mf-card" data-k="1" data-aos="fade-left" data-aos-delay="0">
                        <div class="sb-mf-ico"><i class="bi bi-lightning-charge"></i></div>
                        <div>
                            <h3>Rápido</h3>
                            <p>Agende em poucos cliques, a qualquer hora do dia.</p>
                        </div>
                    </div>
                    <div class="sb-mf-card" data-k="2" data-aos="fade-left" data-aos-delay="100">
                        <div class="sb-mf-ico"><i class="bi bi-calendar2-week"></i></div>
                        <div>
                            <h3>Organizado</h3>
                            <p>Agenda, pets e histórico de serviços em um só lugar.</p>
                        </div>
                    </div>
                    <div class="sb-mf-card" data-k="3" data-aos="fade-left" data-aos-delay="200">
                        <div class="sb-mf-ico"><i class="bi bi-broadcast"></i></div>
                        <div>
                            <h3>Transparente</h3>
                            <p>Cada etapa do atendimento aparece para o tutor em tempo real.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ================= O PROBLEMA ================= -->
        <section class="sb-problem">
            <div class="sb-wrap">
                <div data-aos="fade-up">
                    <h2 class="sb-h2">Deixar o pet no petshop virava um exercício de paciência.</h2>
                    <p class="sb-problem-lead">
                        Marcar horário dependia de telefone e mensagem. Acompanhar o atendimento,
                        então, era impossível: o tutor só descobria o que aconteceu na hora de buscar.
                    </p>
                </div>

                <div class="sb-pain-list">
                    <div class="sb-pain" data-aos="fade-up">
                        <div class="sb-pnum">01</div>
                        <div>
                            <h3>Agendamento demorado</h3>
                            <p>Ligações que ninguém atende, mensagens sem resposta e horários
                                marcados no caderno &mdash; com risco de conflito e esquecimento.</p>
                        </div>
                    </div>
                    <div class="sb-pain" data-aos="fade-up" data-aos-delay="80">
                        <div class="sb-pnum">02</div>
                        <div>
                            <h3>Falta de transparência</h3>
                            <p>O tutor não sabia se o pet já tinha sido atendido, se estava no
                                banho ou apenas esperando a vez.</p>
                        </div>
                    </div>
                    <div class="sb-pain" data-aos="fade-up" data-aos-delay="160">
                        <div class="sb-pnum">03</div>
                        <div>
                            <h3>Comunicação limitada</h3>
                            <p>Informações desencontradas e a necessidade constante de ligar de
                                novo para o estabelecimento só para ter notícias.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= A VIRADA ================= -->
        <section class="sb-turn" id="sb-turn">
            <div class="sb-wrap">
                <div class="sb-narrow" style="margin-inline:0;" data-aos="fade-up">
                    <h2 class="sb-h2">A mesma rotina, agora sob controle.</h2>
                    <p class="sb-lead" style="margin-top:18px;">
                        O que era incerteza vira acompanhamento. O que era ligação vira notificação.
                    </p>
                </div>

                <div class="sb-compare">
                    <div class="sb-col sb-col--before" data-aos="fade-right">
                        <h3>Antes</h3>
                        <ul>
                            <li><i class="bi bi-x-circle"></i> Ligar várias vezes para marcar</li>
                            <li><i class="bi bi-x-circle"></i> Não saber em que etapa o pet está</li>
                            <li><i class="bi bi-x-circle"></i> Descobrir tudo só na retirada</li>
                            <li><i class="bi bi-x-circle"></i> Histórico de serviços na memória</li>
                        </ul>
                    </div>
                    <div class="sb-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
                    <div class="sb-col sb-col--after" data-aos="fade-left">
                        <h3>Depois</h3>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Agendar em segundos, a qualquer hora</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ver cada etapa acontecer em tempo real</li>
                            <li><i class="bi bi-check-circle-fill"></i> Receber aviso automático a cada mudança</li>
                            <li><i class="bi bi-check-circle-fill"></i> Histórico completo salvo na plataforma</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- ================= VALORES ================= -->
        <section class="sb-values" id="sb-values">
            <div class="sb-wrap">
                <div class="sb-values-grid">

                    <div class="sb-values-aside" data-aos="fade-up">
                        <h2 class="sb-h2" style="margin-top:20px;">Princípios que guiam cada tela do Mobipet.</h2>
                    </div>

                    <div>
                        <div class="sb-value" data-aos="fade-up">
                            <div class="sb-vico"><i class="bi bi-eye"></i></div>
                            <div>
                                <h3>Transparência</h3>
                                <p>Tutor e petshop veem a mesma informação, ao mesmo tempo. Nada
                                    de "achismo" sobre o que está acontecendo com o pet.</p>
                            </div>
                        </div>
                        <div class="sb-value" data-aos="fade-up">
                            <div class="sb-vico"><i class="bi bi-magic"></i></div>
                            <div>
                                <h3>Simplicidade</h3>
                                <p>Agendar tem que ser mais fácil do que ligar. Cada fluxo é
                                    pensado para resolver em poucos toques.</p>
                            </div>
                        </div>
                        <div class="sb-value" data-aos="fade-up">
                            <div class="sb-vico"><i class="bi bi-heart-pulse"></i></div>
                            <div>
                                <h3>Cuidado</h3>
                                <p>A tecnologia existe para dar tranquilidade a quem ama o pet e
                                    organização a quem cuida dele todos os dias.</p>
                            </div>
                        </div>
                        <div class="sb-value" data-aos="fade-up">
                            <div class="sb-vico"><i class="bi bi-universal-access-circle"></i></div>
                            <div>
                                <h3>Acessibilidade</h3>
                                <p>Interface clara e tradução automática para Libras (VLibras),
                                    para que a plataforma sirva a todo mundo.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= PÚBLICO ================= -->
        <section class="sb-aud" id="sb-aud">
            <div class="sb-wrap">
                <div data-aos="fade-up" style="max-width:640px;">
                    <h2 class="sb-h2">Os dois lados do balcão, no mesmo sistema.</h2>
                </div>

                <div class="sb-aud-grid">
                    <div class="sb-audcard" data-aos="fade-up">
                        <div class="sb-audcard-top">
                            <span class="sb-af"><i class="bi bi-heart"></i></span>
                            <h3>Para os tutores</h3>
                        </div>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Agendamento online 24 horas</li>
                            <li><i class="bi bi-check-circle-fill"></i> Acompanhamento de cada etapa em tempo real</li>
                            <li><i class="bi bi-check-circle-fill"></i> Notificações automáticas a cada atualização</li>
                            <li><i class="bi bi-check-circle-fill"></i> Histórico completo dos atendimentos do pet</li>
                            <li><i class="bi bi-check-circle-fill"></i> Menos ligações, mais tranquilidade</li>
                        </ul>
                    </div>

                    <div class="sb-audcard sb-audcard--dark" data-aos="fade-up" data-aos-delay="120">
                        <div class="sb-audcard-top">
                            <span class="sb-af"><i class="bi bi-shop"></i></span>
                            <h3>Para o petshop</h3>
                        </div>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Agenda centralizada, sem conflito de horário</li>
                            <li><i class="bi bi-check-circle-fill"></i> Painel único de clientes, pets e serviços</li>
                            <li><i class="bi bi-check-circle-fill"></i> Menos ligações e mensagens no balcão</li>
                            <li><i class="bi bi-check-circle-fill"></i> Fluxo de atendimento visual e organizado</li>
                            <li><i class="bi bi-check-circle-fill"></i> Mais produtividade e melhor experiência do cliente</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= QUEM CONSTRÓI ================= -->
        <section class="sb-team">
            <div class="sb-wrap" data-aos="fade-up">
                <h2 class="sb-h2">Um produto feito por seis desenvolvedores.</h2>
                <p>
                    O Mobipet é desenvolvido por um time enxuto que cuida de cada detalhe do
                    agendamento, do monitoramento e da gestão &mdash; da API ao aplicativo.
                </p>
                <a href="{{ route('devs') }}" class="sb-btn sb-btn--ghost">
                    <i class="bi bi-people"></i> Conhecer o time
                </a>
            </div>
        </section>

        <!-- ================= CTA FINAL ================= -->
        <section class="sb-cta">
            <div class="sb-wrap">
                <div class="sb-cta-card" data-aos="zoom-in">
                    <h2>Pronto para acompanhar o próximo atendimento do seu pet?</h2>
                    <p>Agende em segundos e veja cada etapa acontecer.</p>
                    <div class="sb-cta-actions">
                        <a href="{{ route('agendamento') }}" class="sb-btn sb-btn--light">
                            Agendar agora <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="https://wa.me/5519989432384" class="sb-btn sb-btn--ghost"
                            style="color:#fff;border-color:rgba(255,255,255,.4);" target="_blank" rel="noopener">
                            <i class="bi bi-whatsapp"></i> Falar no WhatsApp
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
            var bar = document.getElementById('sbProgress');
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
