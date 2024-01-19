<?php
/**
 *
 */
class Compromisso
{
  // var $iduser;
  // var $nomecaderno;
  // var $materia;
  // var $topico;
  // var $subtopico;

  function NovoCompromisso($nomecompromisso, $data, $usuarioid){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO compromisso(nome_compromisso,data_compromisso,usuario_id) VALUES(:nome_compromisso, :data_compromisso, :usuario_id)');
    $stmt->bindParam(':nome_compromisso',$nomecompromisso);
    $stmt->bindParam(':data_compromisso',$data);
    $stmt->bindParam(':usuario_id',$usuarioid);

    if($stmt->execute()){
    // echo "gravado com sucesso";
    }

  }
  function MostrarCompromisso ($id){
    require_once "config.php";

try {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
     $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM compromisso WHERE data_compromisso LIKE :id');
    $stmt->execute(array('id' => $id));

    while($row = $stmt->fetch()) {

      list($data, $hora) = explode("T", $row["data_compromisso"]);


        echo "<b>";
        echo $row["nome_compromisso"]." - ".$hora;
        echo "</b>";
        echo "<hr>";

    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
  }

}




 ?>
