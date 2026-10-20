<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Serviços | Mobipet</title>
    <meta name="description"
        content="Banho, tosa, hidratação e mais — todos os serviços do petshop com agendamento digital e acompanhamento de cada etapa em tempo real pelo Mobipet.">
    <meta name="keywords" content="banho e tosa, serviços petshop, hidratação pet, agendamento pet, mobipet">

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
           PÁGINA SERVIÇOS — MOBIPET  ·  estilos isolados (prefixo sv-)
           =========================================================== */
        .sv-page {
            --sv-accent: #175cdd;
            --sv-accent-dark: #0f47b3;
            --sv-accent-soft: #eaf1fe;
            --sv-ink: #0f1b34;
            --sv-body: #4a5568;
            --sv-muted: #8794a7;
            --sv-amber: #f59e0b;
            --sv-green: #16a34a;
            --sv-line: #e6ecf5;
            --sv-bg: #f7f9ff;
            --sv-radius: 24px;
            --sv-radius-sm: 14px;
            --sv-shadow-sm: 0 10px 30px -14px rgba(15, 27, 52, .2);
            --sv-shadow: 0 40px 90px -40px rgba(23, 92, 221, .4);

            font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--sv-body);
            background: var(--sv-bg);
            overflow-x: clip;
        }

        .sv-page h1,
        .sv-page h2,
        .sv-page h3,
        .sv-page h4 {
            font-family: "Montserrat", sans-serif;
            color: var(--sv-ink);
            letter-spacing: -0.022em;
            line-height: 1.12;
        }

        .sv-page p {
            line-height: 1.78;
        }

        .sv-wrap {
            width: min(1140px, 90%);
            margin-inline: auto;
        }

        .sv-page section {
            padding: clamp(4rem, 9vw, 8rem) 0;
            position: relative;
        }

        /* Barra de progresso de rolagem */
        .sv-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, var(--sv-accent), #4ade80);
            z-index: 1100;
            transition: width .12s linear;
        }

        /* Rótulo de seção */
        .sv-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-size: .78rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--sv-accent);
        }

        .sv-eyebrow::before {
            content: "";
            width: 30px;
            height: 2px;
            background: currentColor;
        }

        .sv-eyebrow .sv-idx {
            color: var(--sv-muted);
            font-variant-numeric: tabular-nums;
        }

        .sv-h2 {
            font-size: clamp(1.9rem, 4.2vw, 3rem);
            margin: 22px 0 0;
        }

        .sv-lead {
            font-size: clamp(1.05rem, 2vw, 1.2rem);
            color: var(--sv-body);
        }

        .sv-mark {
            color: var(--sv-ink);
            font-weight: 600;
            background: linear-gradient(transparent 62%, color-mix(in srgb, var(--sv-amber) 45%, transparent) 62%);
        }

        /* Botões */
        .sv-btn {
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

        .sv-btn--primary {
            background: var(--sv-accent);
            color: #fff;
            box-shadow: 0 18px 34px -16px rgba(23, 92, 221, .75);
        }

        .sv-btn--primary:hover {
            background: var(--sv-accent-dark);
            color: #fff;
            transform: translateY(-3px);
        }

        .sv-btn--ghost {
            background: transparent;
            color: var(--sv-ink);
            border-color: var(--sv-line);
        }

        .sv-btn--ghost:hover {
            border-color: var(--sv-accent);
            color: var(--sv-accent);
            transform: translateY(-3px);
        }

        .sv-btn--light {
            background: #fff;
            color: var(--sv-accent);
        }

        .sv-btn--light:hover {
            color: var(--sv-accent-dark);
            transform: translateY(-3px);
        }

        /* ===================== HERO ===================== */
        .sv-hero {
            padding-bottom: clamp(3rem, 8vw, 6rem) !important;
            background:
                radial-gradient(48% 40% at 84% 6%, var(--sv-accent-soft) 0%, transparent 62%),
                radial-gradient(40% 34% at 4% 94%, #e7f8ee 0%, transparent 60%),
                var(--sv-bg);
            overflow: hidden;
        }

        .sv-hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: clamp(2rem, 5vw, 4rem);
            align-items: center;
        }

        .sv-hero h1 {
            font-size: clamp(2.3rem, 5.6vw, 3.9rem);
            font-weight: 800;
            margin: 26px 0 20px;
        }

        .sv-hero h1 .sv-grad {
            background: linear-gradient(120deg, var(--sv-accent), #3b82f6 55%, #4ade80);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .sv-hero p {
            font-size: clamp(1.05rem, 2vw, 1.2rem);
            max-width: 500px;
            margin-bottom: 28px;
        }

        .sv-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .sv-hero-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 26px;
        }

        .sv-chip {
            font-size: .82rem;
            font-weight: 600;
            color: var(--sv-ink);
            background: #fff;
            border: 1px solid var(--sv-line);
            padding: 7px 14px;
            border-radius: 999px;
        }

        .sv-chip i {
            color: var(--sv-accent);
            margin-right: 6px;
        }

        /* Painel dashboard do hero */
        .sv-dash {
            position: relative;
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: var(--sv-radius);
            box-shadow: var(--sv-shadow);
            padding: 26px;
        }

        .sv-dash::after {
            content: "";
            position: absolute;
            inset: -44px -44px auto auto;
            width: 170px;
            height: 170px;
            background: radial-gradient(circle, rgba(74, 222, 128, .32), transparent 70%);
            filter: blur(10px);
            z-index: -1;
            animation: sv-glow 6s ease-in-out infinite alternate;
        }

        @keyframes sv-glow {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(-14px, 18px) scale(1.15); }
        }

        .sv-dash-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .sv-dash-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 1.6rem;
            background: var(--sv-accent-soft);
            color: var(--sv-accent);
            flex: none;
            overflow: hidden;
            /* Moldura: anel branco + um fio na cor da marca, como um avatar de verdade */
            border: 2px solid #fff;
            box-shadow: 0 0 0 2px var(--sv-accent-soft), var(--sv-shadow-sm);
        }

        .sv-dash-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Zoom só no rosto do cachorro — a foto original é corpo inteiro */
            transform: scale(2.3);
            transform-origin: 50% 18%;
        }

        .sv-dash-top b {
            display: block;
            font-family: "Montserrat", sans-serif;
            color: var(--sv-ink);
            font-size: 1.05rem;
        }

        .sv-dash-top span {
            font-size: .85rem;
            color: var(--sv-muted);
        }

        .sv-badge-live {
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .06em;
            color: var(--sv-green);
            background: #e7f8ee;
            padding: 5px 11px;
            border-radius: 999px;
            flex: none;
        }

        .sv-badge-live .sv-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--sv-green);
            animation: sv-pulse 2s infinite;
        }

        @keyframes sv-pulse {
            0% { box-shadow: 0 0 0 0 rgba(22, 163, 74, .5); }
            70% { box-shadow: 0 0 0 10px rgba(22, 163, 74, 0); }
            100% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0); }
        }

        .sv-bar-head {
            display: flex;
            justify-content: space-between;
            font-size: .82rem;
            font-weight: 600;
            color: var(--sv-body);
            margin-bottom: 8px;
        }

        .sv-bar {
            height: 10px;
            border-radius: 999px;
            background: #eef1f6;
            overflow: hidden;
        }

        .sv-bar > span {
            display: block;
            height: 100%;
            width: 68%;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--sv-accent), #4f8cff);
            animation: sv-fill 2.6s ease-in-out infinite alternate;
        }

        @keyframes sv-fill {
            from { width: 62%; }
            to { width: 74%; }
        }

        .sv-mini-tl {
            list-style: none;
            margin: 22px 0 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sv-mini-tl li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            background: #f6f8fc;
            font-size: .9rem;
            color: var(--sv-muted);
            border: 1px solid transparent;
        }

        .sv-mini-tl li i {
            font-size: 1.05rem;
        }

        .sv-mini-tl li.done {
            color: var(--sv-body);
            background: #eafaf0;
        }

        .sv-mini-tl li.done i {
            color: var(--sv-green);
        }

        .sv-mini-tl li.now {
            color: var(--sv-accent);
            font-weight: 600;
            background: var(--sv-accent-soft);
            border-color: color-mix(in srgb, var(--sv-accent) 20%, transparent);
        }

        .sv-mini-tl li.now i {
            color: var(--sv-accent);
        }

        .sv-eta {
            margin-top: 18px;
            background: var(--sv-ink);
            border-radius: 18px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }

        .sv-eta small {
            color: rgba(255, 255, 255, .6);
            display: block;
        }

        .sv-eta b {
            font-family: "Montserrat", sans-serif;
            font-size: 1.5rem;
        }

        /* ===================== COMO O MOBIPET CUIDA DO ATENDIMENTO ===================== */
        .sv-catalog {
            background: #fff;
            border-top: 1px solid var(--sv-line);
        }

        .sv-pillars {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-top: 54px;
            position: relative;
        }

        /* Linha pontilhada ligando as quatro etapas */
        .sv-pillars::before {
            content: "";
            position: absolute;
            top: 136px;
            left: 8%;
            right: 8%;
            height: 2px;
            background: repeating-linear-gradient(90deg, color-mix(in srgb, var(--sv-accent) 35%, transparent) 0 8px, transparent 8px 16px);
            z-index: 0;
        }

        .sv-pillar {
            position: relative;
            z-index: 1;
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: var(--sv-radius);
            padding: 18px 18px 30px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s ease, border-color .3s ease;
        }

        .sv-pillars .sv-pillar[data-aos].aos-animate:hover,
        .sv-pillars .sv-pillar:hover {
            transform: translateY(-8px);
            box-shadow: var(--sv-shadow);
            border-color: transparent;
        }

        .sv-pillar--main {
            border-color: color-mix(in srgb, var(--sv-accent) 30%, transparent);
            box-shadow: 0 24px 60px -34px rgba(23, 92, 221, .45);
        }

        /* Mini-tela ilustrativa de cada etapa */
        .sv-mock {
            height: 118px;
            border-radius: 16px;
            background: var(--sv-bg);
            border: 1px solid var(--sv-line);
            padding: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            overflow: hidden;
        }

        .sv-mock small {
            font-size: .78rem;
            color: var(--sv-muted);
        }

        .sv-slots {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .sv-slots span {
            padding: 6px 10px;
            border-radius: 9px;
            background: #fff;
            border: 1px solid var(--sv-line);
            font-size: .8rem;
            font-weight: 600;
            color: var(--sv-ink);
            transition: transform .3s ease;
        }

        .sv-slots .is-picked {
            background: var(--sv-accent);
            border-color: var(--sv-accent);
            color: #fff;
            box-shadow: 0 8px 18px -8px var(--sv-accent);
        }

        .sv-slots .is-off {
            color: var(--sv-muted);
            text-decoration: line-through;
            opacity: .6;
        }

        .sv-pillar:hover .sv-slots .is-picked {
            transform: scale(1.08);
        }

        .sv-mock-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: .9rem;
            color: var(--sv-ink);
        }

        .sv-live {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--sv-green);
        }

        .sv-live .sv-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--sv-green);
            animation: sv-pulse 2s infinite;
        }

        .sv-track {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 5px;
        }

        .sv-track span {
            height: 6px;
            border-radius: 99px;
            background: var(--sv-line);
        }

        .sv-track .is-done {
            background: var(--sv-accent);
        }

        .sv-track .is-now {
            background: linear-gradient(90deg, var(--sv-accent) 0 50%, var(--sv-line) 50%);
            background-size: 200% 100%;
            animation: sv-track 2.2s ease-in-out infinite alternate;
        }

        @keyframes sv-track {
            from { background-position: 100% 0; }
            to { background-position: 30% 0; }
        }

        .sv-toast {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: 14px;
            padding: 12px 14px;
            box-shadow: var(--sv-shadow-sm);
            transition: transform .35s cubic-bezier(.34, 1.56, .64, 1);
        }

        .sv-toast i {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: var(--sv-accent-soft);
            color: var(--sv-accent);
            flex: 0 0 auto;
        }

        .sv-toast b {
            display: block;
            font-size: .88rem;
            color: var(--sv-ink);
            line-height: 1.2;
        }

        .sv-pillar:hover .sv-toast {
            transform: translateY(-4px) rotate(-1.5deg);
        }

        .sv-pillar:hover .sv-toast i {
            animation: sv-ring .6s ease;
        }

        @keyframes sv-ring {
            0%, 100% { transform: rotate(0); }
            25% { transform: rotate(-14deg); }
            50% { transform: rotate(12deg); }
            75% { transform: rotate(-6deg); }
        }

        /* Número da etapa, sobre a linha pontilhada */
        .sv-step {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            margin: -17px auto 0;
            position: relative;
            border-radius: 50%;
            background: #fff;
            border: 2px solid var(--sv-accent);
            color: var(--sv-accent);
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: .9rem;
            transition: background .3s ease, color .3s ease;
        }

        .sv-pillar:hover .sv-step,
        .sv-pillar--main .sv-step {
            background: var(--sv-accent);
            color: #fff;
        }

        .sv-pillar h3 {
            font-size: 1.15rem;
            margin: 16px 12px 8px;
            text-align: center;
        }

        .sv-pillar p {
            margin: 0 12px;
            font-size: .94rem;
            text-align: center;
            color: var(--sv-body);
        }

        @media (prefers-reduced-motion: reduce) {
            .sv-track .is-now,
            .sv-live .sv-dot,
            .sv-pillar:hover .sv-toast i {
                animation: none;
            }
        }

        /* ===================== ACOMPANHAMENTO (split) ===================== */
        .sv-track {
            background: var(--sv-bg);
        }

        .sv-track-grid {
            display: grid;
            grid-template-columns: .92fr 1.08fr;
            gap: clamp(2rem, 6vw, 4.5rem);
            align-items: center;
        }

        .sv-track-figure {
            position: relative;
            border-radius: var(--sv-radius);
            overflow: hidden;
            border: 6px solid #fff;
            box-shadow: var(--sv-shadow);
            aspect-ratio: 5 / 4;
        }

        .sv-track-figure img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .sv-track-figure .sv-tag {
            position: absolute;
            left: 16px;
            bottom: 16px;
            background: rgba(255, 255, 255, .95);
            border-radius: 12px;
            padding: 10px 14px;
            font-size: .82rem;
            font-weight: 600;
            color: var(--sv-ink);
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--sv-shadow-sm);
        }

        .sv-track-figure .sv-tag i {
            color: var(--sv-accent);
        }

        .sv-stage-list {
            list-style: none;
            margin: 34px 0 0;
            padding: 0;
            position: relative;
        }

        .sv-stage-list li {
            position: relative;
            padding: 0 0 22px 34px;
            font-size: 1rem;
            color: var(--sv-body);
        }

        .sv-stage-list li:last-child {
            padding-bottom: 0;
        }

        .sv-stage-list li::before {
            content: "";
            position: absolute;
            left: 9px;
            top: 20px;
            bottom: -4px;
            width: 2px;
            background: var(--sv-line);
        }

        .sv-stage-list li:last-child::before {
            display: none;
        }

        .sv-stage-list li::after {
            content: "";
            position: absolute;
            left: 3px;
            top: 3px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid var(--sv-accent);
        }

        .sv-stage-list li b {
            color: var(--sv-ink);
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
        }

        .sv-stage-list li span {
            display: block;
            font-size: .88rem;
            color: var(--sv-muted);
        }

        /* ===================== NOTIFICAÇÕES (dark) ===================== */
        .sv-notif {
            background-color: #0f1b34;
            background-image: radial-gradient(60% 50% at 100% 0%, rgba(23, 92, 221, .28), transparent 60%);
            color: rgba(255, 255, 255, .74);
        }

        .sv-notif h2,
        .sv-notif .sv-lead {
            color: #fff;
        }

        .sv-notif .sv-eyebrow {
            color: #7db0ff;
        }

        .sv-notif .sv-eyebrow .sv-idx {
            color: rgba(255, 255, 255, .4);
        }

        .sv-notif-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(2rem, 6vw, 4.5rem);
            align-items: center;
            margin-top: 20px;
        }

        .sv-notif p.sv-lead {
            max-width: 460px;
        }

        .sv-phone {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 26px;
            padding: 26px;
            backdrop-filter: blur(4px);
        }

        .sv-phone .sv-ph-head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 16px;
            margin-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
            color: #fff;
            font-weight: 600;
            font-size: .92rem;
        }

        .sv-phone .sv-ph-head .sv-wpp {
            width: 30px;
            height: 30px;
            border-radius: 9px;
            display: grid;
            place-items: center;
            background: #25d366;
            color: #05231a;
        }

        .sv-bubble {
            background: #fff;
            color: var(--sv-ink);
            border-radius: 4px 16px 16px 16px;
            padding: 12px 15px;
            font-size: .9rem;
            margin-bottom: 12px;
            max-width: 90%;
            box-shadow: 0 10px 24px -14px rgba(0, 0, 0, .5);
        }

        .sv-bubble:last-child {
            margin-bottom: 0;
        }

        .sv-bubble time {
            display: block;
            font-size: .72rem;
            color: var(--sv-muted);
            margin-top: 4px;
        }

        .sv-bubble b {
            font-family: "Montserrat", sans-serif;
        }

        /* ===================== DIFERENCIAIS ===================== */
        .sv-diff {
            background: var(--sv-bg);
        }

        .sv-diff-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 52px;
        }

        .sv-diff-item {
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: var(--sv-radius-sm);
            padding: 26px;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .sv-diff-item:hover {
            transform: translateY(-6px);
            box-shadow: var(--sv-shadow-sm);
        }

        .sv-diff-item i {
            font-size: 1.5rem;
            color: var(--sv-accent);
        }

        .sv-diff-item h3 {
            font-size: 1.02rem;
            margin: 14px 0 6px;
        }

        .sv-diff-item p {
            font-size: .9rem;
            margin: 0;
            color: var(--sv-body);
        }

        /* ===================== FAQ ===================== */
        .sv-faq {
            background:
                radial-gradient(45% 60% at 0% 100%, var(--sv-accent-soft), transparent 70%),
                linear-gradient(180deg, #fff 0%, var(--sv-bg) 100%);
        }

        .sv-faq-grid {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: clamp(2.5rem, 6vw, 5rem);
            align-items: start;
        }

        /* Coluna esquerda fica presa enquanto a pessoa rola as perguntas */
        .sv-faq-side {
            position: sticky;
            top: 110px;
        }

        .sv-faq-side .sv-lead {
            margin: 16px 0 0;
        }

        .sv-help {
            margin-top: 32px;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 14px 16px;
            align-items: center;
            padding: 22px;
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: var(--sv-radius-sm);
            box-shadow: var(--sv-shadow-sm);
        }

        .sv-help-ico {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--sv-accent-soft);
            color: var(--sv-accent);
            font-size: 1.3rem;
        }

        .sv-help b {
            display: block;
            font-family: "Montserrat", sans-serif;
            color: var(--sv-ink);
        }

        .sv-help span {
            font-size: .9rem;
            color: var(--sv-muted);
        }

        .sv-help-links {
            grid-column: 1 / -1;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .sv-help-links a {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: .88rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--sv-accent);
            background: var(--sv-accent-soft);
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }

        .sv-help-links a:hover {
            background: var(--sv-accent);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Lista de perguntas em cards */
        .sv-faq-list {
            display: grid;
            gap: 12px;
        }

        .sv-faq-list details {
            background: #fff;
            border: 1px solid var(--sv-line);
            border-radius: var(--sv-radius-sm);
            transition: border-color .3s ease, box-shadow .3s ease;
        }

        .sv-faq-list details:hover {
            border-color: color-mix(in srgb, var(--sv-accent) 30%, transparent);
        }

        .sv-faq-list details[open] {
            border-color: color-mix(in srgb, var(--sv-accent) 40%, transparent);
            box-shadow: 0 20px 44px -28px rgba(23, 92, 221, .45);
        }

        .sv-faq-list summary {
            list-style: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 22px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: 1.02rem;
            color: var(--sv-ink);
            border-radius: var(--sv-radius-sm);
        }

        .sv-faq-list summary::-webkit-details-marker {
            display: none;
        }

        .sv-faq-list summary:focus-visible {
            outline: 3px solid color-mix(in srgb, var(--sv-accent) 45%, transparent);
            outline-offset: 2px;
        }

        .sv-q-ico {
            width: 40px;
            height: 40px;
            flex: none;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--sv-bg);
            color: var(--sv-accent);
            font-size: 1.1rem;
            transition: background .3s ease, color .3s ease;
        }

        .sv-faq-list details[open] .sv-q-ico {
            background: var(--sv-accent);
            color: #fff;
        }

        .sv-q-text {
            flex: 1;
        }

        .sv-q-toggle {
            width: 32px;
            height: 32px;
            flex: none;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--sv-accent-soft);
            color: var(--sv-accent);
            transition: transform .35s cubic-bezier(.34, 1.56, .64, 1), background .3s ease;
        }

        .sv-faq-list details[open] .sv-q-toggle {
            transform: rotate(45deg);
        }

        .sv-answer {
            overflow: hidden;
        }

        .sv-answer p {
            margin: 0;
            padding: 0 22px 22px 78px;
            color: var(--sv-body);
        }

        @media (max-width: 991px) {
            .sv-faq-grid {
                grid-template-columns: 1fr;
            }

            .sv-faq-side {
                position: static;
            }
        }

        @media (max-width: 575px) {
            .sv-answer p {
                padding-left: 22px;
            }

            .sv-q-ico {
                display: none;
            }
        }

        /* ===================== CTA ===================== */
        .sv-cta {
            background: var(--sv-bg);
        }

        .sv-cta-card {
            border-radius: clamp(24px, 4vw, 42px);
            padding: clamp(3rem, 8vw, 5.5rem) clamp(1.5rem, 5vw, 4rem);
            text-align: center;
            color: #fff;
            background:
                radial-gradient(46% 130% at 100% 0%, rgba(255, 255, 255, .16), transparent 60%),
                linear-gradient(135deg, var(--sv-accent), var(--sv-accent-dark));
        }

        .sv-cta-card h2 {
            color: #fff;
            font-size: clamp(1.8rem, 4.4vw, 2.8rem);
            margin-bottom: 14px;
        }

        .sv-cta-card p {
            color: rgba(255, 255, 255, .85);
            font-size: 1.1rem;
            max-width: 540px;
            margin: 0 auto 32px;
        }

        .sv-cta-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            justify-content: center;
        }

        /* ===================== RESPONSIVO ===================== */
        @media (max-width: 991px) {

            .sv-hero-grid,
            .sv-track-grid,
            .sv-notif-grid {
                grid-template-columns: 1fr;
            }

            .sv-pillars,
            .sv-diff-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .sv-pillars::before {
                display: none;
            }
        }

        @media (max-width: 575px) {

            .sv-pillars,
            .sv-diff-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (prefers-reduced-motion: reduce) and (max-width: 1px) {
            .sv-page *,
            .sv-page *::before,
            .sv-page *::after {
                animation: none !important;
                transition: none !important;
            }
        }

        /* ---- Footer criativo (padrão do site) ---- */
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

<body class="index-page">

    @include('partials.preloader')


    <div class="sv-progress" id="svProgress"></div>

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

    <main class="main sv-page">

        <!-- ================= HERO ================= -->
        <section class="sv-hero">
            <div class="sv-wrap">
                <div class="sv-hero-grid">

                    <div data-aos="fade-right">
                        <h1>
                            Todo cuidado do petshop, <span class="sv-grad">acompanhado etapa por etapa.</span>
                        </h1>
                        <p>
                            Banho, tosa, hidratação e mais agendados em segundos e
                            acompanhados em tempo real, do check-in ao "pode buscar".
                        </p>

                        <div class="sv-hero-actions">
                            <a href="{{ route('agendamento') }}" class="sv-btn sv-btn--primary">
                                Agendar um serviço <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#sv-catalogo" class="sv-btn sv-btn--ghost">
                                <i class="bi bi-play-circle"></i> Como funciona
                            </a>
                        </div>
                    </div>

                    <div class="sv-dash" data-aos="fade-left" data-aos-delay="150">
                        <div class="sv-dash-top">
                            <span class="sv-dash-avatar"><img src="{{ asset('assets/img/rex.jpg') }}" alt="Rex"></span>
                            <div>
                                <b>Rex &middot; Banho &amp; Tosa</b>
                                <span>Hoje, 09:00</span>
                            </div>
                            <span class="sv-badge-live"><span class="sv-dot"></span> EM ATENDIMENTO</span>
                        </div>

                        <div class="sv-bar-head">
                            <span>Progresso do atendimento</span>
                            <span>68%</span>
                        </div>
                        <div class="sv-bar"><span></span></div>

                        <ul class="sv-mini-tl">
                            <li class="done"><i class="bi bi-check-circle-fill"></i> Recepção concluída</li>
                            <li class="done"><i class="bi bi-check-circle-fill"></i> Banho finalizado</li>
                            <li class="now"><i class="bi bi-arrow-repeat"></i> Secagem em andamento</li>
                            <li><i class="bi bi-clock"></i> Tosa aguardando</li>
                        </ul>

                        <div class="sv-eta">
                            <div>
                                <small>Tempo estimado restante</small>
                                <span>Atualização automática</span>
                            </div>
                            <b>15 min</b>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= CATÁLOGO ================= -->
        <section class="sv-catalog" id="sv-catalogo">
            <div class="sv-wrap">
                <div data-aos="fade-up" style="max-width:640px;">
                    <h2 class="sv-h2">Do horário marcado ao &ldquo;pode buscar&rdquo;</h2>
                    <p class="sv-lead" style="margin-top:18px;">
                        O petshop cuida do seu pet. O Mobipet cuida de manter você por dentro
                        de tudo, sem precisar ligar.
                    </p>
                </div>

                <div class="sv-pillars">
                    <!-- 1. Escolha o serviço -->
                    <article class="sv-pillar" data-aos="fade-up" data-aos-delay="0">
                        <div class="sv-mock" aria-hidden="true">
                            <small>Qual serviço?</small>
                            <div class="sv-slots">
                                <span class="is-picked">Banho</span>
                                <span>Tosa</span>
                                <span>Consulta</span>
                            </div>
                        </div>
                        <span class="sv-step">1</span>
                        <h3>Escolha o serviço</h3>
                        <p>Banho, tosa ou consulta, direto na tela inicial.</p>
                    </article>

                    <!-- 2. Agende online -->
                    <article class="sv-pillar" data-aos="fade-up" data-aos-delay="80">
                        <div class="sv-mock" aria-hidden="true">
                            <small>Quinta, 12 de março</small>
                            <div class="sv-slots">
                                <span>09:00</span>
                                <span class="is-picked">10:30</span>
                                <span class="is-off">13:00</span>
                            </div>
                        </div>
                        <span class="sv-step">2</span>
                        <h3>Agende online</h3>
                        <p>Selecione o dia e o horário que forem melhores para você.</p>
                    </article>

                    <!-- 3. Acompanhe em tempo real -->
                    <article class="sv-pillar sv-pillar--main" data-aos="fade-up" data-aos-delay="160">
                        <div class="sv-mock" aria-hidden="true">
                            <div class="sv-mock-row">
                                <b>Rex</b>
                                <span class="sv-live"><span class="sv-dot"></span> ao vivo</span>
                            </div>
                            <div class="sv-track">
                                <span class="is-done"></span>
                                <span class="is-done"></span>
                                <span class="is-now"></span>
                                <span></span>
                            </div>
                            <small>Banho em andamento</small>
                        </div>
                        <span class="sv-step">3</span>
                        <h3>Acompanhe em tempo real</h3>
                        <p>Veja cada etapa avançar e receba avisos automáticos.</p>
                    </article>

                    <!-- 4. Retire seu pet -->
                    <article class="sv-pillar" data-aos="fade-up" data-aos-delay="240">
                        <div class="sv-mock" aria-hidden="true">
                            <div class="sv-toast">
                                <i class="bi bi-bell-fill"></i>
                                <div>
                                    <b>Rex está pronto!</b>
                                    <small>Pode vir buscar</small>
                                </div>
                            </div>
                        </div>
                        <span class="sv-step">4</span>
                        <h3>Retire seu pet</h3>
                        <p>Você recebe o aviso de "pronto" e o histórico fica salvo.</p>
                    </article>
                </div>
            </div>
        </section>

       
        <!-- ================= NOTIFICAÇÕES ================= -->
        <!-- <section class="sv-notif">
            <div class="sv-wrap">
                <div class="sv-notif-grid">

                    <div data-aos="fade-right">
                        <h2 class="sv-h2">Um aviso automático a cada mudança de etapa</h2>
                        <p class="sv-lead" style="margin-top:16px;">
                            Nada de ficar atualizando a tela. Quando o serviço avança, a
                            notificação chega até você, inclusive quando o pet está
                            pronto para buscar.
                        </p>
                    </div>

                    <div class="sv-phone" data-aos="fade-left" data-aos-delay="120">
                        <div class="sv-ph-head">
                            <span class="sv-wpp"><i class="bi bi-whatsapp"></i></span>
                            Mobipet &middot; Atendimento do Rex
                        </div>
                        <div class="sv-bubble" data-aos="fade-up" data-aos-delay="150">
                            <b>Rex</b> deu entrada no petshop 
                            <time>09:42</time>
                        </div>
                        <div class="sv-bubble" data-aos="fade-up" data-aos-delay="250">
                            Banho iniciado 🛁
                            <time>10:05</time>
                        </div>
                        <div class="sv-bubble" data-aos="fade-up" data-aos-delay="350">
                            Secagem em andamento —- tempo estimado 15 min
                            <time>10:38</time>
                        </div>
                        <div class="sv-bubble" data-aos="fade-up" data-aos-delay="450">
                            ✅ <b>Rex está pronto para retirada!</b>
                            <time>10:59</time>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->

        <!-- ================= DIFERENCIAIS ================= -->
        <section class="sv-diff">
            <div class="sv-wrap">
                <div data-aos="fade-up" style="max-width:640px;">
                    <h2 class="sv-h2">O serviço é o mesmo. <br>A experiência, não.</h2>
                </div>

                <div class="sv-diff-grid">
                    <div class="sv-diff-item" data-aos="fade-up" data-aos-delay="0">
                        <i class="bi bi-eye"></i>
                        <h3>Transparência</h3>
                        <p>Você enxerga o mesmo status que o petshop, em tempo real.</p>
                    </div>
                    <div class="sv-diff-item" data-aos="fade-up" data-aos-delay="80">
                        <i class="bi bi-telephone-x"></i>
                        <h3>Sem ligações</h3>
                        <p>As atualizações chegam sozinhas; não precisa cobrar notícias.</p>
                    </div>
                    <div class="sv-diff-item" data-aos="fade-up" data-aos-delay="160">
                        <i class="bi bi-calendar2-week"></i>
                        <h3>Agenda organizada</h3>
                        <p>Horários sem conflito e lembrete do compromisso.</p>
                    </div>
                    <div class="sv-diff-item" data-aos="fade-up" data-aos-delay="240">
                        <i class="bi bi-clock-history"></i>
                        <h3>Histórico completo</h3>
                        <p>Tudo o que foi feito fica registrado para consultar depois.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= CTA ================= -->
        <section class="sv-cta">
            <div class="sv-wrap">
                <div class="sv-cta-card" data-aos="zoom-in">
                    <h2>Escolha um serviço <br>e acompanhe do início ao fim</h2>
                    <p>Agende em segundos e receba o aviso quando <br> seu pet estiver pronto.</p>
                    <div class="sv-cta-actions">
                        <a href="{{ route('agendamento') }}" class="sv-btn sv-btn--light">
                            Agendar agora <i class="bi bi-arrow-right"></i>
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
            var bar = document.getElementById('svProgress');
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

        /* FAQ: abre e fecha com animação suave, uma pergunta por vez */
        (function () {
            var items = Array.prototype.slice.call(document.querySelectorAll('.sv-faq-list details'));
            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!items.length || reduce || !Element.prototype.animate) return;

            var ease = 'cubic-bezier(.22, 1, .36, 1)';

            var close = function (d) {
                var body = d.querySelector('.sv-answer');
                var anim = body.animate(
                    [{ height: body.offsetHeight + 'px', opacity: 1 }, { height: '0px', opacity: 0 }],
                    { duration: 280, easing: ease }
                );
                d.classList.add('is-closing');
                anim.onfinish = function () {
                    d.open = false;
                    d.classList.remove('is-closing');
                };
            };

            var open = function (d) {
                d.open = true;
                var body = d.querySelector('.sv-answer');
                body.animate(
                    [{ height: '0px', opacity: 0 }, { height: body.offsetHeight + 'px', opacity: 1 }],
                    { duration: 380, easing: ease }
                );
            };

            items.forEach(function (d) {
                d.querySelector('summary').addEventListener('click', function (e) {
                    e.preventDefault();
                    if (d.classList.contains('is-closing')) return;
                    if (d.open) {
                        close(d);
                    } else {
                        items.forEach(function (o) {
                            if (o !== d && o.open && !o.classList.contains('is-closing')) close(o);
                        });
                        open(d);
                    }
                });
            });
        })();
    </script>

    @include('partials.logout-confirm')

</body>

</html>
