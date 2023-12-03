<?php

if(isset($_POST['submit']))
{ 
    require_once ("../config/config.php");
    require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';
    require_once ROOT . FOLDER_PATH .'/controllers/usuarioController.php';

    $ObjUsuario = new usuarioController;

    $email = $_POST['email'];

    $emailExistente = $ObjUsuario->consultaEmailC($email);

    //Teste para ver se o e-mail cadastro existe no BD, caso existe ele não será cadastrado.
    if($emailExistente->rowCount() > 0){
        echo "<script>alert('Esse cadastro já existe, por favor verificar outro e-mail.'); window.location.href='./cadastro.php';</script>";
        exit();
    }

    $usuario = new UsuarioModel;

    $usuario->nome = $_POST['nome'];
    $usuario->senha = $_POST['senha'];
    $usuario->email = $_POST['email'];
    $usuario->telefone = $_POST['telefone'];
    $usuario->sexo = $_POST['genero'];
    $usuario->data_nasc = $_POST['data_nascimento'];
    $usuario->cidade = $_POST['cidade'];
    $usuario->estado = $_POST['estado'];
    $usuario->endereco = $_POST['endereco'];
    $usuario->perfil = "usuario";

    
    $ObjUsuario->cadastrarUsuarioC($usuario->nome, $usuario->senha, $usuario->email, $usuario->telefone, $usuario->sexo, $usuario->data_nasc, $usuario->cidade, $usuario->estado, $usuario->endereco, $usuario->perfil);
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <title>Tela de Cadastro</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            /* background-image: linear-gradient(to right, #3C7FE8, #16e7c4); */
            background-image: url('../imagens/fundoembacado.png');
            background-size: cover; /* Ajusta o tamanho da imagem para cobrir todo o corpo */
            background-repeat: no-repeat; /* Evita a repetição da imagem */
            background-attachment: fixed; /* Mantém a imagem fixa mesmo ao rolar a página */
        }

        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(127,127,127,0.8);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }

        fieldset{
            border: 3px solid black;
        }

        legend{
            border: none;
            padding: 10px;
            text-align: center;
            background-color: black;
            border-radius: 8px;
            color: white;
        }

        .inputBox{
            position: relative;
        }

        .inputUser{
            background: none;
            outline: none;
            border: none;
            border-bottom: 1px solid white;
            width: 100%;
            color: white;
            font-size: 15px;
        }

        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -15px;
            font-size: 10px;
            color: black;
            font-weight: bold;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
        }

        #submit{
            width: 100%;
            border-radius: 7px;
            outline: none;
            border: none;
            background-color: rgb(14,4,106);
            color: white;
            font-weight: 100%;
            font-size: 18px;
            padding: 5px;
            cursor: pointer;
        }

        #submit:hover{
            background-color: #3C7FE8;
            color: white;
        }

        a{
            text-decoration: none;
            background-color: white;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        a:hover{
            background-color: silver;
        }
  
    </style>
</head>
<body>
    <a href="./home.php">Voltar</a>
    <div class="box">
        <form action="" method="POST">
            <fieldset>
                <legend><b>Cadastro de Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div> 
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" name="genero" id="outros" value="outros" required>
                <label for="outros">Outros</label>
                <br><br>
                    <label for="data_nascimento"><b>Data de Nascimento</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>    
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br>
                <div class="InputBox">
                <label for="estado"><b>Estado</b></label>
                <select name="estado" id="estado" required>
                    <option value="" disabled selected>Selecione o estado</option>
                    <option value="Acre">Acre</option>
                    <option value="Alagoas">Alagoas</option>
                    <option value="Amapá">Amapá</option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Bahia">Bahia</option>
                    <option value="Ceará">Ceará</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Espírito Santo">Espírito Santo</option>
                    <option value="Goiás">Goiás</option>
                    <option value="Maranhão">Maranhão</option>
                    <option value="Mato Grosso">Mato Grosso</option>
                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                    <option value="Minas Gerais">Minas Gerais</option>
                    <option value="Pará">Pará</option>
                    <option value="Paraíba">Paraíba</option>
                    <option value="Paraná">Paraná</option>
                    <option value="Pernambuco">Pernambuco</option>
                    <option value="Piauí">Piauí</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                    <option value="Rondônia">Rondônia</option>
                    <option value="Roraima">Roraima</option>
                    <option value="Santa Catarina">Santa Catarina</option>
                    <option value="São Paulo">São Paulo</option>
                    <option value="Sergipe">Sergipe</option>
                    <option value="Tocantins">Tocantins</option>
                </select>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Cadastrar">
            </fieldset>
        </form>
    </div>
</body>
</html>