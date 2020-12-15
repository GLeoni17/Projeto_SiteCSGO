<?php
    include "conexao.php";

    $table = $_POST["tabela"];
    $column = $_POST["coluna"];
    $id = $_POST["id"];

    $delete = "DELETE FROM $table WHERE $column='$id'";

    mysqli_query($con, $delete) or die (mysqli_error($con));

    echo "1";
?>