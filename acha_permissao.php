<?php
    function retorna_permissao($id){
        include "conexao.php";
        $select = "SELECT permissao, nome FROM usuario WHERE id_usuario = '$id'";
        $res = mysqli_query($con, $select);
        $info = mysqli_fetch_assoc($res);
        return $info;
    }
?>
