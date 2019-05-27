<?php

function adicionarCliente($email,$senha,$cpf,$nome,$sobrenome,$data_de_nascimento,$sexo,$telefone){
    $sql = "INSERT INTO cliente(email, senha, CPF, nome, sobrenome, dataNasc, sexo, telefone) VALUES('$email','$senha','$cpf','$nome','$sobrenome','$data_de_nascimento','$sexo','$telefone')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar cliente' . mysqli_error($cnx));
    }
return 'Cliente cadastrado com sucesso!';
}

function pegarTodosClientes(){
    $sql = "SELECT * FROM cliente";
    $resultado = mysqli_query(conn(), $sql);
    $clientes = array();
    while($linha = mysqli_fetch_assoc($resultado)){
        $clientes[] = $linha;
    }
    return $clientes;
}

?>

