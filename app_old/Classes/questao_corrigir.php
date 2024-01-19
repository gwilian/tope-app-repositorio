<?php
  if(isset($_POST['value'])) {
    $value = $_POST['value'];
    $connect = mysqli_connect("localhost", "tope_bd", "BMbFCeA8JYHGjSkK", "tope_bd");
    $sql = "SELECT alt_correta FROM questao WHERE id_questao = '$value'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
  }
?>
