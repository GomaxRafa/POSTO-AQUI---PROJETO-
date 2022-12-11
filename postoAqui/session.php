<?php
	if (!isset($_SESSION)){
		session_start();
		session_write_close();
	}
	if (isset($_SESSION['id']) && !empty($_SESSION['id'])){ 
		//Se id existir e estiver preenchido 
		$iduser = $_SESSION['id'];
	}
	else{
		// echo $_SESSION["id"];
		header ("Location: index.php");
        echo "<script>window.location.replace('index.php');</script>";
	}
?>