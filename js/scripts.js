$(document).ready(function(){

    $(".remover_time").click(function(){

        i = $(this).val();
        t = "times";
        c = "id_time";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $("#time_removido").html("Time removido com sucesso.");
                $("button[value='"+ i + "']").closest("li").remove();
            }else{
                $("#time_removido").html("O time tem jogadores, tire os jogadores antes de tirar o time!");
            }
        });

    });

    $(".remover_jogador").click(function(){

        i = $(this).val();
        t = "jogadores";
        c = "id_jogador";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $("#jogador_removido").html("Jogador removido com sucesso.");
                $("button[value='"+ i + "']").closest("tr").remove();
            }
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

});