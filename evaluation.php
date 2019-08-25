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
<?php 
			if(isset($_POST['quizSubmit'])){
				$totalQuestionsQuery = $con->query('SELECT COUNT(*) FROM questions');
					$row = $totalQuestionsQuery->fetch();
					$totalQuestions = $row[0];
				if(!empty($_POST['check'])){
					$answered = count($_POST['check']);
					
					//echo $answered.$totalQuestions;
					$i=1;
			$correctCount=0;
			$userInput = $_POST['check'];
			$correctOptions = $con->query('SELECT oc FROM questions');
			while($row = $correctOptions->fetch(PDO::FETCH_ASSOC)){
				if($userInput[$i]==$row['oc']){
					$correctCount++;
				}
				$i++;
			}
				}else{
					$correctCount=0;
					

				}
			}
			

			//echo 'No of correct answers are '.$correctCount.' out of '.$totalQuestions;
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



		<a href="/learnexa/logout.php">Logout</a>
		</div>
		<div class="card-panel">Result Time<br>
			<?php echo 'No of correct answers are '.$correctCount.' out of '.$totalQuestions; ?>
			<br>
			<?php echo 'Your percentage is '.round((($correctCount/$totalQuestions)*100),2).'%' ?>
		</div>

		
	

		<?php require_once "include/footer.php";
		?>


		</main>
	</body>
	
</html>


