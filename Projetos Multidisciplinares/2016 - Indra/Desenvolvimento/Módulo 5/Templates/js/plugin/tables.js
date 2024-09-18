$(document).ready(function() { 
               
    //Configuração do DataTables da página Enviar Alertas - ListagemparaAdmin.html
    $('#Listagem_Admin').DataTable({
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
            "targets": [7,8],
            "orderable": false
        }]     
    });
    
});