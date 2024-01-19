<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require_once "Robo.php";
$c2 = new Robo;


if (!isset($_GET['n'])) {
    $number = 1;
} else {
    $number = $_GET['n'];
}



$url = "https://rota-api.grancursosonline.com.br/open/elastic/questao?perPage=100&anulada=0&desatualizada=0&sort=[%7B%22anos%22:%22desc%22%7D,%7B%22_score%22:%22desc%22%7D]&resolucao=todas&page=$number"; // . $click;
$json_data = file_get_contents($url);
$dados = json_decode($json_data, true);

$click = $number + 1;
echo "<a href='questao_disciplina_assunto.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";

$i = 0;
while ($i <= 99) {
    echo "<h5>esta é a questão $i</h5>";
    $id_questao_chave = $dados['data']['rows'][$i]['id']; echo "<br>questao: $id_questao_chave";
    

            $a=0;
            while ($a <= 10) {

        if (isset($dados['data']['rows'][$i]['assuntos'][$a]['id'])) {
            $id_assunto = $dados['data']['rows'][$i]['assuntos'][$a]['id'];
            echo "<br>assunto: $id_assunto";

            $c2->questao_disciplina_assunto($id_questao_chave, $id_assunto);


        } else {
            // O valor não existe ou é nulo
            // Faça algo aqui
        }

               
               $a++; 
            }

       
       
    $i++;
    echo "<hr>";
}





?>    
</body>
</html>
   