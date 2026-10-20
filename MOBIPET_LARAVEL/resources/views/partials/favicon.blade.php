    <!-- Favicons (troca sozinho conforme o tema claro/escuro do navegador) -->
    <link href="{{ asset('assets/img/favicon-light.png') }}" rel="icon" type="image/png" sizes="512x512"
        media="(prefers-color-scheme: light)">
    <link href="{{ asset('assets/img/favicon-dark.png') }}" rel="icon" type="image/png" sizes="512x512"
        media="(prefers-color-scheme: dark)">
    <link href="{{ asset('assets/img/logo_nova_claro_favicon.png') }}" rel="apple-touch-icon">

    <!-- Acessibilidade (global): este partial é o único incluído no <head> de todas as páginas.
         O script inline aplica as preferências salvas antes da primeira pintura, sem piscar. -->
    <link href="{{ asset('assets/css/acessibilidade.css') }}" rel="stylesheet">
    <script>
        (function () {
            try {
                var e = JSON.parse(localStorage.getItem('mobipet_a11y')) || {}, r = document.documentElement;
                if (e.contraste) r.classList.add('a11y-contraste');
                if (e.links) r.classList.add('a11y-links');
                if (e.fs >= 90 && e.fs <= 150 && e.fs != 100) {
                    r.style.setProperty('--a11y-fs', e.fs / 100);
                    r.setAttribute('data-a11y-fs', e.fs);
                }
            } catch (err) { }
        })();
    </script>
    <script src="{{ asset('assets/js/acessibilidade.js') }}" defer></script>
