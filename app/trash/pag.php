<?php $servername = "localhost";
$username = "tope_bd";
$password = "BMbFCeA8JYHGjSkK";
$dbname = "tope_bd";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
$questoesPorPagina = 20;
$sql = "SELECT COUNT(*) as total FROM questao_banco";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$totalQuestoes = $result['total']; //total de questões
$totalPaginas = ceil($totalQuestoes / $questoesPorPagina);//total de páginas
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;//ágina atual
// Calcular o deslocamento para a consulta SQL
$offset = ($paginaAtual - 1) * $questoesPorPagina;
// Consultar as questões da página atual
$sql = "SELECT * FROM questao_banco LIMIT $offset, $questoesPorPagina";
$stmt = $conn->prepare($sql);
$stmt->execute();
$questoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//mostra as questões
foreach ($questoes as $questao) :
    echo "<li>" . $questao['id_chave_questao'] . "</li>";
endforeach;


//mostra a paginação
        for ($i = 1; $i <= $totalPaginas; $i++) :
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a> &nbsp &nbsp";
        endfor;

?>

