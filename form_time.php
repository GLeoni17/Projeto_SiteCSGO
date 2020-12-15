<?php
include "conf.php";
include "verifica_permissao_acesso.php";

cabecalho();


verifica(2);
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <link href='css/index.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
    <script>
        $(document).ready(function() {
            $("#cadastra").click(function() {
                var nome_time = $("#nome_time").val();
                <?php echo "var id = ".$_SESSION["usuario"].";"; ?>
                $.post("insere_time.php", {"nome_time":nome_time, "id":id}, function(msg){
                    alert(msg);
                });
            });
        });
    </script>
    <div class="flex">
        <form class="cadastro">
            <input type="text" id="nome_time" name="nome_time" placeholder="Nome do time..."><br><br>
            <button id="cadastra">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
rodape();

?>