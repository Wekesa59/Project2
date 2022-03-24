<?php

if(!empty($_POST["remember"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);
	$game = include 'round-empty.php';
    include 'template.php';
} else {
	setcookie("username","");
	setcookie("password","");
	$game = include 'round-empty.php';
    include 'template.php';
}

?>

<p><a href="login.php"> Go to Login Page </a> </p>