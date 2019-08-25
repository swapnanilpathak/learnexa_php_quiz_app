<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("include/config.php");
?>

<html>
	<head>
		<title>Learnexa</title>
		<?php
		require_once("include/cssLinks.php"); 
		?>
	</head>
	<body>
		
			<?php require_once "include/header.php";
		?>

		
		<div class="card-panel hoverable">
			<a href="login.php" class="btn-small blue">Login</a>
			<a href="register.php" class="btn-small blue ">Register</a>
		</div>
		<div class="card-panel hoverable">
			<span>Test your knowledge by registering and giving our online tests in core computer science topics.</span>
		</div>



		<!--Main Content -->


		<div class="row">
			<div class="col s12 m4 center-align card-panel hoverable pink lighten-2">
				<span class="center-align purple-text">Our Services</span>
				<div class="justify-align">
					Take a look at our amazing services offered by us
				</div>
			</div>
			<div class="col s12 m4 center-align card-panel hoverable pink lighten-3">
				<span class="center-align purple-text">Work For Us</span>
				<div class="justify-align">
					Take a look at amazing oppurtunities and career options
				</div>
			</div>
			<div class="col s12 m4 center-align card-panel hoverable pink lighten-4">
				<span class="center-align purple-text">About Us</span>
				<div class="justify-align">
					Take a look at the team and people behind LEARNEXA
				</div>
			</div>
		</div>
	
	
		<?php require_once "include/footer.php";
		?>


		</main>
	</body>
	
</html>


