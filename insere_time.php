<?php
    include "conexao.php";
    $nome = $_POST["nome_time"];
    $id = $_POST["id"];

    $select = "SELECT cod_time FROM usuario WHERE id_usuario = '$id'";
    $res = mysqli_query($con, $select);
    $res = mysqli_fetch_assoc($res);

    if($res["cod_time"]!=0){

      echo "Voce ja possui um time! Caso quiser deleta-lo vá em \"Listar -> Times\" e delete.";

    }else{

      $select = "SELECT id_time FROM times WHERE nome = '$nome'";
      $res = mysqli_query($con, $select);

      if(mysqli_num_rows($res)>0){
        echo "Nome de time ja registrado!";
      }else{
          $query = "INSERT INTO times(
            nome
          ) VALUES (
            '$nome'  
          )";
          mysqli_query($con, $query); 

          $select = "SELECT id_time FROM times WHERE nome='$nome'";

          $res = mysqli_query($con, $select);

          $res = mysqli_fetch_assoc($res);

          $id_time = $res["id_time"];

          $query = "UPDATE usuario SET cod_time=$id_time WHERE id_usuario = '$id'";

          mysqli_query($con, $query) or die("Erro ao criar o time, contacte um administrador");

          echo "Time Registrado com sucesso!";
      }
    }
    
?>