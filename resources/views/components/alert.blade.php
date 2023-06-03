<div class="alert alert-danger">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            ERRO: {{$error}}
        @endforeach
    @endif
</div>