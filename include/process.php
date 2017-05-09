<?php
	include_once('db-config.php');
	$error  = array();
	$res    = array();
	$success = "";
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "signUp")
	{
		if(empty($_POST['first_name']))
		{
			$error[] = "First Name field is required";	
		}
		if(empty($_POST['last_name']))
		{
			$error[] = "Last Name field is required";	
		}
		if(empty($_POST['email']))
		{
			$error[] = "Email field is required";	
		}
	
		if(empty($_POST['password']))
		{
			$error[] = "Password field is required";	
		}
		
		if(empty($_POST['aggree']))
		{
			$error[] = "Agree with our terms and conditions";	
		}
		
		
		if($_POST['password'] != $_POST['cpassword'] )
		{
			$error[] = "Password field and confrim password field is not matched";	
		}
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['email']!= "" ) {
     
        } else {
          $error[] = "Enter Valid Email address";
         }


		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
		$pass = md5($_POST['password']);

		  $sqlQuery = "INSERT INTO 	users(first_name,last_name , email , password )
		  VALUES(:first_name,:last_name,:email,:password)";		   
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
		  $run->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
		  $run->bindParam(':password',$pass, PDO::PARAM_STR); 
		  $run->execute(); 	
		  
		  $resp['msg']    = "Account created successfully";
		  $resp['status'] = true;	
		  echo json_encode($resp);
			exit;	 
		 
		
	}

	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "logIn")
	{
		if(empty($_POST['email']))
		{
			$error[] = "Email field is required";	
		}
	
		if(empty($_POST['password']))
		{
			$error[] = "Password field is required";	
		}

		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
	    $statement = $db_con->prepare("select * from users where email = :email AND password = :password" );
        $statement->execute(array(':email' => $_POST['email'],'password'=> md5($_POST['password'])));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($row)>0)
		{
		  session_start();
		  $_SESSION['user_id'] = $row[0]['user_id'];
		  $resp['redirect']    = "dashboard.php";
		  $resp['status']      = true;	
		  echo json_encode($resp);
		  exit;	
		}
		else
		{
		   $error[] = "Email and password does not match";
		  $resp['msg']    = $error;
		  $resp['status']      = false;	
		  echo json_encode($resp);
		  exit;	
		}
	}

?>