<?php

// Obter os dados da pesquisa
$query = $_POST['query'];

// Conecte-se ao banco de dados
 $DB_HOST = 'localhost';
    $DB_USER = 'tope_bd';
    $DB_PASS = 'BMbFCeA8JYHGjSkK';
    $DB_NAME = 'tope_bd';

$db = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);

// Fazer a pesquisa
$stmt = $db->prepare("SELECT * FROM questao WHERE assunto LIKE :query && etapa LIKE 'aprovar' LIMIT 20");
$stmt->bindValue(':query', "%$query%");
$stmt->execute();
$results = $stmt->fetchAll();

// Retornar os resultados como um objeto JSON
header('Content-Type: application/json');
echo json_encode($results);

?>
