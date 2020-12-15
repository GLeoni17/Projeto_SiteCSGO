<?php
    include "conf.php";
    include "conexao.php";
    include "verifica_permissao_acesso.php";

    cabecalho();


    verifica(0);

    echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
          <div id='msg'></div>
          <h2> Times </h2><br>
          <ul id='tbody_time'>";

    $select = "SELECT * FROM times ORDER BY nome";
    $res = mysqli_query($con, $select) or die(mysqli_error($con));

    $id_usuario = $_SESSION["usuario"];

    $select = "SELECT permissao, cod_time FROM usuario WHERE id_usuario = '$id_usuario'";
    $res2 = mysqli_query($con, $select);
    $res2 = mysqli_fetch_assoc($res2);
    $permissao = $res2["permissao"];

    while($row = mysqli_fetch_assoc($res)){
        $nome = $row["nome"];
        $id = $row["id_time"];
        if($id != 0){

            echo "<li><h4><strong>$nome</strong>";
            if($permissao==4 || $res2["cod_time"] == $id){ // So pode alterar o dado se for o jdono do time
                    echo"<button class='alterar_time' value='$id' data-toggle='modal' data-target='#modal'>✏️</button> 
                         <button class='remover_time' value='$id'>ˣ</button>";
            }
              echo"</h4></li>";
            
        }
    }
    echo "</ul>";


$titulo = "Alterar Time";
$nome_form = "alterar_time.php";
include "modal.php";
    
include "scripts_time.php";    
rodape();

?>