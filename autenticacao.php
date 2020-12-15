<?php
    session_start();

    if(!empty($_POST)){

        include "conexao.php";

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $select = "SELECT id_usuario FROM usuario WHERE email='$email' AND senha='$senha'";

        $resultado = mysqli_query($con, $select) or die(mysqli_error($con));        

        if(mysqli_num_rows($resultado)=="1"){
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION["usuario"] = $linha["id_usuario"];
            header("location:index.php");
        }else{
            header("location:index.php?erro=1");
        }
    }
?>