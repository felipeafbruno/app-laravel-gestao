@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Fornecedor - Listar</p>    
        </div>        
        
        @component('app.layouts._components.menu', ['classe' => 'fornecedor-menu'])
        @endcomponent
    
        <div class="informacao-pagina">
            <div style='width: 90%; margin-left: auto; margin-right: auto;'>
                <table>
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
                                <td><a href='{{ route('app.fornecedor.editar', $fornecedor->id) }}'><img alt='Excluir' src='{{asset('/img/icon_edit.png')}}'/></a></td>
                                <td>Excluir</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- método links() permite apresentar a páginação de registro em tela
                    adicionalmento ao clicar no link uma nova requisição será feita para action listar da FornecedorController --}}
                {{-- método appends() anexa os dados da requisição anterior ao link o que 
                    permite manter os dados do filtro de pesquisa --}}
                {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>
    </div>

@endsection