<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
} else {
  
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
  <link rel="shortcut icon" href="../public/assets/img/icone.png" type="image/x-icon" />

  <!--=============== REMIX ICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../public/assets/css/styles.css" />

  <title>Tech_used - Home</title>
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
            <a href="#home" class="nav__link active-link">Home</a>
          </li>
          <li class="nav__item">
            <a href="#products" class="nav__link">Anúncios</a>
          </li>
          <li class="nav__item">
            <a href="#faqs" class="nav__link">Ajuda</a>
          </li>
          <div class="dropdown">
           <button class="dropbtn">
             <a><?php echo $logado;?></a>
           </button>
         <div class="dropdown-content">
           <a href="anunciar.php" class="nav__link">Anunciar</a>
           <a href="minhaconta.php" class="nav__link">Minha conta</a>
           <a href="historicoAtv&Ina.php" class="nav__link">Meus anúncios</a>
           <a href="#contact"     class="nav__link">Contato</a>
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

  <!--==================== HOME ====================-->
  <section class="home" id="home">
    <div class="home__container container grid">
    <img src="../public/assets/img/e-commerce.png" alt="" class="home__img" />

      <div class="home__data">
        <h1 class="home__title">
          Anúncie já, não perca tempo
        </h1>
        <p class="home__description">
          Coloque seu anúncio em destaque e venda 100% mais rápido Gratuitamente.
        </p>
        <a href="anunciar.php" class="button button--flex">
          Anucie aqui <i class="ri-arrow-right-down-line button__icon"></i>
        </a>
      </div>

      <div class="home__social">
        <span class="home__social-follow">Nos siga</span>

        <div class="home__social-links">
          <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
            <i class="ri-facebook-fill"></i>
          </a>
          <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
            <i class="ri-instagram-line"></i>
          </a>
          <a href="https://twitter.com/" target="_blank" class="home__social-link">
            <i class="ri-twitter-fill"></i>
          </a>
        </div>
      </div>
    </div>
  </section>


  <!--==================== STEPS ====================-->
  <section class="steps section container">
    <div class="steps__bg">
      <img src="../public/assets/img/adsense.jpg" alt="" srcset="" style="height: 5rem; margin-left: 35%;">
    </div>
  </section>

  <!--==================== PRODUTOS ====================-->
  <section class="product section container" id="products">
    <h2 class="section__title-center">
      Destaques <br />
      de hoje
    </h2>

    <p class="product__description">
      Anúncios Recentes
    </p>

    <div class="product__container grid">
    <?php
            include "../php/conexao.php";
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_anuncio ORDER BY anu_id DESC LIMIT 6;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $anu_id = $rs->anu_id;
                      $anu_titulo = $rs->anu_titulo;
                      $anu_descricao = $rs->anu_descricao;
                      $anu_modelo = $rs->anu_modelo;
                      $anu_dataPostagem = $rs->anu_dataPostagem;   
                      $anu_preco = $rs->anu_preco;
                      $anu_foto = $rs->anu_foto;  
                      echo "  <article class='product__card'>
                              <br>
                              <br>
                              <a href='produto-detalhe.php?cod=$anu_id'><img src='../upload/img/$anu_foto' alt='' class='product__img' /></a>

                              <h3 class='product__title'>$anu_titulo</h3>
                              <span class='product__price'>R$ $anu_preco</span>
                              
                              <button class='button--flex product__button'>
                                <i class='ri-shopping-bag-line'></i>
                               </button>

                              </article> ";
                            
                                

                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?> 
       

      <a href="postagensLogado.php" class="button--link button--flex">
        Veja mais <i class="ri-arrow-right-down-line button__icon"></i>
      </a>
    </div>
  </section>

  <!--==================== STEPS ====================-->
  <section class="steps section container">
    <div class="steps__bg">
      <img src="../public/assets/img/adsense.jpg" alt="" srcset="" style="height: 5rem; margin-left: 35%;">
    </div>
  </section>

   <!--==================== PERGUNTAS FREQUENTES ====================-->
   <section class="questions section" id="faqs">
      <h2 class="section__title-center questions__title container">
        Central de ajuda<br />
        Perguntas frequentes
      </h2>
      <div class="questions__container container grid">
        <div class="questions__group">
          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                Como anunciar?
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
               PASSOS
              </p>
            </div>
          </div>

          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                Gostou de um Produto?
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
                Após escolher o produto desejado clique em "Contato".
                <br />
                Apartir de agora é com você, negocie com o anunciante e garanta já o seu Produto.
              </p>
            </div>
          </div>
          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                Vantagens em Anunciar
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
                Vender no Tech_Used é seguro.
                <br>Loja personalizada.
                <br>Dúvidas? <a href="#contact">Clique aqui</a>.
              </p>
            </div>
          </div>
        </div>

        <div class="questions__group">
          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                Golpes, roubos e etc.
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
                <br>NÃO REEMBOLSAMOS CASO HAJA GOLPE.
                <BR>SOMOS APENAS ANUNCIANTES.
              </p>
            </div>
          </div>

          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                IMEI
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
               Para anunciar, você precisará do número de IMEI do celular. <br>
               Não sabe como consultar o número de IMEI? <br> <a href="https://www.gov.br/anatel/pt-br/assuntos/celular-legal/consulte-sua-situacao">Clique aqui</a>
              </p>
            </div>
          </div>

          <div class="questions__item">
            <header class="questions__header">
              <i class="ri-add-line questions__icon"></i>
              <h3 class="questions__item-title">
                Avisos
              </h3>
            </header>

            <div class="questions__content">
              <p class="questions__description">
                <br />
                Não nos responsabilizamos pelos atos de pessoas más intencionadas.
                <!-- <BR>Esteja ciente de tudo o que for falado no CHAT.
                <br>NÃO REEMBOLSAMOS CASO HAJA GOLPE.
                <BR>SOMOS APENAS ANUNCIANTES. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!--==================== CONTACT ====================-->
  <section class="contact section container" id="contact">
    <div class="contact__container grid">
      <div class="contact__box">
        <h2 class="section__title">
          Dúvidas <br />
          entre em contato em
        </h2>

        <div class="contact__data">
          <div class="contact__information">
            <h3 class="contact__subtitle">email de supporte</h3>
            <span class="contact__description">
              <i class="ri-mail-line contact__icon"></i>
              tech_userCompany@gmail.com
            </span>
          </div>
        </div>
      </div>

      <form action="" class="contact__form">
        <div class="contact__inputs">
          <div class="contact__content">
            <input type="email" placeholder="" class="contact__input" />
            <label for="" class="contact__label">Email</label>
          </div>

          <div class="contact__content">
            <input type="text" placeholder=" " class="contact__input" />
            <label for="" class="contact__label">Assunto</label>
          </div>

          <div class="contact__content contact__area">
            <textarea name="message" placeholder=" " class="contact__input"></textarea>
            <label for="" class="contact__label">Mensagem</label>
          </div>
        </div>

        <button class="button button--flex">
          Enviar
          <i class="ri-arrow-right-up-line button__icon"></i>
        </button>
      </form>
    </div>
  </section>
  </main>

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