<?php
include '../php/conexao.php';
?>

<?php

function get_endereco($cep)
{


    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
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
  <link rel="stylesheet" href="../usuario/assets/css/cadastro.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

  <title>Tech_used - Cadastro</title>
</head>

<body style="background-color: hsl(var(--hue), 40%, 64%);">
    <!--==================== CADASTRO ====================-->
    <div class="container" style="width:95%;">
        <div class="form-image">
            <img src="../usuario/assets/img/cadastro.svg" alt="">
        </div>

        <div class="form">

            <div class="form-header" style="margin-left: 50%;">    

                <div class="title" >
                    <h1>Cadastre-se</h1>
                </div>

            </div>
            
            <form action="../php/cadastrar.php" class="cadastro-form" id="cadastro-form" method="POST" enctype="multipart/form-data">
                

                <div class="input-group">
                    <div class="input-box" style="width: 45%;">
                        <label for="usu_nome">Nome</label>
                        <input id="usu_nome" type="text" name="usu_nome" placeholder="Digite seu nome inteiro" required>
                    </div>

                    <div class="input-box" style="width: 50%;">
                        <label for="usu_email">E-mail</label>
                        <input id="usu_email" type="email" name="usu_email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box" style="width: 30%;">
                        <label for="usu_celular">Celular</label>
                        <input id="usu_celular" type="tel" name="usu_celular" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box" style="width: 30%;">
                     <div class="col">
                         <label for="cpf">CPF</label>
                          <small class="text-muted"> - Obrigatório</small>
                          <input type="number" id="usu_cpf"name="usu_cpf" class="form-control need-validate onlyNumber"
                             placeholder="000.000.000-00" maxlength="14" required min="0"/>
                       <div class="invalid-feedback">
                        Favor inserir um CPF válido!
                       </div>
                       <br>
                     </div>
                    </div>

                    <div class="input-box" style="width: 25%;">
                        <label for="usu_senha">Senha</label>
                        <input id="usu_senha" type="password" name="usu_senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box" style="width: 35%;">
                        <label for="usu_username">Nome de Usuário</label>
                        <input id="usu_username" type="text" name="usu_username" placeholder="Digite seu nome de usuário" required>
                    </div>

                    <div class="input-box" style="width: 25%;">
                        <label for="usu_dataNasc">Data de nascimento</label>
                        <input id="usu_dataNasc" type="date" name="usu_dataNasc" placeholder="Digite a data de nascimento" required>
                    </div>

                    <div class="input-box" style="width: 30%;">
                        <label for="usu_CEP">CEP</label>
                        <input id="usu_CEP" type="number" name="usu_CEP" placeholder="Digite seu CEP" required  min="0">
                    </div>


                    <div class="input-box" style="width: 35%; height: 60px">
                        <label for="usu_estado">Estado</label>
                        <select name="usu_estado" id="estados">
                        <?php
			            $select = $db->prepare("SELECT * FROM tbl_estados ORDER BY nome ASC");
			            $select->execute();
			            $fetchAll = $select->fetchAll();
			            foreach($fetchAll as $estados)
		            	{ 
				            echo '<option value="'.$estados['id'].'">'.$estados['nome'].'</option>';
			            }
		?>
                        </select>

                    </div>

                    <div class="input-box" style="width: 55%;">
                        <label for="usu_cidade">Cidade</label>
                        <select name="usu_cidade" id="cidades">

                    
                        </select>
                    </div>

                    <div class="input-box" style="width: 35%;">
                        <label for="usu_bairro">Bairro</label>
                        <input id="usu_bairro" type="text" name="usu_bairro" placeholder="Digite seu bairro" required />
                    </div>

                    <div class="input-box" style="width: 45%;">
                        <label for="usu_rua">Rua</label>
                        <input id="usu_rua" type="text" name="usu_rua" placeholder="Digite sua rua" required />
                    </div>

                    <div class="input-box" style="width: 15%;">
                        <label for="usu_numCasa">Numero da casa</label>
                        <input id="usu_numCasa" type="text" name="usu_numCasa" placeholder="N°" required  />
                    </div>

                    <div class="input-box" style="width: 30%;">
                        <label for="usu_complemento">Complemento</label>
                        <input id="usu_complemento" type="text" name="usu_complemento" placeholder="Digite um complemento">
                    </div>

                    <div class="foto">
                        <label for="foto">
                            <span class="material-icons">
                                add_a_photo
                            </span>&nbsp; 
                            Escolha sua foto
                        </label>
                        <input id="foto" name="usu_foto" type="file" enctype="multipart/form-data">
                    </div>

                    <div class="botoes">
                        <div class="continue-button" style="margin-right: 40px; margin-left: 90px;">
                            <button><a href="../public/index.php">Voltar</a> </button>
                        </div>
                        <div class="continue-button" style="margin-right: 40px;">
                            <button><a href="../public/login.php">Entrar</a></button>
                        </div>
                        <div class="continue-button">
                            <button type="submit"><a>Cadastrar-se</a> </button>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    </form>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="assets/js/jquery.js"></script>

<!-- Script de validacao de cpf -->
<script src="../usuario/assets/js/validacao.js"></script>
</html>
<script>
$("#estados").on("change",function(){
		
		$.ajax({
			url: 'cidades.php',
			type: 'POST',
			data:{id:$("#estados").val()},
			beforeSend: function(){
				$("#cidades").css({'display':'block'});
				$("#cidades").html("Carregando...");
			},
			success: function(data)
			{
				$("#cidades").css({'display':'block'});
				$("#cidades").html(data);
			},
			error: function(data)
			{
				$("#cidades").css({'display':'block'});
				$("#cidades").html("Houve um erro ao carregar");
			}
		});
});
</script>