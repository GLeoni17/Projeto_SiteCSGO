<script src ="js/jquery-3.5.1.min.js"></script>
<script src ="js/MD5.js"></script>
<script>
    $(function(){

        $(".autenticar").click(function(){
            var senha_md5 = $.md5($("input[name='senha']").val());
            $("input[name='senha']").val(senha_md5);
            $("#login").submit();
        });

        // Cadastro

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

        $("input[name='profissao']").click(function(){

          if($('input[name="profissao"]:checked').val() == "1"){
            document.getElementById("posicao").disabled = false;
            document.getElementById("posicao").required = false;
          }else{
            document.getElementById("posicao").disabled = true;
            document.getElementById("posicao").required = true;          
          }

        });

        $("input[name='alterar_profissao']").click(function(){

          if($('input[name="alterar_profissao"]:checked').val() == "1"){
            document.getElementById("alterar_posicao").disabled = false;
            document.getElementById("alterar_posicao").required = false;
          }else{
            document.getElementById("alterar_posicao").disabled = true;
            document.getElementById("alterar_posicao").required = true;          
          }

        });


    });

</script>

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="login" method="post" action="autenticacao.php">
          <input type="email" name="email" placeholder="Email..." required> <br><br>
          <input type="password" name="senha" placeholder="Senha..." required> <br><br>
        </form>
        <h6>Ainda não é cadastrado? <strong><a href="">Cadastre-se Aqui</a></strong></h6>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Cancelar</button>
        <button type="button" class="autenticar">Autenticar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro
        <?php
          if(isset($_SESSION["usuario"])){
            echo "Novo Jogador";
          }
        ?>
        
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cadastro" method="post" action="cadastro.php">
          <input type="text" name="nome" placeholder="Nome..." required> <br><br>
          <input type="email" name="email" placeholder="Email..." required> <br><br>
          <input type="password" name="senha_cadastro" placeholder="Senha..." required> <br><br>
          <input type="password" name="c_senha_cadastro" placeholder="Confirmar senha..." required> <span id="senha_errada"></span><br><br>

          <input type="hidden" name="senha_enviar" required>

          <input type="text" name="nickname" placeholder="Nome no jogo..." required><br><br>
          <input type="number" name="idade" placeholder="Idade" required> <br><br>

          <span> Voce é? </span><br>
          <?php
            if(isset($_SESSION["usuario"])){
              echo "<input type='radio' name='profissao' value='0' disabled> Apreciador<br>
              <input type='radio' name='profissao' value='1' checked> Jogador<br>
              <input type='radio' name='profissao' value='2' disabled> Dono de time<br>
              <input type='radio' name='profissao' value='3' disabled> Organizador de campeonato<br><br>
              <input id='posicao' type='text' name='posicao' placeholder='Posição que joga...'> <br><br>
              ";
            }else{
              echo "<input type='radio' name='profissao' value='0'> Apreciador<br>
              <input type='radio' name='profissao' value='1'> Jogador<br>
              <input type='radio' name='profissao' value='2'> Dono de time<br>
              <input type='radio' name='profissao' value='3'> Organizador de campeonato<br><br>
              <input id='posicao' type='text' name='posicao' placeholder='Posição que joga...' disabled> <br><br>
              ";
            }
          
          ?>        

          <input type="hidden" id="permissao" max="3">

          <div class="modal-footer">
            <button type="button" data-dismiss="modal">Cancelar</button>
            <button id="cadastrar" type="submit" class="cadastrar">Cadastrar</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

