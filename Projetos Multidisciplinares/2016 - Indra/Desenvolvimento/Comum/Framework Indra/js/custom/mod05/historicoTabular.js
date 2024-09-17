$(document).ready(function() { 


    

    $grafico = new Chart($('canvas'), {
                type: 'line',
                data: {
                    labels: ["00:00", "02:00", "04:00", "06:00", "08:00", "10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00", "24:00"],
                    datasets: [{
                        label: "Nível de água",
                        fill: true,
                        lineTension: 0.1,
                        backgroundColor: "rgba(151,187,205,0.2)",
                        borderColor: "rgba(151,187,205,1)",
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(151,187,205,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 5,
                        pointHitRadius: 10,
                        data: [100,110,120,130,140,15,16,20,35,50,70,210,220],                       
                    }]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Dados do alerta de nível de água do dia 11/04'
                    },
                    hover: {
                        mode: 'dataset'
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                show: true,
                                labelString: 'Hora'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                show: true,
                                labelString: 'Valor'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 250,
                            }
                        }]
                    }
                }
            });

    $(".date").mask("99/99/9999");  

    $("#item1").click(function() {
        $("#interTable").toggle();
        $(this).toggleClass('glyphicon-minus glyphicon-plus');
    });

    $("#sensor1").click(function() {
        $("#interTable2").toggle();
        $(this).toggleClass('glyphicon-minus glyphicon-plus');
    });

    $("#btngraf").click(function() {
        $("#grafico").toggle();
    });

});