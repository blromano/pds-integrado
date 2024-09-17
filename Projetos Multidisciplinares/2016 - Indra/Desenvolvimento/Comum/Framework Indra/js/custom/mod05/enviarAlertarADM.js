$( document ).ready(function() {

    var t = $("#tableUser" ).DataTable({
        lengthChange: false,
        "order": [],
        "language": {
            "lengthMenu": "Mostrando _MENU_ itens por página",
            "zeroRecords": "Nenhum item encontrado.",
            "info": "Monstrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum item disponível ",
            "infoFiltered": "(filtrado de _MAX_ itens)",
            "search": "Procurar:",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            }
        },
        "columnDefs": [ {
            "targets": [ 4, 5, 6, 7],
            "orderable": false
        } ]
    });


    function listarAlertas() {
        $.ajax({
            url: "../../class/mod05/alertas/ADM/listarAlertas.php",
            dataType: "json",
            success: function( data ) {
                t.clear().draw();
                var qntResultados = data.length,
                    btnTrue,
                    btnFalse;
                if (qntResultados> 0 ) {
                    for (var i = 0; i < qntResultados; i++ ) {
                        t.row.add([
                            data[ i ].status,
                            data[ i ].data,
                            data[ i ].hora,
                            data[ i ].alerta,
                            "<button id=\"{&quot;desc&quot;:&quot;" + data[i].desc + "&quot;,&quot;rua&quot;:&quot;" + data[i].rua +
                            "&quot;,&quot;bairro&quot;:&quot;" + data[i].bairro + "&quot;,&quot;cidade&quot;:&quot;" + data[i].cidade + "&quot;}\" class=\"btn btn-primary btn-table btn-desc\" data-toggle=\"modal\" data-target=\"#modalDescricao\">Descrição</button>",
                            "<button id=\"{&quot;img1&quot;:&quot;" + data[i].img1 + "&quot;,&quot;img2&quot;:&quot;" + data[i].img2 + "&quot;,&quot;img3&quot;:&quot;" + data[i].img3 + "&quot;,&quot;img4&quot;:&quot;" + data[i].img4 + "&quot;,&quot;img5&quot;:&quot;" + data[i].img5 + "&quot;}\"class=\"btn btn-primary btn-table btn-img\" data-toggle=\"modal\" data-target=\"#modalImagens\">Imagens</button>",
                            btnTrue = (data[i].status == "Aprovado" ||  data[i].status == "Reprovado") ? "<button id=\"" + data[i].id + "\" class=\"btn btn-primary btn-table disabled\">Aprovar</button>" : "<button id=\"" + data[i].id + "\" data-toggle=\"modal\" data-target=\"#modalValidarTrue\" class=\"btn btn-primary btn-table btn-true\">Aprovar</button>",
                            btnFalse = (data[i].status == "Aprovado" ||  data[i].status == "Reprovado") ? "<button id=\"" + data[i].id + "\" class=\"btn btn-primary btn-table disabled\">Reprovar</button>" : "<button id=\"" + data[i].id + "\" data-toggle=\"modal\" data-target=\"#modalValidarFalse\" class=\"btn btn-primary btn-table btn-false\">Reprovar</button>"
                        ]).draw();
                    }
                }
            }
        });
    }

    $('#tableUser tbody').on('click', 'button.btn-true', function() {
        $('#modalValidarTrue').trigger('next.m.1');
        var id = this.id;
        $('#validTrue').on('click', function() {
            $.ajax({
                url: "../../class/mod05/alertas/ADM/validarAlerta.php",
                type: "POST",
                data: {
                    id: id,
                    valid: "sim"
                },
                success: function( data ) {
                    if(data) {
                        $('#modalValidarTrue').trigger('next.m.2');
                        listarAlertas();
                    }else $('#modalValidarTrue').trigger('next.m.3');
                }
            });
        });
    });


    $('#tableUser tbody').on('click', 'button.btn-false', function() {
        $('#modalValidarFalse').trigger('next.m.1');
        var id = this.id;
        $('#validFalse').click(function() {
            $.ajax({
                url: "../../class/mod05/alertas/ADM/validarAlerta.php",
                type: "POST",
                data: {
                    id: id,
                    valid: "nao"
                },
                success: function( data ) {
                    if(data) {
                        $('#modalValidarFalse').trigger('next.m.2');
                        listarAlertas();
                    }else $('#modalValidarFalse').trigger('next.m.3');
                }
            });
        });
    });





    $('#validFalse').on('click', function() {

    });

    $('#tableUser tbody').on('click', 'button.btn-img', function() {
        var imgs = jQuery.parseJSON(this.id);
        var html = "<div id=\"carouselImgs\" class=\"carousel slide\" data-ride=\"carousel\">" +
        "<ol class=\"carousel-indicators\">";
        if(!jQuery.isEmptyObject(imgs.img1)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"0\" class=\"active\"></li>";
        if(!jQuery.isEmptyObject(imgs.img2)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"1\"></li>";
        if(!jQuery.isEmptyObject(imgs.img3)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"2\"></li>";
        if(!jQuery.isEmptyObject(imgs.img4)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"3\"></li>";
        if(!jQuery.isEmptyObject(imgs.img5)) html+= "<li data-target=\"#carouselImgs\" data-slide-to=\"4\"></li>";
        html += "</ol>"+
        "<div class=\"carousel-inner\">";
        if(!jQuery.isEmptyObject(imgs.img1)) {
            html+= "<div class=\"item active\">" +
            "<img src=\"../../" + imgs.img1 +"\" alt=\"Imagem 01\">" +
            "</div>";
        }
        if(!jQuery.isEmptyObject(imgs.img2)) {
            html+= "<div class=\"item\">" +
            "<img src=\"../../" + imgs.img2 +"\" alt=\"Imagem 02\">" +
            "</div>";
        }
        if(!jQuery.isEmptyObject(imgs.img3)) {
            html+= "<div class=\"item\">" +
            "<img src=\"../../" + imgs.img3 +"\" alt=\"Imagem 03\">" +
            "</div>";
        }
        if(!jQuery.isEmptyObject(imgs.img4)) {
            html+= "<div class=\"item\">" +
            "<img src=\"../../" + imgs.img4 +"\" alt=\"Imagem 04\">" +
            "</div>";
        }
        if(!jQuery.isEmptyObject(imgs.img5)) {
            html+= "<div class=\"item\">" +
            "<img src=\"../../" + imgs.img5 +"\" alt=\"Imagem 05\">" +
            "</div>";
        }
        html += "</div>" +
        "<a class=\"left carousel-control\" href=\"#carouselImgs\" data-slide=\"prev\">" +
        "<span class=\"glyphicon glyphicon-chevron-left\"></span>" +
        "</a>" +
        "<a class=\"right carousel-control\" href=\"#carouselImgs\" data-slide=\"next\">" +
        "<span class=\"glyphicon glyphicon-chevron-right\"></span>" +
        "</a>" +
        "</div>" +
        "</div>";

        $('#corpoImagens').html(html);
    });

    $('#tableUser tbody').on('click', 'button.btn-desc', function() {
        var alerta = jQuery.parseJSON(this.id);
        var html = "<text style=\"font-weight: 900;\">Descrição: </text>" + alerta.desc + "<br>" +
        "<text style=\"font-weight: 900;\">Cidade: </text>" + alerta.cidade + "<br>" +
        "<text style=\"font-weight: 900;\">Bairro: </text>" + alerta.bairro + "<br>" +
        "<text style=\"font-weight: 900;\">Rua: </text>" + alerta.rua;
        $('#corpoDescricao').html(html);
    });

    listarAlertas();



});
