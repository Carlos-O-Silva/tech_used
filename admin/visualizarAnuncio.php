<?php
session_start();
if (!isset($_SESSION['adm_nome'])) {
  header('location: login.php');
}

$logado = $_SESSION['adm_nome'];

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
                $anu_imei = $rs->anu_imei;
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

    <link rel="stylesheet" href="../public/assets/css/produto-detalhe.css" />

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

<?php 
 include '../php/conexao.php';
 try {
     $stmt = $db->prepare("SELECT usu_username FROM tbl_usuario WHERE usu_id = ?");
     $stmt->bindParam(1, $usu_id);
     if ($stmt->execute()) {
         $rs = $stmt->fetch(PDO::FETCH_OBJ);

         
         $usu = $rs->usu_username;    
         
         
     } else {
         throw new PDOException("Erro: Não foi possível executar a declaração sql");
     }
 } catch (PDOException $erro) {
     echo "Erro: ".$erro->getMessage();
 }
?>
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
                <?php echo "<a href='excluirAnuncio.php?cod={$anu_id}' class='btn'>Excluir Anúncio</a>"; ?>
                <h3>Detalhes do produto <i class="fa fa-indent"></i></h3>
                <br>
                <p>
                <?php echo $anu_descricao;?>
                <br> <br>
                IMEI: <?php echo $anu_imei?> <br>
                Marca: <?php echo $marcas?> <br>
                Modelo: <?php echo $anu_modelo?>
                </p>
            </div>
        </div>
    </div>