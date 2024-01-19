<?php
if (isset($_GET['postName'])) {
    $selectedValues = $_GET['postName'];
    foreach ($selectedValues as $value) {
        $value_send = "'".$value."'";
        // echo $value_send;
        echo "<div class='alert alert-primary' role='alert'> Questões de $value</div>";
        require_once "Classes/CriarCaderno.php";
        $c2 = new Caderno;
        
          $value_post="0";
        if (isset($_GET['post_q'])) {
         $value_post= $_GET['post_q'];
        }
        
        $c2->ExibirQuestaoPag($value_send, $value_post);
    }
}

 ?>
