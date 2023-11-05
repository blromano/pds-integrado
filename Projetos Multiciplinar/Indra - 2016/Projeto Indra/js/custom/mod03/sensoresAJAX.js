$(function() {


    $('#sensores-tabela tbody ').on('click', 'button', function () {
            var botao = $(this).attr('botao');
            var id_selecionada = $(this).attr('sensor');
            
            if(botao === "atualizar"){

                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'atualizar'
                    },
                    success: function (data) {
                        $('#form-atualizar').html(data);    
                    }
                });
                
            }else if(botao === "habilitar"){
                
                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'habilitar'
                    },
                    success: function (data) {
                        $('#form-habilitar').html(data);    
                    }
                });
                
            }else if(botao === "desabilitar"){
                
                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'desabilitar'
                    },
                    success: function (data) {
                        $('#form-desabilitar').html(data);    
                    }
                });    
            }
        
    });

    
    
    
    
    
});





























