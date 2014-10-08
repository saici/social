<?php
	if(!isset($_SESSION['user')){
		die('Fout! Probeer opnieuw in te loggen of je browser te herstarten.');
	}
	
	getfriends($friends);
	
?>
