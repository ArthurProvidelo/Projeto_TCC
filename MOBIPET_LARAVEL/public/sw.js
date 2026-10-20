/* =====================================================================
   MOBIPET — SERVICE WORKER
   Arquivo: public/sw.js  (registrado em resources/views/partials/conexao.blade.php)

   Objetivo: nunca deixar o usuário na tela de erro do navegador quando a
   conexão cai.

   Estratégias:
     - Páginas (navegação) ........ rede primeiro; sem rede → offline.html
     - Arquivos estáticos ......... cache + atualização em segundo plano
       (/assets/*, Google Fonts, favicon)
     - POST, AJAX e o restante .... sempre direto na rede (nada é cacheado)

   Páginas HTML NÃO são guardadas em cache de propósito: elas dependem da
   sessão (dados do cliente, token CSRF) e poderiam vazar entre usuários
   num computador compartilhado.

   Ao alterar este arquivo, suba a VERSAO para limpar os caches antigos.
   ===================================================================== */

const VERSAO = 'mobipet-v2';
const CACHE_ESTATICO = `${VERSAO}-estatico`;
const CACHE_RUNTIME = `${VERSAO}-runtime`;

// URLs relativas ao escopo do SW (funciona também se o site estiver numa subpasta).
const url = (caminho) => new URL(caminho, self.registration.scope).href;

const OFFLINE_URL = url('offline.html');

const PRECACHE = [
    OFFLINE_URL,
    url('assets/img/logo_favicon_transparent.png'),
];

/* ------------------------------------------------------------------
   Instalação: guarda a página offline
   ------------------------------------------------------------------ */
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_ESTATICO)
            .then((cache) => cache.addAll(PRECACHE.map((u) => new Request(u, { cache: 'reload' }))))
            .then(() => self.skipWaiting())
    );
});

/* ------------------------------------------------------------------
   Ativação: remove caches de versões antigas
   ------------------------------------------------------------------ */
self.addEventListener('activate', (event) => {
    event.waitUntil((async () => {
        const nomes = await caches.keys();
        await Promise.all(
            nomes
                .filter((nome) => nome.startsWith('mobipet-') && !nome.startsWith(VERSAO))
                .map((nome) => caches.delete(nome))
        );

        if (self.registration.navigationPreload) {
            await self.registration.navigationPreload.enable();
        }

        await self.clients.claim();
    })());
});

/* ------------------------------------------------------------------
   Requisições
   ------------------------------------------------------------------ */
const ehEstatico = (requisicao) => {
    const u = new URL(requisicao.url);

    if (u.origin === self.location.origin) {
        return u.pathname.includes('/assets/') || u.pathname.endsWith('/favicon.ico');
    }

    return u.hostname === 'fonts.googleapis.com' || u.hostname === 'fonts.gstatic.com';
};

self.addEventListener('fetch', (event) => {
    const requisicao = event.request;

    if (requisicao.method !== 'GET') return;

    // Navegação entre páginas: rede primeiro, página offline como plano B.
    if (requisicao.mode === 'navigate') {
        event.respondWith((async () => {
            try {
                const preload = await event.preloadResponse;
                if (preload) return preload;
                return await fetch(requisicao);
            } catch (erro) {
                const offline = await caches.match(OFFLINE_URL);
                return offline || new Response(
                    '<h1>Sem conexão</h1><p>Verifique sua internet e tente novamente.</p>',
                    { status: 503, headers: { 'Content-Type': 'text/html; charset=utf-8' } }
                );
            }
        })());
        return;
    }

    // CSS, JS, imagens e fontes: responde do cache e atualiza em segundo plano.
    if (ehEstatico(requisicao)) {
        event.respondWith((async () => {
            const cache = await caches.open(CACHE_RUNTIME);
            const emCache = await cache.match(requisicao);

            const daRede = fetch(requisicao)
                .then((resposta) => {
                    if (resposta && (resposta.ok || resposta.type === 'opaque')) {
                        cache.put(requisicao, resposta.clone());
                    }
                    return resposta;
                })
                .catch(() => emCache);

            if (emCache) {
                event.waitUntil(daRede);
                return emCache;
            }

            return (await daRede) || Response.error();
        })());
    }

    // Demais GETs (AJAX, rotas de dados): comportamento normal do navegador.
});
