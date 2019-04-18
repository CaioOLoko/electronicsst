<?php

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

