<?php
	if (!isset($_SESSION)){
		session_start();
		session_write_close();
	}
	if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['adm']){ 
		//Se id existir, estiver preenchido e $_SESSION['adm'] for verdadeiro
		$idadm = $_SESSION['id'];
	}
	else{
		echo "<script>alert(".$_SESSION['adm'].");</script>";
		//header ("Location: index.php");
        //echo "<script>window.location.replace('index.php');</script>";
	}
?>