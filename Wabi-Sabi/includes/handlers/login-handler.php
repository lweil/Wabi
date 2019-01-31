<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);//return value de la funcion de la clase

	if($result) {
		$_SESSION['userLoggedIn'] = $username; //le doy el valor del username;
		header("Location: index.php");
	}
	
}
?>