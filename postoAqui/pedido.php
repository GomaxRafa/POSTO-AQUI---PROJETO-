<?php

include_once "conexao.php";
include_once "session.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv=”content-type” content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="palavras, chave, pesquisa, google" />
    <title>Pedido de alteração - Usuário</title>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script do framework sweetalert -->
    <script>
        function home() {
            window.location.replace('home.php');
        }

        function success(msg) {
            timeout = setTimeout(home, 3500);
            Swal.fire(
                'Tudo certo!',
                msg,
                'success'
            )
        }

        function error(msg) {

            Swal.fire(
                msg,
                'Verifique o preenchimento dos campos!',
                'error'
            )
        }
        // Criação das funções que mostra o alert indicando o resultado (erro ou sucesso) do cadastro
    </script>
</head>

<script> window.confirm("Ao inserir o valor no campo desejado, use ponto (.) ao invés de vírgula (,)") </script>

<body style="background-color: #000;">


    </nav>
    <nav id="navbarToggleExternalContent2" class="collapse">
        <ul class="nav navbar-nav ml-4">
            <li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;" href="home.php?filtro=etanol">Etanol</a></li>
            <li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;" href="home.php?filtro=gasolina">Gasolina</a></li>
            <li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;" href="home.php?filtro=diesels500">Diesel S500</a></li>
            <li><a class="btn-sm btn bg-dark float-start border-2" style="width:20vw;color:white;" href="home.php?filtro=diesels10">Diesel S10</a></li>
        </ul>
    </nav>
    <main class="">


        <?php

        // Definição das variáveis vazias pra não dar erro no cadastro e o layout servir para cadastro e edição

        if (isset($_GET['id'], $_POST['etanol'], $_POST['gasolina'], $_POST['diesel1'], $_POST['diesel2'])) {
            // echo "Obteve as infos";
            $etanol = $_POST['etanol'];
            $gasolina = $_POST['gasolina'];
            $diesel1 = $_POST['diesel1'];
            $diesel2 = $_POST['diesel2'];
            $posto = $_GET['id'];
            $sql = "INSERT INTO pedido (etanol, gasolina, diesels500, diesels10, posto) VALUES ('$etanol','$gasolina','$diesel1','$diesel2','$posto');";
            // echo $sql;
            if (mysqli_query($conn, $sql)) {

                echo "<script>success('Pedido cadastrado com sucesso!');</script>";
            } else {
                $msg = "Erro ao cadastrar pedido.";
                echo "<script>error('$msg');</script>";
                $m = true;
            }
        }




        ?>

        <section class="container-fluid background-radial-gradient overflow-hidden">
            <style>
                .background-radial-gradient {
                    background-color: hsl(218, 41%, 15%);
                    background-image: radial-gradient(650px circle at 0% 0%,
                            hsl(218, 41%, 35%) 15%,
                            hsl(218, 41%, 30%) 35%,
                            hsl(218, 41%, 20%) 75%,
                            hsl(218, 41%, 19%) 80%,
                            transparent 100%),
                        radial-gradient(1250px circle at 100% 100%,
                            hsl(218, 41%, 45%) 15%,
                            hsl(218, 41%, 30%) 35%,
                            hsl(218, 41%, 20%) 75%,
                            hsl(218, 41%, 19%) 80%,
                            transparent 100%);
                }

                #radius-shape-1 {
                    height: 220px;
                    width: 220px;
                    top: -60px;
                    left: -130px;
                    background: radial-gradient(#44006b, #ad1fff);
                    overflow: hidden;
                }

                #radius-shape-2 {
                    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                    bottom: -60px;
                    right: -110px;
                    width: 300px;
                    height: 300px;
                    background: radial-gradient(#44006b, #ad1fff);
                    overflow: hidden;
                }

                .bg-glass {
                    background-color: hsla(0, 0%, 100%, 0.9) !important;
                    backdrop-filter: saturate(200%) blur(25px);
                }
            </style>

            <div class="container px-4 pb-5 px-md-5 text-center text-lg-start my-5">
                <div class="row gx-lg-5 align-items-center mb-5">

                    <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="text-center card-body px-4 pt-5 px-md-5">
                                <h1 class="mb-4 display-5 fw-bold ls-tight" style="color: 000">
                                    <?php echo isset($_GET['id']) ? "Preço sugerido" : "Necessário envio de id"; ?>
                                </h1>
                                <form action="" method="POST">
                                    <div class="form-floating mb-3">
                                        <input name="etanol" type="text" class="form-control" id="floatingInput1" placeholder="Preço sugerido">
                                        <label for="floatingInput1"> Etanol</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="gasolina" type="text" class="form-control" id="floatingInput1" placeholder="Preço sugerido">
                                        <label for="floatingInput1"> Gasolina</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="diesel1" type="text" class="form-control" id="floatingInput1" placeholder="Preço sugerido">
                                        <label for="floatingInput1"> Diesel S500</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="diesel2" type="text" class="form-control" id="floatingInput1" placeholder="Preço sugerido">
                                        <label for="floatingInput1"> Diesel S10</label>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-secondary btn-block mb-4 rounded-pill px-5">
                                        Enviar
                                    </button>

                                    <!-- Register buttons -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



</body>

</html>