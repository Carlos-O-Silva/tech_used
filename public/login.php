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
  <link rel="stylesheet" href="../public/assets/css/login3.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title>Tech_used - Home</title>
</head>

<body style="background-color:  hsl(var(--hue), 40%, 64%);">
    <div class="container">
        <div class="form-image">
            <img src="../public/assets/img/login.svg" alt="">
        </div>
        
        <div class="form">
            <form action="../php/logar.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box" style="width: 100%;">
                        <label for="email">Nome de usuário</label>
                        <input id="email" type="text" name="usu_username" placeholder="Digite seu nome de usuário" required>
                    </div>

                    <div class="input-box" style="width: 100%;">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="usu_senha" placeholder="Digite sua senha" required>
                    </div>

                <div class="botoes">
                    <div class="continue-button" style="margin-right: 40px;">
                        <button><a href="index.php">Voltar</a> </button>
                    </div>
                    <div class="continue-button">
                        <button type="submit"><a>Entrar</a> </button>
                    </div>
                </div>


                <div class="letra">
                    <br>Não possui conta? <a href="../usuario/cadastro.php">Cadastrar-se</a>.
                </div>

                </div>

            </form>

        </div>
    </div>
</body>

</html>