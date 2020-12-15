<?php
    function verifica($perm) {
        //session_start();

        if(isset($_SESSION["usuario"])){

            include "conexao.php";

            $select = "SELECT permissao, nome FROM usuario WHERE id_usuario = '".$_SESSION["usuario"]."'";
            $res = mysqli_query($con, $select);
            $info = mysqli_fetch_assoc($res);

            //echo "".$info["permissao"]."";

            if($perm > $info["permissao"]){
                header("location:index.php?erro=3");
            }

        }else{
            header("location:index.php?erro=3");
        }
    }
?>