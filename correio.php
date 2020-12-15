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

$id = $_SESSION["usuario"];


echo"<div class='container'>
        <div class='child'>
            <h3>Under construction!</h3>
        </div>
    </div>";

rodape();

?>