<?php
    include "conexao.php";

    $nome_time = $_POST["nome_time"];
    $select = "SELECT id_time FROM times WHERE nome = '$nome_time'";
    $res = mysqli_query($con, $select) or die("Erro ao encontrar o time");
    $row = mysqli_fetch_assoc($res);

    echo $row["id_time"];
?>