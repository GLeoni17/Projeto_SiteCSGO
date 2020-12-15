<?php
    include "conexao.php";
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $posicao = $_POST["posicao"];
    $time = $_POST["time"];
    $query = "INSERT INTO jogadores(
                            nome,
                            idade,
                            posicao,
                            cod_time
                          ) VALUES (
                            '$nome',
                            '$idade',
                            '$posicao',
                            '$time'  
                          )";
    mysqli_query($con, $query) or die(mysqli_error($con));    
?>
<!DOCTYPE html>
<script>
    window.location.href = "index.php";
</script>
</html>
