<?php

include "conf.php";
include "conexao.php";
include "verifica_permissao_acesso.php";

cabecalho();


verifica(0);

echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
      <div id='msg'></div>";

    echo "<div id='tbody_campeonato'>";

    include "escrever_campeonatos.php";

    echo "</div>";

    $titulo = "Alterar Campeonato";
    $nome_form = "alterar_campeonato.php";
    include "modal.php";
        
    include "scripts_campeonato.php"; 
    rodape();

?>