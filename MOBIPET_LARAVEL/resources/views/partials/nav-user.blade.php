    {{--
    Menu completo do cabeçalho, adaptado ao nível de acesso da sessão.
    Renderiza TODOS os <li> internos do <ul> do #navmenu.

    - Visitante / cliente / funcionário: veem os links institucionais + os do seu nível.
    - ADMIN: vê SOMENTE os menus operacionais (sem Início, Sobre, Serviços, Desenvolvedores).
    O link ativo é detectado pela rota atual (request()->routeIs()).

    Classes de estilo (ver estilo.css):
    - nav-link-pill: link comum do menu, em formato de pílula.
    - nav-btn / nav-btn-outline / nav-btn-solid: ações de destaque (Entrar, Cadastre-se, Sair).
--}}
@php($nivelAcesso = session('nivel_acesso'))

@unless (session()->has('id') && $nivelAcesso === 'ADMIN')
    <li><a href="{{ route('index') }}" @class(['nav-link-pill', 'active' => request()->routeIs('index')])>Início</a></li>
    <li><a href="{{ route('sobre') }}" @class(['nav-link-pill', 'active' => request()->routeIs('sobre')])>Sobre nós</a></li>
    <li><a href="{{ route('services') }}" @class(['nav-link-pill', 'active' => request()->routeIs('services')])>Serviços</a></li>
    <li><a href="{{ route('devs') }}" @class(['nav-link-pill', 'active' => request()->routeIs('devs')])>Desenvolvedores</a></li>
@endunless

@if (session()->has('id') && $nivelAcesso === 'USUARIO')
    {{-- ================= CLIENTE ================= --}}
    <li><a href="{{ route('pets.create') }}" @class(['nav-link-pill', 'active' => request()->routeIs('pets.create')])>Cadastrar Pet</a></li>
    <li><a href="{{ route('agendamento') }}" @class(['nav-link-pill', 'active' => request()->routeIs('agendamento')])>Agendamento</a></li>
    <li><a href="{{ route('pets.index') }}" @class(['nav-link-pill', 'active' => request()->routeIs('pets.index', 'pets.edit', 'pets.show')])>Meus Pets</a></li>
    <li>
        <a href="{{ route('perfil') }}" aria-label="Meu perfil" title="Meu perfil"
            @class(['nav-profile', 'active' => request()->routeIs('perfil')])>
            <span class="nav-profile__badge">@include('partials.icon-perfil')</span>
            <span class="nav-profile__label">Perfil</span>
        </a>
    </li>
    <li><a href="{{ route('logout') }}" class="nav-btn nav-btn-outline">Sair <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>

@elseif (session()->has('id') && $nivelAcesso === 'ADMIN')
    {{-- ================= ADMINISTRADOR ================= --}}
    <li><a href="{{ route('painel-controle') }}" @class(['nav-link-pill', 'active' => request()->routeIs('painel-controle')])>Painel</a></li>
    <li><a href="{{ route('funcionario.agendamentos') }}" @class(['nav-link-pill', 'active' => request()->routeIs('funcionario.agendamentos')])>Agendamentos</a></li>
    <li><a href="{{ route('funcionario') }}" @class(['nav-link-pill', 'active' => request()->routeIs('funcionario')])>Cadastrar Funcionário</a></li>
    <li><a href="{{ route('services.create') }}" @class(['nav-link-pill', 'active' => request()->routeIs('services.create')])>Cadastrar Serviço</a></li>
    <li>
        <a href="{{ route('perfil') }}" aria-label="Meu perfil" title="Meu perfil"
            @class(['nav-profile', 'active' => request()->routeIs('perfil')])>
            <span class="nav-profile__badge">@include('partials.icon-perfil')</span>
            <span class="nav-profile__label">Perfil</span>
        </a>
    </li>
    <li><a href="{{ route('logout') }}" class="nav-btn nav-btn-outline">Sair <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>

@elseif (session()->has('id') && $nivelAcesso === 'FUNCIONARIO')
    {{-- ================= FUNCIONÁRIO ================= --}}
    <li><a href="{{ route('painel-controle') }}" @class(['nav-link-pill', 'active' => request()->routeIs('painel-controle')])>Painel</a></li>
    <li><a href="{{ route('funcionario.agendamentos') }}" @class(['nav-link-pill', 'active' => request()->routeIs('funcionario.agendamentos')])>Agendamentos</a></li>
    <li><a href="{{ route('services.create') }}" @class(['nav-link-pill', 'active' => request()->routeIs('services.create')])>Cadastrar Serviço</a></li>
    <li>
        <a href="{{ route('perfil') }}" aria-label="Meu perfil" title="Meu perfil"
            @class(['nav-profile', 'active' => request()->routeIs('perfil')])>
            <span class="nav-profile__badge">@include('partials.icon-perfil')</span>
            <span class="nav-profile__label">Perfil</span>
        </a>
    </li>
    <li><a href="{{ route('logout') }}" class="nav-btn nav-btn-outline">Sair <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>

@else
    {{-- ================= VISITANTE =================
         "Entrar" abre um menu com as duas portas de acesso (cliente ou
         funcionário), em vez de deixar "Sou Funcionário" solto no menu. --}}
    <li class="dropdown nav-entry">
        <a href="{{ route('login') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-no-loader
            @class(['nav-btn nav-btn-outline dropdown-toggle', 'active' => request()->routeIs('login', 'login.funcionario')])>
            Entrar
        </a>
        <ul class="dropdown-menu dropdown-menu-end nav-entry-menu">
            <li>
                <a href="{{ route('login') }}" @class(['dropdown-item nav-entry-item', 'active' => request()->routeIs('login')])>
                    <span class="nav-entry-item__icon"><i class="bi bi-person"></i></span>
                    <span>
                        <strong>Sou cliente</strong>
                        <small>Agendar e acompanhar meus pets</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('login.funcionario') }}" @class(['dropdown-item nav-entry-item', 'active' => request()->routeIs('login.funcionario')])>
                    <span class="nav-entry-item__icon"><i class="bi bi-briefcase"></i></span>
                    <span>
                        <strong>Sou funcionário</strong>
                        <small>Painel da equipe</small>
                    </span>
                </a>
            </li>
        </ul>
    </li>
    <li><a href="{{ route('cadastro') }}" @class(['nav-btn nav-btn-solid', 'active' => request()->routeIs('cadastro')])>Cadastre-se</a></li>
@endif
