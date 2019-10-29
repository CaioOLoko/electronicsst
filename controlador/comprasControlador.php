<?php

require_once "servico/correiosServico.php";

require_once "modelo/enderecoModelo.php";
require_once "modelo/produtoModelo.php";
require_once "modelo/FormaPagamentoModelo.php";
require_once "modelo/cupomModelo.php";

/** anon */
function index()
{
	// testar cep/frete
	if (ehPost()) {
		$cep_destino = $_POST['cep'];
		$frete = calcular_frete($cep_destino,$valor);
	} else {
		$frete = 0;
	}

	if (isset($_SESSION["carrinho"])) {
		$produtos = $_SESSION["carrinho"];
		$_SESSION["carrinho"] = $produtos;
	} else {
		$produtos = [];
	}
	
	// define os dados a serem passados de quantidade de produtos e total
	$quantidadeProdutos = 0;
	$subtotal = 0;


	var_dump($_SESSION['carrinho']); 

	foreach ($produtos as $posicao => $valor) {
		$quantidadeProdutos += $valor["quantidade"];
		$subtotal += ($valor["preco"]*$valor["quantidade"]);
	}
	
	$dados['quantidadeProdutos'] = $quantidadeProdutos;
	$dados['subtotal'] =  $subtotal;
	$dados['produtos'] = $produtos;
	$dados['frete'] = $frete;

	// exibe a página inicial junto aos dados dos produtos
	exibir("carrinho/index", $dados);
}

/** anon */
function adicionar($idProduto)
{

	if (isset($_SESSION["carrinho"])) {
		$produtos = $_SESSION["carrinho"];
	} else {
		$produtos = array();
	}

	$chave = existeProdutoNoCarrinho($produtos, $idProduto);
	
	if($chave === false) {
		$produto = viewProduto($idProduto);
		$produto["quantidade"] = 1;
		$produtos[] = $produto;
	} else {
		$produto = $produtos[$chave];
		$produto["quantidade"]++;
		$produtos[$chave] = $produto;
	}

	$_SESSION["carrinho"] = $produtos;

	redirecionar("compras/index");
}

/** admin */
function existeProdutoNoCarrinho($produtos, $idProduto)
{
	foreach ($produtos as $chave => $produto) {
		if ($produto["idProduto"] == $idProduto) { //ja existe
			return $chave;
		}
	}
	return false;
}

/** anon */
function removerProduto($id)
{
	$produtos = $_SESSION['carrinho'];
	foreach ($produtos as $key => $produto) {
		if ($produto['idProduto'] == $id) {
			unset($produtos[$key]);
		}
	}

	$_SESSION['carrinho'] = $produtos;
	redirecionar("compras/");
}

/** anon */
function limparCarrinho()
{
	unset($_SESSION['carrinho']);
	redirecionar("paginas/");
}

/** anon */
function finalizar()
{
	if (ehPost()) {
		$desconto = BuscarDescontoDeCupomPorNome($_POST['cupom']);
	} else {
		$desconto = 0;
	}

	$total = 0;

	if(acessoUsuarioEstaLogado()){

		$produtos = $_SESSION["carrinho"];
		$quantidade = 0;

		foreach ($produtos as $key => $produto) {
			$subtotal = $produto['quantidade'] * $produto['preco'];

			$total += $subtotal;

			$quantidade = $produto['quantidade']+$quantidade;
		}
	}

	$idUsuario = acessoPegarUsuarioLogado();
	$dados = array();
	$dados['desconto'] = $desconto * $total;
	$dados['total'] = $total - $dados['desconto'];
	$dados['subtotal'] = $subtotal;
	$dados['quantidade'] = $quantidade;
	$dados['pagamentos'] = allPagamento();
	$dados['enderecos'] = getEnderecoByUsuario($idUsuario);
	exibir("carrinho/finalizar", $dados);
}
