<?php

use App\Http\Middleware\LogAcessoMiddleware;
use App\LogAcesso;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return 'Olá, seja bem-vindo ao APP';
// });
// Exemplo de Rota com parametros
/**
 * Para tornar um parâmetro opcional apenas adicione '?' ao fim do nome do parametro na URI.
 * Além de adicionar o sinal na callback function o parâmetro opcional deve receber um valor padrão.
 * Exemplo: Parametro da URI -> {mensagem?} - Variável na callback function -> $mensagem = 'mensagem não informada' 
 *  */ 
// Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', 
//     function(string $nome, string $categoria, string $assunto, string $mensagem = 'mensagem não informada') {
//         echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
//     }
// );

// Tratando parâmetros em rotas usando Expressões Regulares
/**
 * Function where() da classe Route permite adicionar Expressões Regulares ao parâmetro que precise de tratamento.
 * Para tratar mais de um parâmetro utilizando Expresões Regulares um array 
 * pode ser passado na function where() separando chave/valor por vírgula. 
 *  */
// Route::get('/contato/{nome}/{categoria_id}', 
//     function(string $nome = 'Desconhecido', int $categoria_id = 1) {
//         echo "Estamos aqui: $nome - $categoria_id";
//     }
// )->where(['categoria_id' => '[0-9]+', 'nome' => '[A-Z][a-z]+']);

// Exemplo de Redirecionamento de Rotas
/**
 * Redirecimento pode ser feito utilizando o método redirect do Route(Route::redirect()) passando a rota de origem e a destino
 * ou passar o método redirect()->route('nome/name da rota') no return da callback functiondo Route::get
 * Obs: Mais comum é deixar o redirecionamento para Controller
 *  */
// Route::get('/rota1', function() {
//     echo 'Rota 1';
// })->name('site.rota1');
// Route::get('/rota2', function() {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Exemplo de rota de Fallback
/**
 * Rota de Fallback é utilizada para indicar que aquele conteúdo que tentou acessar é inexistente e redireciona-lo 
 * para outro conteúdo em alguma página ou para a página inicial da aplicação por exemplo.
 *  */
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});

// Exemplo de passagem de parâmetros de Rota para Controller
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

/**
 * Com método name() definimos o "nome" da Rota.
 * Esse nome é aplicado apenas na lógica da aplicação portanto utiliza-lo 
 * na url para acessar a Rota não vai funcionar retornado uma página de arquivo não encontrado. 
 * Dentro da aplicação o nome funciona como um apelido podem substituir a rota absoluta na tag <a href='/'> do html. 
 * Exemplo: href='{{ site.index }}'
 *  */
Route::get('/', 'PrincipalController@principal') ->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

// a '?' ao lado do parâmetro o torna opcional
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

// Agrupamento de Rotas
// Rotas abaixo fazem parte da área privada do Sistema precisando de alguma "autenticação" para acessar
/**
 * No método prefix(parâmetro string) da classe Route definimos o prefixo do agrupamento
 * e o método group() recebe uma callback function onde colocamos dentro todas as rotas do Agrupamento.
 *  */
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');

    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    // O método resource() do Laravel cria automaticamente 
    // as rotas associadas a cada action da Controller ProdutoController
    // Produto
    Route::resource('produto', 'ProdutoController');

    // Produto Detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    // Cliente, Pedido e PedidoProduto
    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    // Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    // Route::delete('pedido-produto/destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});
