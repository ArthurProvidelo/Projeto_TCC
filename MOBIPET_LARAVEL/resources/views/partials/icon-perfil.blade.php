{{--
    Ícone de perfil no padrão Iconly (estilo "Bulk"), SVG embutido para não
    depender de CDN. Herda a cor via currentColor. Use dentro do header:
        <a href="{{ route('perfil') }}" class="nav-profile">
            <span class="nav-profile__badge">@include('partials.icon-perfil')</span>
            <span class="nav-profile__label">Perfil</span>
        </a>
--}}
<svg class="iconly" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
    <path opacity="0.4"
        d="M12 14.17c-4.28 0-7.9 0.7-7.9 3.5 0 2.81 3.6 3.5 7.9 3.5 4.28 0 7.9-0.69 7.9-3.5 0-2.8-3.62-3.5-7.9-3.5Z"
        fill="currentColor" />
    <path d="M12 11.96A4.98 4.98 0 1 0 12 2a4.98 4.98 0 0 0 0 9.96Z" fill="currentColor" />
</svg>
