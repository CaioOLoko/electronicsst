<?php

function adicionarCliente($email,$senha,$cpf,$nome,$sobrenome,$data_de_nascimento,$sexo,$telefone){
    $sql = "INSERT INTO cliente(email, senha, CPF, nome, sobrenome, dataNasc, sexo, telefone) VALUES('$email','$senha','$cpf','$nome','$sobrenome','$data_de_nascimento','$sexo','$telefone')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar cliente' . mysqli_error($cnx));
    }

}

