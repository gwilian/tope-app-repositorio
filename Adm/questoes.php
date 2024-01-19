<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Exemplo de botão clicado automaticamente</title>
</head>


    
</body>
<!-- <body onload="setTimeout(clickBotao, 5000)"> -->
    <!-- <h1>Exemplo de botão clicado automaticamente após 5 segundos</h1> -->
    <!-- <button id='meuBotao' onclick="alert('Botão clicado!')">Clique aqui</button> -->
    

    <?php
    require_once "Robo.php";

        if (!isset($_GET['n'])) {
           $number = 1;
        }else{
            $number = $_GET['n'];
        }

    // error_reporting(0);
    // ini_set('display_errors', 0);

    
    $url = "https://rota-api.grancursosonline.com.br/open/elastic/questao?perPage=100&anulada=0&desatualizada=0&sort=[%7B%22anos%22:%22desc%22%7D,%7B%22_score%22:%22desc%22%7D]&resolucao=todas&page=$number";// . $click;
    $json_data = file_get_contents($url);
    $dados = json_decode($json_data, true);

    $c2 = new Robo;
    // $c2->JsonBanco($json_data);

        $click = $number + 1;
    echo "<a href='questoes.php?n=" . $click . "'><button type='button' id='meuBotao' name='button'>Próxima página</button></a>";



   
        $i = 0;
    while ($i <= 99) {  
    $id_chave = $dados['data']['rows'][$i]['id'];
    $enunciado = $dados['data']['rows'][$i]['enunciado'];
    $enunciado_sn = $dados['data']['rows'][$i]['enunciado_clean'];
        $texto_true = $dados['data']['rows'][$i]['id'][0]? "true":"false";
    $alt_a = $dados['data']['rows'][$i]['itens'][0]['corpo'] ? $dados['data']['rows'][$i]['itens'][0]['corpo'] : "NÃO EXISTE";$txt1a = str_replace('<p', "<span", $alt_a); $txt2a = str_replace("</p>", "</span>", $txt1a);   
    $alt_b = $dados['data']['rows'][$i]['itens'][1]['corpo'] ? $dados['data']['rows'][$i]['itens'][1]['corpo'] : "NÃO EXISTE";$txt1b = str_replace('<p', "<span", $alt_b); $txt2b = str_replace("</p>", "</span>", $txt1b);   
    $alt_c = $dados['data']['rows'][$i]['itens'][2]['corpo'] ? $dados['data']['rows'][$i]['itens'][2]['corpo'] : 1;$txt1c = str_replace('<p', "<span", $alt_c); $txt2c = str_replace("</p>", "</span>", $txt1c);  
    $alt_d = $dados['data']['rows'][$i]['itens'][3]['corpo'] ? $dados['data']['rows'][$i]['itens'][3]['corpo'] : 2;$txt1d = str_replace('<p', "<span", $alt_d); $txt2d = str_replace("</p>", "</span>", $txt1d);   
    $alt_e = $dados['data']['rows'][$i]['itens'][4]['corpo'] ? $dados['data']['rows'][$i]['itens'][4]['corpo'] : 3;$txt1e = str_replace('<p', "<span", $alt_e); $txt2e = str_replace("</p>", "</span>", $txt1e);   
    $ano = $dados['data']['rows'][$i]['anos'][0];
    $escolaridade = $dados['data']['rows'][$i]['provas'][0]['nivel'];
    $dificuldade = $dados['data']['rows'][$i]['dificuldade'];
        $rotulo = $dados['data']['rows'][$i]['rotulo'];
        $id_texto11 = $dados['data']['rows'][$i]['grupoQuestao']['id'];
        
       
            $alternativa = $dados['data']['rows'][$i]['resposta'];
        $correta = 0;
        switch ($alternativa) {
            case $dados['data']['rows'][$i]['itens'][0]['id']:
                $correta = "A";
                break;

        case $dados['data']['rows'][$i]['itens'][1]['id']:
                $correta = "B";
            break;

        case $dados['data']['rows'][$i]['itens'][2]['id']:
                $correta = "C";
            break;

        case $dados['data']['rows'][$i]['itens'][3]['id']:
                $correta = "D";
            break;
        case $dados['data']['rows'][$i]['itens'][4]['id']:
                $correta = "E";
            break;
            
            default:
                # code...
                break;
        }



    //FORMATO

$formato = 0;
   if ($alt_c == 1) {
            $formato = "CE";
            
   }elseif ($alt_e == 3) {
            $formato = "ABCD";
   } else{
            $formato = "ABCDE";
   }

  

        $c2->NovaQuestao($id_chave, $rotulo, $enunciado, $enunciado_sn,$texto_true, $id_texto11, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $correta, $formato);
       




      // BUSCAR QUESTÃO
   $id_chave = $dados['data']['rows'][$i]['id'];
   $provas_id = $dados['data']['rows'][$i]['provas'][0]['id'];
   $cargo_id = $dados['data']['rows'][$i]['provas'][0]['cargo']['id'];
   $carreiras_id = $dados['data']['rows'][$i]['carreiras'][0]['id'];
  $id_texto1 = $dados['data']['rows'][$i]['grupoQuestao']['id'];
   $areas_id = $dados['data']['rows'][$i]['areas'][0]['id']? $dados['data']['rows'][$i]['areas'][0]['id']:00;
   $orgaos_id = $dados['data']['rows'][$i]['provas'][0]['orgao']['id'];
   $bancas_id = $dados['data']['rows'][$i]['provas'][0]['banca']['id'];
        $dificuldade = $dados['data']['rows'][$i]['dificuldade'];
        $anulada = $dados['data']['rows'][$i]['anulada'] ? "true" : "false";
        $desatualizado = $dados['data']['rows'][$i]['desatualizada']?"true":"false";

       $c2->BuscaQuestao($formato, $id_chave, $provas_id, $cargo_id, $carreiras_id, $id_texto1, $areas_id, $orgaos_id, $bancas_id, $ano, $dificuldade, $anulada, $desatualizado);
    
    
            

  
    
   


    //provas
   
$provas_id = $dados['data']['rows'][$i]['provas'][0]['id']?$dados['data']['rows'][$i]['provas'][0]['id']:1;
$nome_prova = $dados['data']['rows'][$i]['provas'][0]['nome']?$dados['data']['rows'][$i]['provas'][0]['nome']:1;
$cargo_id = $dados['data']['rows'][$i]['provas'][0]['cargo']['id']?$dados['data']['rows'][$i]['provas'][0]['cargo']['id']:1;
$orgaos_id = $dados['data']['rows'][$i]['provas'][0]['orgao']['id']?$dados['data']['rows'][$i]['provas'][0]['orgao']['id']:1;
$bancas_id = $dados['data']['rows'][$i]['provas'][0]['banca']['id']?$dados['data']['rows'][$i]['provas'][0]['banca']['id']:1;//echo "<br>Banca: $bancas_id";
$ano = $dados['data']['rows'][$i]['provas'][0]['ano']?$dados['data']['rows'][$i]['provas'][0]['ano']:1;//echo "<br>Carreira: $ano";  
$nivel = $dados['data']['rows'][$i]['provas'][0]['nivel']?$dados['data']['rows'][$i]['provas'][0]['nivel']:1;//echo "<br>Texto: $nivel";   
$slg = $dados['data']['rows'][$i]['provas'][0]['slug']?$dados['data']['rows'][$i]['provas'][0]['slug']:1;//echo "<br>slg: $slg";
   
   $c2 ->NovaProva($provas_id, $nome_prova, $cargo_id, $orgaos_id, $bancas_id, $ano, $nivel, $slg);
  


    //CARGO
    //echo "<h1>CARGO</h1>";
    $cargo_id = $dados['data']['rows'][$i]['provas'][0]['cargo']['id'];//echo "<br>id cargo: $cargo_id";
    $nome_cargo = $dados['data']['rows'][$i]['provas'][0]['cargo']['descricao'];//echo "<br>nome cargo: $nome_cargo";
    $slg_cargo = $dados['data']['rows'][$i]['provas'][0]['cargo']['slug'];//echo "<br>id cargo: $slg_cargo";
  $c2 ->NovoCargo($cargo_id, $nome_cargo, $slg_cargo);

    //CARREIRAS
    //echo "<h1>CARREIRAS</h1>";
    $carreiras_id = $dados['data']['rows'][$i]['carreiras'][0]['id'];//echo "<br>id : $carreiras_id";
   $nome_carreiras = $dados['data']['rows'][$i]['carreiras'][0]['nome'];//echo "<br>nome: $nome_carreiras";
   $descricao_carreiras = $dados['data']['rows'][$i]['carreiras'][0]['descricao'];//echo "<br>desc: $descricao_carreiras";
   $c2 ->Novacarreira($carreiras_id, $nome_carreiras, $descricao_carreiras);

    //TEXTO-QUESTAO
    //echo "<h1>TEXTO-QUESTAO</h1>";
    $id_texto = $dados['data']['rows'][$i]['grupoQuestao']['id'];//echo "<br>id texto: $id_texto";
   $text_completo   = $dados['data']['rows'][$i]['grupoQuestao']['texto'];//echo "<br>enunciado: $text_completo";
    $enunciado = $dados['data']['rows'][$i]['grupoQuestao']['enunciado'];//echo "<br>enunciado: $enunciado";

        $text_true_false   = $dados['data']['rows'][$i]['grupoQuestao']['texto']?"true":"false";//echo "<br>enunciado: $text_true_false";
        $enunciado_true_false = $dados['data']['rows'][$i]['grupoQuestao']['enunciado'] ? "true" : "false";//echo "<br>enunciado: $enunciado_true_false";

   $dsc = $dados['data']['rows'][$i]['grupoQuestao']['descricao'];//echo "<br>descricao: $dsc";
    
        $c2 ->NovoTexto($id_texto, $text_completo, $enunciado, $text_true_false, $enunciado_true_false, $dsc);


        //DISCIPLINA_ASSUNTO
        //criar while porque cada questão pode ter até 4 assuntos
        $assunt = 0;
while ($assunt <= 6) {
    //echo "<h1>DISCIPLINA_ASSUNTO</h1>";
    $id_disciplina = $dados['data']['rows'][$i]['assuntos'][$assunt]['id'];//echo "<br>id: $id_disciplina";
   $nome_disciplina = $dados['data']['rows'][$i]['assuntos'][$assunt]['nome'];//echo "<br>nome: $nome_disciplina";
   $nome_clean_disciplina = $dados['data']['rows'][$i]['assuntos'][$assunt]['nome_clean'];//echo "<br>nome_clean: $nome_clean_disciplina";
   $materia_id = $dados['data']['rows'][$i]['assuntos'][$assunt]['assunto_raiz'];//echo "<br>materia_id: $materia_id";
    $materia_true_false = $dados['data']['rows'][$i]['assuntos'][$assunt]['materia'];//echo "<br>é materia?: $materia_true_false";
   $topico_acima_pai = $dados['data']['rows'][$i]['assuntos'][$assunt]['pai'];//echo "<br>topico pai: $topico_acima_pai";
   $oab = $dados['data']['rows'][$i]['assuntos'][$assunt]['oab'];//echo "<br>assunto da oab?: $oab";
   $assunto_raiz = $dados['data']['rows'][$i]['assuntos'][$assunt]['assunto_raiz'];//echo "<br>assunto raiz: $assunto_raiz";
   $palavras_chave = $dados['data']['rows'][$i]['assuntos'][$assunt]['palavrasChave']['0'];//echo "<br>palavras chave: $palavras_chave";
   $slg = $dados['data']['rows'][$i]['assuntos'][$assunt]['slug'];//echo "<br>slg: $slg";

   $break = $dados['data']['rows'][$i]['assuntos'][$assunt]['id']? "true": "false";

      //QUESTÃO DISCIPLINA/ASSUNTO
    //echo "<h1>QUESTÃO DISCIPLINA/ASSUNTO</h1>";
    $id_questao_chave = $dados['data']['rows'][$i]['id'];//echo "<br>questao: $id_questao_chave";
   $id_assunto = $dados['data']['rows'][$i]['assuntos'][$assunt]['id'];//echo "<br>assunto: $id_assunto";

            if (empty($dados['data']['rows'][$i]['assuntos'][$assunt]['id'])) {
                $assunt = 7;
                //echo "vazio";
            }else{
                   $c2 -> NovoAssunto($id_disciplina, $nome_disciplina, $nome_clean_disciplina, $materia_id, $materia_true_false, $topico_acima_pai, $oab, $assunto_raiz, $palavras_chave, $slg);
                   $c2 -> NovaQuestaoDisciplinaAssunto($id_questao_chave, $id_assunto);
                ++$assunt;
            }

   
}

   
   

    


    //BANCA
    //echo "<h1>BANCA</h1>";
    $id_banca = $dados['data']['rows'][$i]['provas'][0]['banca']['id'];//echo "<br>id banca: $id_banca";
   $nome_banca = $dados['data']['rows'][$i]['provas'][0]['banca']['nome'];//echo "<br>nome: $nome_banca";
   $descricao = $dados['data']['rows'][$i]['provas'][0]['banca']['descricao'];//echo "<br>desc: $descricao";
   $sigla = $dados['data']['rows'][$i]['provas'][0]['banca']['sigla'];//echo "<br>sigla: $sigla";
   $oab = $dados['data']['rows'][$i]['provas'][0]['banca']['oab'];//echo "<br>é da oab?: $oab";
   $slg = $dados['data']['rows'][$i]['provas'][0]['banca']['slug'];//echo "<br>slg: $slg";
  $c2 ->NovaBanca($id_banca, $nome_banca, $descricao, $sigla, $oab, $slg);


    //AREAS
    //echo "<h1>AREAS</h1>";
    $id_areas_true = $dados['data']['rows'][$i]['areas'][0]['id']?"true":"false";//echo "<br>id: $id_areas_true";
    $id_areas = $dados['data']['rows'][$i]['areas'][0]['id'];//echo "<br>id: $id_areas";
   $nome_areas = $dados['data']['rows'][$i]['areas'][0]['descricao'];//echo "<br>nome: $nome_areas";
   
   if (isset($dados['data']['rows'][$i]['areas'][0]['id'])) {
            $c2->NovaArea($id_areas,  $nome_areas);
   }
   
   

    //ORGÃOS
    //echo "<h1>ORGÃOS</h1>";
    $id_orgaos = $dados['data']['rows'][$i]['provas'][0]['orgao']['id'];//echo "<br>id orgão: $id_orgaos";
   $nome_orgao = $dados['data']['rows'][$i]['provas'][0]['orgao']['nome'];//echo "<br>nome: $nome_orgao";
   $sigla_orgao = $dados['data']['rows'][$i]['provas'][0]['orgao']['sigla'];//echo "<br>sigla: $sigla";
   $esfera = $dados['data']['rows'][$i]['provas'][0]['orgao']['esfera'];//echo "<br>esfera: $esfera";
   $estado = $dados['data']['rows'][$i]['provas'][0]['orgao']['uf'];//echo "<br>estado: $estado";
   $slg = $dados['data']['rows'][$i]['provas'][0]['orgao']['slug'];//echo "<br>slg: $slg";
   $c2 -> NovaOrgao($id_orgaos, $nome_orgao, $sigla_orgao, $esfera, $estado,$slg);
 


        $i++;
    }

    

  




    ?>
   


    <!-- <script>
        function clickBotao() {
            var botao = document.getElementById("meuBotao");
            botao.click();
        }
    </script> -->
</body>

</html>