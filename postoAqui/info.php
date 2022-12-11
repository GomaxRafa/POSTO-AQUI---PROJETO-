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
    <title>Informações do postos - Usuário</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/bomba.png" type="imagem">


    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->

    <!-- ESTILOS PARA ESTA PÁGINA -->
    <!-- Adição do material icons pra usar os ícones na navbar -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- JAVASCRIPT E JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(75, 100, 145);">
    <!-- INÍCIO DO MENU SUPERIOR -->
    <!-- Lembrar order by preço desc -->

    <nav class="navbar navbar-dark float-end d-inline" style="padding-right:2vw;background-color: rgb(75, 100, 145);">

    </nav>
    <nav class="navbar navbar-dark float-end d-inline" style="z-index:1000;padding-right:2vw;background-color: rgb(75, 100, 145);">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <nav class="navbar" style="padding-left:2vw;background-color: rgb(75, 100, 145);">
        <button onclick="history.go(-1);" class="navbar-btn btn btn-md pb-1" style="color:white;" type="button">
            <span class="material-icons">
                arrow_back
            </span>
        </button>
    </nav>
    <nav id="navbarToggleExternalContent" class="collapse">
    <ul class="nav navbar-nav ">
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;"
					href="cadastro.php?id=<?php echo $iduser;?>">Editar
					perfil</a></li>
			<li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;" href="home.php">Lista de
					postos</a></li>
            <li><a class="btn-sm btn bg-dark float-end border-2" style="width:30vw;color:white;" href="index.php">Sair</a></li>
		</ul>
    </nav>

    <main class="container-fluid bg-white py-3 mt-3">
        <?php
        $sql = "SELECT p.*,b.nome as bandeira, c.nome as city FROM posto p JOIN bandeira b ON p.bandeira = b.id JOIN cidade c ON p.cidade = c.id and p.id = " . $_GET['id'];
        $result = mysqli_query($conn, $sql);

        $linha = mysqli_fetch_array($result);


        $id = $linha['id'];
        $nome = $linha['nome'];
        $endereco = $linha['endereco'];
        $cidade = $linha['city'];
        $bandeira = $linha['bandeira'];
       
        $etanol = $linha['etanol'];
        $gasolina = $linha['gasolina'];
        $diesels5 = $linha['diesels500'];
        $diesels10 = $linha['diesels10'];
        
        
		if($bandeira == 'Outros'){
			$img = "img/4.png";
		}

        if($bandeira == 'Petrobrás'){
			$img = "img/1.png";
		}
            
        if($bandeira == 'Shell'){
			$img = "img/2.png";
		}

        if($bandeira == 'Ipiranga'){
			$img = "img/3.jpg";
		}

		?>
        <div class="row">
            <div class="col-6 text-end">
                <img src="<?php echo $img ?>" width="150px" alt="Foto bandeira">
                
            </div>
            <div class="col-6">
                <h1><?php echo $nome; ?></h1>
                <h2>Bandeira: <?php echo $bandeira; ?></h2>

            </div>



        </div>
        <div class="row mr-5">
            <div class="col">
                <h1 class="text-muted"><?php echo $endereco . " - " . $cidade; ?></h1>
            </div>
        </div>
        <hr>
        <p class="w-100 text-center text-muted">Valores</p>
        
        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Etanol</th>
                    <th scope="col">Gasolina</th>
                    <th scope="col">Diesel S500</th>
                    <th scope="col">Diesel S10</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $etanol;?></td>
                    <td><?php echo $gasolina;?></td>
                    <td><?php echo $diesels5;?></td>
                    <td><?php echo $diesels10;?></td>
                </tr>
            </tbody>
        </table>
        
        <hr>
        
        <p class="w-100 text-center text-muted">Solicitar alteração</p>
        <hr>
        <div class="text-center"><a href="pedido.php?id=<?php echo $id;?>" class="btn btn-lg btn-secondary">Enviar pedido de alteração</a></div>


    </main>



</body>

</html>