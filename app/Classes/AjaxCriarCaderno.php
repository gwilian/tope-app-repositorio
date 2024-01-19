<?php
// Array with names

require_once "CriarCaderno.php";

// get the q parameter from URL
$q = $_POST["q"];
$usuario = $_POST["usr"];
$questao = $_POST["qst"];


$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {


switch ($q) {
case 1:
$c2 = new Caderno;
$c2->NovoErroAcerto($questao,$usuario, "acertou");
$hint = "Salvo! ";
break;
case 2:
$c2 = new Caderno;
$c2->NovoErroAcerto($questao,$usuario, "errou");
$hint = "Salvo! ";
break;
default:
// code...
break;
}

}

// operador ternário da operação
echo $hint === "" ? "Não encontrado" : $hint;
?>
