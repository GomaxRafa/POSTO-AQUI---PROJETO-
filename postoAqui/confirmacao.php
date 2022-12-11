<?php
session_start(); //abertura da sessão
include_once "conexao.php";
$num = "";
$senha = "";
$echo = "";
$testeXampp = true;
if (isset($_POST['email']) && !isset($_POST['codigo'])) {
    $email = $_POST['email'];

    $num = rand(1000, 9999); //Rand - sorteia um número entre o mínimo e o máximo
    $msg = "Olá, você iniciou a recuperação de senha no nosso site\nDigite o seguinte código para prosseguir:\n$num";
    // Mensagem concatenando o número e usando \n pra pular linhas

    if (!$testeXampp){
        mail($email,"Recuperação de senha", $msg);
    }
    // Envio do e-mail (não disponível na sua máquina, apenas na hospedagem)

    $_SESSION['codigo'] = $num; //Guardando nela o código que deve ser digitado
    session_write_close(); //Fechando a sessão para registro
}
if (isset($_POST['email'], $_POST['codigo'], $_SESSION['codigo']) && $_POST['codigo'] == $_SESSION['codigo']) {
    $email = $_POST['email'];
    $senha = "" . rand(1000, 9999) . rand(1000, 9999);
    $senha2 = md5($senha);
    $sql = "UPDATE usuario SET senha = '$senha2' WHERE email = '$email'";
    mysqli_query($conn, $sql);
    $msg = "Olá, você concluiu a recuperacao de senha\nUse a seguinte senha para acessar:\n$senha";
    if (!$testeXampp){
        mail($email,"Recuperação de senha", $msg);
    }
    $echo = "<script>success();</script>"; //Guardando o chamado da função pk não pode ser chamada acima do script
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Link tag chamando o arquivo css do bootstrap -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script do framework sweetalert -->
    <script>
        function login() {
            window.location.replace('index.php');
        }

        function success() {
            timeout = setTimeout(login, 7000); // Mandar pra tela de login em 7 segundos
            Swal.fire(
                'Senha recuperada com sucesso!',
                'Verifique o email e faça o login<?php echo $testeXampp ? "<br>Senha: " . $senha : ""; ?>',
                'success'
            )
        }
    </script>
</head>

<body>
    <!-- section: Recuperação de senha -->
    <?php
    echo $echo;
    ?>
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

        <div class="container px-4 py-3 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="text-center card-body px-4 pt-5 px-md-5">
                            <h4 class="mb-2 fw-bold ls-tight" style="color: 000">Código de verificação</h4>
                            <form class="py-4" action="" method="POST">
                                <input value="<?php echo $email; ?>" name="email" type="hidden" class="form-control" id="floatingInput5" placeholder="email@example.com">
                                <!-- Um input hidden guarda o email -->
                                <div class="form-floating mb-3">
                                    <input name="codigo" type="" class="form-control" id="floatingInput5" placeholder="email@example.com">
                                    <label for="floatingInput5"> Código</label>
                                </div>

                                <div class="row my-3">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <h4 class="my-3" style="color: #696969">Informe o código de verificação<br>recebido por e-mail<?php echo $testeXampp && isset($_POST['email']) ? "<br>" . $num : ""; ?></h4>
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-secondary btn-block my-4 rounded-pill px-5">Confirmar código</button>

                                <!-- Register buttons -->
                                <h5 class="mt-5 mb-2" style="color: #696969">
                                    Não recebeu o código?
                                    <a style="color: #102 !important" class="text-muted text-decoration-none" href="esqueci.php?email=<?php echo $email; ?>">
                                        Reenviar código
                                    </a>
                                </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->


</body>

</html>