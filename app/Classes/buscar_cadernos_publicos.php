<?php

// get the q parameter from URL
$q = $_REQUEST["q"];

include 'PublicBook.php';
$ViewBook = new PublicBook;
$ViewBook -> CadernoPublicoView($q);

?>
