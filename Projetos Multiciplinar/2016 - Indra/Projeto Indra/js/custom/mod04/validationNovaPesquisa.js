$(document).ready(function () {

    (function ($) {
        FormValidation.Validator.verificarBarras = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');

                splitFinal = datafinal.split('/');

                if ((splitFinal.length > 3) || (splitInicial.length > 3))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarDia = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[0] > 31) || (splitInicial[0] > 31))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarMes = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[1] > 12) || (splitInicial[1] > 12))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarAno = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[2] < 2000) || (splitInicial[2] < 2000))
                    return false;
                return true;
            }
        };
    }(window.jQuery));


    (function ($) {
        FormValidation.Validator.verificarTamanhoDataInicial = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                tamanhoinicial = datainicial.length;
                tamanhofinal = datafinal.length;

                if (((tamanhoinicial < 10) || (tamanhofinal < 10)) && (tamanhoinicial != 0))
                    return false;
                return true;

            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarDataInicial = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

//                alert(datainicial);
//                alert(datafinal);

//                splitInicial = datainicial.split('-');
//                novadatainicial = splitInicial[1] + "/" + splitInicial[2] + "/" + splitInicial[0];
//                datainicial_americana = new Date(novadatainicial);

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];
                datainicial_americana = new Date(novadatainicial);

//                splitFinal = datafinal.split('-');
//                novadatafinal = splitFinal[1] + "/" + splitFinal[2] + "/" + splitFinal[0];
//                datafinal_americana = new Date(novadatafinal);

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];
                datafinal_americana = new Date(novadatafinal);

//                alert(new Date(datainicial_americana));
//                alert(new Date(datafinal_americana));

                if (datainicial_americana > datafinal_americana)
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarTamanhoDataFinal = {
            validate: function (validator, $field, options) {

                var datafinal = $field.val();
                var datainicial = validator.getFieldElements('datainicial').val();

                tamanhoinicial = datainicial.length;
                tamanhofinal = datafinal.length;

                if (((tamanhoinicial < 10) || (tamanhofinal < 10)) && (tamanhofinal != 0))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarDataFinal = {
            validate: function (validator, $field, options) {

                var datafinal = $field.val();
                var datainicial = validator.getFieldElements('datainicial').val();

//                alert(datainicial);
//                alert(datafinal);

//                splitInicial = datainicial.split('-');
//                novadatainicial = splitInicial[1] + "/" + splitInicial[2] + "/" + splitInicial[0];
//                datainicial_americana = new Date(novadatainicial);

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];
                datainicial_americana = new Date(novadatainicial);

//                splitFinal = datafinal.split('-');
//                novadatafinal = splitFinal[1] + "/" + splitFinal[2] + "/" + splitFinal[0];
//                datafinal_americana = new Date(novadatafinal);

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];
                datafinal_americana = new Date(novadatafinal);

//                alert(new Date(datainicial_americana));
//                alert(new Date(datafinal_americana));

                if (datainicial_americana > datafinal_americana)
                    return false;
                return true;
            }
        };
    }(window.jQuery));

//    (function ($) {
//        FormValidation.Validator.verificarValor = {
//            validate: function (validator, $field, options) {
//                var valorMin = $field.val();
//                var valorMax = validator.getFieldElements('valorMax').val();
//                if (valorMax < valorMin)
//                    return false;
//                return true;
//            }
//        };
//    }(window.jQuery));


    $('#FormData').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            datainicial: {
                validators: {
                    notEmpty: {
                        message: 'Data Inicial está Vazia!'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'A Data Inicial não está Preenchida corretamente!'
                    },
//                    verificarBarras: {
//                        message: 'A Data Inicial não está Preenchida Corretamente!'
//                    },                    
//                    verificarTamanhoDataInicial: {
//                        message: 'A Data Inicial não está Completa!'
//                    },
//                    verificarDia: {
//                        message: 'A Data Inicial não está com o Dia corrreto!'
//                    },
//                    verificarMes: {
//                        message: 'A Data Inicial não está com o Mês corrreto!'
//                    }, 
//                    verificarDataInicial: {
//                       message: 'A Data Final não pode ser menor do que a Data Inicial!'
//                    },                   
                },
            },
            datafinal: {
                validators: {
                    notEmpty: {
                        message: 'Data Final está Vazia!'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'A Data Final não está Preenchida corretamente!'
                    },
//                    verificarBarras: {
//                        message: 'A Data Final não está Preenchida Corretamente!'
//                    },
//                    verificarTamanhoDataFinal: {
//                        message: 'A Data Final não está Completa!'
//                    },
//                    verificarDia: {
//                        message: 'A Data Final não está com o Dia corrreto!'
//                    },
//                    verificarMes: {
//                        message: 'A Data Inicial não está com o Mês corrreto!'
//                    },
                    verificarDataFinal: {
                        message: 'A Data Inicial não pode ser maior do que a Data Final!'
                    },
                },
            },
        }
    }).on('keyup', '[name="datainicial"]', function () { 
        
        if ($('#FormData [name="datafinal"]').val().length != 0) {
            
           
            $('#FormData').data('formValidation').updateStatus($('#FormData [name="datafinal"]'), 'NOT_VALIDATED').validateField($('#FormData [name="datafinal"]'));
        }


    });

});
