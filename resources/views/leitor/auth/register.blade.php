<form method="post" action="{{url('/register')}}">
    {{csrf_field()}}
    <input type="text" name="nome" placeholder="Insira seu nome">
    <input type="email" name="email" placeholder="Insira seu e-mail">
    <input type="password" name="password" placeholder="Insira sua senha">
    <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
    <button type="submit">Cadastrar</button>
</form>

@include('leitor.partes.mensagens')