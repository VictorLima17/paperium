<header class="cd-main-header">
    <a href="/" class="cd-logo">
        <img src="{{url('img/paperium.png')}}" width="92px" height="50px" alt="Logo"></a>
    <div class="cd-search is-hidden">
        <form action="#0">
            <input type="search" placeholder="Pesquisar...">
        </form>
    </div>
    <a href="#0" class="cd-nav-trigger"><span></span></a>
    <nav class="cd-nav">
        <ul class="cd-top-nav">
            <li class="has-children account">
                @if(Auth::check())
		            <a href="#0">
			            @if(Auth::user()->social)
				            <img src="{{Auth::user()->foto}}" width="250px" height="250px">
			            @else
				            <img src="{{url('/img/leitor/',Auth::user()->foto)}}" width="250px" height="250px">
			            @endif
	                    {{Auth::user()->nome}}
	                </a>
	                <ul>
	                    <li><a href="/perfil">Meu perfil</a></li>
	                    <li><a href="/logout">Sair</a></li>
	                </ul>
				@else
					<a href="">Conta</a>
		            <ul>
			            <li><a href="/login">Entrar</a></li>
			            <li><a href="/cadastro">Cadastro</a></li>
		            </ul>
				@endif()
            </li>
        </ul>
    </nav>
</header>
<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>
            <li class="cd-label">Livros</li>
            <li class="filebook"><a href="/">Digital</a></li>
            <li class="paper"><a href="#0">Físico</a></li>
            <li class="cd-label">Informações</li>
            <li class="contact"><a href="#0">Contato</a></li>
            <li class="about"><a href="#0">Sobre</a></li>
	        @if(Auth::check())
	            <li class="cd-label">Pessoal</li>
	            <li class="read"><a href="#0">Minha Leitura</a></li>
	            <li class="password"><a href="#0">Mudar Senha</a></li>
	            <br>
	        @else
		        <li class="cd-label">Conta</li>
		        <li class="contact"><a href="/login">Entrar</a></li>
		        <li class="contact"><a href="/cadastro">Cadastro</a></li>
		        <br>
			@endif
	        @if(Auth::check())
            <li class="action-btn"><a href="/logout">Sair</a></li>
			@endif
        </ul>
    </nav>