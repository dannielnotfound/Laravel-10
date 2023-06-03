<h1>Deletar Dúvida {{$support->id}}</h1>



<form action="{{route('supports.destroy', $support->id)}}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="DELETAR">
</form>