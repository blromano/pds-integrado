/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('body').on('click', '.page-scroll a', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

 

    $("#btn-login").click(function () {
        MostrarLogin();
    });

    $("#btn-recuperar").click(function () {
        MostrarRecuperar();
    });



    $("#btn-cancelar").click(function () {
        SairLogin();
      
    });

    $("#background-modal").click(function () {
        SairLogin();
	
    });

          

    var drpAberto = false;

    $("#dropdown").click(function () {
         if (!drpAberto) {
            $("#drop-menu").slideDown("slow");
            drpAberto = true;
        }else{
              $("#drop-menu").slideUp("slow");
             drpAberto = false;
       }
    });


    function MostrarLogin() {
        $("#background-modal").fadeIn("slow");
        $("#modal-login").slideDown('slow');
    } 

    function MostrarRecuperar() {
        $("#background-modal").fadeIn("slow");
        $("#modal-recuperar").slideDown('slow');
    }

    function SairRecuperar() {
        $("#background-modal").fadeOut("slow");
        $("#modal-recuperar").slideUp("slow");
    }

    function SairLogin() {
        $("#background-modal").fadeOut("slow");
        $("#modal-login").slideUp("slow");
    }



    function AjustarAltura() {
        $("#enunciado-alerta").height($("#imagem-alerta").height());
    }

    AjustarAltura();
    AjustarPosicaoImagens();

    function AjustarPosicaoImagens() {
        $("")
    }

});

// Floating label headings for the contact form
$(function () {
    $("body").on("input propertychange", ".floating-label-form-group", function (e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function () {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function () {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});
