<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha_enviar"];
    $posicao = $_POST["posicao"];
    $idade = $_POST["idade"];
    $nickname = $_POST["nickname"];
    $permissao_requerida = $_POST["profissao"];

    $select = "SELECT * FROM usuario WHERE email like '%$email%'";

    $res = mysqli_query($con, $select);

    if(mysqli_num_rows($res) == 1){
        header("location:index.php?erro=2");
    }else{
        $insert = "INSERT INTO usuario(
                                    email,
                                    senha,
                                    nome,
                                    posicao,
                                    permissao,
                                    idade,
                                    nickname,
                                    permissao_requerida,
                                    cod_time                    
                                ) VALUES (
                                    '$email', 
                                    '$senha', 
                                    '$nome',
                                    '$posicao',
                                    '0',
                                    '$idade',
                                    '$nickname',
                                    '$permissao_requerida',
                                    '0'
                                )";
        
        mysqli_query($con,$insert);
        header("location:index.php?cadastro=1");
    }

?>