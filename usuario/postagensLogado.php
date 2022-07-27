<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];

?>



<!DOCTYPE html>
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
  <link rel="stylesheet" href="../public/assets/css/styles.css" />
  
  <link rel="stylesheet" href="../public/assets/css/search.css" />

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Tech_used - Postagens</title>
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
            <a href="indexLogado.php #home" class="nav__link active-link">Home</a>
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

  <!--==================== PRODUCTS ====================-->
  <section class="product section container" id="products">

  

    

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    ?>
    
    <!-- <form method="POST" action="">
        <input type="text" name="anu_titulo" placeholder="" value="<?php if(isset($dados['anu_titulo'])){ echo $dados['anu_titulo']; } ?>"><br><br>

        <input type="submit" name="pesqUsuario" id="pesqUsuario"><br><br>
    </form> -->

    <form method="POST" action="">    
    <div class="search-div">
    <input type="text" name="anu_titulo"  class="search" placeholder="" value="<?php if(isset($dados['anu_titulo'])){ echo $dados['anu_titulo']; } ?>">
       <input class="button button--flex" value="Buscar" type="submit" name="pesqUsuario" id="pesqUsuario" >
      </div> <br><br>
   </form>


    <?php
    include '../php/conexao.php';
    if (!empty($dados['pesqUsuario'])) {
        $nome = "%" . $dados['anu_titulo'] . "%";
        //$nome = "%Cesar%";

        $query_usuarios = "SELECT anu_titulo, anu_modelo, anu_preco, anu_foto, anu_id FROM tbl_anuncio WHERE anu_titulo LIKE :anu_titulo ORDER BY anu_titulo ASC";
        $result_usuarios = $db->prepare($query_usuarios);
        $result_usuarios->bindParam(':anu_titulo', $nome, PDO::PARAM_STR);

        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row_usuario);
            extract($row_usuario);
            echo "<div class='product__container grid'>
                    <article class='product__card'>
                      <a href='produto-detalhe.php?cod=$anu_id'><img src='../upload/img/$anu_foto' alt='' class='product__img' /></a>

                              <h3 class='product__title'>$anu_titulo</h3>
                              <span class='product__price'>R$ $anu_preco</span>

                              <button class='button--flex product__button'>
                                <i class='ri-shopping-bag-line'></i>
                              </button>
                            
                    </article>
                            </div>";
        }
    }



    ?>
<h2 class="section__title-center">
      Todos os <br />
      Anúncios
    </h2>
    <!-- <div class="search-div">
    <input type="text" class="search" placeholder="">
    <a href=""><i class="ri-search-line" id="mglass"></i></a>
  </div>
   -->
  
    <div class="product__container grid">
    <?php
            include "../php/conexao.php";
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_anuncio ORDER BY anu_id DESC LIMIT 48;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $anu_id = $rs->anu_id;
                      $anu_titulo = $rs->anu_titulo;
                      $anu_descricao = $rs->anu_descricao;
                      $anu_modelo = $rs->anu_modelo;
                      $anu_dataPostagem = $rs->anu_dataPostagem;   
                      $anu_preco = $rs->anu_preco;
                      $anu_foto = $rs->anu_foto;
                      echo " <article class='product__card'>
                      <a href='produto-detalhe.php?cod=$anu_id'><img src='../upload/img/$anu_foto' alt='' class='product__img' /></a>

                              <h3 class='product__title'>$anu_titulo</h3>
                              <span class='product__price'>R$ $anu_preco</span>

                              <button class='button--flex product__button'>
                                <i class='ri-shopping-bag-line'></i>
                              </button>
                            
                            </article>";

                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?> 
    </div>
  </section>

  <!--==================== STEPS ====================-->
  

  <!--==================== STEPS ====================-->

  <section class="steps section container">
    <div class="steps__bg">
      <h2 class="section__title-center steps__title">
        Adsense
      </h2>
  </section>
  <!--==================== PRODUCTS ====================-->

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

  <script type="text/javascript" src=".../public/assets/css/searchAN.js"></script>

</body>

</html>