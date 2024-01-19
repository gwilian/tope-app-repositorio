<?php
require_once "../Classes/Auth.php";
switch ($_POST['id_post']) {
  case 1:
  // REGISTRAR NOVO USUÁRIO
  if (isset($_POST['nome'])) {
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    date_default_timezone_set('America/Sao_Paulo');
    $dataLocal = date('d/m/Y', time());
    $c2 = new Auth;
    $c2->Registrar($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $senha, $dataLocal);
  }
  break;
  case 2:
  if (isset($_POST['email-username']) && isset($_POST['password'])) {
    $c2 = new Auth;
    $c2->Entrar($_POST['email-username'], $_POST['password']);
  }
  break;
  case 3:

  $c2 = new Auth;
  $c2->Deslogar();
   header("Location: ../auth-entrar.php");
    break;

  case 4:
    //REGISTRA USUÁRIO COMPLETO
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    date_default_timezone_set('America/Sao_Paulo');
    $dataLocal = date('d/m/Y', time());
    $c2 = new Auth;
    $c2->Registrar_completo($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $senha, $dataLocal, $_POST['telefone'], $_POST['opcao'], $_POST['genero'], $_POST['nascimento']);
    break;



  default:
  // code...
  break;
}




 ?>
 <!doctype html>
 <html lang="pt_BR">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Tope - Sua plataforma de estudos</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   </head>
   <body>

<div style="margin-top: 200px;" class="align-items-center justify-content-center">


<div class="row">

   <div class="text-center">
  <img src="../../assets/img/tope.png" class="rounded " alt="...">
   </div>


   <div class="row">
<div class="text-center">
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
</div>
</div></div>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
 </html>
