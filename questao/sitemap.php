<?php

require_once "Questao.php";
$c1 = new Questao;
// $c1->Sitemap($_GET['id']);


$file = "sitemap" . $_GET['id'] . ".xml";
$content = $c1->Sitemap($_GET['id']);

// Abre o arquivo no modo de escrita
$handle = fopen($file, 'w');

// Escreve o conteúdo no arquivo
fwrite($handle, $content);

// Fecha o arquivo
fclose($handle);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $id = $_GET['id'] + 1;?>
        <a href="sitemap.php?id=<?php echo $id; ?>">
            <p>Próximo</p>
        </a>
</body>

</html>