<?php
        require_once '../config/config.php';
        require_once ROOT . FOLDER_PATH .'/models/perguntaModel.php';
        require_once ROOT . FOLDER_PATH .'/controllers/perguntaController.php';
        
        session_start();
        $logado = $_SESSION['email'];
        $cod_pesquisa = time();

        $obj = new perguntaController;
        $result = $obj->consultaPerguntasC();

        if (isset($_POST['submit'])) {

            foreach($result as $arr_result){
                $resposta = $_POST['pergunta'.$arr_result[2]]; //numero sequencia da pergunta
                $user = $logado;
                $fk_pergunta = $arr_result[0]; //ID da pergunta
                $cod = $cod_pesquisa; //Data da pesquisa que vira o código de validação
                $obj->salvarRespostas($resposta, $user, $fk_pergunta, $cod);
            }

            header('Location: encerramento.php');
        }

        $regras = $obj->consultaRegras();
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Pesquisa</title>
        <style>
        
        *{
            margin: 0;
            padding: 0;
        }

        body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, #3C7FE8, #16e7c4);
        height: auto;
        }

        .container1{
            display: flex;
            align-items: center;
            flex-direction: row;
            background-color: black;
            justify-content: space-between;
        }

        .titulopag{
            color: white;
        }

        .logo3r {
        position: relative;
        height: auto;
        width: 80px;
        }

        .botaosair{
            padding: 8px 8px;
            background-color: red;
            color: white;
            border-radius: 10px;
            border: 2px solid black;
            text-decoration: none;
            text-align: center;
            width: 75px;
            height: 100%;
        }

        .pesquisa{
            display: flex;
            justify-content: center;
            margin: 20px;
            margin-left: 50px;
        }

        .pesquisa_1{
            margin: 15px;
            margin-top: 15px;
        }

        p{
            font-size: 15px;
            padding: 10px;
            background-color: white;
            border-radius: 15px;
            border: 2px solid black;
            width: 750px;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .inputSubmit{
        background-color: #2C55F5;
        border: none;
        color: white;
        border-radius: 5px;
        font-size: 20px;
        padding: 13px;
        width: 125px;
        border: 1px solid black;
        margin-left: 40%;;
       }

       .inputSubmit:hover{
        background-color: deepskyblue;
        cursor: pointer;
       }

       .titulo_perg{
        color: black;
       }

       .r_fechada{
        font-size: 16px;
        background-color: black;
        color: white;
        border-radius: 10px;
        padding: 3px;
        margin: 2px;
        display: inline-block; 
        cursor: pointer;
       }

       .r_fechada:hover{
        background-color: #852CF5;
       }


       .r_aberta{
        font-family: Verdana, sans-serif;
        font-size: 12px;
        padding: 10px;
        background-color: white;
        border-radius: 15px;
        border: none;
        width: 650px;
        margin-bottom: 5px;
        margin-top: 10px;
        outline: none;
       }

       input[type="radio"]:checked + label {
        font-size: 18px;
        background-color: #852CF5;
        border: 2px solid white;
        }

        input[type="radio"] {
        display: none; 
        }

        fieldset{
            margin-top: 10px;
            padding: 10px;
            border: 2px groove LightGray;
        }
        
        </style>
    </head>
    <body>
        
        <div class="container1">
            <a href="telainicio.php">
                <img class="logo3r" src="../imagens/3rlogo.png" alt="Logo 3R">
            </a>
            <h1 class="titulopag">Formulário de Pesquisa de Satisfação</h1>
            <a href="../config/sair.php" class="botaosair">Sair</a>
        </div>
        
        <div class="pesquisa">
            <form action="" method= "POST">
                    <?php 
                        $respostaOrdem = 0;
                        foreach($result as $arr_result){
                            $respostaOrdem = $respostaOrdem +1; ?>
                            <fieldset>
                                <p><strong class="titulo_perg"><?="Pergunta " . $arr_result[2] ?></strong><?= ": ". $arr_result[1] ?></p>
                                <?php
                                if($arr_result[3]==='FECHADA'){
                                    for($i=1;$i<6;$i++){ ?>
                                        <input type="radio" name="pergunta<?= $respostaOrdem ?>" value="<?= $i ?>" id="pergunta<?= $respostaOrdem ?>_<?= $i ?>">
                                        <label class="r_fechada" for="pergunta<?= $respostaOrdem ?>_<?= $i ?>"><?= $i ?></label>
                                    <?php }?> 
                                <?php }elseif($arr_result[3]=== 'ABERTA'){ ?> 
                                    <textarea class="r_aberta" name="pergunta<?= $respostaOrdem ?>" id="pergunta<?= $respostaOrdem ?>" rows="3" cols="50"></textarea>  
                                        <?php } else { ?> 
                                            <input type="radio" name="pergunta<?= $respostaOrdem ?>" value="Sim" id="pergunta<?= $respostaOrdem ?>_Sim">
                                            <label class="r_fechada" for="pergunta<?= $respostaOrdem ?>_Sim">Sim</label>
                                            <input type="radio" name="pergunta<?= $respostaOrdem ?>" value="Não" id="pergunta<?= $respostaOrdem ?>_Não">
                                            <label class="r_fechada" for="pergunta<?= $respostaOrdem ?>_Não">Não</label>
                                            <?php } ?>  
                            </fieldset>     
                    <?php }?>
                <br><br>    
                <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </body>
    </html>