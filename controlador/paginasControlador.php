<?php

require "modelo/produtoModelo.php";

function index() {
	$dados = [];
	$dados['produto'] = pegarTodosProdutos();

	exibir("paginas/inicial",$dados);
}