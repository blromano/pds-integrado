<div class="card">
    <div class="card-header">
        <div class="row justify-content-between alinhar">
            <div>
                <h5 class="title t_a">
                    <?php echo $this->getView()->title; ?>
                </h5>
            </div>
            <div>
                <button onclick="generatePDF()" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Gerar
                    PDF</button>
            </div>
        </div>
    </div>
    <div class="card-body" id="conteudoDivInput" style="display: flex;">
        <div id="chart_div" style="height: 400px; flex: 1;"></div>
        <div id="bar_chart_div" style="height: 400px; flex: 1;"></div>
    </div>
</div>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });

    function drawChart(data) {
        var chartData = new google.visualization.DataTable();
        chartData.addColumn('string', 'Tipo de Resíduo');
        chartData.addColumn('number', 'Quantidade');
        chartData.addRows(data);

        var options = {
            title: 'Resíduos descartados (Pizza)',
            is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(chartData, options);
    }

    function drawBarChart(data) {
        var chartData = new google.visualization.DataTable();
        chartData.addColumn('string', 'Tipo de Resíduo');
        chartData.addColumn('number', 'Quantidade');
        chartData.addRows(data);

        var options = {
            title: 'Resíduos descartados (Barras)',
            is3D: false,
            legend: {
                position: 'none'
            },
            colors: ['#458279']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart_div'));
        chart.draw(chartData, options);
    }

    function fetchDataAndDrawCharts() {
        var data = <?php echo $this->getView()->data_json ?>;
        drawChart(data);
        drawBarChart(data);
    }

    function generatePDF() {
        var element = document.getElementById('conteudoDivInput');
        var paddingContainer = document.createElement('div');

        // Set left padding on the wrapper container
        paddingContainer.style.paddingLeft = '50%'; // Adjust the padding value as needed
        paddingContainer.appendChild(element.cloneNode(true));

        html2pdf(paddingContainer, {
            margin: 10,
            filename: 'dados_estatisticos.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 1, width: $(window).width(),
            },
            jsPDF: {
                unit: 'pt',
                format: 'a4',
                orientation: 'l'
            }
        });
    }

    google.setOnLoadCallback(fetchDataAndDrawCharts);
</script>