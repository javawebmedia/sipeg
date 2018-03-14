<script src="<?php echo base_url() ?>assets/charts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/charts/amcharts/serial.js" type="text/javascript"></script>

        <script>
		
		 var charttt;

            var charttData = [
			<?php 
	  $i=1; foreach($pegawai as $pegawai) {
	  $id_pns = $this->dasbor_model->pns();
	  $id_nonpns = $this->dasbor_model->nonpns();
	  // Hitung jumlah pegawai persatker
	  $jml_pnslaki			= count($this->dasbor_model->jml_total_laki($id_pns));
	   $jml_pnspr			= count($this->dasbor_model->jml_total_pr($id_pns));
	    $jml_nonpnslaki		= count($this->dasbor_model->jml_total_lakinon($id_nonpns));
	   $jml_nonpnspr			= count($this->dasbor_model->jml_total_prnon($id_nonpns));
	  ?>{
                {
                    "data": "<?php echo $id_pns['status_pegawai'] ?>",
                    "year2004": <?php if($jml_pnslaki==0) { echo 0; }else{ echo $jml_pnslaki; } ?>,
                    "year2005": <?php if($jml_pnspr==0) { echo 0; }else{ echo $jml_pnspr; } ?>
                },
                {
                    "data": "<?php echo $id_nonpns['status_pegawai'] ?>",
                    "year2004": <?php if($jml_nonpnslaki==0) { echo 0; }else{ echo $jml_nonpnslaki; } ?>,
                    "year2005": <?php if($jml_nonpnspr==0) { echo 0; }else{ echo $jml_nonpnspr; } ?>
                },
               <?php } ?>
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                charttt = new AmCharts.AmSerialChart();
                charttt.dataProvider = charttData;
                charttt.categoryField = "data";
                charttt.color = "#FFFFFF";
                charttt.fontSize = 14;
                charttt.startDuration = 1;
                charttt.plotAreaFillAlphas = 0.2;
                // the following two lines makes charttt 3D
                charttt.angle = 30;
                charttt.depth3D = 60;

                // AXES
                // category
                var categoryAxis = charttt.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#FFFFFF";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes charttt 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#FFFFFF";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "GDP growth rate";
                valueAxis.titleColor = "#FFFFFF";
                valueAxis.unit = "%";
                charttt.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "year2004";
                graph1.type = "column";
                graph1.lineAlpha = 0;
                graph1.lineColor = "#D2CB00";
                graph1.fillAlphas = 1;
                graph1.balloonText = "GDP grow in [[category]] (2004): <b>[[value]]</b>";
                charttt.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.title = "2005";
                graph2.valueField = "year2005";
                graph2.type = "column";
                graph2.lineAlpha = 0;
                graph2.lineColor = "#BEDF66";
                graph2.fillAlphas = 1;
                graph2.balloonText = "GDP grow in [[category]] (2005): <b>[[value]]</b>";
                charttt.addGraph(graph2);

                charttt.write("chartttdiv");
            });
        </script>
         <body style="background-color:#0000FF ;">
        <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Jumlah Pegawai PNS dan Non PNS</h3>
                  <div class="box-tools pull-right">       
        			</div>
                </div>
                <div class="box-body">
                  <div id="chartttdiv" style="width: 100%; height: 400px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
   
        
    </body>