<?php
function adicionar(){
   if (ehPost()){
       $Categoria = $_POST["Categoria"];
       
       /*
       echo validar_elementos_obrigatorios($codProduto);
       echo validar_elementos_obrigatorios($categoria);
       echo validar_elementos_obrigatorios($nome_do_produto);
       echo validar_elementos_especificos($preco_do_produto);
       echo validar_elementos_obrigatorios($infoProduto);
       echo validar_elementos_obrigatorios($CodDeBarras);
       echo validar_elementos_obrigatorios($marca);
       echo validar_elementos_obrigatorios($modelo);
       echo validar_elementos_obrigatorios($cor);
       echo validar_elementos_obrigatorios($memoria);
       echo validar_elementos_obrigatorios($processador);
       echo validar_elementos_obrigatorios($polegadaTela);
       echo validar_elementos_obrigatorios($SistOper);
       */
       
       $msg = adicionarCategoria($Categoria);
       echo $msg;
   } else{
       //não há dados submetidos
   }
   exibir("categoria/categoria");
}

function listarCategoria(){
    $dados = array();
    $dados["Categorias"] = pegarTodasCategorias();
    exibir("produtos/listar", $dados);
}

?>

