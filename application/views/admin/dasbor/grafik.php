<div class="col-md-12">
	<h4>GRAFIK JUMLAH PEGAWAI PER SATUAN KERJA</h4><hr>

<?php 
$warna 	= array('#FF0F00',
				'#FF6600',
				'#FF9E01',
				'#FCD202',
				'#F8FF01',
				'#B0DE09',
				'#04D215',
				'#0D8ECF',
				'#0D52D1',
				'#2A0CD0',
				'#8A0CCF',
				'#CD0D74'
				);
 ?>

	<script>
            var chart;

            var chartData = [

            <?php foreach($grafik as $grafik) { ?>
                {
                    "country": "<?php echo $grafik->nama_satker ?>",
                    "visits": <?php echo $grafik->total_pegawai ?>,
                    "color": "<?php echo $warna[array_rand($warna)]; ?>"
                },
             <?php } ?>  

            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "country";
                chart.startDuration = 1;
                chart.depth3D = 50;
                chart.angle = 30;
                chart.marginRight = -45;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.colorField = "color";
                graph.balloonText = "<b>[[category]]: [[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0.5;
                graph.lineColor = "#FFFFFF";
                graph.topRadius = 1;
                graph.fillAlphas = 0.9;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chartCursor.valueLineEnabled = true;
                chartCursor.valueLineBalloonEnabled = true;
                chartCursor.valueLineAlpha = 1;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>

        <div id="chartdiv" style="width: 100%; height: 400px;"></div>

</div>