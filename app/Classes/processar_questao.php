<?php

require_once "Auth.php";
$c2 = new Auth;
$c2->Conectado();
$user_tp = $_SESSION['sobrenome'] . "." . $_SESSION['nome'];
$id_user = $_SESSION['id'];

date_default_timezone_set('America/Sao_Paulo');
$data_hora = date('Y-m-d H:i:s');


if (isset($_POST['id_questao_chave'])) {
    $id_questao_chave = $_POST['id_questao_chave'];
    $acerto_erro = $_POST['acerto_erro'];
    $alt = $_POST['alt'];



    require_once "config.php";
    $stmt_check = $DB_con->prepare("SELECT COUNT(*) FROM questao_erro_acerto WHERE id_questao_chave = :id_questao_chave AND acerto_erro = :acerto_erro");
    $stmt_check->bindParam(':id_questao_chave', $id_questao_chave, PDO::PARAM_INT);
    $stmt_check->bindParam(':acerto_erro', $acerto_erro, PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();

    if ($count == 0) {
        $stmt_insert = $DB_con->prepare("INSERT INTO questao_erro_acerto (id_questao_chave, alt, acerto_erro, data_hora, id_user, id_nome) VALUES (:id_questao_chave, :alt, :acerto_erro, :data_hora, :id_user, :id_nome)");
        $stmt_insert->bindParam(':id_questao_chave', $id_questao_chave, PDO::PARAM_INT);
        $stmt_insert->bindParam(':alt', $alt, PDO::PARAM_STR);
        $stmt_insert->bindParam(':acerto_erro', $acerto_erro, PDO::PARAM_STR);
        $stmt_insert->bindParam(':data_hora', $data_hora, PDO::PARAM_STR);
        $stmt_insert->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_nome', $user_tp, PDO::PARAM_STR);
        $stmt_insert->execute();
    }
   
}











?>