<script src="<?php echo base_url() ?>assets/charts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/charts/amcharts/pie.js" type="text/javascript"></script>

<script>
var chart;
var legend;

var chartData = [
	 <?php 
	  $i=1; foreach($pegawai as $pegawai) {
	  $id_satker = $pegawai['id_satker'];
	  // Hitung jumlah pegawai persatker
	  $jml_pegawai			= count($this->laporan_model->jml_pegawai($id_satker));
	  ?>
	{
		"jumlah": "<?php echo $pegawai['nama_satker'] ?>",
		"value": <?php if($jml_pegawai==0) { echo 0; }else{ echo $jml_pegawai; } ?>
	},
	<?php } ?>
	
];

AmCharts.ready(function () {
	// PIE CHART
	chart = new AmCharts.AmPieChart();
	chart.dataProvider = chartData;
	chart.titleField = "jumlah";
	chart.valueField = "value";
	chart.outlineColor = "#FFFFFF";
	chart.outlineAlpha = 0.8;
	chart.outlineThickness = 2;
	chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
	// this makes the chart 3D
	chart.depth3D = 15;
	chart.angle = 30;

	// WRITE
	chart.write("chartdiv1");
});
</script>
<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Donut Chart</h3>
                  <div class="box-tools pull-right">                
                  </div>
                </div>
                <div class="box-body">
                    <div id="chartdiv1" style="width: 100%; height: 200px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->