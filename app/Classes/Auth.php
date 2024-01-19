<?php

class Auth{
 public $nome;
 function Registrar($nome,$sobrenome, $email, $senha,$data_cadastro ){
   require_once "config.php";
   $stmt = $DB_con->prepare('INSERT INTO usuarios(	nome,email, sobrenome,senha,data_cadastro) VALUES(:nome, :email, :sobrenome, :senha,:data_cadastro)');
   $stmt->bindParam(':nome',$nome);
   $stmt->bindParam(':sobrenome',$sobrenome);
   $stmt->bindParam(':email',$email);
   $stmt->bindParam(':senha',$senha);
    $stmt->bindParam(':data_cadastro',$data_cadastro);
   if($stmt->execute()){
    header("Location: ../auth-entrar.php?email=".$email);

     die();
   }

 }

  function Registrar_completo($nome, $sobrenome, $email, $senha, $data_cadastro, $telefone, $foco, $genero, $data_nasc)
  {
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO usuarios(	nome,email, sobrenome,senha,data_cadastro, telefone, foco, genero, data_nasc) VALUES(:nome, :email, :sobrenome, :senha,:data_cadastro, :telefone, :foco, :genero, :data_nasc)');
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':data_cadastro', $data_cadastro);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':foco', $foco);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':data_nasc', $data_nasc);
    if ($stmt->execute()) {
      header("Location: ../auth-entrar.php?email=" . $email."&r=1");

      die();
    }
  }

 function VerificaEmail($email){
   $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM usuarios WHERE email LIKE :email');
    $stmt->execute(array('email' => $email));
    $i = 1;
    while($row = $stmt->fetch()) {
     $i++;}
     if ($i > 1) {
        echo "true";
      }
}


function Entrar($email, $senha){
 //SELECT * FROM `usuarios` WHERE `email` LIKE 'disasembleme@gmail.com' AND `senha` LIKE sd
 $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';
  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('SELECT * FROM usuarios WHERE email LIKE :email');
  $stmt->execute(array('email' => $email));
  while($row = $stmt->fetch()) {
     if (password_verify($senha, $row['senha'])) {

        $c2 = new Auth;
        $c2->Logar($row['id_usuario'],$row['nome'],$row['sobrenome'],$row['email']);
        header("Location: ../index.php");

     }else {
      $lnk = "../auth-entrar.php?email=".$email."&response=false";
      header("Location: $lnk");
     }

}
}

 function Logar($id_usuario, $nome_usuario, $sobrenome_usuario, $email_usuario ){
  session_start();
  $_SESSION['logado'] = true;
  $_SESSION['id'] = $id_usuario;
  $_SESSION['nome'] = $nome_usuario;
  $_SESSION['sobrenome'] = $sobrenome_usuario;
  $_SESSION['email'] = $email_usuario;

}
function Deslogar(){
  session_start();
unset($_SESSION['id'],  $_SESSION['nome'], $_SESSION['sobrenome'], $_SESSION['email']);
 $_SESSION['logado'] = false;

}

function Conectado(){
 session_start();
 if (isset($_SESSION['logado'])) {
  if ($_SESSION['logado'] == false) {
    header("Location: auth-entrar.php");
  }
 }else if (!isset($_SESSION['logado'])){
   header("Location: auth-entrar.php");
 }
}


  function ConectadoQuestao()
  {
     session_start();
   

    if (isset($_SESSION['logado'])) {

      if ($_SESSION['logado'] == true) {
       return "true";
      }
      if ($_SESSION['logado'] == false) {
        return "false";
      }
    } else if (!isset($_SESSION['logado'])) {
      return "false";
    }
  }

}


 ?>
