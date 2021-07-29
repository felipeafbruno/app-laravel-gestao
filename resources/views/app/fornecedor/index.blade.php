<h3>Fornecedor</h3>

{{-- {{ 'Texto teste' }} --}}
{{-- <?= 'Texto teste' ?> --}}
{{-- Maneira de criar um comentário no Blade --}}

{{-- Maneira de criar um bloco php dentro da Blade --}}
@php
    // Podemos utilizar código PHP puro
@endphp

{{-- @dd() devolve em tela uma descrição do Array e finaliza a renderização --}}
{{-- @dd($fornecedores) --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados!</h3>
@elseif(count($fornecedores) > 10) 
    <h3>Existem vários fornecedores cadastrados!</h3>
@else
    <h3>Existem não existem fornecedores cadastrados!</h3>
@endif --}}

{{-- @unless executa se a condição for false --}}
{{-- Fornecedore: {{ $fornecedores[0]['name'] }}
<br />
Status: {{ $fornecedores[0]['status'] }}
<br />
@if (!($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif
<br />
@unless($fornecedores[0]['status'] == 'S')   
    Fornecedor inativo
@endunless --}}

{{-- @isset executa se a váriavel testada na condição estiver definida --}}
{{-- @empty verifica se a condição é vazia --}}
{{-- @isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['name'] }}
    <br />
    Status: {{ $fornecedores[0]['status'] }}
    <br />
    @isset($fornecedores[0]['cnpj'])
        CNPJ: 
        @unless($fornecedores[0]['cnpj'] == []) 
            {{ $fornecedores[0]['cnpj']['primeiro'] }}
        @endunless
        @empty($fornecedores[0]['cnpj'])  
            - Vazio
        @endempty
    @endisset
@endisset --}}

{{-- Operador de coalênscia nula ?? --}}
{{-- @isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['name'] }}
    <br />
    Status: {{ $fornecedores[1]['status'] }}
    <br />
    
        Em operador de coalênscia nula é a combinação de uma operação ternario junto do isset()
        Primeiro verifica se a condição esta definida ou  se não esta nula
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não foi preenchido' }}
    <br />
    Telefone: ({{ $fornecedores[1]['ddd'] ?? '' }}) {{ $fornecedores[1]['telefone'] ?? '' }}
    
    Estrura de Escolha Switch 
    @switch($fornecedores[1]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG
            @break
        @case ('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado   
    @endswitch
@endisset --}}

{{-- Estrutura de Repetição com For --}}
{{-- @isset($fornecedores)
    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['name'] }}
        <br />
        Status: {{ $fornecedores[$i]['status'] }}
        <br />
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br />
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr/>
    @endfor
@endisset --}}

{{-- Estrutura de Repitação com While --}}
{{-- @isset($fornecedores)
    @php $i = 0; @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['name'] }}
        <br />
        Status: {{ $fornecedores[$i]['status'] }}
        <br />
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br />
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr/>
        @php $i++; @endphp
    @endwhile
@endisset  --}}

{{-- Estrutura de Iteração Foreach --}}
{{-- @isset($fornecedores)
    @foreach($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['name'] }}
        <br />
        Status: {{ $fornecedor['status'] }}
        <br />
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br />
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr/>
    @endforeach
@endisset --}}

{{-- 
    Estrutura de Repetição Forelse só executa se a variável dada não estiver vazia 
    Caso esteja vazia a repetição é finaliza e cai no @empty algo como um "default"
--}}
@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br />
        Fornecedor: {{ $fornecedor['name'] }}
        <br />
        Status: {{ $fornecedor['status'] }}
        <br />
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br />
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        @if($loop->first)
            <br />
            Primeira iteração do loop
        @endif
        @if($loop->last)
            <br />
            Ultima iteração do loop
            <br />
            Total de registros: {{ $loop->count }}
        @endif
        <hr/>
        @empty
        Nenhum fornecedor foi cadastrado!!!
    @endforelse
@endisset 