<?php  
	
	function salt($username, $password, $email, $date){
		$saltuser = hash('SHA512', $username);
		$saltpass = hash('SHA512', $password);
		$saltmail = hash('SHA512', $email);
		$saltdate = hash('SHA512', $date);
		$mailchar = strlen($saltmail);
		$extrasalt = strtotime($date . '+' . $mailchar . 'days');
		
		echo $addmoresalt = hash('SHA512', $saltuser . $saltpassword . $saltmail . $saltdate . $extrasalt);
	}
	
?>