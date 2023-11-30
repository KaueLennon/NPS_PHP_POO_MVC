<?php
session_start();
require_once '../config/config.php';
require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';
require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

$obj = new usuarioController;
$obj->verificarLogged(); //Verifica se há alguem logado, caso não tenha é redirecionado para a tela home.php
$emaill = $_SESSION['email'];
$obj->verificarPerfil($emaill); //Verifica se o perfil é administrador, caso não seja, é redirecionado para a tela inicial
$primeiroNome = $_SESSION['primeironome'];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Extração Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    </style>
  </head>
  <body>
    <div class="titulo_ger">
    <a href="telainicio.php">
    <img class="logo3r" src="../imagens/3rlogo.png" alt="Logo 3R">
    </a>
    <h1 class="titulo_superior">Extração de Dados - NPS</h1>
    <h2 class="titulo_usuario">Usuário: <?php echo $primeiroNome;?></h2>
    </div>
    <fieldset>
    <div class="titulo_datas">
        <h2 class="titulo_datas_1" >Selecione as datas Inicio e Fim:</h2>
        <form action="../config/gerar_planilha.php" method="POST">
            <label for="datainicio">Data Inicio</label>
            <input type="date" name="datainicio" id="datainicio" required>
            <label for="datainicio">Data Fim</label>
            <input type="date" name="datafim" id="datafim" required>
            <input  class="btn btn-secondary" type="submit" name="submitexcel" id="submitexcel" value="Exportar">
        </form>
    </div>
    </fieldset>
  </body>
</html>