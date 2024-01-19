<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Captura de questoes</title>
</head>

<body>
<!--<body onload="setTimeout(clickBotao, 5000)">-->
    <!-- <h1>Exemplo de botão clicado automaticamente após 5 segundos</h1> -->
    <!-- <button id='meuBotao' onclick="alert('Botão clicado!')">Clique aqui</button> -->
    
    <?php

    $click = $_GET['n'] + 1;
  

    
    $url = 'https://rota-api.grancursosonline.com.br/open/elastic/questao?perPage=100&anulada=0&desatualizada=0&sort=[%7B%22anos%22:%22desc%22%7D,%7B%22_score%22:%22desc%22%7D]&resolucao=todas&page=' . $click;
    $json_data = file_get_contents($url);



    echo "<a href='questoes.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";



    //echo $json_data;



    require_once "Robo.php";
    $c2 = new Robo;
    $c2->JsonBanco($json_data);



    ?>
   


    <script>
        function clickBotao() {
            var botao = document.getElementById("meuBotao");
            botao.click();
        }
    </script>
</body>

</html>