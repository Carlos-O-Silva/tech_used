<?php
session_start();
if (!isset($_SESSION['adm_nome'])) {
  header('location: login.php');
}

$logado = $_SESSION['adm_nome'];

?>

<?php include '../php/conexao.php'; ?>




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
    <link rel="stylesheet" href="../public/assets/css/search.css" />

    <link rel="stylesheet" href="../admin/assets/css/style_admin.css" />

    <link rel="stylesheet" href="../usuario/assets/css/historicos.css" />

    <link rel="stylesheet" href="../public/assets/css/styles.css" />

    <title>Tech_used - Busca</title>
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
    <form method="POST" action="">    
    <div class="search-div">
    <input type="text" name="anu_titulo"  class="search" placeholder="" value="<?php if(isset($dados['anu_titulo'])){ echo $dados['anu_titulo']; } ?>">
       <input class="button button--flex" value="Buscar" type="submit" name="pesqUsuario" id="pesqUsuario" > </input>
      </div>
   </form>
   <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    ?>
    <main>
    
    <section class="steps section container">
 <div class="steps__bg">
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Resultado da Busca</h3>
					</div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Foto do an??ncio</th>
                    <th>???</th>
                    <th>T??tulo do an??ncio</th>
                    <th>Marca do an??ncio</th>
                    <th>Modelo</th>
                    
                    <th>A????ES</th>
                </tr>


                <br>
                <br>


            </thead>
            <tbody>
    <?php
    include '../php/conexao.php';
    if (!empty($dados['pesqUsuario'])) {
      
        $nome = "%" . $dados['anu_titulo'] . "%";
        //$nome = "%Cesar%";

        $query_usuarios = "SELECT anu_titulo, anu_modelo, anu_preco, anu_foto, anu_marca, anu_id FROM tbl_anuncio WHERE anu_titulo LIKE :anu_titulo ORDER BY anu_titulo ASC";
        $result_usuarios = $db->prepare($query_usuarios);
        $result_usuarios->bindParam(':anu_titulo', $nome, PDO::PARAM_STR);

        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row_usuario);
            extract($row_usuario);
            // <td><img src='../upload/img/$anu_foto'></td>
            echo "<tr>
            <td><img src='../upload/img/$anu_foto' width='100' style='border-radius: 50%; float:right;'></td>
            <td></td>
            <td>{$anu_titulo}</td>
            <td>{$anu_marca}</td>
            <td>{$anu_modelo}</td>
            
            <td><a class='button button--flex' href='visualizarAnuncio.php?cod={$anu_id}'>Visualizar</a></td>
            
            
            </tr>";
        }
    }



    ?>
   </tbody>
        </table>
            
        </tbody>
    </div>
</main>
            </section>
</body>
  </div>

              
    </section>

    <!--==================== FOOTER ====================-->
    

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