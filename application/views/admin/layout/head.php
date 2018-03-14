<?php 
$site_head = $this->konfigurasi_model->home();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $title ?> </title>

  <!-- ICON -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$site_head->icon) ?>">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Pace style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/pace/pace.min.css">
<!-- PACE -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/PACE/pace.min.js"></script>
  <!-- page script -->
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
</script>

<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <!-- JQUERY -->
  <link href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/jquery-ui/external/jquery/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/jquery-ui/jquery-ui.js"></script>

<!-- JQUERY CHAINED -->
<script src="<?php echo base_url() ?>assets/js/jquery.chained.min.js" type="text/javascript"></script>

<!-- LIBRARY AMCHARTS -->
<script src="<?php echo base_url() ?>assets/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/amcharts/amcharts/serial.js" type="text/javascript"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">