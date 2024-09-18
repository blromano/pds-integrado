$(document).ready(function() { 

    $('#pcds').DataTable({
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
        "targets": [3,4],
        "orderable": false
    }]     
	});
	
	$('#sensores-tabela').DataTable({
             responsive: true,
             lengthChange: false,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ itens por página",
                    "zeroRecords": "Nenhum item encontrado.",
                    "info": "Monstrando página _PAGE_ de _PAGES_",
                    "infoFiltered": "(filtrado de _MAX_ total entries)",
                    "infoEmpty": "Nenhum item disponível ",
                    "search": "Procurar:",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                }
            },
            "columnDefs": [{
                "targets":[4,5],
                "orderable": false
            }]
        });
		
		
	$('#medicoes').DataTable({
             lengthChange: false,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ itens por página",
                    "zeroRecords": "Nenhum item encontrado.",
                    "info": "Monstrando página _PAGE_ de _PAGES_",
                    "infoFiltered": "(filtrado de _MAX_ total entries)",
                    "infoEmpty": "Nenhum item disponível ",
                    "search": "Procurar:",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                }
            },
            "columnDefs": [{
                "targets": [2],
                "orderable": false
            }]
        });
		
});
	


