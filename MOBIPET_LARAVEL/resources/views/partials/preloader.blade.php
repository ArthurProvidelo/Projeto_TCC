{{-- =====================================================================
     MOBIPET — TRANSIÇÃO DE PÁGINA / PRELOADER OFICIAL
     Arquivo: resources/views/partials/preloader.blade.php

     Uso:
         @include('partials.preloader')   (logo após a tag <body>)

     Conceito (no estilo dos loaders CSS do uiverse.io): um cachorrinho
     correndo atrás da bolinha — patas, orelha, rabo e língua animados,
     chão passando por baixo. Embaixo, um osso que "enche" como barra de
     progresso e uma frase que muda conforme a página de destino.

     Autossuficiente: HTML + CSS + JS vanilla + SVG inline.
     Não depende de main.css, main.js, estilo.css, npm ou bibliotecas.
     Namespace exclusivo: .mp-loader / #mp-loader
     ===================================================================== --}}

<style>
    /* =================================================================
       BASE
       ================================================================= */
    #mp-loader {
        --mp-primary: #175CDE;
        --mp-primary-dark: #0F3EA6;
        --mp-navy: #112344;
        --mp-light: #EAF1FE;
        --mp-soft: #DCE8FB;
        --mp-teal: #23C9B5;
        --mp-pink: #FF6B8B;
        --mp-muted: #5B6B86;

        --mp-run: .46s;   /* duração de uma passada */

        position: fixed;
        inset: 0;
        z-index: 2147483647;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        height: 100%;
        min-height: 100dvh;
        overflow: hidden;

        background: linear-gradient(180deg, #ffffff 0%, #f1f6ff 100%);
        font-family: "Montserrat", system-ui, -apple-system, "Segoe UI", sans-serif;

        opacity: 1;
        visibility: visible;
        pointer-events: auto;

        isolation: isolate;

        transition:
            opacity 340ms cubic-bezier(.4, 0, .2, 1),
            visibility 340ms linear;
    }

    #mp-loader.is-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    /* Com o loader escondido nada fica animando por baixo da página. */
    #mp-loader.is-hidden .mp-loader__scene *,
    #mp-loader.is-hidden .mp-loader__bone * {
        animation-play-state: paused;
    }

    /* =================================================================
       PALCO
       ================================================================= */
    #mp-loader .mp-loader__box {
        display: flex;
        flex-direction: column;
        align-items: center;

        opacity: 0;
        transform: translateY(10px);
        animation: mpLoaderEnter 520ms cubic-bezier(.22, 1, .36, 1) 80ms forwards;
    }

    #mp-loader.is-hidden .mp-loader__box {
        animation: mpLoaderExit 300ms cubic-bezier(.4, 0, .2, 1) forwards;
    }

    /* =================================================================
       CENA — cachorrinho correndo
       ================================================================= */
    #mp-loader .mp-loader__scene {
        display: block;
        width: min(270px, 72vw);
        height: auto;
        overflow: visible;
    }

    /* tudo que gira usa a própria caixa como referência */
    #mp-loader .mp-loader__scene * {
        transform-box: fill-box;
    }

    /* chão passando */
    #mp-loader .mp-loader__dash {
        fill: var(--mp-soft);
        animation: mpGround .9s linear infinite;
        animation-delay: calc(var(--i) * -.3s);
    }

    #mp-loader .mp-loader__shadow {
        fill: var(--mp-navy);
        opacity: .12;
        transform-origin: 50% 50%;
        animation: mpShadow var(--mp-run) ease-in-out infinite alternate;
    }

    /* corpo inteiro quica a cada passada */
    #mp-loader .mp-loader__dog {
        animation: mpBounce var(--mp-run) ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__body,
    #mp-loader .mp-loader__head,
    #mp-loader .mp-loader__snout,
    #mp-loader .mp-loader__tail,
    #mp-loader .mp-loader__leg { fill: var(--mp-primary); }

    #mp-loader .mp-loader__leg--far,
    #mp-loader .mp-loader__ear { fill: var(--mp-primary-dark); }

    #mp-loader .mp-loader__belly { fill: var(--mp-light); }
    #mp-loader .mp-loader__collar { fill: var(--mp-teal); }
    #mp-loader .mp-loader__nose,
    #mp-loader .mp-loader__pupil { fill: var(--mp-navy); }
    #mp-loader .mp-loader__eye { fill: #ffffff; }
    #mp-loader .mp-loader__tongue { fill: var(--mp-pink); }

    /* patas: giram a partir do quadril/ombro, em fases opostas */
    #mp-loader .mp-loader__leg {
        transform-origin: 50% 12%;
        animation: mpLeg var(--mp-run) ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__leg--b { animation-direction: alternate-reverse; }

    #mp-loader .mp-loader__tail {
        transform-origin: 50% 92%;
        animation: mpTail .26s ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__headgroup {
        transform-origin: 20% 90%;
        animation: mpHead var(--mp-run) ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__ear {
        transform-origin: 50% 8%;
        animation: mpEar var(--mp-run) ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__tongue {
        transform-origin: 50% 0%;
        animation: mpTongue .3s ease-in-out infinite alternate;
    }

    #mp-loader .mp-loader__blink {
        transform-origin: 50% 50%;
        animation: mpBlink 3.2s linear infinite;
    }

    /* bolinha quicando na frente */
    #mp-loader .mp-loader__ball {
        animation: mpBall .62s cubic-bezier(.3, 0, .7, 1) infinite alternate;
    }

    #mp-loader .mp-loader__ball circle { fill: var(--mp-teal); }

    #mp-loader .mp-loader__ball path {
        fill: none;
        stroke: #ffffff;
        stroke-width: 1.4;
        stroke-linecap: round;
    }

    #mp-loader .mp-loader__ballspin {
        transform-origin: 50% 50%;
        animation: mpSpin .9s linear infinite;
    }

    /* risquinhos de velocidade atrás do cachorro */
    #mp-loader .mp-loader__wind {
        fill: var(--mp-teal);
        opacity: 0;
        animation: mpWind .7s ease-out infinite;
        animation-delay: calc(var(--i) * -.23s);
    }

    /* =================================================================
       OSSO — barra de progresso
       ================================================================= */
    #mp-loader .mp-loader__bone {
        display: block;
        width: min(190px, 54vw);
        height: auto;
        margin-top: 18px;
    }

    #mp-loader .mp-loader__bone-bg { fill: var(--mp-soft); }

    #mp-loader .mp-loader__bone-fill {
        animation: mpBoneFill 1.5s cubic-bezier(.5, 0, .3, 1) infinite;
    }

    /* =================================================================
       FRASE
       ================================================================= */
    #mp-loader .mp-loader__msg {
        min-height: 20px;
        margin: 14px 0 0;
        padding: 0 16px;
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        text-align: center;
        color: var(--mp-muted);

        transition: opacity 180ms ease, transform 180ms ease;
    }

    #mp-loader .mp-loader__msg.is-swapping {
        opacity: 0;
        transform: translateY(6px);
    }

    #mp-loader .mp-loader__dots i {
        display: inline-block;
        font-style: normal;
        animation: mpDot 1.2s ease-in-out infinite;
        animation-delay: calc(var(--i) * .16s);
    }

    /* =================================================================
       ANIMAÇÕES
       ================================================================= */
    @keyframes mpLoaderEnter {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes mpLoaderExit {
        from { opacity: 1; transform: translateY(0) scale(1); }
        to   { opacity: 0; transform: translateY(-8px) scale(.96); }
    }

    @keyframes mpGround {
        from { transform: translateX(0); }
        to   { transform: translateX(-75px); }
    }

    @keyframes mpBounce {
        from { transform: translateY(0); }
        to   { transform: translateY(-6px); }
    }

    @keyframes mpShadow {
        from { transform: scaleX(1); }
        to   { transform: scaleX(.82); }
    }

    @keyframes mpLeg {
        from { transform: rotate(34deg); }
        to   { transform: rotate(-34deg); }
    }

    @keyframes mpTail {
        from { transform: rotate(-38deg); }
        to   { transform: rotate(4deg); }
    }

    @keyframes mpHead {
        from { transform: rotate(-4deg); }
        to   { transform: rotate(5deg); }
    }

    @keyframes mpEar {
        from { transform: rotate(-8deg); }
        to   { transform: rotate(46deg); }
    }

    @keyframes mpTongue {
        from { transform: scaleY(.7); }
        to   { transform: scaleY(1.15); }
    }

    @keyframes mpBlink {
        0%, 92%, 100% { transform: scaleY(1); }
        96%           { transform: scaleY(.1); }
    }

    @keyframes mpBall {
        from { transform: translateY(0); }
        to   { transform: translateY(-34px); }
    }

    @keyframes mpSpin {
        to { transform: rotate(360deg); }
    }

    @keyframes mpWind {
        0%   { opacity: 0; transform: translateX(14px); }
        30%  { opacity: .7; }
        100% { opacity: 0; transform: translateX(-16px); }
    }

    @keyframes mpBoneFill {
        0%   { transform: translateX(-100%); }
        60%  { transform: translateX(0); }
        100% { transform: translateX(100%); }
    }

    @keyframes mpDot {
        0%, 60%, 100% { opacity: .25; transform: translateY(0); }
        30%           { opacity: 1; transform: translateY(-3px); }
    }

    /* =================================================================
       RESPONSIVO
       ================================================================= */
    @media (max-width: 480px) {
        #mp-loader .mp-loader__msg { font-size: 13px; }
    }

    @media (max-height: 380px) {
        #mp-loader .mp-loader__scene { width: min(190px, 60vw); }
        #mp-loader .mp-loader__bone { display: none; }
    }

    @supports (padding: max(0px)) {
        #mp-loader {
            padding:
                max(20px, env(safe-area-inset-top))
                max(20px, env(safe-area-inset-right))
                max(20px, env(safe-area-inset-bottom))
                max(20px, env(safe-area-inset-left));
        }
    }

    /* =================================================================
       REDUÇÃO DE MOVIMENTO
       A animação NÃO é desligada aqui de propósito: com os "Efeitos de
       animação" do Windows desativados (comum nos PCs do laboratório) o
       navegador entra neste modo e o loader ficava totalmente parado.
       Mantemos a corrida, só mais calma e sem os elementos extras.
       ================================================================= */
    @media (prefers-reduced-motion: reduce) {
        #mp-loader { --mp-run: .7s; }

        #mp-loader .mp-loader__wind { display: none; }
    }

    /* =================================================================
       PROTEÇÃO CONTRA PRELOADER LEGADO (#preloader do template)
       ================================================================= */
    #preloader:not(#mp-loader) { display: none !important; }
</style>

{{-- Sem JavaScript: o preloader some e o conteúdo aparece normalmente. --}}
<noscript>
    <style>#mp-loader { display: none !important; }</style>
</noscript>

<div id="mp-loader" class="mp-loader" role="status" aria-label="Carregando">
    <div class="mp-loader__box" aria-hidden="true">

        <svg class="mp-loader__scene" viewBox="0 0 220 120">
            {{-- chão --}}
            <rect class="mp-loader__dash" style="--i:0" x="20"  y="103" width="34" height="4" rx="2" />
            <rect class="mp-loader__dash" style="--i:1" x="95"  y="103" width="22" height="4" rx="2" />
            <rect class="mp-loader__dash" style="--i:2" x="170" y="103" width="34" height="4" rx="2" />

            {{-- vento --}}
            <rect class="mp-loader__wind" style="--i:0" x="14" y="52" width="20" height="3" rx="1.5" />
            <rect class="mp-loader__wind" style="--i:1" x="6"  y="64" width="26" height="3" rx="1.5" />
            <rect class="mp-loader__wind" style="--i:2" x="16" y="76" width="16" height="3" rx="1.5" />

            <ellipse class="mp-loader__shadow" cx="96" cy="103" rx="42" ry="4" />

            <g class="mp-loader__dog">
                {{-- patas de trás (lado de lá) --}}
                <rect class="mp-loader__leg mp-loader__leg--far mp-loader__leg--b" x="62"  y="68" width="9" height="32" rx="4.5" />
                <rect class="mp-loader__leg mp-loader__leg--far"                    x="108" y="68" width="9" height="32" rx="4.5" />

                <rect class="mp-loader__tail" x="50" y="34" width="8" height="28" rx="4" />

                <rect class="mp-loader__body" x="50" y="48" width="78" height="32" rx="16" />
                <rect class="mp-loader__belly" x="66" y="68" width="46" height="10" rx="5" />

                {{-- patas da frente (lado de cá) --}}
                <rect class="mp-loader__leg"                    x="58"  y="68" width="9" height="32" rx="4.5" />
                <rect class="mp-loader__leg mp-loader__leg--b"  x="112" y="68" width="9" height="32" rx="4.5" />

                <g class="mp-loader__headgroup">
                    <rect class="mp-loader__head" x="112" y="24" width="36" height="34" rx="14" />
                    <rect class="mp-loader__snout" x="136" y="38" width="24" height="16" rx="8" />
                    <rect class="mp-loader__tongue" x="145" y="52" width="7" height="11" rx="3.5" />
                    <rect class="mp-loader__nose" x="154" y="39" width="8" height="7" rx="3.5" />
                    <g class="mp-loader__blink">
                        <ellipse class="mp-loader__eye" cx="135" cy="36" rx="3.6" ry="3.8" />
                        <ellipse class="mp-loader__pupil" cx="136" cy="36" rx="1.9" ry="2.1" />
                    </g>
                    <rect class="mp-loader__ear" x="116" y="22" width="12" height="26" rx="6" />
                    <rect class="mp-loader__collar" x="112" y="54" width="18" height="6" rx="3" />
                </g>
            </g>

            {{-- bolinha --}}
            <g class="mp-loader__ball">
                <g class="mp-loader__ballspin">
                    <circle cx="194" cy="94" r="8" />
                    <path d="M188.5 88.5c3 3 3 8 0 11M199.5 88.5c-3 3-3 8 0 11" />
                </g>
            </g>
        </svg>

        {{-- osso de progresso --}}
        <svg class="mp-loader__bone" viewBox="0 0 180 28">
            <defs>
                <clipPath id="mp-loader-bone">
                    <rect x="12" y="8" width="156" height="12" rx="6" />
                    <circle cx="11" cy="8" r="8" /><circle cx="11" cy="20" r="8" />
                    <circle cx="169" cy="8" r="8" /><circle cx="169" cy="20" r="8" />
                </clipPath>
                <linearGradient id="mp-loader-grad" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0" stop-color="#175CDE" />
                    <stop offset="1" stop-color="#23C9B5" />
                </linearGradient>
            </defs>
            <g clip-path="url(#mp-loader-bone)">
                <rect class="mp-loader__bone-bg" x="0" y="0" width="180" height="28" />
                <rect class="mp-loader__bone-fill" x="0" y="0" width="180" height="28" fill="url(#mp-loader-grad)" />
            </g>
        </svg>

        <p class="mp-loader__msg">
            <span class="mp-loader__text">Carregando</span><span class="mp-loader__dots"><i style="--i:0">.</i><i style="--i:1">.</i><i style="--i:2">.</i></span>
        </p>
    </div>
</div>

<script>
(() => {
    'use strict';

    const loader = document.getElementById('mp-loader');
    if (!loader) return;

    /* ------------------------------------------------------------------
       Configuração
       ------------------------------------------------------------------ */
    const FAILSAFE_MS = 7000;   // nunca prender o usuário
    const REVEAL_MS = 60;       // margem contra flash visual
    const MIN_VISIBLE_MS = 900; // tempo mínimo na tela (0 = some assim que carregar)
    const ROTATE_MS = 1900;     // troca de frase enquanto espera

    // Frase de abertura conforme a página de destino (primeira que casar).
    const ROUTE_MESSAGES = [
        [/^\/login\/funcionario|^\/funcionario/, 'Abrindo a área da equipe'],
        [/^\/login|^\/auth\//,                   'Abrindo a portinha pra você'],
        [/^\/cadastro/,                          'Preparando sua ficha de tutor'],
        [/^\/(recuperar|redefinir)-senha/,       'Cuidando da sua senha'],
        [/^\/agendamento/,                       'Abrindo a agenda'],
        [/^\/pets/,                              'Chamando seus pets'],
        [/^\/perfil/,                            'Buscando o seu perfil'],
        [/^\/painel-controle/,                   'Montando o painel'],
        [/^\/servi(ces|cos?)/,                   'Separando nossos serviços'],
        [/^\/sobre/,                             'Contando a nossa história'],
        [/^\/faq/,                               'Juntando as respostas'],
        [/^\/devs/,                              'Chamando quem fez o Mobipet'],
        [/^\/$/,                                 'Voltando pra casa'],
    ];

    // Depois da abertura, estas se revezam.
    const IDLE_MESSAGES = [
        'Farejando o caminho',
        'Abanando o rabinho',
        'Buscando a bolinha',
        'Quase lá',
    ];

    const msgEl = loader.querySelector('.mp-loader__msg');
    const textEl = loader.querySelector('.mp-loader__text');

    /* ------------------------------------------------------------------
       Estado
       ------------------------------------------------------------------ */
    let hidden = false;
    let navigating = false;
    let failsafeTimer = null;
    let rotateTimer = null;
    let idleIndex = 0;

    /* ------------------------------------------------------------------
       Frases
       ------------------------------------------------------------------ */
    const messageFor = (pathname) => {
        const match = ROUTE_MESSAGES.find(([pattern]) => pattern.test(pathname));
        return match ? match[1] : 'Carregando';
    };

    const setMessage = (text, animate) => {
        if (!textEl || !msgEl) return;
        if (!animate) { textEl.textContent = text; return; }

        msgEl.classList.add('is-swapping');
        window.setTimeout(() => {
            textEl.textContent = text;
            msgEl.classList.remove('is-swapping');
        }, 180);
    };

    const stopRotation = () => {
        if (rotateTimer) { clearInterval(rotateTimer); rotateTimer = null; }
    };

    const startRotation = () => {
        stopRotation();
        rotateTimer = window.setInterval(() => {
            setMessage(IDLE_MESSAGES[idleIndex % IDLE_MESSAGES.length], true);
            idleIndex += 1;
        }, ROTATE_MS);
    };

    setMessage(messageFor(window.location.pathname), false);
    startRotation();

    /* ------------------------------------------------------------------
       Esconder / mostrar
       ------------------------------------------------------------------ */
    const hide = () => {
        if (hidden) return;
        hidden = true;
        if (failsafeTimer) { clearTimeout(failsafeTimer); failsafeTimer = null; }
        stopRotation();
        loader.classList.add('is-hidden');
    };

    const show = (message) => {
        navigating = true;
        hidden = false;
        setMessage(message || 'Só um instante', false);
        startRotation();
        loader.classList.remove('is-hidden');

        // Rearma o failsafe toda vez que a tela é mostrada: se o clique que
        // chamou show() não resultar numa navegação de verdade (ex.: um
        // link de âncora "#algo" dispara popstate sem recarregar a página),
        // ninguém fica preso na tela de carregamento pra sempre.
        if (failsafeTimer) clearTimeout(failsafeTimer);
        failsafeTimer = window.setTimeout(() => hide(), FAILSAFE_MS);
    };

    /* ------------------------------------------------------------------
       Carregamento inicial — assim que a página fica interativa
       ------------------------------------------------------------------ */
    // Em página rápida o loader sumiria antes de dar tempo de ver a
    // animação: segura até completar MIN_VISIBLE_MS desde o início da página.
    const finishInitialLoad = () => window.setTimeout(
        () => hide(),
        Math.max(REVEAL_MS, MIN_VISIBLE_MS - performance.now())
    );

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', finishInitialLoad, { once: true });
    } else {
        finishInitialLoad();
    }
    window.addEventListener('load', finishInitialLoad, { once: true });

    /* Failsafe: se algum recurso travar, some mesmo assim. */
    failsafeTimer = window.setTimeout(() => hide(), FAILSAFE_MS);

    /* ------------------------------------------------------------------
       Back / Forward / bfcache
       ------------------------------------------------------------------ */
    window.addEventListener('pageshow', (event) => {
        if (event.persisted) hide();
    });

    // Alguns navegadores (Chrome incluso) disparam popstate também para um
    // simples clique em link de âncora ("#secao") na MESMA página — sem
    // nenhuma navegação real acontecendo. Sem esse filtro, show() é chamado
    // e a tela de carregamento nunca mais é escondida (nada dispara load).
    let lastLocation = window.location.pathname + window.location.search;

    window.addEventListener('popstate', () => {
        const current = window.location.pathname + window.location.search;
        const mudouDePagina = current !== lastLocation;
        lastLocation = current;

        if (!mudouDePagina) return;

        navigating = false;
        show(messageFor(window.location.pathname));
    });

    document.addEventListener('visibilitychange', () => {
        const nav = performance.getEntriesByType('navigation')[0];
        if (document.visibilityState === 'visible' && nav && nav.type === 'back_forward') {
            hide();
        }
    });

    /* ------------------------------------------------------------------
       Deve ignorar o link?
       ------------------------------------------------------------------ */
    const shouldIgnoreLink = (event, link) => {
        if (!link) return true;

        if (event.defaultPrevented || event.button !== 0 ||
            event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return true;

        if (link.hasAttribute('data-no-loader') || link.hasAttribute('download')) return true;

        const target = link.getAttribute('target');
        if (target && target !== '_self') return true;

        if ((link.getAttribute('rel') || '').indexOf('external') !== -1) return true;

        const href = link.getAttribute('href');
        if (!href) return true;

        const raw = href.trim().toLowerCase();
        if (raw === '#' || raw.charAt(0) === '#') return true;

        const ignoredProtocols = ['mailto:', 'tel:', 'sms:', 'whatsapp:', 'javascript:'];
        if (ignoredProtocols.some((p) => raw.startsWith(p))) return true;

        let url;
        try { url = new URL(href, window.location.href); } catch (_) { return true; }

        if (url.origin !== window.location.origin) return true;

        // Só mudança de hash na mesma página.
        if (url.pathname === window.location.pathname &&
            url.search === window.location.search &&
            url.hash !== window.location.hash) return true;

        // Mesmo endereço.
        if (url.href === window.location.href) return true;

        // Logout costuma ter confirmação própria.
        if (/\/logout(\/|$)/.test(url.pathname)) return true;

        return false;
    };

    /* ------------------------------------------------------------------
       Navegação por link — mostra a transição, não bloqueia o browser
       ------------------------------------------------------------------ */
    document.addEventListener('click', (event) => {
        const link = event.target.closest ? event.target.closest('a') : null;
        if (shouldIgnoreLink(event, link)) return;
        if (navigating) return;   // dedupe: cliques sucessivos
        show(messageFor(new URL(link.href, window.location.href).pathname));
    }, true);

    /* ------------------------------------------------------------------
       Formulários — apenas os que realmente navegam
       ------------------------------------------------------------------ */
    document.addEventListener('submit', (event) => {
        const form = event.target;
        if (!(form instanceof HTMLFormElement)) return;
        if (form.hasAttribute('data-no-loader')) return;
        if (form.classList.contains('php-email-form')) return;   // validação inline, sem navegar

        const target = form.getAttribute('target');
        if (target && target !== '_self') return;

        if (navigating) return;
        show();
    }, true);

    /* ------------------------------------------------------------------
       Rede de segurança para redirecionamentos via JS
       ------------------------------------------------------------------ */
    window.addEventListener('beforeunload', () => {
        if (navigating) loader.classList.remove('is-hidden');
    });
})();
</script>

{{-- Monitor de conexão + registro do service worker (página offline) --}}
@include('partials.conexao')
