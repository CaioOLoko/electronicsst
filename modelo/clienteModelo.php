<?php

function adicionarCliente($nome,$email,$senha){
    $comando = "INSERT INTO cliente(nome,email,senha) VALUES('$nome','$email','$senha')";
    
    $conexao = $conn();
    $resultado = mysqli_query($conexao,$comando);
    
    if($resultado==true){
        echo "A operação funcionou!";
    }else{
        echo "Deu errado";
    }
}

