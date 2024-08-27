
Highcharts.chart('container', {

    chart: {
        polar: true,
        type: 'line'
    },

    title: {
        text: 'Kanui vs Centauro',
        x: -80
    },

    pane: {
        size: '80%'
    },	

    xAxis: {
        categories: ['Reclamações', 'Reclamações Atendidas', 'Clientes Satisfeitos', 'Avaliação',
                'Não atendidas', 'Tempo para resposta'],
        tickmarkPlacement: 'on',
        lineWidth: 0
    },

    yAxis: {
        gridLineInterpolation: 'polygon',
        lineWidth: 0,
        min: 0
    },

    tooltip: {
        shared: true,
        pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
    },

    legend: {
        align: 'right',
        verticalAlign: 'top',
        y: 70,
        layout: 'vertical'
    },

    series: [{
        name: 'Kanui',
        data: [68, 60, 45, 35, 17, 10],
        pointPlacement: 'on'
    }, {
        name: 'Centauro',
        data: [50, 39, 42, 31, 26, 14],
        pointPlacement: 'on'
    }]

});