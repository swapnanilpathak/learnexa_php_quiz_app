<?php


	// force the user to be logged in or redirect
	function ForceLogin(){
		if(isset($_SESSION['user_id'])){
		//allow the user to view the dashboard
	}else{
		//redirect the user to the login page
		header("location:/learnexa/login.php");
	}
	}

	//force the user to stay on the dashboard
	function ForceDashboard(){
		if(isset($_SESSION['user_id'])){
		//force the user to view the dashboard
			header("location:/learnexa/dashboard.php");
	}else{
		//redirect the user to the login page
		
	}
	}
?>