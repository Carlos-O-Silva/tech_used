<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];

?>
<?php
    // Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
    // Verifica se foi enviando dados via GET
    if ($_GET) {
        $id = (isset($_GET["cod"]) && $_GET["cod"] != null) ? $_GET["cod"] : "";
        
        include '../php/conexao.php';
        try {
            $stmt = $db->prepare("SELECT * FROM tbl_anuncio WHERE anu_id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);


                $anu_id = $rs->anu_id;
                $anu_titulo = $rs->anu_titulo;
                $anu_descricao = $rs->anu_descricao;
                $anu_marca = $rs->anu_marca;
                $anu_modelo = $rs->anu_modelo;
                $anu_dataPostagem = $rs->anu_dataPostagem;   
                $anu_preco = $rs->anu_preco;
                $anu_foto = $rs->anu_foto;
                $usu_id = $rs->fk_usu_id;
                
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }
?>


<?php 
 include '../php/conexao.php';
 try {
     $stmt = $db->prepare("SELECT * FROM tbl_usuario WHERE usu_id = ?");
     $stmt->bindParam(1, $usu_id);
     if ($stmt->execute()) {
         $rs = $stmt->fetch(PDO::FETCH_OBJ);

         $usu = $rs->usu_username;
         $num = $rs->usu_celular;  
         
         
     } else {
         throw new PDOException("Erro: Não foi possível executar a declaração sql");
     }
 } catch (PDOException $erro) {
     echo "Erro: ".$erro->getMessage();
 }
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
  <link rel="stylesheet" href="../public/assets/css/produto-detalhe.css" />

  <link rel="stylesheet" href="../public/assets/css/styles.css" />
  
  <title>Tech_used - Detalhe do Produto</title>
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
<!-- INICIO DAS POSTAGENS-->


    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo '../upload/img/'. $anu_foto;?>" alt="" width="100%" id="ProductImg">

                <?php
            
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_marcas WHERE mar_id = ".$anu_marca.";");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $marcas = $rs->mar_nome;
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?> 
            </div>
            <div class="col-2">

                <h1><?php echo $anu_titulo; ?></h1>
                <h4>R$ <?php echo $anu_preco; ?></h4>
                <p>
                Postado por: <?php echo $usu;?> <br>
                Data de postagem: <?php echo $anu_dataPostagem; ?>. 
                </p>
                <?php echo "<a href='https://api.whatsapp.com/send?phone=$num&text=sua%20mensagem' class='btn'>Contato</a>" ?>
                <a href="#abrirModal" class="btn">Dicas</a>
                <div id="abrirModal" class="modal">
                  <div class="image">
                  <img src="../public/assets/img/e-commerce.png" alt="" class="home__img" />
                  </div>
                  <a href="#fechar" title="Fechar" class="fechar">x</a>
                  <br><br>
                    <h2>Dicas ao comprar</h2>
                      <p>1- Não passe seus documentos pessoais.</p>
                      <p>2- Verifique se o celular está quebrado ou trincado.</p>
                      <p>3- Marque a negociação em um local público.</p>
                      <p>4- Verifique se há marcas de impacto.</p>
                      <p>5- Faça testes: câmeras, áudio e tela.</p>
                      <p>6- Cheque a bateria.</p>
                      <p>7- Verifique o IMEI.</p>
                      <p>8- Teste tudo o que puder!</p>
                </div>
                <h3>Detalhes do produto <i class="fa fa-indent"></i></h3>
                <br>
                <p>
                <?php echo $anu_descricao;?>
                <br> <br>
                Marca: <?php echo $marcas?> <br>
                Modelo: <?php echo $anu_modelo?>
                </p>
            </div>
        </div>
    </div>

   


    <div class="small-container">
        <div class="row row-2">
            <h2>Relacionados</h2>
            <p><a href="postagensLogado.php">Veja mais</a></p>
        </div>
    </div>

    
    <div class="product__container grid">
    <?php
            include "../php/conexao.php";
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_anuncio ORDER BY RAND() LIMIT 3;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $anu_id = $rs->anu_id;
                      $anu_titulo = $rs->anu_titulo;
                      $anu_descricao = $rs->anu_descricao;
                      $anu_modelo = $rs->anu_modelo;
                      $anu_dataPostagem = $rs->anu_dataPostagem;   
                      $anu_preco = $rs->anu_preco;
                      $anu_foto = $rs->anu_foto;
                      echo " 
                        
                            <article class='product__card'>
                              <a href='produto-detalhe.php?cod=$anu_id'><img src='../upload/img/$anu_foto'  alt='' class='product__img' /></a>

                              <h3 class='product__title'>$anu_titulo</h3>
                              <span class='product__price'>R$ $anu_preco</span>
                              

                              </article>";
                            
                            
                        

                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?> 
</div>
        
    
<!-- <div class='small-container'>
                            <div class='row'>
                                <div class='col-4'>
                                    <a href='produto-detalhe.php?cod=$anu_id'><img src='../public/assets/img/produto1.jpeg' alt='' />
                                    <h4>$anu_titulo</h4>
                                    <p>R$ $anu_preco</p> </a>
                                </div>
                            </div> -->
                            
    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
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