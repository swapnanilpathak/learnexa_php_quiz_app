<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		

		$returnTheArray = [];

	//collection of values from the form fields
		$phpEmail = Filter::String($_POST['email']);

	// make sure the user does not exists
		$findUser = $con->prepare("SELECT user_id FROM users WHERE user_email = LOWER(:user_email) LIMIT 1");
		$findUser->bindParam(':user_email',$phpEmail, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			//user exists
			//we can check if they can log in
			$returnTheArray['error']='Account attached with this email already exists';
			$returnTheArray['is_logged_in'] = false;
		}else{

			//user doest exist make the user
			$phpUsername = Filter::String($_POST['username']);
			$phpPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$phpPhoneno = Filter::String($_POST['phoneno']);


			$addUser = $con->prepare("INSERT INTO users(user_email,user_name,user_password,user_phoneno)VALUES(LOWER(:email),:username,:password,:phoneno)");
			$addUser->bindParam(':email',$phpEmail,PDO::PARAM_STR);
			$addUser->bindParam(':username',$phpUsername,PDO::PARAM_STR);
			$addUser->bindParam(':password',$phpPassword,PDO::PARAM_STR);
			$addUser->bindParam(':phoneno',$phpPhoneno,PDO::PARAM_STR);
			$addUser->execute();


			$user_id = $con->lastInsertId();

			$_SESSION['user_id']= (int)$user_id;

			$returnTheArray['redirect'] = '/learnexa/dashboard.php';//redirect the user to a dashboard
			$returnTheArray['is_logged_in'] = true;
		}


	echo json_encode($returnTheArray,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>  