$(document).ready(function(){
    $('#tableDadoCadatrais tbody').on('click', 'button.btn-sensor', function(){
        var idPCD = this.id;
        $.ajax({
            url: "class/listarSensores.php",
            method:"POST",
            dataType:"json",
            data:{
                idPCD: idPCD
            },
            success: function(data){
                var html = "";
                for (var i = 0; i < data.length; i++) {
                    html = html + '<ul class="list-group">';
                    html = html + '<li class="list-group-item"> <label>' + data[i].tipoSensor + '</label><br><label>Unidade de Medida:</label> ' + data[i].desc + '</li>'; 

                    html = html + '<ul class="list-group">';
                }
                $('#corpoModal').html(html);
            }

            });
    });
});