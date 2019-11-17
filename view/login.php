<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
</head>
<body>
<?php if(empty($_GET['action'])){ ?>
<form action="index.php" method="post">
	username(email):<input type="text" name="username"><br>
	Password:<input type="password" name="password">
	<input type="submit" name="login">
</form>
<a href="index.php?action=reset">Forget_password</a>

<?php } else if($_GET['action']=="reset"){ ?>

<form action="index.php" method="post">
	username(email):<input type="text" name="username"><br>
	
	<input type="submit" name="reset" value="reset">
</form>
<?php } ?>


</body>
</html>