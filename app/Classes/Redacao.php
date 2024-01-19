<?php

class Redacao{


    function VerTextos()
    {
        require_once "config.php";
        $stmt = $DB_con->prepare('SELECT * FROM redacao');
      
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                // echo "   <option value='".$row['id_lista']."'>".$row['nome_lista']."</option>";

                    echo "      <div class='collapse mt-2' id='collapseExample'>
                    <div class='d-grid d-sm-flex p-3 border'>
                    <img src='../assets/img/redacao/" . $row['img'] . "' alt='collapse-image' height='125' class='me-4 mb-sm-0 mb-2' />
                    <span>
                    <h6 class='card-title'>" . $row['ano'] . " - " . $row['tema'] . "</h6>
                    <p class='card-text'>" . $row['texto'] . "</p>
                    <a href='redacao_escrever.php?tema=" . $row['id'] . "'><button class='btn btn-primary float-right'>Clique aqui</button></a>
                    </span>

                    </div>

                    </div>";
            }
        }
    }


}
