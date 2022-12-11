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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script do framework sweetalert -->
    <script>
        function login(){
            window.location.replace('home.php');
        }
        function success(msg){
            timeout = setTimeout(login, 3500);
            Swal.fire(
                'Tudo certo!',
                msg,
                'success'
            )
        }
        function error(msg){
            
            Swal.fire(
                msg,
                'Verifique o preenchimento dos campos!',
                'error'
            )
        }
        // Criação das funções que mostra o alert indicando o resultado (erro ou sucesso) do cadastro
        
    </script>
</head>

<body style="background-color: #000;">
	<main class="">
    <?php
        
        include_once "conexao.php";
            
        $nome = "";
        $cidade = "";
        $cep = "";
        $telefone = "";
        $email = "";

        // Definição das variáveis vazias pra não dar erro no cadastro e o layout servir para cadastro e edição

        if (isset($_GET['id'])) {
            // Se o id foi enviado, é uma edição de usuário, portanto fazemos o select e buscamos os dados
            $id = $_GET['id'];
            $sql = "SELECT * FROM usuario WHERE id = $id;";
            $result = mysqli_query($conn, $sql);
            $linha = mysqli_fetch_array($result);
            $nome = $linha['nome'];
            $cidade = $linha['cidade'];
            $cep = $linha['cep'];
            $telefone = $linha['telefone'];
            $email = $linha['email'];
            
            $sql = "UPDATE usuario SET ";
            $edit = false;
            
            // Apenas os dados enviados são editados, e o comando vai sendo escrito

            if (isset($_POST['nome'])) {
                $nome = $_POST['nome'];
                $sql .= "nome = '$nome'";
                $edit = true;
            }
            if (isset($_POST['cidade'])) {
                $cidade = $_POST['cidade'];
                if ($edit) {
                    $sql .= ",";
                }
                $sql .= "cidade = '$cidade'";
                $edit = true;
            }
            if (isset($_POST['cep'])) {
                $cep = $_POST['cep'];
                if ($edit) {
                    $sql .= ",";
                }
                $sql .= "cep = '$cep'";
                $edit = true;
            }
            if (isset($_POST['telefone'])) {
                $telefone = $_POST['telefone'];
                if ($edit) {
                    $sql .= ",";
                }
                $sql .= "telefone = '$telefone'";
                $edit = true;
            }
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                if ($edit) {
                    $sql .= ",";
                }
                $sql .= "email = '$email'";
                $edit = true;
            }
            if (isset($_POST['senha'], $_POST['confSenha'])) {    
                if($_POST['senha'] != $_POST['confSenha']){
                    echo "<script>error('As senhas não conferem');</script>";
                }
                else{
                    $senha = md5($_POST['senha']);
                    if ($edit) {
                        $sql .= ",";
                    }
                    $sql .= "senha = '$senha'";
                    $edit = true;
                }
            }
            
            
            if ($edit) {

                $sql .= " WHERE id = $id;";
                // echo $sql;
                if (mysqli_query($conn, $sql)) {
                    echo "<script>success('Edição efetuada com sucesso!');</script>";
                } else {
                    $msg = "Erro ao editar.";
                    echo "<script>error('$msg');</script>";
                    $m = true;
                }
            }
        }
        else if (isset($_POST['nome'], $_POST['cidade'], $_POST['cep'], $_POST['telefone'], $_POST['email']
        , $_POST['senha'], $_POST['confSenha'])) {
            // echo "Obteve as infos";
            if ($_POST['senha'] != $_POST['confSenha']){
                echo "<script>error('As senhas não conferem');</script>";
            }
            else{
                
                $nome = $_POST['nome'];
                $cidade = $_POST['cidade'];
                $cep = $_POST['cep'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $senha = md5($_POST['senha']);

                $sql = "INSERT INTO usuario (nome, cidade, cep, telefone, email, senha) VALUES ('$nome', '$cidade', '$cep', '$telefone', '$email', '$senha');";
                // echo $sql;
                if (mysqli_query($conn, $sql)) {

                    echo "<script>success('Cadastro efetuado com sucesso!');</script>";
                }
                else {
                    $msg = "Erro ao cadastrar usuário.";
                    echo "<script>error('$msg');</script>";
                    $m = true;
                }
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

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="text-center card-body px-4 pt-5 px-md-5">
                            <h1 class="mb-4 display-5 fw-bold ls-tight" style="color: 000">
                                <?php echo isset($_GET['id']) ? "Edição" : "Cadastro";?>
                            </h1>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $nome;?>" name="nome" type="text" class="form-control" id="floatingInput1" placeholder="João Silva Alberto">
                                    <label for="floatingInput1"> Nome completo</label>
                                </div>

                                    
                                <div class="form-floating mb-3">
                                    <select name="cidade" class="form-control">
                                        <?php
                                        $sql = "SELECT * FROM cidade";
                                        $result = mysqli_query($conn, $sql);
                                        while ($linha = mysqli_fetch_array($result)) {
                                            $idc = $linha['id'];
                                            $nome = $linha['nome'];
                                            $txt = $idc == $cidade ? "selected" : "";
                                            echo "<option value=\"$idc\" $txt>$nome</option>";

                  
                                        }
                                        ?>
                                    </select>
                                    </div>
                                <div class="form-floating mb-3">
                                    <input  value="<?php echo $cep;?>"  name="cep" type="text" class="form-control" id="floatingInput3" placeholder="Cep">
                                    <label for="floatingInput3"> Cep</label>
                                </div>

                                <div class="form-floating mb-5">
                                    <input  value="<?php echo $telefone;?>"  name="telefone" type="text" class="form-control" id="floatingInput4" placeholder="Ceres">
                                    <label for="floatingInput4"> Telefone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input  value="<?php echo $email;?>"  name="email" type="text" class="form-control" id="floatingInput5" placeholder="Ceres">
                                    <label for="floatingInput5"> Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="senha" type="password" class="form-control" id="floatingInput6" placeholder="Ceres">
                                    <label for="floatingInput6"> Senha <?php echo isset($_GET['id']) ? "(caso deseje alterar)" : "";?></label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input name="confSenha" type="password" class="form-control" id="floatingInput7" placeholder="Ceres">
                                    <label for="floatingInput7"> Confirmação da senha <?php echo isset($_GET['id']) ? "(caso deseje alterar)" : "";?></label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-secondary btn-block mb-4 rounded-pill px-5">
                                    <?php echo isset($_GET['id']) ? "Editar" : "Cadastrar";?>
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