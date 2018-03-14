
<?php
if($this->session->flashdata('sukses')) {
echo '<div class="alert alert-warning">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/charts/style.css" type="text/css">
<script src="<?php echo base_url() ?>assets/charts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/charts/amcharts/serial.js" type="text/javascript"></script>
<script type="text/javascript">
            var chart;

            var chartData = [
			<?php foreach($statistik as $statistik) { ?>
                {
                    "country": "<?php echo date('d M Y',strtotime($statistik['tanggal'])) ?>",
                    "visits": <?php echo $statistik['jumlah'] ?>
                },
			<?php } ?>
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "country";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 90;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                chart.write("chartdiv");
            });
        </script>

<div id="chartdiv" style="width: 100%; height: 400px;"></div>
<hr>

