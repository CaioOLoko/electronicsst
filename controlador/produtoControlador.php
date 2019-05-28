<?php

require("servico/validacaoServico.php");
require_once "modelo/produtoModelo.php";

function visualizar(){
    $loja = array ();
    $loja["produto"] = "Galaxy Note 9";
    $loja["descricao"] = "O Samsung Galaxy Note 9 é um dos smartphones Android 
        mais avançados e completos que existem em circulação. Tem um grande 
        display de 6.4 polegadas e uma resolução de 2960x1440 pixels que é uma 
        das mais altas atualmente em circulação. As funcionalidades oferecidas 
        pelo Samsung Galaxy Note 9 são muitas e inovadoras. Começando pelo LTE 
        4G que permite a transferência de dados e excelente navegação na internet. 
        Enfatizamos a excelente memória interna de 128 GB com a possibilidade de 
        expansão. Câmera discreta de 12 megapixel mas que permite ao Samsung 
        Galaxy Note 9 tirar fotos de boa qualidade com uma resolução de 4290x2800 
        pixel e gravar vídeos em 4K a espantosa resolução de 3840x2160 pixels.";
    $loja["preco"] = "R$ 5.499,00";
    
    exibir("produtos/visualizar", $loja);
}

function adicionar(){
   if (ehPost()){
       $codProduto = $_POST["codProduto"];
       $categoria = $_POST["categoria"];
       $nome_do_produto = $_POST["nome_do_produto"];
       $preco_do_produto = $_POST["preco_do_produto"];
       $infoProduto = $_POST["infoProduto"];
       $codDeBarras = $_POST["codDeBarras"];
       $marca = $_POST["marca"];
       $modelo = $_POST["modelo"];
       $cor = $_POST["cor"];
       $memoria = $_POST["memoria"];
       $processador = $_POST["processador"];
       $polegadaTela = $_POST["polegadaTela"];
       $SistOper = $_POST["SistOper"];
       
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
       
       $msg = adicionarProduto($codProduto,$categoria,$nome_do_produto,$preco_do_produto,$infoProduto,$codDeBarras,$marca,$modelo,$cor,$memoria,$processador,$polegadaTela,$SistOper);
       echo $msg;
   } else{
       //não há dados submetidos
   }
   exibir("produtos/formulario");
}

