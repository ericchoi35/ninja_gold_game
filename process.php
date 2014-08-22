<?php

session_start();

if (!isset($_SESSION['counter'])) 
{
	$_SESSION['counter'] = 0;
}

if(!isset($_SESSION['activities']))
{
	$_SESSION['activities'] = array();
}
 
$_SESSION['income'] = array("building" => rand(10,20), 
							"bat" => rand(5,10), 
							"dr" => rand(2,5), 
							"royal" => rand(1,10));

foreach($_POST as $key => $value) {
	if (isset($_POST[$key]) && $key != 'action' && $key !='royal') {
		array_push($_SESSION['activities'], "<p class='green'>You entered a " . $value . " and earned " . $_SESSION['income'][$key] . " golds. " . date('F jS Y h:i:s a') . "</p>");
		$_SESSION['counter'] += $_SESSION['income'][$key];
	}
	elseif (isset($_POST[$key]) && $key == 'royal') {
		
		if ($_SESSION['income'][$key] < 4) {
			$_SESSION['income'][$key] = rand(0,50);
			array_push($_SESSION['activities'], "<p class='green'>You entered a " . $value . " and earned " . $_SESSION['income'][$key] . " golds. " . date('F jS Y h:i:s a') . "</p>");
		}
		else {
			$_SESSION['income'][$key] = rand(-50,0);
			array_push($_SESSION['activities'], "<p class='red'>You entered a " . $value . " and lost " . $_SESSION['income'][$key] . " golds... Ouch.. " . date('F jS Y h:i:s a') . "<p>");		
		}
		$_SESSION['counter'] += $_SESSION['income'][$key];
	}
	else {
		$_SESSION = array();
	}

}

header('Location: index.php');
?>

