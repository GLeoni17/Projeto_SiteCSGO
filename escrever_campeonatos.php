<?php
    include "conexao.php";

    if(!isset($_SESSION["usuario"])){
        session_start();
    }

    $id_usuario = $_SESSION["usuario"];

    $select = "SELECT permissao FROM usuario WHERE id_usuario='$id_usuario'";

    $res2 = mysqli_query($con, $select);
    $res2 = mysqli_fetch_assoc($res2);
    $permissao = $res2["permissao"];

    $select = "SELECT * FROM campeonatos ORDER BY nome";    

    $res = mysqli_query($con, $select)
        or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){

        $id = $row["id_campeonato"];
        $cod_campeonato = $row["cod_usuario"];

        $id_campeonato = $row["id_campeonato"];

        

        $select2 = "SELECT *
                    FROM times_campeonato
                    WHERE cod_campeonato = '$id_campeonato'
                    ORDER BY times_campeonato.cod_campeonato";

        $res2 = mysqli_query($con, $select2);
        echo "<h2><b>".$row["nome"]."</b>"; 
        if($permissao==4|| $permissao==3 && $id_usuario == $cod_campeonato){ // So pode alterar o dado se for o dono do campeonato
            echo "<button class='alterar_campeonato' value='$id' data-toggle='modal' data-target='#modal'>✏️</button> 
            <button class='remover_campeonato' value='$id'>ˣ</button>";
        }
        echo "</h2><ul>";
        while($row2 = mysqli_fetch_assoc($res2)){
            echo "<li class='camp$id'>".$row2["nome_time"]."</li>";
        }
        echo "</ul>";
        echo"<br>";
    }
?>