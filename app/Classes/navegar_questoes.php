<?php

/**
 *
 */
class Questoes
{
    function NavegarQuestoes($query_completa, $query_consulta, $pagina, $quantidade)
    {
        $servername = "localhost";
        $username = "tope_bd";
        $password = "BMbFCeA8JYHGjSkK";
        $dbname = "tope_bd";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
        $questoesPorPagina = $quantidade;
        $sql = $query_consulta;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalQuestoes = $result['total']; //total de questões
        $totalPaginas = ceil($totalQuestoes / $questoesPorPagina); //total de páginas
        $paginaAtual = isset($pagina) ? $pagina : 1; //página atual
        // Calcular o deslocamento para a consulta SQL
        $offset = ($paginaAtual - 1) * $questoesPorPagina;



        // Consultar as questões da página atual
        $sql = $query_completa . " LIMIT $offset, $questoesPorPagina";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $questoes = $stmt->fetchAll(PDO::FETCH_ASSOC);



        //mostra as questões
        echo "<div id='questoes'>";
        echo "foram encontradas " . $totalQuestoes . " Questões";
        foreach ($questoes as $questao) :

            $IdQuestao = $questao['id_questao_chave'];
            $sql = "SELECT *
                    FROM questao_disciplina_assunto
                    INNER JOIN disciplina_assunto ON questao_disciplina_assunto.id_disciplina_assunto = disciplina_assunto.id_chave_disciplina
                    WHERE questao_disciplina_assunto.id_questao = :idQuestao";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idQuestao', $IdQuestao, PDO::PARAM_INT);
            $stmt->execute();
            $assuntos_disciplina = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $badgeAssunto = "";
            foreach ($assuntos_disciplina as $rowAssuntosDisc) :

                $badgeAssunto .= "<span class='badge mx-2 bg-label-danger mb-2'>" . $rowAssuntosDisc['nome'] . "</span>";

            endforeach;
            // echo "<li>" . $questao['id_questao_chave'] . "</li>";

            $Enunciado = $questao['enunciado'];


            $carreira = $questao['nome_carreira'];
            $banca = $questao['nome_banca'];
            $prova = $questao['nome_provas'];
            $nivel = $questao['nivel'];

            $alt_a =  strip_tags($questao['alt_a']);
            $alt_b = strip_tags($questao['alt_b']);
            $alt_c = strip_tags($questao['alt_c']);
            $alt_d = strip_tags($questao['alt_d']);
            $alt_e = strip_tags($questao['alt_e']);
            $alcorreta = $questao['correta'];
            switch ($questao['formato']) {
                case 'ABCDE':
                    echo "
<div class='m-12'>
    <div class='card'>
        <div class='d-flex align-items-end row'>
            <div class='card-body col'>
                <!-- horizontal -->
                <div class='d-flex flex-wrap col-4'>
                    $badgeAssunto <br>
                    <span class='badge bg-label-primary mb-2 mr-2'>Questão: $IdQuestao</span>
                    <span class='badge bg-label-primary mb-2 mr-2'>Carreira: $carreira Cargo/Área</span>
                    <span class='badge bg-label-primary mb-2'>></span>
                    <span class='badge bg-label-primary mb-2 mr-2'>Nível: $nivel</span>
                </div>
                <!-- vertical -->
                <div class='d-flex mx-2 flex-column'>
                    <div class='d-flex flex-wrap'>
                        <span class='badge bg-label-secondary mx-2'>Ano: 2023</span>
                        <span class='badge bg-label-secondary mx-2'>Banca: $banca </span>
                        <span class='badge bg-label-secondary mx-2'>Prova: $prova</span>
                    </div>

                    <br>
                    <text style='color:black;' class='mb-0'>$Enunciado</text>
                    
                    <br>
                    <div class='form-check'>
                        <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                        <label class='form-check-label' for='A$IdQuestao'>
                           <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                        </label>
                    </div>

                    <div class='form-check'>
                        <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                        <label class='form-check-label' for='B$IdQuestao'>
                          <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                        </label>
                    </div>

                    <div class='form-check'>
                        <input class='form-check-input' name='$IdQuestao' type='radio' id='C$IdQuestao'>
                        <label class='form-check-label' for='C$IdQuestao'>
                         <text id='" . $IdQuestao . "C'  style='color:black;'>   C) $alt_c </text>
                        </label>
                    </div>

                    <div class='form-check'>
                        <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                        <label class='form-check-label' for='D$IdQuestao'>
                         <text  id='" . $IdQuestao . "D' style='color:black;'>   D) $alt_d </text>
                        </label>
                    </div>

                    <div class='form-check'>
                        <input class='form-check-input' name='$IdQuestao' type='radio' id='E$IdQuestao'>
                        <label class='form-check-label' for='E$IdQuestao'>
                         <text  id='" . $IdQuestao . "E' style='color:black;'>   E) $alt_e </text>
                        </label>
                    </div>
                </div>

                <br>
                
                <div id='status_question_$IdQuestao'></div>
                <br>
                <div class='d-flex flex-wrap'>
                    <button type='button' onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
";


                    break;

                case 'ABCD':
                    echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                       $badgeAssunto <br>

                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label' for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='C$IdQuestao'>
                    <label class='form-check-label' for='C$IdQuestao'>
                     <text id='" . $IdQuestao . "C' style='color:black;'>   C) $alt_c </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                    <label class='form-check-label' for='D$IdQuestao'>
                     <text id='" . $IdQuestao . "D' style='color:black;'>   D)$alt_d </text>
                    </label>
                </div>

            </div>

              <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button'onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                    break;

                case 'CE':
                    echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                       $badgeAssunto <br>

                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label'  for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> C) CERTO </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  E) ERRADO </text>
                    </label>
                </div>


            </div>
            <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button' onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                    break;

                default:
                    # code...
                    break;
            }





        endforeach;
        echo "</div>";

        $primeiro_active = "";
        $segundo_active = "";
        $quarto_active = " ";
        $terceiro_active =  "";

        if ($pagina <= 2) {
            $primeiro_item = 1;
            $segundo_item = 2;
            $terceiro_item = 3;
            $quarto_item = 4;


            if ($pagina == 1) {
                $primeiro_active = "active";
            }

            if ($pagina == 2) {
                $segundo_active = "active";
            }
        } elseif ($pagina == $totalPaginas) {
            $primeiro_item = $totalPaginas - 3;
            $segundo_item = $totalPaginas - 2;
            $terceiro_item = $totalPaginas - 1;
            $quarto_item = $totalPaginas;
            $quarto_active = "active";
        } else {
            $primeiro_item = $pagina - 2;
            $segundo_item = $pagina - 1;
            $terceiro_item = $pagina;
            $quarto_item = $pagina + 1;
            $terceiro_active =  "active";
            $segundo_active = "";
            $primeiro_active = "";
        }
        echo "
		pagina atual: $pagina
				<br>
<nav aria-label='Page navigation'>
  <ul class='pagination'>
    <li class='page-item prev'>
      <a class='page-link' onclick='retrocederPagina($totalPaginas)'><i class='tf-icon bx bx-chevrons-left'></i></a>
    </li>
    <li class='page-item $primeiro_active' id='item_1' value=''>
      <a class='page-link' onClick='primeiroItem()'>$primeiro_item</a>
    </li>
    <li class='page-item $segundo_active' id='item_2' value=''>
      <a class='page-link' onClick='segundoItem()'>$segundo_item</a>
    </li>
    <li class='page-item $terceiro_active' id='item_3' value=''>
      <a class='page-link' onClick='terceiroItem()'>$terceiro_item</a>
    </li>
    <li class='page-item $quarto_active' id='item_4'  value=''>
      <a class='page-link' onClick='quartoItem()' >$quarto_item</a>
    </li>
    <li class='page-item'>
      <a class='page-link'>...</a>
    </li>
    <li class='page-item' id='last' value='$totalPaginas'>
      <a class='page-link' onClick='lastItem($totalPaginas)' >$totalPaginas</a>
    </li>
    <li class='page-item next' id='next'>
      <a class='page-link' onclick='avancarPagina($totalPaginas)'><i class='tf-icon bx bx-chevrons-right'></i></a>
    </li>
  </ul>
</nav>";
    }




    function filtrarQuestoes($query_completa, $query_consulta, $pagina, $quantidade)
    {
        $servername = "localhost";
        $username = "tope_bd";
        $password = "BMbFCeA8JYHGjSkK";
        $dbname = "tope_bd";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
        $questoesPorPagina = $quantidade;
        $sql = $query_consulta;
        $stmt = $conn->prepare($sql);



        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalQuestoes = $result['total']; //total de questões
        $totalPaginas = ceil($totalQuestoes / $questoesPorPagina); //total de páginas
        $paginaAtual = isset($pagina) ? $pagina : 1; //página atual
        // Calcular o deslocamento para a consulta SQL
        $offset = ($paginaAtual - 1) * $questoesPorPagina;



        // Consultar as questões da página atual
        $sql = $query_completa . " LIMIT $offset, $questoesPorPagina";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $questoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //mostra as questões
        echo "<div id='questoes'>";
        echo "<span class='fw-bold'>Foram encontradas  " . $totalQuestoes . " Questões.</span>";


        foreach ($questoes as $questao) :
            // echo "<li>" . $questao['id_questao_chave'] . "</li>";
            $id_chave_questao = $questao['id_questao_chave'];
            // Consultar as questões da página atual, se a consulta ficar lenta, substituir novamente
            // $sql = "SELECT * FROM questao_banco WHERE id_chave_questao = $id_chave_questao" ;
            // 			 $sql = "SELECT questao_banco.*, 
            // carreiras.nome AS nome_carreira, 
            // banca.nome AS nome_banca,
            // provas.nome AS nome_provas, provas.nivel
            // FROM busca_questao
            // INNER JOIN questao_banco ON busca_questao.id_questao_chave = questao_banco.id_chave_questao
            // INNER JOIN carreiras ON busca_questao.carreiras_id = carreiras.id_chave_carreiras
            // INNER JOIN banca ON busca_questao.bancas_id = banca.id_chave_banca
            // INNER JOIN provas ON busca_questao.provas_id = provas.id_chave_provas
            // WHERE questao_banco.id_chave_questao = $id_chave_questao" ;


            // 			$stmt = $conn->prepare($sql);
            // 			$stmt->execute();
            // 			$questoesResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // 			foreach ($questoesResult as $Rowquestao) :
            // echo "<li>" . $Rowquestao['formato'] . "</li>";

            // se for o caso -> renomear as variáveis para $Rowquestao

            $IdQuestao = $questao['id_questao_chave'];
            $sql = "SELECT *
                    FROM questao_disciplina_assunto
                    INNER JOIN disciplina_assunto ON questao_disciplina_assunto.id_disciplina_assunto = disciplina_assunto.id_chave_disciplina
                    WHERE questao_disciplina_assunto.id_questao = :idQuestao";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idQuestao', $IdQuestao, PDO::PARAM_INT);
            $stmt->execute();
            $assuntos_disciplina = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $badgeAssunto = "";
            foreach ($assuntos_disciplina as $rowAssuntosDisc) :

                $badgeAssunto .= "<span class='badge mx-2 bg-label-danger mb-2'>" . $rowAssuntosDisc['nome'] . "</span>";

            endforeach;
            $Enunciado = $questao['enunciado'];


            $carreira = $questao['nome_carreira'];
            $banca = $questao['nome_banca'];
            $prova = $questao['nome_provas'];
            $nivel = $questao['nivel'];

            $alt_a =  strip_tags($questao['alt_a']);
            $alt_b = strip_tags($questao['alt_b']);
            $alt_c = strip_tags($questao['alt_c']);
            $alt_d = strip_tags($questao['alt_d']);
            $alt_e = strip_tags($questao['alt_e']);
            $alcorreta = $questao['correta'];
            switch ($questao['formato']) {
                case 'ABCDE':
                    echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>
 
        <div class='card-body'>


                  

            <!-- horizontal -->
            <div class='d-flex flex-wrap'>
                          
             
                   
                         $badgeAssunto <br>
                    
                     
                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>

            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>
 
                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>
				

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label' for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input'name='$IdQuestao' type='radio' id=B'$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input'name='$IdQuestao' type='radio' id='C$IdQuestao'>
                    <label class='form-check-label' for='C$IdQuestao'>
                     <text id='" . $IdQuestao . "C'  style='color:black;'>   C) $alt_c </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                    <label class='form-check-label' for='D$IdQuestao'>
                     <text  id='" . $IdQuestao . "D' style='color:black;'>   D)$alt_d </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='E$IdQuestao'>
                    <label class='form-check-label' for='E$IdQuestao'>
                     <text  id='" . $IdQuestao . "E'style='color:black;'>   E) $alt_e </text>
                    </label>
                </div>

            </div>
  <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button' onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                    break;

                case 'ABCD':
                    echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                 $badgeAssunto <br>

                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label' for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='C$IdQuestao'>
                    <label class='form-check-label' for='C$IdQuestao'>
                     <text id='" . $IdQuestao . "C' style='color:black;'>   C) $alt_c </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                    <label class='form-check-label' for='D$IdQuestao'>
                     <text id='" . $IdQuestao . "D' style='color:black;'>   D)$alt_d </text>
                    </label>
                </div>

            </div>
  <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button'onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                    break;

                case 'CE':
                    echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                       $badgeAssunto <br>
                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label'  for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> C) CERTO </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  E) ERRADO </text>
                    </label>
                </div>


            </div>

              <br>
            
            <div id='status_question_$IdQuestao'>
            </div>

            <br>
            <div class='d-flex flex-wrap'>
                <button type='button' onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                    break;

                default:
                    # code...
                    break;
            }







        endforeach;


        // endforeach;






        echo "
				<br>
<nav aria-label='Page navigation'>
  <ul class='pagination'>
    <li class='page-item prev'>
      <a class='page-link' onclick='retrocederPagina($totalPaginas)'><i class='tf-icon bx bx-chevrons-left'></i></a>
    </li>
    <li class='page-item active' id='item_1' value=''>
      <a class='page-link' onClick='primeiroItem()'>1</a>
    </li>
    <li class='page-item' id='item_2' value=''>
      <a class='page-link' onClick='segundoItem()'>2</a>
    </li>
    <li class='page-item' id='item_3' value=''>
      <a class='page-link' onClick='terceiroItem()'>3</a>
    </li>
    <li class='page-item' id='item_4'  value=''>
      <a class='page-link' onClick='quartoItem()' >4</a>
    </li>
    <li class='page-item'>
      <a class='page-link'>...</a>
    </li>
    <li class='page-item' id='last' value='$totalPaginas'>
      <a class='page-link' onClick='lastItem($totalPaginas)' >$totalPaginas</a>
    </li>
    <li class='page-item next' id='next'>
      <a class='page-link' onclick='avancarPagina($totalPaginas)'><i class='tf-icon bx bx-chevrons-right'></i></a>
    </li>
  </ul>
</nav>";
    }


    function ExibirQuestoesPaginação($pagina, $quantidade)
    {
        $servername = "localhost";
        $username = "tope_bd";
        $password = "BMbFCeA8JYHGjSkK";
        $dbname = "tope_bd";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
        $questoesPorPagina = $quantidade;
        $sql = "SELECT COUNT(*) as total FROM questao_banco";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalQuestoes = $result['total']; //total de questões
        $totalPaginas = ceil($totalQuestoes / $questoesPorPagina); //total de páginas
        $paginaAtual = isset($pagina) ? $pagina : 1; //página atual
        // Calcular o deslocamento para a consulta SQL
        $offset = ($paginaAtual - 1) * $questoesPorPagina;

        echo "foram encontradas " . $totalQuestoes . " Questões";
        // Consultar as questões da página atual
        $sql = "SELECT * FROM questao_banco LIMIT $offset, $questoesPorPagina";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $questoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //mostra as questões
        foreach ($questoes as $questao) :


            $id_chave_questao = $questao['id_chave_questao'];
            // Consultar as questões da página atual, se a consulta ficar lenta, substituir novamente
            // $sql = "SELECT * FROM questao_banco WHERE id_chave_questao = $id_chave_questao" ;
            $sql = "SELECT questao_banco.*, 
carreiras.nome AS nome_carreira, 
banca.nome AS nome_banca,
provas.nome AS nome_provas, provas.nivel
FROM busca_questao
INNER JOIN questao_banco ON busca_questao.id_questao_chave = questao_banco.id_chave_questao
INNER JOIN carreiras ON busca_questao.carreiras_id = carreiras.id_chave_carreiras
INNER JOIN banca ON busca_questao.bancas_id = banca.id_chave_banca
INNER JOIN provas ON busca_questao.provas_id = provas.id_chave_provas
WHERE questao_banco.id_chave_questao = $id_chave_questao";

            // echo $sql;

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $questoesResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($questoesResult as $Rowquestao) :
                // echo "<li>" . $Rowquestao['formato'] . "</li>";

                // se for o caso -> renomear as variáveis para $Rowquestao



                $IdQuestao = $questao['id_chave_questao'];
                $sql = "SELECT *
                    FROM questao_disciplina_assunto
                    INNER JOIN disciplina_assunto ON questao_disciplina_assunto.id_disciplina_assunto = disciplina_assunto.id_chave_disciplina
                    WHERE questao_disciplina_assunto.id_questao = :idQuestao";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':idQuestao', $IdQuestao, PDO::PARAM_INT);
                $stmt->execute();
                $assuntos_disciplina = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $badgeAssunto = "";
                foreach ($assuntos_disciplina as $rowAssuntosDisc) :

                    $badgeAssunto .= "<span class='badge mx-2 bg-label-danger mb-2'>" . $rowAssuntosDisc['nome'] . "</span>";

                endforeach;



                $Enunciado = $Rowquestao['enunciado'];


                $carreira = $Rowquestao['nome_carreira'];
                $banca = $Rowquestao['nome_banca'];
                $prova = $Rowquestao['nome_provas'];
                $nivel = $Rowquestao['nivel'];

                $alt_a =  strip_tags($Rowquestao['alt_a']);
                $alt_b = strip_tags($Rowquestao['alt_b']);
                $alt_c = strip_tags($Rowquestao['alt_c']);
                $alt_d = strip_tags($Rowquestao['alt_d']);
                $alt_e = strip_tags($Rowquestao['alt_e']);
                $alcorreta = $Rowquestao['correta'];
                switch ($Rowquestao['formato']) {
                    case 'ABCDE':
                        echo "
<div class='card'>
    <div class='card-body col'>
        <!-- horizontal -->
        <div class='d-flex flex-wrap col-12'>
            $badgeAssunto <br>
            <span class='badge bg-label-primary mb-2 mr-2'>Questão: $IdQuestao</span>
            <span class='badge bg-label-primary mb-2 mr-2'>Carreira: $carreira</span>
            <span class='badge bg-label-primary mb-2'>&gt;</span>
            <span class='badge bg-label-primary mb-2 mr-2'>Nível: $nivel</span>
        </div>
        <!-- vertical -->
        <div class='d-flex mx-2 flex-column'>
            <div class='d-flex flex-wrap'>
                <span class='badge bg-label-secondary mx-2'>Ano: 2023</span>
                <span class='badge bg-label-secondary mx-2'>Banca: $banca</span>
                <span class='badge bg-label-secondary mx-2'>Prova: $prova</span>
            </div>

            <br>
            <p style='color:black; text-align: justify;' class='mb-0'>$Enunciado</p>

            <br>
            <div class='form-check'>
                <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                <label class='form-check-label' for='A$IdQuestao'>
                   <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                </label>
            </div>

            <div class='form-check'>
                <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                <label class='form-check-label' for='B$IdQuestao'>
                  <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                </label>
            </div>

            <div class='form-check'>
                <input class='form-check-input' name='$IdQuestao' type='radio' id='C$IdQuestao'>
                <label class='form-check-label' for='C$IdQuestao'>
                 <text id='" . $IdQuestao . "C'  style='color:black;'>   C) $alt_c </text>
                </label>
            </div>

            <div class='form-check'>
                <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                <label class='form-check-label' for='D$IdQuestao'>
                 <text  id='" . $IdQuestao . "D' style='color:black;'>   D) $alt_d </text>
                </label>
            </div>

            <div class='form-check'>
                <input class='form-check-input' name='$IdQuestao' type='radio' id='E$IdQuestao'>
                <label class='form-check-label' for='E$IdQuestao'>
                 <text  id='" . $IdQuestao . "E' style='color:black;'>   E) $alt_e </text>
                </label>
            </div>
        </div>

        <br>
        
        <div id='status_question_$IdQuestao'></div>
        <br>
        <div class='d-flex flex-wrap'>
            <button type='button' onclick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
        </div>
    </div>
</div>
<br>
";

                        break;

                    case 'ABCD':
                        echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                           $badgeAssunto <br>

                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label' for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> A) $alt_a </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  B) $alt_b </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='C$IdQuestao'>
                    <label class='form-check-label' for='C$IdQuestao'>
                     <text id='" . $IdQuestao . "C' style='color:black;'>   C) $alt_c </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='D$IdQuestao'>
                    <label class='form-check-label' for='D$IdQuestao'>
                     <text id='" . $IdQuestao . "D' style='color:black;'>   D)$alt_d </text>
                    </label>
                </div>

            </div>
  <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button'onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                        break;

                    case 'CE':
                        echo "

<div class='card w-100'>
    <div class='d-flex align-items-end row'>

        <div class='card-body'>
            <!-- horizontal -->
            <div class='d-flex flex-wrap'>

                           $badgeAssunto <br>

                <span class='badge mx-2 bg-label-primary mb-2'>Questão: $IdQuestao</span>
                <span class='badge mx-2 bg-label-primary mb-2'>Carreira: $carreira
                    Cargo/Área</span>
                <span class='badge mx-2 bg-label-primary mb-2'>></span>
                <span class='badge mx-2 bg-label-primary mb-2'>Nível: $nivel</span>
            </div>
            <!-- vertical -->
            <div class='d-flex  mx-2 flex-column'>
                <div class='d-flex flex-wrap'>
                    <span class='badge mx-2 bg-label-secondary'>Ano: 2023</span>
                    <span class='badge  mx-2 bg-label-secondary'>Banca: $banca </span>
                    <span class='badge  mx-2 bg-label-secondary'>Prova: $prova</span>
                </div>

                <br>
                <text style='color:black;' class='mb-0'>$Enunciado</text>

                <br>
                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='A$IdQuestao'>
                    <label class='form-check-label'  for='A$IdQuestao'>
                       <text id='" . $IdQuestao . "A' style='color:black;'> C) CERTO </text>
                    </label>
                </div>

                <div class='form-check'>
                    <input class='form-check-input' name='$IdQuestao' type='radio' id='B$IdQuestao'>
                    <label class='form-check-label' for='B$IdQuestao'>
                      <text id='" . $IdQuestao . "B' style='color:black;'>  E) ERRADO </text>
                    </label>
                </div>


            </div>
  <br>
            
            <div id='status_question_$IdQuestao'>
            </div>
            <br>
            <div class='d-flex flex-wrap'>
                <button type='button' onClick='correct(\"$IdQuestao$alcorreta\")' class='btn mx-2 rounded-pill btn-primary'>Responder Questão</button>
            </div>
        </div>
    </div>
</div>
<br>

";
                        break;

                    default:
                        # code...
                        break;
                }

            endforeach;






        endforeach;


        if (isset($_GET['pagina'])) {

            $paginaAtual = $_GET['pagina'];
        }



        $active1 = "";
        $active2 = "";
        $active3 = "";
        $active4 = "";
        $primeiro_item = 1;
        $segundo_item = 2;
        $terceiro_item = 3;
        $quarto_item = 4;
        $avançar = $paginaAtual + 1;
        $voltar = $paginaAtual - 1;

        switch ($paginaAtual) {
            case '1':
                $active1 = "active";
                break;
            case '2':
                $active2 = "active";
                break;
            case '3':
                $active3 = "active";
                break;
            case '4':
                $active4 = "active";
                break;

            default:
                $active3 = "active";
                $primeiro_item = $paginaAtual - 2;
                $terceiro_item = $paginaAtual;
                $segundo_item = $paginaAtual - 1;
                $quarto_item = $paginaAtual + 1;
                break;
        }

        echo "pagina atual: " . $_GET['pagina'];
        echo "
				<br>
				<nav aria-label='Page navigation'>
                          <ul class='pagination'>
                            <li class='page-item prev'>
                              <a class='page-link' href='?pagina=$voltar '><i class='tf-icon bx bx-chevrons-left'></i></a>
                            </li>
                            <li class='page-item $active1'>
                              <a class='page-link' href='?pagina=$primeiro_item'>$primeiro_item</a>
                            </li>
                            <li class='page-item $active2'>
                              <a class='page-link' href='?pagina=$segundo_item'>$segundo_item</a>
                            </li>
                            <li class='page-item $active3'>
                              <a class='page-link' href='?pagina=$terceiro_item'>$terceiro_item</a>
                            </li>
 							<li class='page-item $active4'>
                              <a class='page-link' href='?pagina=$quarto_item'>$quarto_item</a>
                            </li>
                            <li class='page-item'>
                              <a class='page-link' href='javascript:void(0);'>...</a>
                            </li>
                            <li class='page-item'>
                              <a class='page-link' href='?pagina=$totalPaginas'>$totalPaginas</a>
                            </li>
                            <li class='page-item next'>
                              <a class='page-link' href='?pagina=$avançar'><i class='tf-icon bx bx-chevrons-right'></i></a>
                            </li>
                          </ul>
                        </nav>
				";
    }

    function offCanvas($titulo, $id_offcanvas, $id_input_text, $funcao_search, $id_resultado_lista)
    {
        echo " <div class='col-lg-3 col-md-6'><div class='mt-3'>
					<div class='offcanvas offcanvas-end' tabindex='-1' id='$id_offcanvas' aria-labelledby='offcanvasEndLabel'>
					<div class='offcanvas-header'>
					<h5 id='offcanvasEndLabel' class='offcanvas-title'>$titulo</h5>
					<button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button></div>
					<div class='offcanvas-body '>
					<div class='sticky-top bg-light py-3'>
					<form class='mb-3'>
					
					<div class='input-group'>
									<input type='text' class='form-control' placeholder='Digite sua busca' id='$id_input_text' aria-label='Digite sua busca'>
									<button class='btn btn-primary' onclick='$funcao_search()' type='button'>Pesquisar</button>
					</div>
					</form>
									<form id='meuFormulario'><ul id='$id_resultado_lista'></ul></form>
					
					</div>
					
					<button type='button' class='btn btn-outline-secondary d-grid w-100' data-bs-dismiss='offcanvas'>Sair</button>
					</div></div></div></div>";
    }
}
