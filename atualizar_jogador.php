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
                                permissao='$permissao_requerida'
                               ";
    
    


    if($_GET["perfil"] == 1){

        if(isset($senha)){
            $senha = md5($senha);
            $update .= ", senha ='$senha'";
        }

        if($permissao_requerida==3 || $permissao_requerida==0){
            $update .= ", cod_time='0'";
        }
        
        $update .= " WHERE id_usuario='$id'";
        mysqli_query($con,$update)
        or die(mysqli_error($con));
        header("location:index.php?alterar=1");

    }else{

        $update .= " WHERE id_usuario='$id'";
        mysqli_query($con,$update)
        or die(mysqli_error($con));

        echo "1";
    }

?>