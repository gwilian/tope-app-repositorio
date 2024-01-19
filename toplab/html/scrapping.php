<?php
// Inicialize a sessão cURL
$numero = $_GET['numero'];
$ch = curl_init();

// Defina a URL da página que deseja baixar
$url = "http://193.123.111.125/toplab/html/arquivos/$numero.html";

// Defina as opções cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute a solicitação cURL e armazene a resposta em uma variável
$response = curl_exec($ch);

//basta substituir o código = 47d2d219

// Feche a sessão cURL
curl_close($ch);

// Use uma expressão regular para extrair todos os pedaços de informação desejados da resposta
preg_match_all('/<div data-v-47d2d219=""><div data-v-47d2d219="" class="id-position"><div data-v-47d2d219="" class="ds-question__header__top__order">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__header__top__id">(.*?)<\/div>(.*?)<span data-v-4bee2230="" data-v-47d2d219="" class="source w400 snull text-blue-500 align-left">(.*?)<\/span>(.*?)<span data-v-4bee2230="" data-v-47d2d219="" class="source w400 snull text-blue-500 align-left">(.*?)<\/span>(.*?)<span data-v-4bee2230="" data-v-47d2d219="" class="source w400 snull text-blue-500 align-left">(.*?)<\/span>(.*?)<span data-v-4bee2230="" data-v-47d2d219="" class="source w400 s14 text-blue-500 align-left">(.*?)<\/span>(.*?)<span data-v-4bee2230="" data-v-47d2d219="" class="source w400 s14 text-blue-500 align-left">(.*?)<\/span>(.*?)<div data-v-47d2d219="" class="ds-question__body__statement">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__body__options__option__description">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__body__options__option__description">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__body__options__option__description">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__body__options__option__description">(.*?)<\/div>(.*?)<div data-v-47d2d219="" class="ds-question__body__options__option__description">(.*?)<\/div>/s', $response, $matches);


// Inicialize um array para armazenar os dados
$data = array();

// Percorra os resultados da expressão regular
for ($i = 0; $i < count($matches[0]); $i++) {
    // Armazene cada pedaço de informação em um item do array
    $item = array(
        'numero_questao' => trim(strip_tags($matches[1][$i])),
        'codigo_questao' => trim(strip_tags($matches[3][$i])),
        'assunto' => trim(strip_tags($matches[5][$i])),
        'area' => trim(strip_tags($matches[7][$i])),
         'ano' => trim(strip_tags($matches[9][$i])),
           'banca' => trim(strip_tags($matches[11][$i])),
           'prova' => trim(strip_tags($matches[13][$i])),
           'enunciado' => trim(strip_tags($matches[15][$i])),
           'a' => trim(strip_tags($matches[17][$i])),
           'b' => trim(strip_tags($matches[19][$i])),
           'c' => trim(strip_tags($matches[21][$i])),
           'd' => trim(strip_tags($matches[23][$i])),
           'e' => trim(strip_tags($matches[25][$i]))
       );
       $data[] = $item;
   }

   // Exiba os dados de cada item do array
   foreach ($data as $item) {
       echo "Numero da questão: " . $item['numero_questao'] . "\n <br>";
       echo "Código da questão: " . $item['codigo_questao'] . "\n <br>";
      // echo "Assunto: " . $item['assunto'] . "\n <br>";
      //  echo "Área: " . $item['area'] . "\n <br>";
      // echo "Ano: " . $item['ano'] . "\n <br>";
      // echo "Banca: " . $item['banca'] . "\n <br>";
      // echo "Prova: " . $item['prova'] . "\n <br>";
      // echo "Enunciado: " . $item['enunciado'] . "\n <br>";
      //   echo "A) : " . $item['a'] . "\n <br>";
      //    echo "B) : " . $item['b'] . "\n <br>";
      //    echo "C) : " . $item['c'] . "\n <br>";
      //    echo "D) : " . $item['d'] . "\n <br>";
      //    echo "E) : " . $item['e'] . "\n <br>";

        // numero_questao ano banca tema assunto enunciado alt_a alt_b alt_c alt_d alt_e prova
        //$numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $prova
        $numero_questao = $item['codigo_questao'];
         $ano  = $item['ano'];
         $banca  =  $item['banca'];
         $tema  = $item['area'];
         $assunto  = $item['assunto'];
         $enunciado  = $item['enunciado'];
         $alt_a  = $item['a'];
         $alt_b  = $item['b'];
         $alt_c  = $item['c'];
         $alt_d  = $item['d'];
         $alt_e  = $item['e'];
         $prova = $item['prova'];




          require_once 'Classes/CriarQuestao.php';
          $c1 = new Questao;
          $c1->NovaQuestaoVerify($numero_questao, $ano, $banca, $tema, $assunto, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $prova);


       echo "<hr>";
       
      
   }
