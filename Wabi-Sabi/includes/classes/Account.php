<?php

	class Account {

		private $errorArray;
		private $con;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array(); 
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pw){
			$encryptedPw = md5($pw); //md5 es un método de encryptacion
			$profilePic = "assets/images/profile-pics/profilePic.png";
			$date = date("Y-m-d"); //formato

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic')");
			return $result; //el query returnea true o flase si funciona o no

		}
		public function login($un, $pw){
			$pw = md5($pw);
			$query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$un' AND password='$pw'");
			if(mysqli_num_rows($query) == 1){
				return true;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}
		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function validateUsername($un) {

			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$usernameLength);
				return;
			}

			$checkUserNameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			if (mysqli_num_rows($checkUserNameQuery) !=0) {
				array_push($this->errorArray, Constants::$usernameTaken);
			}

		}

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameLength);
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameLength);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNoMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if (mysqli_num_rows($checkEmailQuery) !=0) {
				array_push($this->errorArray, Constants::$emailTaken);
			}

		}

		private function validatePasswords($pw, $pw2) {
			
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanum);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordLength);
				return;
			}

		}


	}
?>