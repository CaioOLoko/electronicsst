<?php

require("servico/validacaoServico.php");

function cadastro(){
   if (ehPost()){
       
       $email = $_POST["email"];
       $senha = $_POST["senha"];
       $cpf = $_POST["cpf"];
       $nome_completo = $_POST["nome_completo"];
       $data_de_nascimento = $_POST["data_de_nascimento"];
       $sexo = $_POST["sexo"];
       $telefone = $_POST["telefone"];
              
       echo validar_email($email);
       echo validar_elementos_obrigatorios($senha);
       echo validar_elementos_especificos($cpf);
       echo validar_elementos_obrigatorios($nome_completo);       
       echo validar_elementos_especificos($data_de_nascimento);
       echo validar_elementos_especificos($telefone);
       
       echo "<pre>";
       print_r($_POST);
       echo "</pre>";
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
       
       echo validar_elementos_obrigatorios($nome);
       echo validar_email($email);
       echo validar_elementos_obrigatorios($assunto);
       echo validar_elementos_especificos($telefone); 
       echo validar_elementos_obrigatorios($endereco);
       echo validar_elementos_obrigatorios($mensagem);
       
       echo "<pre>";
       print_r($_POST);
       echo "</pre>";
       
   } else{
       exibir("cliente/contato");
   }
}

?>

