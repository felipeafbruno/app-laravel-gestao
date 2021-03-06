@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Fornecedor - Listar</p>    
        </div>        
        
        @component('app.layouts._components.menu', [
                'classe' => 'fornecedor-menu', 
                'icon_add' => '/img/icon_add.png', 
                'icon_search' => '/img/icon_search.png',
                'rota_adicionar' => 'app.fornecedor.adicionar',
                'rota_consulta' => 'app.fornecedor'
        ])
        @endcomponent
    
        <div class="informacao-pagina">
            <div style='width: 90%; margin-left: auto; margin-right: auto;'>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href='{{ route('app.fornecedor.editar', $fornecedor->id) }}'><img alt='Editar' src='{{asset('/img/icon_edit.png')}}'/></a></td>
                                <td><a href='{{ route('app.fornecedor.excluir', $fornecedor->id) }}'><img alt='Excluir' src='{{asset('/img/icon_delete.png')}}'/></a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- m??todo links() permite apresentar a p??gina????o de registro em tela
                    adicionalmento ao clicar no link uma nova requisi????o ser?? feita para action listar da FornecedorController --}}
                {{-- m??todo appends() anexa os dados da requisi????o anterior ao link o que 
                    permite manter os dados do filtro de pesquisa --}}
                {{ $fornecedores->appends($request)->links() }}
                {{-- <br />
                {{ $fornecedores->count() }} - Exibe o total de registros por p??gina
                <br />
                {{ $fornecedores->total() }} - Exibe o total de registros da consulta
                <br />
                {{ $fornecedores->firstItem() }} - Retorna o n??mero do primeiro registro da p??gina
                <br />
                {{ $fornecedores->lastItem() }} - Retorna o n??mero do ??ltimo registro da p??gina 
                 --}}
                    
                <br />
                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} at?? {{ $fornecedores->lastItem() }})
            </div>
        </div>
    </div>

@endsection