<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2>Lista de Cidade</h2>
<table class = "table">
<a href="{{ route('cidades.create') }}"><h6>Nova Cidade</h6></a>
</table>
<table>
   <thead>
       <tr>
           <th>ID</th>
           <th>NOME</th>
           <th>PORTE</th>
           <th>EDITAR</th>
           <th>REMOVER</th>
       </tr>
   </thead>
   <tbody>
       
       @foreach ($cidades as $item)
           <tr>
               
               <td>{{ $item['id'] }}</td>
               <td>{{ $item['nome'] }}</td>
               <td>{{ $item['porte'] }}</td>
               <td><a href="{{ route('cidades.edit', $item['id']) }}">editar</a></td>
               <td>
                   <form action="{{ route('cidades.destroy', $item['id']) }}" method="POST">
                       <!-- Token de Segurança -->
                       <!-- Define o método de submissão como delete -->
                       @csrf
                       @method('DELETE')
                       <input type='submit' value='remover'>
                   </form>
               </td>
           </tr>
       @endforeach
   </tbody>
</table>