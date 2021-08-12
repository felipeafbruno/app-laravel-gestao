@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            {{-- @if(isset($produto->id))
                <p>Editar Produto</p>        
            @else
                <p>Adicionar Produto</p>        
            @endif --}}
            <p>Editar Detalhes do Produto</p>
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('produto.index') }}'><img src='{{ asset('/img/icon_return.png') }}' />Voltar</a></li>
            </ul>
        </nav>
    
        <div class="informacao-pagina">
            <h4>Produto</h4>
            <div>Nome: {{ $produto_detalhe->produto->nome }}</div>
            <br />
            <div>Descrição: {{ $produto_detalhe->produto->descricao }}</div>
            <br />

            <div style='width: 30%; margin-left: auto; margin-right: auto;'>
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>

@endsection