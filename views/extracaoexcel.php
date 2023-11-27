<?php

session_start();
$primeiroNome = $_SESSION['primeironome'];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
              font-family: Arial, Helvetica, sans-serif;
              background-image: linear-gradient(45deg, #3C7FE8, #16e7c4);
              font-size: 15px;
              height: 100vh;
              
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
        top: 8px;
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
            margin-top: 10px;
            padding: 10px;
            border: 2px groove LightGray;
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
            font-weight: bold;
          }

    </style>
  </head>
  <body>
    <div class="titulo_ger">
    <a href="telainicio.php">
    <img class="logo3r" src="../imagens/3rlogo.png" alt="Logo 3R">
    </a>
    <h1 class="titulo_superior">Gerenciamento de Usuários</h1>
    <h2 class="titulo_usuario">Usuário: <?php echo $primeiroNome;?></h2>
    </div>
    <fieldset>
    <div class="titulo_datas">
        <h2 class="titulo_datas_1" >Selecione as datas Inicio e Fim:</h2>
        <form action="../config/" method="POST">
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