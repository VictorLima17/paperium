<!-- aqui começa o menu -->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper green">
            <a href="#!" class="brand-logo center"> Logo </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large">
                <i class="material-icons">menu</i>
            </a>
            <ul class="side-nav" id="mobile-demo">
                <li><a class="modal-trigger" href="#cadastro">Cadastro</a></li>
                <li><a class="modal-trigger" href="#login">Login</a></li>
                <li><a href="home.php">Acervo Digital</a></li>
                <li><a href="acervo_fisico.php">Acervo Fisico</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                           </ul>
        </div>
    </nav>
</div>
<!-- aqui termina o menu -->
@include('leitor.auth.login')
@include('leitor.auth.register')
