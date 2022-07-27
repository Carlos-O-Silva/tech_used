<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];

?>

<?php
            include "../php/conexao.php";
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_usuario WHERE usu_id = ".$id.";");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $usu_id = $rs->usu_id;
                      $usu_foto = $rs->usu_foto;
                      $usu_dataNasc = $rs->usu_dataNasc;
                      $usu_email = $rs->usu_email;
                      $usu_CEP = $rs->usu_CEP;
                      $usu_estado = $rs->usu_estado;
                      $usu_cidade = $rs->usu_cidade;
                      $usu_rua = $rs->usu_rua;
                      $usu_numCasa = $rs->usu_numCasa;
                      $usu_complemento = $rs->usu_complemento;
                      $usu_username = $rs->usu_username;
                      $usu_nome = $rs->usu_nome;
                      $usu_cpf = $rs->usu_cpf;
                      $usu_celular = $rs->usu_celular; 
                      $usu_bairro = $rs->usu_bairro;
                      $usu_foto = $rs->usu_foto;
                  
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
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
  <link rel="stylesheet" href="assets/css/minhaconta.css" />

  <link rel="stylesheet" href="assets/css/normalize.css">

  <link rel="stylesheet" href="../usuario/assets/css/historicos.css" />

  <link rel="stylesheet" href="../public/assets/css/styles.css" />


  <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <title>Tech_used - Minha conta</title>
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
              <a href="indexLogado.php #products" class="nav__link">Anúncios</a>
            </li>
            <li class="nav__item">
              <a href="indexLogado.php #contact" class="nav__link">Contato</a>
            </li>
  
            <!-- Fazer um "meio q botao para abrir as opcoes" -->
  
            <div class="dropdown" style="background-color: #FFF;">
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

  <?php
            
            try {
                $stmt = $db->prepare("SELECT * FROM tbl_estados WHERE id = ".$usu_estado.";");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $estados = $rs->nome;
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?> 
  <div class="content" style="padding-top: 6rem;" />
  
    <img class="img-top" src="#" alt="Image top" />
    <div class="card">
      <div class="card__header">
      <br>
 
        <!-- <img class="card__img" src="./images/bg-pattern-card.svg" alt="Image of banner" /> -->
        <div class="card__content-img">
        <img src="<?php echo 'upload/img/'. $usu_foto;?>" width='150' style="border-radius: 80%; float:right;" alt='Foto de exibição' />
        </div>
      </div>

      <div class="card__body">
        <div class="card__info">
          <p class="card__name">Nome de Usuário</p>
          <p><?php echo $usu_username;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Nome Completo</p>
          <p><?php echo $usu_nome;?></p>
        </div>
      
        <div class="card__info">
          <p class="card__name">CPF </p>
          <p><?php echo $usu_cpf;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Data de Nascimento</p>
          <p><?php echo $usu_dataNasc;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">E-mail</p>
          <p><?php echo $usu_email;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Senha</p>
          <p>********************</p>
        </div>
        <div class="card__info">
          <p class="card__name">CEP</p>
          <p><?php echo $usu_CEP;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Estado</p>
          <p><?php echo $estados;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Cidade</p>
          <p><?php echo $usu_cidade;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Bairro</p>
          <p"><?php echo $usu_bairro;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Rua</p>
          <p><?php echo $usu_rua;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Numero da casa</p>
          <p><?php echo $usu_numCasa;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Complemento</p>
          <p><?php echo $usu_complemento;?></p>
        </div>
        <div class="card__info">
          <p class="card__name">Celular</p>
          <p><?php echo $usu_celular;?></p>
        </div>
        <br>
        <br>
      </div>
    </div>
  </div>
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
