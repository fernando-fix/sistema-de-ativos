<?php

use src\models\Auth;

require_once "vendor/autoload.php";

$auth = new Auth();

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Login - Help!desk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= $auth->base; ?>/assets/css/login.css">
    <link rel="shortcut icon" href="../favicon_io/favicon-32x32.png" type="image/x-icon">
</head>

<body>

    <!-- mensagens de alerta e sucesso -->
    <?php if (isset($_SESSION['alert']) and $_SESSION['alert'] != "") : ?>
        <div class="messageAlertWarning">
            <div class="messageAlertWarning-text">
                <?= $_SESSION['alert']; ?>
                <?php $_SESSION['alert'] = '' ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success']) and $_SESSION['success'] != "") : ?>
        <div class="messageAlertSuccess">
            <div class="messageAlertSuccess-text">
                <?= $_SESSION['success']; ?>
                <?php $_SESSION['success'] = '' ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- mensagens de alerta e sucesso end -->

    <div class="container">
        <a class="links" id="paracadastro"></a>
        <a class="links" id="paralogin"></a>
        <div class="content">
            <!--FORMULÁRIO DE LOGIN-->
            <div id="login">
                <form method="post" action="<?= $auth->base; ?>/login_action.php">
                    <h1>Login</h1>
                    <p>
                        <label for="email">Seu e-mail</label>
                        <input type="email" id="email" name="email" placeholder="Ex.: joaquim@hotmail.com" required>
                    </p>
                    <p>
                        <label for="password">Sua senha</label>
                        <input type="password" id="password" name="password" required>
                    </p>
                    <!-- <p>
            <input type="checkbox" name="manterlogado" id="manterlogado" value="">
            <label for="manterlogado">Manter-me logado</label>
          </p> -->
                    <p>
                        <input type="submit" value="Logar">
                    </p>
                    <!-- <p class="link">
            Ainda não tem conta?
            <a href="#paracadastro">Cadastre-se</a>
          </p> -->
                </form>
            </div>
            <!--FORMULÁRIO DE CADASTRO-->
            <!-- <div id="cadastro">
        <form method="post" action=""> 
          <h1>Cadastro</h1> 
           
          <p> 
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="nome">
          </p>
           
          <p> 
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="contato@htmlecsspro.com"/> 
          </p>
           
          <p> 
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="ex. 1234"/>
          </p>
           
          <p> 
            <input type="submit" value="Cadastrar"/> 
          </p>
           
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>
      </div> -->
        </div>
    </div>
    <footer>
        Copyright 2022 © Help!desk
    </footer>
</body>

</html>