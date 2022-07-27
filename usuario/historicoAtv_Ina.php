<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="../public/assets/img/favicon.png" type="image/x-icon" />

  <!--=============== REMIX ICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../usuario/assets/css/historicos.css" />

  <link rel="stylesheet" href="../public/assets/css/styles.css" />

  <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


  <title>Tech_used - Historico</title>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="indexLogado.php" class="nav__logo">
        <img src="../public/assets/img/logo.png" alt="" width="100px" height="100px"> Tech_Used
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="indexLogado.php" class="nav__link active-link">Home</a>
          </li>
          <li class="nav__item">
            <a href="indexLogado.php #about" class="nav__link">Sobre</a>
          </li>
          <li class="nav__item">
            <a href="indexLogado.php #products" class="nav__link">Anúncios</a>
          </li>
          <li class="nav__item">
            <a href="indexLogado.php #contact" class="nav__link">Contato</a>
          </li>

          <!-- Fazer um "meio q botao para abrir as opcoes" -->

          <div class="dropdown">
		  <button class="dropbtn">
             <a><?php echo $logado;?></a>
           </button>
		   <div class="dropdown-content">
           <a href="anunciar.php" class="nav__link">Anunciar</a>
           <a href="minhaconta.php" class="nav__link">Minha conta</a>
           <a href="historicoAtv&Ina.php" class="nav__link">Meus anúncios</a>
           <a href="#faqs" class="nav__link">Ajuda</a>
           <a href="../php/sair.php" class="nav__link">Sair</a>
          </div>
        </div>
        </div>
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

	  <!--==================== SIDEBAR ====================-->
	<section id="sidebar">
		<ul class="side-menu top">
			<li class="active">
				<a href="minhaconta.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Meu perfil</span>
				</a>
			</li>
			<li>
				<a href="historicoAtv&Ina.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Anúncios</span>
				</a>
			</li>
		</ul>
	</section>
		  <!--==================== SIDEBAR ====================-->

<br><br><br>

		  <!--==================== CONTENT ====================-->
	<section id="content">
			  <!--==================== MAIN ====================-->
		<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Seus Anúncios</h3>
					</div>
					<table>
						<thead>
							<tr>
              <th></th>
								<th>Titulo do Anúncio</th>
								<th>Data de postagem</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
                include "../php/conexao.php";
                try {
                    $stmt = $db->prepare("SELECT * FROM tbl_anuncio WHERE fk_usu_id = ".$id.";");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "
							<tr>
                                <td><img src='../upload/img/$rs->anu_foto'></td>
                            <td>{$rs->anu_titulo}</td>
                            <td>{$rs->anu_dataPostagem}</td>
							
							<td><a class='button button--flex' href='produto-detalhe.php?cod={$rs->anu_id}'>Visualizar</a></td>
                            <td><a class='button button--flex' href='deleteAnu.php?cod={$rs->anu_id}'>Apagar</a></td>
                            
                            </tr>";
                        }
                    }
                } catch (PDOException $erro) {
                    echo "Erro na conexão:" . $erro->getMessage();
                }
                ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</main>
			  <!--==================== MAIN ====================-->
	</section>
	  <!--==================== MAIN ====================-->
	

  
  <!--==================== FOOTER ====================-->
  <footer class="footer section">
    <div class="footer__container container grid" style="margin-left: 45%;">
      <div class="footer__content">
        <h3 class="footer__title">Contatos</h3>

        <ul class="footer__data">
          <div class="footer__social">
            <a href="https://www.facebook.com/" class="footer__social-link">
              <i class="ri-facebook-fill"></i>
            </a>
            <a href="https://www.instagram.com/" class="footer__social-link">
              <i class="ri-instagram-line"></i>
            </a>
            <a href="https://twitter.com/" class="footer__social-link">
              <i class="ri-twitter-fill"></i>
            </a>
          </div>
        </ul>
      </div>
    </div>

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