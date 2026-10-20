<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Meus Pets | Mobipet</title>
    <meta name="description" content="Gerencie os pets cadastrados na sua conta Mobipet e acompanhe o status de cada atendimento.">

    @include('partials.favicon')

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        /* ===========================================================
           MEUS PETS — MOBIPET  ·  isolado (prefixo pt-)
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
                radial-gradient(circle at bottom left, #ffffff 0%, transparent 30%),
                var(--pt-bg);
            min-height: 100vh;
        }

        .pt-wrap {
            width: min(1060px, 92%);
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
            margin: 0 0 26px;
        }

        /* =========================================================
           BOTÕES (padrão devs / rs / rd)
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

        .pt-hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }

        /* =========================================================
           ALERTA DE SUCESSO
           ========================================================= */
        .pt-flash {
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: var(--pt-radius-sm);
            background: #e7f8ee;
            color: #12643a;
            border: 1px solid #b7ebcd;
            padding: 15px 18px;
            font-weight: 600;
            font-size: .93rem;
            margin-bottom: 22px;
        }

        /* =========================================================
           CARD + TABELA
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

        .pt-count-chip {
            background: #fff;
            color: var(--pt-accent);
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: .9rem;
            padding: 8px 16px;
            border-radius: 999px;
        }

        .pt-table {
            width: 100%;
            border-collapse: collapse;
            vertical-align: middle;
        }

        .pt-table thead th {
            background: var(--pt-bg);
            font-family: "Lato", sans-serif;
            color: var(--pt-muted);
            font-weight: 700;
            text-transform: uppercase;
            font-size: .72rem;
            letter-spacing: .08em;
            padding: 18px 15px;
            border-bottom: 1px solid var(--pt-line);
            text-align: left;
        }

        .pt-table tbody td {
            padding: 20px 15px;
            border-bottom: 1px solid var(--pt-line);
            font-size: .92rem;
            color: var(--pt-body);
        }

        .pt-table tbody tr:last-child td {
            border-bottom: none;
        }

        .pt-table tbody tr {
            transition: background-color .18s ease;
        }

        .pt-table tbody tr:hover {
            background-color: var(--pt-bg);
        }

        .pt-avatar {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            background-color: var(--pt-accent-soft);
            color: var(--pt-accent);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .pt-name {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            color: var(--pt-ink);
            font-size: 1rem;
        }

        .pt-chip {
            display: inline-flex;
            align-items: center;
            padding: 6px 13px;
            border-radius: 999px;
            font-weight: 600;
            font-size: .78rem;
            background: var(--pt-accent-soft);
            color: var(--pt-accent);
            border: 1px solid #cfe0fb;
        }

        .pt-chip--muted {
            background: var(--pt-bg);
            color: var(--pt-body);
            border: 1px solid var(--pt-line);
        }

        /* Status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 13px;
            border-radius: 999px;
            font-size: .76rem;
            font-weight: 700;
            white-space: nowrap;
            background-color: #fff7ed;
            color: #c2410c;
            border: 1px solid #fed7aa;
        }

        .status-badge i {
            font-size: 10px;
        }

        .status-pendente {
            background-color: #fff7e6;
            color: #b45309;
            border-color: #fde68a;
        }

        .status-andamento {
            background-color: var(--pt-accent-soft);
            color: var(--pt-accent);
            border-color: #cfe0fb;
        }

        .status-concluido {
            background-color: #e7f8ee;
            color: #12643a;
            border-color: #b7ebcd;
        }

        .status-cancelado {
            background-color: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }

        .status-sem-agendamento {
            background-color: var(--pt-bg);
            color: var(--pt-muted);
            border-color: var(--pt-line);
        }

        /* Ações */
        .pt-icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            border: none;
            transition: transform .18s ease, background-color .18s ease, color .18s ease;
        }

        .pt-icon-btn--edit {
            background-color: var(--pt-accent-soft);
            color: var(--pt-accent);
        }

        .pt-icon-btn--edit:hover {
            background-color: var(--pt-accent);
            color: #fff;
            transform: translateY(-2px);
        }

        .pt-icon-btn--agendar {
            background-color: #e7f8ee;
            color: #12643a;
        }

        .pt-icon-btn--agendar:hover {
            background-color: #16a34a;
            color: #fff;
            transform: translateY(-2px);
        }

        .pt-icon-btn--delete {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .pt-icon-btn--delete:hover {
            background-color: #dc2626;
            color: #fff;
            transform: translateY(-2px);
        }

        /* Estado vazio */
        .pt-empty {
            text-align: center;
            padding: 64px 24px;
        }

        .pt-empty-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 22px;
            background: var(--pt-bg);
            color: var(--pt-muted);
            border: 1px solid var(--pt-line);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .pt-empty h4 {
            font-weight: 800;
            margin-bottom: 8px;
        }

        .pt-empty p {
            color: var(--pt-muted);
            max-width: 440px;
            margin: 0 auto 24px;
        }

        /* =========================================================
           RESPONSIVO — tabela empilhada no mobile
           ========================================================= */
        @media (max-width: 768px) {
            .pt-hero {
                padding-top: 140px;
            }

            .pt-table thead {
                display: none;
            }

            .pt-table tbody tr {
                display: block;
                border-bottom: 2px solid var(--pt-line);
                padding: 14px 6px;
            }

            .pt-table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 6px;
                border: none;
                text-align: right;
            }

            .pt-table tbody td:first-child {
                justify-content: center;
                padding-bottom: 14px;
            }

            .pt-table tbody td::before {
                content: attr(data-label);
                font-family: "Lato", sans-serif;
                font-weight: 700;
                color: var(--pt-muted);
                text-transform: uppercase;
                font-size: .72rem;
                letter-spacing: .06em;
            }

            .pt-table tbody td:first-child::before {
                display: none;
            }
        }

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

    <!-- HEADER -->
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

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main pt-page">
        <section class="pt-hero">
            <div class="pt-wrap">

                <div class="pt-hero-head" data-aos="fade-up">
                    <h1 class="pt-h1">Meus companheiros</h1>
                    <p class="pt-lead">
                        Gerencie os dados dos seus pets cadastrados, acompanhe o status dos atendimentos ou adicione
                        novos membros à família.
                    </p>
                    <div class="pt-hero-actions">
                        @if (isset($pets) && count($pets) > 0)
                            <a href="{{ route('agendamento') }}" class="pt-btn pt-btn--primary">
                                <i class="fa-solid fa-calendar-plus"></i> Agendar serviço
                            </a>
                        @endif

                        <a href="{{ route('pets.create') }}"
                            class="pt-btn {{ isset($pets) && count($pets) > 0 ? 'pt-btn--outline' : 'pt-btn--primary' }}">
                            <i class="fa-solid fa-plus"></i> Cadastrar novo pet
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="pt-flash" data-aos="fade-up">
                        <i class="fa-solid fa-circle-check fs-5"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="pt-card" data-aos="zoom-in" data-aos-delay="100">

                    <div class="pt-card-head">
                        <div class="d-flex align-items-center gap-3">
                            <div class="pt-head-icon">
                                <i class="fa-solid fa-list-ul"></i>
                            </div>
                            <div>
                                <h3>Pets cadastrados</h3>
                                <p>Confira abaixo a listagem completa dos seus animais.</p>
                            </div>
                        </div>
                        <span class="pt-count-chip">
                            {{ count($pets ?? []) }} {{ count($pets ?? []) == 1 ? 'pet' : 'pets' }}
                        </span>
                    </div>

                    <div class="p-0">
                        @if (isset($pets) && count($pets) > 0)
                            <div class="table-responsive">
                                <table class="pt-table">
                                    <thead>
                                        <tr>
                                            <th class="ps-4">Nome</th>
                                            <th>Espécie</th>
                                            <th>Raça</th>
                                            <th>Porte</th>
                                            <th>Nascimento</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-end pe-4">Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pets as $pet)
                                            @php
                                                $statusMap = [
                                                    'pendente' => 'status-pendente',
                                                    'agendado' => 'status-pendente',
                                                    'confirmado' => 'status-pendente',
                                                    'em andamento' => 'status-andamento',
                                                    'andamento' => 'status-andamento',
                                                    'em atendimento' => 'status-andamento',
                                                    'banho' => 'status-andamento',
                                                    'concluido' => 'status-concluido',
                                                    'finalizado' => 'status-concluido',
                                                    'cancelado' => 'status-cancelado',
                                                ];

                                                $statusClass = $pet->status_agendamento
                                                    ? $statusMap[strtolower($pet->status_agendamento)] ?? 'status-pendente'
                                                    : 'status-sem-agendamento';
                                            @endphp

                                            <tr>
                                                <td class="ps-4" data-label="Nome">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="pt-avatar">
                                                            <i class="fa-solid {{ $pet->especie == 'Gato' ? 'fa-cat' : 'fa-dog' }}"></i>
                                                        </div>
                                                        <span class="pt-name">{{ $pet->nome }}</span>
                                                    </div>
                                                </td>

                                                <td data-label="Espécie">
                                                    <span class="pt-chip">{{ $pet->especie }}</span>
                                                </td>

                                                <td data-label="Raça">{{ $pet->raca }}</td>

                                                <td data-label="Porte">
                                                    <span class="pt-chip pt-chip--muted">{{ $pet->porte }}</span>
                                                </td>

                                                <td data-label="Nascimento">
                                                    {{ $pet->data_nascimento ? date('d/m/Y', strtotime($pet->data_nascimento)) : 'Não informada' }}
                                                </td>

                                                <td data-label="Status" class="text-center">
                                                    <span class="status-badge {{ $statusClass }}"
                                                        data-status-pet="{{ $pet->id_pet }}">
                                                        <i class="fa-solid fa-clock"></i>
                                                        {{ $pet->status_agendamento ?? 'Sem agendamento' }}
                                                    </span>
                                                </td>

                                                <td class="text-end pe-4" data-label="Ações">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="{{ route('agendamento', ['pet' => $pet->id_pet]) }}"
                                                            class="pt-icon-btn pt-icon-btn--agendar"
                                                            title="Agendar serviço para {{ $pet->nome }}"
                                                            aria-label="Agendar serviço para {{ $pet->nome }}">
                                                            <i class="fa-solid fa-calendar-plus"></i>
                                                        </a>

                                                        <a href="{{ route('pets.edit', $pet->id_pet) }}"
                                                            class="pt-icon-btn pt-icon-btn--edit" title="Editar pet">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <form action="{{ route('pets.destroy', $pet->id_pet) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Tem certeza que deseja remover este pet permanentemente?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="pt-icon-btn pt-icon-btn--delete"
                                                                title="Excluir pet">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="pt-empty">
                                <div class="pt-empty-icon">
                                    <i class="fa-solid fa-paw"></i>
                                </div>
                                <h4>Nenhum pet por aqui ainda</h4>
                                <p>
                                    Cadastre seu primeiro pet para poder agendar serviços de banho e tosa e acompanhar
                                    o status em tempo real.
                                </p>
                                <a href="{{ route('pets.create') }}" class="pt-btn pt-btn--primary">
                                    <i class="fa-solid fa-plus"></i> Cadastrar meu primeiro pet
                                </a>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </section>
    </main>

    @include('partials.footer')

    <div id="preloader"></div>

    <!-- BOOTSTRAP + libs -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

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
                title: 'Sucesso',
                text: @json(session('success'))
            });
        </script>
    @endif

    @include('partials.logout-confirm')

    <!-- ATUALIZA SOMENTE O STATUS DOS PETS -->
    <script>
        function atualizarStatusPets() {

            fetch("{{ route('pets.index') }}", {
                method: "GET",
                cache: "no-store",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error("Erro ao consultar os pets.");
                }

                return response.text();
            })
            .then(function(html) {

                const parser = new DOMParser();
                const novaPagina = parser.parseFromString(html, "text/html");

                const novosStatus = novaPagina.querySelectorAll(
                    ".status-badge[data-status-pet]"
                );

                novosStatus.forEach(function(novoStatus) {

                    const idPet = novoStatus.getAttribute("data-status-pet");

                    const statusAtual = document.querySelector(
                        '.status-badge[data-status-pet="' + idPet + '"]'
                    );

                    if (!statusAtual) {
                        return;
                    }

                    // Só altera se o status realmente mudou.
                    if (
                        statusAtual.className !== novoStatus.className ||
                        statusAtual.innerHTML.trim() !== novoStatus.innerHTML.trim()
                    ) {
                        statusAtual.className = novoStatus.className;
                        statusAtual.innerHTML = novoStatus.innerHTML;
                    }
                });

            })
            .catch(function(error) {
                console.error("Erro ao atualizar status:", error);
            });
        }

        // Consulta o servidor periodicamente para refletir mudanças de status.
        setInterval(atualizarStatusPets, 10000);
    </script>

</body>

</html>
