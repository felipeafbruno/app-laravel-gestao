@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Adicionar Pedido</p>
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('pedido.index') }}'><img src='{{ asset('/img/icon_return.png') }}' />Voltar</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
    
        <div class="informacao-pagina">
            <div style='width: 30%; margin-left: auto; margin-right: auto;'>
                @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
                @endcomponent
            </div>
        </div>
    </div>

@endsection