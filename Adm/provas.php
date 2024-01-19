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

// error_reporting(0);
// ini_set('display_errors', 0);
$url = "https://rota-api.grancursosonline.com.br/open/elastic/prova?perPage=100&page=$number"; // . $click;
$json_data = file_get_contents($url);
$dados = json_decode($json_data, true);

$c2 = new Robo;
// $c2->JsonBanco($json_data);

$click = $number + 1;
echo "<a href='provas.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";

$i = 0;
while ($i <= 99) {

    $id_chave_provas  = $dados['data']['rows'][$i]['id']; echo "<br>id : $id_chave_provas";
    $nome = $dados['data']['rows'][$i]['nome']; echo "<br>nome: $nome";
    $cargo = $dados['data']['rows'][$i]['cargo']['id']; echo "<br>cargo: $cargo";
    $orgao  = $dados['data']['rows'][$i]['orgao']['id']; echo "<br>orgao : $orgao";
    $banca = $dados['data']['rows'][$i]['banca']['id']; echo "<br>banca: $banca";
    $ano = $dados['data']['rows'][$i]['ano']; echo "<br>ano: $ano";
    $nivel = $dados['data']['rows'][$i]['nivel']; echo "<br>nivel: $nivel";
    $slg = $dados['data']['rows'][$i]['slug']; echo "<br>slg: $slg";


    $qtd_questoes = $dados['data']['rows'][$i]['quantidadeQuestoes']; echo "<br>qtd_questoes: $qtd_questoes";
    $prova = $dados['data']['rows'][$i]['folhaProva']; echo "<br>prova: $prova";
    $gabarito = $dados['data']['rows'][$i]['gabarito']; echo "<br>gabarito: $gabarito";




    $i++;
    echo "<br>";   
    
     $c2->NovaProvaPlus($id_chave_provas, $nome, $cargo, $orgao, $banca, $ano, $nivel, $slg, $qtd_questoes, $prova, $gabarito);
}



?>



</body>

</html>