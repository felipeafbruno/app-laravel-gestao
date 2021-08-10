<nav class="{{ $classe }}">
    <ul>
        <li><a href='{{ route('app.fornecedor.adicionar') }}'><img src='{{ asset('/img/icon_add.png') }}' />Novo</a></li>
        <li><a href='{{ route('app.fornecedor') }}'><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
    </ul>
</nav>