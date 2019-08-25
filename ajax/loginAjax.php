<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$returnTheArray = [];

		$phpEmail = Filter::String($_POST['email']);
		$phpPassword = $_POST['password'];

	// make sure the user does not exists
		$findUser = $con->prepare("SELECT user_id, user_password FROM users WHERE user_email = LOWER(:user_email) LIMIT 1");
		$findUser->bindParam(':user_email',$phpEmail, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			//user exists Try to sign the user in
			$user = $findUser->fetch(PDO::FETCH_ASSOC);//now we get access to user_id and password
			$userId=(int)$user['user_id'];
			$hashedPassword = (string)$user['user_password'];
			

			if(password_verify($phpPassword,$hashedPassword)){
				//user is signed in
				$returnTheArray['redirect'] ='/learnexa/dashboard.php';
				//session
				$_SESSION['user_id']= $userId;
				


			}else{
				//invalid user email or password
				$returnTheArray['error']="Invalid Password";
			}
			
		}else{

			//user doest exist ask the user to create a new account
			$returnTheArray['error']="You have to create a registered account <a href='/learnexa/register.php'>Register Now!!!</a>";
		}
	

	echo json_encode($returnTheArray,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>  