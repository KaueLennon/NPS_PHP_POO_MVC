<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encerramento da Pesquisa NPS</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
    body {
    background-image: url('../imagens/final.png');
    background-size: cover;
    background-attachment: fixed; /* Mantém a imagem fixa mesmo ao rolar a página */
    font-family: 'Arial', sans-serif;
    margin: 85px 0;
    padding: 0;
    box-sizing: border-box;
    height: 100vh; /* Adiciona altura total da viewport para body */
    display: flex;
    flex-direction: column;
    }

    .encerramento-container {
        margin: 50px;
        padding: 0 0;
        /* background-color: rgba(27,27,27,0.5); */
        text-align: center;
    }

    h1 {
        color: white;
        font-size: 42px;
    }

    h3{
        color: white;
        font-size: 25px;
    }

    h4{
        color: white;
    }

    p {
        color: white;
        margin-bottom: 20px;
    }

    footer {
        background-color: rgba(27,27,27,0.5);
        padding: 20px;
        text-align: center;
        position: fixed;
        bottom: 0; /* Fixa o footer na parte inferior da tela */
        width: 100%;
    }

    .redes-sociais {
        margin-bottom: 10px;
    }

    .redes-sociais img {
        width: 30px;
        margin: 0 5px;
    }

    .redes-sociais a {
        text-decoration: none;
        color: #333;
    }


    </style>
</head>
<body>

  <div class="encerramento-container">
    <h1>Obrigado por participar da nossa pesquisa!</h1>
    <h3>Sua opinião é muito importante para nós.</h3>
    <h4>Ficamos felizes em saber o que você pensa. Se tiver mais feedback, não hesite em nos contatar.</h4>
  </div>

  <footer>
    <div class="redes-sociais">
      <a href="#" target="_blank"><img src="../imagens/instagram.png" alt="Instagram"></a>
      <a href="#" target="_blank"><img src="../imagens/twitter.png" alt="Twitter"></a>
      <a href="#" target="_blank"><img src="../imagens/facebook.png" alt="Facebook"></a>
    </div>
    <p>Desenvolvido por Kauê Lennon - RGM: 123.721.</p>
  </footer>

</body>
</html>

