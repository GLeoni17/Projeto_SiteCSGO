<?php

include "conexao.php";

$id_usuario =$_POST["id_usuario"];
$nickname = $_POST["nickname"];
$posicao = $_POST["posicao"];

$update = "UPDATE usuario SET nickname='$nickname', posicao='$posicao' WHERE id_usuario='$id_usuario'";

mysqli_query($con, $update);

echo "1";

?>