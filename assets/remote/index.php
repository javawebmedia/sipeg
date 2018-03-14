<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Bootstrap 3 Modals</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.container {
  padding-left: 15px;
  padding-right: 15px;
}
</style>
</head>
<body>
<div class="container ">
<div class="jumbotron"><a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal" id="modellink">Show Modal</a></div>
<div class="modal-container"></div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var url = "modalbox.php";
		jQuery('#modellink').click(function(e) {
		    $('.modal-container').load(url,function(result){
				$('#myModal').modal({show:true});
			});
		});
	});
</script>