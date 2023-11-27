<?php

require_once ("../config/config.php");
require_once ROOT . FOLDER_PATH .'/models/usuarioModel.php';

class usuarioController {
    private $model;

    function __construct(){
        $this->model = new UsuarioModel;
    }

    //Metodo que cadastra o usuario na tabela Usuario no BD
    function cadastrarUsuarioC($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil){
        $resultInsert = $this->model->cadastrarUsuario($nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
        header('Location: ./home.php');
    }

    // Metodo utilizado no telainicio.php
    function consultaEmailC($email){
        $result = $this->model->consultaEmail($email);
        return $result;
    }


    //Metodo para logar o usuario
    function loginC($email, $senha){
        $result = $this->model->login($email, $senha);
        session_start();
        if(!$result){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../views/home.php');
        }else {
            $_SESSION['email'] = $email;
            header('Location: ../views/telainicio.php');
        }
    }


    //Metodo para deslogar o usuario
    function sairC(){
        session_start();
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../views/home.php');
    }

    //Metodo para pesquisar TODOS os usuarios na pagina ger_usuario.php
    function consultaUsuariosC($nomesearch){
        $result = $this->model->consultaUsuarios($nomesearch);
        return $result;
    }

    //Metodo para pesquisar NENHUM usuario na pagina ger_usuario.php
    function consultaUsuarios2C(){
        $result = $this->model->consultaUsuarios2();
        return $result;
    }

    //Metodo para consultar o usuario a partir de um GET [id] no editUsuario.php
    function consultarUsuarioIDC($id){
        $result = $this->model->consultarUsuarioID($id);
        return $result;
    }

    // Metodo para editar e atualizar os dados do Usuario - dados recebidos do editUsuario.php
    function editarUsuariosC($id, $nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil) {
        $result = $this->model->editarUsuarios($id, $nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $perfil);
        if($result){
            $mensagem = "Alteração realizada com sucesso!";
        }
        session_start();
        $_SESSION['msg_edicao'] = $mensagem;
        header('Location: ../views/ger_usuario.php');
    }

    // // Metodo para deletar o usuario selecionado na pag ger_usuario.php conforme a id dele (resgatada no GET_ID)
    function deleteUsuarioC($id) {
        $exclusaoBemSucedida = $this->model->deleteUsuario($id);

        if ($exclusaoBemSucedida) {
            $mensagem = "Usuário excluído com sucesso!";
        } else {
            $mensagem = "Falha ao excluir o usuário.";
        }
        session_start();
        $_SESSION['mensagem_exclusao'] = $mensagem;

        header('Location: ../views/ger_usuario.php');
    }



}?>