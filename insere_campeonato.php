<?php 
    include "conexao.php";

    $nome = $_POST["nome"];
    $checkbox_value = $_POST["checkbox_value"];
    $id_usuario = $_POST["id_usuario"];

    $select = "SELECT id_campeonato FROM campeonatos WHERE nome = '$nome'";
    $res = mysqli_query($con, $select);


    if(mysqli_num_rows($res)>0){
        echo "2";
    }else{
        echo "1";
        $query = "INSERT INTO campeonatos (nome, cod_usuario) VALUES ('$nome', '$id_usuario')";

        mysqli_query($con, $query);

        $query = "SELECT id_campeonato FROM campeonatos WHERE nome like '$nome'";
        $res = mysqli_query($con, $query);
        $id_campeonato = mysqli_fetch_assoc($res);

        foreach($checkbox_value as $id){
            $insert = "INSERT INTO times_campeonato (
                                                        nome_time,
                                                        cod_campeonato
                                                    ) VALUES (
                                                        '$id',
                                                        '".$id_campeonato["id_campeonato"]."'
                                                    )";
            mysqli_query($con, $insert);
        }
    }

?>