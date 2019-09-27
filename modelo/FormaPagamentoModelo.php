<?php

function allPagamento()
{
	$sql = "SELECT * 
			FROM FormaPagamento";
	$resultado = mysqli_query(conn(), $sql);
	$formaspagamentos = array();
	while ($linha = mysqli_fetch_assoc($resultado)) {
		$formaspagamentos[] = $linha;
	}
	return $formaspagamentos;
}

function viewPagamento($id)
{
	$sql = "SELECT * 
			FROM FormaPagamento 
			WHERE idFormaPagamento = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	$formapagamento = mysqli_fetch_assoc($resultado);
	return $formapagamento;
}

function delPagamento($id)
{
	$sql = "DELETE FROM FormaPagamento 
			WHERE idFormaPagamento = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao deletar forma de pagamento!' . mysqli_error(conn()));}
	return 'Forma de pagamento deletado com sucesso!';
}

function addPagamento($nome)
{
	$sql = "INSERT INTO FormaPagamento
			VALUES(
				NULL,
				'$nome'
			)";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao cadastrar forma de pagamento' . mysqli_error(conn()));}
	return 'Forma de pagamento cadastrado com sucesso!';
}

function editPagamento(
	$id,
	$nome
)
{
	$sql = "UPDATE FormaPagamento 
			SET nome = '$nome' 
			WHERE idFormaPagamento = '$id'";
	$resultado = mysqli_query(conn(), $sql);
	if (!$resultado) {die('Erro ao alterar forma de pagamento' . mysqli_error(conn()));}
	return 'Forma de pagamento alterado com sucesso!';
}
