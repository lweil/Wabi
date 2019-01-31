<?php 
	
	include("includes/config.php");

	//session_destroy();

	if (isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}
	else {
		header("Location: register.php");
	}

?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat|Raleway');
	</style>
</head>

<body>
	<div id="mainContainer">
		
	
		 <div id="nowPlayingBarContainer">
			<div id="nowPlayingBar">
				<div id="nowPlayingLeft">
					<div class="content">
						<span class="albumLink">
							<img src="assets/images/material-cd.jpg">
						</span>
						<div class="trackInfo">
							<span class="trackName">No name</span>
							<span class="artistName">Anon</span>
						</div>
					</div>
				</div>
				<div id="nowPlayingCenter">
					<div class="content playerControls">
						<div class="buttons">
							<button class="controlButton shuffle" title="Shuffle">
								<img src="assets/images/icons/icons8_Shuffle_25px.png" alt="Shuffle" width="20px">
							</button>
							<button class="controlButton previous" title="Previous">
								<img src="assets/images/icons/icons8_Rewind_25px.png" alt="Previous" width="20px">
							</button>
							<button class="controlButton play" title="Play">
								<img src="assets/images/icons/icons8_Play_25px.png" alt="Play" width="25px">
							</button>
							<button class="controlButton pause" title="Pause" style="display: none;">
								<img src="assets/images/icons/icons8_Pause_25px.png" alt="Pause" width="25px">
							</button>
							<button class="controlButton next" title="Next">
								<img src="assets/images/icons/icons8_Fast_Forward_25px.png" alt="Next" width="20px">
							</button>
							<button class="controlButton repeat" title="Repeat">
								<img src="assets/images/icons/icons8_Repeat_25px.png" alt="Repeat" width="20px">
							</button>
						</div>
						<div class="playbackBar">
							<span class="progressTime current">0:00</span>
							<div class="progressBar">
								<div class="progressBarBg"><div class="progress"></div></div>
							</div>
							<span class="progressTime remaining">0:00</span>
						</div>
					</div>

				</div>
				<div id="nowPlayingRight">
					<div class="volumeBar">
						<button class="controlButton volume" title="Volume">
							<img src="assets/images/icons/icons8_Audio_25px.png" alt="Volume">
						</button>
						<div class="progressBar">
								<div class="progressBarBg"><div class="progress"></div></div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>