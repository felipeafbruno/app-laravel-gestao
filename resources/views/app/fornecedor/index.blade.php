@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class='titulo-pagina-2'>
            <p>Fornecedor</p>    
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
            <div style='width: 30%; margin-left: auto; margin-right: auto;'>
                <form action='{{ route('app.fornecedor.listar') }}' method='POST'>
                    @csrf
                    <input type='text' name='nome' placeholder='Nome' class='borda-preta' />
                    <input type='text' name='site' placeholder='Site' class='borda-preta' />
                    <input type='text' name='uf' placeholder='UF' class='borda-preta' />
                    <input type='text' name='email' placeholder='E-mail' class='borda-preta' />
                    <button type='submit' class='borda-preta'>Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection