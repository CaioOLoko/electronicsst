<?php

function adicionarCliente($nome,$email,$senha,$cpf,$data_de_nascimento,$sexo,$tipo_usuario){
    $sql = "INSERT INTO usuario(idusuario,nomeusuario,email,senha,cpf,datadenascimento,sexo,tipousuario) VALUES('NULL','$nome','$email','$senha','$cpf','$data_de_nascimento','$sexo','$tipo_usuario')";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao cadastrar cliente' . mysqli_error($cnx));
    }
return 'Cliente cadastrado com sucesso!';
}

function deletarCliente($id){
    $sql = "DELETE FROM usuario WHERE idusuario = $id";
    
    $resultado = mysqli_query($cnx = conn(),$sql);
    
    if(!$resultado){ 
        die ('Erro ao deletar cliente' . mysqli_error($cnx));
    }
return 'Cliente removido com sucesso!';
}

function pegarTodosClientes(){
    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query(conn(), $sql);
    $clientes = array();
    while($linha = mysqli_fetch_assoc($resultado)){
        $clientes[] = $linha;
    }
    return $clientes;
}

function pegarClientePorId($id){
    //Busca um único cliente pelo $id
    $sql = "SELECT * FROM usuario WHERE idusuario = $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cliente
    $cliente = mysqli_fetch_assoc($resultado);
    //retorna o $cliente
    return $cliente;
}

?>

