<?php

    include "conexao.php";

    $id = $_POST["alterar_id"];
    $nome = $_POST["alterar_nome"];
    $email = $_POST["alterar_email"];
    $senha = $_POST["alterar_senha"];
    $nickname = $_POST["alterar_nickname"];
    $idade = $_POST["alterar_idade"];
    $posicao = $_POST["alterar_posicao"];
    $permissao_requerida = $_POST["alterar_profissao"];

    //$time = $row["nome_time"];                                

    $update = "UPDATE usuario SET 
                                nome='$nome',
                                email='$email',
                                nickname='$nickname',
                                idade='$idade',
                                posicao='$posicao',
                                permissao_requerida='$permissao_requerida'
                                WHERE id_usuario='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));


    if($_GET["perfil"] == 1){
        header("location:index.php?alterar=1");
    }else{
        echo "1";
    }

?>