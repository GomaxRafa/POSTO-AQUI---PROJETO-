<?php
	include_once "sessionAdm.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv=”content-type” content="text/html;" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="palavras, chave, pesquisa, google" />
	<title>Dashboard</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/bomba.png" type="imagem">


	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->

	<!-- ESTILOS PARA ESTA PÁGINA -->
	<!-- Adição do material icons pra usar os ícones na navbar -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- JAVASCRIPT E JQUERY -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
		integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
		crossorigin="anonymous"></script>
</head>

<body style="background-color: #000;">
	<!-- INÍCIO DO MENU SUPERIOR -->
	
	<nav class="navbar navbar-dark float-end d-inline" style="padding-right:2vw;background-color: #000;">
		
	</nav>
	<nav class="navbar navbar-dark float-end d-inline" style="z-index:1000;padding-right:2vw;background-color: #000;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
			aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<nav class="navbar" style="padding-left:2vw;background-color: #000;">
		<button onclick="history.go(-1);" class="navbar-btn btn btn-md pb-1" style="color:white;" type="button">
			<span class="material-icons">
				arrow_back
			</span>
		</button>
	</nav>
	<nav id="navbarToggleExternalContent" class="collapse">
		<ul class="nav navbar-nav ">
        	<li><a class="btn-sm btn bg-dark float-end border-2" style="width:40vw;color:white;" href="postos.php">Lista de postos</a></li>
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:40vw;color:white;" href="autoriza.php">Atualização de preços</a></li>
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:40vw;color:white;" href="index.php">Sair</a></li>
		</ul>
	</nav>
	<main class="container-fluid">
		<div class="row  mt-5">
            <div class="col text-center">
                <h1 class="text-white">Administrador</h1>
            </div>
        </div>
		<div class="row  mt-5">
			<div class="col"></div>
            <div class="col-md-6 col-xs-8">
                <button onclick="window.location.href='autoriza.php';" class="w-100 btn btn-lg btn-secondary">
                    Aprovar alteração de valores
                </button>
            </div>
            <div class="col"></div>
		</div>
        
        <div class="row  mt-3">
			<div class="col"></div>
            <div class="col-md-6 col-xs-8">
                <button  onclick="window.location.href='postos.php'" class="w-100 btn btn-lg btn-secondary">
                    Listagem de postos
                </button>
            </div>
            <div class="col"></div>
		</div>


	</main>	


	<!-- FIM DO MENU SUPERIOR -->

</body>

</html>