<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("include/config.php");

	
	ForceLogin();


	// echo $_SESSION['user_id'].' is your session id';
	$userId = $_SESSION['user_id'];
	$getUserInfo = $con->prepare("SELECT user_email,user_name,user_phoneno,user_regdtime FROM users WHERE user_id= :user_id LIMIT 1");
	$getUserInfo->bindParam(':user_id',$userId,PDO::PARAM_INT);
	$getUserInfo->execute();
	if($getUserInfo->rowCount()==1){
		$userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);
	}else{
		header("location:/learnexa/logout.php");exit;
	}

?>



<html>
	<head>
		<title>Learnexa</title>
		<?php
		require_once("include/cssLinks.php"); 
		?>
		<style type="text/css">
			input[type="radio"]{
    -webkit-appearance: radio;
}
		</style>
	</head>
	<body>
		
			<?php require_once "include/header.php";
		?>

		
		<div class="card-panel">
			<?php echo 'hello '.$userDetails['user_name'] ?> 
			 <!-- <?php echo 'your email is '.$userDetails['user_email'] ?> 
			<?php echo 'your phone no '.$userDetails['user_phoneno'] ?> 
			<?php echo 'you registered at '.$userDetails['user_regdtime'] ?>  --> 



		<span class="right"><a href="/learnexa/logout.php" class="btn-small blue">Logout</a></span>
		</div>
		<div class="card-panel">Welcome to your Dashboard</div>
	
<form action="evaluation.php" method="POST">
			<!--get question data**/-->
			<?php
			$questionData=$con->query('SELECT * FROM questions');
			while($row = $questionData->fetch(PDO::FETCH_ASSOC)){
			?>
			<div class="card-panel">
				<?php echo($row['qtext']); ?> <br>
				<input id="o1" type="radio" name="check[<?php echo $row['qid'] ?>]" value="<?php echo($row['o1']); ?>">

				<label for="o1">
				<?php echo($row['o1']); ?>
				</label><br>
				<input id="o2" type="radio" name="check[<?php echo $row['qid'] ?>]" value="<?php echo($row['o2']); ?>">
				<label for="o2">
				<?php echo($row['o2']); ?>
			</label><br>
				<input id="o3" type="radio" name="check[<?php echo $row['qid'] ?>]" value="<?php echo($row['o3']); ?>">
				<label for="o3">
				<?php echo($row['o3']); ?>
			</label><br>
				<input id="o4" type="radio" name="check[<?php echo $row['qid'] ?>]" value="<?php echo($row['o4']); ?>">
				<label for="o4">
				<?php echo($row['o4']); ?>
				</label>
				
			</div>
				
			<?php
			}
		?>
		<div class="row center"><input class=" btn-large purple" type="submit" name="quizSubmit" value="Submit">
			</div>
	</form>
		<?php require_once "include/footer.php";
		?>


		</main>
	</body>
	
</html>


