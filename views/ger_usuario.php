<?php

session_start();

// Mensagem vinda do metodo deleteUsuarioC()
if (isset($_SESSION['mensagem_exclusao'])) {
  echo "<script>alert('" . $_SESSION['mensagem_exclusao'] . "');</script>";
  unset($_SESSION['mensagem_exclusao']); // Remove a mensagem após exibi-la
}

// Mensagem vinda do metodo editarUsuariosC()
if (isset($_SESSION['msg_edicao'])) {
  echo "<script>alert('" . $_SESSION['msg_edicao'] . "');</script>";
  unset($_SESSION['msg_edicao']); // Remove a mensagem após exibi-la
}



$primeiroNome = $_SESSION['primeironome'];

require_once '../config/config.php';
require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';
require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

$obj = new usuarioController;

$obj->verificarLogged(); //Verifica se há alguem logado, caso não tenha é redirecionado para a tela home.php


if(!empty($_GET['search'])){
    $nomesearch = $_GET['search'];
    $result = $obj->consultaUsuariosC($nomesearch); //realiza a consulta na tabela usuarios com a palavra digitada na pesquisa
}else{
    $result = $obj->consultaUsuarios2C();//realiza a consulta na tabela usuarios apenas de um espaço '' para não localizar nada
}

$email = $_SESSION['email'];
$obj->verificarPerfil($email);

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
              /* background-image: linear-gradient(45deg, #3C7FE8, #16e7c4); */
              background-image: url('../imagens/test5.jpeg');
              background-size: 100% 100%; /* Ajusta o tamanho da imagem para cobrir todo o corpo */
              background-repeat: no-repeat; /* Evita a repetição da imagem */
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
        height: 65px;
        width: 70px;
        margin-right: 350px;
        top: 8px;
        }

        .box-search{
          margin-top: 10px;
          display: flex;
          justify-content: center;
          gap: .1%;
        }

    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="titulo_ger">
    <a href="telainicio.php">
    <img class="logo3r" src="../imagens/logoblack.png" alt="Logo 3R">
    </a>
    <h1 class="titulo_superior">Gerenciamento de Usuários</h1>
    <h2 class="titulo_usuario">Usuário: <?php echo $primeiroNome;?></h2>
    </div>
    <div class="box-search">
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
      <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
    </div>
    <div class="m-3">
      <table class="table table-striped table-hover ">
          <thead>
              <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Data_Nasc</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Perfil</th>
                  <th scope="col">Ação</th>
              </tr>
          </thead>
          <tbody>
              <?php
                foreach($result as $user_data){
                  echo "<tr>";
                  // echo "<td>".$user_data['idusuario']."</td>";
                  echo "<td>".$user_data['nome']."</td>";
                  echo "<td>".$user_data['email']."</td>";
                  echo "<td>".$user_data['telefone']."</td>";
                  echo "<td>".$user_data['sexo']."</td>";
                  echo "<td>".date("d-m-y", strtotime($user_data['data_nasc']))."</td>";
                  echo "<td>".$user_data['cidade']."</td>";
                  echo "<td>".$user_data['estado']."</td>";
                  echo "<td>".$user_data['endereco']."</td>";
                  echo "<td>".$user_data['perfil']."</td>";
                  echo "<td>
                    <a class='btn btn-sm btn-primary' href='editUsuario.php?id=$user_data[idusuario]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                      </svg>
                    </a>
                    <a id='btnExcluir_$user_data[idusuario]' class='btn btn-sm btn-danger' href='../config/deleteUsuario.php?id=$user_data[idusuario]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/></svg>
                    </a>
                        </td>";
                  echo "</tr>";
                }
              ?>
          </tbody>
      </table>
    </div>
  </body>
  <script>
    // Evento para pesquisar com utilização do botão enter no teclado
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
      if(event.key === "Enter"){
        searchData();
      }
    });

    function searchData(){
      window.location = 'ger_usuario.php?search='+search.value;
    }

    // Mensagem de confirmação da exclusão de usuario
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
</html>