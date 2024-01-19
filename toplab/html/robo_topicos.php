<?php


 echo "<br> <br>";
$click = $_GET['n'] + 1;
echo "<a href='/toplab/html//robo_topicos.php?n=".$click."'><button type='button' name='button'>Próxima página</button></a>";
echo "<br> <br>";
$conteudo = file_get_contents('https://rota-api.grancursosonline.com.br/open/materia/arvore?perPage=100&page='.$click.'&sort=indiceOrdenacao&comQuestoes=1&_source%5B%5D=id&_source%5B%5D=nome&_source%5B%5D=assunto_raiz&_source%5B%5D=pai&_source%5B%5D=indice&_source%5B%5D=nivel');
$dados = json_decode($conteudo, true);
 $i = 0;
 while ($i <= 99) {
     // echo  $dados['data']['rows'][$i]['enunciado']. '<br>';


       // nome,id,index,maisBuscado,robo
            if (isset($dados['data']['rows'][$i]['nome'])) {
             $nome = $dados['data']['rows'][$i]['nome']; //assunto da questão
             echo $nome."<br>";

             $assunto_raiz = $dados['data']['rows'][$i]['assunto_raiz']; //assunto da questão
             echo $assunto_raiz."<br>";

             $indice = $dados['data']['rows'][$i]['indice']; //assunto da questão
             echo $indice."<br>";

             $pai = $dados['data']['rows'][$i]['pai']; //id
             echo $pai."<br>";

             $id = $dados['data']['rows'][$i]['id']; //assunto da questão
             echo $id."<br>";

             $nivel = $dados['data']['rows'][$i]['nivel']; //assunto da questão
             echo $nivel."<br>";

             $index = $dados['data']['rows'][$i]['index']; //assunto da questão
             echo $index."<br>";

             $robo = 740;

                 require_once "Robo_B.php";
                 $c2 = new Robo;
                 $c2-> NovoTopico($nome,  $robo , $assunto_raiz, $indice, $pai, $id, $nivel, $index);


                 } else {
         echo "sem resultados!";
        }


echo "<hr>";
     $i++;
 }






 ?>
