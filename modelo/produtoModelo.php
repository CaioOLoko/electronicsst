<?php

function allProduto()
{
	$sql = "CALL sp_TodosProdutos ()";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function getProdutoByNome($nome)
{
	$sql = "CALL sp_ProdutoByNome ('%$nome%')";
	$resultado = mysqli_query(conn(), $sql);
	$busca = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$busca[] = $linha;
	}
	return $busca;
}

function getProdutoByCategoria($categoria)
{
	$sql = "CALL sp_ProdutoByCategoria ('$categoria')";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function getProdutoByMarca($marca)
{
	$sql = "CALL sp_ProdutoByMarca ('$marca')";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function viewProduto($id)
{
	$sql = "CALL sp_selProduto ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	$produto = mysqli_fetch_assoc($resultado);
	return $produto;
}

function delProduto($id)
{
	$sql = "CALL sp_delProduto ('$id')";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar produto' . mysqli_error(conn()));}
	return 'Produto deletado com sucesso!';
}

function addProduto(
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
)
{
	$sql = "CALL sp_addProduto (
				'$nome',
				'$preco',
				'$categoria',
				'$marca',
				'$descricao',
				'$imagem',
				'$estoque_minimo',
				'$estoque_maximo',
				'$quant_estoque',
				'$cod_barras',
				'$cor',
				'$tipo_chip',
				'$quant_chip',
				'$mem_interna',
				'$mem_ram',
				'$processador',
				'$display',
				'$so'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar produto!' . mysqli_error(conn()));}
	return 'Produto cadastrado com sucesso!';
}

function editProduto(
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
)
{
	$sql = "CALL sp_updProduto (
				'$id',
				'$nome',
				'$preco',
				'$categoria',
				'$marca',
				'$descricao',
				'$imagem',
				'$estoque_minimo',
				'$estoque_maximo',
				'$quant_estoque',
				'$cod_barras',
				'$cor',
				'$tipo_chip',
				'$quant_chip',
				'$mem_interna',
				'$mem_ram',
				'$processador',
				'$display',
				'$so'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar produto' . mysqli_error(conn()));}
	return 'Produto alterado com sucesso!';
}
