<script src="<?php echo base_url() ?>assets/charts/amcharts/pie.js" type="text/javascript"></script>

<script>

 var charter;

            var charterData = [
               <?php 
	  $i=1; foreach($pegawai as $pegawai) {
	  $id_satker = $pegawai['id_satker'];
	  // Hitung jumlah pegawai persatker
	  $jml_pegawai			= count($this->laporan_model->jml_pegawai($id_satker));
	  ?>
	{
		"coun": "<?php echo $pegawai['nama_satker'] ?>",
		"visits": <?php if($jml_pegawai==0) { echo 0; }else{ echo $jml_pegawai; } ?>
	},
	<?php } ?>
	
            ];


            AmCharts.ready(function () {
                // PIE CHART
                charter = new AmCharts.AmPieChart();

                // title of the charter
                charter.addTitle("Pegawai Satuan Kerja", 16);

                charter.dataProvider = charterData;
                charter.titleField = "coun";
                charter.valueField = "visits";
                charter.sequencedAnimation = true;
                charter.startEffect = "elastic";
                charter.innerRadius = "30%";
                charter.startDuration = 2;
                charter.labelRadius = 15;
                charter.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the charter 3D
                charter.depth3D = 15;
                charter.angle = 15;

                // WRITE
                charter.write("charterdiv1");
            });
        </script>
    <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Jumlah Pegawai Per Satuan Kerja</h3>
                  <div class="box-tools pull-right">                
                  </div>
                </div>
                    <div id="charterdiv1" style="width:100%; height:500px;"></div>
                
              </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->        