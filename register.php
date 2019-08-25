<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("include/config.php");
	ForceDashboard();
?>

<html>
	<head>
		<title>Learnexa Register</title>
		<?php
		require_once("include/cssLinks.php"); 
		?>
		<style type="text/css">
			.buttons{
				text-align: center;
			}
		</style>
	</head>
	<body>
		
			<?php require_once "include/header.php";
		?>
		


		<form method="POST"  class="registerForm">
			<div class="center-align card-panel grey lighten-2" style="font-size: 32px">Register</div>
			<div class="errorText card-panel" style="display:none">Errors Are Displayed Here</div>

			<input type="text" name="email" placeholder="enter email here" required="required">
			<input type="text" name="username" placeholder="enter username here" required="required" >

			<input type="password" name="password" placeholder="enter password here" required="required">

			<input type="text" name="phoneno" placeholder="enter phone number here" required="required">
			<div class="buttons">
			<input class="btn-large purple" type="submit" name="submit" value="Register">
			<input class="btn-large purple" type="reset" name="reset">
			</div>
		</form>
	
		<?php require_once "include/footer.php";
		?>
		</main>
	</body>
	
</html>


