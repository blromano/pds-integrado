 $(document).ready(function () {
 
 $(".date").mask("99/99/9999");

    $("#dado1").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable1").hide();
            $('#dado1').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable1").show();
            $('#dado1').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });

    $("#dado2").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable2").hide();
            $('#dado2').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable2").show();
            $('#dado2').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });

    $("#dado3").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable3").hide();
            $('#dado3').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable3").show();
            $('#dado3').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });

    $("#dado4").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $("#interTable4").hide();
            $('#dado4').addClass('glyphicon-plus').removeClass('glyphicon-minus');
        } else {
            $("#interTable4").show();
            $('#dado4').addClass('glyphicon-minus').removeClass('glyphicon-plus');
        }
        $(this).data("clicks", !clicks);
    });
	});