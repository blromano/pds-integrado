var editor;

$(document).ready(function () {
    //Configurações do DataTables da página OrgaosColab-list.html                   

    $('#list-orgs').DataTable({
        lengthChange: false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ itens por página",
            "zeroRecords": "Nenhum item encontrado.",
            "info": "Monstrando página _PAGE_ de _PAGES_",
            "infoFiltered": "(filtrado de _MAX_ total entries)",
            "infoEmpty": "Nenhum item disponível ",
            "infoFiltered": "(filtrado de _MAX_ itens)",
                    "search": "Procurar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            },
        },
        "columnDefs": [{
                "targets": [3, 4],
                "orderable": false
            }],
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Novo',
                action: function (e, dt, node, config) {
                    $("#modalCadastrar").modal();
                }
            }
        ]
    });

    //Configuração do DataTables da página Enviar Alertas - ListagemparaAdmin.html
    $('#Dados_Historicos').DataTable({
        lengthChange: false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ itens por página",
            "zeroRecords": "Nenhum item encontrado.",
            "info": "Monstrando página _PAGE_ de _PAGES_",
            "infoFiltered": "(filtrado de _MAX_ total entries)",
            "infoEmpty": "Nenhum item disponível ",
            "infoFiltered": "(filtrado de _MAX_ itens)",
                    "search": "Procurar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            },
        },
        "columnDefs": [{
                "targets": [7, 8],
                "orderable": false
            }]
    });
});