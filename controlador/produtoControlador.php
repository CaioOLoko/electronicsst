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
	delProduto($id);
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
		$cod_barras = 		$_POST["cod_barras"];
		$cor = 				$_POST["cor"];
		$tipo_chip = 		$_POST["tipo_chip"];
		$quant_chip = 		$_POST["quant_chip"];
		$mem_interna = 		$_POST["mem_interna"]." ".$_POST['mem_interna_quant'];
		$mem_ram = 			$_POST["mem_ram"];
		$processador = 		$_POST["marca_proc"]." ".$_POST["processador"];
		$display = 			$_POST["display"];
		$so = 				$_POST["so"];

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
			if (!validar_CodBarra($cod_barra)) {$errors['cod_barra'] = "Código inválido!";}
			if (!validar_Cor($cor)) {$errors['cor'] = "Cor inválida!";}
			if (!validar_TipoChip($tipo_chip)) {$errors['tipo_chip'] = "Tipo inválido!";}
			if (!validar_QuantChip($quant_chip)) {$errors['quant-chip'] = "Quantidade inválida!";}
			if (!validar_MemInterna($mem_interna)) {$errors['mem_interna'] = "Memória interna inválida!";}
			if (!validar_MemRAM($mem_ram)) {$errors['mem_ram'] = "Memória RAM inválida!";}
			if (!validar_Processador($processador)) {$errors['processador'] = "Processador inválido!";}
			if (!validar_($display)) {$errors['display'] = "Tamanho inválido!";}
			if (!validar_SO($so)) {$errors['so'] = "Sistema operacional não permitido!";}
		
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
				$quant_estoque,
				$cod_barras,
				$cor,
				$tipo_chip,
				$quant_chip,
				$mem_interna,
				$mem_ram,
				$processador,
				$display,
				$so
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
		$cod_barras = 		$_POST["cod_barras"];
		$cor = 				$_POST["cor"];
		$tipo_chip = 		$_POST["tipo_chip"];
		$quant_chip = 		$_POST["quant_chip"];
		$mem_interna = 		$_POST["mem_interna"]." ".$_POST['mem_interna_quant'];
		$mem_ram = 			$_POST["mem_ram"];
		$processador = 		$_POST["marca_proc"]." ".$_POST["processador"];
		$display = 			$_POST["display"];
		$so = 				$_POST["so"];

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
			if (!validar_CodBarra($cod_barra)) {$errors['cod_barra'] = "Código inválido!";}
			if (!validar_Cor($cor)) {$errors['cor'] = "Cor inválida!";}
			if (!validar_TipoChip($tipo_chip)) {$errors['tipo_chip'] = "Tipo inválido!";}
			if (!validar_QuantChip($quant_chip)) {$errors['quant-chip'] = "Quantidade inválida!";}
			if (!validar_MemInterna($mem_interna)) {$errors['mem_interna'] = "Memória interna inválida!";}
			if (!validar_MemRAM($mem_ram)) {$errors['mem_ram'] = "Memória RAM inválida!";}
			if (!validar_Processador($processador)) {$errors['processador'] = "Processador inválido!";}
			if (!validar_($display)) {$errors['display'] = "Tamanho inválido!";}
			if (!validar_SO($so)) {$errors['so'] = "Sistema operacional não permitido!";}
		
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
				$quant_estoque,
				$cod_barras,
				$cor,
				$tipo_chip,
				$quant_chip,
				$mem_interna,
				$mem_ram,
				$processador,
				$display,
				$so
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
		$dados = fopen($arquivo, 'r');
		
		while (!feof($dados)) {
			$linha = fgets($dados);
		}
		
		addProduto(
			$nome,
			$preco,
			$categoria,
			$marca,
			$descricao,
			$imagem,
			$estoque_minimo,
			$estoque_maximo,
			$quant_estoque,
			$cod_barras,
			$cor,
			$tipo_chip,
			$quant_chip,
			$mem_interna,
			$mem_ram,
			$processador,
			$display,
			$so
		);
		
		fclose($arquivo);

		redirecionar("produto/");
	} else {
		exibir("produtos/upload");
	}
}