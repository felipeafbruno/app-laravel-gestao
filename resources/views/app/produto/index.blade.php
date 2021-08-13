@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Listagem de Produtos</p>    
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('produto.create') }}'><img src='{{ asset('/img/icon_add.png') }}' />Novo</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
        <div class="informacao-pagina">
            <div style='width: 90%; margin-left: auto; margin-right: auto;'>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->fornecedor->site }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td><a href='{{ route('produto.show', ['produto' => $produto->id]) }}'><img alt='Visualizar' src='{{asset('/img/icon_view.png')}}'/></a></td>
                                <td><a href='{{ route('produto.edit', ['produto' => $produto->id]) }}'><img alt='Editar' src='{{asset('/img/icon_edit.png')}}'/></a></td>
                                <td>
                                    <form id='form_{{ $produto->id }}' action='{{ route('produto.destroy', ['produto' => $produto->id]) }}' method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type='submit'><img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/></button> --}}
                                        <a href='#' onclick="document.getElementById('form_{{ $produto->id }}').submit()">
                                            <img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- método links() permite apresentar a páginação de registro em tela
                    adicionalmento ao clicar no link uma nova requisição será feita para action listar da FornecedorController --}}
                {{-- método appends() anexa os dados da requisição anterior ao link o que 
                    permite manter os dados do filtro de pesquisa --}}
                {{ $produtos->appends($request)->links() }}
                <br />
                {{ $produtos->count() }} - Exibe o total de registros por página
                <br />
                {{ $produtos->total() }} - Exibe o total de registros da consulta
                <br />
                {{ $produtos->firstItem() }} - Retorna o número do primeiro registro da página
                <br />
                {{ $produtos->lastItem() }} - Retorna o número do último registro da página 
                
                    
                <br />
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} até {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>

@endsection