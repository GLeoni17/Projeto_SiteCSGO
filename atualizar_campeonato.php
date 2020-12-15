<?php

    include "conexao.php";

    $id_campeonato = $_POST["id_campeonato"];
    $nome = $_POST["nome"];

    $update = "UPDATE campeonatos SET nome='$nome'
                                WHERE
                            id_campeonato='$id_campeonato'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";

?>