<?php

function allProduto()
{
	$sql = "SELECT * 
			FROM produto";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function getProdutoByNome($nome)
{
	$sql = "SELECT * 
			FROM produto 
			WHERE nome LIKE '%$nome%'";
	$resultado = mysqli_query(conn(), $sql);
	$busca = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$busca[] = $linha;
	}
	return $busca;
}

function getProdutoByCategoria($categoria)
{
	$sql = "SELECT * 
			FROM produto 
			WHERE categoria = '$categoria'";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function getProdutoByMarca($marca)
{
	$sql = "SELECT * 
			FROM produto 
			WHERE marca = '$marca'";
	$resultado = mysqli_query(conn(), $sql);
	$produtos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$produtos[] = $linha;
	}
	return $produtos;
}

function viewProduto($id)
{
	$sql = "SELECT p.*, c.nome AS categoria, m.nome AS marca 
			FROM produto p 
			INNER JOIN categoria c
			ON p.categoria = c.idCategoria 
			INNER JOIN marca m 
			ON p.marca = m.idMarca 
			WHERE idProduto = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$produto = mysqli_fetch_assoc($resultado);
	return $produto;
}

function delProduto($id)
{
	$sql = "DELETE FROM produto 
			WHERE idProduto = '$id'";
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
	$sql = "INSERT INTO produto 
			VALUES(
				NULL,
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
	$sql = "UPDATE produto 
			SET nome = 				'$nome',
				preco = 			'$preco',
				categoria = 		'$categoria',
				marca = 			'$marca',
				descricao = 		'$descricao',
				imagem = 			'$imagem',
				estoque_minimo = 	'$estoque_minimo',
				estoque_maximo = 	'$estoque_maximo',
				quant_estoque = 	'$quant_estoque',
				cod_barras = 		'$cod_barras',
				cor = 				'$cor',
				tipo_chip = 		'$tipo_chip',
				quant_chip = 		'$quant_chip',
				mem_interna = 		'$mem_interna',
				mem_ram = 			'$mem_ram',
				processador = 		'$processador',
				display = 			'$display',
				so = 				'$so' 
			WHERE idProduto = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar produto' . mysqli_error(conn()));}
	return 'Produto alterado com sucesso!';
}
