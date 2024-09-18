$('input[name="USU_TIPO"]').change(function(){
    var selected = $("input[type='radio'][name='USU_TIPO']:checked").val();
    
    if(selected == "medico"){
        $("#cadastro-enfermeiro").css({"display":"none"})
        $("#cadastro-secretario").css({"display":"none"})
        $("#cadastro-medico").css({"display":"block"})
    } else if (selected == "enfermeiro") {
        $("#cadastro-secretario").css({"display":"none"})
        $("#cadastro-medico").css({"display":"none"})
        $("#cadastro-enfermeiro").css({"display":"block"})
    } else {
        $("#cadastro-medico").css({"display":"none"})
        $("#cadastro-enfermeiro").css({"display":"none"})
        $("#cadastro-secretario").css({"display":"block"})
    }
});