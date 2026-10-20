{{-- ===================================================================
     Footer "Estação de cuidados" — Mobipet
     Único para todo o sistema. Inclua logo após </main> em cada view:
         @include('partials.footer')
     Autossuficiente: traz o próprio <style>, o widget VLibras e o
     botão "voltar ao topo". Respeita prefers-reduced-motion.
     ================================================================== --}}

<style>
    /* ===========================================================
       FOOTER MOBIPET — prefixo mpf-
       Fundo escuro da identidade + bolhas de banho subindo,
       onda no topo, trilha de patinhas caminhando e marca com brilho.
       =========================================================== */
    .mpf {
        --mpf-bg1: #0f1b34;
        --mpf-bg2: #16264a;
        --mpf-accent: #175cdd;
        --mpf-accent-bright: #4f8cff;
        --mpf-green: #22c55e;
        --mpf-ink: #ffffff;
        --mpf-muted: rgba(255, 255, 255, .64);
        --mpf-faint: rgba(255, 255, 255, .42);
        --mpf-line: rgba(255, 255, 255, .12);

        position: relative;
        isolation: isolate;
        overflow: hidden;
        border: 0;
        margin-top: 60px;
        padding: 138px 0 30px;
        background: linear-gradient(160deg, var(--mpf-bg1) 0%, var(--mpf-bg2) 100%);
        color: var(--mpf-muted);
        font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
        font-size: 15px;
    }

    .mpf h6,
    .mpf .mpf__logo-text {
        font-family: "Montserrat", sans-serif;
    }

    /* crista de espuma no topo — combina com as bolhas de banho */
    .mpf__foam {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        line-height: 0;
        z-index: 3;
        pointer-events: none;
    }

    .mpf__foam svg {
        display: block;
        width: 100%;
        height: 70px;
    }

    .mpf__foam .mpf__foam-back  { fill: rgba(255, 255, 255, .05); }
    .mpf__foam .mpf__foam-mid   { fill: rgba(120, 170, 255, .12); }
    .mpf__foam .mpf__foam-front { fill: rgba(255, 255, 255, .11); }

    /* bolhas de sabão subindo */
    .mpf__bubbles {
        position: absolute;
        inset: 0;
        z-index: 1;
        overflow: hidden;
        pointer-events: none;
    }

    .mpf__bubbles span {
        position: absolute;
        bottom: -80px;
        left: var(--x);
        width: var(--s);
        height: var(--s);
        border-radius: 50%;
        /* interior quase invisível + aro fino iridescente = parede de sabão */
        background:
            radial-gradient(circle at 30% 27%, rgba(255, 255, 255, .30) 0%, rgba(255, 255, 255, .05) 14%, transparent 24%),
            radial-gradient(circle at 72% 78%, rgba(150, 190, 255, .10) 0%, transparent 32%),
            radial-gradient(circle at 50% 50%, transparent 56%, rgba(255, 255, 255, .04) 72%, rgba(180, 165, 255, .12) 84%, rgba(160, 225, 255, .16) 92%, rgba(255, 255, 255, .22) 97%, transparent 100%);
        box-shadow:
            inset 0 0 5px rgba(255, 255, 255, .14),
            inset 3px -3px 7px rgba(120, 170, 255, .10),
            0 0 5px rgba(255, 255, 255, .04);
        opacity: 0;
        animation: mpf-rise var(--d) linear var(--delay) infinite;
    }

    /* brilho especular da bolha */
    .mpf__bubbles span::after {
        content: "";
        position: absolute;
        top: 13%;
        left: 17%;
        width: 34%;
        height: 34%;
        border-radius: 50%;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, .75), rgba(255, 255, 255, .18) 52%, transparent 72%);
    }

    @keyframes mpf-rise {
        0% { transform: translateY(0) scale(.5); opacity: 0; }
        10% { opacity: .5; }
        55% { opacity: .34; }
        80% { opacity: .22; }
        100% { transform: translateY(calc(-1 * var(--rise))) translateX(var(--drift)) scale(1); opacity: 0; }
    }

    .mpf__inner {
        position: relative;
        z-index: 5;
    }

    /* trilha de patinhas caminhando */
    .mpf__pawtrail {
        position: absolute;
        top: 124px;
        right: 3%;
        display: flex;
        gap: 10px;
        z-index: 5;
        pointer-events: none;
    }

    .mpf__pawtrail i {
        font-size: 19px;
        color: rgba(255, 255, 255, .16);
        opacity: 0;
        transform: rotate(var(--r, 0deg));
        animation: mpf-paw 3.6s ease-in-out infinite;
        animation-delay: calc(var(--p) * .42s);
    }

    .mpf__pawtrail i:nth-child(odd) { --r: -20deg; }
    .mpf__pawtrail i:nth-child(even) { --r: 14deg; margin-top: 15px; }

    @keyframes mpf-paw {
        0%, 68%, 100% { opacity: 0; }
        14%, 44% { opacity: 1; }
    }

    /* ---------- layout ---------- */
    .mpf__top {
        display: grid;
        grid-template-columns: 1.05fr 1.35fr;
        gap: clamp(2rem, 6vw, 5rem);
        padding-bottom: 44px;
        border-bottom: 1px solid var(--mpf-line);
    }

    @media (max-width: 991px) {
        .mpf__top { grid-template-columns: 1fr; }
    }

    /* ---------- marca ---------- */
    .mpf__logo {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        text-decoration: none;
    }

    .mpf__logo-mark {
        position: relative;
        width: 46px;
        height: 46px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--mpf-accent), #1d4ed8);
        color: #fff;
        font-size: 20px;
        box-shadow: 0 10px 24px -8px rgba(23, 92, 221, .7);
        transition: transform .4s cubic-bezier(.34, 1.56, .64, 1);
    }

    .mpf__logo-mark::after {
        content: "";
        position: absolute;
        inset: -6px;
        border-radius: 18px;
        border: 2px solid rgba(79, 140, 255, .5);
        opacity: 0;
        animation: mpf-ring 2.8s ease-out infinite;
    }

    @keyframes mpf-ring {
        0% { transform: scale(.8); opacity: .7; }
        100% { transform: scale(1.45); opacity: 0; }
    }

    .mpf__logo:hover .mpf__logo-mark {
        transform: rotate(-12deg) scale(1.08);
    }

    .mpf__logo-text {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: -.02em;
        background: linear-gradient(100deg, #fff 0%, #fff 38%, var(--mpf-accent-bright) 50%, #fff 62%, #fff 100%);
        background-size: 220% 100%;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
        animation: mpf-shimmer 5s ease-in-out infinite;
    }

    @keyframes mpf-shimmer {
        0%, 100% { background-position: 120% 0; }
        50% { background-position: -20% 0; }
    }

    .mpf__tagline {
        margin: 18px 0;
        max-width: 340px;
        line-height: 1.7;
        font-size: 15px;
    }

    .mpf__status {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        font-weight: 600;
        color: #d7e6ff;
        background: rgba(79, 140, 255, .12);
        border: 1px solid rgba(79, 140, 255, .28);
        padding: 7px 14px;
        border-radius: 999px;
    }

    .mpf__status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--mpf-green);
        animation: mpf-pulse 2s infinite;
    }

    @keyframes mpf-pulse {
        0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, .55); }
        70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
        100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }

    .mpf__contact {
        list-style: none;
        margin: 24px 0 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .mpf__contact li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
    }

    .mpf__contact i {
        color: var(--mpf-accent-bright);
        font-size: 15px;
        margin-top: 3px;
        flex: none;
        transition: transform .3s ease;
    }

    .mpf__contact li:hover i {
        transform: scale(1.25) translateY(-1px);
    }

    /* ---------- colunas de navegação ---------- */
    .mpf__nav {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: clamp(1.4rem, 4vw, 2.5rem);
        align-content: start;
    }

    @media (max-width: 575px) {
        .mpf__nav { grid-template-columns: 1fr 1fr; }
    }

    .mpf__col h6 {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .1em;
        color: #fff;
        margin: 0 0 18px;
    }

    .mpf__col nav {
        display: flex;
        flex-direction: column;
        gap: 11px;
    }

    .mpf__col nav a {
        position: relative;
        width: fit-content;
        color: var(--mpf-muted);
        font-size: 14px;
        text-decoration: none;
        transition: color .25s ease, padding-left .25s ease;
    }

    .mpf__col nav a::before {
        content: "";
        position: absolute;
        left: -14px;
        top: 50%;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--mpf-accent-bright);
        transform: translateY(-50%) scale(0);
        transition: transform .25s ease;
    }

    .mpf__col nav a:hover {
        color: #fff;
        padding-left: 14px;
    }

    .mpf__col nav a:hover::before {
        transform: translateY(-50%) scale(1);
    }

    /* ---------- base ---------- */
    .mpf__bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        padding-top: 26px;
    }

    .mpf__bottom p {
        margin: 0;
        font-size: 13px;
        color: var(--mpf-faint);
    }

    .mpf__bottom p b {
        color: #fff;
        font-weight: 600;
    }

    .mpf__legal {
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
    }

    .mpf__legal a {
        font-size: 12px;
        color: var(--mpf-faint);
        text-decoration: none;
        transition: color .25s ease;
    }

    .mpf__legal a:hover { color: var(--mpf-accent-bright); }

    .mpf__legal .mpf__credits {
        padding-left: 18px;
        border-left: 1px solid var(--mpf-line);
        color: var(--mpf-accent-bright);
    }

    .mpf__totop {
        width: 44px;
        height: 44px;
        flex: none;
        display: grid;
        place-items: center;
        border: 0;
        border-radius: 50%;
        cursor: pointer;
        color: #fff;
        background: linear-gradient(135deg, var(--mpf-accent), #1d4ed8);
        box-shadow: 0 12px 26px -10px rgba(23, 92, 221, .9);
        transition: transform .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .mpf__totop i {
        animation: mpf-bob 2.4s ease-in-out infinite;
    }

    .mpf__totop:hover {
        transform: translateY(-4px) scale(1.08);
    }

    .mpf__totop:hover i {
        animation-play-state: paused;
    }

    @keyframes mpf-bob {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    @media (max-width: 991px) {
        .mpf__pawtrail { display: none; }
    }

    @media (max-width: 767px) {
        .mpf { padding-top: 116px; }
        .mpf__foam svg { height: 54px; }
        .mpf__bottom { justify-content: center; text-align: center; }
    }

    @media (prefers-reduced-motion: reduce) and (max-width: 1px) {
        .mpf *,
        .mpf *::before,
        .mpf *::after {
            animation: none !important;
            transition: none !important;
        }

        .mpf__foam,
        .mpf__bubbles,
        .mpf__pawtrail { display: none; }

        .mpf__logo-text {
            background: none;
            color: #fff;
            -webkit-text-fill-color: #fff;
        }
    }
</style>

<footer id="footer" class="mpf">

    {{-- bolhas de banho subindo --}}
    <div class="mpf__bubbles" aria-hidden="true">
        <span style="--x:5%;--s:12px;--d:10s;--delay:0s;--rise:470px;--drift:24px"></span>
        <span style="--x:12%;--s:20px;--d:13s;--delay:2s;--rise:500px;--drift:-18px"></span>
        <span style="--x:19%;--s:8px;--d:8s;--delay:4s;--rise:440px;--drift:16px"></span>
        <span style="--x:27%;--s:16px;--d:12s;--delay:1s;--rise:490px;--drift:-28px"></span>
        <span style="--x:35%;--s:10px;--d:9s;--delay:3s;--rise:460px;--drift:20px"></span>
        <span style="--x:44%;--s:24px;--d:15s;--delay:0.5s;--rise:520px;--drift:-14px"></span>
        <span style="--x:52%;--s:9px;--d:8.5s;--delay:5s;--rise:450px;--drift:26px"></span>
        <span style="--x:60%;--s:14px;--d:11s;--delay:2.5s;--rise:480px;--drift:-22px"></span>
        <span style="--x:68%;--s:18px;--d:13.5s;--delay:1.5s;--rise:505px;--drift:18px"></span>
        <span style="--x:76%;--s:8px;--d:8s;--delay:4.5s;--rise:440px;--drift:-16px"></span>
        <span style="--x:84%;--s:15px;--d:12s;--delay:3.5s;--rise:490px;--drift:22px"></span>
        <span style="--x:91%;--s:11px;--d:10s;--delay:0.8s;--rise:465px;--drift:-24px"></span>
        <span style="--x:96%;--s:22px;--d:14s;--delay:2.2s;--rise:515px;--drift:14px"></span>
        <span style="--x:40%;--s:7px;--d:7.5s;--delay:6s;--rise:430px;--drift:-12px"></span>
        <span style="--x:3%;--s:9px;--d:9.5s;--delay:3.2s;--rise:455px;--drift:18px"></span>
        <span style="--x:9%;--s:6px;--d:7s;--delay:5.5s;--rise:425px;--drift:-14px"></span>
        <span style="--x:16%;--s:14px;--d:11.5s;--delay:1.8s;--rise:485px;--drift:22px"></span>
        <span style="--x:23%;--s:10px;--d:9s;--delay:4.8s;--rise:460px;--drift:-20px"></span>
        <span style="--x:31%;--s:19px;--d:13s;--delay:0.3s;--rise:505px;--drift:16px"></span>
        <span style="--x:38%;--s:8px;--d:8s;--delay:2.7s;--rise:445px;--drift:-18px"></span>
        <span style="--x:48%;--s:13px;--d:10.5s;--delay:3.9s;--rise:475px;--drift:24px"></span>
        <span style="--x:56%;--s:17px;--d:12.5s;--delay:1.2s;--rise:495px;--drift:-16px"></span>
        <span style="--x:64%;--s:7px;--d:7.5s;--delay:5.2s;--rise:430px;--drift:20px"></span>
        <span style="--x:72%;--s:21px;--d:14.5s;--delay:2.9s;--rise:515px;--drift:-22px"></span>
        <span style="--x:80%;--s:9px;--d:8.5s;--delay:4.2s;--rise:450px;--drift:14px"></span>
        <span style="--x:88%;--s:12px;--d:10s;--delay:1.6s;--rise:470px;--drift:-18px"></span>
        <span style="--x:94%;--s:8px;--d:8s;--delay:5.8s;--rise:440px;--drift:16px"></span>
        <span style="--x:66%;--s:6px;--d:7s;--delay:3.4s;--rise:420px;--drift:-12px"></span>
    </div>

    {{-- trilha de patinhas --}}
    <div class="mpf__pawtrail" aria-hidden="true">
        <i class="fa-solid fa-paw" style="--p:0"></i>
        <i class="fa-solid fa-paw" style="--p:1"></i>
        <i class="fa-solid fa-paw" style="--p:2"></i>
        <i class="fa-solid fa-paw" style="--p:3"></i>
        <i class="fa-solid fa-paw" style="--p:4"></i>
        <i class="fa-solid fa-paw" style="--p:5"></i>
    </div>

    <div class="container mpf__inner">

        <div class="mpf__top">

            <div class="mpf__brand" data-aos="fade-up">
                <a href="{{ route('index') }}" class="mpf__logo">
                    <span class="mpf__logo-mark"><i class="fa-solid fa-paw"></i></span>
                    <span class="mpf__logo-text">Mobipet</span>
                </a>

                <p class="mpf__tagline">
                    Agende banho, tosa e consultas em segundos e acompanhe cada etapa do
                    atendimento do seu pet em tempo real.
                </p>

                <span class="mpf__status">
                    <span class="mpf__status-dot"></span>
                    Sistema online &middot; atendimento monitorado ao vivo
                </span>

                <ul class="mpf__contact">
                    <li><i class="bi bi-geo-alt"></i><span>Rua Bela Vista, 100 - Centro, Tambaú - SP</span></li>
                    <li><i class="bi bi-telephone"></i><span>(19) 98943-2384</span></li>
                    <li><i class="bi bi-envelope"></i><span>mobipet@gmail.com</span></li>
                </ul>
            </div>

            <div class="mpf__nav">

                <div class="mpf__col" data-aos="fade-up" data-aos-delay="80">
                    <h6>Navegação</h6>
                    <nav>
                        <a href="{{ route('index') }}">Início</a>
                        <a href="{{ route('sobre') }}">Sobre nós</a>
                        <a href="{{ route('services') }}">Serviços</a>
                        <a href="{{ route('devs') }}">Desenvolvedores</a>
                    </nav>
                </div>

                <div class="mpf__col" data-aos="fade-up" data-aos-delay="160">
                    <h6>Minha conta</h6>
                    <nav>
                        @if (session()->has('id') && session('nivel_acesso') == 'USUARIO')
                            <a href="{{ route('agendamento') }}">Agendamento</a>
                            <a href="{{ route('pets.index') }}">Meus Pets</a>
                            <a href="{{ route('pets.create') }}">Cadastrar Pet</a>
                            <a href="{{ route('perfil') }}">Meu Perfil</a>
                        @elseif(session()->has('id') && session('nivel_acesso') == 'ADMIN')
                            <a href="{{ route('painel-controle') }}">Painel</a>
                            <a href="{{ route('funcionario.agendamentos') }}">Agendamentos</a>
                            <a href="{{ route('funcionario') }}">Cadastrar Funcionário</a>
                            <a href="{{ route('services.create') }}">Cadastrar Serviço</a>
                            <a href="{{ route('perfil') }}">Perfil</a>
                        @elseif(session()->has('id') && session('nivel_acesso') == 'FUNCIONARIO')
                            <a href="{{ route('painel-controle') }}">Painel</a>
                            <a href="{{ route('funcionario.agendamentos') }}">Agendamentos</a>
                            <a href="{{ route('perfil') }}">Perfil</a>
                        @else
                            <a href="{{ route('login') }}">Entrar</a>
                            <a href="{{ route('cadastro') }}">Criar conta</a>
                        @endif
                    </nav>
                </div>

            </div>
        </div>

        <div class="mpf__bottom">
            <p>&copy; {{ date('Y') }} <b>Mobipet</b>. Todos os direitos reservados.</p>
            <div class="mpf__legal">
                <a href="{{ route('devs') }}" class="mpf__credits">Feito pela equipe Mobipet</a>
            </div>
        </div>

    </div>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <script>
        (function () {
            var btn = document.getElementById('mpfTop');
            if (!btn) return;
            var reduce = false; // Mobipet: animações sempre ativas.
            btn.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
            });
        })();
    </script>

</footer>
