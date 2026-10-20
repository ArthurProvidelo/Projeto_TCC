{{-- =====================================================================
     MOBIPET — MONITOR DE CONEXÃO + SERVICE WORKER
     Arquivo: resources/views/partials/conexao.blade.php

     Incluído automaticamente pelo partials/preloader.blade.php, então vale
     para todas as páginas que já usam o preloader.

     O que faz:
       1. Registra o service worker (public/sw.js), que mostra a página
          public/offline.html quando uma navegação falha por falta de rede.
       2. Se a conexão cair com a página aberta, exibe um aviso no rodapé
          e SEGURA o usuário: links e formulários não saem da página até a
          internet voltar (assim ninguém perde o que já preencheu).
       3. Quando a conexão volta, avisa e libera tudo de novo.

     Namespace exclusivo: .mp-net / #mp-net
     ===================================================================== --}}

<style>
    #mp-net {
        --mp-net-ink: #0f1b34;
        --mp-net-amber: #f59e0b;
        --mp-net-green: #16a34a;

        position: fixed;
        left: 50%;
        bottom: max(20px, env(safe-area-inset-bottom));
        z-index: 2147483000;

        display: flex;
        align-items: center;
        gap: 12px;
        width: max-content;
        max-width: calc(100% - 32px);
        padding: 12px 18px 12px 14px;

        border-radius: 999px;
        background: var(--mp-net-ink);
        color: #fff;
        box-shadow: 0 24px 50px -18px rgba(15, 27, 52, .6);
        font-family: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
        font-size: .92rem;
        line-height: 1.35;

        opacity: 0;
        visibility: hidden;
        transform: translate(-50%, 20px);
        transition: opacity .3s ease, transform .3s cubic-bezier(.22, 1, .36, 1), visibility .3s;
    }

    #mp-net.is-visible {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, 0);
    }

    #mp-net .mp-net__icon {
        flex: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: var(--mp-net-amber);
        font-size: 1rem;
    }

    #mp-net.is-online .mp-net__icon { background: var(--mp-net-green); }

    #mp-net strong {
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
    }

    #mp-net.is-shake { animation: mpNetShake .45s ease; }

    @keyframes mpNetShake {
        0%, 100% { transform: translate(-50%, 0); }
        25%      { transform: translate(calc(-50% - 6px), 0); }
        75%      { transform: translate(calc(-50% + 6px), 0); }
    }

    @media (prefers-reduced-motion: reduce) {
        #mp-net { transition: opacity .2s linear, visibility .2s; }
        #mp-net.is-shake { animation: none; }
    }
</style>

<div id="mp-net" role="status" aria-live="polite">
    <span class="mp-net__icon" aria-hidden="true"><i class="bi bi-wifi-off"></i></span>
    <span class="mp-net__text"></span>
</div>

<script>
(() => {
    'use strict';

    /* ------------------------------------------------------------------
       1. Service worker
       ------------------------------------------------------------------ */
    if ('serviceWorker' in navigator && window.isSecureContext) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register(@json(asset('sw.js'))).catch(() => {});
        });
    }

    /* ------------------------------------------------------------------
       2. Aviso de conexão
       ------------------------------------------------------------------ */
    const box = document.getElementById('mp-net');
    if (!box) return;

    const icon = box.querySelector('i');
    const text = box.querySelector('.mp-net__text');
    let hideTimer = null;

    const MSG_OFFLINE = '<strong>Você está sem internet.</strong> Fique nesta página — nada do que você preencheu será perdido.';
    const MSG_BLOQUEIO = '<strong>Sem conexão no momento.</strong> Aguarde a internet voltar para continuar.';
    const MSG_ONLINE = '<strong>Conexão restabelecida!</strong> Pode continuar normalmente.';

    const show = (html, online) => {
        if (hideTimer) { clearTimeout(hideTimer); hideTimer = null; }
        text.innerHTML = html;
        box.classList.toggle('is-online', online);
        icon.className = online ? 'bi bi-wifi' : 'bi bi-wifi-off';
        box.classList.add('is-visible');
        if (online) hideTimer = setTimeout(() => box.classList.remove('is-visible'), 3500);
    };

    const shake = () => {
        box.classList.remove('is-shake');
        void box.offsetWidth;   // reinicia a animação
        box.classList.add('is-shake');
    };

    window.addEventListener('offline', () => show(MSG_OFFLINE, false));
    window.addEventListener('online', () => show(MSG_ONLINE, true));

    if (navigator.onLine === false) show(MSG_OFFLINE, false);

    /* ------------------------------------------------------------------
       3. Segura o usuário na página enquanto estiver offline
          (capturado no window, antes do preloader, que escuta no document)
       ------------------------------------------------------------------ */
    const bloquear = (event) => {
        event.preventDefault();
        event.stopPropagation();
        show(MSG_BLOQUEIO, false);
        shake();
    };

    window.addEventListener('click', (event) => {
        if (navigator.onLine !== false) return;

        const link = event.target.closest ? event.target.closest('a[href]') : null;
        if (!link || event.button !== 0 || event.ctrlKey || event.metaKey || event.shiftKey) return;

        const href = (link.getAttribute('href') || '').trim();
        if (!href || href.charAt(0) === '#' || /^(mailto|tel|sms|javascript):/i.test(href)) return;

        let url;
        try { url = new URL(href, window.location.href); } catch (_) { return; }
        if (url.pathname === window.location.pathname && url.search === window.location.search) return;

        bloquear(event);
    }, true);

    window.addEventListener('submit', (event) => {
        if (navigator.onLine !== false) return;
        bloquear(event);
    }, true);
})();
</script>
