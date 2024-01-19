<?php
/**
*
*/
class Adm
{

    function NovoChamado($id_user,$titulo,$relatorio,$status,$classe,$motivo,$data, $usuario_nome)
    {
      $relatorio_text = "<span class='badge rounded-pill bg-label-primary'>" . $usuario_nome . " em " . $data . "</span><br>" . $relatorio . "<hr>";

            


        require_once "config.php";
        $stmt = $DB_con->prepare('INSERT INTO chamados(id_user,titulo,relatorio,status,classe,motivo,data,usuario_nome) VALUES(:id_user,:titulo,:relatorio,:status,:classe,:motivo,:data,:usuario_nome)');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':relatorio', $relatorio_text);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':motivo', $motivo);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':usuario_nome', $usuario_nome);

        if ($stmt->execute()) {
            // echo "gravado com sucesso";
        }
    }


    function ListarResumosCaderno($id)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare('SELECT * FROM chamados WHERE id_user LIKE :id');
        $stmt->execute(array('id' => $id));
        while ($row = $stmt->fetch()) {

      
           $titulo = substr($row['titulo'], 0, 255);
                          echo   "<a href='chamado_ok.php?id_chamado=". $row['id']."' class='list-group-item list-group-item-action flex-column align-items-start '>
                            <div class='d-flex justify-content-between w-100'>
                              <h6><p style='color:black;'>ID:". $row['id']. "&nbsp &rarr; &nbsp <b>". $titulo. "...</b></p></h6>
                              <small class='text-muted'>criado em ". $row['data']. "</small>
                            </div>
                            <p>". $row['classe']. "&nbsp; &rarr; &nbsp;" . $row['motivo'] . "</p>
                            <small class='text'>". $row['status']."</small>
                          </a>";


        }


}

  function ExibirChamado($id)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM chamados WHERE id LIKE :id');
    $stmt->execute(array('id' => $id));
    while ($row = $stmt->fetch()) {


      
      echo   "<div class='card shadow-none bg-transparent border border-primary mb-3'>
                    <div class='card-body'>
                      <h5 class='card-title'>ID do chamado: ".$row['id']. "</h5>
                      <p class='card-text'>Autor: " . $row['usuario_nome'] . "</p>
                      <p class='card-text'>Motivo: " . $row['motivo'] . "</p>
                      <p class='card-text'>Classe: " . $row['classe'] . "</p>
                      <p class='card-text'>Status do chamado: " . $row['status'] . "</p>
                      <p class='card-text'>Data da solicitação: " . $row['usuario_nome'] . "</p>
                   
                     


                    </div>
                  </div>";


      echo $row['relatorio'];
    }
  }




}
?>