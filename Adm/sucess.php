<?php

require_once "Classes/Adm.php";
$c3 = new Adm;
$c3->AtualizarChamado($_POST['id'], $_POST['relatorio'], "ok");

?>