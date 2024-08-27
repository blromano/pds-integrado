$(document).ready(function() { 

    //Configurações do DataTables da página OrgaosColab-list.html
    $('#lista-imagem').DataTable({
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
        "targets": [2],
        "orderable": false
    }], 
	dom: 'Bfrtip',
		buttons: [
            {
                text: 'Nova Imagem',
                action: function ( e, dt, node, config ) {
                   $("#cadastra-imagem-modal").modal();
                }
            }
        ]    
});

    


});