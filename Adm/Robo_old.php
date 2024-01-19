<?php
class Robo{

function NovaQuestao($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta, $texto_associado, $prova, $etapa, $estrutura, $dificuldade, $banca_sigla, $orgao, $esfera, $uf, $carreira_01, $carreira_02, $assuntos_01, $assuntos_02, $cargo){
  $DB_HOST = 'localhost';
   $DB_USER = 'tope_bd';
   $DB_PASS = 'BMbFCeA8JYHGjSkK';
   $DB_NAME = 'tope_bd';
   $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('INSERT INTO questao (numero_questao, ano, banca, tema, assunto, enunciado, alt_a, alt_b, alt_c, alt_d, alt_e, alt_correta, texto_associado, prova, etapa, estrutura, dificuldade, banca_sigla, orgao, esfera, uf, carreira_01, carreira_02, assuntos_01, assuntos_02, cargo  ) VALUES (:numero_questao, :ano, :banca, :tema, :assunto, :enunciado, :alt_a, :alt_b, :alt_c, :alt_d, :alt_e, :alt_correta, :texto_associado, :prova, :etapa, :estrutura, :dificuldade, :banca_sigla, :orgao, :esfera, :uf, :carreira_01, :carreira_02, :assuntos_01, :assuntos_02, :cargo );');
  $stmt->bindParam(':numero_questao',$numero_questao);
  $stmt->bindParam(':ano',$ano);
  $stmt->bindParam(':banca',$banca);
  $stmt->bindParam(':tema',$tema);
  $stmt->bindParam(':assunto',$assunto);
  $stmt->bindParam(':enunciado',$enunciado);
  $stmt->bindParam(':alt_a',$alt_a);
  $stmt->bindParam(':alt_b',$alt_b);
  $stmt->bindParam(':alt_c',$alt_c);
  $stmt->bindParam(':alt_d',$alt_d);
  $stmt->bindParam(':alt_e',$alt_e);
  $stmt->bindParam(':alt_correta',$alt_correta);
  $stmt->bindParam(':texto_associado',$texto_associado);
  $stmt->bindParam(':prova',$prova);
  $stmt->bindParam(':etapa',$etapa);
  $stmt->bindParam(':estrutura',$estrutura);
  $stmt->bindParam(':dificuldade',$dificuldade);
   $stmt->bindParam(':banca_sigla',$banca_sigla);
  $stmt->bindParam(':orgao',$orgao);
  $stmt->bindParam(':esfera',$esfera);
  $stmt->bindParam(':uf',$uf);
  $stmt->bindParam(':carreira_01',$carreira_01);
  $stmt->bindParam(':carreira_02',$carreira_02);
  $stmt->bindParam(':assuntos_01',$assuntos_01);
  $stmt->bindParam(':assuntos_02',$assuntos_02);
  $stmt->bindParam(':cargo',$cargo);


  if($stmt->execute()){
    // echo "gravado com sucesso";
  }
}
  function JsonBanco($json)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $stmt = $DB_con->prepare('INSERT INTO qjson (json) VALUES (:json);');
    $stmt->bindParam(':json', $json);
 
   


    if ($stmt->execute()) {
      // echo "gravado com sucesso";
    }
  }

}



 ?>
