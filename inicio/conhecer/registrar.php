<!DOCTYPE html>

<html>

<head>
    <title>#Tope - Sua plataforma de estudos</title>
</head>

<body>
   
<?php
if (isset($_GET['nome'])) {
   echo $_GET['nome'];
    echo "<br>";
    echo $_GET['nascimento'];
    echo "<br>";
    echo $_GET['genero'];
    echo "<br>";
    echo $_GET['opcao'];
    echo "<br>";
     echo $_GET['telefone'];
    echo "<br>";
    echo $_GET['email'];
    echo "<br>";
    echo $_GET['senha'];

} else {
    # code...
}



?>

</body>
</html>