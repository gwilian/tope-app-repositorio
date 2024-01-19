<?php

class Adm{
 
 function ListarChamados(){
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare('SELECT * FROM chamados WHERE status LIKE :status');
        $stmt->execute(array('status' => "Aguardando Resposta"));
        while ($row = $stmt->fetch()) {
            echo "<a href='editar_chamado.php?id=".$row['id']. "' class='list-group-item list-group-item-action '>" . $row['motivo'] . "</a>";
        }}

    function EditarChamados($id)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare('SELECT * FROM chamados WHERE id LIKE :id');
        $stmt->execute(array('id' => "$id"));
        while ($row = $stmt->fetch()) {
            echo "<div class='card shadow-none bg-transparent border border-primary mb-3'>
                    <div class='card-body'>
                      <h5 class='card-title'>ID do chamado: ". $row['id']. "</h5>
                      <p class='card-text'>Autor: " . $row['usuario_nome'] . "</p>
                      <p class='card-text'>Motivo: " . $row['motivo'] . "</p>
                      <p class='card-text'>Classe: " . $row['classe'] . "</p>
                      <p class='card-text'>Status do chamado:" . $row['status'] . "</p>
                      <p class='card-text'>Data da solicitação:" . $row['data'] . "</p>
                    </div></div>";
        
                    echo $row['relatorio'];
           
            echo " <input type='hidden' name='id' value='" . $row['id'] . "'>";
        
                }
    }

   function AtualizarChamado($id, $str, $status = null) {
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('d/m/Y H:i:s');
  $DB_HOST = 'localhost';
  $DB_USER = 'tope_bd';
  $DB_PASS = 'BMbFCeA8JYHGjSkK';
  $DB_NAME = 'tope_bd';
  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

  // Atualiza o relatório
  $stmt = $DB_con->prepare('UPDATE chamados SET relatorio = CONCAT(relatorio, :str) WHERE chamados.id = :id');
  $stmt->execute(array('id' => $id, 'str' => "<span class='badge rounded-pill bg-label-primary'>Suporte.tope em $data</span><br>" . $str));

  // Atualiza o status, se necessário
  
    $stmt = $DB_con->prepare('UPDATE chamados SET status = :str WHERE chamados.id = :id');
    $stmt->execute(array('id' => $id, 'str' => "<span class='badge rounded-pill bg-label-primary'> RESPONDIDO POR Suporte.tope em: ".$data." </span><br>" ));
  
}


}
?>