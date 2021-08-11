@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Adicionar Produto</p>    
        </div>        
        
        <nav class="fornecedor-menu">
            <ul>
                <li><a href='{{ route('produto.index') }}'><img src='{{ asset('/img/icon_return.png') }}' />Voltar</a></li>
                <li><a href=''><img src='{{ asset('/img/icon_search.png') }}' />Consulta</a></li>
            </ul>
        </nav>
    
        <div class="informacao-pagina">
            <div style='width: 30%; margin-left: auto; margin-right: auto;'>
                <form action='{{ route('produto.update', ['produto' => $produto->id]) }}' method='POST'>
                    @csrf
                    {{-- Diretiva @method defini que a requisição é do tipo PUT e que os dados devem ser recuperados através do verbo HTTP PUT  --}}
                    @method('PUT') 
                    <input type='text' name='nome' value='{{ $produto->nome ?? old('nome') }}' placeholder='Nome' class='borda-preta' />
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    
                    <input type='text' name='descricao' value='{{ $produto->descricao ?? old('descricao') }}' placeholder='Descrição' class='borda-preta' />
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    
                    <input type='text' name='peso' value='{{ $produto->peso ?? old('peso') }}' placeholder='Peso' class='borda-preta' />
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    
                    <select name='unidade_id'>
                        <option>-- Selecione a unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type='submit' class='borda-preta'>Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection