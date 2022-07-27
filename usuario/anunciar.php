<?php
include '../php/conexao.php';
?>
<?php
session_start();
if (!isset($_SESSION['usu_username'])) {
  header('location:../public/login.php');
}

$logado = $_SESSION['usu_username'];
$id = $_SESSION['usu_id'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/icone.png" type="image/x-icon" />

    <link rel="stylesheet" href="assets/css/anuncio.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tech_used - Anunciar</title>
</head>

<body style="background-color: hsl(var(--hue), 40%, 64%);">
    <div class="container">

        <div class="form-image">
            <img src="../usuario/assets/img/anunciar.svg" alt="">
        </div>

        <div class="form">
            <form action="../php/anunciar.php" method="POST" enctype="multipart/form-data">
                <div class="form-header">
                    
                    <div class="title">
                        <h1>Anunciar</h1>
                    </div>

                </div>

                <div class="input-group">
                    <div class="input-box" style="width: 70%;">
                        <label for="nome">Titulo do anúncio</label>
                        <input id="nome" type="text" name="anu_titulo" placeholder="Digite o título do anúncio" required>
                    </div>
                    
         
                    
                
                         <div class='input-box' style='width: 27%'>
                                <label for='marca'>Marca</label>
                                <select name="anu_marca" id="marcas">    
                                      <option value="" selected = selected>Selecione uma Marca</option>   
                                                                             
                                          
                                            <?php
                                                $select = $db->prepare("SELECT * FROM tbl_marcas ORDER BY mar_nome ASC");
                                                $select->execute();
                                                $fetchAll = $select->fetchAll();
                                                foreach($fetchAll as $marcas)
                                                {
                                                    echo '<option value="'.$marcas['mar_id'].'">'.$marcas['mar_nome'].'</option>';
                                                }
                                        
                                        
                                        ?>
                                    
                                        
                                
                                 </select>           
                                    
                            </div> 
                    


                         <div class='input-box' style='width: 27%'>
                                <label for='modelo'>Modelo</label>                                 
                                    <select name="anu_modelo" id="modelos">
                                        <option value="" selected = selected>Selecione o Modelo</option>
                                    </select>
                            </div> 
                            
                    <form>
                    
                    <div class="input-box" style="width: 46%;">
                     <div class="col">
                         <label for="imei">IMEI</label>
                          <small class="text-muted"> - Obrigatório</small>
                          <input type="number" id="anu_imei"name="anu_imei" class="form-control need-validate onlyNumber">
                     </div>
                    </div>
                    </form>

                    <div class="input-box" style="width: 22%;">
                        <label for="preco">Preço</label>
                        <input id="preco" type="number" name="anu_preco" placeholder="Digite o preço" required  min="0">
                    </div>

                    <div class="input-box" style="width: 100%;">
                        <label for="descricao">Descrição</label>
                        <input id="descricao" type="text" name="anu_descricao" placeholder="Descreva o produto">
                    </div>

                    <div class="input-box">
                        <label for="foto"> 
                            <span class="material-icons">
                                add_a_photo
                            </span>&nbsp;
                            Escolha as fotos</label>
                        <input id="foto" name="anu_foto" type="file"  multiple required>
                    </div>

                    <div class="botoes">

                        <div class="continue-button">
                            <button><a href="../usuario/indexLogado.php">Voltar</a></button>
                        </div>

                        <div class="continue-button">
                            <button><a>Anunciar</a> </button>
                        </div>

                    </div>
                </div>

                

            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.js"></script>

<!-- Script de validacao de IMEI-->

</html>
<script>
$("#marcas").on("change",function(){
		
		$.ajax({
			url: 'modelos.php',
			type: 'POST',
			data:{mar_id:$("#marcas").val()},
			beforeSend: function(){
				$("#modelos").css({'display':'block'});
				$("#modelos").html("Carregando...");
			},
			success: function(data)
			{
				$("#modelos").css({'display':'block'});
				$("#modelos").html(data);
			},
			error: function(data)
			{
				$("#modelos").css({'display':'block'});
				$("#modelos").html("Houve um erro ao carregar");
			}
		});
});

</script>