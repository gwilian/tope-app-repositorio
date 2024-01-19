<?php
/**
*
*/
class Caderno
{
  var $iduser;
  var $nomecaderno;
  var $materia;
  var $topico;
  var $subtopico;


  function NovoCaderno($nome, $desc, $usuario){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO cadernos(nome_caderno,descricao,usuario_caderno) VALUES(:nome_caderno, :descricao, :usuario_caderno)');
    $stmt->bindParam(':nome_caderno',$nome);
    $stmt->bindParam(':descricao',$desc);
    $stmt->bindParam(':usuario_caderno',$usuario);

    if($stmt->execute()){
      // echo "gravado com sucesso";
    }

  }

  function NovaMateria($mat, $nome, $caderno){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO materias(nome_materia,usuario_criador,id_caderno) VALUES(:nome_materia, :usuario_criador, :id_caderno)');
    $stmt->bindParam(':nome_materia',$mat);
    $stmt->bindParam(':usuario_criador',$nome);
    $stmt->bindParam(':id_caderno',$caderno);

    if($stmt->execute()){

    }
  }

  function NovoTopico($nome, $usuario, $id_materias, $id_caderno){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO topicos(nome_topico,usuario_criador,id_materias, id_caderno) VALUES(:nome_topico, :usuario_criador, :id_materias, :id_caderno)');
    $stmt->bindParam(':nome_topico',$nome);
    $stmt->bindParam(':usuario_criador',$usuario);
    $stmt->bindParam(':id_materias',$id_materias);
    $stmt->bindParam(':id_caderno',$id_caderno);

    if($stmt->execute()){
      // echo "gravado com sucesso";
    }
  }
  function NovoSubtopico(){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO materias(nome_materia,usuario_criador,usuario_caderno) VALUES(:nome_caderno, :descricao, :usuario_caderno)');
    $stmt->bindParam(':nome_caderno',$nome);
    $stmt->bindParam(':descricao',$desc);
    $stmt->bindParam(':usuario_caderno',$usuario);

    if($stmt->execute()){
      // echo "gravado com sucesso";
    }
  }

  function ListarCadernosLojaEditar($id, $id_user)
  {
    require_once "config.php";

    

    try {
      $DB_HOST = 'localhost';
      $DB_USER = 'tope_bd';
      $DB_PASS = 'BMbFCeA8JYHGjSkK';
      $DB_NAME = 'tope_bd';
      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
      $stmt = $DB_con->prepare('SELECT * FROM cadernos WHERE id_caderno = :id AND usuario_caderno = :id_user');
      $stmt->execute(array('id' => $id, 'id_user' => $id_user));
      
      $i = 1;
      $ib = false;
      while ($row = $stmt->fetch()) {
        // Se houver pelo menos um resultado da consulta
        $ib = true;
        // Resto do código para processar cada linha de resultado
      }

      if (!$ib) {
        // Se $ib for falso, significa que a consulta não retornou resultados
        echo "<div class='text-center' style='margin-bottom: 15px;'><span class='badge rounded-pill bg-warning'>Caderno adquirido na loja</span></div>";

      }else{
        echo"
            <div class='text-center' style='margin-bottom: 15px;'>
           <a href='caderno_edit.php?caderno=$id'
            <button type='button' class='btn rounded-pill btn-outline-primary' onclick='abrirLink()'>
            <span class='tf-icons bx bx-edit'></span>&nbsp; Editar Caderno
            </button></a> 
            </div>";
      }
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
  }



  function ListarCadernosLojaSecurity($id, $id_user)
  {
    require_once "config.php";



    try {
      $DB_HOST = 'localhost';
      $DB_USER = 'tope_bd';
      $DB_PASS = 'BMbFCeA8JYHGjSkK';
      $DB_NAME = 'tope_bd';
      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
      $stmt = $DB_con->prepare('SELECT * FROM cadernos WHERE id_caderno = :id AND usuario_caderno = :id_user');
      $stmt->execute(array('id' => $id, 'id_user' => $id_user));

      $i = 1;
      $ib = false;
      while ($row = $stmt->fetch()) {
        // Se houver pelo menos um resultado da consulta
        $ib = true;
        // Resto do código para processar cada linha de resultado
      }

      if (!$ib) {

        header("Location: caderno.php?id=$id");
        exit;

      } else {
        echo " <div class='text-center' style='margin-bottom: 15px;'><span class='badge rounded-pill bg-warning'>Edição autorizada</span></div>";
      }
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
  }

  function ListarCadernos($id){
    require_once "config.php";

    try {
      $DB_HOST = 'localhost';
      $DB_USER = 'tope_bd';
       $DB_PASS = 'BMbFCeA8JYHGjSkK';
      $DB_NAME = 'tope_bd';
      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
      $stmt = $DB_con->prepare('SELECT * FROM cadernos WHERE usuario_caderno LIKE :id');
      $stmt->execute(array('id' => $id));
      $i = 1;
      $ib = false;
      while($row = $stmt->fetch()) {
       
        echo "
        <a href='a/caderno.php?id=".$row["id_caderno"]."' '>
        <div class='col'>
          <div class='card h-100'>
            <img class='card-img-top' src='a/uploads/".$row["capa"]."' alt='Card image cap' />
            <div class='card-body'>
              <h5 class='card-title'>". $row["nome_caderno"]."</h5>
              <p class='card-text'>

              </p>
            </div>
          </div>
        </div></a>
        ";
      }

    } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
  }



  function ListarCadernosLoja($id)
  {
    require_once "config.php";
      // echo"<h5 class='pb-1 mb-4'>Cadernos Adquiridos:</h5>";
    try {
      $DB_HOST = 'localhost';
      $DB_USER = 'tope_bd';
      $DB_PASS = 'BMbFCeA8JYHGjSkK';
      $DB_NAME = 'tope_bd';
      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
      // $stmt = $DB_con->prepare('SELECT * FROM cadernoloja WHERE usuario_caderno LIKE :id');
      $stmt = $DB_con->prepare('SELECT cadernoloja.*, cadernos.*
                         FROM cadernoloja
                         LEFT JOIN cadernos ON cadernoloja.id_caderno = cadernos.id_caderno
                         WHERE cadernoloja.usuario_caderno LIKE :id');
      $stmt->execute(array('id' => $id));
      $i = 1;
      $ib = false;
      while ($row = $stmt->fetch()) {
        echo "
        <a href='a/caderno.php?id=" . $row["id_caderno"] . "' '>
        <div class='col'>
          <div class='card h-100'>
            <img class='card-img-top' src='a/uploads/" . $row["capa"] . "' alt='Card image cap' />
            <div class='card-body'>
              <h5 class='card-title'>" . $row["nome_caderno"] . "</h5>
              <p class='card-text'>

              </p>
            </div>
          </div>
        </div></a>
        ";
      }
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
  }



  function ListarMaterias($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo "<div class='alert alert-primary' role='alert'><h4>".$row['nome_materia']." </h4><ul>";
      //
      //
      $stmt2 = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias LIKE :id');
      $stmt2->execute(array('id' => $row['id_materias']));
      while($row2 = $stmt2->fetch()) {
        //
        if ($row2['topico_material'] == "false") {
          echo "<li style='color:#b8b6b0;'>".$row2['nome_topico']." - (sem material) </li>";
        }else {
          echo "<a href='../a/uploads/".$row2['topico_material']."'> <li>".$row2['nome_topico']."</li></a>";
        }

        //

      }
      // echo " <a href=\"#\"><hr> <small class=\"text-light fw-semibold\"> (adicionar tópico)</small> </a>";
      echo  "</ul></div>";
    }



  }
  function ListarResumosCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo "<div class='alert alert-primary' role='alert'><h4>".$row['nome_materia']."</h4><ul>";
      //
      //
      $stmt2 = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias LIKE :id');
      $stmt2->execute(array('id' => $row['id_materias']));
      while($row2 = $stmt2->fetch()) {
        //
        echo "<a href='../a/resumo.php?topico=".$row2['id_topicos']."'> <li>".$row2['nome_topico']." - Resumo</li></a>";
        //

      }
      echo  "</ul></div>";
    }



  }
  function ListarAtividadeCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo "<div class='alert alert-primary' role='alert'><h4>".$row['nome_materia']."</h4><ul>";
      //
      //
      $stmt2 = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias LIKE :id');
      $stmt2->execute(array('id' => $row['id_materias']));
      while($row2 = $stmt2->fetch()) {
        //
        echo "<a href='../a/lista_exercicio.php?id_topico=".$row2['id_topicos']."'> <li>".$row2['nome_topico']." - Atividades </li></a>";
        //

      }
      echo  "</ul></div>";
    }



  }
  function ListarTasksCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo "<div class='alert alert-primary' role='alert'><h4>".$row['nome_materia']."</h4><ul>";
      //
      //
      $stmt2 = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias LIKE :id');
      $stmt2->execute(array('id' => $row['id_materias']));
      while($row2 = $stmt2->fetch()) {
        //
        echo "<a href='#'> <li>".$row2['nome_topico']." - Tasks </li></a>";
        //

      }
      echo  "</ul></div>";
    }



  }

  function ContarMaterias($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    $i=0;
    while($row = $stmt->fetch()) {
      $i++;
    }
    echo "$i";


  }

  // LISTAR CONTEÚDO DO CADERNO
  function ListarConteudoCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_caderno LIKE :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo "<div class='alert alert-primary' role='alert'><h4>".$row['nome_materia']."&nbsp <a href=\"../a/criar_topico.php?caderno=$id&materia=".$row['id_materias']."\"><button type=\"button\" class=\"btn rounded-pill btn-sm btn-icon btn-primary\"><span class=\"tf-icons bx bx-plus\"></span></button></a>";
      echo "<a href=\"editar_materia.php?caderno=$id&materia=".$row['id_materias']."\"> <button type=\"button\" class=\"btn rounded-pill btn-sm btn-icon btn-primary\"><span class=\"tf-icons bx bxs-edit\"></span></button></a>";
      echo "&nbsp<a href=\"excluir.php?idcad=6&caderno=$id&materia=".$row['id_materias']."\"><button type=\"button\" class=\"btn rounded-pill btn-sm btn-icon btn-primary\"><span class=\"tf-icons bx bx-trash-alt\"></span></button></a></h4><ul>";


      $stmt2 = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias LIKE :id');
      $stmt2->execute(array('id' => $row['id_materias']));
      while($row2 = $stmt2->fetch()) {

        if ($row2['topico_material'] == "false") {
          $status_material = "";
        }else {
          $status_material = "( material incluído ✔ )";
        }
        echo "<li>".$row2['nome_topico']."&nbsp $status_material &nbsp<a href=\"editar_topico.php?topico=".$row2['id_topicos']."&caderno=".$row2['id_caderno']."\"><strong style ='color:#7d7a79;'>editar</strong></a>&nbsp
        - &nbsp <a href=\"excluir.php?idcad=9&idtop=".$row2['id_topicos']."&caderno=".$row2['id_caderno']."\"> <strong style ='color:#7d7a79;'>excluir</strong> </a>
        </li>";

      }
      echo  "</ul></div>";
    }

  }

  function MostrarNomeMateria($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo $row['nome_materia'];
    }
  }
  function MostrarNomeTopicos($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM topicos WHERE id_topicos = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      echo $row['nome_topico'];
    }

  }

  function EditarMateriaCaderno($id,$str){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('UPDATE materias SET nome_materia = :str WHERE materias.id_materias = :id');
    $stmt->execute(array('id' => $id, 'str' => $str));
    while($row = $stmt->fetch()) {
      echo $row['nome_materia'];
    }
  }
  function EditarTopicoCaderno($id,$str){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('UPDATE topicos SET nome_topico = :str WHERE topicos.id_topicos = :id');
    $stmt->execute(array('id' => $id, 'str' => $str));
    while($row = $stmt->fetch()) {
      echo $row['nome_materia'];
    }
  }

  function ExcluirCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM cadernos WHERE `cadernos`.`id_caderno` = :id');
    $stmt->execute(array('id' => $id));


  }
  function ExcluirMateriasDoCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM materias WHERE `materias`.`id_caderno` = :id');
    $stmt->execute(array('id' => $id));

  }

  function ExcluirMateria($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM materias WHERE `materias`.`id_materias` = :id');
    $stmt->execute(array('id' => $id));

  }

  function ExcluirMateriaTopico($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM topicos WHERE `topicos`.`id_materias` = :id');
    $stmt->execute(array('id' => $id));
  }

  function ExcluirTopico($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM topicos WHERE `topicos`.`id_topicos` = :id');
    $stmt->execute(array('id' => $id));

  }

  function ExcluirMateriaTopicoDoCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    // $stmt = $DB_con->prepare('SELECT * FROM materias WHERE id_materias = :id');
    $stmt = $DB_con->prepare('DELETE FROM topicos WHERE `topicos`.`id_caderno` = :id');
    $stmt->execute(array('id' => $id));


  }

  function CapaCaderno($id,$capa){
    require_once "config.php";

    $stmt = $DB_con->prepare('UPDATE cadernos SET capa = :capa WHERE cadernos.id_caderno = :id');
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':capa',$capa);
    if($stmt->execute()){
      // echo "gravado com sucesso";
    }
  }

  function MostrarCapaCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM cadernos WHERE id_caderno = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      return $row['capa'];
    }
  }

  function CadernoMaterial($id,$material){
    require_once "config.php";
    $stmt = $DB_con->prepare('UPDATE topicos SET topico_material = :material WHERE topicos.id_topicos  = :id');
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':material',$material);
    if($stmt->execute()){
      // echo "gravado com sucesso";
    }
  }
  function ExcluirMaterialCadernoTopico($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM topicos WHERE id_topicos = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      unlink("../a/uploads/".$row['topico_material']);
    }
  }
  function ExcluirMaterialdoCaderno($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM topicos WHERE id_caderno = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      unlink("../a/uploads/".$row['topico_material']);
      error_reporting(0);
      ini_set(“display_errors”, 0 );
    }
  }
  function ExcluirMaterialdaMateria($id){
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM topicos WHERE id_materias = :id');
    $stmt->execute(array('id' => $id));
    while($row = $stmt->fetch()) {
      unlink("../a/uploads/".$row['topico_material']);
    }
  }

  //ano,	banca,	tema,	assunto,	enunciado,	imagem,	texto,	alt_a,	alt_b,	alt_c,	alt_d,	alt_e,	alt_correta,	id_questao_criador,	acertos_questao,	erros_questao,	id_topico,	true_false

  function NovaQuestaoTopico($ano,	$banca,	$tema,	$assunto,	$enunciado,	$imagem,	$texto,	$alt_a,	$alt_b,	$alt_c,	$alt_d,	$alt_e,	$alt_correta,	$id_questao_criador,	$id_topico,	$true_false, $id_lista){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO questao_topicos(ano,	banca,	tema,	assunto,	enunciado,	imagem,	texto,	alt_a,	alt_b,	alt_c,	alt_d,	alt_e,	alt_correta,	id_questao_criador,	id_topico,	true_false, id_lista) VALUES(:ano,	:banca,	:tema,	:assunto,	:enunciado,	:imagem,	:texto,	:alt_a,	:alt_b,	:alt_c,	:alt_d,	:alt_e,	:alt_correta,	:id_questao_criador,	:id_topico,	:true_false, :id_lista)');
    $stmt->bindParam(':ano',$ano);
    $stmt->bindParam(':banca',$banca);
    $stmt->bindParam(':tema',$tema);
    $stmt->bindParam(':assunto',$assunto);
    $stmt->bindParam(':enunciado',$enunciado);
    $stmt->bindParam(':imagem',$imagem);
    $stmt->bindParam(':texto',$texto);
    $stmt->bindParam(':alt_a',$alt_a);
    $stmt->bindParam(':alt_b',$alt_b);
    $stmt->bindParam(':alt_c',$alt_c);
    $stmt->bindParam(':alt_d',$alt_d);
    $stmt->bindParam(':alt_e',$alt_e);
    $stmt->bindParam(':alt_correta',$alt_correta);
    $stmt->bindParam(':id_questao_criador',$id_questao_criador);
    $stmt->bindParam(':id_topico',$id_topico);
    $stmt->bindParam(':true_false',$true_false);
    $stmt->bindParam(':id_lista',$id_lista);

    if($stmt->execute()){
      echo "gravado com sucesso";
    }else {
      echo "deu errado";
    }
  }

  function MostrarQuestaoTopico($id, $id_lista){
    require_once "config.php";
      $stmt = $DB_con->prepare('SELECT * FROM questao_topicos WHERE id_topico = :id AND id_lista = :id_lista');
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':id_lista',$id_lista);
    if($stmt->execute()){
    $i = 1;  while($row = $stmt->fetch()) {


    echo "


                    <div class='card mb-4'>

                      <div class='card-body'>
                        <h6  class='mt-2 text-muted'>questão #".$i."</h6>
                      <button type='button' class='btn btn-outline-secondary d-block' disabled>".$row['ano']." - ".$row['banca']." - ".$row['tema']." - ".$row['assunto']."</button>

                        <p class='card-text'>

                      <br>  ".$row['enunciado']."</p>

                      <div class='form-check mt-3'>
                      <input class='form-check-input'  type='radio' name='GFG' ".$row['id_questao']."' value='A' id='defaultCheck1".$row['id_questao']."' >
                      <label id='a_".$row['id_questao']."' class='form-check-label' for='defaultCheck1".$row['id_questao']."'> A) ".$row['alt_a']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio'  name='GFG'".$row['id_questao']."' value='B' id='defaultCheck2".$row['id_questao']."' >
                      <label id='b_".$row['id_questao']."' class='form-check-label' for='defaultCheck2".$row['id_questao']."'> B) ".$row['alt_b']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio'  name='GFG'".$row['id_questao']."' value='C' id='defaultCheck3".$row['id_questao']."' >
                      <label id='c_".$row['id_questao']."' class='form-check-label' for='defaultCheck3".$row['id_questao']."'> C) ".$row['alt_c']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio' name='GFG'".$row['id_questao']."' value='D' id='defaultCheck4".$row['id_questao']."' >
                      <label id='d_".$row['id_questao']."' class='form-check-label' for='defaultCheck4".$row['id_questao']."'> D) ".$row['alt_d']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio'   name='GFG'".$row['id_questao']."' value='E' id='defaultCheck5".$row['id_questao']."' >
                      <label id='e_".$row['id_questao']."' class='form-check-label' for='defaultCheck5".$row['id_questao']."'> E) ".$row['alt_e']." </label>
                      </div>

<br>
<div id='disp".$row['id_questao']."' style=
      'color:green; font-size:18px; font-weight:bold;'>
  </div>
                        <hr>

                    <button id='btn".$row['id_questao']."'   class='btn btn-outline-success'  onclick=\"display(".$row['id_questao'].", '".$row['alt_correta']."'); \"> <i class='bx bxs-check-square' >Vizualizar resposta</i></button>
                        &nbsp |
                          <i class='bx bx-message-dots'> Comentários</i>
                          &nbsp |
                          <i class='bx bx-stats'> Estatísticas</i>



                      </div>   </div>
                  "; $i++;
      }
    }
  }
//myFunction_".$row['alt_correta']."(".$row['id_questao'].");



  function NovoResumo($resumo_completo, $id_topico, $usuario){
    require_once "config.php";
    //$stmt = $DB_con->prepare('INSERT INTO resumos(resumo_completo,id_topico,usuario) VALUES(:resumo_completo, :id_topico, :usuario)');
    $stmt = $DB_con->prepare('SELECT * FROM resumos WHERE id_topico = :id_topico AND usuario = :usuario');
    // $stmt->bindParam(':resumo_completo',$resumo_completo);
    $stmt->bindParam(':id_topico',$id_topico);
    $stmt->bindParam(':usuario',$usuario);
    if($stmt->execute()){

       if ($stmt->rowCount() == 0) {
         $stmt = $DB_con->prepare('INSERT INTO resumos(resumo_completo,id_topico,usuario) VALUES(:resumo_completo, :id_topico, :usuario)');
          $stmt->bindParam(':resumo_completo',$resumo_completo);
         $stmt->bindParam(':id_topico',$id_topico);
         $stmt->bindParam(':usuario',$usuario);
         if($stmt->execute()){}
       }else {
         $stmt = $DB_con->prepare('UPDATE resumos SET resumo_completo = :resumo_completo  WHERE resumos.id_topico = :id_topico AND resumos.usuario = :usuario ');
          $stmt->bindParam(':resumo_completo',$resumo_completo);
         $stmt->bindParam(':id_topico',$id_topico);
         $stmt->bindParam(':usuario',$usuario);
         if($stmt->execute()){}
       }
    }
  }


  function VerResumo($id_topico, $usuario ){
    require_once "config.php";
    $stmt = $DB_con->prepare('SELECT * FROM resumos WHERE id_topico = :id_topico AND usuario = :usuario');
    $stmt->bindParam(':id_topico',$id_topico);
    $stmt->bindParam(':usuario',$usuario);
    if($stmt->execute()){
        while($row = $stmt->fetch()) {
          echo $row['resumo_completo'];
        }
    }
  }
  function NovaListaExercicio($nome_lista	, $topico){
    require_once "config.php";
    $stmt = $DB_con->prepare('INSERT INTO lista_exercicios (nome_lista, topico) VALUES(:nome_lista, :topico)');
    $stmt->bindParam(':nome_lista',$nome_lista);
    $stmt->bindParam(':topico',$topico);
    if($stmt->execute()){
      // echo "gravado com sucesso";
    }
  }
  function VerLista($id_topico){
    require_once "config.php";
    $stmt = $DB_con->prepare('SELECT * FROM lista_exercicios WHERE topico = :id_topico');
    $stmt->bindParam(':id_topico',$id_topico);
    if($stmt->execute()){
        while($row = $stmt->fetch()) {
          echo "   <option value='".$row['id_lista']."'>".$row['nome_lista']."</option>";
        }
    }
  }

  function VerListaInCard($id_topico){
    require_once "config.php";
    $stmt = $DB_con->prepare('SELECT * FROM lista_exercicios WHERE topico = :id_topico');
    $stmt->bindParam(':id_topico',$id_topico);
    if($stmt->execute()){
        while($row = $stmt->fetch()) {
          // echo "   <option value='".$row['id_lista']."'>".$row['nome_lista']."</option>";

          echo "<div class='col-md-6 col-lg-4 mb-3'>
           <div class='card text-center'>
            <div class='card-header'>#".$row['id_lista']."</div>
            <div class='card-body'>
             <h5 class='card-title'>".$row['nome_lista']."</h5>
             <p class='card-text'>para esta lista</p>
             <a href='mostrar_questao.php?id_topico=".$row['topico']."&id_lista=".$row['id_lista']."' class='btn btn-primary'>Abrir</a>
            </div>
            <!-- <div class='card-footer text-muted'>2 days ago</div> -->
           </div>
          </div>";



        }
    }
  }

  function MostrarQuestaoTopicoCorreto($id, $id_lista){
    require_once "config.php";
      $stmt = $DB_con->prepare('SELECT * FROM questao_topicos WHERE id_topico = :id AND id_lista = :id_lista');
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':id_lista',$id_lista);
    if($stmt->execute()){
    $i = 1;  while($row = $stmt->fetch()) {

                  $aa = ( $row['alt_correta'] == 'A' ) ? " style='color:#a10606;'" : " " ;
                  $bb = ( $row['alt_correta'] == 'B' ) ? " style='color:#a10606;'" :  " "  ;
                  $cc = ( $row['alt_correta'] == 'C' ) ? " style='color:#a10606;'": " "  ;
                  $dd = ( $row['alt_correta'] == 'D' ) ? " style='color:#a10606;'" :  " "  ;
                  $ee = ( $row['alt_correta'] == 'E' ) ?" style='color:#a10606;'" :  " "  ;


    echo "
                    <div class='card mb-4'>

                      <div class='card-body'>
                        <h6  class='mt-2 text-muted'>questão #".$i."</h6>
                      <button type='button' class='btn btn-outline-secondary d-block' disabled>".$row['ano']." - ".$row['banca']." - ".$row['tema']." - ".$row['assunto']."</button>

                        <p class='card-text'>

                      <br>  ".$row['enunciado']."</p>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio' Disabled name='".$i."".$row['id_questao']."' value='' id='defaultCheck1' />
                      <label id='a_".$row['id_questao']."' ".$aa." class='form-check-label' for='defaultCheck1'> A) ".$row['alt_a']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio' Disabled name='".$i."".$row['id_questao']."' value='' id='defaultChec2' />
                      <label id='b_".$row['id_questao']."' ".$bb." class='form-check-label' for='defaultCheck1'> B) ".$row['alt_b']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio'Disabled  name='".$i."".$row['id_questao']."' value='' id='defaultCheck3' />
                      <label id='c_".$row['id_questao']."' ".$cc." class='form-check-label' for='defaultCheck1'>  C) ".$row['alt_c']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio' Disabled name='".$i."".$row['id_questao']."' value='' id='defaultCheck4' />
                      <label id='d_".$row['id_questao']."' ".$dd."class='form-check-label' for='defaultCheck1'> D) ".$row['alt_d']." </label>
                      </div>

                      <div class='form-check mt-3'>
                      <input class='form-check-input' type='radio' Disabled  name='".$i."".$row['id_questao']."' value='' id='defaultCheck5' />
                      <label id='e_".$row['id_questao']."' ".$ee." class='form-check-label' for='defaultCheck1'> E) ".$row['alt_e']." </label>
                      </div>


                        <hr>


                    <button id='btn'  class='btn btn-outline-success'  onclick=\"myFunction_".$row['alt_correta']."(".$row['id_questao'].")\"> <i class='bx bxs-check-square' >Vizualizar resposta</i></button>
                        &nbsp |
                          <i class='bx bx-message-dots'> Comentários</i>
                          &nbsp |
                          <i class='bx bx-stats'> Estatísticas</i>



                      </div>   </div>
                  ";  $i++;
      }
    }
  }


  function NovoErroAcerto($questao, $usuario, $status){

    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
     $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $stmt = $DB_con->prepare('SELECT * FROM atividade_erro_acerto WHERE questao = :questao AND usuario = :usuario AND status LIKE :status');
    $stmt->execute(array('questao' => $questao, 'usuario' => $usuario, 'status' => $status));
    $i = 1;
    while($row = $stmt->fetch()) {
     $i++;}
     if ($i == 1) {

       if ($status == "acertou") {
         // DELETE FROM atividade_erro_acerto WHERE atividade_erro_acerto.questao = 9 && atividade_erro_acerto.status = 'errou'
         require_once "config.php";
         $status1 = "errou";
         $stmt = $DB_con->prepare('DELETE FROM atividade_erro_acerto WHERE atividade_erro_acerto.questao = :questao && atividade_erro_acerto.status = :status && atividade_erro_acerto.usuario = :usuario');
         $stmt->bindParam(':questao',$questao);
         $stmt->bindParam(':usuario',$usuario);
         $stmt->bindParam(':status',  $status1);

         if($stmt->execute()){
           // echo "gravado com sucesso";
         }
       }else {
         require_once "config.php";
         $stmt = $DB_con->prepare('INSERT INTO atividade_erro_acerto(questao,usuario,status) VALUES(:questao, :usuario, :status)');
         $stmt->bindParam(':questao',$questao);
         $stmt->bindParam(':usuario',$usuario);
         $stmt->bindParam(':status',$status);

         if($stmt->execute()){
           // echo "gravado com sucesso";
         }}}}

         
  function ExibirQuestaoPag($id){
            $DB_HOST = 'localhost';
            $DB_USER = 'tope_bd';
            $DB_PASS = 'BMbFCeA8JYHGjSkK';
            $DB_NAME = 'tope_bd';
            require_once "config.php";
            $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);

              $stmt = $DB_con->prepare("SELECT * FROM questao WHERE id_questao = $id");
              // $stmt = $DB_con->prepare("SELECT * FROM questao WHERE assunto IN ($value) LIMIT 100 OFFSET $inicioPage");
            // $value, $inicioPage

            if($stmt->execute()){
            $i = 1;
            while($row = $stmt->fetch()) {

                                switch ($row['estrutura']) {
                                  case 1:
                                    // abcd
                                    echo "              <div class='col-lg-12 mb-12 order-0'>
                                                      <div class='card'>
                                                        <div class='card-body'>
                                                        <span class='badge bg-label-primary'>#tope: ".$row['id_questao']."</span> &#10097; <span class='badge bg-label-primary'>Caderno de ".$row['assunto']."</span><br>
                                                          <i>Função: ".$row['prova']."</i> <br>
                                                          <span class='badge bg-label-primary'>".$row['assunto']."</span> &#10097; <span class='badge bg-label-primary'>Ano: ".$row['ano']."</span>
                                                          &#10097; <span class='badge bg-label-primary'>Matéria: ".$row['tema']."</span>
                                                          &#10097; <span class='badge bg-label-primary'>Banca: ".$row['banca']."</span>
                                                          <br><hr>
                                                        <h5 class='mb-0' style='color: #000000;'>&nbsp &nbsp &nbsp ".$row['enunciado']."</h5><br>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='A' id='a_".$row['id_questao']."' >
                                                          <label style='overflow-wrap: break-all; color: #000000;' id='a_label_".$row['id_questao']."' class='form-check-label' for='a_".$row['id_questao']."'><strong> A)  ".$row['alt_a']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex;'>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='B' id='b_".$row['id_questao']."' >
                                                          <label style='color: #000000; hyphens: auto;' id='b_label_".$row['id_questao']."' class='form-check-label' for='b_".$row['id_questao']."'> <strong> B)  ".$row['alt_b']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex;'>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='C' id='c_".$row['id_questao']."' >
                                                          <label style='color: #000000; hyphens: auto;' id='c_label_".$row['id_questao']."' class='form-check-label' for='c_".$row['id_questao']."'> <strong> C)  ".$row['alt_c']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex;'>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='D' id='d_".$row['id_questao']."' >
                                                          <label style='color: #000000; hyphens: auto;' id='d_label_".$row['id_questao']."' class='form-check-label' for='d_".$row['id_questao']."'> <strong> D)  ".$row['alt_d']."</strong> </label><br>
                                                          </div>

                                                          <hr>
                                                          <h6 id='show_".$row['id_questao']."'></h6>

                                                           <button  id='btn_".$row['id_questao']."' class='btn rounded-pill btn-primary' onclick='display(".$row['id_questao']."); '>Vizualizar resposta</button>
                                                             <button  id='openModalBtn' onclick='modal(".$row['id_questao'].");' class='btn rounded-pill btn-primary'>Comentários</button>
                                                              <button  id='openModalBtn' onclick='video(\"".$row['video_url']."\");' class='btn rounded-pill btn-primary'>Resolução em video</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                      </br>




                                                    ";
                                    break;

                                    case 2:
                                      // abcde
                                      echo "              <div class='col-lg-12 mb-12 order-0'>
                                                        <div class='card'>
                                                          <div class='card-body'>
                                                          <span class='badge bg-label-primary'>#tope: ".$row['id_questao']."</span> &#10097; <span class='badge bg-label-primary'>Caderno de ".$row['assunto']."</span><br>
                                                            <i>Função: ".$row['prova']."</i> <br>
                                                            <span class='badge bg-label-primary'>".$row['assunto']."</span> &#10097; <span class='badge bg-label-primary'>Ano: ".$row['ano']."</span>
                                                            &#10097; <span class='badge bg-label-primary'>Matéria: ".$row['tema']."</span>
                                                            &#10097; <span class='badge bg-label-primary'>Banca: ".$row['banca']."</span>
                                                            <br><hr>
                                                          <h5 class='mb-0' style='color: #000000;'>&nbsp &nbsp &nbsp ".$row['enunciado']."</h5><br>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='A' id='a_".$row['id_questao']."' >
                                                          <label style='color: #000000;' id='a_label_".$row['id_questao']."' class='form-check-label' for='a_".$row['id_questao']."'><strong>A)  ".$row['alt_a']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='B' id='b_".$row['id_questao']."' >
                                                          <label style='color: #000000;' id='b_label_".$row['id_questao']."' class='form-check-label' for='b_".$row['id_questao']."'> <strong>B)  ".$row['alt_b']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='C' id='c_".$row['id_questao']."' >
                                                          <label style='color: #000000;' id='c_label_".$row['id_questao']."' class='form-check-label' for='c_".$row['id_questao']."'> <strong>C)  ".$row['alt_c']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='D' id='d_".$row['id_questao']."' >
                                                          <label style='color: #000000;' id='d_label_".$row['id_questao']."' class='form-check-label' for='d_".$row['id_questao']."'> <strong>D)  ".$row['alt_d']."</strong> </label><br>
                                                          </div>

                                                          <div style='display: flex; '>
                                                          <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='E' id='e_".$row['id_questao']."' >
                                                          <label style='color: #000000;' id='e_label_".$row['id_questao']."' class='form-check-label' for='e_".$row['id_questao']."'> <strong>E)".$row['alt_e']." </strong> </label><br>
                                                          </div>

                                                          <hr>
                                                          <h6 id='show_".$row['id_questao']."'></h6>
                                                           <button  id='btn_".$row['id_questao']."' class='btn rounded-pill btn-primary' onclick='display(".$row['id_questao']."); '>Vizualizar resposta</button>
                                                              <button  id='openModalBtn' onclick='modal(".$row['id_questao'].");' class='btn rounded-pill btn-primary'>Comentários</button>
                                                               <button  id='openModalBtn' onclick='video(\"".$row['video_url']."\");' class='btn rounded-pill btn-primary'>Resolução em video</button>
                                                            <br>

                                                          </div>
                                                        </div>
                                                      </div>
                                                        </br>
                                                      ";
                                      break;

                                      case 3:
                                        // certo e errado
                                        echo "              <div class='col-lg-12 mb-12 order-0'>
                                                          <div class='card'>
                                                            <div class='card-body'>
                                                            <span class='badge bg-label-primary'>#tope: ".$row['id_questao']."</span> &#10097; <span class='badge bg-label-primary'>Caderno de ".$row['assunto']."</span><br>
                                                              <i>Função: ".$row['prova']."</i> <br>
                                                              <span class='badge bg-label-primary'>".$row['assunto']."</span> &#10097; <span class='badge bg-label-primary'>Ano: ".$row['ano']."</span>
                                                              &#10097; <span class='badge bg-label-primary'>Matéria: ".$row['tema']."</span>
                                                              &#10097; <span class='badge bg-label-primary'>Banca: ".$row['banca']."</span>
                                                              <br><hr>
                                                            <h5 class='mb-0' style='color: #000000;'>&nbsp &nbsp &nbsp ".$row['enunciado']."</h5><br>

                                                            <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='C' id='c_".$row['id_questao']."' >
                                                            <label style='color: #000000;' id='c_label_".$row['id_questao']."' class='form-check-label' for='c_".$row['id_questao']."'> <strong>C)  ".$row['alt_a']."</strong> </label><br>

                                                            <input name='".$row['id_questao']."' class='form-check-input' type='radio' value='E' id='e_".$row['id_questao']."' >
                                                            <label style='color: #000000;' id='e_label_".$row['id_questao']."' class='form-check-label' for='e_".$row['id_questao']."'> <strong>E)".$row['alt_b']." </strong> </label><br>

                                                              <br>
                                                              <hr>
                                                              <h6 id='show_".$row['id_questao']."'></h6>
                                                               <button  id='btn_".$row['id_questao']."' class='btn rounded-pill btn-primary' onclick='display(".$row['id_questao']."); '>Vizualizar resposta</button>
                                                                 <button  id='openModalBtn' onclick='modal(".$row['id_questao'].");' class='btn rounded-pill btn-primary'>Comentários</button>
                                                                 <button  id='openModalBtn' onclick='video(\"".$row['video_url']."\");' class='btn rounded-pill btn-primary'>Resolução em video</button>

                                                                <br>
                                                            </div>
                                                          </div>
                                                        </div>
                                                          </br>
                                                        ";
                                        break;

                                  default:
                                    // code...
                                    break;
                                }

              $i++;

            }
//Contador - Paginação

  // $stmt = $DB_conect->prepare("SELECT COUNT(id_questao) AS num_result FROM questao");






          }else {
              echo "não deu certo";
            }


          }



}


?>
