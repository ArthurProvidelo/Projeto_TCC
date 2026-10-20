/* =====================================================================
   MOBIPET — Acessibilidade (global)
   Carregado em todas as páginas via partials/favicon.blade.php.
   Monta o botão flutuante + dropdown e guarda as preferências no
   localStorage (chave "mobipet_a11y"), então o que for ativado numa
   página continua ativo em todas as outras até ser desativado.
   ===================================================================== */
(function () {
    'use strict';

    var CHAVE = 'mobipet_a11y';
    var FS_MIN = 90, FS_MAX = 150, FS_PASSO = 10;
    var PADRAO = { fs: 100, contraste: false, leitor: false, links: false };
    var root = document.documentElement;
    var synth = window.speechSynthesis;
    var temFala = !!(synth && window.SpeechSynthesisUtterance);

    /* ---------------- Estado ---------------- */
    function ler() {
        var e = {};
        try { e = JSON.parse(localStorage.getItem(CHAVE)) || {}; } catch (err) { }
        var fs = parseInt(e.fs, 10);
        return {
            fs: fs >= FS_MIN && fs <= FS_MAX ? fs : PADRAO.fs,
            contraste: !!e.contraste,
            leitor: !!e.leitor && temFala,
            links: !!e.links
        };
    }

    function salvar() {
        try { localStorage.setItem(CHAVE, JSON.stringify(estado)); } catch (err) { }
    }

    var estado = ler();

    /* ---------------- Tamanho do texto ----------------
       rem/em acompanham o font-size do <html>. Os font-size em px das
       folhas de estilo são trocados (uma vez só) por
       calc(px * var(--a11y-fs)), assim o texto inteiro escala junto. */
    var pxReescrito = false;

    function reescreverDeclaracao(style, seletor) {
        var v = style.getPropertyValue('font-size');
        if (!/^[\d.]+px$/.test(v) || (seletor && seletor.indexOf('a11y-') !== -1)) return;
        style.setProperty('font-size', 'calc(' + v + ' * var(--a11y-fs, 1))', style.getPropertyPriority('font-size'));
    }

    function percorrer(regras) {
        for (var i = 0; i < regras.length; i++) {
            var r = regras[i];
            if (r.style && r.selectorText) reescreverDeclaracao(r.style, r.selectorText);
            if (r.cssRules && r.cssRules.length) percorrer(r.cssRules);
        }
    }

    function reescreverPx() {
        if (pxReescrito) return;
        pxReescrito = true;
        Array.prototype.forEach.call(document.styleSheets, function (folha) {
            // Folhas de outro domínio (Google Fonts, VLibras) não deixam ler as regras.
            try { percorrer(folha.cssRules); } catch (err) { }
        });
        Array.prototype.forEach.call(document.querySelectorAll('[style*="font-size"]'), function (el) {
            if (!el.closest('.a11y-widget')) reescreverDeclaracao(el.style);
        });
    }

    /* ---------------- Aplicar no documento ---------------- */
    function aplicar() {
        root.classList.toggle('a11y-contraste', estado.contraste);
        root.classList.toggle('a11y-links', estado.links);
        root.classList.toggle('a11y-leitor', estado.leitor);

        if (estado.fs !== 100) {
            reescreverPx();
            root.style.setProperty('--a11y-fs', estado.fs / 100);
            root.setAttribute('data-a11y-fs', estado.fs);
        } else {
            root.style.removeProperty('--a11y-fs');
            root.removeAttribute('data-a11y-fs');
        }

        if (!widget) return;
        var personalizado = estado.fs !== 100 || estado.contraste || estado.leitor || estado.links;
        widget.classList.toggle('is-custom', personalizado);
        widget.classList.toggle('is-reader', estado.leitor);
        ui.valor.textContent = estado.fs + '%';
        ui.menos.disabled = estado.fs <= FS_MIN;
        ui.mais.disabled = estado.fs >= FS_MAX;
        ui.contraste.setAttribute('aria-pressed', estado.contraste);
        ui.leitor.setAttribute('aria-pressed', estado.leitor);
        ui.links.setAttribute('aria-pressed', estado.links);
    }

    function mudar(alteracoes, aviso) {
        for (var k in alteracoes) estado[k] = alteracoes[k];
        salvar();
        aplicar();
        if (aviso && ui.status) ui.status.textContent = aviso;
    }

    /* ---------------- Leitor de texto ---------------- */
    var falaAtual = 0;
    var elLendo = null;

    function marcar(el) {
        if (elLendo) elLendo.classList.remove('a11y-lendo');
        elLendo = el || null;
        if (elLendo) elLendo.classList.add('a11y-lendo');
    }

    function setFalando(sim) {
        if (widget) widget.classList.toggle('is-speaking', sim);
        if (!sim) marcar(null);
    }

    function parar() {
        falaAtual++;
        if (temFala) synth.cancel();
        setFalando(false);
    }

    function vozPt() {
        var vozes = synth.getVoices();
        var br = null, pt = null;
        for (var i = 0; i < vozes.length; i++) {
            var lang = vozes[i].lang.replace('_', '-').toLowerCase();
            if (!br && lang === 'pt-br') br = vozes[i];
            if (!pt && lang.indexOf('pt') === 0) pt = vozes[i];
        }
        return br || pt;
    }

    // O Chrome corta falas muito longas, então o texto vai em blocos curtos.
    function emBlocos(texto) {
        var frases = texto.replace(/\s+/g, ' ').match(/[^.!?;:]+[.!?;:]*\s*/g) || [];
        var blocos = [], atual = '';
        frases.forEach(function (f) {
            if (atual && (atual + f).length > 220) { blocos.push(atual); atual = ''; }
            atual += f;
        });
        if (atual.trim()) blocos.push(atual);
        return blocos;
    }

    function falar(texto, el) {
        if (!temFala) return;
        texto = (texto || '').trim();
        if (!texto) return;
        parar();
        var id = falaAtual;
        var blocos = emBlocos(texto);
        var voz = vozPt();
        marcar(el);
        setFalando(true);
        blocos.forEach(function (bloco, i) {
            var u = new SpeechSynthesisUtterance(bloco);
            u.lang = 'pt-BR';
            if (voz) u.voice = voz;
            if (i === blocos.length - 1) {
                u.onend = u.onerror = function () {
                    if (id === falaAtual) setFalando(false);
                };
            }
            synth.speak(u);
        });
    }

    function foraDoLeitor(el) {
        return !el || !el.closest || el.closest('.a11y-widget, [vw], #mp-loader, script, style');
    }

    function lerPagina() {
        var alvo = document.querySelector('main') || document.body;
        var copia = alvo.cloneNode(true);
        Array.prototype.forEach.call(
            copia.querySelectorAll('.a11y-widget, [vw], #mp-loader, script, style, noscript, [aria-hidden="true"]'),
            function (n) { n.remove(); }
        );
        // innerText precisa do elemento na página para respeitar quebras e ocultos.
        copia.style.cssText = 'position:fixed;left:-99999px;top:0;width:800px;';
        copia.setAttribute('aria-hidden', 'true');
        document.body.appendChild(copia);
        var texto = copia.innerText;
        copia.remove();
        falar(texto.replace(/\n+/g, '. '));
    }

    var BLOCO = 'p,h1,h2,h3,h4,h5,h6,li,td,th,dt,dd,label,blockquote,figcaption,summary';
    var INTERATIVO = 'a,button,input,select,textarea,[role="button"],[contenteditable="true"]';

    function rotulo(el) {
        // Nunca lê em voz alta o que foi digitado num campo de senha.
        var valor = el.type === 'password' ? '' : el.value;
        var txt = el.getAttribute('aria-label') || el.innerText || valor ||
            el.getAttribute('placeholder') || el.getAttribute('title') || '';
        if (el.id && /^(INPUT|SELECT|TEXTAREA)$/.test(el.tagName)) {
            var lab = document.querySelector('label[for="' + el.id.replace(/"/g, '\\"') + '"]');
            if (lab) txt = lab.innerText + '. ' + txt;
        }
        return txt;
    }

    // Leitor ativo: clicar num texto lê o bloco; selecionar um trecho lê a seleção;
    // navegar por Tab lê o link/botão/campo focado.
    document.addEventListener('click', function (e) {
        if (!estado.leitor || foraDoLeitor(e.target)) return;
        if (String(window.getSelection()).trim()) return;
        if (e.target.closest(INTERATIVO)) return;
        var bloco = e.target.closest(BLOCO);
        if (!bloco && e.target.tagName === 'IMG' && e.target.alt) return falar(e.target.alt, e.target);
        if (bloco) falar(bloco.innerText, bloco);
    });

    document.addEventListener('mouseup', function (e) {
        if (!estado.leitor || foraDoLeitor(e.target)) return;
        var sel = String(window.getSelection()).trim();
        if (sel) falar(sel);
    });

    document.addEventListener('focusin', function (e) {
        var el = e.target;
        if (!estado.leitor || foraDoLeitor(el) || !el.matches(INTERATIVO)) return;
        try { if (!el.matches(':focus-visible')) return; } catch (err) { }
        falar(rotulo(el), el);
    });

    // Sem isto o Chrome continua falando depois de trocar de página.
    window.addEventListener('pagehide', function () { if (temFala) synth.cancel(); });

    /* ---------------- Widget ---------------- */
    var widget = null;
    var ui = {};

    function svg(conteudo) {
        return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">' + conteudo + '</svg>';
    }

    var ICONE = {
        acesso: svg('<circle cx="12" cy="12" r="10"/><circle class="a11y-fill" cx="12" cy="7" r="1.4"/><path d="M7 10.2l5 1.1 5-1.1M12 11.3v4M12 15.3l-2.4 3.9M12 15.3l2.4 3.9"/>'),
        fechar: svg('<path d="M6 6l12 12M18 6L6 18"/>'),
        contraste: svg('<circle cx="12" cy="12" r="9"/><path class="a11y-fill" d="M12 3a9 9 0 0 1 0 18z"/>'),
        leitor: svg('<path d="M11 5L6 9H3v6h3l5 4V5z"/><path d="M15.5 8.5a5 5 0 0 1 0 7M18.5 5.5a9 9 0 0 1 0 13"/>'),
        links: svg('<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>'),
        tocar: svg('<circle cx="12" cy="12" r="9"/><path class="a11y-fill" d="M10 8.2l6 3.8-6 3.8z"/>'),
        parar: svg('<rect class="a11y-fill" x="6.5" y="6.5" width="11" height="11" rx="2.5"/>'),
        restaurar: svg('<path d="M3.5 12a8.5 8.5 0 1 0 2.7-6.2"/><path d="M3.5 4v5h5"/>')
    };

    function montar() {
        if (widget || !document.body) return;
        widget = document.createElement('div');
        widget.className = 'a11y-widget';
        widget.innerHTML =
            '<button type="button" class="a11y-fab" aria-label="Opções de acessibilidade" title="Acessibilidade"' +
            ' aria-expanded="false" aria-controls="a11yPanel">' + ICONE.acesso + '</button>' +
            '<button type="button" class="a11y-stop-float" data-a11y="parar">' + ICONE.parar + 'Parar leitura</button>' +
            '<div class="a11y-panel" id="a11yPanel" role="dialog" aria-label="Acessibilidade">' +
            '<div class="a11y-head"><h2 class="a11y-title">Acessibilidade</h2>' +
            '<button type="button" class="a11y-close" data-a11y="fechar" aria-label="Fechar">' + ICONE.fechar + '</button></div>' +
            '<span class="a11y-label" id="a11ySizeLabel">Tamanho do texto</span>' +
            '<div class="a11y-size" role="group" aria-labelledby="a11ySizeLabel">' +
            '<button type="button" data-a11y="menos" aria-label="Diminuir texto" title="Diminuir texto">A&minus;</button>' +
            '<output data-a11y="valor">100%</output>' +
            '<button type="button" data-a11y="mais" aria-label="Aumentar texto" title="Aumentar texto">A+</button></div>' +
            '<span class="a11y-label">Visual e leitura</span>' +
            '<div class="a11y-grid">' +
            '<button type="button" class="a11y-tile" data-a11y="contraste" aria-pressed="false">' + ICONE.contraste + 'Alto contraste</button>' +
            '<button type="button" class="a11y-tile" data-a11y="links" aria-pressed="false">' + ICONE.links + 'Destacar links</button>' +
            '<button type="button" class="a11y-tile" data-a11y="leitor" aria-pressed="false">' + ICONE.leitor + 'Leitor de texto</button>' +
            '<button type="button" class="a11y-tile" data-a11y="pagina">' + ICONE.tocar + 'Ler a página</button>' +
            '</div>' +
            '<p class="a11y-hint">Leitor ativo: clique em um texto ou selecione um trecho para ouvir.</p>' +
            '<button type="button" class="a11y-stop" data-a11y="parar">' + ICONE.parar + 'Parar leitura</button>' +
            '<button type="button" class="a11y-reset" data-a11y="restaurar">' + ICONE.restaurar + 'Restaurar padrão</button>' +
            '<span class="a11y-sr" role="status" aria-live="polite" data-a11y="status"></span>' +
            '</div>';
        document.body.appendChild(widget);

        ui.fab = widget.querySelector('.a11y-fab');
        ['menos', 'mais', 'valor', 'contraste', 'links', 'leitor', 'pagina', 'status'].forEach(function (n) {
            ui[n] = widget.querySelector('[data-a11y="' + n + '"]');
        });

        if (!temFala) {
            [ui.leitor, ui.pagina].forEach(function (b) {
                b.disabled = true;
                b.title = 'Seu navegador não oferece leitura em voz alta.';
            });
        }

        ui.fab.addEventListener('click', function () { abrir(!widget.classList.contains('is-open')); });

        widget.addEventListener('click', function (e) {
            var botao = e.target.closest('[data-a11y]');
            if (!botao || botao.disabled) return;
            switch (botao.getAttribute('data-a11y')) {
                case 'fechar': abrir(false); ui.fab.focus(); break;
                case 'menos': tamanho(-FS_PASSO); break;
                case 'mais': tamanho(FS_PASSO); break;
                case 'contraste':
                    mudar({ contraste: !estado.contraste }, 'Alto contraste ' + (estado.contraste ? 'desativado' : 'ativado'));
                    break;
                case 'links':
                    mudar({ links: !estado.links }, 'Destaque de links ' + (estado.links ? 'desativado' : 'ativado'));
                    break;
                case 'leitor':
                    if (estado.leitor) parar();
                    mudar({ leitor: !estado.leitor });
                    if (estado.leitor) falar('Leitor de texto ativado. Clique em um texto ou selecione um trecho para ouvir.');
                    break;
                case 'pagina': lerPagina(); break;
                case 'parar': parar(); break;
                case 'restaurar':
                    parar();
                    mudar({ fs: PADRAO.fs, contraste: false, leitor: false, links: false }, 'Preferências restauradas');
                    break;
            }
        });

        document.addEventListener('click', function (e) {
            if (!widget.contains(e.target)) abrir(false);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (widget.classList.contains('is-speaking')) parar();
            if (widget.classList.contains('is-open')) { abrir(false); ui.fab.focus(); }
        });

        aplicar();
    }

    function abrir(sim) {
        widget.classList.toggle('is-open', sim);
        ui.fab.setAttribute('aria-expanded', sim);
    }

    function tamanho(delta) {
        var novo = Math.min(FS_MAX, Math.max(FS_MIN, estado.fs + delta));
        mudar({ fs: novo }, 'Tamanho do texto em ' + novo + ' por cento');
    }

    /* ---------------- Inicialização ---------------- */
    aplicar();

    if (document.body) montar();
    else document.addEventListener('DOMContentLoaded', montar);

    // Mantém abas abertas e páginas vindas do "voltar" em sincronia.
    function sincronizar() { estado = ler(); aplicar(); }
    window.addEventListener('storage', function (e) { if (e.key === CHAVE || e.key === null) sincronizar(); });
    window.addEventListener('pageshow', function (e) { if (e.persisted) sincronizar(); });
})();
