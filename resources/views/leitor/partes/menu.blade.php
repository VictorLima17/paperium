@if(!Auth::check())
<a href="/login">Login</a>
<a href="/cadastro">Cadastro</a>
@else
    Olá,{{Auth::user()->nome}}
    <a href="/logout">Logout</a>
    <a href="/perfil">Perfil</a>
@endif
<br>