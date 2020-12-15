<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $id_usuario = $_POST["id_usuario"];

    $select = "SELECT usuario.nickname as nickname, usuario.nome as nome, usuario.idade as idade, 
    usuario.posicao as posicao, times.nome as nome_time FROM usuario INNER JOIN times ON usuario.cod_time=times.id_time";

    if(isset($_GET["method"])){
        $select.= " WHERE usuario.permissao='1'";
    }else{
        $select.= " WHERE id_usuario='$id_usuario'";
    }

    $resultado = mysqli_query($con,$select)
        or die(mysqli_error($con));

    $linha = mysqli_fetch_assoc($resultado);

    echo json_encode($linha);
?>