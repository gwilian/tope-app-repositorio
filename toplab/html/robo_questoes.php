<?php
$numeroq = $_GET['n'];
$conteudo = file_get_contents('banco/'.$numeroq.'.json');
$dados = json_decode($conteudo, true);
 // echo $dados['message']['text'];

$click = $_GET['n'] + 1;
echo "<a href='https://topeestudos.com/toplab/html/robo_questoes.php?n=".$click."'><button type='button' name='button'>Próxima página</button></a>";



 $i = 0;
 while ($i <= 99) {
     // echo  $dados['data']['rows'][$i]['enunciado']. '<br>';
      $numero_questao = $dados['data']['rows'][$i]['id']; //Numero da questão
      echo "$numero_questao";
     $ano =  $dados['data']['rows'][$i]['anos'][0]; //Ano
      $banca =  $dados['data']['rows'][$i]['bancas'][0]['nome']; //Banca
      $assunto =   $dados['data']['rows'][$i]['assuntos'][0]['nome_clean'];//tema
       //Assunto
      if (isset($dados['data']['rows'][$i]['assuntos'][1]['nome_clean'])) {
    $tema =  $dados['data']['rows'][$i]['assuntos'][1]['nome_clean'];
} else {
    $tema = 'Assunto genérico da banca';
}

 $enunciado =  $dados['data']['rows'][$i]['enunciado'];

 echo "<br>";
 $prova = $dados['data']['rows'][$i]['provas'][0]['cargo']['descricao']; //prova

$texto_associado =  $dados['data']['rows'][$i]['grupoQuestao']['enunciado']; //textos


 $dificuldade = $dados['data']['rows'][$i]['dificuldade']; //dificuldade
 $banca_sigla =  $dados['data']['rows'][$i]['bancas'][0]['sigla']; //banca_sigla
 $cargo =  $dados['data']['rows'][$i]['cargos'][0]['descricao']."<br>"; //cargo
 $orgao =  $dados['data']['rows'][$i]['orgaos'][0]['nome']."<br>"; //orgão
 $esfera =  $dados['data']['rows'][$i]['orgaos'][0]['esfera']."<br>"; //esfera
 $uf =  $dados['data']['rows'][$i]['orgaos'][0]['uf']."<br>"; //uf
 $carreira_01 =  $dados['data']['rows'][$i]['carreiras'][0]['nome']."<br>"; //carreira 01


  //carreira 02
 if (isset($dados['data']['rows'][$i]['carreiras'][1]['nome'])) {
 $carreira_02 =  $dados['data']['rows'][$i]['carreiras'][1]['nome'];
 } else {
 $carreira_02 =  'Carreira genérica da banca';
 }


 $assuntos_01 =  $dados['data']['rows'][$i]['assuntos'][0]['nome']; //assunto 01


 if (isset($dados['data']['rows'][$i]['assuntos'][1]['nome'])) {
 $assuntos_02 =  $dados['data']['rows'][$i]['assuntos'][1]['nome']; //assunto 02
 } else {
 $carreira_02 =  'Assunto genérico da banca';
 }



$resposta = $dados['data']['rows'][$i]['resposta'];


if (trim($dados['data']['rows'][$i]['itens'][1]['rotulo']) == 'E') {
    // O valor da chave "rotulo" é igual a "E"
    echo 'Certo e errado' . '<br>';
    $alt_a = "Certo";
    $alt_b = "Errado";
    $alt_c = "nulo";
    $alt_d = "nulo";
    $alt_e = "nulo";

  switch ($dados['data']['rows'][$i]['resposta']) {
   case $dados['data']['rows'][$i]['itens'][0]['id']:
   $alt_correta = "C";
    break;

    case $dados['data']['rows'][$i]['itens'][1]['id']:
    $alt_correta = "E";
     break;
  }
  
  
  if (isset($dados['data']['rows'][$i]['id'])) {

    
$etapa = "aprovado";
$estrutura = 3;
  require_once "Robo.php";
  $c2 = new Robo;
  $c2->NovaQuestao($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta, $texto_associado, $prova, $etapa, $estrutura, $dificuldade, $banca_sigla, $orgao, $esfera, $uf, $carreira_01, $carreira_02, $assuntos_01, $assuntos_02, $cargo);

    
} else {
 echo "Não há questões!";
 }

  




} else {
 if (isset($dados['data']['rows'][$i]['itens'][4]['rotulo'])) {
echo "questão ABCDE <br>";
$alt_a =  $dados['data']['rows'][$i]['itens'][0]['corpo'];
$alt_b =  $dados['data']['rows'][$i]['itens'][1]['corpo'];
$alt_c =  $dados['data']['rows'][$i]['itens'][2]['corpo'];
$alt_d =  $dados['data']['rows'][$i]['itens'][3]['corpo'];
$alt_e =  $dados['data']['rows'][$i]['itens'][4]['corpo'];


switch ($dados['data']['rows'][$i]['resposta']) {
 case $dados['data']['rows'][$i]['itens'][0]['id']:
  $alt_correta = "A";
  break;

  case $dados['data']['rows'][$i]['itens'][1]['id']:
   $alt_correta = "B";
   break;

   case $dados['data']['rows'][$i]['itens'][2]['id']:
    $alt_correta = "C";
    break;

    case $dados['data']['rows'][$i]['itens'][3]['id']:
     $alt_correta = "D";
     break;

     case $dados['data']['rows'][$i]['itens'][4]['id']:
      $alt_correta = "E";
      break;
}


if (isset($dados['data']['rows'][$i]['id'])) {

    
   
$etapa = "aprovado";
$estrutura = 2;
  require_once "Robo.php";
  $c2 = new Robo;
  $c2->NovaQuestao($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta, $texto_associado, $prova, $etapa, $estrutura, $dificuldade, $banca_sigla, $orgao, $esfera, $uf, $carreira_01, $carreira_02, $assuntos_01, $assuntos_02, $cargo);

 
    
} else {
 echo "Não há questões!";
 }





} else{
echo 'Questão ABCD';
$alt_a =  $dados['data']['rows'][$i]['itens'][0]['corpo'];
$alt_b =  $dados['data']['rows'][$i]['itens'][1]['corpo'];
$alt_c =  $dados['data']['rows'][$i]['itens'][2]['corpo'];
$alt_d =  $dados['data']['rows'][$i]['itens'][3]['corpo'];
$alt_e =  "nulo";
switch ($dados['data']['rows'][$i]['resposta']) {
 case $dados['data']['rows'][$i]['itens'][0]['id']:
  $alt_correta = "A";
  break;

  case $dados['data']['rows'][$i]['itens'][1]['id']:
   $alt_correta = "B";
   break;

   case $dados['data']['rows'][$i]['itens'][2]['id']:
    $alt_correta = "C";
    break;

    case $dados['data']['rows'][$i]['itens'][3]['id']:

     $alt_correta = "D";
     break;


}

if (isset($dados['data']['rows'][$i]['id'])) {
 $etapa = "aprovado";
$estrutura = 1;
  require_once "Robo.php";
  $c2 = new Robo;
  $c2->NovaQuestao($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta, $texto_associado, $prova, $etapa, $estrutura, $dificuldade, $banca_sigla, $orgao, $esfera, $uf, $carreira_01, $carreira_02, $assuntos_01, $assuntos_02, $cargo);

 } else {
 echo "Não há questões!";
 }




}
}




echo "<hr>";
     $i++;
 }






 ?>
