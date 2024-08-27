$(document).ready(function() {

    //Configurações do DataTables da página Pesquisar Sensor.html


    //Configurações do DataTables da página Vincular Sensor.html
    $('#lista-sensores').DataTable({
        lengthChange: false,
        "language": {
        	"lengthMenu": "Mostrando _MENU_ itens por página",
        	"zeroRecords": "Nenhum item encontrado.",
        	"info": "Monstrando página _PAGE_ de _PAGES_",
        	"infoFiltered":   "(filtrado de _MAX_ total entries)",
        	"infoEmpty": "Nenhum item disponível ",
        	"infoFiltered": "(filtrado de _MAX_ itens)",
        	"search": "Procurar:",
        	"paginate": {
        		"first":      "Primeiro",
        		"last":       "Último",
        		"next":       "Próximo",
        		"previous":   "Anterior"
           },
       },
       "columnDefs": [ {
        "targets": [5,6],
        "orderable": false
    }],
	dom: 'Bfrtip',
		buttons: [
            {
                text: 'Novo Sensor',
                action: function ( e, dt, node, config ) {
                   $("#cadastrar-sensor-modal").modal();
                }

            }
        ]
});




    
});
