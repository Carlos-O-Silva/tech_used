<?php
session_start();
if (!isset($_SESSION['adm_nome'])) {
  header('location: login.php');
}

$logado = $_SESSION['adm_nome'];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <<!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../public/assets/img/icone.png" type="image/x-icon" />

<!--=============== REMIX ICONS ===============-->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../admin/assets/css/style_admin.css" />

    <link rel="stylesheet" href="../usuario/assets/css/historicos.css" />

    <link rel="stylesheet" href="../public/assets/css/styles.css" />

    <title>Tech_used - Anúncios</title>
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
                        <a href="index_admin.php" class="nav__link active-link">Home</a>
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
    <br>
    <br>

    <section id="content">
			  <!--==================== MAIN ====================-->
		<main>
        <section class="steps section container">
        <div class="steps__bg">
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Anúncios Cadastrados</h3>
					</div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Foto do anúncio</th>
                    <th>ID do anúncio</th>
                    <th>Título do anúncio</th>
                    <th>Marca do anúncio</th>
                    <th>Modelo</th>
                    
                    <th>AÇÕES</th>
                </tr>


                <br>
                <br>


            </thead>
            <tbody>
                <?php
                include "../php/conexao.php";
                try {
                    $stmt = $db->prepare("SELECT * FROM tbl_anuncio ORDER BY anu_id DESC;");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>
                            <td><img width='100' style='border-radius: 50%; float:right;'src='../upload/img/$rs->anu_foto'></td>
                            <td>{$rs->anu_id}</td>
                            <td>{$rs->anu_titulo}</td>
                            <td>{$rs->anu_marca}</td>
                            <td>{$rs->anu_modelo}</td>
                            
                            <td><a class='button button--flex' href='visualizarAnuncio.php?cod={$rs->anu_id}'>Visualizar</a></td>
                            
                            
                            </tr>";
                        }
                    }
                } catch (PDOException $erro) {
                    echo "Erro na conexão:" . $erro->getMessage();
                }
                ?>
            </tbody>
        </table>
            
        </tbody>
    </div>
</main>
            </section>
</body>


  <!--=============== SCROLL UP ===============-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-fill scrollup__icon"></i>
  </a>

  <!--=============== SCROLL REVEAL ===============-->
  <script src="../public/assets/js/scrollreveal.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="../public/assets/js/main.js"></script>
</html>

