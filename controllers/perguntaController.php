<?php

// require_once ("../config/config.php");
// require_once ROOT . FOLDER_PATH .'/models/perguntaModel.php';

require_once 'C:/xampp/htdocs/Pesquisa_NPS/models/perguntaModel.php';

class perguntaController {
private $modelo;

function __construct(){
    $this->modelo = new perguntaModel;
}


// function cadastrarUsuarioC($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
//     $resultInsert = $this->modelo->cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
//     header('Location: ./home.php');
// }

function consultaPerguntasC(){
    $result = $this->modelo->consultaPerguntas();
    return $result;
}

//Metodo para consultar a pergunda de UMA ID especifica
function consultarIDPerguntaC($id){
    $result = $this->modelo->consultarIDPergunta($id);
    if($result->rowCount() < 1){
        header('Location: ./ger_usuario');
    }
    return $result;
}

function atualizarPerguntasC($id, $pergunta, $sequencia, $tipo){
    $result = $this->modelo->atualizarPerguntas($id, $pergunta, $sequencia, $tipo);
    echo "<script>alert('Pergunta atualizada'); window.location.href='../views/ger_pergunta.php';</script>";
}

function deletePerguntaC($id){
    $result = $this->modelo->deletePergunta($id);
    echo "<script>alert('Pergunta deletada com sucesso!'); window.location.href='../views/ger_pergunta.php';</script>";
}

function adicionarPerguntaC($pergunta, $tipo, $sequencia){
    $result = $this->modelo->adicionarPergunta($pergunta, $tipo, $sequencia);
    echo "<script>alert('Pergunta adicionada!'); window.location.href='../views/ger_pergunta.php';</script>";
}

function salvarRespostas($resposta, $user, $fk_pergunta, $cod){
    $result = $this->modelo->salvarRespostas($resposta, $user, $fk_pergunta, $cod);
}

function consultaRegras(){
    $result = $this->modelo->consultaRegras();
    return $result;
}


}?>