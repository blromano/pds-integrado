//Configuracoes
var dashboard = document.getElementById('grafico_linhas');
var docHeight = document.documentElement.clientHeight- 20; // - 20 jsFiddle hack
var docWidth = document.documentElement.clientWidth - 20;
dashboard.height = docHeight;
dashboard.width = docWidth;
var ctx;
var _y = docHeight-20;// jsfiddle hack
// objeto para ser preenchido do tipo Grafico de Linhas
var grafico = {
    espessura: 10,
    cor: '#000',
    gap: 5,
    dataProvider:null,
    init: function(){
                ctx = dashboard.getContext('2d');
                ctx.beginPath();
                ctx.moveTo(posicaoX(0),posicaoY(this.dataProvider[0]));
            for(var i=1;i<this.dataProvider.length;i++)
            {
                ctx.lineTo(posicaoX(i),posicaoY(this.dataProvider[i]));
                ctx.strokeStyle = this.cor;
                ctx.lineWidth = this.espessura;
                ctx.stroke();
            }
            for(var i=0;i<this.dataProvider.length;i++)
            {
            ctx.beginPath();
            ctx.arc(posicaoX(i), posicaoY(this.dataProvider[i]), this.espessura*1.3, 0, Math.PI * 2, false);
            ctx.fill();
            }
    }
}
function pegarValorMaximo() {
    var max = 0;
     
    for(var i = 0; i < grafico.dataProvider.length; i ++) {
        if(grafico.dataProvider[i] > max) {
            max =  grafico.dataProvider[i];
        }
    } 
    max += 10 - max % 10;
    return max;
}
function posicaoY(val) {
    return docHeight - ((docHeight)/ pegarValorMaximo()) * val;
}

function posicaoX(val) {
    return (docWidth / grafico.dataProvider.length) * val;
}


// usando um provedor de dados para preencher
grafico.cor = "#75bc48";
grafico.dataProvider = [21,11,18,29,7,10,90,35,60,20,40,80,44,50,30,90,70,20,10,99,33];
grafico.columnHeight = 20; // seta largura da coluna
grafico.init(); // inicializa
