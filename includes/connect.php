<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	include ($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
?>	
