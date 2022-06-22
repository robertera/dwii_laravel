<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2>Informações da Cidade</h2>
<a href="{{route('cidades.index')}}"><h4>voltar</h4></a>
<h4>ID: {{ $dados['id'] }}</h4>
<h4>Nome: {{ $dados['nome'] }}</h4>
<h4>Porte: {{ $dados['porte'] }}</h4>