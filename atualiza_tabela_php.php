<?php

//$dados = $_POST["json_enviar"];

$id_jogador = $_POST["id_jogador"];
$nome_jogador = $_POST["nome_jogador"];
$idade_jogador = $_POST["idade_jogador"];
$posicao_jogador = $_POST["posicao_jogador"];
$id_time = $_POST["id_time"];
$nome_time = $_POST["nome_time"];

echo"<tr>
        <td class='com_borda'>".$nome_jogador."</td>;
        <td class='com_borda'>".$idade_jogador."</td>;
        <td class='com_borda'>".$posicao_jogador."</td>;
        <td class='com_borda'>".$nome_time."</td>;
        <td><button class='alterar_jogador' value='".$id_jogador."' data-toggle='modal' data-target='#modal'>✏️</button><td> ;
        <td><button class='remover_jogador' value='".$id_jogador."'>X</button></td>;
        </tr>";

?>