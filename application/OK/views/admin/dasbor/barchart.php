<script src="<?php echo base_url() ?>assets/charts/amcharts/serial.js" type="text/javascript"></script>

        <script>
            var chart;

            var chartData = [
			<?php foreach($barchart as $bar) { ?>
                {
                    "status": "<?php echo $bar['status_pegawai'] ?>",
                    "visits": <?php echo $bar['total'] ?>,
                    "color": "#FF0F00"
                },
             <?php } ?>  
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "status";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 45; // this line makes category values to be rotated
                categoryAxis.gridAlpha = 0;
                categoryAxis.fillAlpha = 1;
                categoryAxis.fillColor = "#FAFAFA";
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.dashLength = 5;
                valueAxis.title = "Jumlah Pegawai PNS Dan Non PNS";
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.colorField = "color";
                graph.balloonText = "<b>[[category]]: [[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script> 
        <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Jumlah Pegawai PNS dan Non PNS</h3>
                  <div class="box-tools pull-right">       
        			</div>
                </div>
                <div class="box-body">
                    <div id="chartdiv" style="width: 500px; height: 300px;"></div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

           