@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Listagem de Pedidos</p>    
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('pedido.create') }}'><img src='{{ asset('/img/icon_add.png') }}' />Novo</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
        <div class="informacao-pagina">
            <div style='width: 90%; margin-left: auto; margin-right: auto;'>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href='{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}'>Adicionar Produtos</a></td>
                                <td><a href='{{ route('pedido.show', ['pedido' => $pedido->id]) }}'><img alt='Visualizar' src='{{asset('/img/icon_view.png')}}'/></a></td>
                                <td>
                                    <form id='form_{{ $pedido->id }}' action='{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}' method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type='submit'><img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/></button> --}}
                                        <a href='#' onclick="document.getElementById('form_{{ $pedido->id }}').submit()">
                                            <img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/>
                                        </a>
                                    </form>
                                </td>
                                <td><a href='{{ route('pedido.edit', ['pedido' => $pedido->id]) }}'><img alt='Editar' src='{{asset('/img/icon_edit.png')}}'/></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- método links() permite apresentar a páginação de registro em tela
                    adicionalmento ao clicar no link uma nova requisição será feita para action listar da FornecedorController --}}
                {{-- método appends() anexa os dados da requisição anterior ao link o que 
                    permite manter os dados do filtro de pesquisa --}}
                {{ $pedidos->appends($request)->links() }}
                <br />
                {{ $pedidos->count() }} - Exibe o total de registros por página
                <br />
                {{ $pedidos->total() }} - Exibe o total de registros da consulta
                <br />
                {{ $pedidos->firstItem() }} - Retorna o número do primeiro registro da página
                <br />
                {{ $pedidos->lastItem() }} - Retorna o número do último registro da página 
                
                    
                <br />
                Exibindo {{ $pedidos->count() }} produtos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} até {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>
@endsection