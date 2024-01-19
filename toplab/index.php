<?php

// Conecta-se ao banco de dados
$conexao = mysqli_connect("localhost", "tope_bd", "BMbFCeA8JYHGjSkK", "tope_bd");
// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    echo "Erro ao conectar-se ao banco de dados: " . mysqli_connect_error();
    exit();
}

    if (isset($_GET['a'])) {
        $a = $_GET['a'] + 1;

        if (isset($_GET['titulo'])) {



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
        $titulo = $_GET['titulo'];
       

        // Montar a consulta SQL para inserir os dados
        $sql = "INSERT INTO blog (titulo) VALUES ('$titulo')";

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

    echo "<form action=\"index.php\" method=\"GET\">
    <input type=\"hidden\" name=\"a\" value=\"$a\">
    <input style='height:60px; width:400px' type=\"text\" name=\"titulo\">
    <button type=\"submit\" id=\"submit-btn\">Enviar</button>
</form>";


   

  

    // Cria a consulta SQL
    $sql = "SELECT * FROM questao WHERE id_questao = $a;";

    // Executa a consulta
    $resultado = mysqli_query($conexao, $sql);
    // Verifica se houve erro na consulta
    if (!$resultado) {
        echo "Erro ao executar a consulta: " . mysqli_error($conexao);
        exit();
    }

    // Recupera os dados e exibe na página
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<p id=\"texto\">Seja criativo e elabore um titulo para um blog  referente a uma matéria estudantil com o tema " . $linha['assuntos_01'] . " e o tema " . $linha['assuntos_02'] . " tendo em vista que os dois temas são relacionados.</p> ";
    }

    echo "<div style='height:600px; width:400px'>
    <iframe
        src='https://ora.ai/embed/92e8cb37-b317-4c7f-820a-a4313e48c236'
        width='100%'
        height='100%'
        style='border:0; border-radius: 4px'
    />
</div>";


    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);

    ?>
