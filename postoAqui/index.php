<?php
    include_once "conexao.php";

    if (isset($_POST['email'], $_POST['senha'])) {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $sql = "SELECT * FROM usuario WHERE email = \"$email\" and senha = \"$senha\"";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $linha = mysqli_fetch_array($result);

            session_start(); //Iniciando a sessão
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['id'] = $linha['id'];
            session_write_close(); //Fechando o registro na sessão após a escrita

            //echo "<script>alert(\"Sessão registrada, redirecionamento agora\");</script>";
            echo "<script>window.location.replace('home.php');</script>";
        } else {
            $sql = "SELECT * FROM admin WHERE email = \"$email\" and senha = \"$senha\"";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $linha = mysqli_fetch_array($result);

                session_start(); //Iniciando a sessão
                $_SESSION['nome'] = $linha['nome'];
                $_SESSION['id'] = $linha['id'];
                $_SESSION['adm'] = true;
                session_write_close(); //Fechando o registro na sessão após a escrita

                // echo "<script>alert(\"Sessão registrada, redirecionamento agora\");</script>";
                echo "<script>window.location.replace('dashAdm.php');</script>";
            }
            
            else{
                echo "<script>window.alert('E-mail ou senha inválidos, caso não tenha cadastro clique em CRIAR CONTA')</script>";
            }
        }
  
    }

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv=”content-type” content="text/html;" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="palavras, chave, pesquisa, google" />
    <title>Login</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
        <link rel="icon" href="img/bomba.png" type="imagem">
</head>

<body style="background-color: #000;">
	<main class="">
	<section class="background-radial-gradient overflow-hidden">
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
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <br><br><br>
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="text-center card-body px-4 pt-5 px-md-5">
                            <h1 class="mb-4 display-5 fw-bold ls-tight" style="color: 000">
                                Login
                            </h1>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="email" type="text" class="form-control" id="floatingInput5" placeholder="Ceres">
                                    <label for="floatingInput5"> Email</label>
                                </div>
                                <div class="form-floating mb-1">
                                    <input name="senha" type="password" class="form-control" id="floatingInput6" placeholder="Ceres">
                                    <label for="floatingInput6"> Senha</label>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6"></div>
                                    <div class="col-6  text-end"><a class="small text-muted text-decoration-none" href="esqueci.php">Esqueceu a senha?</a></div>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-secondary btn-block mb-4 rounded-pill px-5">
                                    Entrar
                                </button>

                            </form>
                            <p class="small text-muted">Não possui conta? <a class="text-muted fw-bold text-decoration-none" href="cadastro.php">Criar conta</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br><br><br>
    </section>
	</main>	


</body>

</html>

