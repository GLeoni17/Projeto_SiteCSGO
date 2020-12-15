<?php

    include "conexao.php";

    $id_time = $_POST["id_time"];
    $nome = $_POST["nome"];

    $update = "UPDATE times SET nome='$nome'
                                WHERE
                            id_time='$id_time'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";

?>