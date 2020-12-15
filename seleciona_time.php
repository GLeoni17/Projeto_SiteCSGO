<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT * FROM times";

    if(isset($_GET["id_time"])){
        $id_time = $_GET["id_time"];
        $select .= " WHERE id_time='$id_time'";
    }

    $resultado = mysqli_query($con,$select)
        or die(mysqli_error($con));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);
?>