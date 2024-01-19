<?php
class Questao{
    function MostrarQuestao($id)
    {
    
        try {
            $DB_HOST = 'localhost';
            $DB_USER = 'tope_bd';
            $DB_PASS = 'BMbFCeA8JYHGjSkK';
            $DB_NAME = 'tope_bd';
            $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
            $stmt = $DB_con->prepare('SELECT busca_questao.*, questao_banco.*  FROM busca_questao INNER JOIN questao_banco ON busca_questao.id_questao_chave = questao_banco.id_chave_questao WHERE busca_questao.codigo_hex LIKE :id');
            $stmt->execute(array('id' => $id));
            while ($row = $stmt->fetch()) {
                $Enunciado = $row['enunciado'];



                $stmt = $DB_con->prepare('SELECT nome FROM questao_disciplina_assunto  INNER JOIN disciplina_assunto ON questao_disciplina_assunto.id_disciplina_assunto = disciplina_assunto.id_chave_disciplina WHERE questao_disciplina_assunto.id_questao LIKE :id');
                $stmt->execute(array('id' => $row['id_questao_chave']));
                while ($row2 = $stmt->fetch()) {

                    $badgeAssunto  = "<span class='badge mx-2 bg-label-danger mb-2'>" . $row2['nome'] . "</span>";

                }


                $stmt = $DB_con->prepare('SELECT * FROM provas WHERE id_chave_provas = :id');
                $stmt->execute(array('id' => $row['provas_id']));
                while ($row3 = $stmt->fetch()) {
                    $prova = $row3['nome'];
                    $nivel = $row3['nivel'];
                }

                $stmt = $DB_con->prepare('SELECT * FROM carreiras WHERE id_chave_carreiras = :id');
                $stmt->execute(array('id' => $row['carreiras_id']));
                while ($row4 = $stmt->fetch()) {
                    $carreira = $row4['nome'];
                }

                $stmt = $DB_con->prepare('SELECT * FROM banca WHERE id_chave_banca = :id');
                $stmt->execute(array('id' => $row['bancas_id']));
                while ($row5 = $stmt->fetch()) {
                    $banca  = $row5['nome'];
                }

              
                 $IdQuestao = $row['id'];
              
              
                
              
                $ano = $row['ano'];

                $alt_a =  strip_tags($row['alt_a']);
                $alt_b = strip_tags($row['alt_b']);
                $alt_c = strip_tags($row['alt_c']);
                $alt_d = strip_tags($row['alt_d']);
                $alt_e = strip_tags($row['alt_e']);
                $alcorreta = $row['correta'];


                switch ($row['formato']) {
                    case 'ABCDE':
                        echo "
<div class='mt-2'>
    <div class='card'>
        <div class='d-flex align-items-end row'>
            <div class='card-body col'>
                <!-- horizontal -->
                <div class='d-flex flex-wrap'>
                    $badgeAssunto <br>
                    <span class='badge bg-label-primary mx-2 mb-2 mr-2'>Questão: $IdQuestao</span>
                    <span class='badge bg-label-primary mx-2 mb-2 mr-2'>Carreira: $carreira </span>
                    <span class='badge bg-label-primary mx-2 mb-2 mr-2'> > </span>
                    <span class='badge bg-label-primary mx-2 mb-2 mr-2'>Nível: $nivel</span>
                </div>
                <!-- vertical -->
                <div class='d-flex mx-2 flex-column'>
                    <div class='d-flex flex-wrap'>
                        <span class='badge bg-label-secondary mx-2'>Ano: $ano</span>
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

<div class='card w-100 mt-2'>
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

<div class='card w-100 mt-2'>
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



            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }


    function Enunciado($id)
    { 
            $DB_HOST = 'localhost';
            $DB_USER = 'tope_bd';
            $DB_PASS = 'BMbFCeA8JYHGjSkK';
            $DB_NAME = 'tope_bd';
            $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
            $stmt = $DB_con->prepare('SELECT busca_questao.*, questao_banco.*  FROM busca_questao INNER JOIN questao_banco ON busca_questao.id_questao_chave = questao_banco.id_chave_questao WHERE busca_questao.codigo_hex LIKE :id');
            $stmt->execute(array('id' => $id));
            while ($row = $stmt->fetch()) {
                $Enunciado = $row['enunciado_cl'];
                    echo  $Enunciado;
            }

    }
   function Sitemap($id)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT * FROM busca_questao LIMIT 10000 OFFSET " . $id);
        $stmt->execute();
        $i = 0;
        $text = "<?xml version='1.0' encoding='UTF-8'?>
<urlset
      xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
      xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
      xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>
            ";
        while ($row = $stmt->fetch()) {
            $hex = $row['codigo_hex'];

            $text .=("<url>
  <loc>https://topeestudos.com/questao/resolver.php?hash=$hex</loc>
  <lastmod>2023-07-13T02:56:52+00:00</lastmod>
  <priority>1.00</priority>
</url>");
        }
        $text .= "</urlset>";
        return $text ;
    }

}




?>