<?php
function adicionar(){
   if (ehPost()){
       $categoria = $_POST["categoria"];
       

        //validar_elementos_obrigatorios($categoria);
       
       $msg = adicionarCategoria($categoria);
       echo $msg;
   } else{
       //não há dados submetidos
   }
   exibir("categoria/formulario");
}

function listarCategoria(){
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("produtos/listar", $dados);
}

?>

