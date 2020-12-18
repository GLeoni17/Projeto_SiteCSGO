<?php
include "conf.php";
include "conexao.php";
include "verifica_permissao_acesso.php";

cabecalho();


verifica(0);

echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
      <div id='msg'></div>
      <div class='flex'>
      ";

echo "<div id='tbody_jogador'>
<table>
    <tr>
        <th class='com_borda'>Nickname</th>
        <th class='com_borda'>Nome</th>
        <th class='com_borda'>Idade</th>
        <th class='com_borda'>Posição</th>
        <th class='com_borda'>Time</th>
    </tr>
";


$select = "SELECT usuario.id_usuario as id, usuario.nickname as nickname, usuario.nome as nome, usuario.idade as idade, usuario.posicao as posicao, 
            times.id_time as id_time, times.nome as nome_time 
            FROM usuario INNER JOIN times ON usuario.cod_time=times.id_time WHERE permissao = '1' ORDER BY nickname";

/*
$select = "SELECT jogadores.id_jogador as id_jogador, jogadores.nome as nome_jogador, jogadores.idade as idade_jogador, jogadores.posicao as posicao_jogador, times.id_time as id_time, times.nome as nome_time
           FROM jogadores INNER JOIN times ON (jogadores.cod_time = times.id_time)
           ORDER BY nome_jogador";*/


$res = mysqli_query($con, $select) or die(mysqli_error($con));

$id_usuario = $_SESSION["usuario"];

$select = "SELECT permissao, cod_time FROM usuario WHERE id_usuario = '$id_usuario'";

$resultado = mysqli_query($con,$select);
$resultado = mysqli_fetch_assoc($resultado);


while($row = mysqli_fetch_assoc($res)){
    $id = $row["id"];
    $id_atual = $_SESSION["usuario"];
    $nickname = $row["nickname"];
    $nome = $row["nome"];
    $idade = $row["idade"];
    $posicao = $row["posicao"];
    $time = $row["nome_time"];

    $id_time = $row["id_time"];

    echo "<tr>
            <td class='com_borda'>$nickname</th>
            <td class='com_borda'>$nome</td>
            <td class='com_borda'>$idade</td>
            <td class='com_borda'>$posicao</td>
            <td class='com_borda'>$time</td>";
        if($_SESSION["permissao"]==4 || ($id_time!=0 && ($resultado["permissao"]==2 && $id_time == $resultado["cod_time"])) ){ // So pode alterar o dado se for o jogador
            echo "<td><button class='alterar_jogador' value='$id' data-toggle='modal' data-target='#modal'>✏️</button><td> 
            <td><button class='remover_jogador' value='$id'>X</button></td>";
        }

          echo"</tr>";
}

echo "</table>";

echo "</div>
</div>";

$titulo = "Alterar Jogador";
$nome_form = "alterar_jogador.php";
include "modal.php";
    
include "scripts_jogador.php";    
rodape();

?>