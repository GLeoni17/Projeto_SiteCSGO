<?php

function cabecalho(){
    session_start();
    //print_r($_SESSION);
    //die();
    $alt = $GLOBALS["alt"];
    $menu = $GLOBALS["menu"];

    include "conexao.php";

    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <link href='css/index.css' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
            <script src='./js/jquery-3.5.1.min.js'></script>
            <script src='./js/scripts.js'></script>
            </head>
        <body>                
            <nav class='navbar navbar-expand-md bg-primary navbar-dark'>
            <a href='index.php' class='navbar-brand logotipo'>
                <img src='img/logotipo.png' class='rounded' alt='$alt' />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class='navbar-toggler' type='button'
                data-toggle='collapse' data-target='#menu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='menu'>
                <ul class='navbar-nav'>
                    ";
                    if(isset($_SESSION["usuario"])){

                        $select = "SELECT permissao, nome FROM usuario WHERE id_usuario = '".$_SESSION["usuario"]."'";
                        $res = mysqli_query($con, $select);
                        $info = mysqli_fetch_assoc($res);

                        echo"<span>Bem vindo ".$info["nome"]."! </span>
                        <li role='presentation'>
                        <a href='perfil.php'> Perfil</a>
                        </li>
                        <li role='presentation' class='dropdown'>";
                        

                        if($info["permissao"] > 1){ // Precisa ser dono de time pra cima pra conseguir registrar um jogador novo
                            echo "
                            <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                            Cadastrar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>";

                            //echo "<li class='nav-item'>
                                //<a class='menu' href='form_jogador.php'>Jogador</a>
                               // </li>";

                            echo "<li class='nav-item'>
                                <a class='menu' href='form_time.php'>Time</a>
                                </li>";
                            
                            if($info["permissao"] > 2){ // Precisa ser organizador de campeonatos pra cima pra registrar um novo campeonato
                                echo "<li class='nav-item'>
                                <a class='menu' href='form_campeonato.php'>Campeonato</a>
                                </li>";
                            }
                        
                            /*foreach($menu as $i=>$l){
                                echo "<li class='nav-item'>
                                        <a class='menu' href='form_$i.php'>$l</a>
                                    </li>";
                            }*/

                            echo "</ul>
                            </li>";
                        }    

                        

                        echo "<li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                        Listar <span class='caret'></span>
                        </a>
                        <ul class='dropdown-menu'>";                        
                        foreach($menu as $i=>$l){
                            echo "<li class='nav-item'>
                                    <a class='menu' href='lista_$i.php'>$l</a>
                                </li>";
                        }  
                        echo "
                            </ul>
                            </li>
                            
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='logout.php'>Sair</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='correio.php'>✉</a>
                                </li>
                            </ul>
                        </li>
                        
                        ";
                        /*echo "<li>
                        <ul class='navbar-nav'>
                            <li role='presentation'>
                                <span>Bem vindo ".$info["nome"]."!</spam>
                            </li>
                        </ul>
                    </li>";*/
                    }else{
                        echo "<li role='presentation' class='dropdown'>
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='#' data-toggle='modal' data-target='#modal_cadastro'>Cadastro</a>
                                </li>
                                <li role='presentation'>
                                    <a href='#' data-toggle='modal' data-target='#modal_login'>Login</a>
                                </li>
                            </ul>
                        </li>

                        
                        ";
                    }

            echo "</ul>  
                    
            </div>        
        </nav>
        <main role='main' class='container'>";
        if(isset($_GET["erro"])){
            if($_GET["erro"] == 2){
                echo "<div id='erro'>Erro ao cadastrar. E-mail já cadastrado!</div>";
            }else if($_GET["erro"] == 3){
                echo "<div id='erro'>Voce não tem permissão para acessar essa pagina, contate um administrador!</div>";
            }
            else{
                echo "<div id='erro'>Erro na autenticação</div>";
            }
            
        }
        if(isset($_GET["cadastro"])){
            echo "<div id='sucesso'>Cadastrado com sucesso!</div>";
        }
        include "modal_login.php";
}

?>