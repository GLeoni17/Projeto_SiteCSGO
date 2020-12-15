<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT * FROM campeonatos";

    if(isset($_GET["id_campeonato"])){
        $id_campeonato = $_GET["id_campeonato"];
        $select .= " WHERE id_campeonato='$id_campeonato'";
    }

    $resultado = mysqli_query($con,$select)
        or die(mysqli_error($con));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }
    echo json_encode($matriz);
?>