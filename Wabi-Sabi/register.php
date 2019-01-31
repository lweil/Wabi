<?php
	include("includes/config.php");
	include("includes/classes/Constants.php");
	include("includes/classes/Account.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if (isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Wabi!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icons/w.png" />
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat|Raleway');
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--add jquery es javascript library-->
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>

	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="User or Email" value="<?php getInputValue('loginUsername'); ?>" required>
					</p>
					<p>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
					</p>
					<p><?php echo $account->getError(Constants::$loginFailed); ?></p>

					<button type="submit" name="loginButton">LOG IN</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<p><?php echo $account->getError(Constants::$usernameLength); ?></p>
						<p><?php echo $account->getError(Constants::$usernameTaken); ?></p>
						<input id="username" name="username" type="text" placeholder="User" value="<?php getInputValue('username'); ?>" required>
					</p>

					<p>
						<p><?php echo $account->getError(Constants::$firstNameLength); ?></p>
						<input id="firstName" name="firstName" type="text" placeholder="Name" value="<?php getInputValue('firstName'); ?>" required>
					</p>

					<p>
						<p><?php echo $account->getError(Constants::$lastNameLength); ?></p>
						<input id="lastName" name="lastName" type="text" placeholder="Lastname" value="<?php getInputValue('lastName'); ?>" required>
					</p>

					<p>
						<p><?php echo $account->getError(Constants::$emailsDoNoMatch); ?></p>
						<p><?php echo $account->getError(Constants::$emailInvalid); ?></p>
						<p><?php echo $account->getError(Constants::$emailTaken); ?></p>
						<input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValue('email'); ?>" required>
					</p>

					<p>
						<input id="email2" name="email2" type="email" placeholder="Confirm email" value="<?php getInputValue('email2'); ?>" required>
					</p>

					<p>
						<p><?php echo $account->getError(Constants::$passwordDoNoMatch); ?></p>
						<p><?php echo $account->getError(Constants::$passwordNotAlphanum); ?></p>
						<p><?php echo $account->getError(Constants::$passwordLength); ?></p>
						<input id="password" name="password" type="password" placeholder="Password" required>
					</p>

					<p>
						<input id="password2" name="password2" type="password" placeholder="Confirm password" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Login here.</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great music right now</h1>
				<h2>Listen to loads of songs for free.</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>