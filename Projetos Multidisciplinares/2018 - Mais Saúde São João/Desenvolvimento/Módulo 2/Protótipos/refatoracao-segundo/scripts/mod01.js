var x = 0;

function verificarCPF(strCpf) {
    if (!/[0-9]{11}/.test(strCpf))
        return false;
    if (strCpf === "00000000000")
        return false;
    var soma = 0;
    for (var i = 1; i <= 9; i++) {
        soma += parseInt(strCpf.substring(i - 1, i)) * (11 - i);
    }

    var resto = soma % 11;
    if (resto === 10 || resto === 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }

    if (resto !== parseInt(strCpf.substring(9, 10))) {
        return false;
    }

    soma = 0;
    for (var i = 1; i <= 10; i++) {
        soma += parseInt(strCpf.substring(i - 1, i)) * (12 - i);
    }
    resto = soma % 11;
    if (resto === 10 || resto === 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }

    if (resto !== parseInt(strCpf.substring(10, 11))) {
        return false;
    }

    return true;
}

function senhausu(campo1, campo2) {
    if (campo1.value === campo2.value) {
        return true;
    } else {
        $(function () {
                            $('#senha_modal').modal('show');
                        });
        return false;
    }
}
$(document).ready(function () {

    document.getElementById("defaultOpen").click();
    //NUTRICIONISTA
    //VERIFICAR SE O CPF JÁ EXISTE OU EMAIL JÁ EXISTE- NUTRICIONISTA
    $('#formNutri').on('submit', function (e) {
        e.preventDefault();
        var email = $('#email_nutri').val();
        var cpf = $('#cpf_nutri').val();
        var crn = $('#crn_nutri').val();
        var form = this;
        var erro = false;

        var cad = document.getElementById('formNutri');
        if (!verificarCPF(cad.cpf_nutri.value)) {
            $(function () {
                            $('#cpf_modal').modal('show');
                        });
            erro = true;
        }
        if (!senhausu(cad.senha_nutri, cad.confirma_nutri)) {

            erro = true;
        }

        $.post('controllers/modules/Usuarios/verify_nutri.php', {cpf: cpf, email: email, crn: crn}, function (e) {
            //Então você faz uma comparação de valores, entre false e true
            var volta = e;
            if (volta == 2) {
                $(function () {
                            $('#cpf_repetido').modal('show');
                        });

            } else if (volta == 1) {
               $(function () {
                            $('#email_repetido').modal('show');
                        });

            } else if (volta == 4) {
                $(function () {
                            $('#crn_repetido').modal('show');
                        });


            } else
            {
                form.submit();
            }
        });
        //NUTRI Botão Foto
        var $inputN = document.getElementById('foto_nutri');
        if ($inputN != null) {
            $fileNameN = document.getElementById('file-name-3');

            $inputN.addEventListener('change', function () {
                $fileNameN.textContent = this.value;
            });
        }

    });
    //EDF
    //VERIFICAR SE O CPF JÁ EXISTE OU EMAIL JÁ EXISTE- EDUCADOR FÍSICO
    $('#formEdf').on('submit', function (e) {
        e.preventDefault();
        var email = $('#email_edf').val();
        var cpf = $('#cpf_edf').val();
        var cref = $('#cref_edf').val();
        var form = this;
        var erro = false;

        var cad = document.getElementById('formEdf');
        if (!verificarCPF(cad.cpf_edf.value)) {
             $(function () {
                            $('#cpf_modal').modal('show');
                        });
            erro = true;
        }
        if (!senhausu(cad.senha_edf, cad.confirma_edf)) {

            erro = true;
        }

        $.post('controllers/modules/Usuarios/verify.php', {cpf: cpf, email: email, cref: cref}, function (e) {
            //Então você faz uma comparação de valores, entre false e true
            var volta = e;
            if (volta == 2) {
               $(function () {
                            $('#cpf_repetido').modal('show');
                        });
                erro = true;

            } else if (volta == 1) {
               $(function () {
                            $('#email_repetido').modal('show');
                        });
                erro = true;

            } else if (volta == 3) {
                $(function () {
                            $('#cref_repetido').modal('show');
                        });
                erro = true;
            }
            if (erro == false)
            {
                form.submit();
            }
        });

        //EDF Botão Foto
        var $inputE = document.getElementById('foto_edf');
        if ($inputE != null) {
            $fileNameE = document.getElementById('file-name-2');

            $inputE.addEventListener('change', function () {
                $fileNameE.textContent = this.value;
            });
        }

    });
    //USUARIO
    //VERIFICAR SE O CPF JÁ EXISTE OU EMAIL JÁ EXISTE- USUARIO
    $('#formUsuario').on('submit', function (e) {
        e.preventDefault();
        var email = $('#emailusucadastro').val();
        var cpf = $('#cpf_usu').val();
        var form = this;
        var erro = false;

        var cad = document.getElementById('formUsuario');
        if (!verificarCPF(cad.cpf_usu.value)) {
            $(function () {
                            $('#cpf_modal').modal('show');
                        });
            erro = true;
        }
        if (!senhausu(cad.senhausucadastro, cad.confirsenhausucadastro)) {

            erro = true;
        }

        $.post('controllers/modules/Usuarios/verify.php', {cpf: cpf, email: email}, function (e) {
            //Então você faz uma comparação de valores, entre false e true
            var volta = e;
            if (volta == 2) {
                $(function () {
                            $('#cpf_repetido').modal('show');
                        });
                erro = true;

            } else if (volta == 1) {
                $(function () {
                            $('#email_repetido').modal('show');
                        });
                erro = true;
            }
            if (erro == false)
            {
                form.submit();
            }


        });

        //Usuário Botão Foto
        var $input = document.getElementById('foto_usu');
        if ($input != null) {
            $fileName = document.getElementById('file-name');

            $input.addEventListener('change', function () {
                $fileName.textContent = this.value;
            });
        }
    });

});



function Validar_Recu_Senha() {
     var cad = document.getElementById('alterar_senha');
    if (!senhausu(cad.nova_senha, cad.cofirmar_senha)) {

        return false;
    }
return true;
}

// ESTILO HOW TO
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
function reload() {
    x++;
    if (x > 1) {
        location.reload();
    }
}
function abrirUsuario() {
    document.getElementById("defaultOpen2").click();
}
function ocultarLinksCadastro() {
    document.getElementById("Cadastro").style.display = 'none';
}



