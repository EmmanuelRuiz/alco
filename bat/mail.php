<?php 
	
	// your email
	$user_email = "mail@companyname.com";

	$mail = array(
		"name" => htmlspecialchars($_POST['cf-name']),
		"email" => htmlspecialchars($_POST['cf-email']),
		"phone" => htmlspecialchars($_POST['cf-phone']),
		"city" => htmlspecialchars($_POST['cf-city']),
		"service" => htmlspecialchars($_POST['cf-service']),
		"message" => htmlspecialchars($_POST['cf-message'])
	);
	
	function validate($arr){

		return !empty($arr['name']) && strlen($arr['message']) > 20 && filter_var($arr['email'],FILTER_VALIDATE_EMAIL) && filter_var($arr['phone'],FILTER_SANITIZE_NUMBER_INT);

	}

	if(validate($mail)){

		echo mail($user_email, $mail['subject'], 
			"Name : {$mail['name']}\n" 
			."E-mail : {$mail['email']}\n"
			."Message : {$mail['message']}\n"
			."City : {$mail['city']}\n"
			."Service : {$mail['service']}\n"
			."Phone : {$mail['phone']}" 
		);

	}


?>