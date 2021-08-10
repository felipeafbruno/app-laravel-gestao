<nav class="{{ $classe }}">
    <ul>
        <li><a href='{{ route($rota_adicionar) }}'><img src='{{ asset($icon_add) }}' />Novo</a></li>
        <li><a href='{{ route($rota_consulta) }}'><img src='{{ asset($icon_search) }}' />Consulta</a></li>
    </ul>
</nav>