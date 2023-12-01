<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fim Pesquisa</title>

    <style>
        body {
            background-image: url('../imagens/encerramento.jpeg'); /* Caminho da imagem de fundo */
            background-size: cover; /* Ajusta o tamanho da imagem */
            background-position: center; /* Centraliza a imagem */
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: white;
            font-size: 100px;
            margin-top: -70px;
        }

        h3 {
            color: white;
            font-size: 40px;
            margin-top: -20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <h1>OBRIGADO!</h1>
    <h3>Agradecemos pelo tempo e atenção em nos avaliar, volte sempre!</h3>
</body>

</html>
