<?php

require "modelo/produtoModelo.php";

/** anon */
function index()
{
	$dados = array();
	$dados['produtos'] = allProduto();

	exibir("paginas/index", $dados);
}

/** anon */
function about()
{
	exibir("paginas/about");
}

/** anon */
function politics()
{
	exibir("paginas/politics");
}

/** anon */
function contact() {
	if (ehPost()) {
		$to = $_POST['nome'];
		$email = $_POST['email'];
		$subject = $_POST['assunto'];
		$message = $_POST['mensagem'];

		echo "$to<br>";
		echo "$email<br>";
		echo "$subject<br>";
		echo "$message<br>";
		mail($to,$email,$subject);
	} else {
		exibir("paginas/contact");
	}
}