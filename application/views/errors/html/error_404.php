<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>404 Page Not Found</title>
  <link href="http://localhost/project/informasi_perpustakaan/index/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="http://localhost/project/informasi_perpustakaan/index/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

	<style>
	.center {
	  margin: 0;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -ms-transform: translate(-50%, -50%);
	  transform: translate(-50%, -50%);
	}
	</style>

</head>
<body>
	<div class="text-center center">
	    <div class="error mx-auto" data-text="404">404</div>
	    <p class="lead text-gray-800 mb-5"><?php echo $heading; ?></p>
	    <p class="text-gray-500 mb-0"><?php echo $message; ?></p>
	    <a href="#" onclick="goBack()">&larr; Back to Dashboard</a>
	</div>

	<script type="text/javascript">
	    function goBack() {
	        window.history.back();
	    }
	</script>

<script src="http://localhost/project/informasi_perpustakaan/index/assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/project/informasi_perpustakaan/index/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/project/informasi_perpustakaan/index/assets/admin/js/sb-admin-2.min.js"></script>


</body>

</html>
