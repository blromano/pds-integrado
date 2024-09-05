<div class="card">
    <div class="card-header">
        <h5 class="title">
            <?php echo $this->getView()->title; ?>
        </h5>
    </div>
    <div class="card-body">
        <div id="chart_div" style="height: 500px"></div>
    </div>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });

    function drawChart(data) {
        var chartData = new google.visualization.DataTable();
        chartData.addColumn('string', 'Situação da reclamação');
        chartData.addColumn('number', 'Quantidade');
        chartData.addRows(data);

        var options = {
            title: 'Resíduos descartados',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(chartData, options);
    }

    function fetchDataAndDrawChart() {
        // Os dados são fornecidos diretamente pelo PHP como um objeto JSON.
        var data = <?php echo $this->getView()->data_json ?>;
        drawChart(data);
    }
</script>