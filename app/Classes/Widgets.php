<?php

class Widgets
{
    function mostrarCadernos($id,$page)
    {
        $limit = 6;
        $offset = ($page - 1) * $limit;


        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    // $stmt = $DB_con->prepare("SELECT * FROM cadernos WHERE usuario_caderno LIKE :usuario_caderno LIMIT $offset, $limit");
    $stmt = $DB_con->prepare("SELECT c.*, caderno_publico.*
                         FROM cadernos c
                         INNER JOIN caderno_publico ON c.id_caderno = caderno_publico.id_caderno
                         WHERE c.usuario_caderno LIKE :usuario_caderno
                         LIMIT $offset, $limit");

        $stmt->execute(array('usuario_caderno' => $id));
        while ($row = $stmt->fetch()) {
            echo "
            
               <div class='col'>
                 <a href='ver_projeto.php?caderno=" . $row['id_caderno'] . "'>
                  <div class='card h-100'>
                    <img class='card-img-top' src='a/uploads/". $row['capa']."' alt='Card image cap'>
                    <div class='card-body'>
                      <h5 class='card-title'>".$row['nome_caderno']. "</h5>
                      <p class='card-text'>
                       " . $row['descricao'] . "
                      </p>
                      <span class='badge bg-dark float-left'>" . $row['preco'] . "</span>
                      <span class='badge bg-secondary'>" . $row['area'] . "</span>
                      <span class='badge bg-primary'>" . $row['autor_nome'] . "</span>

                    </div>
                  </div>
                  </a>
                </div>
            
            ";



        }
    }

    function pesquisaCadernos($pesquisa, $page)
    {
        $limit = 6;
        $offset = ($page - 1) * $limit;


        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT * FROM cadernos WHERE nome_caderno LIKE :nome_caderno LIMIT $offset, $limit");
        $stmt->execute(array('nome_caderno' => "%".$pesquisa."%"));
        while ($row = $stmt->fetch()) {
            echo "
            
               <div class='col'>
               <a href='ver_projeto.php?caderno=" . $row['id_caderno'] . "'>
                  <div class='card h-100'>
                    <img class='card-img-top' src='a/uploads/" . $row['capa'] . "' alt='Card image cap'>
                    <div class='card-body'>
                      <h5 class='card-title'>" . $row['nome_caderno'] . "</h5>
                      <p class='card-text'>
                       " . $row['descricao'] . "
                      </p>
                    </div>
                  </div>
                  </a>
                </div>
            
            ";
        }
    }



    function NavegarCadernosGeral($page)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS count FROM cadernos WHERE usuario_caderno = 39;");
        $stmt->execute(array());
        while ($row = $stmt->fetch()) {
            echo "página atual: ". $page;
            $paginas = ceil($row['count'] / 6);


            
            $a = " "; $b = " "; $c = " "; $ultima = " ";
            $n1 = " "; $n2 = " "; $n3 = " ";
            $avancar = $page + 1; $voltar = $page - 1;
    switch ($page) {
                 case 1:
                    $a = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                case 2:
                    $b = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                case 3:
                    $c = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                default:
                    $c = "active";
                    $n1 = $page - 2;
                    $n2 = $page - 1;
                    $n3 = $page;
                break;
             
    }


            
            



            echo "
  <div style='display: flex; justify-content: center;'>
  <ul class='pagination'>
    <li class='page-item prev'>
      <a class='page-link' href='preparatorios.php?pagina=$voltar'><i class='tf-icon bx bx-chevrons-left'></i></a>
    </li>
    <li class='page-item $a'>
      <a class='page-link' href='preparatorios.php?pagina=$n1'>$n1</a>
    </li>
    <li class='page-item $b'>
      <a class='page-link' href='preparatorios.php?pagina=$n2'>$n2</a>
    </li>
    <li class='page-item $c'>
      <a class='page-link' href='preparatorios.php?pagina=$n3'>$n3</a>
    </li>
    <li class='page-item'>
      <a class='page-link' href='javascript:void(0);'>...</a>
    </li>
    <li class='page-item $ultima'>
      <a class='page-link' href='javascript:void(0);'> $paginas</a>
    </li>
    <li class='page-item next'>
      <a class='page-link' href='preparatorios.php?pagina=$avancar'><i class='tf-icon bx bx-chevrons-right'></i></a>
    </li>
  </ul>
</div>";



        }
    }

    function NavegarCadernosPesquisa($pesquisa, $page)
    {
        
            echo "olá ". $pesquisa ." e ". $page;
        
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS count FROM cadernos WHERE nome_caderno LIKE :nome_caderno");
        $stmt->execute(array('nome_caderno' => "%" . $pesquisa . "%"));
        while ($row = $stmt->fetch()) {
            echo "página atual: " . $page;
            $paginas = ceil($row['count'] / 6);



            $a = " ";
            $b = " ";
            $c = " ";
            $ultima = " ";
            $n1 = " ";
            $n2 = " ";
            $n3 = " ";
            $avancar = $page + 1;
            $voltar = $page - 1;
            switch ($page) {
                case 1:
                    $a = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                case 2:
                    $b = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                case 3:
                    $c = "active";
                    $n1 = 1;
                    $n2 = 2;
                    $n3 = 3;
                    break;
                default:
                    $c = "active";
                    $n1 = $page - 2;
                    $n2 = $page - 1;
                    $n3 = $page;
                    break;
            }







            echo "
  <div style='display: flex; justify-content: center;'>
  <ul class='pagination'>
    <li class='page-item prev'>
      <a class='page-link' href='preparatorios.php?pagina=$voltar'><i class='tf-icon bx bx-chevrons-left'></i></a>
    </li>
    <li class='page-item $a'>
      <a class='page-link' href='preparatorios.php?pagina=$n1'>$n1</a>
    </li>
    <li class='page-item $b'>
      <a class='page-link' href='preparatorios.php?pagina=$n2'>$n2</a>
    </li>
    <li class='page-item $c'>
      <a class='page-link' href='preparatorios.php?pagina=$n3'>$n3</a>
    </li>
    <li class='page-item'>
      <a class='page-link' href='javascript:void(0);'>...</a>
    </li>
    <li class='page-item $ultima'>
      <a class='page-link' href='javascript:void(0);'> $paginas</a>
    </li>
    <li class='page-item next'>
      <a class='page-link' href='preparatorios.php?pagina=$avancar'><i class='tf-icon bx bx-chevrons-right'></i></a>
    </li>
  </ul>
</div>";
        }
    }

}

?>