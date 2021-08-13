@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Visualizar Produto</p>    
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('produto.index') }}'><img src='{{ asset('/img/icon_return.png') }}' />Voltar</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
    
        <div class="informacao-pagina">
            <div style='width: 30%; margin-left: auto; margin-right: auto;'>
                <table border="1" width="100%">
                    <tr>
                        <td>Id:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $produto->peso }} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida:</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection