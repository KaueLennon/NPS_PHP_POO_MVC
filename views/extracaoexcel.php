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
        body{
          background-image: url('../imagens/fundoexcel.jpg');
          background-size: cover; /* Ajusta o tamanho da imagem para cobrir todo o corpo */
          background-repeat: no-repeat; /* Evita a repetição da imagem */
        }

        .titulo_superior {
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 15px;
            color: white;
            text-align: center;
            margin-right: 100px;
        }

        .titulo_usuario {
            font-size: 22px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 15px;
            color: white;
            text-align: center;
            margin-left: 150px;
            margin-top: 5px;
        }

        .titulo_ger{
          display: flex;
          flex-direction: row;
          background-color: black;
          justify-content: space-between;
        }

        .logo3r {
        position: relative;
        height: auto;
        width: 80px;
        margin-right: 350px;
        top: 3px;
        }

        .titulo_datas{
          margin: 50px 0 25px 50px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        .titulo_datas_1{
          font-size: 36px;
          color: black;
          margin-bottom: 20px;
        }

        fieldset{
            margin: 100px 200px 100px 200px;
            padding: 10px;
            border: 2px solid black;
            border-radius: 15px;
            background-color: rgba(182,182,182,0.3);
        }

                /* Estilo geral */
        input[type="date"] {
          padding: 8px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 14px;
        }

        /* Estilo quando está em foco (clicado) */
        input[type="date"]:focus {
          outline: none; /* Remova a borda de foco padrão */
          box-shadow: 0 0 5px #5cb3fd; /* Adicione uma sombra de foco personalizada */
        }

        /* Estilo para navegadores que suportam o seletor ::-webkit-calendar-picker-indicator (por exemplo, Chrome) */
        input[type="date"]::-webkit-calendar-picker-indicator {
          display: none; /* Ocultar o ícone do calendário do Chrome */
        }

        /* Estilo para navegadores que não suportam o seletor ::-webkit-calendar-picker-indicator (por exemplo, Firefox) */
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-clear-button {
          display: none; /* Ocultar os botões internos no Firefox */
        }

        /* Adicione ícones ou estilos adicionais conforme necessário */

          label{
            color: black;
            font-weight: bold;
          }

    </style>
  </head>
  <body>
    <div class="titulo_ger">
    <a href="telainicio.php">
    <img class="logo3r" src="../imagens/logoblack.png" alt="Logo 3R">
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
            <input  class="btn btn-primary" type="submit" name="submitexcel" id="submitexcel" value="Exportar">
        </form>
    </div>
    </fieldset>
  </body>
</html>