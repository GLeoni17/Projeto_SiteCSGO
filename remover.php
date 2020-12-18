<?php
    include "conexao.php";
    session_start();

    $table = $_POST["tabela"];
    $column = $_POST["coluna"];
    $id = $_POST["id"];
    

    if(isset($_POST["remover_time"]) && $_POST["remover_time"]==1){
        $id_usuario = $_SESSION["usuario"];
        $select = "SELECT id_usuario FROM usuario WHERE cod_time='$id' AND id_usuario!='$id_usuario'";
        $res = mysqli_query($con, $select);

        if(mysqli_num_rows($res)==0){

            $update = "UPDATE usuario SET cod_time='0' WHERE id_usuario='$id_usuario'";
            mysqli_query($con, $update);

            $delete = "DELETE FROM $table WHERE $column='$id'";
            mysqli_query($con, $delete) or die (mysqli_error($con));
            echo "1";
        }

    }else{
        $delete = "DELETE FROM $table WHERE $column='$id'";

        mysqli_query($con, $delete) or die (mysqli_error($con));

        echo "1";
    }

    


    
?>