$(document).ready(function () {

    //Configurações do DataTables
    $('#list-bifuncional').DataTable({
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
                "targets": 6,
                "orderable": false
            }]
    });
    $('#list-PCD').DataTable({
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
                "targets": 5,
                "orderable": false
            }]
    });
    $('#PCD-Comparada').DataTable({
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
                "targets": 5,
                "orderable": false
            }]
    });
    $('#grphlin').DataTable({
        lengthChange: false,
        "searching": false,
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
    });
    $('#grphbar').DataTable({
        lengthChange: false,
        "searching": false,
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
    });
    $('#DadosCadastrais').DataTable({
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
    });
    $('#DadosSensores').DataTable({
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
    });
    $('#alertas').DataTable({
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
    });
	$('#tabelaComparacao').DataTable({
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
    });
	$('#tableDadoCadatrais').DataTable({
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
    });
});