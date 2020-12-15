<script>

    $(function(){

       var id_campeonato; 

       function define_alterar_remover(){ 
       
        $(".alterar_campeonato").click(function(){

            id_campeonato = $(this).val();
            
            $.get("seleciona_campeonato.php", {"id_campeonato": id_campeonato},function(r){
                a = r[0];
                $("input[name='nome_campeonato']").val(a.nome);
            });
        });

        $(".remover_campeonato").click(function(){

            i = $(this).val();
            t = "times_campeonato";
            c = "cod_campeonato";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $(".camp"+i).remove();
                }
            });

            t = "campeonatos";
            c = "id_campeonato";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#campeonato_removido").html("Campeonato removido com sucesso.");
                    $("button[value='"+ i + "']").closest("h2").remove();
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){

           console.log(id_campeonato);

           p = {
                id_campeonato:id_campeonato,
                nome:$("input[name='nome_campeonato']").val(),
           };
           
           
           $.post("atualizar_campeonato.php", p ,function(r){
               console.log(r);
            if(r=='1'){
                $("#msg").html("Campeonato alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o campeonato.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("escrever_campeonatos.php",function(r){
            t = "";
            t+= r;       
            $("#tbody_campeonato").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




