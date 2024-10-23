<?php
class verifica{
	function leesesion(){
		
		if(empty($_SESSION)){
		  session_start();
		}
	  	if(isset($_SESSION['nivel'])){
			$s = $_SESSION['nivel'];
		}	  
		else{
		    $s = "";
		}
		return $s;
	}
	function destruyesesion(){
		session_start();
		session_destroy();
		header("Location: . ");
	}
}
?>