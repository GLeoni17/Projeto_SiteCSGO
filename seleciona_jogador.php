<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $id_usuario = $_GET["id_usuario"];

    $select = "SELECT usuario.nickname as nickname, usuario.nome as nome, usuario.idade as idade, 
    usuario.posicao as posicao, times.id_time as id_time, times.nome as nome_time FROM usuario INNER JOIN times ON usuario.cod_time=times.id_time";

    if(isset($_GET["method"])){
        $select.= " WHERE usuario.permissao='1'"; // Pega todos os jogadores para atualizar a tabela
    }else{
        $select.= " WHERE id_usuario='$id_usuario'"; // Pega para o modal
    }

    //die($select);

    $resultado = mysqli_query($con,$select)
        or die(mysqli_error($con));

    while($row = mysqli_fetch_assoc($resultado)){
        $matriz[] = $row;
    }

    echo json_encode($matriz);
?>