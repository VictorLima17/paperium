<form method="post" action="/login">
    {{csrf_field()}}
    <input type="email" name="email" placeholder="Insira seu e-mail">
    <input type="password" name="password" placeholder="Insira sua senha">
    <button type="submit">Entrar</button>
</form>

<a href="{{url('login/facebook')}}">Login com Facebook</a>

@include('leitor.partes.mensagens')