$(document).ready(function() { 

    $(".date").mask("99/99/9999");  

    $("#item1").click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable").hide();
            $('#item1').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable").show();
            $('#item1').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });

    $("#sensor1").click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable2").hide();
            $('#sensor1').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable2").show();
            $('#sensor1').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });

    $("#btngraf").click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#grafico").hide();
        } else {
            $("#grafico").show();
        }
        $(this).data("clicks", !clicks);
    });

});