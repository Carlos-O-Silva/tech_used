<?php
session_start();
if (!isset($_SESSION['adm_nome'])) {
  header('location: login.php');
}

$logado = $_SESSION['adm_nome'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../public/assets/img/icone.png" type="image/x-icon" />

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../admin/assets/css/style_admin.css">

    <title>Tech_used - Home_ADMIN</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
    <nav class="nav container">
      <a href="index_admin.php" class="nav__logo">
        <img src="../public/assets/img/logo.png" alt="" width="100px" height="100px"> Tech_Used
      </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="logout.php" class="nav__link">Sair</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
        <hr class="line">
    </header>

    <!--==================== STEPS ====================-->
    <section class="steps section container">
        <div class="steps__bg">
        <h2 class="section__title-center steps__title">
                Bem vindo, <?php echo $logado;?>
            </h2>

            <h2 class="section__title-center steps__title">
                Menu
            </h2>

            <div class="steps__container grid">
                <div class="steps__card">
                    <div class="steps__card-number">01</div>
                    <h3 class="steps__card-title">Delete</h3>
                    <p class="steps__card-description">
                        Funcionalidade para desativar usuários.
                    </p>
                    <br />
                    <a href="mostrarUsuariosDELETE.php" class="nav__link" style="text-align: center;">
                        Editar
                    </a>
                </div>

                <div class="steps__card">
                    <div class="steps__card-number">02</div>
                    <h3 class="steps__card-title">Anúncios</h3>
                    <p class="steps__card-description">
                        Funcionalidade para visualizar e excluir anúncios indevidos.
                    </p>
                    <br />
                    <a href="mostrarAnuncios.php" class="nav__link" style="text-align: center;">
                    Visualizar
                        </a>
                </div>

               

                <div class="steps__card">
                    <div class="steps__card-number">03</div>
                    <h3 class="steps__card-title">Informações dos Usuários</h3>
                    <p class="steps__card-description">
                    Funcionalidade para visualizar informações do usuário.
                    </p>
                    <br />
                    <a href="mostrarUsuariosEDITAR.php" class="nav__link" style="text-align: center;">
                        Visualizar</a>
                </div>

               
                <div class="steps__card">
                    <div class="steps__card-number">04</div>
                    <h3 class="steps__card-title">Denuncias</h3>
                    <p class="steps__card-description">
                        Funcionalidade para visualizar denuncias feitas de perfis e anúncios.
                    </p>
                    <br />
                    <a href="" class="nav__link" style="text-align: center;">Denunciar</a>
                </div>
                <div class="steps__card">
                    <div class="steps__card-number">05</div>
                    <h3 class="steps__card-title"> Buscar Anúncios</h3>
                    <p class="steps__card-description">
                        Funcionalidade para buscar Anúncios Ativos.
                    </p>
                    <br />
                    <a href="buscarAnuncio.php" class="nav__link" style="text-align: center;">
                    Buscar
                    </a>
                </div>
                 <div class="steps__card">
                    <div class="steps__card-number">06</div>
                    <h3 class="steps__card-title">Buscar Usuários </h3>
                    <p class="steps__card-description">
                     Funcionalidade para buscar Usuários Ativos.
                    </p>
                    <br />
                    <a href="buscarUsuario.php" class="nav__link" style="text-align: center;">
                        Buscar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <p class="footer__copy">&#169; Tech_Used. All rigths reserved</p>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-fill scrollup__icon"></i>
  </a>

  <!--=============== SCROLL REVEAL ===============-->
  <script src="../public/assets/js/scrollreveal.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="../public/assets/js/main.js"></script>
</body>

</html>