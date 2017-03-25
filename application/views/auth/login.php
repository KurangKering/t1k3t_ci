<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>-</title>



	<link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/toastr/toastr.min.css">
</head>

<body>
	
	<div class="login-page">
		<div class="form" >
			
			<form class="login-form" action="" method="POST">
				<input required name="username" type="text" placeholder="username"/>
				<input required name="password" type="password" placeholder="password"/>
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/template/adminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url() ?>assets/toastr/toastr.min.js"></script>

	<?php echo $this->session->flashdata('pesan'); ?>
</body>
</html>
