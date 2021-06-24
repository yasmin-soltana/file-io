<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>

<?php 
	define("file path", "data.txt");
	$userName = $passWord = "";
	$isValid = true;
	$userNameErr = $passWordErr = "";
	$uid = "";

	if(isset($_COOKIE['uid'])) {
		$uid = $_COOKIE['uid'];
	}

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$userName = $_POST['username'];
		$passWord = $_POST['password'];
		if(empty($userName)) {
			$userNameErr = "Empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passWordErr = "Empty!";
			$isValid = false;
		}
		if($isValid) {
			$user_data = read();
			$user_data_array = explode("\n", $user_data);
			$found = false;
			for($i = 0; $i < count($user_data_array) - 1; $i++) {
				$user_data_array_decode = json_decode($user_data_array[$i]);
				if($userName === $user_data_array_decode->username &&
				$passWord === $user_data_array_decode->password) {
					$found = true;
					break;
				}
			}

				header("Location: welcome.php");
			}
		}
	

	function read() {
		$resource = fopen(filepath, "r");
		$fz = filesize(filepath);
		$fr = "";
		if($fz > 0) {
			$fr = fread($resource, $fz);
		}
		fclose($resource);
		return $fr;
	} 
?>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $uid; ?>">
			<span style="color:red"><?php echo $userNameErr; ?></span><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passWordErr; ?></span><br><br>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme">Remember Me:</label>

			<br><br>

			<input type="submit" name="submit" value="Login">
		</fieldset>

	
</form>
</body>
</html>