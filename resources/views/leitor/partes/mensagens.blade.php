@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{ $erro}}</li>
        @endforeach
    </ul>
@endif

@if(Session::has('sucesso'))
    <b>{{Session::get('sucesso')}}</b>
@endif
