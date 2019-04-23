<?php

function cadastro(){
   if (ehPost()){
       
       $email = $_POST["email"];
       $senha = $_POST["senha"];
       $cpf = $_POST["cpf"];
       $nome_completo = $_POST["nome_completo"];
       $data_de_nascimento = $_POST["data_de_nascimento"];
       $sexo = $_POST["sexo"];
       $telefone = $_POST["telefone"];
       
       print_r($_POST);
   } else{
       exibir("cliente/cadastro");
   }
}

function contato(){
   if (ehPost()){
       
       $nome = $_POST["nome"];
       $email = $_POST["email"];
       $assunto = $_POST["assunto"];
       $telefone = $_POST["telefone"];
       $endereco = $_POST["endereco"];
       $mensagem = $_POST["mensagem"];
       
       print_r($_POST);
   } else{
       exibir("cliente/contato");
   }
}

?>

