<?php

require("servico/validacaoServico.php");
require_once "modelo/categoriaModelo.php";

function adicionar(){
   if (ehPost()){
       $codCategoria = $_POST["codigo"];
       $categoria = $_POST["categoria"];
       
        echo validar_elementos_especificos($codCategoria);
        echo validar_elementos_obrigatorios($categoria);
       
       $msg = adicionarCategoria($codCategoria,$categoria);
       echo $msg;
   } else{
       //não há dados submetidos
   }
   exibir("categoria/formulario");
}

function listarCategoria(){
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}

?>

