<?php
require_once "Auth.php";
$c2 = new Auth;
$c2->Conectado();
$user_tp = $_SESSION['sobrenome'] . "." . $_SESSION['nome'];
$id_user = $_SESSION['id'];



$query_completa = "SELECT qda.id_disciplina_assunto,
 bq.id_questao_chave ,
   bq.bancas_id,bq.orgaos_id,
   bq.cargo_id,
   bq.ano,
   bq.carreiras_id,
   bq.areas_id,
   bq.dificuldade,
   p.nivel,
   p.nome AS nome_provas,
   questbanco.enunciado,
   questbanco.alt_a,
   questbanco.alt_b,
   questbanco.alt_c,
   questbanco.alt_d,
   questbanco.alt_e,
   questbanco.correta,
   questbanco.formato, 
   bc.nome AS nome_banca, 
   cr.nome AS nome_carreira
FROM questao_disciplina_assunto qda
JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
LEFT JOIN questao_banco questbanco ON bq.id_questao_chave = questbanco.id_chave_questao
LEFT JOIN banca bc ON bq.bancas_id = bc.id_chave_banca
LEFT JOIN carreiras cr ON bq.carreiras_id = cr.id_chave_carreiras
WHERE 
";

$query_consulta = "SELECT COUNT(*) AS total
FROM questao_disciplina_assunto qda
JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
WHERE";


if(isset($_POST['minhas_questoes'])){
     if($_POST['minhas_questoes'] == 2){
    $query_completa = "SELECT qda.id_disciplina_assunto,
 bq.id_questao_chave ,
 err.acerto_erro,
   bq.bancas_id,bq.orgaos_id,
   bq.cargo_id,
   bq.ano,
   bq.carreiras_id,
   bq.areas_id,
   bq.dificuldade,
   p.nivel,
   p.nome AS nome_provas,
   questbanco.enunciado,
   questbanco.alt_a,
   questbanco.alt_b,
   questbanco.alt_c,
   questbanco.alt_d,
   questbanco.alt_e,
   questbanco.correta,
   questbanco.formato, 
   bc.nome AS nome_banca, 
   cr.nome AS nome_carreira
FROM questao_disciplina_assunto qda
JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
LEFT JOIN questao_erro_acerto err ON qda.id_questao = err.id_questao_chave
LEFT JOIN questao_banco questbanco ON bq.id_questao_chave = questbanco.id_chave_questao
LEFT JOIN banca bc ON bq.bancas_id = bc.id_chave_banca
LEFT JOIN carreiras cr ON bq.carreiras_id = cr.id_chave_carreiras
WHERE 
";

        $query_consulta = "SELECT COUNT(*) AS total
FROM questao_disciplina_assunto qda
JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
LEFT JOIN questao_erro_acerto err ON qda.id_questao = err.id_questao_chave
WHERE";
} else if ($_POST['minhas_questoes'] == 3) {
        $query_completa = "SELECT
    qda.id_disciplina_assunto,
    bq.id_questao_chave,
    err.acerto_erro,
    bq.bancas_id,
    bq.orgaos_id,
    bq.cargo_id,
    bq.ano,
    bq.carreiras_id,
    bq.areas_id,
    bq.dificuldade,
    p.nivel,
    p.nome AS nome_provas,
    questbanco.enunciado,
    questbanco.alt_a,
    questbanco.alt_b,
    questbanco.alt_c,
    questbanco.alt_d,
    questbanco.alt_e,
    questbanco.correta,
    questbanco.formato,
    bc.nome AS nome_banca,
    cr.nome AS nome_carreira
FROM
    questao_disciplina_assunto qda
    JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
    LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
    LEFT JOIN questao_banco questbanco ON bq.id_questao_chave = questbanco.id_chave_questao
    LEFT JOIN banca bc ON bq.bancas_id = bc.id_chave_banca
    LEFT JOIN carreiras cr ON bq.carreiras_id = cr.id_chave_carreiras
    LEFT JOIN questao_erro_acerto err ON bq.id_questao_chave = err.id_questao_chave
WHERE
";

        $query_consulta = "SELECT COUNT(*) AS total
FROM questao_disciplina_assunto qda
JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
 LEFT JOIN questao_erro_acerto err ON bq.id_questao_chave = err.id_questao_chave
WHERE";
}

}


// $query_consulta = "SELECT COUNT(*) AS total
// FROM questao_disciplina_assunto qda
// JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave
// LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas
// LEFT JOIN questao_banco questbanco ON bq.id_questao_chave = questbanco.id_chave_questao
// LEFT JOIN banca bc ON bq.bancas_id = bc.id_chave_banca
// LEFT JOIN carreiras cr ON bq.carreiras_id = cr.id_chave_carreiras
// WHERE";

// SELECT qda.id_disciplina_assunto,
//  bq.id_questao_chave ,
//   bq.bancas_id,
//   bq.orgaos_id, 
//   bq.cargo_id, 
//   bq.ano, 
//   bq.carreiras_id, 
//   bq.areas_id,
//   bq.dificuldade, 
//   p.nivel, 
//   p.nome AS nome_provas, 
//   questbanco.enunciado, 
//   questbanco.alt_a, 
//   questbanco.alt_b, 
//   questbanco.alt_c, 
//   questbanco.alt_d, 
//   questbanco.alt_e, 
//   questbanco.correta, 
//   questbanco.formato, 
//   bc.nome AS nome_banca, 
//   cr.nome AS nome_carreira 
//   FROM questao_disciplina_assunto qda 
//   JOIN busca_questao bq ON qda.id_questao = bq.id_questao_chave 
//   LEFT JOIN provas p ON bq.provas_id = p.id_chave_provas 
//   LEFT JOIN questao_banco questbanco ON bq.id_questao_chave = questbanco.id_chave_questao 
//   LEFT JOIN banca bc ON bq.bancas_id = bc.id_chave_banca 
//   LEFT JOIN carreiras cr ON bq.carreiras_id = cr.id_chave_carreiras 
//   WHERE (qda.id_disciplina_assunto IN (403985) OR qda.id_disciplina_assunto IS NULL);




$primeiro = 1;






if (isset($_POST['disciplinas']) && !empty($_POST['disciplinas'])) {

    $disciplina = $_POST['disciplinas'];
    if (isset($_POST['assuntos']) && !empty($_POST['assuntos'])) {
        $disciplina = $_POST['assuntos'];
        // $disciplina .= ",".$_POST['assuntos']; //se um dia eu quiser pesquisar os dois
    }


    if ($primeiro == 1) {
        $query_completa .= "(qda.id_disciplina_assunto IN ($disciplina) OR qda.id_disciplina_assunto IS NULL)";
        $query_consulta .= "(qda.id_disciplina_assunto IN ($disciplina) OR qda.id_disciplina_assunto IS NULL)";
    } else {
        $query_completa .= "AND (qda.id_disciplina_assunto IN ($disciplina) OR qda.id_disciplina_assunto IS NULL)";
        $query_consulta .= "AND (qda.id_disciplina_assunto IN ($disciplina) OR qda.id_disciplina_assunto IS NULL)";
    } 
   
    $primeiro++;
}else{
    $query_completa .= " qda.id_disciplina_assunto IS NOT NULL";
    $query_consulta .= " qda.id_disciplina_assunto IS NOT NULL";
    $primeiro++;

}

if (isset($_POST['banca']) && !empty($_POST['banca'])) {
    $banca = $_POST['banca'];
    if ($primeiro == 1) {
        $query_completa .= "((bq.bancas_id IN ($banca) OR bq.bancas_id IS NULL) OR bq.bancas_id IS NULL)";
        $query_consulta .= "((bq.bancas_id IN ($banca) OR bq.bancas_id IS NULL) OR bq.bancas_id IS NULL)";
    } else {
        $query_completa .= " AND ((bq.bancas_id IN ($banca) OR bq.bancas_id IS NULL) OR bq.bancas_id IS NULL)";
        $query_consulta .= " AND ((bq.bancas_id IN ($banca) OR bq.bancas_id IS NULL) OR bq.bancas_id IS NULL)";
    } 
   
    $primeiro++;
}
if (isset($_POST['orgao']) && !empty($_POST['orgao'])) {
    $orgao = $_POST['orgao'];
     if ($primeiro == 1) {
        $query_completa .= "((bq.orgaos_id IN ($orgao) OR bq.orgaos_id IS NULL) OR bq.orgaos_id IS NULL)";
        $query_consulta .= "((bq.orgaos_id IN ($orgao) OR bq.orgaos_id IS NULL) OR bq.orgaos_id IS NULL)";}else{
           $query_completa .= " AND ((bq.orgaos_id IN ($orgao) OR bq.orgaos_id IS NULL) OR bq.orgaos_id IS NULL)";
        $query_consulta .= " AND ((bq.orgaos_id IN ($orgao) OR bq.orgaos_id IS NULL) OR bq.orgaos_id IS NULL)"; }
    $primeiro++;
        }

if (isset($_POST['cargo']) && !empty($_POST['cargo'])) {
    $cargo = $_POST['cargo'];
    if ($primeiro == 1) {
        $query_completa .= "(((bq.cargo_id IS NULL OR bq.cargo_id IN ($cargo)) OR bq.cargo_id IS NULL) OR bq.cargo_id IS NULL)";
        $query_consulta .= "(((bq.cargo_id IS NULL OR bq.cargo_id IN ($cargo)) OR bq.cargo_id IS NULL) OR bq.cargo_id IS NULL)";
    } else {
        $query_completa .= " AND (((bq.cargo_id IS NULL OR bq.cargo_id IN ($cargo)) OR bq.cargo_id IS NULL) OR bq.cargo_id IS NULL)";
        $query_consulta .= " AND (((bq.cargo_id IS NULL OR bq.cargo_id IN ($cargo)) OR bq.cargo_id IS NULL) OR bq.cargo_id IS NULL)";
    }
    
    $primeiro++;
}
if (isset($_POST['ano']) && !empty($_POST['ano'])) {
    $ano = $_POST['ano'];
    if ($primeiro == 1) {
        $query_completa .= "((bq.ano IN ($ano) OR bq.ano IS NULL) OR bq.ano IS NULL)";
        $query_consulta .= "((bq.ano IN ($ano) OR bq.ano IS NULL) OR bq.ano IS NULL)";
    } else {
        $query_completa .= "AND ((bq.ano IN ($ano) OR bq.ano IS NULL) OR bq.ano IS NULL)";
        $query_consulta .= "AND ((bq.ano IN ($ano) OR bq.ano IS NULL) OR bq.ano IS NULL)";
    }
    
    $primeiro++;
}
if (isset($_POST['carreira']) && !empty($_POST['carreira'])) {
    $carreira = $_POST['carreira'];
    if ($primeiro == 1) {
        $query_completa .= "(((bq.carreiras_id IS NULL OR bq.carreiras_id IN ($carreira)) OR bq.carreiras_id IS NULL) OR bq.carreiras_id IS NULL)";
        $query_consulta .= "(((bq.carreiras_id IS NULL OR bq.carreiras_id IN ($carreira)) OR bq.carreiras_id IS NULL) OR bq.carreiras_id IS NULL)";
    } else {
        $query_completa .= "AND (((bq.carreiras_id IS NULL OR bq.carreiras_id IN ($carreira)) OR bq.carreiras_id IS NULL) OR bq.carreiras_id IS NULL)";
        $query_consulta .= "AND (((bq.carreiras_id IS NULL OR bq.carreiras_id IN ($carreira)) OR bq.carreiras_id IS NULL) OR bq.carreiras_id IS NULL)";
    }
    $primeiro++;
}
if (isset($_POST['area']) && !empty($_POST['area'])) {
    $area = $_POST['area'];
    if ($primeiro == 1) {
        $query_completa .= "((bq.areas_id IN ($area) OR bq.areas_id IS NULL) OR bq.areas_id IS NULL)";
        $query_consulta .= "((bq.areas_id IN ($area) OR bq.areas_id IS NULL) OR bq.areas_id IS NULL)";
    } else {
        $query_completa .= " AND ((bq.areas_id IN ($area) OR bq.areas_id IS NULL) OR bq.areas_id IS NULL)";
        $query_consulta .= " AND ((bq.areas_id IN ($area) OR bq.areas_id IS NULL) OR bq.areas_id IS NULL)";
    }
    }
    
    $primeiro++;

if (isset($_POST['dificuldade']) && !empty($_POST['dificuldade'])) {
    $dificuldade = $_POST['dificuldade'];
    if ($primeiro == 1) {
        $query_completa .= "((bq.dificuldade IN ($dificuldade) OR bq.dificuldade IS NULL) OR bq.dificuldade IS NULL)";
        $query_consulta .= "((bq.dificuldade IN ($dificuldade) OR bq.dificuldade IS NULL) OR bq.dificuldade IS NULL)";
    } else {
        $query_completa .= " AND ((bq.dificuldade IN ($dificuldade) OR bq.dificuldade IS NULL) OR bq.dificuldade IS NULL)";
        $query_consulta .= " AND ((bq.dificuldade IN ($dificuldade) OR bq.dificuldade IS NULL) OR bq.dificuldade IS NULL)";
    }
    
    $primeiro++;
}


if (isset($_POST['minhas_questoes']) && !empty($_POST['minhas_questoes'])) {


    if ($_POST['minhas_questoes'] == 2) {
    $minhas_questoes = $_POST['minhas_questoes'];
    if ($primeiro == 1) {
        $query_completa .= " acerto_erro LIKE 'Errou' AND id_user = $id_user";
        $query_consulta .= " acerto_erro LIKE 'Errou' AND id_user = $id_user";
    } else {
        $query_completa .= " AND acerto_erro LIKE 'Errou' AND id_user = $id_user";
        $query_consulta .= " AND acerto_erro LIKE 'Errou' AND id_user = $id_user";
    }

    $primeiro++;
}
else if ($_POST['minhas_questoes'] == 3){
        if ($primeiro == 1) {
            $query_completa .= " bq.id_questao_chave NOT IN ( SELECT id_questao_chave FROM questao_erro_acerto)";
            $query_consulta .= " bq.id_questao_chave NOT IN ( SELECT id_questao_chave FROM questao_erro_acerto)";
        } else {
            $query_completa .= " AND bq.id_questao_chave NOT IN ( SELECT id_questao_chave FROM questao_erro_acerto)";
            $query_consulta .= " AND bq.id_questao_chave NOT IN ( SELECT id_questao_chave FROM questao_erro_acerto)";
        }

        $primeiro++;
    }

}

// echo $query_consulta;
// echo "<br><br><br><br><br>";
// echo $query_completa;

if (isset($_POST['paginaContagem'])) {
    $contagem = $_POST['paginaContagem'];

}else{
     $contagem = 1;
}





if (isset($_POST['navigation']) && $_POST['navigation'] == 1 ) {
  //   echo "<br>". $query_completa;
    require_once "navegar_questoes.php";
    $c2 = new Questoes;
    $c2->NavegarQuestoes($query_completa, $query_consulta, $contagem, 20);
  

}else{
  //  echo "<br>" . $query_completa;
    require_once "navegar_questoes.php";
    $c2 = new Questoes;
    $c2->filtrarQuestoes($query_completa, $query_consulta, $contagem, 20);
  
}








    ?>