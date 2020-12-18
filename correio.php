<?php

include "conf.php";
include "conexao.php";

echo"<style>
    .container {
        position: relative;
    }
    
    .child {
        width: 300px;
        height: 100px;
        padding: 20px;
    
        position: absolute;
        top: 50%;
        left: 50%;
    
        margin: -70px 0 0 -170px;

        margin-top: 20px;
    }
</style>

";

cabecalho();

echo"<div class='container'>
        <div class='child'>
            ";

        if($_SESSION["mensagens"]==0){
            echo "<h4>Não há nenhuma mensagem!</h4>";
        }else{  
            $id = $_SESSION["usuario"];
            $permissao = $_SESSION["permissao"];

            $select = "SELECT titulo, conteudo, cod_remetente FROM correio WHERE id_usuario='$id'";
            $res = mysqli_query($con, $select);
            while($linha = mysqli_fetch_assoc($res)){

                echo "<h4>".$linha["titulo"]."</h4>";
                echo"<p>".$linha["conteudo"]."</p>";

                $remetente = $linha["cod_remetente"];
                
                $select = "SELECT nome, permissao FROM usuario WHERE id_usuario = '$remetente'";
                $res2 = mysqli_query($con, $select);
                $res2 = mysqli_fetch_assoc($res2);

                echo "<em>".$res2["nome"];

                if($res2["permissao"]==4){
                    echo "(admin)";
                }else if($res2["permissao"]==3){
                    echo "(organizador de campeonatos)";
                }else if($res2["permissao"]==2){
                    echo"(dono de time)";
                }else if($res2["permissao"]==1){
                    echo"(jogador)";
                }else{
                    echo"(apreciador)";
                }
                echo "</em><hr>";
            }
        }   

            echo"
        </div>
    </div>";

rodape();

?>