<?php
class Graficos
{


    // SELECT * FROM questao_erro_acerto WHERE DATE(data_hora) = '2023-07-08' AND acerto_erro = 'Acertou' AND id_user = 1
    // SELECT COUNT(*) AS contagem FROM questao_erro_acerto WHERE DATE(data_hora) = '2023-07-08' AND acerto_erro = 'Acertou' AND id_user = 1

    function Resultado($data_hora, $acerto_erro, $id_user)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS contagem FROM questao_erro_acerto WHERE DATE(data_hora) = :data_hora AND acerto_erro = :acerto_erro AND id_user = :id_user");
        $stmt->bindParam(':data_hora', $data_hora);
        $stmt->bindParam(':acerto_erro', $acerto_erro);
        $stmt->bindParam(':id_user', $id_user);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo $row['contagem'];
                }
            } else {
               echo "0";
            }
        } else {
            echo "0";
        }
    }

    function ResultadoHoje($data_hora, $id_user)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS contagem FROM questao_erro_acerto WHERE DATE(data_hora) = :data_hora AND id_user = :id_user");
        $stmt->bindParam(':data_hora', $data_hora);
        $stmt->bindParam(':id_user', $id_user);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo $row['contagem'];
                }
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    function ResultadoTotal($acerto_erro, $id_user)
     {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS contagem FROM questao_erro_acerto WHERE acerto_erro = :acerto_erro  AND id_user = :id_user");
        $stmt->bindParam(':acerto_erro', $acerto_erro);
        $stmt->bindParam(':id_user', $id_user);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo $row['contagem'];
                }
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    function ResultadoGeral($id_user)
    {
        $DB_HOST = 'localhost';
        $DB_USER = 'tope_bd';
        $DB_PASS = 'BMbFCeA8JYHGjSkK';
        $DB_NAME = 'tope_bd';
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $stmt = $DB_con->prepare("SELECT COUNT(*) AS contagem FROM questao_erro_acerto WHERE id_user = :id_user");
        $stmt->bindParam(':id_user', $id_user);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo $row['contagem'];
                }
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }
   

}

?>