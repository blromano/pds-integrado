$(document).ready(function() {

    $(".phone").mask("(99)9999-9999");

    var emailEditar;

    $('#formCriar').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome: {
                validators: {
                    notEmpty: {
                        message: 'O nome deve ser preenchido'
                    },
                }
            },
            contato: {
                validators: {
                    notEmpty: {
                        message: 'O contato deve ser preenchido'
                    },
                    phone: {
                        country: 'BR',
                        message: 'Contato invalido'
                    }
                }
            },
            email: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'O email deve ser preenchido'
                    },
                    emailAddress: {
                        message: 'O e-mail preenchido não é válido'
                    },
                    remote: {
                        message: 'Email já existente',
                        url: 'class/orgaosColab/checarEmailOrgExiste.php',
                        type: 'POST',
                        delay: 500
                    }
                }
            }
        }
    });

    $('#formEditar').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome: {
                validators: {
                    notEmpty: {
                        message: 'O nome deve ser preenchido'
                    },
                }
            },
            contato: {
                validators: {
                    notEmpty: {
                        message: 'O contato deve ser preenchido'
                    },
                    phone: {
                        country: 'BR',
                        message: 'Contato invalido'
                    }
                }
            },
            email: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'O e-mail deve ser preenchido'
                    },
                    emailAddress: {
                        message: 'O e-mail preenchido não é válido'
                    },
                    remote: {
                        message: 'Email já existente',
                        data: function(validator, $field, value) {
                            return {
                                email: validator.getFieldElements('email').val(),
                                emailAntigo: emailEditar
                            };
                        },
                        url: 'class/orgaosColab/checarEmailOrgExisteEditar.php',
                        type: 'POST',
                        delay: 500
                    }
                }
            }
        }
    });

    var t = $('#list-orgs').DataTable({
        lengthChange: false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ itens por página",
            "zeroRecords": "Nenhum item encontrado.",
            "info": "Monstrando página _PAGE_ de _PAGES_",
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
        buttons: [{
            text: 'Novo',
            action: function(e, dt, node, config) {
                $('#modalCadastrar').modal();
                $('#modalCadastrar').trigger('next.m.1');
            }
        }]
    });

    $.fn.serializeFormJSON = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name][o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };


    function listarOrgs() {
        $.ajax({
            dataType: 'json',
            url: 'class/orgaosColab/listarOrgs.php',
            success: function(data) {
                if (data.length > 0) {
                    t.clear().draw();
                    for (var i = 0; i < data.length; i++) {
                        t.row.add([
                            data[i].nome,
                            data[i].contato,
                            data[i].email,
                            "<button value=\"{&quot;id&quot;:&quot;" + data[i].id + "&quot;,&quot;nome&quot;:&quot;" + data[i].nome +
                            "&quot;,&quot;email&quot;:&quot;" + data[i].email + "&quot;,&quot;contato&quot;:&quot;" + data[i].contato +
                            "&quot;}\" class=\"btn btn-primary btn-table btn-editar\" data-toggle=\"modal\" data-target=\"#modalEditar\">Editar</button>",
                            "<button value=\"" + data[i].id + "\" class=\"btn btn-primary btn-table btn-deletar\" data-toggle=\"modal\"" +
                            "data-target=\"#modalDeletar\">Excluir</button> "
                        ]).draw();
                    }
                }
            }
        });
    }

    listarOrgs();

    $('#cadastrar-sim').click(function() {
        $('#formCriar').data('formValidation').validate();
		var org = $('#formCriar').serializeFormJSON();
        if ($('#formCriar').data('formValidation').isValid()) {
            $.ajax({
                method: 'POST',
                url: 'class/orgaosColab/createOrgs.php',
                data: org,
                success: function(data) {
                    $('#formCriar').data('formValidation').resetForm();
                    if (data) {
                        $('#modalCadastrar').trigger('next.m.2');
                        listarOrgs();
                    } else $('#modalCadastrar').trigger('next.m.3');
                }
            });
        }
    });

    //Reseta o formulário quando fecha o modal
    $('#modalCadastrar').on('hide.bs.modal', function() {
        document.getElementById("formCriar").reset();
        $('#formCriar').data('formValidation').resetForm();
    })


    $('#list-orgs tbody').on('click', 'button.btn-editar', function(){
        var x = true;
        $('#modalEditar').trigger('next.m.1');
        var oc = jQuery.parseJSON($(this).val());
        $('#nomeEditar').val(oc.nome);
        $('#contatoEditar').val(oc.contato);
        $('#emailEditar').val(oc.email);
        $('#idEditar').val(oc.id);

        emailEditar = oc.email;

        $('#formEditar').data('formValidation').validate();

        $('#editar-sim').click(function() {
            if (x) {
                var org = $('#formEditar').serializeFormJSON();
                if($('#formEditar').data('formValidation').isValid() || $('#formEditar').data('formValidation').isValid() == null) {
                    $.ajax({
                        method: 'POST',
                        url: 'class/orgaosColab/editarOrgs.php',
                        data: org,
                        success: function(data) {
                            if (data) {
                                $('#modalEditar').trigger('next.m.2');
                                listarOrgs();
                            } else
                                $('#modaleditar').trigger('next.m.3');
                            x = false;
                        }
                    });
                }
            }
        });
    });

    $('#modalEditar').on('hide.bs.modal', function() {
        $('#formEditar').data('formValidation').resetForm();
    })

    $('#list-orgs tbody').on('click', 'button.btn-deletar', function() {
        var x = true;
        $('#modalDeletar').trigger('next.m.1');
        var id = $(this).val();
        $('#deletar-sim').click(function() {
            if (x) {
                $.ajax({
                    type: 'POST',
                    url: 'class/orgaosColab/deletarOrgs.php',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data) {
                            $('#modalDeletar').trigger('next.m.2');
                            t.clear().draw();
                            listarOrgs();
                        } else $('#modaleditar').trigger('next.m.3');
                        x = false;
                    }
                });
            }

        });

    });
});
