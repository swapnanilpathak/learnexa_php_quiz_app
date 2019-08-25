<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("include/config.php");
	ForceDashboard();
?>

<html>
	<head>
		<title>Learnexa Login</title>
		<?php
		require_once("include/cssLinks.php"); 
		?>
	</head>
	<body>
		
			<?php require_once "include/header.php";
		?>

		

		<form method="POST"  class="loginForm" >
			<div class="center-align card-panel grey lighten-2" style="font-size: 32px">Login</div>
			<div class="errorText card-panel" style="display:none">Errors Are Displayed Here</div>
			<input type="text" name="email" placeholder="enter email here" required="required">
			<input type="password" name="password" placeholder="enter password here" required="required">
			<div class="row center"><input class="btn-large purple" type="submit" name="submit" value="Login"></div>
			
		</form>
	
	
		<?php require_once "include/footer.php";
		?>
		</main>
	</body>
	
</html>


