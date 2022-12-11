<?php
	include_once "conexao.php";
	include_once "session.php";
	
	$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "etanol"; //Operador ternário, armazena o filtro ou o padrão

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv=”content-type” content="text/html;" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="palavras, chave, pesquisa, google" />
	<title>Posto aqui - Módulo do USUÁRIO </title>
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

<body style="background-color: #b3b3b3;">
	<!-- INÍCIO DO MENU SUPERIOR -->
	<!-- Lembrar order by preço desc -->

	<nav class="navbar navbar-dark float-end d-inline" style="padding-right:2vw;background-color: #b3b3b3;">

	</nav>
	<nav class="navbar navbar-dark float-end d-inline"
		style="z-index:1000;padding-right:2vw;background-color: #b3b3b3;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
			aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<nav class="navbar" style="padding-left:2vw;background-color: #b3b3b3;">
		<button class="navbar-btn btn btn-md pb-1" style="color:white;" type="button" data-toggle="collapse"
			data-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent2"
			aria-expanded="false" aria-label="Alterna navegação">
			Filtros
		</button>
	</nav>
	<nav id="navbarToggleExternalContent" class="collapse">
		<ul class="nav navbar-nav ">
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;"
					href="cadastro.php?id=<?php echo $iduser;?>">Editar
					perfil</a></li>
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;" href="home.php">Lista de			postos</a></li>

			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;" href="index.php">Sair</a></li>
		</ul>
	</nav>
	<nav id="navbarToggleExternalContent2" class="collapse">
		<ul class="nav navbar-nav ml-4">
			<li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;"
					href="home.php?filtro=etanol">Etanol</a></li>
			<li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;"
					href="home.php?filtro=gasolina">Gasolina</a></li>
			<li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;"
					href="home.php?filtro=diesels500">Diesel S500</a></li>
			<li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;"
					href="home.php?filtro=diesels10">Diesel S10</a></li>
		</ul>
	</nav>

	<main class="container-fluid">
		<div class="row">
			<div class="col text-center">
				<h1 class=" display-5 fw-bold ls-tight" style="color: 000">
					<?php 
						
						if ($filtro == 'etanol'){
							echo "Etanol";
						}

						if ($filtro == 'gasolina'){
							echo "Gasolina";
						}

						if ($filtro == 'diesels500'){
							echo "Diesel S500";
						}

						if ($filtro == 'diesels10'){
							echo "Diesel S10";
						}

					

					?>
				</h1>
			</div>
		</div>
		<?php
			$sql = "SELECT min($filtro) as precoMin, max($filtro) as precoMax FROM posto";
			$result = mysqli_query($conn, $sql);
			$linha = mysqli_fetch_array($result);
			$max = $linha['precoMax'];
			$min = $linha['precoMin'];
			$diff = $max - $min;
		
		?>
		<div class="row p-3 mb-3" style="background-color:#0c0c0c;">
			<div class="col text-center">
				<h4 class="text-white">Menor</h4>
				<h3 style="color:greenyellow;">R$ <?php echo $min;?></h3>
			</div>
			<div class="col text-center">
				<h4  class="text-white">Diferença</h4>
				<h3 style="color:yellow;">R$ <?php echo $diff;?></h3>
			</div>
			<div class="col text-center">
				<h4  class="text-white">Maior</h4>
				<h3 style="color:red;">R$ <?php echo $max;?></h3>
			</div>
		</div>
		
		<?php
			$sql = "SELECT c.nome as city, p.id, p.nome, p.endereco, p.bandeira, p.cidade, $filtro as preco FROM posto p JOIN cidade c ON p.cidade = c.id ORDER BY $filtro ASC";		
			
			$result = mysqli_query($conn, $sql);
			$primeiro = true;
			$mb = true; //Mais barato
			while($linha = mysqli_fetch_array($result)){
				if ($primeiro){
					$primeiro = false;
				}
				$id = $linha['id'];
				$nome = $linha['nome'];
				$endereco = $linha['endereco'];
				$bandeira = $linha['bandeira'];
				$cidade = $linha['city'];
				$preco = $linha['preco'];
				
				$mc = $preco == $max ? true : false;
				
	
		?>
		
		<div class="row">
			<div class="col-4 text-end">

				<?php 
					if($bandeira == 1){
						$bandeira = "img/1.png";
					}

					if($bandeira == 2){
						$bandeira = "img/2.png";
					}

					if($bandeira == 3){
						$bandeira = "img/3.jpg";
					}

					if($bandeira == 4){
						$bandeira = "img/4.png";
					}
				?>
				
				<img src= "<?php echo $bandeira ?>" width="100px" alt="Foto bandeira">
			</div>
			<div class="col-3">
				<h2><?php echo $nome;?></h2>
			
			</div>
			
			<div class="col-5"  onclick="window.location.replace('info.php?id=<?php echo $id;?>')">
				<h2>R$ <?php echo $preco;?></h2>
				<?php echo $mb ? "<h5 style='color:greenyellow;'>Mais barato</h5>":"";?>
				<?php echo $mc ? "<h5 style='color:red;'>Mais caro</h5>":"";?>
			</div>

			
		</div>
		<div class="row text-center">
			<div class="col">
				<p><?php echo $endereco . " - " . $cidade;?></p>
			</div>
		</div>
			
		<hr>	


		<?php
				$mb = false;
			}

		?>
	</main>


	<!-- FIM DO MENU SUPERIOR -->

</body>

</html>