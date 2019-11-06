<?php

require_once "servico/validacaoServico.php";
require_once "servico/uploadServico.php";

require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";
require_once "modelo/marcaModelo.php";

/** admin */
function index()
{
	$dados = array();
	$dados["produtos"] = allProduto();
	exibir("produtos/index", $dados);
}

/** anon */
function buscar($nome)
{
	if (ehPost()) {
		$nome = $_POST['buscar'];
		$dados['categorias'] = allCategoria();
		$dados['marcas'] = allMarca();
		$dados['produtos'] = getProdutoByNome($nome);
		exibir("produtos/index", $dados);
	}
}

/** anon */
function buscarPorCategoria($categoria)
{
	$dados['categorias'] = allCategoria();
	$dados['produtos'] = getProdutoByCategoria($categoria);
	exibir("produtos/index", $dados);
}

/** anon */
function buscarPorMarca($marca)
{
	$dados['categorias'] = allCategoria();
	$dados['marcas'] = allMarca();
	$dados['produtos'] = getProdutoByMarca($marca);
	exibir("produtos/index", $dados);
}

/** anon */
function visualizar($id)
{
	$dados = array();
	$dados["produto"] = viewProduto($id);
	exibir("produtos/visualizar", $dados);
}

/** admin */
function deletar($id)
{
	$produto = viewProduto($id);
	delProduto($id);
	unlink($produto['imagem']);
	unset($produto);
	redirecionar("produto/");
}

/** admin */
function adicionar()
{
	if (ehPost()) {

		$nome = 			$_POST["nome"];
		$preco = 			$_POST["preco"];
		$categoria = 		$_POST["categoria"];
		$marca = 			$_POST["marca"];
		$descricao = 		$_POST["descricao"];
		$estoque_minimo = 	$_POST["estoque_minimo"];
		$estoque_maximo = 	$_POST["estoque_maximo"];
		$quant_estoque = 	$_POST["quant_estoque"];

		$imagem_tmp = 		$_FILES["imagem"]["tmp_name"];
		$name_img = 		$_FILES["imagem"]["name"];
		$imagem = 			uploadImagem($imagem_tmp, $name_img);


		$errors = array();

		/* Validações comentadas por enquanto, até terminar de revisar e organizar o código
		
			if (!validar_Nome($nome)) {$errors['nome'] = "Nome inválido!";}
			if (!validar_Preco($preco)) {$errors['preco'] = "Preco inválido!";}
			if (!validar_Categoria($categoria)) {$errors['categoria'] = "Categoria inválida!";}
			if (!validar_Marca($marca)) {$errors['marca'] = "Marca inválida!";}
			if (!validar_Descricao($descricao)) {$errors['descricao'] = "Descrição inválida!";}
			if (!validar_Imagem($imagem)) {$errors['imagem'] = "Extensão inválida!";}
			if (!validar_Estoque($estoque_minimo,$estoque_maximo,$quant_estoque)) {$errors['estoque'] = "Quantidade em estoque não permitida!";}
		
		*/

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = 		$errors;
			$dados['categorias'] = 	allCategoria();
			$dados['marcas'] = 		allMarca();
			exibir("produtos/adicionar", $dados);
		} else {
			addProduto(
				$nome,
				$preco,
				$categoria,
				$marca,
				$descricao,
				$imagem,
				$estoque_minimo,
				$estoque_maximo,
				$quant_estoque
			);
			redirecionar("produto/");
		}
	} else {
		$dados = array();
		$dados['categorias'] = 	allCategoria();
		$dados['marcas'] = 		allMarca();
		exibir("produtos/adicionar", $dados);
	}
}

/** admin */
function editar($id)
{
	if (ehPost()) {

		$nome = 			$_POST["nome"];
		$preco = 			$_POST["preco"];
		$categoria = 		$_POST["categoria"];
		$marca = 			$_POST["marca"];
		$descricao = 		$_POST["descricao"];
		$estoque_minimo = 	$_POST["estoque_minimo"];
		$estoque_maximo = 	$_POST["estoque_maximo"];
		$quant_estoque = 	$_POST["quant_estoque"];

		$imagem_tmp = 		$_FILES["imagem"]["tmp_name"];
		$name_img = 		$_FILES["imagem"]["name"];
		$imagem = 			uploadImagem($imagem_tmp, $name_img);

		$errors = array();

		/* Validações comentadas por enquanto, até terminar de revisar e organizar o código
		
			if (!validar_Nome($nome)) {$errors['nome'] = "Nome inválido!";}
			if (!validar_Preco($preco)) {$errors['preco'] = "Preco inválido!";}
			if (!validar_Categoria($categoria)) {$errors['categoria'] = "Categoria inválida!";}
			if (!validar_Marca($marca)) {$errors['marca'] = "Marca inválida!";}
			if (!validar_Descricao($descricao)) {$errors['descricao'] = "Descrição inválida!";}
			if (!validar_Imagem($imagem)) {$errors['imagem'] = "Extensão inválida!";}
			if (!validar_Estoque($estoque_minimo,$estoque_maximo,$quant_estoque)) {$errors['estoque'] = "Quantidade em estoque não permitida!";}
		
		*/

		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = 		$errors;
			$dados['produto'] = 	viewProduto($id);
			$dados['categorias'] = 	allCategoria();
			$dados['marcas'] = 		allMarca();
			exibir("produtos/editar", $dados);
		} else {
			editProduto(
				$id,
				$nome,
				$preco,
				$categoria,
				$marca,
				$descricao,
				$imagem,
				$estoque_minimo,
				$estoque_maximo,
				$quant_estoque
			);
			redirecionar("produto/");
		}
	} else {
		$dados = array();
		$dados['produto'] = 	viewProduto($id);
		$dados['categorias'] = 	allCategoria();
		$dados['marcas'] = 		allMarca();
		exibir("produtos/editar", $dados);
	}
}

/** admin */
function upload()
{
	if (ehPost()) {

		$nome_arquivo = 	$_FILES['listaProdutos']['name'];
		$nome_tmp_arquivo = $_FILES['listaProdutos']['tmp_name'];

		$arquivo = uploadFile($nome_tmp_arquivo, $nome_arquivo);

		$vetorzao = array();

		$registros = fopen($arquivo, 'r');

			while (!feof($registros))
			{
				$linha = fgets($registros);
				$dados = explode(chr(9), $linha);

				if ($dados[0] == "Nome") {
					continue;
				}

				$nome = 			$dados[0];
				$preco = 			$dados[1];
				$categoria = 		$dados[2];
				$marca = 			$dados[3];
				$descricao = 		$dados[4];
				$imagem = 			$dados[5];
				$estoque_minimo = 	$dados[6];
				$estoque_maximo = 	$dados[7];
				$quant_estoque = 	$dados[8];

				$idCategoria =	upload_verifica_categoria($categoria);
				$idMarca =		upload_verifica_marca($marca);

				$marca = $idMarca['idMarca'];
				$categoria = $idCategoria['idCategoria'];

				addProduto(
					$nome,
					$preco,
					$categoria,
					$marca,
					$descricao,
					$imagem,
					$estoque_minimo,
					$estoque_maximo,
					$quant_estoque
				);
			}

		fclose($registros);

		redirecionar("produto/");
	} else {
		exibir("produtos/upload");
	}
}
