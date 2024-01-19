<?php
class Robo{

function NovoTopico($nome_topico,  $usuario_criador, $id_materias, $indice, $pai, $id_no_banco, $nivel, $fluxograma){
  $DB_HOST = 'localhost';
   $DB_USER = 'tope_bd';
   $DB_PASS = 'BMbFCeA8JYHGjSkK';
   $DB_NAME = 'tope_bd';
   $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('INSERT INTO topicos (nome_topico,  usuario_criador, id_materias, indice, pai, id_no_banco, nivel, fluxograma ) VALUES (:nome_topico,  :usuario_criador, :id_materias, :indice, :pai, :id_no_banco, :nivel, :fluxograma);');
  $stmt->bindParam(':nome_topico',$nome_topico);
  $stmt->bindParam(':usuario_criador',$usuario_criador);
  $stmt->bindParam(':id_materias',$id_materias);
  $stmt->bindParam(':indice',$indice);
  $stmt->bindParam(':pai',$pai);
  $stmt->bindParam(':id_no_banco',$id_no_banco);
  $stmt->bindParam(':nivel',$nivel);
  $stmt->bindParam(':fluxograma',$fluxograma);




  if($stmt->execute()){
     echo "gravado com sucesso";
  }
}


}



 ?>
