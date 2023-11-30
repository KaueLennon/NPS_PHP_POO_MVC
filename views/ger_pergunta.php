<?php

require_once '../config/config.php';
require_once ROOT . FOLDER_PATH .'/models/perguntaModel.php';
require_once ROOT . FOLDER_PATH .'/controllers/perguntaController.php';

session_start();
$obj = new perguntaController;
$result = $obj->consultaPerguntasC();
$nova_pergunta = $result->rowCount() +1;
$primeiroNome = $_SESSION['primeironome'];

if(isset($_POST['submit'])){
  $pergunta = $_POST['pergunta'];
  $tipo = $_POST['tipo'];
  $sequencia = $_POST['sequencia'];

  $obj->adicionarPerguntaC($pergunta, $tipo, $sequencia);

}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento de Perguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
              font-family: Arial, Helvetica, sans-serif;
              background-image: linear-gradient(45deg, #3C7FE8, #16e7c4);
              font-size: 15px;
              height: 100vh;
              
        }

        .titulo_ger{
          display: flex;
          flex-direction: row;
          background-color: black;
          justify-content: space-between;
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
            justify-content: flex-end;
            align-items: center;
            /* margin-left: 150px; */
            margin-top: 5px;
        }

        .logo3r {
        position: relative;
        height: auto;
        width: 80px;
        /* margin-right: 350px; */
        top: 8px;
        }

        .box-search{
          margin-top: 10px;
          display: flex;
          justify-content: center;
          gap: .1%;
        }

        .hidden {
            display: none;
        }

        .bi-floppy {
            border-radius: 3px;
        }

        .bi-floppy:hover {
            border-radius: 3px;
            background-color: LightSteelBlue;
            /* color: white; */
        }

        .div_adc_perg{
          display: flex;
          flex-direction: row;
          justify-content: flex-start;
        }

        label{
          /* background-color: red; */
          margin-left: 15px;     
          color: black;   
          font-size: 20px; 
        }

        input{
        border-radius: 5px;
        outline: none;
        }

        .input_adc_perg{
          width: 550px;
        }

        .td_estilo{
          text-align: center;
          vertical-align: middle;
        }

    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="titulo_ger">
    <a href="telainicio.php">
    <img class="logo3r" src="../imagens/3rlogo.png" alt="Logo 3R">
    </a>
    <h1 class="titulo_superior">Gerenciamento de Perguntas</h1>
    <h2 class="titulo_usuario">Usuário: <?php echo $primeiroNome;?></h2>
    </div>
    <div class="m-5">
      <table class="table table-striped table-hover ">
          <thead>
              <tr>
                  <th scope="col">Questão</th>
                  <th class="td_estilo" scope="col">Sequencia</th>
                  <th class="td_estilo" scope="col">Tipo</th>
                  <th class="td_estilo" scope="col">Ação</th>
              </tr>
          </thead>
          <tbody>
              <?php
                foreach($result as $user_data){
                  echo "<tr>";
                  echo "<td>".$user_data['pergunta']."</td>";
                  echo "<td class='td_estilo'>".$user_data['sequencia']."</td>";
                  echo "<td class='td_estilo'>".$user_data['tipo']."</td>";
                  echo "<td>
                          <a class='btn btn-sm btn-primary' href='editPergunta.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='13' height='13' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg>
                          </a>
                          <a id='btnExcluir_$user_data[id]' class='btn btn-sm btn-danger' href='../config/deletePergunta.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='13' height='13' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/></svg>
                          </a>
                        </td>";
                  echo "</tr>";
                }
              ?>
          </tbody>
      </table>

      <!-- botão adicionar pergunta -->
      <div class="div_adc_perg">  
      <button class="btn btn-light" onclick="mostrarCampos()" class="botao_adc_perg" >Adicionar Pergunta</button>
        <form id="formPergunta" class="hidden" action="" method="POST">
                  <label for="pergunta">Questão:</label>
                  <input class="input_adc_perg" type="text" id="pergunta" name="pergunta" placeholder="Escreva a pergunta">
                  <label for="tipo" class="form_pergunta_adc">Tipo:</label>
                  <select name="tipo" id="tipo">
                      <option value="ABERTA">Aberta</option>
                      <option value="FECHADA">Fechada</option>
                      <option value="S/N">Sim ou Não</option>
                  </select>
                <input type="hidden" name="sequencia" value=<?php echo $nova_pergunta ?>>
                <button name="submit" type="submit" class="bi bi-floppy"> Salvar
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                      <path d="M11 2H9v3h2V2Z"/>
                      <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z"/>
                  </svg>
                </button>
        </form>
      </div>
    </div>
    
    

    <script>
    function mostrarCampos() {
        var formPergunta = document.getElementById("formPergunta");

        // Verifica se o formulário está visível
        if (formPergunta.style.display === "none" || formPergunta.classList.contains("hidden")) {
            formPergunta.style.display = "block";
            formPergunta.classList.remove("hidden");
        } else {
            formPergunta.style.display = "none";
            formPergunta.classList.add("hidden");
        }
    }

    document.querySelectorAll('[id^="btnExcluir_"]').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();

            var confirmacao = confirm('Tem certeza dessa ação?');

            if (confirmacao) {
                window.location.href = this.href;
            }
        });
    });
</script>



  </body>
</html>