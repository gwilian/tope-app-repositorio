<?php

if (isset($_GET['q'])) {
 $email = $_GET['q'];
 require_once "Auth.php";
 $c2 = new Auth;
 $c2->VerificaEmail($email);
}




 ?>
