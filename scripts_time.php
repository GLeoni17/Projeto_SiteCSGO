
<script>

    $(function(){

       var i; 

       function define_alterar_remover(){ 
       
        $(".alterar_time").click(function(){

            i = $(this).val();
            
            $.get("seleciona_time.php", {"id_time": i},function(r){
                a = r[0];                            
                $("input[name='nome_time']").val(a.nome);
            });
        });

        $(".remover_time").click(function(){

            i = $(this).val();
            t = "times";
            c = "id_time";
            p = {tabela:t, id:i, coluna:c, remover_time:1};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#msg").html("Time removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("O time tem jogadores, tire os jogadores antes de tirar o time!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                id_time:i,
                nome:$("input[name='nome_time']").val(),
           };        
           
           $.post("atualizar_time.php", p ,function(r){
            if(r=='1'){
                $("#msg").html("Time alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o time.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_time.php",function(r){
            t = "";
            <?php
                $id_usuario = $_SESSION["usuario"];
                $select = "SELECT cod_time FROM usuario WHERE id_usuario='$id_usuario'";
                $res = mysqli_query($con, $select);
                $res = mysqli_fetch_assoc($res);
                echo "var permissao = ".$_SESSION["permissao"].";
                var cod_time = ".$res["cod_time"].";";
            ?>
            $.each(r,function(i,a){  
                if(a.id_time != 0){
                    t += "<li><h4>";             
                    t += a.nome;
                    if(permissao==4 || a.id_time == cod_time){
                        t += "<button class='alterar_time' value="+a.id_time+" data-toggle='modal' data-target='#modal'>✏️</button> ";
                        t += "<button class='remover_time' value="+a.id_time+">ˣ</button>";
                    }                    
                    t += "</h4></li>";
                }     
            });           
            $("#tbody_time").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




