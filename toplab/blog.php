<?php

// Conecta-se ao banco de dados

$conexao = mysqli_connect("localhost", "tope_bd", "BMbFCeA8JYHGjSkK", "tope_bd");
// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    echo "Erro ao conectar-se ao banco de dados: " . mysqli_connect_error();
    exit();
}



    if (isset($_GET['a'])) {
        $a = $_GET['a'] +1;

        if (isset($_POST['titulo'])) {



        // Conexão com o banco de dados MySQL
        $servername = "localhost";
        $username = "tope_bd";
        $password = "BMbFCeA8JYHGjSkK";
        $dbname = "tope_bd";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Verificar conexão
        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        // Definir variáveis com os dados a serem inseridos
        $titulo = $_POST['titulo'];
       
        $b = $a - 1;
        // Montar a consulta SQL para inserir os dados
        // $sql = "INSERT INTO blog (titulo) VALUES ('$titulo')";
        $sql = "UPDATE `blog` SET `texto1` = '$titulo' WHERE `blog`.`id` = $b; ";

        //UPDATE `blog` SET `texto1` = '1' WHERE `blog`.`id` = 2; 

        // Executar a consulta SQL
        if (mysqli_query($conn, $sql)) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($conn);



        }else{

        }


    } else {
        $a = 1;
    }
    // echo "<a href='index.php?a=" . $a . "'><button>Próxima página</button></a>";
    
    
        
    echo "<form action=\"blog.php?a=$a\" method=\"POST\">
  
    <input style='height:60px; width:400px' type=\"text\" name=\"titulo\">
    <button type=\"submit\" id=\"submit-btn\">Enviar</button>
</form>";

//  <input type=\"hidden\" name=\"a\" value=\"$a\">
   

  

    // Cria a consulta SQL
    $sql = "SELECT * FROM blog WHERE id = $a;";

    // Executa a consulta
    $resultado = mysqli_query($conexao, $sql);
    // Verifica se houve erro na consulta
    if (!$resultado) {
        echo "Erro ao executar a consulta: " . mysqli_error($conexao);
        exit();
    }

    // Recupera os dados e exibe na página
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<p id=\"texto\"> Crie um texto, extenso e completo, formatado com tags em html,  para um blog que tem como titulo:" . $linha['titulo'] . ".</p> ";
    }

   // echo "<div style='height:600px; width:400px'>
   // <iframe
   //     src='https://ora.ai/embed/92e8cb37-b317-4c7f-820a-a4313e48c236'
   //     width='100%'
   //     height='100%'
   //     style='border:0; border-radius: 4px'
  //  />
//</div>";


    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
