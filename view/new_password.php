<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
</head>
<body>

<h1>New Password</h1>

<?php if(!isset($_GET['v'])) {?>
	<form action="index.php?action=new_password" method="post">
		Email:<input type="text" name="email">
		token:<input type="text" name="token">
		<input type="submit" name="check" value="check">
	</form>
<?php } 
else{ ?>
	<form action="index.php?action=new_password" method="post">
		new-password:<input type="password" name="password">
		<input type="hidden" name="id" value="<?=$_GET['v']?>">
		<input type="submit" name="replace" value="reset-password">
	</form>
<?php } ?>
</body>
</html>