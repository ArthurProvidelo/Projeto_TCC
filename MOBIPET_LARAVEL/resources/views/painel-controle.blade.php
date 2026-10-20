<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel de Controle | Mobipet</title>

    <meta name="description"
        content="Painel administrativo do Mobipet para gerenciamento de agendamentos, funcionários e serviços.">

    @include('partials.favicon')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #3b82f6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;

            --text: #111827;
            --text-light: #6b7280;

            --border: #e5e7eb;

            --card-radius: 28px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;

            background:
                radial-gradient(circle at top right, #dbeafe 0%, transparent 30%),
                radial-gradient(circle at bottom left, #e0f2fe 0%, transparent 35%),
                #f8fafc;

            color: var(--text);

            overflow-x: hidden;
        }

        .main {
            padding-top: 165px;
        }

        .dashboard-hero {
            padding: 20px 0 70px;
        }

        .hero-card {
            background: white;
            border-radius: 35px;
            padding: 45px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .06);
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #2563eb, #60a5fa);
            opacity: .08;
            border-radius: 50%;
            right: -130px;
            top: -150px;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #1d4ed8, #38bdf8);
            opacity: .06;
            border-radius: 50%;
            left: -80px;
            bottom: -120px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 12px;
            color: #111827;
            letter-spacing: -1px;
        }

        .hero-title span {
            color: var(--primary);
        }

        .hero-description {
            font-size: 18px;
            line-height: 1.8;
            max-width: 700px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        .dashboard-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #eff6ff;
            color: #2563eb;
            padding: 12px 22px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
        }

        .dashboard-badge i {
            font-size: 18px;
        }

        .hero-actions {
            margin-top: 35px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-dashboard {
            padding: 15px 28px;
            border-radius: 16px;
            font-weight: 700;
            transition: .30s;
            border: none;
        }

        .btn-dashboard-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .btn-dashboard-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, .25);
        }

        .btn-dashboard-outline {
            background: white;
            border: 2px solid #dbeafe;
            color: #2563eb;
        }

        .btn-dashboard-outline:hover {
            background: #eff6ff;
        }

        /* ===========================================================
           CARDS KPI
        =========================================================== */

        .kpi-card {
            position: relative;
            overflow: hidden;
            border: none;
            border-radius: 28px;
            padding: 32px;
            background: white;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .06);
            transition: .35s;
            height: 100%;
        }

        .kpi-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(37, 99, 235, .12);
        }

        .kpi-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #2563eb, #38bdf8);
        }

        .kpi-icon {
            width: 72px;
            height: 72px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 22px;
            color: #fff;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            box-shadow: 0 10px 25px rgba(37, 99, 235, .25);
        }

        .kpi-value {
            font-size: 42px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
            color: #111827;
        }

        .kpi-title {
            font-size: 15px;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 0;
        }

        .kpi-growth {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 18px;
            padding: 8px 14px;
            border-radius: 30px;
            background: #f0fdf4;
            color: #16a34a;
            font-size: 13px;
            font-weight: 700;
        }

        /* ===========================================================
           SEÇÕES
        =========================================================== */

        .dashboard-section {
            margin-top: 55px;
        }

        .section-title {
            font-size: 34px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
            letter-spacing: -.5px;
        }

        .section-description {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        /* ===========================================================
           CARD PADRÃO
        =========================================================== */

        .dashboard-card {
            background: #fff;
            border: none;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .05);
            overflow: hidden;
        }

        .dashboard-card-header {
            padding: 35px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }

        .dashboard-card-header h3 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .dashboard-card-header p {
            margin-top: 5px;
            margin-bottom: 0;
            opacity: .85;
            font-size: 14px;
        }

        .header-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .15);
            font-size: 28px;
        }

        /* ===========================================================
           TABELA
        =========================================================== */

        .table-dashboard {
            margin: 0;
            vertical-align: middle;
        }

        .table-dashboard thead th {
            padding: 22px;
            background: #f8fafc;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
            color: #6b7280;
            border: none;
        }

        .table-dashboard tbody td {
            padding: 24px 22px;
            border-top: 1px solid #eef2f7;
        }

        .table-dashboard tbody tr {
            transition: .25s;
        }

        .table-dashboard tbody tr:hover {
            background: #f8fbff;
        }

        .pet-avatar {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #2563eb;
            font-size: 22px;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .pet-info {
            display: flex;
            align-items: center;
        }

        .pet-info strong {
            display: block;
            font-size: 16px;
        }

        .pet-info small {
            color: #6b7280;
        }

        /* ===========================================================
           BADGES DE STATUS
        =========================================================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .status-pendente {
            background: #fff7e6;
            color: #d97706;
            border: 1px solid #fde68a;
        }

        .status-concluido {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .status-cancelado {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .status-andamento {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        /* ===========================================================
           SELO DE STATUS AO VIVO (tabela de últimos agendamentos)
        =========================================================== */

        .status-live {
            gap: 8px;
            max-width: 100%;
            white-space: nowrap;
            transition: background-color .35s, color .35s, border-color .35s;
        }

        .status-live-icone {
            font-size: 13px;
        }

        .status-live-texto {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Em atendimento: ícone da etapa pulsa, indicando que está ao vivo */
        .status-live.status-andamento .status-live-icone {
            animation: status-live-pulso 1.8s ease-in-out infinite;
        }

        @keyframes status-live-pulso {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .45;
            }
        }

        /* Destaque rápido quando o status muda (RFID, app ou painel) */
        .status-live.status-live-mudou {
            animation: status-live-destaque 1.6s ease;
        }

        @keyframes status-live-destaque {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, .45);
                transform: scale(1.06);
            }

            100% {
                box-shadow: 0 0 0 10px rgba(37, 99, 235, 0);
                transform: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .status-live.status-andamento .status-live-icone,
            .status-live.status-live-mudou {
                animation: none;
            }
        }

        /* ===========================================================
           CARD DE ETAPAS DO ATENDIMENTO (esteira, igual ao app mobile)
        =========================================================== */

        .attendance-card {
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .06);
            transition: .3s;
        }

        .attendance-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 24px 55px rgba(37, 99, 235, .10);
        }

        .attendance-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .attendance-avatar {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .attendance-title {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .attendance-title strong {
            font-size: 17px;
            color: #111827;
        }

        .attendance-title span {
            font-size: 14px;
            color: #2563eb;
            font-weight: 600;
        }

        .attendance-progress {
            margin-bottom: 18px;
        }

        .attendance-progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .attendance-percent {
            color: #111827;
            font-size: 14px;
            flex-shrink: 0;
        }

        .progress-track {
            width: 100%;
            height: 8px;
            background: #f1f5f9;
            border-radius: 50px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 50px;
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
            transition: width .4s ease;
        }

        .current-stage-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
            background: #eff6ff;
            color: #2563eb;
            font-weight: 700;
            font-size: 13px;
            padding: 8px 16px;
            border-radius: 50px;
            margin-bottom: 24px;
        }

        .stage-timeline {
            list-style: none;
            margin: 0 0 24px;
            padding: 0;
        }

        .stage-item {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding-bottom: 22px;
            cursor: pointer;
        }

        .stage-item:last-child {
            padding-bottom: 0;
        }

        .stage-item::before {
            content: "";
            position: absolute;
            left: 15px;
            top: 32px;
            bottom: -4px;
            width: 2px;
            background: #e5e7eb;
        }

        .stage-item:last-child::before {
            display: none;
        }

        .stage-item.stage-done::before {
            background: #2563eb;
        }

        .stage-icon {
            position: relative;
            z-index: 1;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            background: #f9fafb;
            color: #9ca3af;
            border: 2px solid #e5e7eb;
            transition: .25s;
        }

        .stage-item.stage-done .stage-icon {
            background: #2563eb;
            color: #fff;
            border-color: #2563eb;
        }

        .stage-item.stage-current .stage-icon {
            background: #2563eb;
            color: #fff;
            border-color: #bfdbfe;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .15);
        }

        .stage-item:hover .stage-icon {
            transform: scale(1.08);
        }

        .stage-item:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 4px;
            border-radius: 8px;
        }

        .stage-text {
            display: flex;
            flex-direction: column;
            padding-top: 4px;
            min-width: 0;
        }

        .stage-label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .stage-item.stage-pending .stage-label {
            color: #9ca3af;
            font-weight: 500;
        }

        .stage-item.stage-current .stage-label {
            color: #111827;
        }

        .stage-sublabel {
            font-size: 12px;
            font-weight: 700;
            color: #f59e0b;
            margin-top: 2px;
        }

        .attendance-advance-btn {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            border-radius: 16px;
            border: 2px solid #dbeafe;
            background: #fff;
            color: #2563eb;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: .25s;
        }

        .attendance-advance-btn:hover:not(:disabled) {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .attendance-advance-btn:disabled {
            opacity: .5;
            cursor: not-allowed;
        }

        .attendance-advance-btn.is-checkin {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .attendance-advance-btn.is-checkin:hover:not(:disabled) {
            background: #1d4ed8;
        }

        /* Check-in e Finalizado não são linhas de servico_etapas: não dá
           para clicar nelas, só chegar pelo botão. */
        .stage-item.stage-fixa {
            cursor: default;
        }

        .stage-item.stage-fixa:hover .stage-icon {
            transform: none;
        }

        /* ===========================================================
           BOTÕES DE AÇÃO
        =========================================================== */

        .btn-action {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            transition: .30s;
            cursor: pointer;
        }

        .btn-view {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-view:hover {
            background: #2563eb;
            color: #fff;
            transform: translateY(-3px);
        }

        .btn-edit {
            background: #fef3c7;
            color: #d97706;
        }

        .btn-edit:hover {
            background: #d97706;
            color: #fff;
            transform: translateY(-3px);
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: #fff;
            transform: translateY(-3px);
        }

        /* ===========================================================
           AÇÕES RÁPIDAS
        =========================================================== */

        .quick-card {
            background: #fff;
            border-radius: 24px;
            padding: 30px;
            text-align: center;
            border: 1px solid #eef2f7;
            transition: .35s;
            height: 100%;
            cursor: pointer;
        }

        .quick-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 45px rgba(37, 99, 235, .12);
            border-color: #dbeafe;
        }

        .quick-icon {
            width: 75px;
            height: 75px;
            margin: auto;
            margin-bottom: 22px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
            font-size: 30px;
            box-shadow: 0 12px 28px rgba(37, 99, 235, .20);
        }

        .quick-card h5 {
            font-weight: 700;
            margin-bottom: 10px;
            color: #111827;
        }

        .quick-card p {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ===========================================================
           EMPTY STATE
        =========================================================== */

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 120px;
            height: 120px;
            margin: auto;
            margin-bottom: 25px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #9ca3af;
        }

        .empty-state h4 {
            font-weight: 800;
            margin-bottom: 12px;
        }

        .empty-state p {
            max-width: 500px;
            margin: auto;
            color: #6b7280;
            line-height: 1.8;
        }

        /* ===========================================================
           FOOTER
        =========================================================== */

        .footer-dashboard {
            margin-top: 90px;
            padding: 40px 0;
            text-align: center;
            color: #94a3b8;
            font-size: 15px;
        }

        /* ===========================================================
           SCROLLBAR
        =========================================================== */

        ::-webkit-scrollbar {
            width: 9px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* ===========================================================
           RESPONSIVO
        =========================================================== */
        @media (max-width: 991.98px) {
            .main {
                padding-top: 130px;
            }

            .hero-card {
                padding: 32px;
                border-radius: 26px;
            }

            .hero-title {
                font-size: 34px;
                letter-spacing: -.5px;
            }

            .hero-description {
                font-size: 16px;
                line-height: 1.7;
                margin-bottom: 26px;
            }

            .section-title {
                font-size: 27px;
            }

            .dashboard-section {
                margin-top: 42px;
            }

            .dashboard-card-header {
                padding: 26px;
            }

            .dashboard-card-header h3 {
                font-size: 22px;
            }

            .kpi-card {
                padding: 26px;
            }

            .kpi-value {
                font-size: 34px;
            }

            .attendance-card {
                padding: 24px;
            }
        }

        @media (max-width: 575.98px) {
            .main {
                padding-top: 116px;
            }

            .hero-card {
                padding: 24px;
            }

            .hero-title {
                font-size: 27px;
            }

            .hero-actions {
                gap: 10px;
            }

            .hero-actions .btn-dashboard {
                width: 100%;
                text-align: center;
            }

            .attendance-card {
                padding: 20px;
                border-radius: 20px;
            }

            .attendance-avatar {
                width: 44px;
                height: 44px;
                font-size: 18px;
                border-radius: 14px;
            }

            .attendance-title strong {
                font-size: 16px;
            }

            .current-stage-pill {
                font-size: 12px;
                padding: 7px 14px;
            }

            .stage-label {
                font-size: 13px;
            }

            .attendance-advance-btn {
                font-size: 13px;
                padding: 12px;
            }

            .dashboard-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                text-align: left;
            }

            .kpi-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
                border-radius: 18px;
            }

            .section-title {
                font-size: 24px;
            }

            /* Tabela empilhada (usa os data-label já presentes no markup) */
            .table-dashboard thead {
                display: none;
            }

            .table-dashboard tbody tr {
                display: block;
                border: 1px solid var(--border);
                border-radius: 18px;
                padding: 8px 14px;
                margin-bottom: 14px;
            }

            .table-dashboard tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 14px;
                padding: 10px 0 !important;
                border: none !important;
                text-align: right;
            }

            .table-dashboard tbody td::before {
                content: attr(data-label);
                font-weight: 700;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: .04em;
                color: var(--text-light);
                text-align: left;
            }

            .table-dashboard tbody td .pet-info,
            .table-dashboard tbody td .d-flex {
                justify-content: flex-end;
            }

            .table-dashboard .status-live {
                white-space: normal;
                text-align: right;
            }
        }
    </style>

</head>

<body class="index-page">

    @include('partials.preloader')


    <!-- =========================================================
    HEADER
    ========================================================== -->
    <header id="header" class="header fixed-top">

        <!-- Top Bar -->


        <!-- Scroll Top -->
        <a href="#" id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center text-white bg-primary rounded-circle shadow"
            style="width:50px;height:50px;position:fixed;bottom:20px;right:20px;z-index:999;font-size:24px;">

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
    MAIN
    ========================================================== -->

    <main class="main">

        <!-- HERO -->

        <section class="dashboard-hero py-4">

            <div class="container">

                <div class="hero-card">

                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div>

                            <span class="dashboard-badge mb-2 d-inline-flex">
                                <i class="fa-solid fa-shield-dog me-2"></i>
                                Painel Administrativo
                            </span>

                            <h2 class="hero-title mb-2">
                                Olá, <span>{{ session('nome') }}</span>
                            </h2>

                            <p class="hero-description mb-0">
                                Bem-vindo ao painel de controle dos funcionários. Gerencie agendamentos, serviços e
                                acompanhe as atividades do petshop.
                            </p>

                        </div>

                        <div class="mt-3 mt-lg-0">

                            <a href="{{ route('funcionario.agendamentos') }}"
                                class="btn btn-dashboard btn-dashboard-primary">

                                <i class="fa-solid fa-calendar-check me-2"></i>
                                Agendamentos

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- KPIs -->
        <section class="dashboard-section">

            <div class="container">

                <div class="row g-4">
                    <!-- ============================
                        CARD 01
                    ============================= -->

                    <div class="col-lg-3 col-md-6">

                        <div class="kpi-card">

                            <div class="kpi-icon">

                                <i class="fa-solid fa-calendar-check"></i>

                            </div>

                            <div class="kpi-value">

                                {{ $agendamentosHoje }}

                            </div>

                            <p class="kpi-title">

                                Agendamentos Hoje

                            </p>

                            <div class="kpi-growth">

                                <i class="fa-solid fa-circle-check"></i>

                                Atualizado em tempo real

                            </div>

                        </div>

                    </div>

                    <!-- ============================
                        CARD 02
                    ============================= -->

                    <div class="col-lg-3 col-md-6">

                        <div class="kpi-card">

                            <div class="kpi-icon" style="background:linear-gradient(135deg,#10b981,#34d399);">

                                <i class="fa-solid fa-paw"></i>

                            </div>

                            <div class="kpi-value">

                                {{ $pets }}

                            </div>

                            <p class="kpi-title">

                                Pets Cadastrados

                            </p>

                            <div class="kpi-growth" style="background:#ecfdf5;color:#059669;">

                                <i class="fa-solid fa-heart"></i>

                                Base de clientes

                            </div>

                        </div>

                    </div>

                    <!-- ============================
                        CARD 03
                    ============================= -->

                    <div class="col-lg-3 col-md-6">

                        <div class="kpi-card">

                            <div class="kpi-icon" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);">

                                <i class="fa-solid fa-clock"></i>

                            </div>

                            <div class="kpi-value">

                                {{ $pendentes }}

                            </div>

                            <p class="kpi-title">

                                Serviços Pendentes

                            </p>

                            <div class="kpi-growth" style="background:#fff7ed;color:#ea580c;">

                                <i class="fa-solid fa-hourglass-half"></i>

                                Aguardando atendimento

                            </div>

                        </div>

                    </div>

                    <!-- ============================
                        CARD 04
                    ============================= -->

                    <div class="col-lg-3 col-md-6">

                        <div class="kpi-card">

                            <div class="kpi-icon" style="background:linear-gradient(135deg,#8b5cf6,#7c3aed);">

                                <i class="fa-solid fa-users"></i>

                            </div>

                            <div class="kpi-value">

                                {{ $funcionarios }}

                            </div>

                            <p class="kpi-title">

                                Funcionários

                            </p>

                            <div class="kpi-growth" style="background:#f5f3ff;color:#7c3aed;">

                                <i class="fa-solid fa-user-group"></i>

                                Equipe ativa

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- =====================================================
            ÚLTIMOS AGENDAMENTOS
        ====================================================== -->

        <section class="dashboard-section">

            <div class="container">

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <div>

                            <h3 class="text-white">

                                Últimos Agendamentos

                            </h3>

                            <p>

                                Visualize rapidamente os atendimentos mais
                                recentes do petshop.

                            </p>

                        </div>

                        <div class="header-icon">

                            <i class="fa-solid fa-calendar-days"></i>

                        </div>

                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-dashboard mb-0">

                                <thead>

                                    <tr>

                                        <th>Pet</th>

                                        <th>Serviço</th>

                                        <th>Funcionário</th>

                                        <th>Data</th>

                                        <th>Status</th>

                                        <th>Ações</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    @forelse($ultimosAgendamentos as $agendamento)
                                        @php
                                            $etapasAttr = $agendamento->esteira();
                                            $resumoAttr = \App\Models\Agendamento::resumoEsteira($etapasAttr);
                                            $podeAvancarAttr = in_array(
                                                $agendamento->status_agendamento,
                                                ['Pendente', 'Em atendimento'],
                                                true
                                            );

                                            // Selo de status (só leitura), igual ao que o JS redesenha ao vivo
                                            // em aparenciaStatus().
                                            $statusAttr = (string) $agendamento->status_agendamento;
                                            $etapaAtualAttr = collect($etapasAttr)->firstWhere('status', 'current');

                                            if ($statusAttr === 'Em atendimento') {
                                                $seloClasse = 'status-andamento';
                                                $seloIcone = $etapaAtualAttr['icone'] ?? 'fa-solid fa-shower';
                                                $seloTexto = 'Em atendimento' . ($etapaAtualAttr ? ' · ' . $etapaAtualAttr['label'] : '');
                                            } elseif ($statusAttr === 'Concluido') {
                                                $seloClasse = 'status-concluido';
                                                $seloIcone = 'fa-solid fa-circle-check';
                                                $seloTexto = 'Concluído';
                                            } elseif (\Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($statusAttr), 'cancelad')) {
                                                $seloClasse = 'status-cancelado';
                                                $seloIcone = 'fa-solid fa-ban';
                                                $seloTexto = 'Cancelado';
                                            } else {
                                                $seloClasse = 'status-pendente';
                                                $seloIcone = 'fa-regular fa-clock';
                                                $seloTexto = $statusAttr ?: 'Pendente';
                                            }
                                        @endphp
                                        <tr>

                                            <!-- PET -->
                                            <td data-label="Pet">

                                                <div class="pet-info">

                                                    <div class="pet-avatar">

                                                        <i
                                                            class="fa-solid
                                                            {{ ($agendamento->pet->especie ?? '') == 'Gato' ? 'fa-cat' : 'fa-dog' }}">
                                                        </i>

                                                    </div>

                                                    <div>

                                                        <strong>

                                                            {{ $agendamento->pet->nome ?? '-' }}

                                                        </strong>

                                                        <small>

                                                            {{ $agendamento->pet->raca ?? 'Raça não informada' }}

                                                        </small>

                                                    </div>

                                                </div>

                                            </td>

                                            <!-- SERVIÇO -->
                                            <td data-label="Serviço">

                                                <span class="fw-semibold">

                                                    {{ $agendamento->servico->nome ?? '-' }}

                                                </span>

                                            </td>

                                            <!-- FUNCIONÁRIO -->
                                            <td data-label="Funcionário">

                                                <div class="d-flex align-items-center gap-2">

                                                    <i class="fa-solid fa-user text-primary"></i>

                                                    {{ $agendamento->funcionario->nome ?? '-' }}

                                                </div>

                                            </td>

                                            <!-- DATA -->
                                            <td data-label="Data">

                                                <strong>

                                                    {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}

                                                </strong>

                                                <br>

                                                <small class="text-muted">

                                                    <i class="fa-regular fa-clock me-1"></i>

                                                    {{ $agendamento->horario }}

                                                </small>

                                            </td>

                                            <!-- STATUS -->
                                            <td data-label="Status">

                                                {{-- Só leitura: acompanha ao vivo a esteira (RFID/app/painel) --}}
                                                <span class="status-badge status-live {{ $seloClasse }}"
                                                    data-status-live="{{ $agendamento->id_agendamento }}"
                                                    data-status="{{ $statusAttr }}"
                                                    data-assinatura="{{ $statusAttr }}|{{ $etapaAtualAttr['chave'] ?? '' }}"
                                                    role="status" aria-live="polite">

                                                    <i class="status-live-icone {{ $seloIcone }}"></i>

                                                    <span class="status-live-texto">{{ $seloTexto }}</span>

                                                </span>

                                            </td>

                                            <td data-label="Ações">

                                                <div class="acoes-agendamento">

                                                    <form
                                                        action="{{ route('agendamento.resetar', $agendamento->id_agendamento) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Tem certeza que deseja resetar este agendamento?');">

                                                        @csrf

                                                        <button type="submit" class="btn-resetar">
                                                            <i class="bi bi-arrow-counterclockwise"></i>
                                                            Resetar
                                                        </button>

                                                    </form>

                                                    {{-- BOTÃO VER DETALHES --}}
                                                    <button type="button" class="btn-detalhes"
                                                        onclick="abrirDetalhes(this)"
                                                        data-id-pet="{{ $agendamento->pet->id_pet ?? '' }}"
                                                        data-pet="{{ $agendamento->pet->nome ?? 'Pet' }}"
                                                        data-especie="{{ $agendamento->pet->especie ?? '' }}"
                                                        data-servico="{{ $agendamento->servico->nome ?? 'Serviço' }}"
                                                        data-status="{{ $agendamento->status_agendamento ?? 'Pendente' }}"
                                                        data-id-agendamento="{{ $agendamento->id_agendamento }}"
                                                        data-pode-avancar="{{ $podeAvancarAttr ? '1' : '' }}"
                                                        data-percentual="{{ $resumoAttr['percentual'] }}"
                                                        data-concluidas="{{ $resumoAttr['concluidas'] }}"
                                                        data-total-etapas="{{ $resumoAttr['total'] }}"
                                                        data-etapas="{{ json_encode($etapasAttr) }}">

                                                        <i class="bi bi-eye"></i>
                                                        Ver detalhes

                                                    </button>

                                                </div>

                                            </td>

                                        @empty

                                        <tr>

                                            <td colspan="6">

                                                <div class="empty-state">

                                                    <div class="empty-icon">

                                                        <i class="fa-solid fa-calendar-xmark"></i>

                                                    </div>

                                                    <h4>

                                                        Nenhum agendamento encontrado

                                                    </h4>

                                                    <p>

                                                        Ainda não existem agendamentos cadastrados.
                                                        Quando um cliente realizar um novo agendamento,
                                                        ele aparecerá automaticamente nesta lista.

                                                    </p>

                                                </div>

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        {{-- <!-- =====================================================
            ETAPAS DO ATENDIMENTO (BACKUP MANUAL DO RFID)
        ====================================================== -->

        <section class="dashboard-section">

            <div class="container">

                <h2 class="section-title">

                    Etapas do Atendimento

                </h2>

                <p class="section-description">

                    Agendamentos de hoje. Clique em "Fazer check-in" quando o pet chegar e
                    avance as etapas conforme o serviço anda. Se o cartão RFID do pet não for
                    lido, clique direto na etapa correta para atualizar manualmente.

                </p>

                @if ($agendamentosEsteira->isEmpty())

                    <div class="dashboard-card">

                        <div class="empty-state">

                            <div class="empty-icon">

                                <i class="fa-solid fa-shoe-prints"></i>

                            </div>

                            <h4>

                                Nenhum atendimento para hoje

                            </h4>

                            <p>

                                Os agendamentos de hoje aguardando check-in ou em atendimento
                                aparecerão aqui para acompanhamento das etapas.

                            </p>

                        </div>

                    </div>
                @else
                    <div class="row g-4">

                        @foreach ($agendamentosEsteira as $agendamento)
                            @php
                                $esteira = $agendamento->esteira();
                                $resumo = \App\Models\Agendamento::resumoEsteira($esteira);
                                $indiceAtual = collect($esteira)->search(fn ($e) => $e['status'] === 'current');
                                $etapaAtual = $indiceAtual === false ? null : $esteira[$indiceAtual];
                                $proxima = $indiceAtual === false ? null : ($esteira[$indiceAtual + 1] ?? null);
                                $pendente = $agendamento->status_agendamento === 'Pendente';

                                if ($pendente) {
                                    $textoBotao = 'Fazer check-in';
                                    $iconeBotao = 'fa-solid fa-clipboard-check';
                                } elseif ($proxima && $proxima['chave'] === 'finalizado') {
                                    $textoBotao = 'Finalizar atendimento';
                                    $iconeBotao = 'fa-solid fa-circle-check';
                                } else {
                                    $textoBotao = 'Avançar para ' . ($proxima['label'] ?? 'próxima etapa');
                                    $iconeBotao = 'fa-solid fa-forward';
                                }
                            @endphp
                            <div class="col-12 col-lg-6 col-xxl-4">

                                <div class="attendance-card" data-id="{{ $agendamento->id_agendamento }}">

                                    <div class="attendance-header">

                                        <div class="attendance-avatar">

                                            <i
                                                class="fa-solid {{ ($agendamento->pet->especie ?? '') == 'Gato' ? 'fa-cat' : 'fa-dog' }}">
                                            </i>

                                        </div>

                                        <div class="attendance-title">

                                            <strong>{{ $agendamento->pet->nome ?? '-' }}</strong>

                                            <span>
                                                {{ $agendamento->servico->nome ?? '-' }} ·
                                                {{ substr((string) $agendamento->horario, 0, 5) }}
                                            </span>

                                        </div>

                                    </div>

                                    <div class="attendance-progress">

                                        <div class="attendance-progress-info">

                                            <span>
                                                {{ $resumo['concluidas'] }} de {{ $resumo['total'] }} etapas concluídas
                                            </span>

                                            <strong class="attendance-percent">{{ $resumo['percentual'] }}%</strong>

                                        </div>

                                        <div class="progress-track">

                                            <div class="progress-fill" style="width: {{ $resumo['percentual'] }}%"></div>

                                        </div>

                                    </div>

                                    <div class="current-stage-pill">

                                        @if ($etapaAtual)
                                            <i class="{{ $etapaAtual['icone'] }}"></i>
                                            {{ $etapaAtual['label'] }}
                                        @else
                                            <i class="fa-regular fa-clock"></i>
                                            Aguardando check-in
                                        @endif

                                    </div>

                                    <ul class="stage-timeline">

                                        @foreach ($esteira as $etapa)
                                            @if ($etapa['id'])
                                                <li class="stage-item stage-{{ $etapa['status'] }}"
                                                    data-etapa="{{ $etapa['id'] }}" role="button" tabindex="0"
                                                    title="Marcar como etapa atual">
                                            @else
                                                <li class="stage-item stage-fixa stage-{{ $etapa['status'] }}">
                                            @endif

                                                <span class="stage-icon">

                                                    <i
                                                        class="{{ $etapa['status'] === 'done' ? 'fa-solid fa-check' : $etapa['icone'] }}"></i>

                                                </span>

                                                <span class="stage-text">

                                                    <span class="stage-label">{{ $etapa['label'] }}</span>

                                                    @if ($etapa['status'] === 'current')
                                                        <span class="stage-sublabel">Em andamento</span>
                                                    @endif

                                                </span>

                                            </li>
                                        @endforeach

                                    </ul>

                                    <button type="button"
                                        class="attendance-advance-btn {{ $pendente ? 'is-checkin' : '' }}"
                                        data-id="{{ $agendamento->id_agendamento }}">

                                        <i class="{{ $iconeBotao }}"></i>

                                        {{ $textoBotao }}

                                    </button>

                                </div>

                            </div>
                        @endforeach

                    </div>

                @endif

            </div>

        </section> --}}

        <!-- =====================================================
        AÇÕES RÁPIDAS
        ====================================================== -->

        <section class="dashboard-section">

            <div class="container">

                <h2 class="section-title">

                    Ações Rápidas

                </h2>

                <p class="section-description">

                    Acesse rapidamente as principais funcionalidades do sistema.

                </p>

                <div class="row g-4">

                    <div class="col-lg-4 col-md-6">

                        <a href="{{ route('funcionario.agendamentos') }}" class="text-decoration-none">

                            <div class="quick-card">

                                <div class="quick-icon">

                                    <i class="fa-solid fa-calendar-days"></i>

                                </div>

                                <h5>

                                    Agendamentos

                                </h5>

                                <p>

                                    Gerencie todos os atendimentos do petshop.

                                </p>

                            </div>

                        </a>

                    </div>

                    <div class="col-lg-4 col-md-6">

                        <a href="{{ route('services.create') }}" class="text-decoration-none">

                            <div class="quick-card">

                                <div class="quick-icon">

                                    <i class="fa-solid fa-scissors"></i>

                                </div>

                                <h5>

                                    Novo Serviço

                                </h5>

                                <p>

                                    Cadastre rapidamente um novo serviço para disponibilizar aos clientes.

                                </p>

                            </div>

                        </a>

                    </div>

                    <div class="col-lg-4 col-md-12">

                        <a href="{{ route('logout') }}" class="text-decoration-none">

                            <div class="quick-card">

                                <div class="quick-icon" style="background:linear-gradient(135deg,#ef4444,#dc2626);">

                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>

                                </div>

                                <h5>

                                    Encerrar Sessão

                                </h5>

                                <p>

                                    Finalize sua sessão com segurança e retorne à tela de login.

                                </p>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>

    <!-- =====================================================
    FOOTER
    ====================================================== -->

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
            0% {
                background-position: 0% 0;
            }

            100% {
                background-position: 200% 0;
            }
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
            0% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(34, 197, 94, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
            }
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


        /* =====================================================
           AÇÕES DOS AGENDAMENTOS
        ====================================================== */

        .acoes-agendamento {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
            width: 100%;
            max-width: 160px;
            margin: 0 auto;
        }

        .btn-resetar,
        .btn-detalhes {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            gap: 6px;
            border-radius: 22px;
            padding: 9px 14px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
            white-space: nowrap;
        }

        .btn-resetar {
            border: 1px solid #bfdbfe;
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-resetar:hover {
            background: #2563eb;
            color: #fff;
        }

        .btn-detalhes {
            border: 1px solid #dbe5f1;
            background: #fff;
            color: #285d99;
        }

        .btn-detalhes:hover {
            background: #eaf2ff;
            border-color: #9dbde0;
        }

        /* =====================================================
           PAINEL DE DETALHES
        ====================================================== */

        .fundo-detalhes {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .35);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: .3s ease;
        }

        .fundo-detalhes.aberto {
            opacity: 1;
            visibility: visible;
        }

        .painel-detalhes {
            position: fixed;
            top: 0;
            right: 0;
            width: 430px;
            max-width: 92vw;
            height: 100vh;
            background: #f8fafc;
            z-index: 9999;
            transform: translateX(100%);
            transition: transform .35s ease;
            box-shadow: -12px 0 35px rgba(15, 23, 42, .16);
            overflow-y: auto;
        }

        .painel-detalhes.aberto {
            transform: translateX(0);
        }

        .detalhes-conteudo {
            padding: 28px 30px 35px;
        }

        .detalhes-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .detalhes-pet {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .icone-pet {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .detalhes-pet h2 {
            margin: 0;
            color: #111827;
            font-size: 21px;
            font-weight: 700;
        }

        .detalhes-pet-id {
            display: inline-block;
            margin-top: 4px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .3px;
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 3px 12px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .detalhes-sem-atendimento {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
            padding: 30px 10px;
            color: #6b7280;
        }

        .detalhes-sem-atendimento i {
            font-size: 34px;
            color: #bfdbfe;
        }

        .btn-rfid:disabled {
            opacity: .5;
            cursor: not-allowed;
        }

        .btn-fechar-detalhes {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
            font-size: 18px;
            transition: .2s ease;
        }

        .btn-fechar-detalhes:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .progresso-texto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            color: #6b7280;
            font-size: 16px;
        }

        .progresso-texto strong {
            color: #2563eb;
            font-size: 18px;
        }

        .barra-progresso {
            height: 12px;
            background: #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
        }

        .barra-progresso-preenchida {
            height: 100%;
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
            border-radius: 20px;
            transition: width .35s ease;
        }

        .detalhes-servico {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin: 22px 0 22px;
            padding: 8px 18px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
        }

        .etapas-atendimento {
            position: relative;
        }

        .etapa {
            position: relative;
            display: flex;
            align-items: center;
            gap: 18px;
            min-height: 68px;
            color: #374151;
        }

        .etapa:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 17px;
            top: 42px;
            width: 2px;
            height: 34px;
            background: #e5e7eb;
        }

        .etapa-icone {
            position: relative;
            z-index: 2;
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 50%;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .25s;
        }

        .etapa-concluida .etapa-icone,
        .etapa-andamento .etapa-icone {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .etapa-concluida::after {
            background: #2563eb !important;
        }

        .etapa-pendente .etapa-texto strong {
            color: #9ca3af;
            font-weight: 500;
        }

        .etapa-andamento .etapa-texto strong {
            color: #111827;
        }

        .etapa-andamento .etapa-icone {
            width: 44px;
            height: 44px;
            min-width: 44px;
            margin-left: -4px;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .15);
        }

        .etapa-texto {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .etapa-texto strong {
            color: #374151;
            font-size: 17px;
            font-weight: 600;
        }

        .etapa-texto span {
            font-size: 14px;
        }

        .etapa-andamento .etapa-texto span {
            color: #f59e0b;
            font-weight: 700;
        }

        .btn-rfid {
            width: 100%;
            margin-top: 18px;
            padding: 14px;
            border: 2px solid #dbeafe;
            border-radius: 16px;
            background: #fff;
            color: #2563eb;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
        }

        .btn-rfid:hover:not(:disabled) {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            .painel-detalhes {
                width: 100%;
                max-width: 100%;
            }

            .detalhes-conteudo {
                padding: 24px 20px 30px;
            }

            .acoes-agendamento {
                margin: 0 0 0 auto;
            }
        }
    </style>



    <!-- =====================================================
         PAINEL DE DETALHES DO AGENDAMENTO
    ====================================================== -->

    <div id="fundoDetalhes" class="fundo-detalhes" onclick="fecharDetalhes()"></div>

    <aside id="painelDetalhes" class="painel-detalhes" aria-hidden="true">

        <div class="detalhes-conteudo">

            <div class="detalhes-header">

                <div class="detalhes-pet">

                    <div class="icone-pet">
                        <i id="detalhesIconePet" class="fa-solid fa-cat"></i>
                    </div>

                    <div>
                        <h2 id="detalhesNomePet">Pet</h2>
                        <span id="detalhesIdPet" class="detalhes-pet-id">ID #-</span>
                    </div>

                </div>

                <button type="button" class="btn-fechar-detalhes" onclick="fecharDetalhes()"
                    aria-label="Fechar detalhes">
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>

            <div id="detalhesProgresso" class="detalhes-progresso">

                <div class="progresso-texto">
                    <span id="detalhesEtapas">0 de 0 etapas concluídas</span>
                    <strong id="detalhesPorcentagem">0%</strong>
                </div>

                <div class="barra-progresso">
                    <div id="barraProgresso" class="barra-progresso-preenchida" style="width: 0%;"></div>
                </div>

            </div>

            <div class="detalhes-servico">
                <i class="bi bi-droplet-fill"></i>
                <span id="detalhesServico">Serviço</span>
            </div>

            <div id="detalhesEtapasLista" class="etapas-atendimento">

                {{-- Preenchido dinamicamente via JS a partir da esteira real do atendimento --}}

            </div>

            <button type="button" id="btnSimularRfidDetalhes" class="btn-rfid">
                <i class="bi bi-upc-scan"></i>
                <span id="btnSimularRfidTexto">Simular leitura RFID</span>
            </button>

        </div>

    </aside>

    @include('partials.footer')

    <!-- =====================================================
    PRELOADER
    ====================================================== -->

    <div id="preloader"></div>

    <!-- =====================================================
    VLIBRAS
    ====================================================== -->



    <!-- =====================================================
    SCRIPTS
    ====================================================== -->

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        /**
         * Status ao vivo da tabela "Últimos Agendamentos": o selo é só
         * leitura e acompanha a esteira do agendamento (leitura do cartão
         * RFID, app mobile ou ações do painel). A cada INTERVALO_STATUS_MS
         * consulta GET /agendamentos/{id}/esteira — a mesma usada pelo "Ver
         * detalhes" — apenas dos agendamentos que ainda podem mudar
         * (Pendente / Em atendimento).
         */
        const INTERVALO_STATUS_MS = 5000;
        const STATUS_QUE_MUDAM = ['Pendente', 'Em atendimento'];

        /** Mesmo mapeamento do @php da tabela (classe, ícone e texto do selo). */
        function aparenciaStatus(status, etapaAtual) {
            if (status === 'Em atendimento') {
                return {
                    classe: 'status-andamento',
                    icone: etapaAtual?.icone || 'fa-solid fa-shower',
                    texto: 'Em atendimento' + (etapaAtual ? ` · ${etapaAtual.label}` : '')
                };
            }

            if (status === 'Concluido') {
                return {
                    classe: 'status-concluido',
                    icone: 'fa-solid fa-circle-check',
                    texto: 'Concluído'
                };
            }

            if ((status || '').toLowerCase().includes('cancelad')) {
                return {
                    classe: 'status-cancelado',
                    icone: 'fa-solid fa-ban',
                    texto: 'Cancelado'
                };
            }

            return {
                classe: 'status-pendente',
                icone: 'fa-regular fa-clock',
                texto: status || 'Pendente'
            };
        }

        /**
         * Avisos no canto da tela (SweetAlert em modo toast): não travam a
         * página, somem sozinhos e pausam com o mouse em cima — igual às
         * notificações do app mobile.
         */
        const Aviso = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: aviso => {
                aviso.addEventListener('mouseenter', Swal.stopTimer);
                aviso.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        // id -> momento em que o próprio funcionário mudou pelo painel; nesses
        // casos o aviso de sucesso já apareceu, então a sincronização não
        // repete o aviso de "leitura do cartão".
        const JANELA_ALTERACAO_LOCAL_MS = 15000;
        const alteracoesLocais = new Map();

        function foiAlteradoAqui(id) {
            const momento = alteracoesLocais.get(String(id));
            return Boolean(momento) && (Date.now() - momento) < JANELA_ALTERACAO_LOCAL_MS;
        }

        /** Redesenha o selo; retorna true se o status/etapa mudou. */
        function atualizarSeloStatus(selo, dados) {
            const etapaAtual = (dados.etapas || []).find(etapa => etapa.status === 'current') || null;
            const assinatura = `${dados.status}|${etapaAtual?.chave || ''}`;

            if (selo.dataset.assinatura === assinatura) return false;

            const aparencia = aparenciaStatus(dados.status, etapaAtual);

            selo.classList.remove('status-pendente', 'status-andamento', 'status-concluido', 'status-cancelado');
            selo.classList.add(aparencia.classe);
            selo.querySelector('.status-live-icone').className = `status-live-icone ${aparencia.icone}`;
            selo.querySelector('.status-live-texto').textContent = aparencia.texto;
            selo.dataset.status = dados.status;
            selo.dataset.assinatura = assinatura;

            // Reinicia a animação de destaque mesmo se mudar duas vezes seguidas.
            selo.classList.remove('status-live-mudou');
            void selo.offsetWidth;
            selo.classList.add('status-live-mudou');

            // Mantém o "Ver detalhes" da mesma linha em dia para a próxima abertura.
            const botao = selo.closest('tr')?.querySelector('.btn-detalhes');
            if (botao) {
                botao.dataset.status = dados.status;
                botao.dataset.podeAvancar = dados.pode_avancar ? '1' : '';
                botao.dataset.percentual = dados.resumo.percentual;
                botao.dataset.concluidas = dados.resumo.concluidas;
                botao.dataset.totalEtapas = dados.resumo.total;
                botao.dataset.etapas = JSON.stringify(dados.etapas);
            }

            return true;
        }

        /** Busca a esteira de um selo e o atualiza; avisa quando a mudança veio do cartão/app. */
        function sincronizarSelo(selo) {
            const id = selo.dataset.statusLive;

            return fetch(`/agendamentos/${id}/esteira`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.ok ? response.json() : null)
                .then(dados => {
                    if (!dados || !atualizarSeloStatus(selo, dados) || foiAlteradoAqui(id)) return;

                    const pet = selo.closest('tr')?.querySelector('.btn-detalhes')?.dataset.pet || 'Pet';

                    Aviso.fire({
                        icon: dados.status === 'Concluido' ? 'success' : 'info',
                        title: pet,
                        html: `<i class="fa-solid fa-id-card me-1"></i> ${selo.querySelector('.status-live-texto').textContent}`
                    });
                })
                .catch(() => {
                    // Falha momentânea de rede: tenta de novo no próximo ciclo.
                });
        }

        let sincronizandoStatus = false;

        async function sincronizarStatusTabela() {
            if (sincronizandoStatus || document.hidden) return;
            sincronizandoStatus = true;

            const selos = Array.from(document.querySelectorAll('[data-status-live]'))
                .filter(selo => STATUS_QUE_MUDAM.includes(selo.dataset.status));

            await Promise.all(selos.map(sincronizarSelo));

            sincronizandoStatus = false;
        }

        /** Depois de uma ação no painel: atualiza o selo (e a gaveta aberta) na hora. */
        function atualizarAgora(agendamentoId) {
            alteracoesLocais.set(String(agendamentoId), Date.now());

            const selo = document.querySelector(`[data-status-live="${agendamentoId}"]`);
            if (selo) sincronizarSelo(selo);

            if (typeof sincronizarDetalhes === 'function' &&
                botaoDetalhesAberto?.dataset.idAgendamento === String(agendamentoId)) {
                sincronizarDetalhes(agendamentoId);
            }
        }

        setInterval(sincronizarStatusTabela, INTERVALO_STATUS_MS);

        // Ao voltar para a aba, atualiza na hora em vez de esperar o ciclo.
        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) sincronizarStatusTabela();
        });

        /**
         * Esteira do agendamento no painel. Sem "etapa", faz o check-in ou
         * avança para a próxima etapa (POST avancar-etapa); com "etapa" (id
         * de servico_etapas), coloca o agendamento direto nela — backup
         * manual quando o cartão RFID não é lido. Tudo ao vivo: o selo da
         * tabela e a gaveta aberta se atualizam na hora, sem recarregar.
         */
        function atualizarEtapaAgendamento(agendamentoId, etapa = null) {

            Swal.fire({
                toast: true,
                position: 'top-end',
                title: 'Atualizando etapa...',
                showConfirmButton: false,
                didOpen: () => Swal.showLoading()
            });

            const url = etapa ?
                `/agendamentos/${agendamentoId}/etapa` :
                `/agendamentos/${agendamentoId}/avancar-etapa`;

            fetch(url, {
                    method: etapa ? 'PATCH' : 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(etapa ? {
                        etapa: etapa
                    } : {})
                })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        atualizarAgora(agendamentoId);

                        Aviso.fire({
                            icon: 'success',
                            title: data.title || 'Etapa atualizada!',
                            text: data.message || ''
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: data.message || 'Não foi possível atualizar a etapa.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#2563eb'
                        });
                    }

                })
                .catch(error => {
                    console.error('Erro:', error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Erro ao atualizar a etapa.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#2563eb'
                    });
                });
        }

        document.querySelectorAll('.stage-item[data-etapa]').forEach(item => {

            const ativarEtapa = () => {
                const card = item.closest('.attendance-card');
                if (!card) return;

                atualizarEtapaAgendamento(card.dataset.id, item.dataset.etapa);
            };

            item.addEventListener('click', ativarEtapa);

            item.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    ativarEtapa();
                }
            });

        });

        document.querySelectorAll('.attendance-advance-btn').forEach(btn => {

            btn.addEventListener('click', function() {
                atualizarEtapaAgendamento(this.dataset.id);
            });

        });
    </script>
    <script>
        /**
         * "Ver detalhes" em tempo real: enquanto a gaveta está aberta, busca a
         * esteira no servidor (GET /agendamentos/{id}/esteira — a mesma que o
         * app mobile recebe, vinda de servico_etapas + etapa_atual) a cada
         * INTERVALO_DETALHES_MS. Assim a leitura do cartão RFID ou o avanço
         * feito pelo app aparecem aqui sem recarregar a página.
         */
        const INTERVALO_DETALHES_MS = 5000;
        let timerDetalhes = null;
        let botaoDetalhesAberto = null;
        let assinaturaDetalhes = '';
        let detalhesMudaram = false;

        function abrirDetalhes(botao) {

            const idPet = botao.dataset.idPet || '';
            const nomePet = botao.dataset.pet || 'Pet';
            const especie = botao.dataset.especie || '';
            const servico = botao.dataset.servico || 'Serviço';
            const idAgendamento = botao.dataset.idAgendamento || '';

            let etapas = [];
            try {
                etapas = JSON.parse(botao.dataset.etapas || '[]');
            } catch (e) {
                etapas = [];
            }

            document.getElementById('detalhesNomePet').textContent = nomePet;
            document.getElementById('detalhesIdPet').textContent = idPet ? `ID #${idPet}` : 'ID indisponível';
            document.getElementById('detalhesIconePet').className = especie === 'Gato' ?
                'fa-solid fa-cat' : 'fa-solid fa-dog';
            document.getElementById('detalhesServico').textContent = servico;

            botaoDetalhesAberto = botao;
            detalhesMudaram = false;

            renderizarEsteiraDetalhes(idAgendamento, {
                status: botao.dataset.status || 'Pendente',
                pode_avancar: botao.dataset.podeAvancar === '1',
                etapas: etapas,
                resumo: {
                    percentual: parseFloat(botao.dataset.percentual || '0'),
                    concluidas: parseInt(botao.dataset.concluidas || '0', 10),
                    total: parseInt(botao.dataset.totalEtapas || '0', 10),
                },
            });

            clearInterval(timerDetalhes);
            if (idAgendamento) {
                timerDetalhes = setInterval(() => sincronizarDetalhes(idAgendamento), INTERVALO_DETALHES_MS);
            }

            const painel = document.getElementById('painelDetalhes');
            const fundo = document.getElementById('fundoDetalhes');

            painel.classList.add('aberto');
            fundo.classList.add('aberto');
            painel.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function sincronizarDetalhes(idAgendamento) {
            fetch(`/agendamentos/${idAgendamento}/esteira`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.ok ? response.json() : null)
                .then(dados => {
                    if (!dados || botaoDetalhesAberto?.dataset.idAgendamento !== String(idAgendamento)) return;

                    if (renderizarEsteiraDetalhes(idAgendamento, dados)) {
                        detalhesMudaram = true;

                        // Mantém o botão da tabela em dia para a próxima abertura.
                        const botao = botaoDetalhesAberto;
                        botao.dataset.status = dados.status;
                        botao.dataset.podeAvancar = dados.pode_avancar ? '1' : '';
                        botao.dataset.percentual = dados.resumo.percentual;
                        botao.dataset.concluidas = dados.resumo.concluidas;
                        botao.dataset.totalEtapas = dados.resumo.total;
                        botao.dataset.etapas = JSON.stringify(dados.etapas);
                    }
                })
                .catch(() => {
                    // Falha momentânea de rede: tenta de novo no próximo ciclo.
                });
        }

        /**
         * Desenha progresso, esteira e botão de RFID da gaveta. Retorna true
         * se algo mudou desde o último desenho (para não piscar à toa).
         */
        function renderizarEsteiraDetalhes(idAgendamento, dados) {

            const etapas = dados.etapas || [];
            const assinatura = JSON.stringify([idAgendamento, dados.status, etapas.map(e => e.status)]);
            if (assinatura === assinaturaDetalhes) return false;
            assinaturaDetalhes = assinatura;

            const podeAvancar = dados.pode_avancar;
            const percentual = dados.resumo.percentual;
            const concluidas = dados.resumo.concluidas;
            const totalEtapas = dados.resumo.total;

            const etapasTexto = document.getElementById('detalhesEtapas');
            const porcentagemTexto = document.getElementById('detalhesPorcentagem');
            const barra = document.getElementById('barraProgresso');
            const listaEtapas = document.getElementById('detalhesEtapasLista');
            const btnRfid = document.getElementById('btnSimularRfidDetalhes');
            const btnRfidTexto = document.getElementById('btnSimularRfidTexto');

            listaEtapas.innerHTML = '';

            // Esteira: o servidor já manda pronta (Agendamento::esteira()) —
            // aqui só decide "tem etapas pra mostrar" ou não.
            if (etapas.length === 0) {

                document.getElementById('detalhesProgresso').style.display = 'none';

                listaEtapas.innerHTML = `
                    <div class="detalhes-sem-atendimento">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Não há etapas de atendimento configuradas para este serviço.</span>
                    </div>
                `;

            } else {

                document.getElementById('detalhesProgresso').style.display = '';

                etapasTexto.textContent = `${concluidas} de ${totalEtapas} etapas concluídas`;
                porcentagemTexto.textContent = `${percentual}%`;
                barra.style.width = `${percentual}%`;

                etapas.forEach(etapa => {
                    const div = document.createElement('div');
                    div.className = 'etapa' + (etapa.status === 'done' ? ' etapa-concluida' :
                        etapa.status === 'current' ? ' etapa-andamento' : ' etapa-pendente');

                    const icone = etapa.status === 'done' ? 'fa-solid fa-check' : etapa.icone;

                    div.innerHTML = `
                        <div class="etapa-icone"><i class="${icone}"></i></div>
                        <div class="etapa-texto">
                            <strong>${etapa.label}</strong>
                            ${etapa.status === 'current' ? '<span>Em andamento</span>' : ''}
                        </div>
                    `;

                    listaEtapas.appendChild(div);
                });
            }

            // Botão de RFID: faz o check-in (Pendente) ou avança a etapa (Em
            // atendimento); concluídos/cancelados não têm o que avançar.
            if (idAgendamento && podeAvancar) {
                btnRfid.disabled = false;
                btnRfid.dataset.id = idAgendamento;
                btnRfidTexto.textContent = dados.status === 'Pendente' ?
                    'Fazer check-in' : 'Simular leitura RFID';
            } else {
                btnRfid.disabled = true;
                btnRfid.removeAttribute('data-id');
                btnRfidTexto.textContent = 'Atendimento finalizado';
            }

            return true;
        }

        document.getElementById('btnSimularRfidDetalhes').addEventListener('click', function() {
            const agendamentoId = this.dataset.id;

            if (!agendamentoId) return;

            atualizarEtapaAgendamento(agendamentoId);
        });

        function fecharDetalhes() {

            const painel = document.getElementById('painelDetalhes');
            const fundo = document.getElementById('fundoDetalhes');

            painel.classList.remove('aberto');
            fundo.classList.remove('aberto');
            painel.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';

            clearInterval(timerDetalhes);
            timerDetalhes = null;
            botaoDetalhesAberto = null;
            assinaturaDetalhes = '';
            detalhesMudaram = false;

            // Sem recarregar: o selo da tabela já acompanha ao vivo; só
            // sincroniza agora para refletir o que a gaveta mostrou.
            sincronizarStatusTabela();
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                fecharDetalhes();
            }
        });
    </script>

    @include('partials.logout-confirm')
</body>

</html>
