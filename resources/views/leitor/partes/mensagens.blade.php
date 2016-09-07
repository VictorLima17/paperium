@if(count($errors) > 0)
        @foreach ($errors->all() as $erro)
           <script type="text/javascript">
	           $.notify({
		           message: '{{$erro}}'
	           },{
		           type: 'danger'
	           });
           </script>
        @endforeach
@endif

@if(Session::has('sucesso'))
	<script type="text/javascript">
		$.notify({
			message: '{{Session::get('sucesso')}}'
		},{
			type: 'success'
		});
	</script>
@endif
