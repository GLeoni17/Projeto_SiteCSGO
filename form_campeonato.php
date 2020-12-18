<?php
include "conf.php";
include "conexao.php";
include "verifica_permissao_acesso.php";

cabecalho();

verifica(3);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cadastra").click(function() {
                var nome = $("#nome").val();
                var checkbox_value = Array();
                var i=0;
                <?php
                echo "var id_usuario = ".$_SESSION["usuario"].";";
                ?>
                $("input[name='times[]']").each(function () {
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        checkbox_value[i] = $(this).val();
                        i++;
                    }
                });
                $.post("insere_campeonato.php", {"nome":nome, "checkbox_value":checkbox_value, "id_usuario":id_usuario}, function(msg){
                    if(msg == 1){
                        alert("Campeonato criado com sucesso.");
                    }else{
                        alert("Erro ao criar o campeonato.");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="flex">
        <div id="msg_campeonato"></div>
        <form class="cadastro">
            <input type="text" id="nome" name="nome_campeonato" placeholder="Nome do campeonato..."><br><br>
                <?php
                    $select = "SELECT * FROM times ORDER BY nome";
                    $res = mysqli_query($con, $select);
                    while($row = mysqli_fetch_assoc($res)){
                        if($row["id_time"]!=0){
                            echo "<br>";
                            echo "<input type='checkbox' name='times[]' value=".$row["nome"]."> ".$row["nome"]."<br>";
                        }
                    }
                ?><br><br>
            <button type="button" id="cadastra">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php

rodape();

?>