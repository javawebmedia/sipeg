<?php
$kelamin_pns	= $this->dasbor_model->kelamin_pns();
$kelamin_nonpns	= $this->dasbor_model->kelamin_nonpns();
$kelamin_umum	= $this->dasbor_model->kelamin_umum();
?>
<script src="<?php echo base_url() ?>assets/charts/amcharts/serial.js" type="text/javascript"></script>
 <script>
            var kelamin;

            var kelaminData = [
                {
                    "country": "PNS",
					<?php foreach($kelamin_pns as $kelamin_pns) { ?>
                    "<?php echo $kelamin_pns['jenis_kelamin'] ?>": <?php echo $kelamin_pns['jumlah'] ?>,
					<?php } ?>
                },
                {
                    "country": "Non PNS",
                    <?php foreach($kelamin_nonpns as $kelamin_nonpns) { ?>
                    "<?php echo $kelamin_nonpns['jenis_kelamin'] ?>": <?php echo $kelamin_nonpns['jumlah'] ?>,
					<?php } ?>
                },
                {
                    "country": "Karyawan Umum",
                    <?php foreach($kelamin_umum as $kelamin_umum) { ?>
                    "<?php echo $kelamin_umum['jenis_kelamin'] ?>": <?php echo $kelamin_umum['jumlah'] ?>,
					<?php } ?>
                },
                
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = kelaminData;
                chart.categoryField = "country";
                chart.color = "#FFFFFF";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 60;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#FFFFFF";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#FFFFFF";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Statistik jenis kelamin";
                valueAxis.titleColor = "#FFFFFF";
                valueAxis.unit = " orang";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "Laki-laki";
                graph1.valueField = "Laki-laki";
                graph1.type = "column";
                graph1.lineAlpha = 0;
                graph1.lineColor = "#D2CB00";
                graph1.fillAlphas = 1;
                graph1.balloonText = "Laki-laki <b>[[value]] orang</b>";
                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.title = "Perempuan";
                graph2.valueField = "Perempuan";
                graph2.type = "column";
                graph2.lineAlpha = 0;
                graph2.lineColor = "#BEDF66";
                graph2.fillAlphas = 1;
                graph2.balloonText = "Perempuan <b>[[value]] orang</b>";
                chart.addGraph(graph2);

                chart.write("kelamin");
            });
        </script>
        
<style>
.kelaminku {
	font-family: Tahoma,Arial,Verdana;
	font-size: 12px;
	background-color: #000;
}

	.kelaminku a:link {color: #84c4e2;}
	.kelaminku a:visited {color:#84c4e2;}
	.kelaminku a:hover {color: #cd82ad;}
	.kelaminku a:active {color: #84c4e2;}
</style>
<div class="kelaminku">
	<div id="kelamin" style="width: 100%; height: 400px;"></div>
</div>