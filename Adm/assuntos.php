<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Exemplo de botão clicado automaticamente</title>
</head>



</body>
<!-- <body onload="setTimeout(clickBotao, 5000)"> -->
<!-- <h1>Exemplo de botão clicado automaticamente após 5 segundos</h1> -->
<!-- <button id='meuBotao' onclick="alert('Botão clicado!')">Clique aqui</button> -->


<?php
require_once "Robo.php";

if (!isset($_GET['n'])) {
    $number = 1;
} else {
    $number = $_GET['n'];
}

error_reporting(0);
ini_set('display_errors', 0);
// https://rota-api.grancursosonline.com.br/open/materia/arvore?perPage=100&page=1&sort=indiceOrdenacao&comQuestoes=1&_source%5B%5D=nome&_source%5B%5D=assunto_raiz&_source%5B%5D=pai&_source%5B%5D=indice&_source%5B%5D=nivel
// $url = "https://rota-api.grancursosonline.com.br/open/elastic/prova?perPage=100&page=$number"; // . $click;

$url = "https://rota-api.grancursosonline.com.br/open/materia/arvore?perPage=100&page=$number&sort=indiceOrdenacao&comQuestoes=1&_source%5B%5D=nome&_source%5B%5D=assunto_raiz&_source%5B%5D=pai&_source%5B%5D=indice&_source%5B%5D=nivel&_source%5B%5D=id&_source%5B%5D=materia&_source%5B%5D=oab&_source%5B%5D=palavrasChave&_source%5B%5D=filhos&_source%5B%5D=slug";
$json_data = file_get_contents($url);
$dados = json_decode($json_data, true);

$c2 = new Robo;
// $c2->JsonBanco($json_data);

$click = $number + 1;
echo "<a href='assuntos.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";

$i = 0;
while ($i <= 99) {

    $id_chave_disciplina   = $dados['data']['rows'][$i]['id']; echo "<br>id_chave_disciplina : $id_chave_disciplina";
    $nome = $dados['data']['rows'][$i]['nome']; echo "<br>nome: $nome";
    $nome_ = $dados['data']['rows'][$i]['nome']; echo "<br>nome_: $nome_";
    $materia_id  = $dados['data']['rows'][$i]['assunto_raiz']; echo "<br>materia_id : $materia_id";
    $materia = $dados['data']['rows'][$i]['materia']; echo "<br>materia: $materia";
    $topico_acima = $dados['data']['rows'][$i]['pai']; echo "<br>topico_acima: $topico_acima";
    $oab = $dados['data']['rows'][$i]['oab']; echo "<br>oab: $oab";
    $assunto_raiz = $dados['data']['rows'][$i]['assunto_raiz']; echo "<br>assunto_raiz: $assunto_raiz";
    $palavras_chave = $dados['data']['rows'][$i]['palavrasChave'][0]? $dados['data']['rows'][$i]['palavrasChave'][0] : "false"; echo "<br>palavras_chave: $palavras_chave";
    $slg = $dados['data']['rows'][$i]['slug']; echo "<br>slg: $slg";
    $indice = $dados['data']['rows'][$i]['indice']; echo "<br>indice: $indice";
    $nivel = $dados['data']['rows'][$i]['nivel']; echo "<br>nivel: $nivel";




    $i++;
    echo "<br>";   
    
      $c2->NovoAssuntoPlus($id_chave_disciplina, $nome, $nome_, $materia_id, $materia, $topico_acima, $oab, $assunto_raiz, $palavras_chave, $slg, $indice, $nivel);
}



?>



</body>

</html>