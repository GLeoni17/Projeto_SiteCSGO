<?php
include "conf.php";
include "conexao.php";
include "verifica_permissao_acesso.php";

cabecalho();

verifica(2);

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
                nome= $("#nome").val();
                idade= $("#idade").val();
                posicao= $("#posicao").val();
                time= $("#times").val();
                $.post("insere_jogador.php", {"nome":nome, "idade":idade, "posicao":posicao, "time":time}, function(msg){
                });
            });
        });
    </script>
</head>
<body>
    <div class="flex">
        <form class="cadastro">
            <input type="text" id="nome" name="nome_jogador" placeholder="Nome do jogador..."><br><br>
            <input type="number" id="idade" name="idade_jogador" placeholder="Idade do jogador..."><br><br>
            <input type="text" id="posicao" name="posicao_jogador" placeholder="Posicao do jogador..."><br><br>
            <select id="times">
                <option label=".:Time do jogador:." >
                <br>

                <?php
                    $select = "SELECT * FROM times ORDER BY nome";
                    $res = mysqli_query($con, $select) or die(mysqli_error($con));
                    while($row = mysqli_fetch_assoc($res)){
                        $nome = $row["nome"];
                        $id = $row["id_time"];
                        echo "<option id='time' label='$nome' value='$id'>
                        <br>";
                    }
                ?>
                
            </select><br><br>
            <button id="cadastra">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
rodape();

?>