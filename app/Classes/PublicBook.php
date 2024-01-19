<?php

class PublicBook
{

  function CadernoLojaUsuario($id_user, $caderno)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $stmt = $DB_con->prepare('INSERT INTO cadernoloja (usuario_caderno, id_caderno, obs) SELECT :id_user, :caderno, NULL FROM dual WHERE NOT EXISTS (SELECT 1 FROM cadernoloja WHERE usuario_caderno = :id_user AND id_caderno = :caderno);');


    // $stmt->bindParam(':nome_materia', $mat);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':caderno', $caderno);

    if ($stmt->execute()) {
    }
  }



 function CadernoPublicoBanner($id_caderno){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
    $stmt->execute(array('id_caderno' => $id_caderno));
    while($row = $stmt->fetch()) {
     echo $row['capa_banner'];
    }}

  function textoLink($id_caderno)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
    $stmt->execute(array('id_caderno' => $id_caderno));
    while ($row = $stmt->fetch()) {
      echo $row['texto_link'];
    }
  }

  function precoCaderno($id_caderno)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
    $stmt->execute(array('id_caderno' => $id_caderno));
    while ($row = $stmt->fetch()) {
      echo $row['preco'];
    }
  }


    function CadernoPublicoIcone($id_caderno){
       $DB_HOST = 'localhost';
       $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
       $DB_NAME = 'tope_bd';
       $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
       $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
       $stmt->execute(array('id_caderno' => $id_caderno));
       while($row = $stmt->fetch()) {
        echo $row['icone'];
       }}

       function CadernoPublicoTitulo($id_caderno){
          $DB_HOST = 'localhost';
          $DB_USER = 'tope_bd';
           $DB_PASS = 'BMbFCeA8JYHGjSkK';
          $DB_NAME = 'tope_bd';
          $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
          $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
          $stmt->execute(array('id_caderno' => $id_caderno));
          while($row = $stmt->fetch()) {
           echo $row['titulo_caderno'];
          }}

          function CadernoPublicoBannerA($id_caderno){
             $DB_HOST = 'localhost';
             $DB_USER = 'tope_bd';
              $DB_PASS = 'BMbFCeA8JYHGjSkK';
             $DB_NAME = 'tope_bd';
             $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
             $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
             $stmt->execute(array('id_caderno' => $id_caderno));
             while($row = $stmt->fetch()) {
              echo $row['banner_1'];
             }}
             function CadernoPublicoBannerB($id_caderno){
                $DB_HOST = 'localhost';
                $DB_USER = 'tope_bd';
                 $DB_PASS = 'BMbFCeA8JYHGjSkK';
                $DB_NAME = 'tope_bd';
                $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                $stmt->execute(array('id_caderno' => $id_caderno));
                while($row = $stmt->fetch()) {
                 echo $row['banner_2'];
                }}
                function CadernoPublicoBannerC($id_caderno){
                   $DB_HOST = 'localhost';
                   $DB_USER = 'tope_bd';
                    $DB_PASS = 'BMbFCeA8JYHGjSkK';
                   $DB_NAME = 'tope_bd';
                   $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                   $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                   $stmt->execute(array('id_caderno' => $id_caderno));
                   while($row = $stmt->fetch()) {
                    echo $row['banner_3'];
                   }}

                   function CadernoPublicoDescDetalhada_min($id_caderno){
                      $DB_HOST = 'localhost';
                      $DB_USER = 'tope_bd';
                       $DB_PASS = 'BMbFCeA8JYHGjSkK';
                      $DB_NAME = 'tope_bd';
                      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                      $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                      $stmt->execute(array('id_caderno' => $id_caderno));
                      while($row = $stmt->fetch()) {
                       $texto =  $row['descricao_detalhada'];
                       echo substr($texto, 0, 300);
                       echo "...";
                      }}
                      function CadernoPublicoDescDetalhada($id_caderno){
                         $DB_HOST = 'localhost';
                         $DB_USER = 'tope_bd';
                          $DB_PASS = 'BMbFCeA8JYHGjSkK';
                         $DB_NAME = 'tope_bd';
                         $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                         $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                         $stmt->execute(array('id_caderno' => $id_caderno));
                         while($row = $stmt->fetch()) {
                          echo $row['descricao_detalhada'];

                         }}
                         function CadernoPublicoListaBeneficios($id_caderno){
                            $DB_HOST = 'localhost';
                            $DB_USER = 'tope_bd';
                             $DB_PASS = 'BMbFCeA8JYHGjSkK';
                            $DB_NAME = 'tope_bd';
                            $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                            $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                            $stmt->execute(array('id_caderno' => $id_caderno));
                            while($row = $stmt->fetch()) {
                             echo $row['lista_de_beneficios'];

                            }}
                            function CadernoPublicoComentarios($id_caderno){
                               $DB_HOST = 'localhost';
                               $DB_USER = 'tope_bd';
                                $DB_PASS = 'BMbFCeA8JYHGjSkK';
                               $DB_NAME = 'tope_bd';
                               $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                               $stmt = $DB_con->prepare('SELECT * FROM caderno_publico_comentario WHERE id_caderno_caderno LIKE :id_caderno');
                               $stmt->execute(array('id_caderno' => $id_caderno));
                               while($row = $stmt->fetch()) {
                                // echo $row['nome']."<br>".$row['comentario']."<br>".$row['data']."<br>";

                                echo "<div class='alert alert-dark mb-0' role='alert'><span class='badge bg-primary'>".$row['nome']." #".$row['usuario']." em ".$row['data']."</span><br>";
                                echo $row['comentario']."</div><br>";

                               }}
                                  function CadernoPublicoLink($id_caderno){
                                     $DB_HOST = 'localhost';
                                     $DB_USER = 'tope_bd';
                                      $DB_PASS = 'BMbFCeA8JYHGjSkK';
                                     $DB_NAME = 'tope_bd';
                                     $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                                     $stmt = $DB_con->prepare('SELECT * FROM caderno_publico WHERE id_caderno LIKE :id_caderno');
                                     $stmt->execute(array('id_caderno' => $id_caderno));
                                     while($row = $stmt->fetch()) {
                                      echo $row['link_pagamento'];
                                     }}


                                     function CadernoPublicoView($q){
                                        $DB_HOST = 'localhost';
                                        $DB_USER = 'tope_bd';
                                         $DB_PASS = 'BMbFCeA8JYHGjSkK';
                                        $DB_NAME = 'tope_bd';
                                        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                                        $stmt = $DB_con->prepare("SELECT * FROM caderno_publico WHERE titulo_caderno LIKE '%".$q."%'");
                                        $stmt->execute(array());
                                        $i = 0;
                                        while($row = $stmt->fetch()) {
                                         // echo $row['titulo_caderno'];


if ($i == 0) {
 echo "<div class='row mb-0'>";
        echo "  <div class='col-md'>
                   <a href='ver_projeto.php?caderno=".$row['id_caderno']."'><div class='card mb-0'>
                     <div class='row g-0'>
                       <div class='col-md-4'>
                         <img class='card-img card-img-left' src='a/uploads/".$row['icone']."' alt='Card image'>
                       </div>
                       <div class='col-md-8'>
                         <div class='card-body'>
                           <h5 class='card-title'>".$row['titulo_caderno']."</h5>
                           <p class='card-text'>
                              ".substr($row['descricao_basica'], 0 , 75)."..."."
                           </p>
                          <i class='bx bxs-dollar-circle'></i> <small class='text-muted'> ".$row['preco']."</small>
                            <i class='bx bxs-heart'></i> <small class='text-muted'> ".$row['quantid_cadernoade_usuarios']."</small>
                         </div>
                       </div>
                     </div>
                   </div></a>
                 </div>";

}elseif ($i == 1) {
 echo "         <div class='col-md'>
               <a href='ver_projeto.php?caderno=".$row['id_caderno']."'><div class='card mb-3'>
                 <div class='row g-0'>
                   <div class='col-md-8'>
                     <div class='card-body'>
                       <h5 class='card-title'>".$row['titulo_caderno']."</h5>
                       <p class='card-text'>
                        ".substr($row['descricao_basica'], 0 , 150)."..."."
                       </p>
                       <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                     </div>
                   </div>
                   <div class='col-md-4'>
                     <img class='card-img card-img-right'  src='a/uploads/".$row['icone']."' alt='Card image'>
                   </div>
                 </div>
               </div></a>
             </div>";

 echo " </div>";
}





echo $i;
$i++;
if ($i > 1) {
$i = 0;
}



}}
// fim do código da classe
}

 ?>
