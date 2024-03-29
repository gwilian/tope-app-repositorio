<?php
// Estabeleça a conexão com o banco de dados
$servername = "localhost";
$username = "tope_bd";
$password = "BMbFCeA8JYHGjSkK";
$dbname = "tope_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique se houve um erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// SQL para buscar todos os resultados que contenham o valor fornecido
$searchQuery = $_POST["query"];
$sql = "SELECT DISTINCT ano, MIN(id_chave_provas) AS id_chave_provas FROM provas WHERE ano LIKE '%$searchQuery%' GROUP BY ano";
$result = $conn->query($sql);

$response = [];

// Verifique se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Percorra os resultados e construa a resposta
    while ($row = $result->fetch_assoc()) {
        $item = [
            "id" => $row["id_chave_provas"],
            "name" => $row["ano"]
        ];

        $response[] = $item;
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($response);
