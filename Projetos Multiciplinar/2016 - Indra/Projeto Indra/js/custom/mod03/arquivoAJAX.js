$(function () {

    
    
        


    $('#periodicidade-arquivos tbody ').on('click', 'button', function () {
        var botao = $(this).attr('botao');
        var id_selecionada = $(this).attr('pcd');

        

        if (botao === "atualizar") {

                $.ajax({
                    url: "ArquivoCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'pcd': id_selecionada,
                        'botao': 'atualizar'
                    },
                    success: function (data) {
                        $('#form-atualizar').html(data);
                        flag1 = false;


                    }
                });


        } else if (botao === "atualizar2") {

                $.ajax({
                    url: "ArquivoCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'pcd': id_selecionada,
                        'botao': 'atualizar2'
                    },
                    success: function (data) {
                        $('#form-atualizar2').html(data);



                    }
                });
            

        } else if (botao === "excluir") {

                $.ajax({
                    url: "ArquivoCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'pcd': id_selecionada,
                        'botao': 'excluir'
                    },
                    success: function (data) {
                        $('#form-excluir').html(data);

                    }
                });

        }
    });

});








