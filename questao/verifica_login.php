<?php
session_start();

function verificarLogin() {
  if (isset($_SESSION['logado'])) {
    if ($_SESSION['logado'] == true) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

// Chamada da função e retorno da resposta
if (verificarLogin()) {
  echo "true";
} else {
  echo "false";
}
?>