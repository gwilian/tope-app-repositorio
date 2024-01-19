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
$url = "https://rota-api.grancursosonline.com.br/open/elastic/carreira?page=$number"; // . $click;
$json_data = file_get_contents($url);
$dados = json_decode($json_data, true);

$c2 = new Robo;
// $c2->JsonBanco($json_data);

$click = $number + 1;
echo "<a href='carreiras.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";

$i = 0;
while ($i <= 50) {

    $carreiras_id = $dados['data']['rows'][$i]['id']; echo "<br>id : $carreiras_id";
    $nome_carreiras = $dados['data']['rows'][$i]['nome']; echo "<br>nome: $nome_carreiras";
    $descricao_carreiras = $dados['data']['rows'][$i]['descricao']; echo "<br>desc: $descricao_carreiras";

    $i++;
    echo "<br>";   
    
    $c2 ->Novacarreira($carreiras_id, $nome_carreiras, $descricao_carreiras);
}



?>



</body>

</html>