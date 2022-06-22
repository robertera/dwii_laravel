<h2>Cadastrar Cidade</h2>
<form action="{{ route('cidade.store') }}" method="POST">
<!-- Token de segurança salvo na sessão, verificar o formulário submetido -->
@csrf
<a href="{{route('cidade.index')}}"><h4>voltar</h4></a>
<label>Cidade: </label> <input type='text' name='cidade'>
<label>Porte: </label> <input type='text' name='porte'>
<input type="submit" value="Salvar">
</form>