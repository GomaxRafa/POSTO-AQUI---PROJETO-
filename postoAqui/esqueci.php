<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" href="img/bomba.png" type="imagem">

    <!-- Link tag chamando o arquivo css do bootstrap -->

</head>

<body>
    <!-- section: Recuperação de senha -->

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
                            <h4 class="mb-2 fw-bold ls-tight" style="color: 000">Recuperação de senha</h4>
                            <form class="py-4" action="confirmacao.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""; ?>" name="email" type="text" class="form-control" id="floatingInput5" placeholder="email@example.com">
                                    <label for="floatingInput5"> Email cadastrado</label>
                                </div>

                                <div class="row my-2">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <h4 class="my-4" style="color: #696969">Fique tranquilo !<br> Vamos lhe enviar um<br>email contendo o<br>código de confirmação<br>para recuperação da senha</h4>
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-secondary btn-block mb-4 rounded-pill px-5">Enviar código</button>

                                <!-- Register buttons -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->


</body>

</html>