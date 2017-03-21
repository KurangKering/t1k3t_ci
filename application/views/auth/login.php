<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="<?php echo base_url() . 'auth/index' ?>" method="post" accept-charset="utf-8">
		<input type="text" name="username">
		<?php echo form_error('username') ?>
		<input type="password" name="password">
		<input type="submit" name="submit">
	</form>
	
</body>
</html>