<?php
$connect = mysqli_connect("localhost", "tope_bd", "BMbFCeA8JYHGjSkK", "tope_bd");

    if(!isset($_GET['searchTerm'])){
        $json = [];

    }else{
        $search = $_GET['searchTerm'];
        $sql = "SELECT * FROM questao  WHERE assunto LIKE '%".$search."%' && etapa LIKE 'aprovado' GROUP BY assunto LIMIT 100";
                // SELECT * FROM questao WHERE assunto LIKE '%".$search."%' && etapa LIKE 'aprovar' LIMIT 20
        $result = mysqli_query($connect, $sql);
        $json = [];
        while($row = $result->fetch_assoc()){
            $json[] = ['id_questao'=>$row['id_questao'], 'assunto'=>$row['assunto']];
        }
    }

    echo json_encode($json);
?>
