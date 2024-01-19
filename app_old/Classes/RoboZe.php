<?php

class RoboZe
{

 function ContarErros($id_user){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM atividade_erro_acerto WHERE usuario = :id_user AND status LIKE :id');

    $stmt->execute(array('id_user' => $id_user, 'id' => 'errou'));
    $i = 0;
    while($row = $stmt->fetch()) {
    $i++;
    }

    echo $i;
}


function MostrarQuestaoErroAcerto($id_user, $status){

$DB_HOST = 'localhost';
$DB_USER = 'tope_bd';
 $DB_PASS = 'BMbFCeA8JYHGjSkK';
$DB_NAME = 'tope_bd';
$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$stmt = $DB_con->prepare('SELECT * FROM atividade_erro_acerto WHERE usuario = :id_user AND status LIKE :id');

$stmt->execute(array('id_user' => $id_user, 'id' => $status));
while($row = $stmt->fetch()) {
$questao = $row['questao'];
$repetida = 0;
require_once "config.php";
$stmt2 = $DB_con->prepare('SELECT * FROM questao_topicos WHERE id_questao = :questao');
$stmt2->bindParam(':questao',$questao);
if($stmt2->execute()){
$i = 1;  while($row = $stmt2->fetch()) {

echo "
<div class='card mb-4'>

<div class='card-body'>
<h6  class='mt-2 text-muted'>questão #".$i."</h6>
<button type='button' class='btn btn-outline-secondary d-block' disabled>".$row['ano']." - ".$row['banca']." - ".$row['tema']." - ".$row['assunto']."</button>

<p class='card-text'>

<br>  ".$row['enunciado']."</p>

<div class='form-check mt-3'>
        <input class='form-check-input'  type='radio' name='GFG' ".$row['id_questao']."' value='A' id='defaultCheck1".$row['id_questao']."' >
        <label id='a_".$row['id_questao']."' class='form-check-label' for='defaultCheck1".$row['id_questao']."'> A) ".$row['alt_a']." </label>
        </div>

        <div class='form-check mt-3'>
        <input class='form-check-input' type='radio'  name='GFG'".$row['id_questao']."' value='B' id='defaultCheck2".$row['id_questao']."' >
        <label id='b_".$row['id_questao']."' class='form-check-label' for='defaultCheck2".$row['id_questao']."'> B) ".$row['alt_b']." </label>
        </div>

        <div class='form-check mt-3'>
        <input class='form-check-input' type='radio'  name='GFG'".$row['id_questao']."' value='C' id='defaultCheck3".$row['id_questao']."' >
        <label id='c_".$row['id_questao']."' class='form-check-label' for='defaultCheck3".$row['id_questao']."'> C) ".$row['alt_c']." </label>
        </div>

        <div class='form-check mt-3'>
        <input class='form-check-input' type='radio' name='GFG'".$row['id_questao']."' value='D' id='defaultCheck4".$row['id_questao']."' >
        <label id='d_".$row['id_questao']."' class='form-check-label' for='defaultCheck4".$row['id_questao']."'> D) ".$row['alt_d']." </label>
        </div>

        <div class='form-check mt-3'>
        <input class='form-check-input' type='radio'   name='GFG'".$row['id_questao']."' value='E' id='defaultCheck5".$row['id_questao']."' >
        <label id='e_".$row['id_questao']."' class='form-check-label' for='defaultCheck5".$row['id_questao']."'> E) ".$row['alt_e']." </label>
        </div>

<br>
<div id='disp".$row['id_questao']."' style=
'color:green; font-size:18px; font-weight:bold;'>
</div>
<hr>

<button id='btn".$row['id_questao']."'   class='btn btn-outline-success'  onclick=\"display(".$row['id_questao'].", '".$row['alt_correta']."'); \"> <i class='bx bxs-check-square' >Vizualizar resposta</i></button>
&nbsp |
<i class='bx bx-message-dots'> Comentários</i>
&nbsp |
<i class='bx bx-stats'> Estatísticas</i>



</div>   </div>
";  $i++;

}
}


}


}



}
?>
