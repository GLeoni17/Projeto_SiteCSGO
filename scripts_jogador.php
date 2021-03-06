<script>

    $(function(){

       var id_usuario, id_time; 

       function define_alterar_remover(){ 
       
        $(".alterar_jogador").click(function(){

            id_usuario = $(this).val();            
            
            $.get("seleciona_jogador.php", {"id_usuario": id_usuario},function(r){
                //console.log(r);
                $("input[name='nickname_alterar']").val(r[0].nickname);
                $("input[name='posicao_alterar']").val(r[0].posicao);                            
                $("input[name='nome_time']").val(r[0].nome_time);
            });
        });

        $(".remover_time").click(function(){

            i = $(this).val();
            t = "jogadores";
            c = "id_usuario";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#msg").html("Jogador removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("Erro ao remover o jogador!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){
           
           p = {
                id_usuario:id_usuario,
                nickname:$("input[name='nickname_alterar']").val(),
                posicao:$("input[name='posicao_alterar']").val(),
           };
           
           $.post("atualizar_jogador_modal.php", p ,function(r){
            if(r=='1'){
                $("#msg").html("Jogador alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o jogador.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_jogador.php",{"method":1, "id_usuario":id_usuario}, function(r){

            <?php
                    echo "var permissao = ".$_SESSION["permissao"].";";
                    echo "var cod_time = ".$_SESSION["cod_time"].";"
            ?>


            console.log(permissao);
            console.log(cod_time);
            
            t = "";
            t+= "<table>";
            t+=     "<tr>";
            t+=         "<th class='com_borda'>Nome</th>";
            t+=         "<th class='com_borda'>Idade</th>";
            t+=         "<th class='com_borda'>Posição</th>";
            t+=         "<th class='com_borda'>Time</th>";
            t+=     "</tr>";
            $.each(r,function(i,a){  
                
                t+= "<tr>"
                t+=     "<td class='com_borda'>"+a.nickname+"</td>";
                t+=     "<td class='com_borda'>"+a.idade+"</td>";
                t+=     "<td class='com_borda'>"+a.posicao+"</td>";
                t+=     "<td class='com_borda'>"+a.nome_time+"</td>";
                
                if(permissao==4 || (a.id_time!=0 && (permissao==2 && a.id_time == cod_time))){
                    t+=     "<td><button class='alterar_jogador' value='$id' data-toggle='modal' data-target='#modal'>✏️</button><td> ";
                    t+=     "<td><button class='remover_jogador' value='$id'>X</button></td>";
                }
                
                t+= "</tr>";
                // Fazer um metodo post pra escrever    
            });
            t+= "</table>"           
            $("#tbody_jogador").html(t);
            define_alterar_remover();
        });
        }

    });

</script>