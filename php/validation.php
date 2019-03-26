<?php
	function preprocess($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	function validateInput($input, $case){
		
		switch($case) {
			case "email":
				preprocess($input);
				if(strlen($input)>256){
					$input = substr($input,0,256);
				}
				break;
			case "username":
				preprocess($input);
				if(strlen($input)>20){
					$input = substr($input,0,20);
					preg_replace("/[^a-zA-Z0-9]+/", "", $input);
				}
				break;
			case "password":
				preprocess($input);
				if(strlen($input)>100){
					$input = substr($input,0,100);
				}
				$input = md5($input);
				break;
			case "name":
				preprocess($input);
				if(strlen($input)>100){
					$input = substr($input,0,100);
				}
				break;
			case "address":
				preprocess($input);
				if(strlen($input)>400){
					$input = substr($input,0,400);
				}
				break;
			case "telephone":
				preprocess($input);
				if(strlen($input)>20){
					$input = substr($input,0,20);
				}
				break;
			default:
				preprocess($input);
				if(strlen($input)>100){
					$input = substr($input,0,100);
				}
		}
		return($input);
	}

?>