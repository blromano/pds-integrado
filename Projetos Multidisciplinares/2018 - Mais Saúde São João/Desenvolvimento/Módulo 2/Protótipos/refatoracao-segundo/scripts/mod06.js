

function editar_exf(id,descricao,nome,def,unm,tef){
    
    $('input#txt_c_exercicio').val(id);
    $('input#txt_d_exercicio').val(descricao);
    $('input#txt_n_exercicio').val(nome);
    $('input#url_vd_exercicio').val(def);
    $('select[name="tipos_exercicios"]').find('option[value='+tef+']').attr("selected",true);
    $('select[name="unidade_exercicio"]').find('option[value='+unm+']').attr("selected",true);
    
    
}

function excluir_exf(id){
    
     $('input#txt_c_exercicio').val(id);
}