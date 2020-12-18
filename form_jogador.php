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
    $(function(){
        $("input[name='c_senha_cadastro']").blur(function(){
            var senha = $("input[name='senha_cadastro']").val();
            var confirma_senha = $("input[name='c_senha_cadastro']").val();
            if(senha != confirma_senha){
              $("#senha_errada").html("As senhas não condizem");
              document.getElementById("cadastrar").disabled = true;
            }else{
              var senha_md5 = $.md5($("input[name='senha_cadastro']").val());
              $("input[name='senha_enviar']").val(senha_md5);
              document.getElementById("cadastrar").disabled = false;
            }
        });

        $("input[name='c_senha_cadastro']").keyup(function(){
          $("#senha_errada").html("");
        });
    }); 
    </script>
</head>
<body>
    <div class="flex">
    <form id="cadastro" method="post" action="cadastro.php">
          <input type="text" name="nome" placeholder="Nome..." required> <br><br>
          <input type="email" name="email" placeholder="Email..." required> <br><br>
          <input type="password" name="senha_cadastro" placeholder="Senha..." required> <br><br>
          <input type="password" name="c_senha_cadastro" placeholder="Confirmar senha..." required> <span id="senha_errada"></span><br><br>

          <input type="text" name="senha_enviar" required>

          <input type="text" name="nickname" placeholder="Nome no jogo..." required><br><br>
          <input type="number" name="idade" placeholder="Idade" required> <br><br>

          <span> Voce é? </span><br>
          <input type="radio" name="profissao" value="0" disabled> Apreciador<br>
          <input type="radio" name="profissao" value="1" checked> Jogador<br>
          <input type="radio" name="profissao" value="2" disabled> Dono de time<br>
          <input type="radio" name="profissao" value="3" disabled> Organizador de campeonato<br><br>

          <input id='posicao' type='text' name='posicao' placeholder='Posição que joga...'> <br><br>

          <input type="hidden" id="permissao" max="3">

          <div class="modal-footer">
            <button type="button" data-dismiss="modal">Cancelar</button>
            <button id="cadastrar" type="submit" class="cadastrar">Cadastrar</button>
          </div>

        </form>
    </div>
</body>
</html>

<?php
rodape();

?>