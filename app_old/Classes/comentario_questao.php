<?php

    if(isset($_POST['value'])) {
    $value = $_POST['value'];
    $connect = mysqli_connect("localhost", "root", "", "tope_bd");
    $sql = "SELECT * FROM questao_comentarios WHERE id_questao = '$value'";
    $result = mysqli_query($connect, $sql);
     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($rows);
  }


  if (isset($_POST['n'])) {
  $comentario = $_POST['text_comentario'];
  $id_questao = $_POST['n'];
  $usuario = $_POST['text_nome_usuario'];
  $id_usuario = $_POST['text_id_usuario'];
  $data = $_POST['text_data'];
    $connect = mysqli_connect("localhost", "root", "", "tope_bd");
    $sql = "INSERT INTO questao_comentarios (comentario, id_questao, usuario, id_usuario, data) VALUES ('$comentario', '$id_questao ', '$usuario', '$id_usuario', '$data')";
    $result = mysqli_query($connect, $sql);
  }

  if (isset($_POST['comentario_caderno_publico'])) {
  $comentario = $_POST['comentario_caderno_publico'];
  $caderno_id = $_POST['caderno_id'];
$nome_user = $_POST['nome_user'];
$id_user = $_POST['id_user'];


  date_default_timezone_set('America/Sao_Paulo');
  $data = date("d/m/Y");
    $connect = mysqli_connect("localhost", "root", "", "tope_bd");
    $sql = "INSERT INTO caderno_publico_comentario (id, id_caderno, usuario, nome, comentario, data) VALUES (NULL, '$caderno_id', '$id_user', '$nome_user', '$comentario', '$data')";
    $result = mysqli_query($connect, $sql);
  }





?>
