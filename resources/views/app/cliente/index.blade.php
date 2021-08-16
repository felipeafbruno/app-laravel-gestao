@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Listagem de Clientes</p>    
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('cliente.create') }}'><img src='{{ asset('/img/icon_add.png') }}' />Novo</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
        <div class="informacao-pagina">
            <div style='width: 90%; margin-left: auto; margin-right: auto;'>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href='{{ route('cliente.show', ['cliente' => $cliente->id]) }}'><img alt='Visualizar' src='{{asset('/img/icon_view.png')}}'/></a></td>
                                <td>
                                    <form id='form_{{ $cliente->id }}' action='{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}' method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type='submit'><img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/></button> --}}
                                        <a href='#' onclick="document.getElementById('form_{{ $cliente->id }}').submit()">
                                            <img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/>
                                        </a>
                                    </form>
                                </td>
                                <td><a href='{{ route('cliente.edit', ['cliente' => $cliente->id]) }}'><img alt='Editar' src='{{asset('/img/icon_edit.png')}}'/></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- método links() permite apresentar a páginação de registro em tela
                    adicionalmento ao clicar no link uma nova requisição será feita para action listar da FornecedorController --}}
                {{-- método appends() anexa os dados da requisição anterior ao link o que 
                    permite manter os dados do filtro de pesquisa --}}
                {{ $clientes->appends($request)->links() }}
                <br />
                {{ $clientes->count() }} - Exibe o total de registros por página
                <br />
                {{ $clientes->total() }} - Exibe o total de registros da consulta
                <br />
                {{ $clientes->firstItem() }} - Retorna o número do primeiro registro da página
                <br />
                {{ $clientes->lastItem() }} - Retorna o número do último registro da página 
                
                    
                <br />
                Exibindo {{ $clientes->count() }} produtos de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} até {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>

@endsection