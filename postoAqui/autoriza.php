<?php
include_once "conexao.php";
include_once "sessionAdm.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv=”content-type” content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="palavras, chave, pesquisa, google" />
    <title>Aprovação de Valores - ADM</title>
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
    <script>
        function autoriza() {
            window.location.replace('dashAdm.php');
        }
    </script>
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
        <button onclick="autoriza();" class="navbar-btn btn btn-md pb-1" style="color:white;" type="button">
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

    <main class="container-fluid bg-white py-3 mt-3">
        <div class="row table-responsive">
            <div class="col"></div>
            <div class="col-10"></div>
            <table class="table table-sm w-90">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Posto</th>
                        <th scope="col">Etanol</th>
                        <th scope="col">Gasolina</th>
                        <th scope="col">Diesel<br> S500</th>
                        <th scope="col">Diesel<br> S10</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT pe.*, po.nome, po.etanol as p1, po.gasolina as p2, po.diesels500 as p3, po.diesels10 as p4 FROM pedido pe JOIN posto po ON pe.posto = po.id;";
                    $result = mysqli_query($conn, $sql);

                    while ($linha = mysqli_fetch_array($result)) {



                        $id = $linha['id'];
                        $etanol = $linha['etanol'];
                        $gasolina = $linha['gasolina'];
                        $diesels5 = $linha['diesels500'];
                        $diesels10 = $linha['diesels10'];
                        $p1 = $linha['p1'];
                        $p2 = $linha['p2'];
                        $p3 = $linha['p3'];
                        $p4 = $linha['p4'];
                        $posto = $linha['nome'];

                    ?>
                        <tr class="text-center">
                            <td><?php echo $posto; ?></td>
                            <td><?php echo "R$" . $p1 . "<br> -> <br>R$" . $etanol; ?></td>
                            <td><?php echo "R$" . $p2 . "<br> -> <br>R$" . $gasolina; ?></td>
                            <td><?php echo "R$" . $p3 . "<br> -> <br>R$" . $diesels5; ?></td>
                            <td><?php echo "R$" . $p4 . "<br> -> <br>R$" . $diesels10; ?></td>
                            <td>
                                <a href="responder.php?resp=1&id=<?php echo $id ?>" class="btn btn-sm text-success">Aprovar</a><br>
                                <a href="responder.php?resp=0&id=<?php echo $id ?>" class="btn btn-sm text-danger">Reprovar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="col"></div>
        </div>
        <hr>


    </main>



</body>

</html>