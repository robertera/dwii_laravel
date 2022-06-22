<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2>Alterar Cidade</h2>
<form action="{{ route('cidades.update', $dados['id']) }}" method="POST">
   <!-- Token de Segurança -->
   <!-- Define o método de submissão como PUT -->
   @csrf
   @method('PUT')
   <a href="{{route('cidades.index')}}"><h4>voltar</h4></a>
   <label>Nome: </label> <input type='text' name='nome' value='{{$dados['nome']}}'>
   <label>Porte: </label> <input type='text' name='porte' value='{{$dados['porte']}}'>
   <input type="submit" value="Salvar">
</form>