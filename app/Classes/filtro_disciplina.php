<?php
// Configuração do banco de dados
$dsn = 'mysql:host=localhost;dbname=tope_bd';
$usuario = 'tope_bd';
$senha = 'BMbFCeA8JYHGjSkK';

// Parâmetros do formulário de busca

$termo = isset($_POST['termo']) ? $_POST['termo'] : '';
$limit = isset($_POST['limit']) ? $_POST['limit'] : '50';
$offset = isset($_POST['offset']) ? $_POST['offset'] : '0';

// Conexão com o banco de dados
try {
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
}

// Query para contar o número total de registros
$query_count = $pdo->prepare("SELECT COUNT(*) FROM materias WHERE nome_materia LIKE :termo");
$query_count->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
$query_count->execute();
$total = $query_count->fetchColumn();

// Query para buscar os registros
$query = $pdo->prepare("SELECT * FROM materias WHERE nome_materia LIKE :termo LIMIT :limit OFFSET :offset");
$query->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
$query->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
$query->execute();
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

// Retorna os resultados como um array associativo
echo json_encode(array(
    'resultados' => $resultados,
    'total' => $total
));
?>
