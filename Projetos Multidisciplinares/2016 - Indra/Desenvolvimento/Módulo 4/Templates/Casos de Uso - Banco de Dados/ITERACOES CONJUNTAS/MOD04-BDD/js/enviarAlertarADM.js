$(document).ready(function () {

   var table = $('#list-Alerts').DataTable({

        "dom":' <"selectLocal">frtip',
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
                "targets": [7],
                "orderable": false
            }]

    });

    var htmlLocal = $('#selectLocal').html();
    $('#selectLocal').html("");

    $('div.selectLocal').html(htmlLocal);
    
    $('#selectCidade').on('change', function(){
        table.columns(3).search(this.value).draw();
    });

    $('#selectRua').on('change', function(){
        table.columns(1).search(this.value).draw();
    });

    $('#selectBairro').on('change', function(){
        table.columns(2).search(this.value).draw();
    });

    $('#list-Alerts tbody').on('click', 'button.btn-img', function () {
        var imgs = jQuery.parseJSON(this.id);
        var alerta = jQuery.parseJSON(this.id);

        var html = "<div id=\"carouselImgs\" class=\"carousel slide\" data-ride=\"carousel\">" +
                "<ol class=\"carousel-indicators\">";

        //html += "<text style=\"font-weight: 900;\">Descrição: </text>" + alerta.desc + "<br>";

        if (!jQuery.isEmptyObject(imgs.imagem1))
            html += "<li data-target=\"#carouselImgs\" data-slide-to=\"0\" class=\"active\"></li>";
        if (!jQuery.isEmptyObject(imgs.imagem2))
            html += "<li data-target=\"#carouselImgs\" data-slide-to=\"1\"></li>";
        if (!jQuery.isEmptyObject(imgs.imagem3))
            html += "<li data-target=\"#carouselImgs\" data-slide-to=\"2\"></li>";
        if (!jQuery.isEmptyObject(imgs.imagem4))
            html += "<li data-target=\"#carouselImgs\" data-slide-to=\"3\"></li>";
        if (!jQuery.isEmptyObject(imgs.imagem5))
            html += "<li data-target=\"#carouselImgs\" data-slide-to=\"4\"></li>";
        html += "</ol>" +
                "<div class=\"carousel-inner\">";
        if (!jQuery.isEmptyObject(imgs.imagem1)) {
            html += "<div class=\"item active\">" +
                    "<img src=\"" + imgs.imagem1 + "\" alt=\"Imagem 01\">" +
                    "</div>";
        }
        if (!jQuery.isEmptyObject(imgs.imagem2)) {
            html += "<div class=\"item\">" +
                    "<img src=\"" + imgs.imagem2 + "\" alt=\"Imagem 02\">" +
                    "</div>";
        }
        if (!jQuery.isEmptyObject(imgs.imagem3)) {
            html += "<div class=\"item\">" +
                    "<img src=\"" + imgs.imagem3 + "\" alt=\"Imagem 03\">" +
                    "</div>";
        }
        if (!jQuery.isEmptyObject(imgs.imagem4)) {
            html += "<div class=\"item\">" +
                    "<img src=\"" + imgs.imagem4 + "\" alt=\"Imagem 04\">" +
                    "</div>";
        }
        if (!jQuery.isEmptyObject(imgs.imagem5)) {
            html += "<div class=\"item\">" +
                    "<img src=\"" + imgs.imagem5 + "\" alt=\"Imagem 05\">" +
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



        $('#corpoDescricao').html("<text style=\"font-weight: 900;\">Descrição: </text>" + alerta.desc + "<br>");
        $('#corpoImagens').html(html);

    });

    $('#list-Alerts tbody').on('click', 'button.btn-desc', function () {

        var alerta = jQuery.parseJSON(this.id);
        html = "<text style=\"font-weight: 900;\">Descrição: </text>" + alerta.desc + "<br>";

        $('#corpoDescricao').html(html);

    });

    listarAlertas();



});
