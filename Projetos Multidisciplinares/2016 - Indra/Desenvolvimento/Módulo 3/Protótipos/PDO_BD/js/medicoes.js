$(function () {


    $('#gerenciamento tbody ').on('click', 'button', function () {
        var teste = $(this).attr('operacao') === ('atualizar');

        if (teste) {
            var id_selecionada = $(this).attr('medicao');
            var sis_id = $(this).attr('sis');

            $.ajax({
                url: "MedicoesCTR.php",
                type: 'POST',
                dataType: 'text',
                data: {
                    'operacao': 'buscar-medicao',
                    'id': id_selecionada,
                    'sis-id' : sis_id
                },
                success: function (data) {
                    $('#form-atualizar').html(data);

                    $("#lista-medicoesalt").click(function () {
                        var id_selecionada = $(this).val();

                        $.post(
                                "MedicoesCTR.php",
                                {
                                    'tipo-sensor': '',
                                    'id-medicao': id_selecionada
                                },
                                function (data) {
                                    $("#sensoresalt").html(data);

                                    if (data === "") {
                                        $("#lista-sensoresalt").addClass("elemento-escondido");
                                    } else {
                                        $("#lista-sensoresalt").removeClass("elemento-escondido");


                                    }
                                });
                    });
                }
            });

        } else {
            $('#medicao').attr('value', $(this).attr('medicao'));
        }

    });

    $('#formIM').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dado: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    numeric: {
                        message: 'O dado deve ser numérico'
                    }
                }
            },
            data_hora: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    date: {
                        format: 'DD-MM-YYYY hh:mm:ss',
                        message: 'Data e hora inválida'
                    }
                }
            },
            tipo_medicao: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    }
                }
            }
        }
    });
    
    $('#form-data').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dataInicial: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'Formato Inválido'
                    }
                }
            },
            dataFinal: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'Formato Inválido'
                    }    
                }
            }
        }
    });

    $("#lista-medicoes").click(function () {
        var id_selecionada = $(this).val();

        $.post(
                "MedicoesCTR.php",
                {
                    'tipo-sensor': '',
                    'id-medicao': id_selecionada
                },
                function (data) {
                    $("#sensores").html(data);

                    if (data === "") {
                        $("#lista-sensores").addClass("elemento-escondido");
                    } else {
                        $("#lista-sensores").removeClass("elemento-escondido");
                    }

                });
    });

    function subsCaractere(stringOriginal, pesquisa, novoValor) {
        while (stringOriginal.indexOf(pesquisa) !== -1) {
            stringOriginal = stringOriginal.replace(pesquisa, novoValor);
        }
        return stringOriginal;
    }

    $('#buscarBtn').click(function () {
        var $datainicial = $('#dataInicial').val();
        var $datafinal = $('#dataFinal').val();

        $datainicial = subsCaractere(InverterData($datainicial), '-', '');
        $datafinal = subsCaractere(InverterData($datafinal), '-', '');


        if ($datainicial <= $datafinal) {
            return true;
        }

        alert('Data Inicial maior que Data Final');

        return false;

    });

    function InverterData(data) {
        // arr[0] = dia, arr[1] = mes, arr[2] = ano
        var arr = data.split("-");
        return arr[2] + "-" + arr[1] + "-" + arr[0];
    }

    $('#dataInicial').mask("99-99-9999", {placeholder: 'dd-mm-aaaa'});

    $('#dataFinal').mask("99-99-9999", {placeholder: 'dd-mm-aaaa'});

    $(".data-mascara").mask("99-99-9999 99:99:99");


    $('#gerenciamento').DataTable({
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
                "targets": [4, 5],
                "orderable": false
            }],
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Novo',
                action: function (e, dt, node, config) {
                    $("#modal-new").modal();
                }
            }
        ]
    });

    /*$("#buscarBtn").click(function () {
     
     var data = $('#form-data').serializeFormJSON();
     alert(data);
     $.ajax({
     url: "MedicoesPcd.php",
     dataType: 'json',
     data: data,
     success: function (data) {
     gerenciamento.clear().draw();
     for (var i = 0; i < data.length; i++) {
     gerenciamento.row.add([
     data[i].data_hora,
     data[i].dado,
     data[i].nome,
     data[i].sensor
     ]).draw();
     }
     }
     });
     alert("dnsdjfndsjf");
     return false;
     });*/

    function MostrarDados(data) {
        var buffer = "";

        $.each(data, function (dado) {
            buffer += GerarLinha(dado);
        });

        $("#conteudo-tabela").html(buffer);
    }

    function GerarLinha(dado) {
        var linha =
                "<tr>" +
                "<td>:data_hora</td>" +
                "<td>:nome</td>" +
                "<td>:sensor</td>" +
                "<td>:dado</td>" +
                '<td><button class="btn btn-primary btn-table" data-toggle="modal" data-target="#modal-edit" >Editar</button></td>' +
                '<td><button class = "btn btn-primary btn-table" data-toggle = "modal" data-target = "#modal-del">Excluir</button></td>' +
                "</tr>";

        linha = linha.replace(":data_hora", dado['data_hora']);
        linha = linha.replace(":nome", dado['nome']);
        linha = linha.replace(":sensor", dado['sensor']);
        linha = linha.replace(":dado", dado['dado']);

        return linha;
    }

});

$(document).ready(function () {
    $('#data-criacao').datetimepicker();

    $('#datetimePicker').on('dp.change dp.show', function (e) {
        $('#meetingForm').formValidation('revalidateField', 'meeting');
    });
    
    

});