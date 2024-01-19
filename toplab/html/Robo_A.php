<?php
class Robo{

function NovoAssunto($nome,$id,$index,$maisBuscado,$robo){
  $DB_HOST = 'localhost';
   $DB_USER = 'tope_bd';
   $DB_PASS = 'BMbFCeA8JYHGjSkK';
   $DB_NAME = 'tope_bd';
   $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('INSERT INTO materias (nome_materia, usuario_criador,id_servidor, fluxograma, preferencia_busca ) VALUES (:nome_materia, :usuario_criador, :id_servidor, :fluxograma, :preferencia_busca);');
  $stmt->bindParam(':nome_materia',$nome);
  $stmt->bindParam(':usuario_criador',$robo);
  $stmt->bindParam(':id_servidor',$id);
  $stmt->bindParam(':fluxograma',$index);
  $stmt->bindParam(':preferencia_busca',$maisBuscado);



  if($stmt->execute()){
    // echo "gravado com sucesso";
  }
}


}



 ?>
