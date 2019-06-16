<?php

function uploadImagem($arquivo, $caminhoImagem = "publico/upload/imagens/") {
    $imagem_tmp = $arquivo["tmp_name"];
    $imagem = basename($arquivo["name"]);

    move_uploaded_file($imagem_tmp, $caminhoImagem . $imagem);
    $diretorio_da_imagem = $caminhoImagem . $imagem;

    return $diretorio_da_imagem;
}


// function uploadImagem($arquivo, $caminhoImagem = "./publico/upload/imagens/") {
// 	$imagem_tmp = $arquivo["tmp_name"];
// 	$imagem = basename($arquivo["name"]);

// 	move_uploaded_file($arquivo, $caminhoImagem . $imagem);
// 	$diretorio_da_imagem = $caminhoImagem . $arquivo;

// 	return $diretorio_da_imagem;
// 	//return $imagem;
// }