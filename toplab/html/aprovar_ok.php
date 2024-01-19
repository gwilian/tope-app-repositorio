<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$estrutura = $_GET['estrutura'];
$alt_correta = $_GET['alter_correta'];
$etapa = "aprovado";
require_once 'Classes/CriarQuestao.php';
$c1 = new Questao;
$c1->AprovarQuestao($id, $estrutura, $alt_correta, $etapa);

// echo "$id"."<br>";
// echo "$estrutura"."<br>";
// echo "$alternativa_correta"."<br>";
// echo "$etapa"."<br>";


}else {
  echo "não configurado";
}




 ?>
