<?php require_once 'includes/header.php'; ?>
<?php 
	if (isset($_POST['login'])) {
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		if (empty($uname) or empty($pword)) {
			header("location: login.php?errmsg= please put in the required datas");
		}else{
			$login = new Login;
			$login->helper($uname,$pword);
			//echo("someth");
		}
	}
 ?>

	<form action="" method="post">
		<input type="text" name="uname" class="form-input">
		<input type="password" name="pword" class="form-input">
		<button name="login" class="btn btn-primary">Login</button>
	</form>

    <?php require_once '../includes/scripts.php'; ?>