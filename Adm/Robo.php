<?php
class Robo{


  function BuscaQuestao($formato,$id_questao_chave,$provas_id,$cargo_id,$carreiras_id, $texto_questao_id, $areas_id,$orgaos_id,$bancas_id, $ano, $dificuldade, $anulada, $desatualizado )
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_questao_chave FROM busca_questao WHERE id_questao_chave = :id_questao_chave');
    $stmt->bindParam(':id_questao_chave', $id_questao_chave);
    $stmt->execute();

    

    if ($stmt->rowCount() > 0) {
      echo "<p>O número da questão já existe no banco.<p>";
      // return;
    }else{

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO busca_questao (id_questao_chave,provas_id,cargo_id,carreiras_id, texto_questao_id, areas_id,orgaos_id,bancas_id, ano,dificuldade,anulada,desatualizado) VALUES (:id_questao_chave,:provas_id,:cargo_id,:carreiras_id, :texto_questao_id, :areas_id,:orgaos_id,:bancas_id, :ano,:dificuldade,:anulada,:desatualizado)');
    $stmt->bindParam(':id_questao_chave', $id_questao_chave);
    $stmt->bindParam(':provas_id', $provas_id);
    $stmt->bindParam(':cargo_id', $cargo_id);
    $stmt->bindParam(':carreiras_id', $carreiras_id);
    $stmt->bindParam(':texto_questao_id', $texto_questao_id);
    $stmt->bindParam(':areas_id', $areas_id);
    $stmt->bindParam(':orgaos_id', $orgaos_id);
    $stmt->bindParam(':bancas_id', $bancas_id);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':dificuldade', $dificuldade);
    $stmt->bindParam(':anulada', $anulada);
    $stmt->bindParam(':desatualizado', $desatualizado);

    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
    }
  }


  function
  questao_disciplina_assunto($id_questao, $id_disciplina_assunto)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_questao FROM questao_disciplina_assunto WHERE id_questao = :id_questao AND id_disciplina_assunto = :id_disciplina_assunto');
    $stmt->bindParam(':id_questao', $id_questao);
    $stmt->bindParam(':id_disciplina_assunto', $id_disciplina_assunto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      
    }else{

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO questao_disciplina_assunto (id_questao, id_disciplina_assunto) VALUES (:id_questao, :id_disciplina_assunto)');
    $stmt->bindParam(':id_questao', $id_questao);
    $stmt->bindParam(':id_disciplina_assunto', $id_disciplina_assunto);


    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }

  }

  }




  function NovaQuestao($id_chave_questao, $rotulo, $enunciado, $enunciado_cl,$texto, $texto_id, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $correta, $formato)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_questao FROM questao_banco WHERE id_chave_questao = :id_chave_questao');
    $stmt->bindParam(':id_chave_questao', $id_chave_questao);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO questao_banco (id_chave_questao, rotulo, enunciado, enunciado_cl,texto, texto_id, alt_a, alt_b, alt_c, alt_d, alt_e, correta, formato) VALUES (:id_chave_questao, :rotulo, :enunciado, :enunciado_cl, :texto, :texto_id, :alt_a, :alt_b, :alt_c, :alt_d, :alt_e, :correta, :formato)');
    $stmt->bindParam(':id_chave_questao', $id_chave_questao);
    $stmt->bindParam(':rotulo', $rotulo);
    $stmt->bindParam(':enunciado', $enunciado);
    $stmt->bindParam(':enunciado_cl', $enunciado_cl);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':texto_id', $texto_id);
    $stmt->bindParam(':alt_a', $alt_a);
    $stmt->bindParam(':alt_b', $alt_b);
    $stmt->bindParam(':alt_c', $alt_c);
    $stmt->bindParam(':alt_d', $alt_d);
    $stmt->bindParam(':alt_e', $alt_e);
    $stmt->bindParam(':correta', $correta);
    $stmt->bindParam(':formato', $formato);
   

    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }


  function NovaProva($id_chave_provas, $nome, $cargo, $orgao,$banca, $ano,$nivel, $slg)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_provas FROM provas WHERE id_chave_provas = :id_chave_provas');
    $stmt->bindParam(':id_chave_provas', $id_chave_provas);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }


    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO provas (id_chave_provas, nome, cargo, orgao,banca, ano,nivel, slg) VALUES (:id_chave_provas, :nome, :cargo, :orgao,:banca, :ano,:nivel, :slg)');
    $stmt->bindParam(':id_chave_provas', $id_chave_provas);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->bindParam(':orgao', $orgao);
    $stmt->bindParam(':banca', $banca);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':nivel', $nivel);
    $stmt->bindParam(':slg', $slg);
    

    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }



 function NovaProvaPlus($id_chave_provas, $nome, $cargo, $orgao, $banca, $ano, $nivel, $slg, $qtd_questoes, $prova, $gabarito)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_provas FROM provas WHERE id_chave_provas = :id_chave_provas');
    $stmt->bindParam(':id_chave_provas', $id_chave_provas);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO provas (id_chave_provas, nome, cargo, orgao,banca, ano,nivel, slg, qtd_questoes, prova, gabarito  ) VALUES (:id_chave_provas, :nome, :cargo, :orgao,:banca, :ano,:nivel, :slg, :qtd_questoes, :prova, :gabarito )');
    $stmt->bindParam(':id_chave_provas', $id_chave_provas);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->bindParam(':orgao', $orgao);
    $stmt->bindParam(':banca', $banca);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':nivel', $nivel);
    $stmt->bindParam(':slg', $slg);
    $stmt->bindParam(':qtd_questoes', $qtd_questoes);
    $stmt->bindParam(':prova', $prova);
    $stmt->bindParam(':gabarito', $gabarito);


    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }
  function NovoCargo($id_chave_cargos, $nome, $slg)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_cargos FROM cargo WHERE id_chave_cargos = :id_chave_cargos');
    $stmt->bindParam(':id_chave_cargos', $id_chave_cargos);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO cargo (id_chave_cargos, nome, slg) VALUES (:id_chave_cargos, :nome, :slg)');
    $stmt->bindParam(':id_chave_cargos', $id_chave_cargos);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':slg', $slg);
  


    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function Novacarreira($id_chave_carreiras, $nome, $descricao)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_carreiras FROM carreiras WHERE id_chave_carreiras = :id_chave_carreiras');
    $stmt->bindParam(':id_chave_carreiras', $id_chave_carreiras);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO carreiras (id_chave_carreiras, nome, descricao) VALUES (:id_chave_carreiras, :nome, :descricao)');
    $stmt->bindParam(':id_chave_carreiras', $id_chave_carreiras);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);



    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }


  function NovoTexto($id_chave_texto, $texto, $enunciado, $text_true_false, $enunciado_true_false, $dsc)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_texto FROM texto WHERE id_chave_texto = :id_chave_texto');
    $stmt->bindParam(':id_chave_texto', $id_chave_texto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO texto (id_chave_texto, texto, enunciado,text_true_false,enunciado_true_false, dsc) VALUES (:id_chave_texto, :texto, :enunciado,:text_true_false,:enunciado_true_false, :dsc)');
    $stmt->bindParam(':id_chave_texto', $id_chave_texto);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':enunciado', $enunciado);
    $stmt->bindParam(':text_true_false', $text_true_false);
    $stmt->bindParam(':enunciado_true_false', $enunciado_true_false);
    $stmt->bindParam(':dsc', $dsc);



    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }


  function NovoAssunto($id_chave_disciplina, $nome, $nome_, $materia_id,$materia,$topico_acima	,$oab	,$assunto_raiz	,$palavras_chave	,$slg)	

  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_disciplina FROM disciplina_assunto WHERE id_chave_disciplina = :id_chave_disciplina');
    $stmt->bindParam(':id_chave_disciplina', $id_chave_disciplina);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO disciplina_assunto (id_chave_disciplina,nome	,nome_	,materia_id	,materia	,topico_acima	,oab	,assunto_raiz	,palavras_chave	,slg) VALUES (:id_chave_disciplina	,:nome	,:nome_	,:materia_id	,:materia	,:topico_acima	,:oab	,:assunto_raiz	,:palavras_chave	,:slg	)');
    $stmt->bindParam(':id_chave_disciplina', $id_chave_disciplina);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':nome_', $nome_);
    $stmt->bindParam(':materia_id', $materia_id);
    $stmt->bindParam(':materia', $materia);
    $stmt->bindParam(':topico_acima', $topico_acima);
    $stmt->bindParam(':oab', $oab);
    $stmt->bindParam(':assunto_raiz', $assunto_raiz);
    $stmt->bindParam(':palavras_chave', $palavras_chave);
    $stmt->bindParam(':slg', $slg);



    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function NovoAssuntoPlus($id_chave_disciplina, $nome, $nome_, $materia_id, $materia, $topico_acima, $oab, $assunto_raiz, $palavras_chave, $slg, $indice, $nivel)

  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_disciplina FROM disciplina_assunto WHERE id_chave_disciplina = :id_chave_disciplina');
    $stmt->bindParam(':id_chave_disciplina', $id_chave_disciplina);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO disciplina_assunto (id_chave_disciplina,nome	,nome_	,materia_id	,materia	,topico_acima	,oab	,assunto_raiz	,palavras_chave	,slg, indice, nivel) VALUES (:id_chave_disciplina	,:nome	,:nome_	,:materia_id	,:materia	,:topico_acima	,:oab	,:assunto_raiz	,:palavras_chave	,:slg, :indice, :nivel	)');
    $stmt->bindParam(':id_chave_disciplina', $id_chave_disciplina);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':nome_', $nome_);
    $stmt->bindParam(':materia_id', $materia_id);
    $stmt->bindParam(':materia', $materia);
    $stmt->bindParam(':topico_acima', $topico_acima);
    $stmt->bindParam(':oab', $oab);
    $stmt->bindParam(':assunto_raiz', $assunto_raiz);
    $stmt->bindParam(':palavras_chave', $palavras_chave);
    $stmt->bindParam(':slg', $slg);
    $stmt->bindParam(':indice', $indice);
    $stmt->bindParam(':nivel', $nivel);



    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function NovaQuestaoDisciplinaAssunto($id_questao, $id_disciplina_assunto)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_questao FROM questao_disciplina_assunto WHERE id_questao = :id_questao AND id_disciplina_assunto = :id_disciplina_assunto');
    $stmt->bindParam(':id_questao', $id_questao);
    $stmt->bindParam(':id_disciplina_assunto', $id_disciplina_assunto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO questao_disciplina_assunto (id_questao, id_disciplina_assunto) VALUES (:id_questao, :id_disciplina_assunto)');
    $stmt->bindParam(':id_questao', $id_questao);
    $stmt->bindParam(':id_disciplina_assunto', $id_disciplina_assunto);
    

    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function NovaBanca($id_chave_banca,	$nome,	$descricao,	$sigla,	$oab,	$slg)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_banca FROM banca WHERE id_chave_banca = :id_chave_banca');
    $stmt->bindParam(':id_chave_banca', $id_chave_banca);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO banca (id_chave_banca,	nome,	descricao,	sigla,	oab,	slg) VALUES (:id_chave_banca,	:nome,	:descricao,	:sigla,	:oab,	:slg)');
    $stmt->bindParam(':id_chave_banca', $id_chave_banca);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':sigla', $sigla);
    $stmt->bindParam(':oab', $oab);
    $stmt->bindParam(':slg', $slg);


    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function NovaArea($id_chave_areas,  $nome)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_areas FROM areas WHERE id_chave_areas = :id_chave_areas');
    $stmt->bindParam(':id_chave_areas', $id_chave_areas);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO areas (id_chave_areas,	nome) VALUES (:id_chave_areas,	:nome)');
    $stmt->bindParam(':id_chave_areas', $id_chave_areas);
    $stmt->bindParam(':nome', $nome);
   


    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }

  function NovaOrgao($id_chave_orgaos	,$nome	,$sigla	,$esfera	,$estado	,$slg	)
  {
    $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);

    // Verificar se o número da questão já existe
    $stmt = $DB_con->prepare('SELECT id_chave_orgaos FROM orgaos WHERE id_chave_orgaos = :id_chave_orgaos');
    $stmt->bindParam(':id_chave_orgaos', $id_chave_orgaos);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      //echo "<h1>O número da questão já existe no banco.<h1>";
      return;
    }

    // Inserir a nova questão no banco
    $stmt = $DB_con->prepare('INSERT INTO orgaos (id_chave_orgaos,	nome,	sigla,	esfera,	estado,	slg	) VALUES (:id_chave_orgaos,	:nome,	:sigla,	:esfera,	:estado,	:slg)');
    $stmt->bindParam(':id_chave_orgaos', $id_chave_orgaos);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sigla', $sigla);
    $stmt->bindParam(':esfera', $esfera);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':slg', $slg);



    if ($stmt->execute()) {
      //echo "Questão gravada com sucesso.";
    }
  }




}




 ?>
