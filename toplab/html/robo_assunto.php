<?php

$conteudo = file_get_contents('https://rota-api.grancursosonline.com.br/open/elastic/assunto?perPage=500&page=1&pages=1&materia=1&_source%5B%5D=id&_source%5B%5D=nome&_source%5B%5D=maisBuscado&_source%5B%5D=maisBuscadoPosicao');
$dados = json_decode($conteudo, true);
  echo $dados['message']['text'];
// $click = $_GET['n'] + 1;
// echo "<a href='https://topeestudos.com/toplab/html/robo_questoes.php?n=".$click."'><button type='button' name='button'>Próxima página</button></a>";

 $i = 0;
 while ($i <= 158) {
     // echo  $dados['data']['rows'][$i]['enunciado']. '<br>';


       // nome,id,index,maisBuscado,robo
            if (isset($dados['data']['rows'][$i]['nome'])) {
             $assunto = $dados['data']['rows'][$i]['nome']; //assunto da questão
            echo $assunto."<br>";
              $assunto_id = $dados['data']['rows'][$i]['id']; //assunto da questão
               echo $assunto_id."<br>";
               $assunto_index = $dados['data']['rows'][$i]['index']; //assunto da questão
                echo $assunto_index."<br>";
                $maisBuscado = isset($dados['data']['rows'][$i]['maisBuscado'])?$dados['data']['rows'][$i]['maisBuscado']:"0"; //assunto da questão
                 echo $maisBuscado."<br>";
                 $robo = 740;
                 require_once "Robo_A.php";
                 $c2 = new Robo;
                 $c2->NovoAssunto( $assunto, $assunto_id,$assunto_index,$maisBuscado,$robo);


                 } else {
         echo "sem resultados!";
        }


echo "<hr>";
     $i++;
 }






 ?>
