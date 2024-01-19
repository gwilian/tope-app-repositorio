<?php
/**
*
*/
class Questao
{

//id_questao	numero_questao	ano	banca	tema	assunto	enuciado	alt_a	alt_b	alt_c	alt_d	alt_e	alt_correta	id_questao_criador	acertos_questao	erros_questao


// $DB_HOST = 'localhost';
// $DB_USER = 'tope_bd';
// $DB_PASS = 'BMbFCeA8JYHGjSkK';
// $DB_NAME = 'tope_bd';





  function NovaQuestao($numero_questao){

    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('INSERT INTO questao(numero_questao) VALUES(:numero_questao)');
  $stmt->execute(array('numero_questao' => $numero_questao));
  while($row = $stmt->fetch()) {

  }

}



function NovaQuestaoVerify($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $prova){

  $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';

  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('SELECT * FROM questao WHERE numero_questao LIKE :numero_questao');
  $stmt->execute(array('numero_questao' => $numero_questao));
  $i = 1;
  while($row = $stmt->fetch()) {
  $i++;}
  if ($i > 1) {
    echo "<b><p style='color:red'>Essa questão já existe</p></b>";
  }else {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $stmt = $DB_con->prepare('INSERT INTO questao(numero_questao, ano, banca, tema, assunto, enunciado, alt_a, alt_b, alt_c, alt_d, alt_e, prova) VALUES(:numero_questao, :ano, :banca, :tema, :assunto, :enunciado, :alt_a, :alt_b, :alt_c, :alt_d, :alt_e, :prova)');
  $stmt->execute(array('numero_questao' => $numero_questao,'ano' => $ano,'banca' => $banca,'tema' => $tema,'assunto' => $assunto,'enunciado' => $enunciado,'alt_a' => $alt_a,'alt_b' => $alt_b,'alt_c' => $alt_c,'alt_d' => $alt_d,'alt_e' => $alt_e,'prova' => $prova));
  while($row = $stmt->fetch()) {}
    echo "Questão inserida no banco com sucesso";
  }

}





function QuestaoRevisada($id ,$ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta, $id_questao_criador){
  $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';

    $DB_con2 = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
      $stmt = $DB_con2->prepare('UPDATE questao SET ano = :ano, banca = :banca, tema = :tema, assunto = :assunto, enunciado = :enunciado, alt_a = :alt_a, alt_b = :alt_b, alt_c = :alt_c, alt_d = :alt_d, alt_e = :alt_e, alt_correta = :alt_correta, id_questao_criador = :id_questao_criador WHERE questao.id_questao = :id');
     $stmt->execute(array(
         'ano' => $ano,
         'banca' => $banca,
         'tema' => $tema,
         'assunto' => $assunto,
         'enunciado' => $enunciado,
         'alt_a' => $alt_a,
         'alt_b' => $alt_b,
         'alt_c' => $alt_c,
         'alt_d' => $alt_d,
         'alt_e' => $alt_e,
         'alt_correta' => $alt_correta,
         'id_questao_criador' => $id_questao_criador,
        'id' => $id
));

    while($row = $stmt->fetch()) {
    echo "QUESTÃO CADASTRADA!!";
}


}


function ContarQuestao(){

  $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';


$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$stmt = $DB_con->prepare('SELECT * FROM questao');
$stmt->execute(array());
$i = 1;
while($row = $stmt->fetch()) {

$i++;
}
echo $i;
}

function ContarQuestaoAprovado(){

  $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';


$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$stmt = $DB_con->prepare("SELECT * FROM questao WHERE etapa LIKE 'aprovado'");
$stmt->execute(array());
$i = 1;
while($row = $stmt->fetch()) {

$i++;
}
echo $i;
}


function MostrarQuestaoAprovado($id){

  $DB_HOST = 'localhost';
$DB_USER = 'tope_bd';
$DB_PASS = 'BMbFCeA8JYHGjSkK';
$DB_NAME = 'tope_bd';

$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$stmt = $DB_con->prepare("SELECT * FROM questao WHERE etapa LIKE 'aprovar'  && questao.id_questao = :id LIMIT 1");
$stmt->execute(array('id' => $id));
$i = 1;
while($row = $stmt->fetch()) {

echo $row['numero_questao'];

}

}

function AprovarQuestao($id, $estrutura, $alt_correta, $etapa) {
$DB_HOST = 'localhost';
$DB_USER = 'tope_bd';
$DB_PASS = 'BMbFCeA8JYHGjSkK';
$DB_NAME = 'tope_bd';


    try {
        $db_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_con->setAttribute(PDO::ATTR_AUTOCOMMIT, true);
        $stmt = $db_con->prepare("UPDATE questao SET `alt_correta` = :alt_correta, `etapa` = :etapa, `estrutura` = :estrutura WHERE questao.numero_questao = :id");
        $stmt->execute(array(
            'alt_correta' => $alt_correta,
            'estrutura' => $estrutura,
            'etapa' => $etapa,
            'id' => $id
        ));
        if ($stmt->rowCount() > 0) {
          header('Location: aprovar_pesq.php');
          exit;
        } else {
            echo "A questão não pôde ser atualizada. Verifique se os dados estão corretos e tente novamente.";
        }
    } catch (PDOException $e) {
        echo "Erro ao atualizar a questão: " . $e->getMessage();
    }
}

}
?>
